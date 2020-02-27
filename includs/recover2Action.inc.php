<?php 
ob_start();
require 'header.inc.php';

if (isset($_POST['recover2'])):
	
	$pass1 = $_POST['new_password'];
	$pass2 = $_POST['rnew_password'];
	$selector = $_POST['selector'];

	if ($pass1 !== $pass2):
		header("location: ".constant("DOMAIN")."index.php?newpass=notEqual");
		exit();
	endif;

	$verify = new View();
	$result = $verify->getTokenBySelector($selector);

	foreach ($result as $row):
		$email = $row['email'];
	endforeach;

	$updatePass = new Controller();
	$updatePass->newPass($email, $pass2);

	header("location: ".constant("DOMAIN")."index.php?newpass=succeed");
else:
	header("location: ".constant("DOMAIN")."index.php?newpass=404");
	exit();
endif;
ob_end_flush();