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
		
		$query = $conn->prepare("SELECT password FROM users WHERE email=?");
		$query->execute(array($_POST['email']));
		if($query->fetchColumn() === $_POST['password'] && $valid) //better to hash it
		{		
			$getId = $conn->prepare("SELECT id FROM users Where email=:email");
			$getId->execute(array(':email' => $email));
			$user = $getId->fetchAll(PDO::FETCH_ASSOC);
			$_SESSION['id'] = $user['id'];
			$_SESSION['display_name'] = $user['display_name'];
			setcookie("display_name","display_name");
			$messages[] = "login successful";
			header("Location:userpage.php");
			exit;
		}
		else {
		$_SESSION['sentiment'] = "bad";
		$_SESSION['messages'] = $messages;
//		header("Location:login.php");
		exit;
		}
	}
