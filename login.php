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
		
		<div id="container_demo" >
	<!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
	<a class="hiddenanchor" id="toregister"></a>
	<a class="hiddenanchor" id="tologin"></a>
	<div id="wrapper">
		<div id="login" class="animate form">
			<form  action="mysuperscript.php" autocomplete="on"> 
				<h1>Log in</h1> 
				<p> 
					<label for="username" class="uname" data-icon="u" > Your email or username </label>
					<input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
				</p>
				<p> 
					<label for="password" class="youpasswd" data-icon="p"> Your password </label>
					<input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
				</p>
				<p class="keeplogin"> 
					<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
					<label for="loginkeeping">Keep me logged in</label>
				</p>
				<p class="login button"> 
					<input type="submit" value="Login" /> 
				</p>
				<p class="change_link">
					Not a member yet ?
					<a href="#toregister" class="to_register">Join us</a>
				</p>
			</form>
		</div>

		<div id="register" class="animate form">
			<form  action="mysuperscript.php" autocomplete="on"> 
				<h1> Sign up </h1> 
				<p> 
					<label for="usernamesignup" class="uname" data-icon="u">Your username</label>
					<input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
				</p>
				<p> 
					<label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
					<input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
				</p>
				<p> 
					<label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
					<input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
				</p>
				<p> 
					<label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
					<input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
				</p>
				<p class="signin button"> 
					<input type="submit" value="Sign up"/> 
				</p>
				<p class="change_link">  
					Already a member ?
					<a href="#tologin" class="to_register"> Go and log in </a>
				</p>
			</form>
		</div>
		
	</div>
</div>
	
<div class = "footer">
	This is the footer
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
	

	
	</html>