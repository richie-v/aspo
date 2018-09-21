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
			//create query
			$query = 	'SELECT pr.Name, p.Description, p.Price, o.OrderID, o.TransTime, o.TransStatus
						 FROM Products AS pr, Packages AS p, Orders AS o
						 WHERE pr.ProdID = o.ProdID
						 AND p.PackID = o.PackID
						 AND o.UserID = ' . $oSelf->userid . '
						 ORDER BY o.TransTime DESC
						';


			//process results if any
			$orders = null;
			foreach($oDB->query($query) as $order) {
				$order['Date'] = strtotime($order['TransTime']);
				$order['Date'] = date('d-m-Y', $order['Date']);
				$orders[] = $order;
			}

			//assign to template
			$oSmarty->assign('user', $oSelf->get('Username'));
			$oSmarty->assign('orders', $orders);
			$oSmarty->assign('title', 'Betalingen');
			$oSmarty->display('templates/user.orders.tpl');
			
			break;
		
		case 'pdf':
			
			if(!$_GET['id'] || !is_numeric($_GET['id']))
				throw new Exception('Geen bestelling opgegeven!');
			
			//require FPDF class
			require('includes/fpdf/fpdf.php');

			//page setup
			$pdf = new FPDF('P','mm','A4');
			$pdf->SetLeftMargin(20);
			$pdf->SetRightMargin(20);
			$pdf->AddPage();

			//print header
			$pdf->SetFont('Arial', 'B', 20);
			$pdf->Cell(0, 10, 'ASPO');
			$pdf->Ln(20);
			$pdf->Line(0, 20, 160, 20);

			//print ASPO
			$pdf->SetFont('Arial', 'I', 10);
			$pdf->Cell(0, 5, 'Associatie voor Sociaal Psychologische Onderzoekers');
			$pdf->Ln();

			//print address
			$pdf->SetFont('Arial', '', 10);
			$pdf->MultiCell(0, 5, "Grote Kruisstraat 2/1\n9712 TS Groningen");
			$pdf->Ln(10);

			//print info
			$data = array('E-mail:' => 'info@sociale-psychologie.nl', 'Web:' => 'www.sociale-psychologie.nl', 'KvK:' => '40476169');
			foreach($data as $k => $v) {
				$pdf->Cell(25, 5, $k);
				$pdf->Cell(40, 5, $v);
				$pdf->Ln();
			}
			$pdf->Ln(20);

			//prepare query to get order + user info
			$stmt = $oDB->prepare('SELECT o.PackID, o.StatusTime, o.PurchaseID, o.TransID,
                                          u.Username, u.Name, u.Prep, u.Surname, u.Affiliation, u.Department, u.Street, u.Number, u.Numbersup, u.Postcode, u.City
                                   FROM Orders AS o
                                   LEFT JOIN Users AS u ON o.UserID = u.UserID
                                   WHERE o.OrderID = :orderid
                                   AND o.UserID = :userid
                                   AND o.TransStatus = "Success"
                                  ');
			$stmt->bindValue(':orderid', $_GET['id']);
			$stmt->bindValue(':userid', $oSelf->userid);
			$stmt->execute();

			//fetch data
			$d = $stmt->fetch();
			if($d === false)
				throw new Exception('Kon de gegevens van de bestelling niet ophalen of de bestelling was niet succesvol!');
			$stmt->closeCursor();

			//get product + package info
			$query = 'SELECT pr.Name, p.Price, p.Description
					  FROM Packages AS p
					  LEFT JOIN Products AS pr ON p.ProdID = pr.ProdID
					  WHERE p.PackID = ' . $d['PackID'];
			
			//fetch result
			$p = $oDB->query($query);
			if($p === false)
				throw new Exception('Kon de gegevens van de bestelling niet ophalen of de bestelling was niet succesvol!');
			$p = $p->fetch();
				
			//concats
			$name = conc(' ', $d['Name'], $d['Prep'], $d['Surname']);
			$address = conc(' ', $d['Street'], $d['Number'], $d['Numbersup']);
			$pcode   = conc(' ', $d['Postcode'], $d['City']);
			
			//print user info
			$data = array($name, $d['Affiliation'], $d['Department'], ' ', $address, $pcode);
			foreach($data as $v) {
				if($v == '') continue;
				$pdf->Cell(0, 5, $v, 0, 0, 'R');
				$pdf->Ln();
			}
			$pdf->Ln(25);
            
			//fix date
			$d['StatusTime'] = date('d-m-Y', strtotime($d['StatusTime']));
			
			//print order Info
			$data = array('Datum:' => $d['StatusTime'], 'Bestelling:' => $d['PurchaseID'], 'Transactie:' => $d['TransID'], 'Status:' => 'Betaald');
			foreach($data as $k => $v) {
				if($v == '') continue;
				$pdf->Cell(130, 5, $k, 0, 0, 'R');
				$pdf->Cell(0, 5, $v, 0, 0, 'R');
				$pdf->Ln();
			}
			$pdf->Ln(25);
            		  
			//print product Table
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(80, 7, $p['Name'], 'B');
			$pdf->Cell(50, 7, 'Aantal', 'B', 0, 'R');
			$pdf->Cell(0, 7, 'Prijs', 'B', 0, 'R');
			$pdf->Ln(10);
            
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(80, 5, $p['Description']);
			$pdf->Cell(50, 5, '1', 0, 0, 'R');
			$pdf->Cell(0, 5, $p['Price'] . ' euro', 0, 0, 'R');
			$pdf->Ln(50);
			
			//add account details
			$pdf->Cell(100);
			$pdf->Cell(0, 6, 'Rekeninghouder:');
			$pdf->Cell(0, 6, 'ASPO', 0, 0, 'R');
			$pdf->Ln();
			$pdf->Cell(100);
			$pdf->Cell(0, 6, 'Rekening:');
			$pdf->Cell(0, 6, '3518500', 0, 0, 'R');
			$pdf->Ln();
			$pdf->Cell(100);
			$pdf->Cell(0, 6, 'IBAN:');
			$pdf->Cell(0, 6, 'NL27 INGB 0003518500', 0, 0, 'R');
			
            
			//send to browser
			header('Pragma: public');
			header('Expires: -1');
			header('Cache-Control: public, must-revalidate, post-check=0, pre-check=0');
			header('Content-Type: application/pdf');
			header('Content-Disposition: attachment; filename=ASPO-Factuur-' . $d['PurchaseID'] . '.pdf');
			$pdf->Output();
			
			break;
	}
?>