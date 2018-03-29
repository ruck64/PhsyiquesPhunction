<?php

require_once 'KLogger.php';

$servername = "us-cdbr-iron-east-05.cleardb.net";
$database = "heroku_3e6dc0754d58604";
$username = "bb2501c58a8034";
$password = "b8fa5f57";

try {
      $conn =
        new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->pass);
      $this->logger->logDebug("Established a database connection.");
      return $conn;
    }
	catch (Exception $e) {
      echo "connection failed: " . $e->getMessage();
      $this->logger->logFatal("The database connection failed.");
    }



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