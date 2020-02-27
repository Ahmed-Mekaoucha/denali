<?php
ob_start();
require 'header.inc.php';

if (isset($_POST['recover'])):
	
	$email = $_POST['email'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];

	$view = new View();

	foreach ($view->getUserByEmail($email) as $row):
		$exmail 		= $row['email'];
		$exfirstName	= $row['firstName'];
		$exlastName		= $row['lastName'];
	endforeach;
	
	if ($email !== $exmail || $firstName !== $exfirstName || $lastName !== $exlastName) {
		header("location: ".constant("DOMAIN")."index.php?reset=noUser");
		exit();
	}

	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(33);
	$url = constant("DOMAIN")."includs/recover2.inc.php?selector=".$selector."&validator=".bin2hex($token);
	$expire = time() + 60*60;

	$controller = new Controller();
	$controller->rmvPassRcv($email);

	$subject = 'Denali Email with your password reset link!';

	$message  = '<div style="color: #615e5e; width: 60%; margin: auto;font: 14px/160% Lato, sans-serif;">';
	$message .= '<h1 style="font: 24px/48px Lato, sans-serif;color: #333;">Denali</h1>';
	$message .= 'Hello dear '.$firstName.' '.$lastName.'<br>';
	$message .= '<p>We have just received a request to reset your password at "Denali" and we are here to help you with that!</p>'."\r\n";
	$message .= '<p>Simply click on the link to set up a new password for your account:</p>'."\r\n";
	$message .= '<a href='.$url.'>'.$url.'</a>'."\r\n";
	$message .= '<p>If you did not request a password reset, do not worry! Your password is still safe with us, so you can just ignore this email and enjoy the rest of your day.</p></div>';
	
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";	
	$headers .= "From: Denali<support@miserabl.dx.am>" . "\r\n";
    
    

	$send = mail($email, $subject, $message, $headers);

	if (!$send):
		header("location: ".constant("DOMAIN")."index.php?reset=error");
		exit();
	else:
		$controller->setingToken($selector, $token, $email, $expire);
		header("location: ".constant("DOMAIN")."index.php?reset=succeed");
		exit();
	endif;
endif;
ob_end_flush();