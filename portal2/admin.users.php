<?php
	//check if included
	if(!defined('PortalInc')) {
		header('Location: index.php');
		exit;
	}

	switch($action) {
	
		case 'gu':

			//basic query
			$sql = 'SELECT u.UserID, u.Username, u.Name, u.Prep, u.Surname, MAX(p.IncMember) AS Membership, DATE_FORMAT(LastLogin, "%d-%m-%Y") AS LastLogin
					FROM Users AS u
					LEFT JOIN Orders AS o ON o.UserID = u.UserID
					LEFT JOIN Packages AS p ON o.PackID = p.PackID
					WHERE u.AuthLevel = 1
					AND (u.Username LIKE :uname OR u.Name LIKE :uname OR u.Surname LIKE :uname)
					GROUP BY u.UserID
				   ';
			
			//add membership criteria if any
			if($_GET['mmin'] && $_GET['mmax'])
				$sql .= 'HAVING Membership BETWEEN :mmin AND :mmax';
			else if($_GET['mmin'])
				$sql .= 'HAVING Membership >= :mmin';
			else if($_GET['mmax'])
				$sql .= 'HAVING Membership <= :mmax';

			//add sort options
			$fields = array('Username', 'Name', 'Surname', 'Membership', 'LastLogin');
			$sort   = 'Surname';
			$order  = 'ASC';
			
			if($_GET['sort'] && in_array($_GET['sort'], $fields)) $sort = $_GET['sort'];
			if($_GET['order'] == 'DESC') $order = 'DESC';

			$sql .= ' ORDER BY ' . $sort . ' ' . $order;
				
			//prepare and bind values
			$stmt = $oDB->prepare($sql);
			$stmt->bindValue(':uname', $_GET['uname'] . '%');			
			if($_GET['mmin']) $stmt->bindValue(':mmin', $_GET['mmin']);
			if($_GET['mmax']) $stmt->bindValue(':mmax', $_GET['mmax']);

			if(!$stmt->execute())
				die('Kon de gegevens van de gebruikers niet ophalen uit de database!');
			
			//fetch all users
			$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if($users) {
				//assign data to sub template
				$oSmarty->assign('users', $users);
				$oSmarty->assign('module', 'users');
				$oSmarty->assign('action', 'view');
			
				//generate output
				header("Content-Type: text/html; charset=ISO-8859-15");
				$oSmarty->display('templates/admin.userlist.tpl');
			}
			else {
				echo '<p><b>Geen leden gevonden die aan de zoekcriteria voldoen.</b></p>';
			}
			break;

		case 'delorder':
		
			//check ID
			if(!$_GET['oid'])
				throw new Exception('Geen betaling opgegeven om te verwijderen!');

			//delete the order
			$stmt = $oDB->prepare('DELETE FROM Orders WHERE OrderID = :oid');
			$stmt->bindValue(':oid', $_GET['oid']);
			
			if(!$stmt->execute())
				throw new Exception('Kon de betaling niet verwijderen uit de database!');
			
			//redirect to user page
			header('Location: ' . $_SERVER['PHP_SELF'] . '?m=users&a=view&uid=' . $_GET['uid']);
			break;
	
		case 'deluser':
		
			//check ID
			if(!$_GET['uid'])
				throw new Exception('Geen lid opgegeven om te verwijderen!');
			
			//create user by user ID
			$user = new User($oDB, $_GET['uid']);
						
			if(!$user)
				throw new Exception('Het lid kon niet worden gevonden in de database!');
			
			//change user details
			if(!$user->delete())
				throw new Exception('Kon het lid niet verwijderen!');
			
			//redirect to user main page
			header('Location: ' . $_SERVER['PHP_SELF'] . '?m=users');
			break;
	
		case 'reset':
			
			//check ID
			if(!$_GET['uid'])
				throw new Exception('Geen lid opgegeven om wachtwoord van te herstellen!');
			
			//create user by user ID
			$user = new User($oDB, $_GET['uid']);
						
			if(!$user)
				throw new Exception('Het lid kon niet worden gevonden in de database!');
			
			//reset password
			if($tempPass = $user->resetPassword()) {
				$tempPassEnc = $user->encPassword($tempPass);
					
				//include PHP Mailer
				require_once('includes/phpmailer/class.phpmailer.php');
				$mailer = new PHPMailer();
				$mailer->IsSendmail();
				$mailer->SetFrom($oCfg->get('webmastermail'), 'ASPO webmaster');
					
				//create body from mail template
				$oSmarty->assign('user', $result[0]['Username']);
				$oSmarty->assign('pass', $tempPass);
				$oSmarty->assign('passenc', $tempPassEnc);
				$oSmarty->assign('adres', $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
							
				//set subject and send mail
				$mailer->Subject = 'ASPO Ledenportal gegevens';
				$mailer->Body = $oSmarty->fetch('templates/login.forget.mail.tpl');
				$mailer->AddAddress($result[0]['Email']);
				$mailer->Send();
			}
			else {
				throw new Exception('Het wachtwoord kon niet worden gewijzigd in de database!');
			}
			
			//display response
			$oSmarty->assign('userid', $_GET['uid']);
			$oSmarty->assign('username', $result[0]['Username']);
			$oSmarty->assign('title', 'Lid beheren');
			$oSmarty->display('templates/admin.users.reset.done.tpl');
			break;
		
		case 'changeinfodone':
			
			//check ID
			if(!$_POST['uid'])
				throw new Exception('Geen lid opgegeven om de gegevens van te wijzigen!');

			//create user by user ID
			$user = new User($oDB, $_POST['uid']);
						
			if(!$user)
				throw new Exception('Het lid kon niet worden gevonden in de database!');			
			
			//change user details
			if(!$user->changeData($_POST))
				throw new Exception('Kon de gegevens van het lid niet aanpassen!');
			
			//redirect to user page
			header('Location: ' . $_SERVER['PHP_SELF'] . '?m=users&a=view&uid=' . $_POST['uid']);
			break;
		
		case 'changeinfo':
			
			//check ID
			if(!$_GET['uid'])
				throw new Exception('Geen lid opgegeven om gegevens van te bewerken!');
		
			//get user data
			$stmt = $oDB->prepare('SELECT * FROM Users WHERE UserID = :uid');
			$stmt->bindValue(':uid', $_GET['uid']);

			//retrieve the data
			if(!$stmt->execute())
				throw new Exception('Kon de gegevens van het lid niet ophalen uit de database!');
			
			$user = $stmt->fetch(PDO::FETCH_ASSOC);

			if(!$user)
				throw new Exception('Kon het lid niet vinden in de database!');
			
			//handle codes
			$positions = $oCfg->get('positions');
			$diets = $oCfg->get('diets');
			$countries = $oCfg->get('countries');
			foreach($countries as $k => $v) { $countries[$k] = htmlentities($v); }
			$user['CountryName'] = $countries[$user['Country']];
				
			//assign data to template
			$oSmarty->assign('user', $user);
			$oSmarty->assign('positions', $positions);
			$oSmarty->assign('diets', $diets);
			$oSmarty->assign('countries', $countries);
				
			//display user main page
			$oSmarty->assign('title', 'Lid beheren');
			$oSmarty->display('templates/admin.users.changeinfo.tpl');
			break;
		
		case 'view':
			
			//check ID
			if(!$_GET['uid'])
				throw new Exception('Geen lid opgegeven om gegevens van te bewerken!');
		
			//get user data
			$stmt = $oDB->prepare('SELECT u.*, MAX(p.IncMember) AS Membership
								     FROM Users AS u
									 LEFT JOIN Orders AS o ON o.UserID = u.UserID
									 LEFT JOIN Packages AS p ON p.PackID = o.PackID
								     WHERE u.UserID = :uid
								  ');
			$stmt->bindValue(':uid', $_GET['uid']);

			//retrieve the data
			if(!$stmt->execute())
				throw new Exception('Kon de gegevens van het lid niet ophalen uit de database!');
			
			$user = $stmt->fetch(PDO::FETCH_ASSOC);

			if(!$user)
				throw new Exception('Kon het lid niet vinden in de database!');
			
			//replace country code
			$countries = $oCfg->get('countries');
			$user['CountryName'] = $countries[$user['Country']];
			
			//get order data
			$stmt = $oDB->prepare('SELECT pr.Name, p.Description, p.Price, o.OrderID, DATE_FORMAT(o.TransTime, "%d-%m-%Y") AS Date, o.TransStatus
								   FROM Products AS pr, Packages AS p, Orders AS o
								   WHERE pr.ProdID = o.ProdID
								     AND p.PackID = o.PackID
								     AND o.UserID = :uid
								   ORDER BY o.TransTime DESC
								  ');
			$stmt->bindValue(':uid', $_GET['uid']);

			//retrieve the data
			if(!$stmt->execute())
				throw new Exception('Kon de bestellingen van het lid niet ophalen uit de database!');
			
			$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);			

			//assign to template
			$oSmarty->assign('user', $user);
			$oSmarty->assign('orders', $orders);
			$oSmarty->assign('title', 'Lid beheren');
			$oSmarty->display('templates/admin.users.view.tpl');
			break;
		
		case 'maildone':
		
			//check IDs
			if(!$_POST['ids'])
				throw new Exception('Geen leden opgegeven om gegevens van te downloaden!');

			//get IDs and create SQL placeholders
			$ids = explode(',', $_POST['ids']);
			$ph  = str_repeat('?,', count($ids) - 1) . '?';
			
			//select users from database
			$stmt = $oDB->prepare("SELECT Email FROM Users WHERE UserID IN ($ph)");
			
			//retrieve the data
			if(!$stmt->execute($ids))
				throw new Exception('Kon de gegevens van de leden niet ophalen uit de database!');
			
			//fetch result
			$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			if(!count($users))
				throw new Exception('Geen leden geselecteerd of de ledengegevens konden niet worden opgevraagd.');
				
			//include PHP Mailer
			require_once('includes/phpmailer/class.phpmailer.php');
			$mailer = new PHPMailer();
			$mailer->IsSendmail();
			
			if($_POST['from']) {
				//use sender information provided
				$mailer->SetFrom($_POST['from'], $_POST['fromname']);
			}
			else {
				//fall back to webmaster
				$mailer->SetFrom($oCfg->get('webmastermail'), 'ASPO webmaster');
			}

			//fill template and send e-mail
			$mailer->Subject = $_POST['subject'];
			$mailer->Body    = $_POST['body'];
			$mailer->AddAddress('undisclosed-recipients:;');
			
			//add BCC recipients
			foreach($users as $user) {
				$mailer->AddBCC($user['Email']);
			}
			
			//add attachment if any
			if($_FILES['attachment']['name'] != '') {
				
				//check for upload errors
				if($_FILES['attachment']['error']) {
					$code = $_FILES['attachment']['error'];
					$err = 'De attachment kon niet worden toegevoegd';
					
					switch($code) {
						case 1:
						case 2:
							$err .= ': Het bestand is te groot';
							break;
						case 3:
						case 4:
							$err .= ': Het bestand is niet of slechts gedeeltelijk ge&uuml;pload';
							break;
						case 6:
						case 7:
						case 8:
							$err .= ': Het bestand kon niet op de server geplaatst worden';
							break;
					}
											
					throw new Exception($err . '!');
				}
				
				//attach to e-mail
				$mailer->AddAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name'], 'base64', $_FILES['attachment']['type']);
			}
			
			//send mail
			$mailer->Send();
			
			//assign variables and display template
			$oSmarty->assign('prid', intval($_GET['prid']));
			$oSmarty->assign('title', 'Leden beheren');
			$oSmarty->display('templates/admin.users.mail.done.tpl');
			break;
		
		case 'mail':

			//check IDs
			if($_POST['ids'] && count($_POST['ids'])) {
				$ids  = implode(',', $_POST['ids']);
				$nids = count($_POST['ids']);
			}
			else if($_GET['uid']) {
				$ids  = intval($_GET['uid']);
				$nids = 1;
			}
			else {
				throw new Exception('Geen leden opgegeven om te mailen!');
			}
		
			$oSmarty->assign('ids', $ids);
			$oSmarty->assign('nids', $nids);
		
			//assign variables and display template
			$oSmarty->assign('title', 'Leden beheren');
			$oSmarty->display('templates/admin.users.mail.tpl');
			break;
	
		case 'download':
		
			//check IDs
			if(!$_POST['ids'] || !count($_POST['ids']))
				throw new Exception('Geen leden opgegeven om gegevens van te downloaden!');
		
			//create placeholders
			$ph = str_repeat('?,', count($_POST['ids']) - 1) . '?';

			//prepare query
			$stmt = $oDB->prepare('SELECT Name, Prep, Surname, Gender, Username, Email,
										  Affiliation, Department, Position,
										  CONCAT(Street, " ", Number, " ", Numbersup) AS Address, Postcode, City, Country,
										  Interest1, Interest2, Interest3,
										  Diet, Allergies
								   FROM Users
								   WHERE UserID IN (' . $ph . ')
								   ORDER BY Surname, Name
								  ');
			
			//retrieve the data
			if(!$stmt->execute($_POST['ids']))
				throw new Exception('Kon de gegevens van de leden niet ophalen uit de database!');
			
			//fetch result
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			if(!count($result))
				throw new Exception('Geen leden gevonden om gegevens van te downloaden!');
			
			//create header with variable names
			$data = "Naam\tTussenvoegsel\tAchternaam\tGeslacht\tLoginnaam\tEmail\tLidmaatschap\tInstelling\tDepartement\tAanstelling\tAdres\tPostcode\tStad\tLand\tInteresse1\tInteresse2\tInteresse3\tDieet\tAllergie\r";
			
			//add data
			foreach($result as $row) {
				//look up country
				$countries = $oCfg->get('countries');
				$row['Country'] = $countries[$row['Country']];
			
				//create data row
				$data .= '"' . join("\"\t\"", $row) . "\"\r";
			}

			//output TSV file
			header('Pragma: public');
			header('Expires: -1');
			header('Cache-Control: public, must-revalidate, post-check=0, pre-check=0');
			header('Content-Disposition: attachment; filename="Leden.txt"');
			header('Content-Type: text/csv; charset=utf-8');
			echo $data;
			break;
	
		default:

			//generate output
			$oSmarty->assign('title', 'Leden beheren');
			$oSmarty->display('templates/admin.users.tpl');	
			break;
	}
?>