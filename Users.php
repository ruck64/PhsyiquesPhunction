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
		$query = $conn->prepare("INSERT INTO Users (display_name, email, password) VALUES (:display_name, :email, :password,:salt)");
		$query->bindParam(':display_name', $display_name);
		$query->bindParam(':email', $email);
		$query->bindParam(':password', $password);
		$_SESSION['display_name'] = $display_name;
		$_SESSION['email'] = $email;
		$this->logger->logDebug(__FUNCTION__ . " display_name=[{$display_name}] email=[{$email}] password[{$password}]");
		$query->execute();
    }
  
	public function getDisplay_Name () {
		$conn = $this->getConnection();
		$query = $conn->prepare("select display_name from Users");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$results = $query->fetch();
		$this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
		return $results;
    }
	
		public function getEmail () {
		$conn = $this->getConnection();
		$query = $conn->prepare("select email from Users");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$results = $query->fetch();
		$this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
		return $results;
    }
	
		public function getPassword () {
		$conn = $this->getConnection();
		$query = $conn->prepare("select password from Users");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$results = $query->fetch();
		$this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
		return $results;
    }
  
 }
