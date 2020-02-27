<?php ob_start(); ?>
<?php require '../includs/header.inc.php'; ?>
<?php require '../includs/navbar.inc.php'; ?>
<?php if (!isset($_SESSION['id'])):
	header("location: ../index.php");
	exit();
endif;

	$View = new View();
	$userRows = $View->getUserByEmail($_SESSION['email']);
	foreach ($userRows as $row):
		$firstName = $row['firstName'];
		$lastName = $row['lastName'];
		$email = $row['email'];
		$username = $row['username'];
	endforeach;
?>

<section class="container">
	<section id="Admin">
		<?php require 'sidebar.php'; ?>
		<main>
			<form id="profileInfo" method="POST" action=<?php echo constant("DOMAIN")."includs/signupAction.inc.php";?>>
				<section>
					<label>First name</label>
					<input type="text" name="firstName" value=<?php echo $firstName;?> readonly>
				</section>
				<section>
					<label>last name</label>
					<input type="text" name="lastName" value=<?php echo $lastName;?> readonly>
				</section>
				<section>
					<label>Email</label>
					<input type="email" name="email" value=<?php echo $email;?> readonly>
				</section>
				<section>
					<label>username</label>
					<input type="text" name="username" value=<?php echo $username;?> readonly>
				</section>
				<button class="button" id="editProfile">Edit</button>
				<input type="submit" name="update" class="button" id="saveProfile" value="Save">
			</form>
			<h1 id="H1updatePass">Update your password</h1>
			<form id="updatePass" method="POST" action="../includs/signupAction.inc.php">
				<label>Current password</label>
				<input type="password" name="old_password" value="" placeholder="Enter current password">
				<label>New password</label>
				<input type="password" name="new_password" value="" placeholder="Enter new password">
				<label>Repeat password</label>
				<input type="password" name="rnew_password" value="" placeholder="Repeat new password">
				<input type="submit" name="updatePassword" value="Update password">
			</form>
		</main>
	</section>
</section>
<?php require '../includs/footer.inc.php'; ?>
<?php ob_end_flush(); ?>