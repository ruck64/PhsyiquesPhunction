<?
	session_start();
?>

<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="stylesheet.css">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
			
			<title>Phsyiquesphunction</title>
		</head>
	<body>
	<p>
	<?php 
	include "createtable.php";
	include "comments.php";
	?>
	</p>
	<h1 class="title"> Link Has Come To Save The Day </h1>
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
	<li class = "subMenu active"><a class = "subMenu"  href = "https://ruck64.herokuapp.com/home.php">Home</a></li>
	<li class = "subMenu"><a class = "subMenu"  href = "myStory.php">My Story</a></li>  
	<li class = "subMenu"><a class = "subMenu"  href = "purpose.php">Purpose of PhsyquiesPhunction</a></li> 
	<li class = "subMenu"><a class = "subMenu"  href = "regimens.php">Regimens/Diet</a></li> 
	<li class = "subMenu"><a class = "subMenu"  href = "https://www.twitch.tv/">Twitch</a></li> 
	<li class = "subMenu"><a class = "subMenu"  href = "contact.php">Contact</a></li> 
	<li class = "subMenu"><?php if(isset($_SESSION['id'])){ ?><a class="subMenu" href="userpage.php">Your Page</a>
	<li class = "subMenu"><a class = "subMenu" href="logout.php">Logout</a>
		<?php }else{ ?>
		<a class="subMenu" href="login.php">Sign Up/Login</a>
		<?php } ?>
	</li>
	</ul>
		</div>
	</body>	
	<p align="center"> <iframe width="560" height="315" src="https://www.youtube.com/embed/4WgT9gy4zQA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> </p>
	
		<div class = "footer">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/social-likes/dist/social-likes_classic.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/social-likes/dist/social-likes.min.js"></script>

	<div class="social-likes">
		<div class="facebook" title="Share link on Facebook">Facebook</div>
		<div class="twitter" title="Share link on Twitter">Twitter</div>
		<div class="plusone" title="Share link on Google+">Google+</div>
	</div>
	
	</div>
	
		
	
	</html>
