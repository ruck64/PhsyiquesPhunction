<!DOCTYPE html>

<?php 
	session_start();
	
	require_once "comments.php";
	require_once "Users.php";
	
	if(!isset($_SESSION['id'])) {
		header("Location:login.php");
		exit;
	}
?>
  <html>
    <head>
      <title> Edit Your Info </title>
      <link rel="stylesheet" type="text/css" href="stylesheet.css">
	  <link rel="stylesheet" type="text/css" href="user.css">
	  <link rel = "stylesheet" type= "text/css" href = "info.css">
	  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    </head>

    <h1 class = "title"> Edit Your Info </h1>

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
	<li class = "subMenu"><a class = "subMenu"  href = "contact.">Contact</a></li> 
	<li class = "active subMenu"><?php if(isset($_SESSION['id'])){ ?> <a class="subMenu" href="userpage.php">Your Page</a>
	<li class = "subMenu"><a class = "subMenu" href="logout.php">Logout</a>
		<?php }else{ ?>
		<a class="subMenu" href="login.php">Sign Up/Login</a>
		<?php } ?>
	</li> 
	</ul>
		</div>

      <h2> <?php echo $_SESSION['display_name'] . " info" ?> </h2>

	<ul class="list">
	<form method="post" action = "handlerinfo.php" method = "POST" enctype = "multipart/form-data">
		<li>
			<ul>
				<li>First Name</li>
					<ul>
						<li><input value = "<?php echo isset($presets['firstname']) ? $presets['firstname'] : ''; ?>" type="text" placeholder="Enter First Name" id = "firstname" name = "firstname"></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<ul>
				<li>Last Name</li>
					<ul>
						<li><input value = "<?php echo isset($presets['lastname']) ? $presets['lastname'] : ''; ?>" type="text" placeholder="Enter Last Name" id = "lastname" name = "lastname"></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<ul>
				<li>Age</li>
					<ul>
						<li><input value = "<?php echo isset($presets['age']) ? $presets['age'] : ''; ?>" type="text" placeholder="Enter Your Age" id = "age" name = "age"></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<ul>
				<li>Weight</li>
					<ul>
						<li><input value = "<?php echo isset($presets['weight']) ? $presets['weight'] : ''; ?>" type="text" placeholder="Enter Your Weight" id = "weight" name = "weight"></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<ul>
				<li>Body Type</li>
					<ul>
						<li><select  name ="bodytype">
							<option value ="Ectomorph">Ectomorph</option>
							<option value ="Endomorg">Endomorph</option>
							<option value ="Mesomorph">Mesomorph</option>
							</select>
						</li>
					</ul>
					<p><input type="submit" value="Submit"></p>
				</li>
			</ul>
		</li>
		</form>
	</ul>
	
	<div class ="sideBar">
	  <p class = "shadow">Welcome <?php echo $_SESSION['display_name'] ?></p>
	  <p class ="button"> <a href = "userinfo.php"><input type="button" value="User Info"></p>
	  <p class ="button"> <a href = "userpics.php"><input type="button" value="To Do"></p>
	  <p class ="button"> <a href = "editinfo.php"><input type="button" value="Edit Your Info"</p>
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
	</div>
	  
  </html>
