<?php 
	
	session_start();
	require_once 'Users.php';
	require_once 'comments.php';
	$Users = new Users();
	
	$conn->getConnection();
	
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
			$id = $conn->prepare("SELECT id FROM users Where email=?");
			$id->execute(array($_POST['email']));
			$id->fetchColumn;
			$_SESSION["id"] = $id;
			setcookie("display_name","display_name");
			$messages[] = "login successful";
			header("Location:userpage.php");
			exit;
		}
		else {
		$_SESSION['sentiment'] = "bad";
		$_SESSION['messages'] = $messages;
		header("Location:login.php");
		exit;
		}
	}
