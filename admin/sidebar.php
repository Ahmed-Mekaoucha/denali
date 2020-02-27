<?php $View = new View();
foreach ($View->getUserByEmail($_SESSION['email']) as $row):
	$profilePicture = $row['profilePicture'];
endforeach;?>
<aside id="leftAdminSide">
	<?php  function addClasssActive($page) { return strripos($_SERVER['REQUEST_URI'], $page)? 'active': ''; } ?>
	<section id="profilePicture" style="background-image: url(<?php echo "../".$profilePicture?>);">
		<span id="profileSpin"><i id="pubspiner" class="fas fa-spinner fa-pulse fa-2x"></i></span>
	</section>
	<section id="addProfileImage">
		<input type="file" name="profileImage" id="profileImage">
		<span>Add profile image <i class="fas fa-upload"></i></span>
	</section>
	<ul>
		<li><?php echo '<a href='.constant("DOMAIN").'admin/profile.php class='.addClasssActive('profile').'>profile</a>';?></li>
		<li><?php echo '<a href='.constant("DOMAIN").'admin/newposte.php class='.addClasssActive('newposte').'>New poste</a>';?></li>
	</ul>
</aside>
