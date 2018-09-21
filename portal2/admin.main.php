<?php
	//check if included
	if(!defined('PortalInc')) {
		header('Location: index.php');
		exit;
	}
	
	switch($action) {
		default:
			//display user main page
			$oSmarty->assign('title', 'Welkom');
			$oSmarty->assign('user', $oSelf->get('Username'));
			$oSmarty->display('templates/admin.main.tpl');
			break;	
	
		case 'changelogin':
			//assign user data to template
			$oSmarty->assign('user', $oSelf->get());
			
			//display user main page
			$oSmarty->assign('title', 'Login wijzigen');
			$oSmarty->display('templates/user.main.changelogin.tpl');
			break;	
	
		case 'changelogindone':
			//check whether password needs updating
			$pass = false;
			if($_POST['newpass']) {
				if($_POST['newpass'] == $_POST['checkpass'])
					$pass = $_POST['newpass'];
				else
					throw new Exception('De opgegeven wachtwoorden komen niet overeen!');
			}

			//change login
			if(!$oSelf->changeLogin($_POST['username'], $_POST['email'], $pass))
				throw new Exception('Kon de login-gegevens niet aanpassen: ' . $oSelf->error);
			
			//refresh to home page
			header('Location: ' . $_SERVER['PHP_SELF']);
			break;

		case 'logout':
			//logout
			$oSelf->logout();
			
			//logged out, refresh to login page
			header('Location: ' . $_SERVER['PHP_SELF']);
			break; 
			
		case 'passreset':
			//reset password
			$oSmarty->assign('title', 'Wachtwoord veranderen');
			$oSmarty->display('templates/user.main.passreset.tpl');
			break;

		case 'resetdone':
				//check whether both passwords match
			if($_POST['newpass'] && $_POST['newpass'] == $_POST['checkpass']) {
				if(!$oSelf->changePassword($_POST['newpass']))
					$error = 'Uw wachtwoord kon niet worden gewijzigd!';
			}
			else {
				$error = 'Geen geldig wachtwoord opgegeven of wachtwoorden komen niet overeen!';
			}
			
			//assign error and AuthState
			$oSmarty->assign('error', $error);
			$oSmarty->assign('AuthState', $oSelf->state);
			
			//display page
			$oSmarty->assign('title', 'Wachtwoord veranderen');
			$oSmarty->display('templates/user.main.passreset.done.tpl');
			break;			
	}
?>