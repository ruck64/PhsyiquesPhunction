<?php
require_once 'KLogger.php';

class Dao {
	
  protected $logger;
  
  public function __construct () {
    $this->logger = new KLogger('/Users/rluth/OneDrive/Documents/GitHub/Website', KLogger::DEBUG);
  }
  private function getConnection () {
	try {
		require_once 'dbconfig.php';
		$conn = new PDO('mysql:host=$host;dbname=$db',$username ,$password);
		$this->logger->logDebug("Established a database connection.");
		return $conn;
    } catch (Exception $e) {
		echo "connection failed: " . $e->getMessage();
		$this->logger->logFatal("The database connection failed.");
    }
  
  }
  
  public function getComments () {
     $conn = $this->getConnection();
     $query = $conn->prepare("select * from comments");
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
     $results = $query->fetchAll();
     $this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
     return $results;
  }
  public function saveComment ($name, $comment, $imagePath) {
     $conn = $this->getConnection();
     $query = $conn->prepare("INSERT INTO comments (name, comment, image_path) VALUES (:name, :comment, :image_path)");
     $query->bindParam(':name', $name);
     $query->bindParam(':comment', $comment);
     $query->bindParam(':image_path', $imagePath);
     $this->logger->logDebug(__FUNCTION__ . " name=[{$name}] comment=[{$comment}]");
     $query->execute();
  }
  public function deleteComment ($id) {
     $conn = $this->getConnection();
     $query = $conn->prepare("DELETE FROM comments WHERE id = :id");
     $query->bindParam(':id', $id);
     $query->execute();
  }
}
