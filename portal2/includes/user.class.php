<?PHP
/**
 * This file contains the User class.
 *
 * This class is used for user authentication and role-based rights management.
 * @author		L.F. Koning
 * @version		1.0.0
 * @copyright	copyright 2005, L.F. Koning.
 */
class User {
	
	private $oDB = null;
	private $encType = 'MD5';

	public $error = '';
	public $dberror = '';
	
	public $userid = false;
	public $authlevel = false;
	public $state = false;

	public $userdata = array();
	public $committees = array();

	/**
	 * Class constructor.
	 * @access		public
	 * @param		obj $oDB reference to PDO MySQL connection
	 * @param		mixed $id UserID, Username or Email of a user (optional)
	 */
	function __construct(&$oDB, $uid = false) {
		//set database connection
		$this->oDB = &$oDB;

		//anonymous user
		if($uid === false)
			return true;
		
		//check type of identifier
		if(is_numeric($uid))
			$key = 'UserID';
		else if(filter_var($uid, FILTER_VALIDATE_EMAIL) != false)
			$key = 'Email';
		else
			$key = 'Username';

		//get user details from database
		$stmt = $this->oDB->prepare("SELECT * FROM Users WHERE $key = :uid");
		$stmt->bindValue(':uid', $uid);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
	
		//found user
		if($result) {
			//set variables
			$this->userid = $result['UserID'];
			$this->userdata = $result;
			
			//fetch membership info
			$stmt = $this->oDB->prepare('SELECT MAX(p.IncMember) AS Membership
										 FROM Orders AS o
										 LEFT JOIN Packages AS p ON o.PackID = p.PackID
										 WHERE o.UserID = :uid
										 AND o.Status = "Success"
										');
			$stmt->bindValue(':uid', $this->userid);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
			//membership found
			if($result)
				$this->userdata['Membership'] = $result['Membership'];
			else
				$this->userdata['Membership'] = null;
			
			//return true
			return true;
		}
	
		//return false if no user found
		return false;
	}
		
	/**
	 * Tries to login, logs in as guest if login fails or no user specified.
	 * @access		public
	 * @param		str  $pass password to log in with
	 * @param		bool $ishashed hashed password or not
	 * @return		int authLevel of the user (0 on failure)
	 */
	function login($user, $pass, $ishashed = 0) {
		//already logged in? return authlevel
		if($this->authlevel !== false)
			return $this->authlevel;
		
		//hash pass if needed
		if(!$ishashed)
			$pass = $this->encPassword($pass);
		
		//build login query
		$stmt = $this->oDB->prepare('SELECT * FROM Users WHERE Username = :user AND Password = :pass');
		$stmt->bindValue(':user', $user);
		$stmt->bindValue(':pass', $pass);

		if(!$stmt->execute()) {
			$this->dberror = $stmt->errorInfo();
			$this->error = 'Kan logingegevens niet ophalen uit de database: ' . $this->dberror[2];
			return false;
		}

		//fetch user base data
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		//could not find user
		if(!$result) {
			$this->error = 'Gebruikersnaam of wachtwoord onjuist!';
			$this->authlevel = 0;
			return 0;
		}

		//propagate login through session
		if(session_id() === '') @session_start();
		$_SESSION['userid'] = $result['UserID'];
		$_SESSION['user'] = $result['Username'];
		$_SESSION['pass'] = $result['Password'];
		
		//set class variables
		$this->userid		= $result['UserID'];
		$this->authlevel	= $result['AuthLevel'];
		$this->state		= $result['State'];
		$this->userdata		= $result;

		//add membership info
			$stmt = $this->oDB->prepare('SELECT MAX(p.IncMember) AS Membership
										 FROM Orders AS o
										 LEFT JOIN Packages AS p ON o.PackID = p.PackID
										 WHERE o.UserID = :uid
										 AND o.Status = "Success"
										');
		$stmt->bindValue(':uid', $this->userid);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
		//membership found
		if($result)
			$this->userdata['Membership'] = $result['Membership'];
		else
			$this->userdata['Membership'] = null;		
		
		//check which committees the user is in
		$query = 'SELECT ProdID FROM Committees WHERE UserID = ' . $this->userid;
		foreach($this->oDB->query($query) as $row) {
			$this->committees[] = $row['ProdID'];
		}
		
		//update last login time
		$this->oDB->exec('UPDATE Users SET LastLogin = NOW() WHERE UserID = ' . $this->userid);
				
		//successfully logged in
		return $this->authlevel;
	}
	
	/**
	 * Logs out current user.
	 * @access		public
	 */
	function logout() {
		//start session
		if(session_id() === '') @session_start();
		
		//unset and destroy session
		$_SESSION = array();
		session_destroy();
	}
	
	/**
	 * Set encryption type.
	 * @access		public
	 * @param		string $encType encryption type (MD5, SHA1)
	 * @return		bool true on success, false on failure
	 */
	function setEncType($encType) {
		$enctype = strtoupper($encType);
		if($encType == 'MD5' || $encType == 'SHA1') {
			$this->encType = $encType;
			return true;
		}
		return false;
	}

	/**
	 * Encrypts a password according to encryption specified in configuration.
	 * @access		public
	 * @param		string $pass password to encrypt
	 * @return		string encrypted password
	 */
	function encPassword($pass) {
		$pass = trim($pass);
		
		switch($this->encType) {
			default:
				$pass = md5($pass);
				break;
			case 'SHA1':
				$pass = sha1($pass);
				break;
		}
		return $pass;
	}

	/**
	 * Generate a random password.
	 * @access		public
	 * @param		int $minlength minimum length of password (defaults to 5)
	 * @param		int $maxlength maximum length of password (optional)
	 * @return		string random password
	 */
	function genPassword($minlength = 5, $maxlength = false) {
		$chars = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = '';
		
		if($maxlength > $minlength)
			$minlength = rand($minlength, $maxlength);
		
		for ($i = 0; $i < $minlength; $i++) {
			$n = rand(0, strlen($chars) - 1);
				$pass .= $chars[$n];
		}
		return $pass;
	}

	/**
	 * Reset password for user.
	 * @access		public
	 * @return		bool true on success, false otherwise
	 */
	function resetPassword() {
		//generate temporary password
		$tempPass = $this->genPassword(8);

		//try to change password in database
		if(!$this->changePassword($tempPass, 1)) {
			return false;
		}
		
		//return password
		return $tempPass;
	}
		
	/**
	 * Change password for the user.
	 * @access		public
	 * @param		string $newpass new password
	 * @param		int $state account state (optional)
	 * @return		bool true on success, false otherwise
	 */
	function changePassword($newpass, $state = 0) {
		//check for user id
		if(!$this->userid) {
			$this->error = 'Kan wachtwoord van anonieme gebruiker niet aanpassen!';
			return false;
		}

		//encrypt the new password
		$newpass = $this->encPassword($newpass);
		
		//update password
		$stmt = $this->oDB->prepare('UPDATE Users SET Password = :newpass, State = :state WHERE UserID = :userid');
		$stmt->bindValue(':newpass', $newpass);
		$stmt->bindValue(':state', $state);
		$stmt->bindValue(':userid', $this->userid);
	
		if(!$stmt->execute()) {
			$this->dberror = $stmt->errorInfo();
			$this->error = 'Het wachtwoord kon niet worden gewijzigd: ' . $this->dberror[2];
			return false;
		}
	
		//update session if applied to current user
		if($this->userid == $_SESSION['userid'])
			$_SESSION['pass'] = $newpass;

		//return true
		return true;
	}
	
	function changeLogin($user = false, $email = false, $password = false) {
		//check for user id
		if(!$this->userid) {
			$this->error = 'Kan login-gegevens van anonieme gebruiker niet aanpassen!';
			return false;
		}
	
		//use current values if not specified
		if(!$user)
			$user = $this->userdata['Username'];
	
		if(!$email)
			$email = $this->userdata['Email'];
		
		//check whether name and / or e-mail are unique
		$stmt = $this->oDB->prepare('SELECT COUNT(*) FROM Users WHERE (Username = :username OR Email = :email) AND UserID != :userid');
		$stmt->bindValue(':username', $user);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':userid', $this->userid);
		$stmt->execute();

		//abort if not unique
		if($stmt->fetchColumn() != 0) {
			$this->error = 'Gebruikersnaam of e-mail is al in gebruik!';
			return false;
		}
		
		//check for password
		if($password) {
			//encrypt password
			$encpass = $this->encPassword($password);
		}
		else {
			$encpass = $this->userdata['Password'];
		}
		
		//update login
		$stmt = $this->oDB->prepare('UPDATE Users SET Username = :username, Email = :email, Password = :password WHERE UserID = :userid');
		$stmt->bindValue(':username', $user);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':password', $encpass);
		$stmt->bindValue(':userid', $this->userid);

		if(!$stmt->execute()) {
			$this->dberror = $stmt->errorInfo();
			$this->error = 'De login-gegevens konden niet worden gewijzigd: ' . $this->dberror[2];
			return false;
		}
		
		//update session if applied to current user
		if($this->userid == $_SESSION['userid']) {
			$_SESSION['user'] = $user;
			$_SESSION['pass'] = $encpass;
		}
		
		//return true if updated
		return true;
	}
	
	/**
	 * Adds user account to the database.
	 * @access		public
	 * @param		string $user unique username for the new account
	 * @param		string $email unique e-mail address for the new account
	 * @param		string $pass unencrypted password for the new account (optional, will be generated otherwise)
	 * @return		string unencrypted password on success, false otherwise
	 */
	function create($user, $email, $pass = false) {
		//check length
		if(strlen($user) < 3 && strlen($user) > 40) {
			$this->error = 'Gebruikersnaam voldoet niet aan de eisen!' . $user;
			return false;
		}
				
		//check whether name and email are unique		
		$stmt = $this->oDB->prepare('SELECT COUNT(*) FROM Users WHERE Username = :user OR Email = :email');
		$stmt->bindValue(':user', $user);
		$stmt->bindValue(':email', $email);
				
		if(!$stmt->execute()) {
			$this->dberror = $stmt->errorInfo();
			$this->error = 'Kan niet controleren of de gegevens uniek zijn: ' . $this->dberror[2];
			return false;
		}
			
		//abort if not unique
		if($stmt->fetchColumn() != 0) {
			$this->error = 'Gebruikersnaam of e-mail is al in gebruik!';
			return false;
		}
		
		//check whether email seems valid
		if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
			$this->error = 'Het e-mail adres is ongeldig!';
			return false;
		}
			
		//set state to zero if pass supplied
		$state = 0;
		
		//otherwise create a temporary password
		if($pass === false) {
			$pass = $this->genPassword(8);
			$state = 2;
		}
		
		//encrypt the password
		$encpass = $this->encPassword($pass);
		       
		//add account to database
		$stmt = $this->oDB->prepare('INSERT INTO Users (Username, Password, Email, State, Registered) VALUES(:user, :encpass, :email, :state, NOW())');
		$stmt->bindValue(':user', $user);
		$stmt->bindValue(':encpass', $encpass);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':state', $state);
		
		//do the insert
		if(!$stmt->execute()) {
			$this->dberror = $stmt->errorInfo();
			$this->error = 'Kon geen nieuwe account aanmaken in de database: ' . $this->dberror[2];
			return false;
		}
		
		//return unencrypted password
		return $pass;
	}
	
	/**
	 * Searches the user database with the criteria provided.
	 * @access		public
	 * @param		array $userdata associative array with user details
	 * @return		bool true on success or false on failure
	 */
	function changeData($userdata) {
		//check for user id
		if(!$this->userid) {
			$this->error = 'Kan gegevens van anonieme gebruiker niet aanpassen!';
			return false;
		}
		
		//user details fields
		$fields = array('Name', 'Prep', 'Surname', 'Gender', 'Affiliation', 'Department', 'Position',
                        'Street', 'Number', 'Numbersup', 'Postcode', 'City', 'Country',
                        'Interest1', 'Interest2', 'Interest3', 'Diet', 'Allergies', 'State'
					    );

		//build update query
		$query = '';
		foreach($userdata as $f => $v) {
			//check if valid field
			if(!in_array($f, $fields)) {
				unset($userdata[$f]);
				continue;
			}
			
			//check if changed
			if(isset($this->userdata[$f]) && $this->userdata[$f] == $v) {
				unset($userdata[$f]);
				continue;
			}
			
			//add comma and comma
			$query .= ($query ? ', ' : '');
			
			//build query
			$query .= $f . ' = :' . $f;
		}

		//return true if no updates required
		if(!$query)
			return true;
		
		//prepend update command
		$query = 'UPDATE Users SET ' . $query;
		
		//append userID where clause
		$query .= ' WHERE UserID = ' . $this->userid;

		//prepare the statement
		$stmt = $this->oDB->prepare($query);

		//bind parameter values
		foreach($userdata as $f => &$v)
			$stmt->bindValue(':' . $f, $v);
		
		//return result
		return $stmt->execute();
	}

	/**
	 * Deletes the user
	 * @access		public
	 * @return		mixed value, array or false if fetch failed / key not found
	 */
	function delete() {
		//check for anonymous user
		if($this->userid === false) {
			$this->error = 'Kan geen anonieme gebruikers verwijderen!';
			return false;
		}
		
		//delete user
		if($this->oDB->exec('DELETE FROM Users WHERE UserID = ' . $this->userid) === false) {
			//set error and return false on failure		
			$this->error = 'Kon de gebruiker niet verwijderen!';
			return false;
		}
		return true;
	}
	
	/**
	 * Gets data on the current user
	 * @access		public
	 * @param		string (optional) field to fetch
	 * @return		mixed value, array or false if fetch failed / key not found
	 */
	function get($field = false) {
		//return all data if no field specified
		if(!$field)
			return $this->userdata;

		//return specific field otherwise
		if(isset($this->userdata[$field]))
			return $this->userdata[$field];

		//return false if no data
		return false;
	}
	
	/**
	 * Stores variables in the user's session
	 * @access		public
	 * @param		string $var identifier to store data with
	 * @value		mixed $value data to store
	 * @return		bool true on success, false on failure
	 */
	function store($var, $value) {
		//start session
		@session_start();

		if(!isset($_SESSION['storage']))
			$_SESSION['storage'] = Array();
			
		$_SESSION['storage'][$var] = $value;
		
		return true;
	}

	/**
	 * Loads variables from the user's session
	 * @access		public
	 * @param		string $var identifier of data to retrieve
	 * @return		mixed data on success, false on failure
	 */
	function load($var) {
		//start session
		@session_start();

		if(isset($_SESSION['storage'][$var]))
			return $_SESSION['storage'][$var];

		return false;
	}

	/**
	 * Removes variables from the user's session
	 * @access		public
	 * @param		string $var identifier of data to remove
	 * @return		bool true on success, false on failure
	 */
	function rem($var) {
		//start session
		@session_start();

		if(isset($_SESSION['storage'][$var])) {
			unset($_SESSION['storage'][$var]);
			return true;
		}
		
		return false;
	}
}
?>