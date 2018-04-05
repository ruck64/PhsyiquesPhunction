<?php 
	session_start();
	if(isset($_SESSION['display_name'])) {
		header("Location:userpage.php");
		echo "logged in";
	}
	else {
		header("Location:login.php");
		
	}
	
	require_once "createtable.php";
	require_once "comments.php";
	require_once "Users.php";
	require_once "handlerlogin.php"
?>

<!DOCTYPE html>
  <html>
    <head>
      <title> User </title>
      <link rel="stylesheet" type="text/css" href="stylesheet.css">
	  <link rel="stylesheet" type="text/css" href="user.css">
    </head>

    <h1 class = "title"> User </h1>

	<div class ="handles">
	<ul class="handles">
	<li class="handles"><a class="handles" href="https://www.twitter.com"> <img src="twitter.png" width=100px; height=100px;></a></li> 
	<li class="handles"><a class="handles" href="https://www.snapchat.com"> <img src="snapchat.png" width=100px; height=100px;></a></li>
	<li class="handles"><a class="handles" href="https://www.instagram.com"> <img src="instagram.png" width=100px; height=100px;></a></li>
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
	<li class = "subMenu"><a class = "subMenu"  href = "contact.html">Contact</a></li> 
	<li class = "subMenu"><?php if(isset($_SESSION['id'])){ ?><a class="subMenu" href="logout.php">logout</a>
	<li class = "subMenu"><a class = "subMenu" href="userpage.php">Your Profile</a>
		<?php }else{ ?>
		<a class="subMenu" href="login.php">Sign Up/Login</a>
		<?php } ?>
	</li> 
	</ul>
		</div>
      <h2> This is my page. Not yours </h2>

	  
	  <div class ="sideBar">
	  <p class="shadow ">Welcome User</p>
	  <p class ="button"> <a href = "userinfo.html"><input type="button" value="User Info"></p>
	  <p class ="button"> <a href = "userpics.html"><input type="button" value="Your pics"></p>
	  <p class ="button"> <a href = "editinfo.html"><input type="button" value="Edit Your Info"</p>
	  </div>

	  <div class = "footer">
	This is the footer
		</div>
	  
  </html>
