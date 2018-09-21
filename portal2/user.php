<?php
	
	//check if included
	if(!defined('PortalInc')) {
		header('Location: index.php');
		exit;
	}

	//check for new account or password that needs to be reset
	if($oSelf->state == 2 && !$_POST['State']) {
		$action = 'changeinfo';
	}
	else if($oSelf->state == 1 && !$_POST['newpass']) {
		$action = 'passreset';
	}
	else { 
		$module = isset($_GET['m']) ? $_GET['m'] : '';
		$action = isset($_GET['a']) ? $_GET['a'] : '';
	}
	
	switch($module) {
		default:
			//main module
			require('user.main.php');
			break;

		case 'comm':
			//committee module
			require('user.comm.php');
			break;
			
		case 'conf':
			//congresses module
			require('user.conf.php');
			break;

		case 'ideal':
			//ideal transactions
			require('user.ideal.php');
			break;
			
		case 'mship':
			//membership module
			require('user.mship.php');
			break;

		case 'orders':
			//orders module
			require('user.orders.php');
			break;
	}
?>