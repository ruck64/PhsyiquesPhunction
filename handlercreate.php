<?php 
	
	session_start();
	require_once 'Users.php';
	require_once 'comments.php';
	$Users = new Users();
	
	try {
		require "dbconfig.php";
		$conn = new PDO('mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_3e6dc0754d58604','bb2501c58a8034' ,'b8fa5f57');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e){
		exit($e->getMessage());
	}
	
	$display_name = htmlspecialchars($_POST['display_name']);
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
	
	if(empty($password)) {
		$messages[] = "Please enter a password";
		echo "password " . $password;
		$valid = false;
		exit;
	}
	$salt = '1basket69';
	$password = $salt . $_POST['password'];
	$password = md5($password);
	
	if(!isset($error)){
		echo "no errors " . !isset($error);
		//no error
		$sthandler = $conn->prepare("SELECT email FROM Users WHERE email = :email");
		$sthandler->bindParam(':email', $email);	
		$sthandler->execute();

		if($sthandler->rowCount() > 0){
			$messages[] = "Email already exists";
			$valid = false;
		}

		$sthandler = $conn->prepare("SELECT display_name FROM Users WHERE display_name = :display_name");
		$sthandler->bindParam(':display_name', $display_name);	
		$sthandler->execute();
		
		if($sthandler->rowCount() > 0){
			$messages[] = "Display Name already exists. Please choose another one";
			$valid = false;
		}
		
		header("Location:userpage.php");
	}
		
	if (!$valid) {
		$_SESSION['sentiment'] = "bad";
		$_SESSION['messages'] = $messages;
		header("Location: login.php");
		exit;
	}
	
			
	$Users->saveUser($display_name, $email, $password);
	
	header("Location: userpage.php");
	exit;