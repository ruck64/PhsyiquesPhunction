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
	
	if(empty($email)) {
		$messages[] = "Please enter a display name";
		$valid = false;
	}
	
	if(empty($password)) {
		$messages[] = "Please enter a password";
		$valid = false;
	}
	
	if(!isset($error)){
		//no error
//		$sthandler = $conn->prepare("SELECT email FROM users WHERE email = :email");
	//	$sthandler->bindParam(':email', $email);	
		//$sthandler->execute();

		
		 $query = $conn->prepare("SELECT password FROM login WHERE username=?");
		$query->execute(array($_POST['username']));
		if($query->fetchColumn() === $_POST['password']) //better to hash it
		{
			// starts the session created if login info is correct
			session_start();
			$_SESSION['username'] = $_POST['username'];
			header ("Location:login.php");
			exit;
		}
		
		if($sthandler->rowCount() > 0){
			$messages[] = "Email is incorrect";
			$valid = false;
		}
		
		if($sthandler->rowCount() > 0){
			$messages[] = "Incorrect password";
			$valid = false;
		}
	}
	if (!$valid) {
		$_SESSION['sentiment'] = "bad";
		$_SESSION['messages'] = $messages;
		header("Location: login.php");
		exit;
	}
	
		$messages[]="it worked";
		$_SESSION['messages'] = $messages;
	
	header("Location: userpage.php");
	exit;