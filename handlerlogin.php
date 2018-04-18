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
	
	$email = htmlspecialchars($_POST['email']);
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

	$query = $conn->prepare( "SELECT email FROM Users WHERE email = ?");
	$query->bindValue( 1, $email );
	$query->execute();
	
	if(!$query->rowCount() > 0){
		$messages[] = "Email does not exist";
		$valid = false;
	}

	$query = $conn->prepare("SELECT password FROM Users WHERE email='$email'");
	$query->execute(array($_POST['email']));
	$passcheck = $query->fetchColumn();
	
	$salt = '1basket69';
	$password = $salt . $_POST['password'];
	$password = md5($password);
	echo "passcheck " . $passcheck . "<br>";
	
	if(!$passcheck == $password) {
		$messages[] = "Password and email do not match";
		echo "passcheck " . $passcheck;
		echo "password " . $password;
		exit;
		$valid = false;
	}

	if(!isset($error) && $valid)
	{
		$getId = $conn->prepare("SELECT * FROM Users Where email='$email'");
		$getId->execute(array(':email' => $email));
		$user = $getId->fetch(PDO::FETCH_ASSOC);
		$_SESSION['id'] = $user['id'];
		$_SESSION['display_name'] = $user['display_name'];
		setcookie("display_name","display_name");
		$messages[] = "login successful";
		echo "sending to userpage";
		header("Location:userpage.php");
		exit;
	}
	

		if (!$valid) 
		{
			$_SESSION['sentiment'] = "bad";
			$_SESSION['messages'] = $messages;
			header("Location: login.php");
			exit;
		}
	