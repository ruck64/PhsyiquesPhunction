<?php
	require_once 'KLogger.php';
	
	class Data {
		
		private $host = "us-cdbr-iron-east-05.cleardb.net";
		private $database = "heroku_3e6dc0754d58604";
		private $username = "bb2501c58a8034";
		private $password = "b8fa5f57"
	
	protected $logger;
	
	public function __construct() {
		$this->logger = new KLogger('/Users/rluth/OneDrive/Documents/Github/Website',Klogger::Debug);
		
	}
	
	private function getConnection () {
		try {
			$conn = new PDO("mysql:host={$this->host};dbname={$this->database}",$this->username,$this->password);
			
			$this->logger->logDebug("Established a database connection.");
			return $conn;
		}
			catch (Exception $e) {
				echo "connection failed: " . $e.getMessage();
				$this->logger->logFatal("The database connection failed.");
			}
	}
	
	
	public function getComments () {
	$conn = $this->getConnection();
	$query = $conn->prepare("select * from comments");
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$query->execute();
	$results = $query->fetchALL();
	$this->logger->logDebug(__FUNCTION__. " " . print_r($results,1));
	return $results;
	}

	public saveComment ($name, $comment, $imagePath) {
		$conn = $this->getConnection();
		$query = $conn->prepare("INSERT INTO comments (name,comment,image_path) Values (:name, :comment, :image_path)");
		$query->bindParam(':name',$name);
		$query->bindParam(':comment',$comment);
		$query->bindParam(':image_path',$image_path);
		$this->logger->logDebug(__FUNCTION__ . " name=[{$name}] comment=[{$comment}]");
		$query->execute();
	}
	
	public function deleteComment ($id) {
		$conn = $this->getConnection();
		$query = $conn->prepare("DELETE FROM comments Where id = :id");
		$query->bindParam(':id',$id);
		$query->execute();
	}
	
	}