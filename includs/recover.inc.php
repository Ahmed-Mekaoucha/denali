<form id="recover" method="POST" action=<?php echo constant("DOMAIN")."includs/recoverAction.inc.php";?>>
	<input type="hidden" name="token" value="">
	<input type="hidden" name="validator" value="">
	<label>Email</label>
	<input type="email" name="email" placeholder="Enter your email...">
	<label>First name</label>
	<input type="text" name="firstName" placeholder="Enter your first name...">
	<label >Last name</label>
	<input type="text" name="lastName" placeholder="Enter your last name...">
	<input type="submit" name="recover" value="Recover" class="button">
</form>