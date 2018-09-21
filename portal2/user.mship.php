<?php

	//check if included
	if(!defined('PortalInc')) {
		header('Location: index.php');
		exit;
	}

	//get user position and membership status
	$position = $oSelf->get('Position');
	$membership = $oSelf->get('Membership');
	
	//field for availability
	$field = 'AvMember';
	if($position == 'Student')			$field = 'AvStudent';
	else if($position == 'Promovendus')	$field = 'AvPhD';

	//see if any membership is available and at which price
	$query = "SELECT p.PackID, p.Description, p.Price
			  FROM Packages AS p, Products AS pr
			  WHERE p.ProdID = pr.ProdID
			  AND pr.Type = 2
			  AND CURDATE() BETWEEN pr.StartReg AND pr.EndReg
			  AND p.$field = 1
			 ";

	if($membership)
		$query .= " AND p.IncMember > $membership";
	
	//fetch membership from database
    $result = $oDB->query($query);
	if($result === false)
		throw new Exception('Kon de lidmaatschapgegevens niet ophalen uit de database!');

	//assign to template
	if($result) {
		$order = $result->fetch();
		$oSmarty->assign('order', $order);
	}

	//display template
	$oSmarty->assign('position', $position);
	$oSmarty->assign('membership', $membership);
	$oSmarty->assign('curryear', date('Y'));
	$oSmarty->assign('title', 'Lidmaatschap');
	$oSmarty->display('templates/user.mship.tpl');
	
?>