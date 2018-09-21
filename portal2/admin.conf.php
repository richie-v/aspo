<?php
	//check if included
	if(!defined('PortalInc')) {
		header('Location: index.php');
		exit;
	}

	switch($action) {

		case 'gu':
			
			//select only users not yet registered
			$stmt = $oDB->prepare('SELECT u.UserID, u.Username, u.Name, u.Prep, u.Surname, u.Position
								   FROM Users AS u
								   WHERE AuthLevel = 1
								   AND NOT EXISTS (
									 SELECT *
									 FROM Orders AS o
									 WHERE o.ProdID = :prid
									 AND o.UserID = u.UserID
									 AND o.TransStatus = "Success"
								   )
								   AND (Username LIKE :uname OR Name LIKE :uname OR Surname LIKE :uname)
								   ORDER BY Surname, Name
								  ');
			$stmt->bindValue(':prid', $_GET['prid']);
			$stmt->bindValue(':uname', $_GET['n'] . '%');

			if(!$stmt->execute())
				die('Kon de gegevens van het congres niet ophalen uit de database!');
			
			//fetch all users
			$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			if($users) {
				//assign data to subtemplate
				$oSmarty->assign('users', $users);
				$oSmarty->assign('prid', $_GET['prid']);
				$oSmarty->assign('module', 'conf');
				$oSmarty->assign('action', 'reg');
			
				//generate output
				header("Content-Type: text/html; charset=ISO-8859-15");
				$oSmarty->display('templates/admin.userselect.tpl');
			}
			else {
				echo '<p><b>Geen leden gevonden die aan de zoekcriteria voldoen.</b></p>';
			}

			break;
		
		case 'scu':
	
			//select only users not in committee
			$stmt = $oDB->prepare('SELECT u.UserID, u.Username, u.Name, u.Prep, u.Surname, u.Position
								   FROM Users AS u
								   WHERE AuthLevel = 1
								   AND NOT EXISTS (
									 SELECT CommID
									 FROM Committees AS c
									 WHERE c.UserID = u.UserID
									 AND c.ProdID = :prid
								   )
								   AND (Username LIKE :uname OR Name LIKE :uname OR Surname LIKE :uname)
								   ORDER BY Surname, Name
								  ');
			$stmt->bindValue(':prid', $_GET['prid']);
			$stmt->bindValue(':uname', $_GET['n'] . '%');

			if(!$stmt->execute())
				die('Kon de gegevens van het congres niet ophalen uit de database!');
			
			//fetch all users
			$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			if($users) {
				//assign data to subtemplate
				$oSmarty->assign('users', $users);
				$oSmarty->assign('prid', $_GET['prid']);
				$oSmarty->assign('module', 'conf');
				$oSmarty->assign('action', 'commadd');
			
				//generate output
				header("Content-Type: text/html; charset=ISO-8859-15");
				$oSmarty->display('templates/admin.userselect.tpl');
			}
			else {
				echo '<p><b>Geen leden gevonden die aan de zoekcriteria voldoen.</b></p>';
			}

			break;
	
		case 'commadd':
		
			//check if both IDs are present
			if(!isset($_GET['prid']) || !isset($_GET['uid']))
				throw new Exception('Geen congres of gebruiker geselecteerd!');
		
			//insert into database
			$stmt = $oDB->prepare('INSERT INTO Committees (ProdID, UserID) VALUES(:prid, :uid)');
			$stmt->bindValue(':prid', $_GET['prid']);
			$stmt->bindValue(':uid', $_GET['uid']);
			
			//check for errors
			if(!$stmt->execute())
				throw new Exception('Kon de gebruiker niet toevoegen aan de commissie.');
		
			//redirect to overview
			header('Location: ' . $_SERVER['PHPSELF'] . '?m=conf&a=comm&prid=' . $_GET['prid']);
		
			break;
	
		case 'commdel':
		
			//check if both IDs are present
			if(!isset($_GET['prid']) || !isset($_GET['uid']))
				throw new Exception('Geen congres of gebruiker geselecteerd!');
		
			//delete from database
			$stmt = $oDB->prepare('DELETE FROM Committees WHERE ProdID = :prid AND UserID = :uid');
			$stmt->bindValue(':prid', $_GET['prid']);
			$stmt->bindValue(':uid', $_GET['uid']);

			//check for errors
			if(!$stmt->execute())
				throw new Exception('Kon de gebruiker niet verwijderen uit de commissie.');
		
			//redirect to overview
			header('Location: ' . $_SERVER['PHPSELF'] . '?m=conf&a=comm&prid=' . $_GET['prid']);

			break;
	
		case 'comm':

			//check if ID is present
			if(!isset($_GET['prid']) || !is_numeric($_GET['prid']))
				throw new Exception('Geen congres geselecteerd!');

			$stmt = $oDB->prepare('SELECT u.UserID, u.Username, u.Name, u.Prep, u.Surname, u.Email
								   FROM Users AS u, Committees AS c
								   WHERE c.UserID = u.UserID
								   AND c.ProdID = :prid
								  ');
			$stmt->bindValue(':prid', $_GET['prid']);
			if(!$stmt->execute())
				throw new Exception('Kan de commissiegegevens niet opvragen');
			
			//get results
			$comm = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			//assign to template
			$oSmarty->assign('comm', $comm);
			$oSmarty->assign('prid', intval($_GET['prid']));
		
			//generate output
			$oSmarty->assign('title', 'Congressen beheren');
			$oSmarty->display('templates/admin.conf.committee.tpl');
			
			break;
		
		case 'editdone':
			
			//convert dates
			$startdate = date('Y-m-d', strtotime($_POST['StartDate']));
			$startreg  = date('Y-m-d', strtotime($_POST['StartReg']));
			$endreg    = date('Y-m-d', strtotime($_POST['EndReg']));
			
			//add new product or update existing one
			if(isset($_POST['ProdID'])) {
				//update existing product
				$stmt = $oDB->prepare('UPDATE Products SET Name = :name, Location = :loc, Remarks = :remark, StartDate = :sdate, StartReg = :sreg, EndReg = :ereg WHERE ProdID = :prid');
				$stmt->bindValue(':prid', $_POST['ProdID']);
			}
			else {
				//insert new product
				$stmt = $oDB->prepare('INSERT INTO Products (Type, Name, Location, Remarks, StartDate, StartReg, EndReg) VALUES(1, :name, :loc, :remark, :sdate, :sreg, :ereg)');
			}

			//bind values
			$stmt->bindValue(':name', $_POST['Name']);
			$stmt->bindValue(':loc', $_POST['Location']);
			$stmt->bindValue(':remark', $_POST['Remarks']);
			$stmt->bindValue(':sdate', $startdate);
			$stmt->bindValue(':sreg', $startreg);
			$stmt->bindValue(':ereg', $endreg);

			//execute statement
			if(!$stmt->execute())
				throw new Exception('Het congres kon niet worden aangepast of ingevoerd in de database!');
				
			//update existing packages
			if(isset($_POST['expacks']) && count($_POST['expacks'])) {
					
				//prepare statement
				$stmt = $oDB->prepare('UPDATE Packages SET Description = :desc, AvStudent = :avstd, AvPhD = :avphd, AvMember = :avmem, Price = :price, IncMember = :incmem WHERE PackID = :pid');
					
				foreach($_POST['expacks'] as $pid => $p) {
					//data type casts
					$p['IncMember'] = $p['IncMember'] ? $p['IncMember'] : null;
					$p['AvStudent'] = $p['AvStudent'] ? 1 : 0;
					$p['AvPhD']		= $p['AvPhD'] 	 ? 1 : 0;
					$p['AvMember']	= $p['AvMember']  ? 1 : 0;

					//bind values to statement
					$stmt->bindValue(':desc', $p['Description']);
					$stmt->bindValue(':avstd', $p['AvStudent']);
					$stmt->bindValue(':avphd', $p['AvPhD']);
					$stmt->bindValue(':avmem', $p['AvMember']);
					$stmt->bindValue(':price', $p['Price']);
					$stmt->bindValue(':incmem', $p['IncMember']);
					$stmt->bindValue(':pid', $pid);
						
					if(!$stmt->execute())
						throw new Exception('De prijsopties konden niet worden aangepast!');
				}
			}

			//add new packages (if any)
			if(isset($_POST['newpacks']) && count($_POST['newpacks'])) {

				//get product ID from $_POST or last insert
				$prid = isset($_POST['ProdID']) ? $_POST['ProdID'] : $oDB->lastInsertId();

				//prepare statement
				$stmt = $oDB->prepare('INSERT INTO Packages (ProdID, Description, AvStudent, AvPhD, AvMember, Price, IncMember) VALUES(:prid, :desc, :avstd, :avphd, :avmem, :price, :incmem)');
				
				//add packages
				foreach($_POST['newpacks'] as $p) {
					//data type casts
					if(!$p['IncMember']) $p['IncMember'] = NULL;
					$p['AvStudent']    = $p['AvStudent'] ? 1 : 0;
					$p['AvPhD']		   = $p['AvPhD']	 ? 1 : 0;
					$p['AvMember']	   = $p['AvMember']  ? 1 : 0;
					
					//bind values to statement
					$stmt->bindValue(':desc', $p['Description']);
					$stmt->bindValue(':avstd', $p['AvStudent']);
					$stmt->bindValue(':avphd', $p['AvPhD']);
					$stmt->bindValue(':avmem', $p['AvMember']);
					$stmt->bindValue(':price', $p['Price']);
					$stmt->bindValue(':incmem', $p['IncMember']);
					$stmt->bindValue(':prid', $prid);
					
					if(!$stmt->execute())
						throw new Exception('De prijsopties konden niet worden toegevoegd!');
				}
			}
			
			//redirect to conference main page
			header('Location: ' . $_SERVER['PHP_SELF'] . '?m=conf');
						
			break;
	
		case 'edit':
			
			//check for product id
			if(!isset($_GET['prid']))
				throw new Exception('Geen congres opgegeven om te bewerken!');

			$stmt = $oDB->prepare('SELECT * FROM Products WHERE ProdID = :prid');
			$stmt->bindValue(':prid', $_GET['prid']);
			
			if(!$stmt->execute())
				throw new Exception('Kon de gegevens van het congres niet ophalen uit de database!');
			
			//fetch product data
			$conf = $stmt->fetch();
			if(!count($conf))
				throw new Exception('Het congres kon niet gevonden worden!');

			//convert dates
			$startdate = date('d-m-Y', strtotime($conf['StartDate']));
			$startreg  = date('d-m-Y', strtotime($conf['StartReg']));
			$endreg    = date('d-m-Y', strtotime($conf['EndReg']));
			
			//assign to template
			$oSmarty->assign('ProdID', $conf['ProdID']);
			$oSmarty->assign('Name', $conf['Name']);
			$oSmarty->assign('Location', $conf['Location']);
			$oSmarty->assign('StartDate', $startdate);
			$oSmarty->assign('StartReg', $startreg);
			$oSmarty->assign('EndReg', $endreg);
			$oSmarty->assign('Remarks', $conf['Remarks']);
			
			//query associated packages
			$stmt = $oDB->prepare('SELECT p.*, COUNT(o.OrderID) AS TimesSold
								   FROM Packages AS p
								   LEFT JOIN Orders AS o ON p.PackID = o.PackID
								   AND o.TransStatus = "Success"
								   WHERE p.ProdID = :prid
								   GROUP BY p.PackID
								  ');
			$stmt->bindValue(':prid', $_GET['prid']);

			if(!$stmt->execute())
				throw new Exception('Kon de gegevens van de prijsopties niet ophalen uit de database!');
			
			//fetch packages if any
			$packages = $stmt->fetchAll(PDO::FETCH_ASSOC);

			//assign to template
			$oSmarty->assign('newindex', 0);
			$oSmarty->assign('packvar', 'expacks');
			$oSmarty->assign('packages', $packages);

			//assign jQuery UI script en styles
			$oSmarty->assign('scripts', array('includes/jquery/jquery-ui.js', 'includes/jquery/jquery.ui.datepicker-nl.js'));
			$oSmarty->assign('styles', array('styles/jquery-ui.css'));

			$oSmarty->assign('LockSold', $oCfg->get('locksold'));
			$oSmarty->assign('title', 'Congressen beheren');
			$oSmarty->display('templates/admin.conf.edit.tpl');
			
			break;
	
		case 'new':
			
			//set defaults
			$y = date('Y');
			$oSmarty->assign('Name', 'ASPO congres ' . $y);
			$oSmarty->assign('StartDate', '01-12-' . $y);
			$oSmarty->assign('StartReg', date('d-m-Y'));
			$oSmarty->assign('EndReg', '01-12-' . $y);
		
			//add default packages
			$packages = array();
			$packages[] = array('PackID' => 0, 'Description' => "Congres", 'AvMember' => 1, 'IncMember' => $y + 1);
			$packages[] = array('PackID' => 1, 'Description' => "Congres met diner", 'AvMember' => 1, 'IncMember' => $y + 1);
			$packages[] = array('PackID' => 2, 'Description' => "Congres - Promovendus", 'AvPhD' => 1, 'IncMember' => $y + 1);
			$packages[] = array('PackID' => 3, 'Description' => "Congres met diner - Promovendus", 'AvPhD' => 1, 'IncMember' => $y + 1);
			$packages[] = array('PackID' => 4, 'Description' => "Congres - Student", 'AvStudent' => 1);
			$packages[] = array('PackID' => 5, 'Description' => "Congres met diner - Student", 'AvStudent' => 1);

			//assign to template
			$oSmarty->assign('newindex', 5);
			$oSmarty->assign('packvar', 'newpacks');
			$oSmarty->assign('packages', $packages);
							 
			//assign jQuery UI script en styles
			$oSmarty->assign('scripts', array('includes/jquery/jquery-ui.js', 'includes/jquery/jquery.ui.datepicker-nl.js'));
			$oSmarty->assign('styles', array('styles/jquery-ui.css'));
		
			$oSmarty->assign('title', 'Congressen beheren');
			$oSmarty->display('templates/admin.conf.edit.tpl');
			
			break;

		case 'maildone':

			//check for product ID
			if(!isset($_GET['prid']))
				throw new Exception('Geen congres opgegeven om de ingeschreven leden van te mailen!');

			//get registered members
			$stmt = $oDB->prepare('SELECT u.Email
								   FROM Users AS u, Orders AS o
								   WHERE o.UserID = u.UserID
								   AND o.ProdID = :prid
								   AND o.TransStatus = "Success"
								  ');
			$stmt->bindValue(':prid', $_GET['prid']);
			
			if(!$stmt->execute())
				throw new Exception('Kon de gegevens van de leden niet ophalen uit de datbase!');
			
			//fetch results
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			if(!count($result))
				throw new Exception('Geen leden ingeschreven of de ledengegevens konden niet worden opgevraagd.');

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
			$mailer->Body = $_POST['body'];
			$mailer->AddAddress('undisclosed-recipients:;');
			
			//add BCC recipients
			foreach($result as $r) {
				$mailer->AddBCC($r['Email']);
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
			$oSmarty->assign('title', 'Congressen beheren');
			$oSmarty->display('templates/admin.conf.mail.done.tpl');
			break;
			
		case 'mail':

			//check for product ID
			if(!isset($_GET['prid']))
				throw new Exception('Geen congres opgegeven om de ingeschreven leden van te mailen!');

			//assign variables and display template
			$oSmarty->assign('prid', intval($_GET['prid']));
			$oSmarty->assign('title', 'Congressen beheren');
			$oSmarty->display('templates/admin.conf.mail.tpl');
			break;
			
		case 'download':
			
			//check for product ID
			if(!isset($_GET['prid']))
				throw new Exception('Geen congres opgegeven om te downloaden!');

			//get subscribed members from database
			$stmt = $oDB->prepare('SELECT u.Name, u.Prep, u.Surname, u.Email,
								     u.Affiliation, u.Department, u.Position,
								   	 CONCAT(u.Street, " ", u.Number, " ", u.Numbersup) AS Address, u.Postcode, u.City, u.Country,
								   	 u.Diet, u.Allergies,
								   	 p.Description, p.Price,
								   	 o.TransTime
								   FROM Users AS u, Packages AS p, Orders AS o
								   WHERE o.ProdID = :prid
								   AND o.PackID = p.PackID
								   AND o.TransStatus = "Success"
								   AND o.UserID = u.UserID
								   ORDER BY u.Surname, u.Name
								  ');
			$stmt->bindValue(':prid', $_GET['prid']);
			
			if(!$stmt->execute())
				throw new Exception('Kon de gegevens van de leden niet ophalen uit de database!');
			
			//fetch result
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			if(!count($result))
				throw new Exception('Er zijn geen inschrijvingen voor dit congres!');
            
			//create header with variable names
			$data = "Naam\tTussenvoegsel\tAchternaam\tEmail\tInstelling\tDepartement\tAanstelling\tAdres\tPostcode\tStad\tLand\tDieet\tAllergie\tBeschrijving\tBetaald\tDatum\r";
            
			//add data
			foreach($result as $row) {
				//look up country
				$countries = $oCfg->get('countries');
				$row['Country'] = $countries[$row['Country']];
			
				//create data row
				$data .= '"' . join("\"\t\"", $row) . "\"\r";
			}
			
			//send output to browser
			header('Pragma: public');
			header('Expires: -1');
			header('Cache-Control: public, must-revalidate, post-check=0, pre-check=0');
			header('Content-Disposition: attachment; filename="Inschrijvingen.txt"');
			header('Content-Type: plain/text; charset=utf-8');
		    
			//return result as TSV file
			echo $data;
			
			break;
		
		case 'reg':
			
			if(!isset($_GET['prid']))
				throw new Exception('Geen congres opgegeven om het lid voor in te schrijven!');
			
			//user selected
			if(isset($_GET['uid'])) {		
				
				//package selected
				if(isset($_GET['pid'])) {
					
					//put order in database
					$stmt = $oDB->prepare('INSERT INTO Orders (ProdID, PackID, UserID, TransStatus, TransTime, StatusTime) VALUES(:prid, :pid, :uid, "Success", NOW(), NOW())');
					$stmt->bindValue(':prid', $_GET['prid']);
					$stmt->bindValue(':pid', $_GET['pid']);
					$stmt->bindValue(':uid', $_GET['uid']);
					
					if(!$stmt->execute())
						throw new Exception('Kon de inschrijving niet opslaan in de database.');
						
					//show confirmation
					$oSmarty->assign('prid', $_GET['prid']);
					$oSmarty->assign('title', 'Lid ingeschreven');
					$oSmarty->display('templates/admin.conf.reg.done.tpl');
				}
				else {
					
					//select user
					$stmt = $oDB->prepare('SELECT Username, Name, Prep, Surname, Position
										   FROM Users
										   WHERE UserID = :uid
										  ');
					$stmt->bindValue(':uid', $_GET['uid']);
					
					if(!$stmt->execute())
						throw new Exception('Kon het lid niet vinden in de database!');
					
					//fetch user data
					$user = $stmt->fetch();
					
					//determine availability field
					$field = 'AvMember';
					if($user['Position'] == 'Student')			$field = 'AvStudent';
					else if($user['Position'] == 'Promovendus')	$field = 'AvPhD';

					//select package
					$stmt = $oDB->prepare('SELECT PackID, Description, Price, IncMember
										   FROM Packages
										   WHERE ProdID = :prid
										   AND ' . $field . ' = 1
										  ');
					$stmt->bindValue(':prid', $_GET['prid']);
					
					if(!$stmt->execute())
						throw new Exception('Kon de prijsopties niet ophalen uit de database!');
						
					//fetch packages					
					$packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
					
					//select package
					$oSmarty->assign('prid', $_GET['prid']);
					$oSmarty->assign('uid', $_GET['uid']);
					$oSmarty->assign('user', $user);
					$oSmarty->assign('packages', $packages);
					$oSmarty->assign('title', 'Lid inschrijven');
					$oSmarty->display('templates/admin.conf.reg.pack.tpl');
				}
			}
			else {
				//select user
				$oSmarty->assign('title', 'Lid inschrijven');
				$oSmarty->assign('prid', $_GET['prid']);
				$oSmarty->display('templates/admin.conf.reg.user.tpl');
			}
			break;
		
		case 'view':

			//check for product id
			if(!isset($_GET['prid']))
				throw new Exception('Geen congres opgegeven om te bekijken!');
		
			$stmt = $oDB->prepare('SELECT p.Description, p.Price, COUNT(o.OrderID) AS TimesSold
								   FROM Packages AS p
								   LEFT JOIN Orders AS o ON o.PackID = p.PackID
								   AND o.TransStatus = "Success"
								   WHERE p.ProdID = :prid
								   GROUP BY p.PackID
								  ');
			$stmt->bindValue(':prid', $_GET['prid']);
			
			if(!$stmt->execute())
				throw new Exception('Kon de gegevens van het congres niet ophalen uit de database!');
			
			$packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			//calculate totals
			$totsold = 0;
			$totprice = 0;
			$pinfo = array();
			foreach($packages as $p) {
				//add to totals
				$totsold += $p['TimesSold'];
				$totprice += ($p['Price'] * $p['TimesSold']);
			}
			
			//assign package data to template
			$oSmarty->assign('totsold', $totsold);
			$oSmarty->assign('totprice', $totprice);	
			$oSmarty->assign('pinfo', $packages);	
		
			//generate output
			$oSmarty->assign('prid', $_GET['prid']);
			$oSmarty->assign('title', 'Congressen beheren');
			$oSmarty->display('templates/admin.conf.view.tpl');

			break;
		
		case 'delete':
		
			//delete the product
			$stmt = $oDB->prepare('DELETE FROM Products WHERE ProdID = :prid');
			$stmt->bindValue(':prid', $_GET['prid']);
			
			if(!$stmt->execute())
				throw new Exception('Kon het congres niet verwijderen!');

			//redirect to conference overview
			header('Location: ' . $_SERVER['PHPSELF'] . '?m=conf');
				
			break;
		
		default:
	
			//get congress info from database
			$query = 'SELECT pr.ProdID, pr.Name, COUNT(o.OrderID) AS TimesSold 
					  FROM Products AS pr
					  LEFT JOIN Orders AS o ON pr.ProdID = o.ProdID
					  AND o.TransStatus = "Success"
					  WHERE pr.Type = 1
					  GROUP BY pr.ProdID
					  ORDER BY pr.StartDate DESC
					 ';
			$result = $oDB->query($query);

			if(!$result)
				throw new Exception('Kon de congresgegevens niet ophalen uit de database!');
			
			//fetch product data
			$cdata = $result->fetchAll(PDO::FETCH_ASSOC);
			
			//generate output
			$oSmarty->assign('cdata', $cdata);
			$oSmarty->assign('LockSold', $oCfg->get('locksold'));
			$oSmarty->assign('title', 'Congressen beheren');
			$oSmarty->display('templates/admin.conf.tpl');
			break;

	}
?>