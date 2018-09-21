<?php
	//check if included
	if(!defined('PortalInc')) {
		header('Location: index.php');
		exit;
	}
	
	//concatenate helper function
	//skips empty values
	function conc() {
		if(func_num_args() < 3)
			return false;
		
		$vals = func_get_args();
		$del = array_shift($vals);
		
		$str = '';
		foreach($vals as $v) {
			if($v)
				$str .= ($str ? $del : '') . $v;
		}
		return $str;
	}	

	switch($action) {

		default:
			//check number of committees
			if(count($oSelf->committees) == 1) {
				//redirect if in only one committee
				header('Location: ' . $_SERVER['PHPSELF'] . '?m=comm&a=view&prid=' . $oSelf->committees[0]);
			}
			else {
				//pick conference
				$prids = join(',', $oSelf->committees);
				
				//get conference data
				$query = 'SELECT ProdID, Name
						  FROM Products
						  WHERE ProdID IN (' . $prids . ')
						 ';
				$result = $oDB->query($query);
				
				//check for errors
				if(!$result)
					throw new Exception('Kan de congresgegevens niet opvragen!');
					
				//fetch data
				$products = $result->fetchAll();
				
				//display template
				$oSmarty->assign('products', $products);
				$oSmarty->assign('title', 'Commissies');
				$oSmarty->display('templates/user.comm.tpl');
			}
			
			break;
	
		case 'download':
			
			//check for product ID
			if(!$_GET['prid'] || !is_numeric($_GET['prid']))
				throw new Exception('Geen congres opgegeven om te downloaden!');

			//sanitize input
			$prid = intval($_GET['prid']);
				
			//check if user indeed is part of the committee
			if(!in_array($prid, $oSelf->committees))
				throw new Exception('U maakt geen deel uit van de opgegeven commissie!');
				
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
			$stmt->bindValue(':prid', $prid);
			if(!$stmt->execute())
				throw new Exception('Kon de gegevens van het congres niet ophalen uit de database!');
			
			//create header with variable names
			$data = "Naam\tTussenvoegsel\tAchternaam\tEmail\tInstelling\tDepartement\tAanstelling\tAdres\tPostcode\tStad\tLand\tDieet\tAllergie\tBeschrijving\tBetaald\tDatum\r";
            
			//add data
			while($row = $stmt->fetch()) {
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

		case 'mail':
			//check for product ID
			if(!$_GET['prid'] || !is_numeric($_GET['prid']))
				throw new Exception('Geen congres opgegeven om de ingeschreven leden van te mailen!');

			//sanitize input
			$prid = intval($_GET['prid']);
				
			//check if user indeed is part of the committee
			if(!in_array($prid, $oSelf->committees))
				throw new Exception('U maakt geen deel uit van de opgegeven commissie!');
			
			//concat names
			$fromname = conc(' ', $oSelf->get('Name'), $oSelf->get('Prep'), $oSelf->get('Surname'));
			$from = $oSelf->get('Email');

			//defaults
			if(!$fromname) $fromname = 'ASPO';
			if(!$from) $from = 'info@sociale-psychologie.nl';
			
			//assign variables and display template
			$oSmarty->assign('fromname', $fromname);
			$oSmarty->assign('from', $from);
			$oSmarty->assign('prid', $prid);
			
			$oSmarty->assign('title', 'Commissies');
			$oSmarty->display('templates/user.comm.mail.tpl');
			
			break;
		
		case 'maildone':
			//check for product ID
			if(!$_GET['prid'] || !is_numeric($_GET['prid']))
				throw new Exception('Geen congres opgegeven om de ingeschreven leden van te mailen!');

			//sanitize input
			$prid = intval($_GET['prid']);
				
			//check if user indeed is part of the committee
			if(!in_array($prid, $oSelf->committees))
				throw new Exception('U maakt geen deel uit van de opgegeven commissie!');
				
			//get registered members
			$stmt = $oDB->prepare('SELECT u.Email
                                   FROM Users AS u, Orders AS o
                                   WHERE o.UserID = u.UserID
                                   AND o.ProdID = :prid
                                   AND o.TransStatus = "Success"
                                  ');
			$stmt->bindValue(':prid', $prid);
			if(!$stmt->execute())
				throw new Exception('Kon de voor dit congres ingeschreven leden niet ophalen uit de database!');
			
			//retrieve recipient email addresses
			$recipients = $stmt->fetchAll();
			if(!$recipients)
				throw new Exception('Geen leden ingeschreven of de ledengegevens konden niet worden opgevraagd.');
	
			//include PHP Mailer
			require_once('includes/phpmailer/class.phpmailer.php');
			$mailer = new PHPMailer();
			$mailer->IsSendmail();
			
			//sender information
			if($_POST['from'])
				$mailer->SetFrom($_POST['from'], $_POST['fromname']);
			else
				$mailer->SetFrom('info@sociale-psycholoie.nl', 'ASPO');

			//fill template and send e-mail
			$mailer->Subject = $_POST['subject'];
			$mailer->Body = $_POST['body'];
			$mailer->AddAddress('undisclosed-recipients:;');
			
			//add recipients in BCC
			foreach($recipients as $r) {
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
			$oSmarty->assign('prid', $prid);
			$oSmarty->assign('title', 'Commissies');
			$oSmarty->display('templates/user.comm.mail.done.tpl');
				
			break;
			
		case 'view':
			//check for product id
			if(!$_GET['prid'] || !is_numeric($_GET['prid']))
				throw new Exception('Geen congres opgegeven om te bekijken!');
		
			//sanitize input
			$prid = intval($_GET['prid']);
			
			//check if user indeed is part of the committee
			if(!in_array($prid, $oSelf->committees))
				throw new Exception('U maakt geen deel uit van de opgegeven commissie!');
	
		
			//get conference data from database
			$stmt = $oDB->prepare('SELECT p.Description, p.Price, COUNT(o.OrderID) AS TimesSold
                                   FROM Packages AS p
                                   LEFT JOIN Orders AS o ON o.PackID = p.PackID
                                   AND o.TransStatus = "Success"
                                   WHERE p.ProdID = :prid
                                   GROUP BY p.PackID
                                  ');
			$stmt->bindValue(':prid', $prid);
			if(!$stmt->execute())
				throw new Exception('Kon de gegevens van het congres niet ophalen uit de database!');
			
			//retrieve conference data
			$pinfo = $stmt->fetchAll();
			if($pinfo) {
				$totsold = 0;
				$totprice = 0;
				
				foreach($pinfo as $p) {
					//add to totals
					$totsold  += $p['TimesSold'];
					$totprice += ($p['Price'] * $p['TimesSold']);
				}
			
				//assign data to template
				$oSmarty->assign('TotSold', $totsold);
				$oSmarty->assign('TotPrice', $totprice);	
				$oSmarty->assign('pinfo', $pinfo);	
			}

			//display template
			$oSmarty->assign('ProdID', $prid);
			$oSmarty->assign('title', 'Commissies');
			$oSmarty->display('templates/user.comm.view.tpl');
			break;
	}
?>