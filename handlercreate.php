<?php 
	
	session_start();
	require_once 'Users.php';
	require_once 'comments.php';
	$Users = new Users();
	
	$display_name = $_POST['display_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$_SESSION['presets'] = array($_POST);
	$_SESSION['display_name'] = array($_POST);
	
	$valid = true;
	$messages = array(); 
		
	if(empty($display_name) || $display_name == "DISPLAY NAME") {
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
	
	if (!valid) {
		$_SESSION['sentiment'] = "bad";
		$_SESSION['messages'] = $messages;
		header("Location: login.php");
		exit;
	}
	
	$_SESSION['sentiment'] = "good";
	$_SESSION['messages'] = array("Account created successfully");
	$_SESSION['display_name'] = array($display_name);
	
	$Users->saveUser($display_name, $email, $password);
	
	header("Location: login.php");
	exit;
	
	
	