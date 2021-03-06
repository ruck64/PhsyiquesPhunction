<!DOCTYPE html>

	<?php 
	session_start();
	
	require_once "createtable.php";
	require_once "comments.php";
	require_once "Users.php";

	if (isset($_SESSION['messages'])) { ?>
		<div id="message"><?php
		foreach ($_SESSION['messages'] as $message) {
			echo "<span id='close'>X</span><div>" . $message . "</div>";
		}
		unset($_SESSION['messages']); ?>
		</div>
	<?php } 
	
		try {
		$conn = new PDO('mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_3e6dc0754d58604','bb2501c58a8034' ,'b8fa5f57');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e){
		exit($e->getMessage());
	}
  
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
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
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
	<li class = "subMenu"><?php if(isset($_SESSION['id'])){ ?><a class="subMenu" href="userpage.php">Your Page</a>
	<li class = "subMenu"><a class = "subMenu" href="logout.php">Logout</a>
		<?php }else{ ?>
		<a class="subMenu active" href="login.php">Sign Up/Login</a>
		<?php } ?>
	</li>
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
	
	<div class = "footer">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/social-likes/dist/social-likes_classic.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/social-likes/dist/social-likes.min.js"></script>

	<div class="social-likes">
		<div class="facebook" title="Share link on Facebook">Facebook</div>
		<div class="twitter" title="Share link on Twitter">Twitter</div>
		<div class="plusone" title="Share link on Google+">Google+</div>
	</div>	
		
	</body>		

	
	</html>