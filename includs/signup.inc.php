<form id="signup" method="POST" action=<?php echo constant("DOMAIN")."includs/signupAction.inc.php";?>>
	<label>First name</label>
	<input type="text" name="firstName" placeholder="Enter your first name...">
	<label>Last name</label>
	<input type="text" name="lastName" placeholder="Enter your last name...">
	<label>Email address</label>
	<input type="email" name="email" placeholder="Enter your email...">
	<label>Username</label>
	<input type="text" name="username" placeholder="Enter your username...">
	<label>Password</label>
	<input type="password" name="password" placeholder="Enter your password...">
	<input type="submit" name="signup" value="Sign up" class="button">
</form>
