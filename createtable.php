<?php
echo "before includes";
require_once 'KLogger.php';
require_once 'dbconfig.php';
echo "after includes";

//protected $logger = logger;
//  public function __construct () {
  //  $this->logger = new KLogger('/Users/rluth/OneDrive/Documents/GitHub/Website', KLogger::DEBUG);
//  }

    try {
  //    $this->logger->logDebug("Established a database connection.");
		$dsn = "mysql:host = '$host';dbname='$db'";
		$dbn = new PDO($dsn, $username, $password);
		$dbn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "connectoin succesful";

	/*	$sql_create_users_tbl = 
		"CREATE TABLE IF NOT EXISTS Users (
			id INT (6) UNSIGNED AUTO_INCREMENT,
			display_name VARCHAR (30) NOT NULL,
			email VARCHAR (50) NOT NULL,
			password CHAR(41) NOT NULL,
			PRIMARY KEY (id),
			UNIQUE INDEX (email),
			access INT(1),
			reg_date TIMESTAMP
		) ENGINE = InnoDB";
	
		$sql_create_userinfo_tbl = 
		"CREATE TABLE IF DOES NOT EXIST UserInfo (
			id INT NOT NULL,
			firstname VARCHAR (30) NOT NULL,
			lastname VARCHAR (30) NOT NULL,
			age INT (3) NOT NULL,
			weight INT (3) NOT NULL,
			bodytype CHAR NOT NULL,
			PRIMARY KEY(id)
		)";
		
		$msg = '';
		
		$r = $dbh->exec(sql_create_users_tbl);
		
		if($r !== false){
			
			$r = $dbh->exec(sql_create_userinfo_tbl);
			
			if($r !== false){
				$msg = "Tables are created successfully!<br/>";
			}else{
				$msg = "Error creating the userinfo table.<br/>";
			}
			
		}else{
			$msg = "error in creating  user table.<br/>";
		}
		
		if($msg !='')
			echo $msg;
		*/
	}
	catch (Exception $e) {
        echo "connection failed: " . $e->getMessage();
    //  $this->logger->logFatal("The database connection failed.");
	}
?>