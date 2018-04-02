<?php
require_once 'KLogger.php';

	class createTable {

	protected $logger = logger;
	public function __construct () {
	$this->logger = new KLogger('/Users/rluth/OneDrive/Documents/GitHub/Website', KLogger::DEBUG);
	}

	public function createTable() {
    try {
		$this->logger->logDebug("Established a database connection.");
		$db = new PDO('mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_3e6dc0754d58604', 'bb2501c58a8034', 'b8fa5f57');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql_users = 
		"CREATE TABLE IF NOT EXISTS `Users` (
			`id` INT (6) UNSIGNED AUTO_INCREMENT NOT NULL,
			`display_name` VARCHAR (30) NOT NULL,
			`email` VARCHAR (50) NOT NULL,
			`password` CHAR(41) NOT NULL,
			PRIMARY KEY (`id`),
			UNIQUE INDEX (`email`),
			`access` INT(1),
			`reg_date` TIMESTAMP 
			) ";
			
			
		$db->exec($sql_users);
		print("Created users.\n");
	
		$sql_usersinfo =
		"CREATE TABLE IF NOT EXISTS `UserInfo` (
			`id` INT (6) UNSIGNED AUTO_INCREMENT,
			`firstname` VARCHAR (30) NOT NULL,
			`lastname` VARCHAR (30) NOT NULL,
			`age` INT (3) NOT NULL,
			`weight` INT (3) NOT NULL,
			`bodytype` CHAR NOT NULL,
			PRIMARY KEY(`id`)
		);";
		$db->exec($sql_usersinfo);
		print("Created usersinfo.\n");
		
		
		
	}
	catch (PDOException $e) {
        echo "connection failed: " . $e->getMessage();
      $this->logger->logFatal("The database connection failed.");
	}
	}
	}
?>