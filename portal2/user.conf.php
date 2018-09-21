<?php

	//check if included
	if(!defined('PortalInc')) {
		header('Location: index.php');
		exit;
	}

	//get user position
	$position = $oSelf->get('Position');
	
	//select current congresses
	$query = 'SELECT * FROM Products AS pr
			  WHERE pr.Type = 1
			  AND CURDATE() BETWEEN pr.StartReg AND pr.Endreg
			  AND (
			        SELECT COUNT(*)
					FROM Orders AS o
					WHERE o.ProdID = pr.ProdID
					AND o.TransStatus = "Success"
					AND o.UserID = ' . $oSelf->userid . '
				  ) = 0
			 ';
	$proddata = $oDB->query($query);
	if($proddata === false)
		throw new Exception('Kon de congresgegevens niet ophalen uit de database!');
	
	//at least one result
	if($proddata) {
	
		//get product information and packages
		$products = array();
		
		while($product = $proddata->fetch()) {

			//field for availability
			$field = 'AvMember';
			if($position == 'Student')			$field = 'AvStudent';
			else if($position == 'Promovendus')	$field = 'AvPhD';
		
			//get available packages
			$query = "SELECT PackID, Description, Price FROM Packages
					  WHERE ProdID = {$product['ProdID']}
					  AND $field = 1
					 ";
			
			$packdata = $oDB->query($query);
			if($packdata === false)
				throw new Exception('Kon de prijsgegevens van het congres niet ophalen uit de database!');
			
			//process packages
			while($package = $packdata->fetch()) {
					//add package to product
					$product['packages'][] = $package;
			}
				
			//append to products array if at least one price package
			$products[] = $product;
		}
		
		//assign products to template
		$oSmarty->assign('products', $products);
	}
		
	//assign position to template
	$oSmarty->assign('position', $position);
	
	//display template
	$oSmarty->assign('title', 'Congres');
	$oSmarty->display('templates/user.conf.tpl');
	
?>
