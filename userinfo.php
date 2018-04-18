<?php 
	session_start();
	
	require_once 'Users.php';
	$Users = new Users();
	
		try {
		$conn = new PDO('mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_3e6dc0754d58604','bb2501c58a8034' ,'b8fa5f57');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e){
		exit($e->getMessage());
	}
	
		if(!isset($_SESSION['id'])) {
		header("Location:login.php");
		exit;
		}
		
		echo "original id " . $_SESSION['id'];
		$query = $conn->prepare("SELECT password FROM UserInfo");
		$query->execute(array($_SESSION['id']]));
		$passcheck = $query->fetch();
		echo " new id " . $passcheck;
		//$firstname = $Users->getFirstName($_SESSION['id']);
?>

<!DOCTYPE html>
  <html>
    <head>
      <title> Edit Info </title>
      <link rel="stylesheet" type="text/css" href="stylesheet.css">
	  <link rel="stylesheet" type="text/css" href="user.css">
	  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
	  <link rel = "stylesheet" type= "text/css" href = "info.css">	  
    </head>

    <h1 class = "title"> Edit Info </h1>

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
			<li class = "subMenu"><?php if(isset($_SESSION['id'])){ ?> <a class="subMenu" href="userpage.php">Your Page</a>
			<li class = "subMenu"><a class = "subMenu" href="logout.php">Logout</a>
			<?php }else{ ?>
			<a class="subMenu" href="login.php">Sign Up/Login</a>
			<?php } ?></li> 
		</ul>
	</div>

    <h2>Your Information </h2>
	
		<ul class="list">
	<form method="post" action = "handlerinfo.php" method = "POST" enctype = "multipart/form-data">
		<li>
			<ul>
				<li>First Name</li>
					<ul>
						<li><?php echo firstname; ?></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<ul>
				<li>Last Name</li>
					<ul>
						<li></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<ul>
				<li>Age</li>
					<ul>
						<li></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<ul>
				<li>Weight</li>
					<ul>
						<li></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<ul>
				<li>Body Type</li>
					<ul>
						<li>form get for body
						</li>
					</ul>
				</li>
			</ul>
		</li>
		</form>
	</ul>
	
	  
	<div class ="sideBar">
	  <p class="shadow">Welcome <?php echo $_SESSION['display_name'] ?></p>
	  <p class ="button"> <a href = "userinfo.php"><input type="button" value="User Info"></p>
	  <p class ="button"> <a href = "userpics.php"><input type="button" value="Your pics"></p>
	  <p class ="button"> <a href = "editinfo.php"><input type="button" value="Edit Your Info"></p>
	</div>

	<div class = "footer">
		This is the footer
	</div>
	  
  </html>
