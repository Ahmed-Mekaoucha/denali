<form id="login" method="POST" action=<?php echo constant("DOMAIN")."includs/loginAction.inc.php";?>>
	<label>Username or email</label>
	<input type="text" name="loginInfo" placeholder="Enter your username or email...">
	<label>Password</label>
	<input type="password" name="password" placeholder="Enter your password...">
	<label for="remember">Remember me</label>
	<input type="checkbox" name="rememberMe" id="remember">
	<a href="#" id="recoverLink">Recover password</a>
	<input type="submit" name="login" value="Log In" class="button">
</form>