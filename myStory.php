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
	<li class = "subMenu"><a class = "subMenu"  href = "myStory.php">My Story</a></li>  
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
	  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
	  Morbi auctor massa quis tempor mattis. Suspendisse imperdiet pretium enim eget lobortis. 
	  Cras velit neque, lacinia sit amet purus eget, porttitor finibus libero.
	  Sed consequat quam at enim pretium imperdiet. Duis et lacus eleifend, rhoncus massa ac, fermentum lectus. 
	  Suspendisse nec nulla vel ipsum sollicitudin imperdiet sed at arcu. Nulla at interdum risus.
	  Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 
	  Etiam eu molestie ex. Nam id mauris non sem commodo blandit dapibus eget tellus.
	  Aenean tellus augue, pulvinar nec felis a, ornare consequat augue. 
	  Donec scelerisque, enim vitae malesuada malesuada, mauris lorem tempus libero, porta pellentesque sapien magna ac elit.
	  Maecenas purus ante, iaculis et sodales eget, feugiat viverra mi.
	  Etiam mattis mattis risus, eget gravida lacus iaculis sit amet.
	  Maecenas nec mi faucibus, dictum leo sit amet, porta eros.
	  Duis in lacinia dolor. Integer eget tristique est. In sagittis lectus dolor, eu semper ligula dictum ut.
	  Sed non lacinia magna. Duis ante justo, placerat id accumsan ac, tempor sit amet augue. 
	  Integer porta rhoncus finibus. Fusce ullamcorper urna eget felis commodo semper.
	  Etiam suscipit aliquam ante, vel pretium ligula blandit ac. 
	  Vivamus auctor volutpat eros, in sodales enim congue et. Pellentesque nec tortor felis. Cras id efficitur leo. 
	  Nulla vulputate nulla sed sem dapibus aliquam. Aenean mi arcu, dignissim in neque et, laoreet facilisis nisl.
	  Donec hendrerit nisi sit amet nulla maximus, in tincidunt ipsum aliquam.
	  Fusce risus risus, efficitur venenatis urna et, rhoncus laoreet magna. Cras accumsan mollis quam.
	  Integer venenatis orci mi. Quisque eget eros eget justo pellentesque iaculis. Vivamus id neque non tellus porttitor lacinia. Phasellus pulvinar quis nibh a suscipit. Donec eget sem et metus mollis sodales. Nam efficitur libero neque, non congue tortor porta a.
	  In hac habitasse platea dictumst. Mauris sit amet elit accumsan, luctus neque ut, eleifend orci. Morbi blandit sagittis posuere. Nunc sit amet sollicitudin urna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum tempus ex ac massa faucibus, non mollis sapien suscipit. Phasellus non tellus a enim aliquet placerat nec ut tortor. Morbi vestibulum euismod elit, sed commodo ipsum malesuada at. Etiam sit amet ultrices ipsum, id lobortis purus.
	  Vestibulum vel nulla id nibh gravida efficitur. Cras congue blandit hendrerit. Nulla sed semper ex.
	  Suspendisse tincidunt elit eu nisi gravida euismod. Nulla facilisi. Mauris dapibus in lorem id fringilla.
	  Suspendisse eros mi, laoreet vel diam nec, suscipit porta augue. Etiam ultrices fringilla auctor. 
	  Nulla eu ligula vel nibh elementum tempus. 
	  </p>


<div class = "footer">
	This is the footer
		</div>

  </html>
