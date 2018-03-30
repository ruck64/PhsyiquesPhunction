<?php
require_once 'KLogger.php';
require_once 'dbconfig.php';

//protected $logger = logger;
//  public function __construct () {
  //  $this->logger = new KLogger('/Users/rluth/OneDrive/Documents/GitHub/Website', KLogger::DEBUG);
//  }

    try {
  //    $this->logger->logDebug("Established a database connection.");
		$dsn = "mysql:host = $host;dbname=$db";
		echo "gonna try to connect <br>";
	//	echo "host " . $host . "<br> db " . $db . "<br> username " . $username . "<br> password " . $password . "<br>";
		$dbn = new PDO('mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_3e6dc0754d58604', 'bb2501c58a8034', 'b8fa5f57');
		echo "connectoin succesful";
		$dbn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "connectoin succesful";

		$sql_users = 
		"CREATE TABLE IF NOT EXISTS Users (
			id INT (6) UNSIGNED AUTO_INCREMENT,
			display_name VARCHAR (30) NOT NULL,
			email VARCHAR (50) NOT NULL,
			password CHAR(41) NOT NULL,
			PRIMARY KEY (id),
			UNIQUE INDEX (email),
			access INT(1),
			reg_date TIMESTAMP ); ";
			
		$dbn->exec($sql_users);
		print("Created $sql_users users.\n");
	
		$sql_usersinfo =
		"CREATE TABLE IF DOES NOT EXIST UserInfo (
			id INT NOT NULL,
			firstname VARCHAR (30) NOT NULL,
			lastname VARCHAR (30) NOT NULL,
			age INT (3) NOT NULL,
			weight INT (3) NOT NULL,
			bodytype CHAR NOT NULL,
			PRIMARY KEY(id)
		);";
		$dbn->exec($sql_usersinfo);
		print("Created $sql_usersinfo usersinfo.\n");
		
		
		
	}
	catch (Exception $e) {
        echo "connection failed: " . $e->getMessage();
    //  $this->logger->logFatal("The database connection failed.");
	}
?>