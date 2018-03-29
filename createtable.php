<?php

require_once 'KLogger.php';

$servername = "us-cdbr-iron-east-05.cleardb.net";
$database = "heroku_3e6dc0754d58604";
$username = "bb2501c58a8034";
$password = "b8fa5f57";
//protected $logger = logger;
//  public function __construct () {
  //  $this->logger = new KLogger('/Users/rluth/OneDrive/Documents/GitHub/Website', KLogger::DEBUG);
//  }

    try {
      $conn = new PDO('mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_3e6dc0754d58604','$username' ,'$password');
  //    $this->logger->logDebug("Established a database connection.");
      return $conn;
    } catch (Exception $e) {
      echo "connection failed: " . $e->getMessage();
    //  $this->logger->logFatal("The database connection failed.");
    }
  
?>

<?php
$servername = "us-cdbr-iron-east-05.cleardb.net";

$username = "username";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>

CREATE TABLE Users (
	id INT (6) UNSIGNED AUTO_INCREMENT,
	display_name VARCHAR (30) NOT NULL,
	email VARCHAR (50) NOT NULL,
	password CHAR(41) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE INDEX (email),
	access INT(1),
	reg_date TIMESTAMP
)
	
CREATE TABLE UserInfo (
	id INT NOT NULL,
	firstname VARCHAR (30) NOT NULL,
	lastname VARCHAR (30) NOT NULL,
	age INT (3) NOT NULL,
	weight INT (3) NOT NULL,
	bodytype CHAR NOT NULL,
	PRIMARY KEY(id)
)
?>