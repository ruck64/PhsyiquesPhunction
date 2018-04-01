<!DOCTYPE html>

	<?php 
	session_start();
	
	require_once "createtable.php";
	require_once "comments.php";
	require_once "Users.php";
	$Users = new Users();
	
	$save = $Users->saveUser();
	
	?>
	
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="stylesheet.css">
			<link rel= "stylesheet" type  = "text/css" href = "login.css">
			<title> Login/ Sign up </title>
		</head>
	<body>

	<h1 class = "title"> Login/Sign up</h1>

	<div class ="handles">
	<ul class="handles">
	<li class="handles"><a class="handles" href="twitter.com"> <img src="twitter.png" width=100px; height=100px;></a></li> 
	<li class="handles"><a class="handles" href="snapchat.com"> <img src="snapchat.png" width=100px; height=100px;></a></li>
	<li class="handles"><a class="handles" href="instagram.com"> <img src="instagram.png" width=100px; height=100px;></a></li>
	<li class="handles"><a class="handles" href="twitch.com"> <img src="twitch.png" width=100px; height=100px;></a></li>
	<li class="handles"><a class="handles" href="youtube.com"> <img src="youtube.png" width=100px; height=100px;></a></li>
	</ul>
	</div>
	
	<div class="subMenu"> 
	<ul class = "subMenu">
	<li class = "subMenu"><a class = "subMenu"  href = "https://ruck64.herokuapp.com/home.php">Home</a></li>
	<li class = "subMenu"><a class = "subMenu"  href = "myStory.php">My Story</a></li>  
	<li class = "subMenu"><a class = "subMenu"  href = "purpose.php">Purpose of PhsyquiesPhunction</a></li> 
	<li class = "subMenu"><a class = "subMenu"  href = "regimens.php">Regimens/Diet</a></li> 
	<li class = "subMenu"><a class = "subMenu"  href = "https://www.twitch.tv/">Twitch</a></li> 
	<li class = "subMenu"><a class = "subMenu"  href = "contact.php">Contact</a></li> 
	<li class = "subMenu"><a class = "subMenu"  href = "login.php">Sign Up/Login</a></li> 
	</ul>
		</div>
		
	</body>	
	
	<?php
		if (isset($_SESSION['messages'])) {
			$sentiment = $_SESSION['sentiment'];
			foreach($_SESSION['messages'] as $message) {
				echo "<div class = 'message $sentiment'>$message</div>";
			}
		}
	?>
	
	<?php
     $presets = array();
     if (isset($_SESSION['presets'])) {
       $presets = array_shift($_SESSION['presets']);
     }
     unset($_SESSION['presets']);
     unset($_SESSION['messages']);
     unset($_SESSION['messages']);
    ?>
	
	<div class="login-page">
		<div class="form">
				<form class="register-form">
				<input type="text" placeholder="name"/>
				<input type="password" placeholder="password"/>
				<input type="text" placeholder="email address"/>
				<button>create</button>
				<p class="message">Already registered? <a href="#">Sign In</a></p>
			</form>
			<form class="login-form">
				<input type="text" placeholder="username"/>
				<input type="password" placeholder="password"/>
				<button>login</button>
				<p class="message">Not registered? <a href="#">Create an account</a></p>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="yourfile.js"></script>
	
<div class = "footer">
	This is the footer
		</div>
	
	</html>