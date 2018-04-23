<?php 
		session_start();
?>

<!DOCTYPE html>
  <html>
    <head>
      <title> MyStory </title>
      <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
	<body>
    <h1 class = "title"> MY STORY </h1>

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
	<li class = "subMenu active"><a class = "subMenu"  href = "myStory.php">My Story</a></li>  
	<li class = "subMenu"><a class = "subMenu"  href = "purpose.php">Purpose of PhsyquiesPhunction</a></li> 
	<li class = "subMenu"><a class = "subMenu"  href = "regimens.php">Regimens/Diet</a></li> 
	<li class = "subMenu"><a class = "subMenu"  href = "https://www.twitch.tv/">Twitch</a></li> 
	<li class = "subMenu"><a class = "subMenu"  href = "contact.php">Contact</a></li> 
	<li class = "subMenu"><?php if(isset($_SESSION['id'])){ ?><a class="subMenu" href="logout.php">logout</a>
		<?php }else{ ?>
		<a class="subMenu" href="login.php">Sign Up/login</a>
		<?php } ?>
	</li>
	</ul>
		</div>

	</body>
	
      <p class="basic"> 

	<br><br>Now this is a story all about how
	<br>My life got flipped-turned upside down
	<br>And I'd like to take a minute
	<br>Just sit right there
	<br>I'll tell you how I became the prince of a town called Bel-Air

	<br><br>In west Philadelphia born and raised
	<br>On the playground was where I spent most of my days
	<br>Chillin' out maxin' relaxin' all cool
	<br>And all shooting some b-ball outside of the school
	<br>When a couple of guys who were up to no good
	<br>Started making trouble in my neighborhood
	<br>I got in one little fight and my mom got scared
	<br>She said, "You're movin' with your auntie and uncle in Bel-Air."

	<br><br>I begged and pleaded with her day after day
	<br>But she packed my suitcase and sent me on my way
	<br>She gave me a kiss and then she gave me my ticket.
	<br>I put my Walkman on and said, "I might as well kick it."

	<br><br>First class, yo, this is bad
	<br>Drinking orange juice out of a champagne glass.
	<br>Is this what the people of Bel-Air living like?
	<br>Hmm, this might be alright.

	<br><br>But wait I hear they're prissy, bourgeois, all that
	<br>Is this the type of place that they just send this cool cat?
	<br>I don't think so
	<br>I'll see when I get there
	<br>I hope they're prepared for the prince of Bel-Air
	
	<br><br>Well, the plane landed and when I came out
	<br>There was a dude who looked like a cop standing there with my name out
	<br>I ain't trying to get arrested yet
	<br>I just got here	
	<br>I sprang with the quickness like lightning, disappeared

	<br>I whistled for a cab and when it came near
	<br>The license plate said "Fresh" and it had dice in the mirror
	<br>If anything I could say that this cab was rare
	<br>But I thought, "Nah, forget it."
	<br>– "Yo, home to Bel-Air."

	<br><br>I pulled up to the house about 7 or 8
	<br>And I yelled to the cabbie, "Yo home smell ya later."
	<br>I looked at my kingdom
	<br>I was finally there
	<br>To sit on my throne as the Prince of Bel-Air 
	  </p>


<div class = "footer">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/social-likes/dist/social-likes_classic.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/social-likes/dist/social-likes.min.js"></script>

	<div class="social-likes">
		<div class="facebook" title="Share link on Facebook">Facebook</div>
		<div class="twitter" title="Share link on Twitter">Twitter</div>
		<div class="plusone" title="Share link on Google+">Google+</div>
		</div>

  </html>
