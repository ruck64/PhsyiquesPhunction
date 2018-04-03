<!DOCTYPE html>

	<?php 
	session_start();
	
	require_once "createtable.php";
	require_once "comments.php";
	require_once "Users.php";
	
	?>
	
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
	<li class="handles"><a class="handles" href="htt[s://www.twitter.com"> <img src="twitter.png" width=100px; height=100px;></a></li> 
	<li class="handles"><a class="handles" href="https://www.snapchat.com"> <img src="snapchat.png" width=100px; height=100px;></a></li>
	<li class="handles"><a class="handles" href="https://www.instagram.com/"> <img src="instagram.png" width=100px; height=100px;></a></li>
	<li class="handles"><a class="handles" href="https://www.twitch.com"> <img src="twitch.png" width=100px; height=100px;></a></li>
	<li class="handles"><a class="handles" href="https://www.youtube.com"> <img src="youtube.png" width=100px; height=100px;></a></li>
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
	
	<div class = "main">
		<div id="wrapperform">
			<div class="form_div">
				<p class="form_label">LOGIN FORM</p>
				<form method="post"  action = "handlerlogin.php" method = "POST" enctype = "multipart/form-data">
					<p><input value = "<?php echo isset($presets['email']) ? $presets['email'] : ''; ?>" type="text" placeholder="Enter Email" id = "email" name = "email"></p>
					<p><input type="password" placeholder="Password" id = "password" name = "password"></p>
					<p><input type="submit" value="LOGIN"></p>
				</form>
			</div>
			<br>
			<br>
			<br>
			<div class="form_div">
				<p class="form_label">SIGNUP FORM</p>
				<form method="post" action = "handlercreate.php" method = "POST" enctype = "multipart/form-data">
					<p><input value = "<?php echo isset($presets['display_name']) ? $presets['display_name'] : ''; ?>" type="text" placeholder="Enter Display Name" id = "display_name" name = "display_name"></p>
					<p><input value = "<?php echo isset($presets['email']) ? $presets['email'] : ''; ?>" type="text" placeholder="Enter Email" id = "email" name = "email"></p>
					<p><input type="password" placeholder="Password" id = "password" name = "password"></p>
					<p><input type="password" placeholder="Confirm Password" id = "confirmpassword" name = "confirmpassword"></p>
					<p><input type="submit" value="SIGNUP"></p>
				</form>
			</div>

		</div>
	</div>
		<!--<script type = "text/javascript" src = "login.js"></script>-->
	
	<div class = "footer">
		This is the footer
	</div>	
		
	</body>		

	
	</html>