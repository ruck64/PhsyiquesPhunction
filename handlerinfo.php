<?php
	
	session_start();
	require_once 'Users.php';
	require_once 'userinfo.php';
	$Users = new Users();
	
	$firstname = htmlspecialchars($_POST['firstname']);
	echo "first name" . $firstname;
	$lastname = htmlspecialchars($_POST['lastname']);
	$id = $_SESSION['id'];
	$age = $_POST['age'];
	$weight = $_POST['weight'];
	$bodytype = $_POST['bodytype'];	
	
	$_SESSION['presets'] = array($_POST);
	
	$valid = true;
	$messages = array(); 
	
	if(empty($firstname)) {
		echo "firstname " . $firstname;
		$messages[] = "PLEASE ENTER A FIRST NAME";
		$valid = false;
	}
	
	if(empty($lastname)) {
		$messages[] = "PLEASE ENTER A LAST NAME";
		$valid = false;
	}
	
	if(empty($age) || !is_int($age)) {
		$messages[] = "PLEASE ENTER AN AGE";
		$valid = false;
	}
	
	if(empty($weight) || !is_int($weight)) {
		$messages[] = "PLEASE ENTER A VALID NUMBER";
		$valid = false;
	}
	
		if(!isset($error)){
		//no error
		$sthandler = $conn->prepare("SELECT firstname FROM UserInfo WHERE id = '$id'");
		$sthandler->bindParam('firstname', $firstname);	
		$sthandler->execute();

		$sthandler = $conn->prepare("SELECT lastname FROM UserInfo WHERE id = '$id'");
		$sthandler->bindParam(':lastname', $lastname);	
		$sthandler->execute();

		$sthandler = $conn->prepare("SELECT age FROM UserInfo WHERE id = '$id'");
		$sthandler->bindParam(':age', $age);	
		$sthandler->execute();
		
		$sthandler = $conn->prepare("SELECT weight FROM UserInfo WHERE id = '$id'");
		$sthandler->bindParam(':weight', $weight);	
		$sthandler->execute();
		
		$sthandler = $conn->prepare("SELECT bodytype FROM UserInfo WHERE id = '$id'");
		$sthandler->bindParam(':bodytype', $bodytype);	
		$sthandler->execute();	
		
	}
	
	if (!$valid) {
		$_SESSION['sentiment'] = "bad";
		$_SESSION['messages'] = $messages;
		header("Location: editinfo.php");
		exit;
	}
	
	else {
		$Users->saveUserInfo ($firstname, $lastname, $age. $weight, $bodytye);
		header("Location:userinfo.php");
		exit;
	}
	
  