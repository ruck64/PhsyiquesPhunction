<?php

require_once 'KLogger.php';
require_once 'comments.php';

class Users {
	
	protected $logger;

	public function __construct () {
    $this->logger = new KLogger('/Users/rluth/OneDrive/Documents/GitHub/Website', KLogger::DEBUG);
    }
	
	private function getConnection () {
		try {
		$conn = new PDO('mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_3e6dc0754d58604','bb2501c58a8034' ,'b8fa5f57');
		$this->logger->logDebug("Established a database connection.");
		return $conn;
		} catch (Exception $e) {
		echo "connection failed: " . $e->getMessage();
		$this->logger->logFatal("The database connection failed.");
		}
  
    }
  
    public function saveUser ($display_name, $email, $password) {
		$conn = $this->getConnection();
		$query = $conn->prepare("INSERT INTO Users (display_name, email, password) VALUES (:display_name, :, :email, :password)");
		$query->bindParam(':display_name', $display_name);
		$query->bindParam(':email', $email);
		$query->bindParam(':password', $password);
		$this->logger->logDebug(__FUNCTION__ . " display_name=[{$display_name}] email=[{$email}] password[{$password}]");
		$query->execute();
    }
  
	public function getUser ($display_name,$email,$password) {
		$conn = $this->getConnection();
		$query = $conn->prepare("select * from Users");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$results = $query->fetchAll();
		$this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
		return $results;
    }
  
 }
