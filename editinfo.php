<!DOCTYPE html>

<?php 
	session_start();
	
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
	if(!isset($_SESSION['id'])) {
		header("Location:login.php");
		exit;
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
      <title> Edit Your Info </title>
      <link rel="stylesheet" type="text/css" href="stylesheet.css">
	  <link rel="stylesheet" type="text/css" href="user.css">
	  <link rel = "stylesheet" type= "text/css" href = "info.css">    
	  <link rel="stylesheet" href="../../style.css">
	  <link rel="stylesheet" href="../../fort.css">
	  <script src="../../fort.js"></script>
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
	  
	  <div class="form-wrapper">
	<form name="form" form method = "post" action="handlerinfo.php">
		<div class="form">
			<div class="form-item">
				<input type="text" name="firstname" id = "firstname" required="required" value = "<?php echo isset($presets['firstname']) ? $presets['fristname'] : ''; ?>" placeholder="First Name" autocomplete="on">
			</div>
			<div class="form-item">
				<input type="text" name="lastname" id= "lastname" required="required" value = "<?php echo isset($presets['lastname']) ? $presets['lastname'] : ''; ?>" placeholder="Last Name" autocomplete="on">
			</div>
			<div class="form-item">
				<input type="text" name="age" id= "age" required="required" value = "<?php echo isset($presets['age']) ? $presets['age'] : ''; ?>" placeholder="Age" autocomplete="on">
			</div>
			<div class="form-item">
				<input type="text" name="weight" id = "weight" required="required" value = "<?php echo isset($presets['weight']) ? $presets['weight'] : ''; ?>"  placeholder="Weight" autocomplete="on">
			</div>
			<div class = "form-item">
				<select name="bodytype" id = "bodytype">
					<option value = "enctomorph">Ectomorph</option>
					<option value = "endomorph">Endomorph</option>
					<option value = "mesomorph">Mesomorph</option>
				</select>
			</div>
			<div class="button-panel">
				<input type="submit" class="button" title="Sign In" value="Submit">
				
			</div>
		</div>
	</form>
</div>


	<div class ="sideBar">
	  <p class = "shadow">Welcome <?php echo $_SESSION['display_name'] ?></p>
	  <p class ="button"> <a href = "userinfo.php"><input type="button" value="User Info"></p>
	  <p class ="button"> <a href = "userpics.php"><input type="button" value="To Do"></p>
	  <p class ="button"> <a href = "editinfo.php"><input type="button" value="Edit Your Info"</p>
	</div>

	<div class = "footer">
		This is the footer
	</div>
	  
  </html>
