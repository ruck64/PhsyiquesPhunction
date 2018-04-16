<?php 
	
	session_start();
	require_once 'Users.php';
	require_once 'comments.php';
	$Users = new Users();
	
	try {
		$conn = new PDO('mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_3e6dc0754d58604','bb2501c58a8034' ,'b8fa5f57');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e){
		exit($e->getMessage());
	}
	
	$salt = '1basket69';
	$email = htmlspecialchars($_POST['email']);
	$password = $salt. $_POST['password'];
	$password = md5($password);
	
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

	$query = $conn->prepare( "SELECT email FROM Users WHERE email = ?");
	$query->bindValue( 1, $email );
	$query->execute();
	echo "after checking email";
	if(!$query->rowCount() > 0){
		$messages[] = "Email does not exist";
		echo "row count" . rowCount();
		$valid = false;
	}
	
	if(!isset($error) && $valid)
	{
		$query = $conn->prepare("SELECT password FROM Users WHERE email='$email'");
		$query->execute(array($_POST['email']));
		if($query->fetchColumn() === $password && $valid) //better to hash it
		{		
			$getId = $conn->prepare("SELECT * FROM Users Where email='email'");
			$getId->execute(array(':email' => $email));
			$user = $getId->fetch(PDO::FETCH_ASSOC);
			$_SESSION['id'] = $user['id'];
			$_SESSION['display_name'] = $user['display_name'];
			setcookie("display_name","display_name");
			$messages[] = "login successful";
			header("Location:userpage.php");
			exit;
		}
	}
	echo "didnt hit header";
		if (!$valid) 
		{
			$_SESSION['sentiment'] = "bad";
			$_SESSION['messages'] = $messages;
			$_SESSION['messages'] = $password;
			echo 
		//	header("Location: login.php");
			exit;
		}
	