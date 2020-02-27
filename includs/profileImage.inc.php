<?php
session_start();
require 'autoloader.inc.php';

if (is_array($_FILES['profileImage'])):
	$tmp_name = $_FILES['profileImage']['tmp_name'];
	$path = 'images/'.$_SESSION['username'].'/profile/';
	if (!is_dir("../".$path)):
		mkdir("../".$path, 0777, true);
	endif;
	if (move_uploaded_file($_FILES['profileImage']['tmp_name'], "../".$path.$_FILES['profileImage']['name'])):
		$View = new View();
		foreach ($View->getUserByEmail($_SESSION['email']) as $row):
			$email = $row['email'];
		endforeach;
		$controller = new Controller();
		$controller->profilePicture($path.$_FILES['profileImage']['name'], $email);
		echo $path.$_FILES['profileImage']['name'];
	endif;
endif;