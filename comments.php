<?php
require_once 'KLogger.php';

class Dao {
  private $host = "us-cdbr-iron-east-05.cleardb.net";
  private $db = "heroku_3e6dc0754d58604";
  private $user = "bb2501c58a8034";
  private $pass = "b8fa5f57";
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
