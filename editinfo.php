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
	  <link rel="stylesheet" href="styles/normalize.css">
      <link rel="stylesheet" href="styles/main.css">
      <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="styles/jquery.FloatLabel.css">
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

        <div class="wrapper">

            <h1>FloatLabel.js</h1>

            <form id="demoForm" action="handlerinfo">
                
                <div class="js-float-label-wrapper">
                    <label for="FirstName">First name</label>
                    <input id="firstname" type="text" name="firstname/>
                </div>

                <div class="js-float-label-wrapper">
                    <label for="lastname">Last Name</label>
                    <input id="lastname" type="text" name = "lastname"/>
                </div>

                <div class="js-float-label-wrapper">
                    <label for="age">Age</label>
                    <textarea id="age" type="text" name = "age"></textarea>
                </div>

				
	           <div class="js-float-label-wrapper">
                    <label for="weight">Weight</label>
                    <textarea id="weight" type="text" name = "weight"></textarea>
                </div>
				
				<select name="bodytype">
					<option value="Ectomorph">Ectomorph</option>
					<option value = "Endomorph">Endomorph</option>
					<option value - "Mesomorph">Mesomorph</option>
				</select>
				
                <input type="submit" value="Save" />

            </form>

        </div>

        <script src="scripts/jquery.js"></script>
        <script src="scripts/jquery.FloatLabel.js"></script>
        <script src="scripts/main.js"></script>
	
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
