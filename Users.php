<?php

	session_start();
	require_once 'KLogger.php';
	require_once 'comments.php';

class Users {
	
	protected $logger;

	public function __construct () {
    $this->logger = new KLogger('/Users/rluth/OneDrive/Documents/GitHub/Website', KLogger::DEBUG);
    }
	
	private function getConnection () {
		try {
		require_once "dbconfig.php";
		$conn = new PDO('mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_3e6dc0754d58604','bb2501c58a8034' ,'b8fa5f57');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->logger->logDebug("Established a database connection.");
		return $conn;
		} catch (Exception $e) {
		echo "connection failed: " . $e->getMessage();
		$this->logger->logFatal("The database connection failed.");
		}
  
    }
  
    public function saveUser ($display_name, $email, $password) {
		$conn = $this->getConnection();
		$salt = '1basket69';
		$password = $salt . $password;
		$password = md5($password);
		$query = $conn->prepare("INSERT INTO Users (display_name, email, password) VALUES (:display_name, :email, :password)");
		$query->bindParam(':display_name', $display_name);
		$query->bindParam(':email', $email);
		$query->bindParam(':password', $password);
		$_SESSION['display_name'] = $display_name;
		$_SESSION['email'] = $email;
		$this->logger->logDebug(__FUNCTION__ . " display_name=[{$display_name}] email=[{$email}] password[{$password}]");
		$query->execute();
    }
			
		public function saveUserInfo ($firstname, $lastname, $age, $weight, $bodytye) {
			$conn = $this->getConnection();
			echo "firstname " . $firstname;
			exit;
			$query = $conn->prepare("INSERT INTO UserInfo (firstname, lastname, age, weight, bodytype) VALUES (:firstname, :lastname, :age , :weight, :bodytype)");
			$query->bindParam(':firstname', $firstname);
			$query->bindParam(':lastrname', $lastname);
			$query->bindParam(':age', $age);
			$query->bindParam(':weight', $weight);
			$query->bindParam(':bodytype',$bodytype);
			$query->execute();
		}
		
		public function getFirstName ($id) {
			$conn = $this->getConnection();
			$query = $conn->prepare("SELECT firstname FROM UserInfo WHERE id = '$id'");
			$query->execute(array($id));
			$firstname = $query->fetch();
			return $firstname;
		}
 }
