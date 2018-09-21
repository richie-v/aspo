<?php
//Cron job for iDeal payments and database clean up
//Should run daily around midnight

//set time zone
date_default_timezone_set('Europe/Amsterdam');

//iDeal namespaces
use iDEALConnector\iDEALConnector;
use iDEALConnector\Configuration\DefaultConfiguration;

use iDEALConnector\Exceptions\ValidationException;
use iDEALConnector\Exceptions\SecurityException;
use iDEALConnector\Exceptions\SerializationException;
use iDEALConnector\Exceptions\iDEALException;

//iDeal status namespace
use iDEALConnector\Entities\AcquirerStatusResponse;

//include iDeal connector
require_once('Connector/iDEALConnector.php');
$iDEALConnector = iDEALConnector::getDefaultInstance('Connector/config.conf');

//include smarty template engine
require_once('includes/smarty/Smarty.class.php');
$oSmarty = new Smarty;

//include config
require_once('includes/config.class.php');
$oCfg = new Config;
$oCfg->load('settings.php');

//get database info from config
$dsn    =	'mysql:dbname=' . $oCfg->get('database');
$dsn   .=	';host=' . $oCfg->get('host');
$dbuser = $oCfg->get('user');
$dbpass = $oCfg->get('password');

//setup database connection
try {
	$oDB = new PDO($dsn, $dbuser, $dbpass);
}
catch(PDOException $e) {
	die("CRON: Kan geen verbinding maken met de database:\n" . $e->getMessage());
}

//include PHP Mailer
require_once('includes/phpmailer/class.phpmailer.php');
$mailer = new PHPMailer();
$mailer->IsSendmail();
$mailer->SetFrom($oCfg->get('webmastermail'), 'ASPO webmaster');

//define variables
$errors = '';
$croninfo = '';
$statuses = array();
$mails = array();
$memberships = array();

//Check for orders with open iDeal status
$sql = 'SELECT o.OrderID, o.PurchaseID, o.TransID,
			   u.UserID, u.Email, u.Username, u.Name, u.Prep, u.Surname,
			   pr.Name,
			   p.Description, p.Price, p.IncMember
		FROM Orders AS o
		LEFT JOIN Users AS u ON o.UserID = u.UserID
		LEFT JOIN Products AS pr ON o.ProdID = pr.ProdID
		LEFT JOIN Packages AS p ON o.PackID = p.PackID
		WHERE (o.TransStatus = "Open" OR o.TransStatus IS NULL)
	   ';
$orders = $oDB->query($sql);
	   
if($orders === false)
	die('CRON: Kan status van de bestellingen niet ophalen!\n');

//prepare status update statement
$stmt = $oDB->prepare('UPDATE Orders SET TransStatus = :status, StatusTime = NOW() WHERE OrderID = :oid');
	
//query iDeal status for all open orders
foreach($orders as $order) {

	//query iDeal status
	try
	{
		$response = $iDEALConnector->getTransactionStatus($order['TransID']);
	}
	catch(SerializationException $ex) { $errors .= "Betaling: $order[OrderID]\t--\tSerialisatie fout:     " . $ex->getMessage() . "!\r"; }
	catch(SecurityException $ex)	  { $errors .= "Betaling: $order[OrderID]\t--\tAuthenticatie mislukt: " . $ex->getMessage() . "!\r"; }
	catch(ValidationException $ex)	  { $errors .= "Betaling: $order[OrderID]\t--\tValidatie mislukt:     " . $ex->getMessage() . "!\r"; }
	catch(iDEALException $ex)		  { $errors .= "Betaling: $order[OrderID]\t--\tiDeal fout:            " . $ex->getMessage() . "!\r"; }
	catch(Exception $ex)			  { $errors .= "Betaling: $order[OrderID]\t--\tiDeal fout:            " . $ex->getMessage() . "!\r"; }

	//got a response from iDeal
	if($response) {
		//get status
		$status = $response->getStatus();
			
		//if status changed, update order in database
		if($status != 'Open') {
			//bind values
			$stmt->bindValue(':status', $status);
			$stmt->bindValue(':oid', $order['OrderID']);
			
			//execute update statement
			if(!$stmt->execute())
				$errors .= "Betaling: $order[OrderID]\t--\tDatabase fout:         Kon status niet bijwerken!\r";
				
			//add to cron info
			$croninfo .= "Betaling: $order[OrderID]\t--\tStatus veranderd naar: $status\r";
		}
		
		//e-mail user if payment was successful
		if($status == 'Success') {

			//determine full user name
			$uname = $order['Username'];
			if($order['Name']) {
				$uname  = $order['Name'];
				$uname .= $order['Prep']    ? ' ' . $order['Prep']    : '';
				$uname .= $order['Surname'] ? ' ' . $order['Surname'] : '';
			}
			
			//set status date to today
			$order['StatusTime'] = date('d-m-Y');

			//assign to mail template
			$oSmarty->assign('d', $order);
			$oSmarty->assign('user', $uname);
			
			//fill template and send email
			$mailer->Subject = 'ASPO Ledenportal bevestiging';
			$mailer->Body = $oSmarty->fetch('templates/user.ideal.mail.tpl');
			$mailer->AddAddress($order['Email'], $uname);
			$mailer->Send();
		}
	}
}

//delete failed orders
$months = intval($oCfg->get('purgeorders'));
if($months) {
	//prepare delete statement
	$stmt = $oDB->prepare('DELETE FROM Orders WHERE TransStatus IN("Cancelled", "Expired", "Failure") AND TransTime < NOW() - INTERVAL :months MONTH');
	$stmt->bindValue(':months', $months);
	
	if(!$stmt->execute())
		$errors .= "\rCould not purge failed orders! Database query failed!\r";
	
	//add to cron info
	$deleted = $stmt->rowCount();
	if($deleted)
		$croninfo .= "Purged $deleted failed orders that were older than $months months.\r";
}

//delete user accounts that were never used
$months = intval($oCfg->get('purgeusers'));
if($months) {
	//prepare delete statement
	$stmt = $oDB->prepare('DELETE FROM Users WHERE Registered < NOW() - INTERVAL :months MONTH AND LastLogin IS NULL');
	$stmt->bindValue(':months', $months);
	
	if(!$stmt->execute())
		$errors .= "\rCould not purge inactive user accounts! Database query failed!\r";

	//add to cron info
	$deleted = $stmt->rowCount();
	if($deleted)
		$croninfo .= "Purged $deleted inactive user accounts that were older than $months months.\r";
}

//display output
echo 'CRON Report :: ASPO Portal :: ' . date('d-m-Y');
echo "\r------------------------------------------------\r\r";

if($croninfo && $oCfg->get('cronverbose')) {
	echo "Details\r------------------------------------------------\r";
	echo $croninfo . "\r\r";
}
	
echo "Errors\r------------------------------------------------\r";
if($errors)
	echo $errors . "\r\r";
else
	echo "No errors to report.\r\r";

echo 'Cron run finished at: ', date('H:i:s');

?>