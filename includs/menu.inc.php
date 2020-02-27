<ul id="menuUl">
  	<li><a href=<?php echo constant("DOMAIN") ;?>><i class="fas fa-home"></i> Home</a></li>
  	<li><a href=<?php echo constant("DOMAIN").'pages/about.php';?>><i class="fas fa-info"></i> About</a></li>
  	<li><a href=<?php echo constant("DOMAIN").'pages/contact.php';?>><i class="fas fa-envelope"></i> Contact</a></li>
 	<?php if (isset($_SESSION['id']) || isset($_COOKIE['login'])):?>
    	<li id="profile">
  		<a href=<?php echo constant("DOMAIN").'admin/profile.php';?>><i class="fas fas fa-user"></i> Profile</a>
		<ul>
			<li><a href=<?php echo constant("DOMAIN").'admin/newposte.php';?>><i class="fas fa-paragraph"></i> New poste</a></li>
			<li><a href=<?php echo constant("DOMAIN").'includs/logoutAction.inc.php';?>><i class="fas fa-sign-in-alt"></i> Log Out</a></li>
		</ul>
  	</li>
  	<?php else:?>
  		<li class="loginButton" ><a href="#"><i class="fas fa-sign-in-alt"></i> Log In</a></li>
  	<?php endif;?>
</ul>