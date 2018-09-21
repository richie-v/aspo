<?php

	//check if included
	if(!defined('PortalInc')) {
		header('Location: index.php');
		exit;
	}

	//namespaces
	use iDEALConnector\iDEALConnector;
	use iDEALConnector\Configuration\DefaultConfiguration;

	use iDEALConnector\Exceptions\ValidationException;
	use iDEALConnector\Exceptions\SecurityException;
	use iDEALConnector\Exceptions\SerializationException;
	use iDEALConnector\Exceptions\iDEALException;

	//use directory namespace
	use iDEALConnector\Entities\DirectoryResponse;
	
	//use transaction namespaces
	use iDEALConnector\Entities\Transaction;
	use iDEALConnector\Entities\AcquirerTransactionResponse;

	//use status namespace
	use iDEALConnector\Entities\AcquirerStatusResponse;
	
	//include iDeal connector
	require_once("Connector/iDEALConnector.php");
	
	//determine which action to take
	switch($action) {

		default:
			//check for package ID
			if(!$_POST['packID'] || !is_numeric($_POST['packID']))
				throw new Exception('Geen bestelling gekozen!');
			
			//query package data
			$stmt = $oDB->prepare('SELECT PackID, Description, Price FROM Packages WHERE PackID = :packid');
			$stmt->bindValue(':packid', $_POST['packID']);
			if(!$stmt->execute())
				throw new Exception('Kon de bestelling niet ophalen uit de database!');
			
			//fetch package data
			$package = $stmt->fetch();
			if(!$package)
				throw new Exception('Kon bestelling niet vinden in de database!');
			
			//get issuers
			$error = "";
			$issuerdata = array();
			try
			{
				$iDEALConnector = iDEALConnector::getDefaultInstance("Connector/config.conf");
				$issuers = $iDEALConnector->getIssuers();

				//issuers in array plaatsen
				foreach($issuers->getCountries() as $country)
				{
					$cname = $country->getCountryNames();
					foreach($country->getIssuers() as $issuer) {
						$issuerdata[$cname][$issuer->getId()] = $issuer->getName();
					}
				}
			}
			catch(SerializationException $e) { $error = 'Serialisatie fout: ' . $e->getMessage(); }
			catch(SecurityException $e)      { $error = 'Authenticatie mislukt: ' . $e->getMessage(); }
			catch(ValidationException $e)    { $error = 'Validatie mislukt: ' . $e->getMessage(); }
			catch(iDEALException $e)         { $error = 'iDeal fout: ' . $e->getConsumerMessage(); }
			catch(Exception $e)              { $error = 'iDeal fout: ' . $e->getMessage(); }
			
			//display errors if any
			if($error)
				throw new Exception('Er is een fout opgetreden met iDeal: ' . $error);
			
			//display issuers list
			$oSmarty->assign('package', $package);
			$oSmarty->assign('issuerdata', $issuerdata);
			$oSmarty->assign('title', 'iDeal betaling');
			$oSmarty->display('templates/user.ideal.tpl');		
			break;
			
		case 'confirm':
			//get order ID
			if(!$_GET['id'] || !is_numeric($_GET['id']))
				throw new Exception('Geen bestelling gekozen!');
			
			//get order data from the database
			$stmt = $oDB->prepare('SELECT o.StatusTime, o.PurchaseID, o.TransID, pr.Name, p.Description, p.Price
                                   FROM Orders AS o, Products AS pr, Packages AS p
                                   WHERE o.ProdID = pr.ProdID
                                   AND o.PackID = p.PackID
                                   AND o.OrderID = :orderid
                                   AND o.TransStatus = "Success"
                                   AND o.UserID = :userid
						          ');
			$stmt->bindValue('orderid', $_GET['id']);
			$stmt->bindValue('userid', $oSelf->userid);
			
			if(!$stmt->execute())
				throw new Exception('Kon de bestelling niet ophalen uit de database!');
			
			//fetch order data
			$d = $stmt->fetch();
			if(!$d)
				throw new Exception('De bestelling kon niet worden gevonden!');

			//format to date only
			$d['StatusTime'] = date('d-m-Y', strtotime($d['StatusTime']));
			
			//assign to mail template
			$oSmarty->assign('d', $d);
			$oSmarty->assign('user', $oSelf->get('Username'));
			
			//include PHP Mailer
			require_once('includes/phpmailer/class.phpmailer.php');
			$mailer = new PHPMailer();
			$mailer->IsSendmail();
			$mailer->SetFrom($oCfg->get('webmastermail'), 'ASPO webmaster');


			//fill template and send e-mail
			$mailer->Subject = 'ASPO Ledenportal bevestiging';
			$mailer->Body = $oSmarty->fetch('templates/user.ideal.mail.tpl');
			$mailer->AddAddress($oSelf->get('Email'));
			$mailer->Send();
			
			//show confirmation page
			$oSmarty->assign('email', $oSelf->get('Email'));
			$oSmarty->assign('title', 'iDeal betaling');
			$oSmarty->display('templates/user.ideal.mail.done.tpl');	
			break;
		
		case 'sr':
			//get transaction ID
			if (isset($_GET['trxid'])) { $transactionID = $_GET['trxid']; }

			//get entrance code
			if (isset($_GET['ec'])) { $entranceCode = $_GET['ec']; }
			
			//check whether both match
			$stmt = $oDB->prepare('SELECT o.OrderID, o.UserID, p.IncMember
                                   FROM Orders AS o, Packages AS p
                                   WHERE o.PackID = p.PackID
                                   AND o.TransID = :transid
                                   AND o.EntranceCode = :entranceCode
        						  ');
			$stmt->bindValue(':transid', $transactionID);
			$stmt->bindValue(':entranceCode', $entranceCode);
			if(!$stmt->execute())
				throw new Exception('Kon de bestelling niet ophalen uit de database!');

			//fetch result
			$d = $stmt->fetch();
			if(!$d)
				throw new Exception('De bestelling kon niet worden gevonden!');
			
			//query iDeal status
			try
			{
				$iDEALConnector = iDEALConnector::getDefaultInstance("Connector/config.conf");
				$response = $iDEALConnector->getTransactionStatus($transactionID);
				$transID = $response->getTransactionID();
				$transStatus = $response->getStatus();
			}
			catch(SerializationException $e) { $error = 'Serialisatie fout: ' . $e->getMessage(); }
			catch(SecurityException $e)      { $error = 'Authenticatie mislukt: ' . $e->getMessage(); }
			catch(ValidationException $e)    { $error = 'Validatie mislukt: ' . $e->getMessage(); }
			catch(iDEALException $e)         { $error = 'iDeal fout: ' . $e->getConsumerMessage(); }
			catch(Exception $e)              { $error = 'iDeal fout: ' . $e->getMessage(); }

			//display errors if any
			if($error)
				throw new Exception('Er is een fout opgetreden met iDeal: ' . $error);
			
			//update order in database
			$stmt = $oDB->prepare('UPDATE Orders SET
                                   TransStatus = :transStatus,
                                   StatusTime = NOW()
                                   WHERE TransID = :transID
                                  ');
			$stmt->bindValue(':transStatus', $transStatus);
			$stmt->bindValue(':transID', $transID);

			if(!$stmt->execute())
				throw new Exception('Kan de status van uw bestelling status niet bijwerken!');
			
			//display order confirmation
			$oSmarty->assign('orderid', $d['OrderID']);
			$oSmarty->assign('transstatus', $transStatus);
			$oSmarty->assign('webmastermail', $oCfg->get('webmastermail'));
			$oSmarty->assign('title', 'iDeal betaling');
			$oSmarty->display('templates/user.ideal.status.tpl');		
			break;
	
		case 'st':
			//check for package ID
			if(!$_POST['packID'] || !is_numeric($_POST['packID']))
				throw new Exception('Geen bestelling gekozen!');
			
			//check issuer ID
			if(!$_POST['issuerID'])
				throw new Exception('Geen bank gekozen!');

			//get package from the database
			$stmt = $oDB->prepare('SELECT PackID, ProdID, Description, Price FROM Packages WHERE PackID = :packID');
			$stmt->bindValue(':packID', $_POST['packID']);
			$stmt->execute();
			
			//fetch the package
			$package = $stmt->fetch();
			if(!$package)
				throw new Exception('Kan de bestelling niet vinden!');
			
			
			//generate entrance code
			$purchaseID = $oSelf->userid . $package['PackID'] . time();
			$entranceCode = sha1($purchaseID);
			
			//start iDeal transaction
			try
			{
				//get expiration period from config
				$config = new DefaultConfiguration("Connector/config.conf");
				$expirationPeriod = $config->getExpirationPeriod();
				$returnURL = $config->getMerchantReturnURL();
				
				//start transaction
				$iDEALConnector = iDEALConnector::getDefaultInstance("Connector/config.conf");
				$response = $iDEALConnector->startTransaction(
					$_POST['issuerID'],
					new Transaction(
						floatval($package['Price']),
						substr($package['Description'], 0, 32),
						$entranceCode,
						$expirationPeriod,
						strval($purchaseID),
						'EUR',
						'nl'
					),
					$returnURL
				);
			}
			catch(SerializationException $e) { $error = 'Serialisatie fout: ' . $e->getMessage(); }
			catch(SecurityException $e)      { $error = 'Authenticatie mislukt: ' . $e->getMessage(); }
			catch(ValidationException $e)    { $error = 'Validatie mislukt: ' . $e->getMessage(); }
			catch(iDEALException $e)         { $error = 'iDeal fout: ' . $e->getConsumerMessage(); }
			catch(Exception $e)              { $error = 'iDeal fout: ' . $e->getMessage(); }

			//display errors if any
			if($error)
				throw new Exception('Er is een fout opgetreden met iDeal: ' . $error);

			//add order in database
			$stmt = $oDB->prepare('INSERT INTO Orders (UserID, ProdID, PackID, PurchaseID, EntranceCode, TransID, TransTime) VALUES(?,?,?,?,?,?,?)');
			$stmt->bindValue(1, $oSelf->userid);
			$stmt->bindValue(2, $package['ProdID']);
			$stmt->bindValue(3, $package['PackID']);
			$stmt->bindValue(4, $purchaseID);
			$stmt->bindValue(5, $entranceCode);
			$stmt->bindValue(6, $response->getTransactionID());
			$stmt->bindValue(7, date('Y-m-d H:i:s'));
			
			if(!$stmt->execute())
				throw new Exception('Kan de bestelling niet afronden!');
			
			//redirect
			header('Location: ' . $response->getIssuerAuthenticationURL());
			break;
	}
?>