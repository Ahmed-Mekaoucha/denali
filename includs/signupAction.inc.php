<?php
ob_start();
require 'header.inc.php';

if (isset($_POST['signup'])):
	
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($firstName) || empty($lastName) || empty($email) || empty($username) || empty($password)):
		header("location: ../index.php?signup=empty");
		exit();
	endif;

	if (!preg_match("/^[a-zA-Z]*$/", $firstName) && preg_match("/^[a-zA-Z]*$/", $lastName)):
		header("location: ../index.php?signup=unmatchName");
		exit();
	endif;

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
		if (!preg_match("/^([a-zA-Z0-9_-]{3,})@([a-zA-Z0-9_-]{3,})\.([a-zA-Z]{2,7})$/", $email)):
			header("location: ../index.php?signup=invalidEmail");
			exit();
		endif;
		header("location: ../index.php?signup=invalidEmail");
		exit();
	endif;

	if (!preg_match("/^\w{3,}$/", $username)):
		header("location: ../index.php?signup=invalidUsername");
		exit();
	endif;

	
	if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)):
		header("location: ../index.php?signup=invalidPassword");
		exit();
	endif;

	$users = new View();
	foreach ($users->showUsers() as $row):
		$existMail = $row['email'];
		$existUser = $row['username'];
	endforeach;


	if ($email == $existMail):
		header("location: ../index.php?signup=existMail");
		exit();
	endif;

	if ($username == $existUser):
		header("location: ../index.php?signup=existUser");
		exit();
	endif;

	$newUser = new Controller();
	$newUser->newUser($firstName, $lastName, $email, $username, $password);
	header("location: ../index.php?signup=succeed");

elseif (isset($_POST['update'])):
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($firstName) || empty($lastName) || empty($email) || empty($username)):
		header("location: ../index.php?update=empty");
		exit();
	endif;

	if (!preg_match("/^[a-zA-Z]*$/", $firstName) && preg_match("/^[a-zA-Z]*$/", $lastName)):
		header("location: ../index.php?update=unmatchName");
		exit();
	endif;

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
		if (!preg_match("/^([a-zA-Z0-9_-]{3,})@([a-zA-Z0-9_-]{3,})\.([a-zA-Z]{2,7})$/", $email)):
			header("location: ../index.php?update=invalidEmail");
			exit();
		endif;
		header("location: ../index.php?update=invalidEmail");
		exit();
	endif;

	if (!preg_match("/^\w{3,}$/", $username)):
		header("location: ../index.php?update=invalidUsername");
		exit();
	endif;

	$users = new View();
	foreach ($users->showUsers() as $row):
		$existMail = $row['email'];
		$existUser = $row['username'];
	endforeach;


	if ($email == $existMail && $_SESSION['email'] !== $existMail):
		header("location: ../index.php?update=existMail");
		exit();
	endif;

	if ($username == $existUser && $_SESSION['username'] !== $existUser):
		header("location: ../index.php?update=existUser");
		exit();
	endif;

	$updateUser = new Controller();
	$updateUser->updUser($_SESSION['id'], $firstName, $lastName, $email, $username);
	$_SESSION['email'] = $email;
	$_SESSION['username'] = $username;
	header("location: ../index.php?update=succeed");

elseif(isset($_POST["updatePassword"])):

	$old_password = $_POST["old_password"];
	$new_password = $_POST["new_password"];
	$rnew_password = $_POST["rnew_password"];

	if (empty($old_password) || empty($new_password) || empty($rnew_password)):
		header("location: ../admin/profile.php?updatePassword=empty");
		exit();
	endif;

	if ($new_password !== $rnew_password):
		header("location: ../admin/profile.php?updatePassword=notEqual");
		exit();
	endif;

	if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $new_password)):
		header("location: ../admin/profile.php?updatePassword=invalidPassword");
		exit();
	endif;

	$View = new View();
	foreach ($View->showUsers() as $row):
		$password = $row['password'];
		$email = $row['email'];
	endforeach;

	if (!password_verify($old_password, $password)):
		header("location: ../admin/profile.php?updatePassword=invalidOldPass");
		exit();
	endif;

	$Controller = new Controller();
	$Controller->newPass($email, password_hash($new_password, PASSWORD_DEFAULT));
	header("location: ../admin/profile.php?updatePassword=succeed");
	exit();

elseif(isset($_POST["publish"])):

	$postTitle = $_POST["postTitle"];
	$article = $_POST["article"];
	$categorie = $_POST["categorie"];
	$Controller = new Controller();
	
	if (empty($postTitle) || empty($article)):
		echo '<section class="container" id="error"><p>Title or content is empty!</p></section>';
		exit();
	endif;



	$featuredImg = isset($_FILES['featuredImg'])? 'images/'.$_SESSION['username'].'/article/'.$_FILES['featuredImg']['name'] : 'images/deafultArticleImage.jpg';

	if ($categorie !== ''):
		$categorie = $categorie;
	else:
		$categorie = 'UNCATEGORIZED'; 
	endif;

	$Controller->pubArticle($_SESSION['id'], $postTitle, $article, $categorie, $featuredImg);
	echo '<section class="container" id="succeed"><p>Article published!</p></section>';
	exit();

endif;
ob_end_flush();