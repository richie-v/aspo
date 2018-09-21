<?php

	//check if included
	if(!defined('PortalInc')) {
		header('Location: index.php');
		exit;
	}

	//determine action
	$action = isset($_GET['a']) ? $_GET['a'] : '';
	
	switch($action) {
		default:
			//login
			//show error message if login failed
			$oSmarty->assign('loginerror', $oSelf->error);	
			
			//Show login form
			$oSmarty->assign('title', 'Inloggen');
			$oSmarty->display('templates/login.main.tpl');
			break;

		case 'cc':
			//test whether user has cookies enabled
			//used by login module through AJAX calls
			if($oSelf->load('cookiechecked')) {
				echo 'true';
			}
			else {
				if(isset($_GET['cs'])) {
					echo 'false';
				}
				else {
					$oSelf->store('cookiechecked', '1');
					header('Location: ' . $_SERVER['PHP_SELF'] . '?m=login&a=cc&cs=1');
					exit();
				}
			}
			break;
		
		case 'forget':
			//reset password
			$oSmarty->assign('title', 'Wachtwoord vergeten');
			$oSmarty->display('templates/login.forget.tpl');
			break;

		case 'forgetdone':
			//create user
			$user = new User($oDB, $_POST['account']);
			
			if($user) {
				//reset password
				if($tempPass = $user->resetPassword()) {
					$tempPassEnc = $user->encPassword($tempPass);
					
					//include PHP Mailer
					require_once('includes/phpmailer/class.phpmailer.php');
					$mailer = new PHPMailer();
					$mailer->IsSendmail();
					$mailer->SetFrom($oCfg->get('webmastermail'), 'ASPO webmaster');
					
					//create body from mail template
					$oSmarty->assign('user', $user->get('Username'));
					$oSmarty->assign('pass', $tempPass);
					$oSmarty->assign('passenc', $tempPassEnc);
					$oSmarty->assign('adres', $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
								
					//set subject and send mail
					$mailer->Subject = 'ASPO Ledenportal gegevens';
					$mailer->Body = $oSmarty->fetch('templates/login.forget.mail.tpl');
					$mailer->AddAddress($user->get('Email'));
					$mailer->Send();
				}
				else {
					//assign error message
					$oSmarty->assign('error', 'Uw wachtwoord kon niet worden gewijzigd in de database!');
				}
			}
			else {
				//assign error message
				$oSmarty->assign('error', 'Er kon geen account worden gevonden met de door u ingevoerde gegevens!');
			}
			
			//display response
			$oSmarty->assign('title', 'Wachtwoord vergeten');
			$oSmarty->display('templates/login.forget.done.tpl');
			break;
			
		case 'register':
			
			$regError = null;
			
			//check for username and email
			if(isset($_POST['user']) && isset($_POST['email'])) {
				//add user account
				$oSelf = new User($oDB);
				$tempPass = $oSelf->create($_POST['user'], $_POST['email']);
				$tempPassEnc = $oSelf->encPassword($tempPass);
				
				//send e-mail and display response if no errors occurred
				if($tempPass) {
					//include PHP Mailer
					require_once('includes/phpmailer/class.phpmailer.php');
					$mailer = new PHPMailer();
					$mailer->IsSendmail();
					$mailer->SetFrom($oCfg->get('webmastermail'), 'ASPO webmaster');

					//create body from mail template
					$oSmarty->assign('user', $_POST['user']);
					$oSmarty->assign('pass', $tempPass);
					$oSmarty->assign('passenc', $tempPassEnc);
					$oSmarty->assign('adres', $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
					
					//set subject and send mail
					$mailer->Subject = 'ASPO Ledenportal registratie';
					$mailer->Body = $oSmarty->fetch('templates/login.register.mail.tpl');
					$mailer->AddAddress($_POST['email']);
					$mailer->Send();

					//display response
					$oSmarty->assign('title', 'Registreren');
					$oSmarty->assign('email', $_POST['email']);
					$oSmarty->display('templates/login.register.done.tpl');
					exit;
				}
				else {
					//retrieve registration error
					$regError = $oSelf->error;
				}
			}
			
			//show registration form
			$oSmarty->assign('title', 'Registreren');
			$oSmarty->assign('regerror', $regError);
			$oSmarty->display('templates/login.register.tpl');
			break;
	}
?>