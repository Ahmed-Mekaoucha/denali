<?php
ob_start();
require 'header.inc.php';

if (isset($_POST['login'])):

	$loginInfo = $_POST['loginInfo'];
	$password = $_POST['password'];

	if (empty($loginInfo) || empty($password)):
		header("location: ../index.php?login=empty");
		exit();
	endif;

	$login = new View();
	foreach ($login->loginUser($loginInfo) as $row) {
		$hash = $row['password'];
	}
	$rowNum = count($login->loginUser($loginInfo));

	if ($rowNum > 0):
		if (!password_verify($password, $hash)):
			header("location: ../index.php?login=invPassword");
			exit();
		elseif (password_verify($password, $hash)):
			session_start();
			$_SESSION['id'] = $row['id'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['username'] = $row['username'];
			if (isset($_POST['rememberMe'])):
				setcookie("login", bin2hex(random_bytes(33)), time() + 60*60*24*30, '/');
			endif;
			header("location: ../index.php?login=succeed");
			exit();
		endif;
	else:
		header("location: ../index.php?login=noUser");
		exit();
	endif;

endif;
ob_end_flush();