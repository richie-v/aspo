<?php
	//check if included
	if(!defined('PortalInc')) {
		header('Location: index.php');
		exit;
	}

	//first check if temporary password needs to be reset
	if($oSelf->state == 1 && !$_POST['newpass']) {
		$action = 'passreset';
	}
	else { 
		$module = isset($_GET['m']) ? $_GET['m'] : '';
		$action = isset($_GET['a']) ? $_GET['a'] : '';
	}
	
	switch($module) {
		default:
			//main module
			require('admin.main.php');
			break;

		case 'conf':
			//congresses module
			require('admin.conf.php');
			break;

		case 'mship':
			//membership module
			require('admin.mship.php');
			break;

		case 'users':
			//users module
			require('admin.users.php');
			break;
	}
?>