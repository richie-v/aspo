<?php
	//check if included
	if(!defined('PortalInc')) {
		header('Location: index.php');
		exit;
	}

	switch($action) {

		case 'gu':
			
			//select only users without a membership
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
				$oSmarty->assign('module', 'mship');
				$oSmarty->assign('action', 'reg');
			
				//generate output
				header("Content-Type: text/html; charset=ISO-8859-15");
				$oSmarty->display('templates/admin.userselect.tpl');
			}
			else {
				echo '<p><b>Geen leden gevonden die aan de zoekcriteria voldoen.</b></p>';
			}
			break;
		
		case 'editdone':
			
			//convert and set default values
			$y = intval($_POST['Year']);
			$name = 'Lidmaatschap ' . $y;
			$startdate = $y . '-01-01';
			$startreg  = date('Y-m-d', strtotime($_POST['StartReg']));
			$endreg    = date('Y-m-d', strtotime($_POST['EndReg']));
			
			//add new product or update existing one
			if(isset($_POST['ProdID'])) {
				//update existing product
				$stmt = $oDB->prepare('UPDATE Products SET Name = :name, StartDate = :sdate, StartReg = :sreg, EndReg = :ereg WHERE ProdID = :prid');
				$stmt->bindValue(':prid', $_POST['ProdID']);
			}
			else {
				//insert new product
				$stmt = $oDB->prepare('INSERT INTO Products (Type, Name, StartDate, StartReg, EndReg) VALUES(2, :name, :sdate, :sreg, :ereg)');
			}

			//bind values
			$stmt->bindValue(':name',  $name);
			$stmt->bindValue(':sdate', $startdate);
			$stmt->bindValue(':sreg',  $startreg);
			$stmt->bindValue(':ereg',  $endreg);

			//execute statement
			if(!$stmt->execute())
				throw new Exception('Het lidmaatschap kon niet worden aangepast of ingevoerd in de database!');
				
			//update existing packages
			if(isset($_POST['expacks']) && count($_POST['expacks'])) {
					
				//prepare statement
				$stmt = $oDB->prepare('UPDATE Packages SET Description = :desc, AvStudent = :avstd, AvPhD = :avphd, AvMember = :avmem, Price = :price, IncMember = :incmem WHERE PackID = :pid');
					
				foreach($_POST['expacks'] as $pid => $p) {
					//data type casts
					$p['IncMember'] = $p['IncMember'] ? $p['IncMember'] : null;
					$p['AvStudent'] = $p['AvStudent'] ? 1 : 0;
					$p['AvPhD']		= $p['AvPhD'] 	  ? 1 : 0;
					$p['AvMember']	= $p['AvMember']  ? 1 : 0;

					//bind values to statement
					$stmt->bindValue(':desc',   $p['Description']);
					$stmt->bindValue(':avstd',  $p['AvStudent']);
					$stmt->bindValue(':avphd',  $p['AvPhD']);
					$stmt->bindValue(':avmem',  $p['AvMember']);
					$stmt->bindValue(':price',  $p['Price']);
					$stmt->bindValue(':incmem', $_POST['Year']);
					$stmt->bindValue(':pid',    $pid);
						
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
					$stmt->bindValue(':incmem', $_POST['Year']);
					$stmt->bindValue(':prid', $prid);
					
					if(!$stmt->execute())
						throw new Exception('De prijsopties konden niet worden toegevoegd!');
				}
			}
			
			//redirect to conference main page
			header('Location: ' . $_SERVER['PHP_SELF'] . '?m=mship');
			break;
	
		case 'edit':
			
			//check for product id
			if(!isset($_GET['prid']))
				throw new Exception('Geen lidmaatschap opgegeven om te bewerken!');

			$stmt = $oDB->prepare('SELECT * FROM Products WHERE ProdID = :prid');
			$stmt->bindValue(':prid', $_GET['prid']);
			
			if(!$stmt->execute())
				throw new Exception('Kon de gegevens van het lidmaatschap niet ophalen uit de database!');
			
			//fetch product data
			$mship = $stmt->fetch();
			if(!count($mship))
				throw new Exception('Het lidmaatschap kon niet gevonden worden!');

			//convert dates
			$year	  = date('Y',     strtotime($mship['StartDate']));
			$startreg = date('d-m-Y', strtotime($mship['StartReg']));
			$endreg   = date('d-m-Y', strtotime($mship['EndReg']));
			
			//assign to template
			$oSmarty->assign('ProdID', $mship['ProdID']);
			$oSmarty->assign('Year', $year);
			$oSmarty->assign('StartReg', $startreg);
			$oSmarty->assign('EndReg', $endreg);
			
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
			$oSmarty->display('templates/admin.mship.edit.tpl');
			break;
	
		case 'new':
			
			//set defaults for year and registration dates
			$y = date('Y') + 1;
			$oSmarty->assign('Year', $y);
			$oSmarty->assign('StartReg', date('d-m-Y'));
			$oSmarty->assign('EndReg', '01-10-' . $y);
		
			//add default packages
			$packages = array();
			$packages[0] = array('PackID' => 0, 'Description' => "Lidmaatschap", 'AvMember' => 1);
			$packages[1] = array('PackID' => 1, 'Description' => "Lidmaatschap - Promovendus", 'AvPhD' => 1);
			
			//assign to template
			$oSmarty->assign('newindex', 2);
			$oSmarty->assign('packvar', 'newpacks');
			$oSmarty->assign('packages', $packages);
							 
			//assign jQuery UI script en styles
			$oSmarty->assign('scripts', array('includes/jquery/jquery-ui.js', 'includes/jquery/jquery.ui.datepicker-nl.js'));
			$oSmarty->assign('styles', array('styles/jquery-ui.css'));
		
			$oSmarty->assign('title', 'Lidmaatschappen beheren');
			$oSmarty->display('templates/admin.mship.edit.tpl');
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
				throw new Exception('Er zijn geen leden gevonden met dit lidmaatschap!');
            
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
			header('Content-Disposition: attachment; filename="Lidmaatschappen.txt"');
			header('Content-Type: plain/text; charset=utf-8');
		    
			//return result as TSV file
			echo $data;
			break;
		
		case 'reg':
			
			if(!isset($_GET['prid']))
				throw new Exception('Geen lidmaatschap opgegeven om toe te kennen!');
			
			//user selected
			if(isset($_GET['uid']) && isset($_GET['pos'])) {		
				
				//determine position
				$field = $_GET['pos'] == 'Promovendus' ? 'AvPhD' : 'AvMember';
							
				//find corresponding packages
				$stmt = $oDB->prepare('SELECT PackID FROM Packages WHERE ProdID = :prid AND ' . $field . ' = 1 LIMIT 1');
				$stmt->bindValue(':prid', $_GET['prid']);

				if(!$stmt->execute())
					throw new Exception('Kon de lidmaatschapgegevens niet ophalen uit de database!');
					
				//fetch results
				$pack = $stmt->fetch(PDO::FETCH_ASSOC);
				
				if(!$pack)
					throw new Exception('Geen lidmaatschap gevonden!');
				
				//put order in database
				$stmt = $oDB->prepare('INSERT INTO Orders (ProdID, PackID, UserID, TransStatus, TransTime, StatusTime) VALUES(:prid, :pid, :uid, "Success", NOW(), NOW())');
				$stmt->bindValue(':prid', $_GET['prid']);
				$stmt->bindValue(':pid',  $pack['PackID']);
				$stmt->bindValue(':uid',  $_GET['uid']);

				if(!$stmt->execute())
					throw new Exception('Kon het lidmaatschap niet toekennen aan het lid!');
						
				//show confirmation
				$oSmarty->assign('prid', $_GET['prid']);
				$oSmarty->assign('title', 'Lidmaatschap toegekend');
				$oSmarty->display('templates/admin.mship.reg.done.tpl');
			}
			else {
				//select user
				$oSmarty->assign('title', 'Lidmaatschap toekennen');
				$oSmarty->assign('prid', $_GET['prid']);
				$oSmarty->display('templates/admin.mship.reg.user.tpl');
			}
			break;
		
		case 'view':

			//check for product id
			if(!isset($_GET['prid']))
				throw new Exception('Geen lidmaatschap opgegeven om te bekijken!');
		
			$stmt = $oDB->prepare('SELECT p.Description, p.Price, COUNT(o.OrderID) AS TimesSold
								   FROM Packages AS p
								   LEFT JOIN Orders AS o ON o.PackID = p.PackID
								   AND o.TransStatus = "Success"
								   WHERE p.ProdID = :prid
								   GROUP BY p.PackID
								  ');
			$stmt->bindValue(':prid', $_GET['prid']);
			
			if(!$stmt->execute())
				throw new Exception('Kon de gegevens van het lidmaatschap niet ophalen uit de database!');
			
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
			$oSmarty->assign('title', 'Lidmaatschap beheren');
			$oSmarty->display('templates/admin.mship.view.tpl');

			break;
		
		case 'delete':
		
			//delete the product
			$stmt = $oDB->prepare('DELETE FROM Products WHERE ProdID = :prid');
			$stmt->bindValue(':prid', $_GET['prid']);
			
			if(!$stmt->execute())
				throw new Exception('Kon het lidmaatschap niet verwijderen!');

			//redirect to conference overview
			header('Location: ' . $_SERVER['PHPSELF'] . '?m=mship');
			break;
		
		default:
	
			//get congress info from database
			$query = 'SELECT pr.ProdID, pr.Name, COUNT(o.OrderID) AS TimesSold
					  FROM Products AS pr
					  LEFT JOIN Orders AS o ON pr.ProdID = o.ProdID
					  AND o.TransStatus = "Success"
					  WHERE pr.Type = 2
					  GROUP BY pr.ProdID
					  ORDER BY pr.StartDate DESC
					 ';
			$result = $oDB->query($query);

			if(!$result)
				throw new Exception('Kon de lidmaatschapgegevens niet ophalen uit de database!');
			
			//fetch product data
			$msdata = $result->fetchAll(PDO::FETCH_ASSOC);
			
			//generate output
			$oSmarty->assign('msdata', $msdata);
			$oSmarty->assign('LockSold', $oCfg->get('locksold'));
			$oSmarty->assign('title', 'Congressen beheren');
			$oSmarty->display('templates/admin.mship.tpl');
			break;

	}
?>