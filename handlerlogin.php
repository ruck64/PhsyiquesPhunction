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
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$_SESSION['presets'] = array($_POST);
	
	$valid = true;
	$messages = array(); 
		
	if (!$valid) {
		$_SESSION['sentiment'] = "bad";
		$_SESSION['messages'] = $messages;
		header("Location: login.php");
		exit;
	}
	
	if(!isset($error)){
		//no error
		$sthandler = $conn->prepare("SELECT email FROM Users WHERE email = :email");
		$sthandler->bindParam(':email', $email);	
		$sthandler->execute();

		if($sthandler->rowCount() > 0){
			$messages[] = "Email or password incorrect";
			$valid = false;
		}
		
		$sthandler = $conn->prepare("SELECT password FROM Users WHERE password = :password");
		$sthandler->bindParam(':password', $password);	
		$sthandler->execute();
		
		if($sthandler->rowCount() > 0){
			$messages[] = "Incorrect password";
			$valid = false;
		}
		
	if (!$valid) {
		$_SESSION['sentiment'] = "bad";
		$_SESSION['messages'] = $messages;
		header("Location: login.php");
		exit;
	}
	}
	
	header("Location: userpage.php");
	exit;