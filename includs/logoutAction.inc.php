<?php
session_start();
session_unset();
session_destroy();
if (isset($_COOKIE['login'])):
	unset($_COOKIE['login']);
	setcookie('login', '', time() - 3600, '/');
endif;
header("location: ../index.php?logout=succeed");