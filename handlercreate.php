<?php 
	
	session_start();
	require_once 'Users.php';
	require_once 'comments.php';
	require_once 'dbconfig.php';
	$Users = new Users();
	
	try {  
		require_once "dbconfig.php";
		$con = new PDO('mysql:host=$host;dbname=$db',$username ,$password);
		$query = $con->prepare( "SELECT `display_name` FROM `Users WHERE `display_name` = `display_name`" );
		$query->bindValue( 1, $email );
		$query->execute();
		if( $query->rowCount() > 0 ) { # If rows are found for query
			echo "Email found!";
		}
		else {
			echo "Email not found!";
		}
	} catch (Exception $e) {
		echo "connection failed: " . $e->getMessage();
	}

	$display_name = $_POST['display_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	
	$_SESSION['presets'] = array($_POST);
	
	$valid = true;
	$messages = array(); 
		
	if(empty($display_name)) {
		$messages[] = "PLEASE ENTER A DISPLAY NAME";
		$valid = false;
	}
	
	if(strlen($display_name) < 4 && !empty($display_name) && strlen($password) > 20) {
		$messages[]= "DISPLAY NAME MUST BE MORE THAN 4 CHARACTERS LONG AND SHORTER THAN 20";
		$valid = false;
	}
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$messages[] = "PLEASE ENTER A VALID EMAIL";
		$valid = false;
	}
	
	if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/', $password)) {
		$messages[] = "Password must contain at least one: number,symbol,and letter. Password must also be at least 8 characters long and no more than 50.";
		$valid = false;
	}
	
	if($password != $confirmpassword) {
		$messages[] = "PASSWORDS MUST MATCH";
		$valid = false;
	}
	
	if (!$valid) {
		$_SESSION['sentiment'] = "bad";
		$_SESSION['messages'] = $messages;
		header("Location: login.php");
		exit;
	}
	
	$_SESSION['sentiment'] = "good";
	$_SESSION['messages'] = array("Account created successfully");
	
	$sthandler = $db->prepare("SELECT display_name FROM users WHERE display_name = :display_name");
	$sthandler->bindParam(':name', $username);
	$sthandler->execute();

	if($sthandler->rowCount() > 0){
    echo "exists! cannot insert";
	} else { 
	$Users->saveUser($display_name, $email, $password);
	
	header("Location: userpage.php");
	exit;
	}
	
	