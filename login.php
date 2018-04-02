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
		try {
		$conn = new PDO('mysql:host=us-cdbr-iron-east-05.cleardb.net;dbname=heroku_3e6dc0754d58604','bb2501c58a8034' ,'b8fa5f57');
		$this->logger->logDebug("Established a database connection.");
		return $conn;
		} catch (Exception $e) {
		echo "connection failed: " . $e->getMessage();
		$this->logger->logFatal("The database connection failed.");
		}
		$sql = "SELECT * FROM Users";
		$query = $db->prepare( $sql );
		$query->execute();
		$results = $query->fetchAll( PDO::FETCH_ASSOC );
	?>
 <table class="table">
   <tr>
     <th>ID</th>
     <th>Display Name</th>
     <th>email</th>
     <th>Password</th>
   </tr>
   <?php foreach( $results as $row ){
   echo "<tr><td>";
     echo $row['id'];
     echo "</td><td>";
     echo $row['display_name'];
     echo "</td><td>";
     echo $row['email'];
     echo "</td><td>";
     echo $row['password'];
     echo "</td><td>";
   echo "</tr>";
   }
 ?>
 </table>
	
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
	
	<?php echo $_POST['display_name']; ?>
	
	<div class="cont_principal">

		<div class="cont_centrar">
			<div class="cont_login">
				<form action="handlercreate.php" method="POST" enctype="multipart/form-data" >
					<div class="cont_tabs_login">
						<ul class='ul_tabs'>
							<li class="active"><a href="#" onclick="sign_in()">SIGN IN</a><span class="linea_bajo_nom"></span></li>
							<li><a href="#up" onclick="sign_up()">SIGN UP</a><span class="linea_bajo_nom"></span></li>
						</ul>
					</div>
					<div class="cont_text_inputs">
						<input value = "<?php echo isset($presets['display_name']) ? $presets['display_name'] : ''; ?>" type="text" class="input_form_sign " placeholder="DISPLAY NAME" id = "display_name" name="display_name" />
						<input value = "<?php echo isset($presets['email']) ? $presets['email'] : ''; ?>"type="text" class="input_form_sign d_block active_inp" placeholder="EMAIL" id = "email" name="email"/>
						<input type="password" class="input_form_sign d_block  active_inp" placeholder="PASSWORD" id = "password" name="password" />  
						<input type="password" class="input_form_sign" placeholder="CONFIRM PASSWORD" id = "confirmpassword" name="confirmpassword" /><a href="#" class="link_forgot_pass d_block" >Forgot Password ?</a>    
					</div>
					<div class="cont_btn">
						<button class="btn_sign" type="submit" value="Submit">SIGN IN</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
		<script type = "text/javascript" src = "login.js"></script>
	
	<div class = "footer">
		This is the footer
	</div>	
		
	</body>		

	
	</html>