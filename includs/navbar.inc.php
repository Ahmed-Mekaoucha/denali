<section id="popUpcontainer">
  <section id="signInUpContainer">
    <section id="logInOrUp">
      <section id="choseLogIn">Log In</section>
      <section id="choseSignUp">Sign Up</section>
    </section>
    <section id="recoverTitle">
      <h1>Recover password</h1>
    </section>
    <section id="loadfrom">
      <?php require 'login.inc.php'; ?>
      <?php require 'signup.inc.php'; ?>
      <?php require 'recover.inc.php'; ?>
    </section>
    <i id="closeLogin" class="far fa-times-circle fa-lg"></i>
  </section>
</section>

<section id="mobileMenu">
  <?php require 'menu.inc.php'; ?>
  <section id="hideMobileMenu">
    <i class="fas fa-long-arrow-alt-left fa-3x"></i>
  </section>
</section>
<nav>
	<section class="container">
		<section id="logoMenuContainer">
			<section id="logo"><a href=<?php echo constant("DOMAIN");?>><span>Denali</span></a></section>
			<section id="menu">
				<?php require 'menu.inc.php'; ?>
			</section>
			<section id="iconMenu">
				<i class="fas fa-bars fa-2x"></i>
			</section>
		</section>
	</section>
</nav>
<script>
    function modifyState() { 
        window.history.replaceState({ id: "100" }, "Page 1", "http://localhost/Denali/"); 
    }
</script>


										<!--Signup error handling-->
<?php if (isset($_GET['signup'])):?>

	<?php if ($_GET['signup'] == 'empty'):?>
		<section class="container" id="error"><p>You have to fill all the input fields!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['signup'] == 'unmatchName'):?>
		<section class="container" id="error"><p>Your name must contain only letters!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['signup'] == 'invalidEmail'):?>
		<section class="container" id="error"><p>Your Email is invalid!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['signup'] == 'invalidUsername'):?>
		<section class="container" id="error"><p>Your username is invalid!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['signup'] == 'invalidPassword'):?>
		<section class="container" id="error"><p>Your password must contain Minimum 8 characters and at least one uppercase letter, one lowercase letter, one number and one special character!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['signup'] == 'existMail'):?>
		<section class="container" id="error"><p>This email is already exist, use other email one or <a href="#">recover your password</a>!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['signup'] == 'existUser'):?>
		<section class="container" id="error"><p>This username is already exist, use other username or <a href="#">recover your password</a>!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['signup'] == 'succeed'):?>
		<section class="container" id="succeed"><p>Your have signed up successfuly!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

<?php endif;?>

										<!--update error handling-->
<?php if (isset($_GET['update'])):?>

	<?php if ($_GET['update'] == 'empty'):?>
		<section class="container" id="error"><p>You have to fill all the input fields!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['update'] == 'unmatchName'):?>
		<section class="container" id="error"><p>Your name must contain only letters!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['update'] == 'invalidEmail'):?>
		<section class="container" id="error"><p>Invalid email!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['update'] == 'invalidUsername'):?>
		<section class="container" id="error"><p>Invalid username!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['update'] == 'existMail'):?>
		<section class="container" id="error"><p>This email is already exist, use other email!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['update'] == 'existUser'):?>
		<section class="container" id="error"><p>This username is already exist, use other username!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>


	<?php if ($_GET['update'] == 'succeed'):?>
		<section class="container" id="succeed"><p>You'r successfuly update your profile!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

<?php endif;?>
	
										<!--login error handling-->
<?php if (isset($_GET['login'])):?>

	<?php if ($_GET['login'] == 'empty'):?>
		<section class="container" id="error"><p>You have to fill all the input fields!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['login'] == 'invPassword'):?>
		<section class="container" id="error"><p>Invalid password!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['login'] == 'noUser'):?>
		<section class="container" id="error"><p>Invalid email or username!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['login'] == 'succeed'):?>
		<section class="container" id="succeed"><p>You are successfuly signed in!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

<?php endif;?>

										<!--Reset error handling-->

<?php if (isset($_GET['reset'])):?>

	<?php if ($_GET['reset'] == 'noUser'):?>
		<section class="container" id="error"><p>We couldn't find this user!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['reset'] == 'error'):?>
		<section class="container" id="error"><p>Failed to send the reset message!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['reset'] == 'succeed'):?>
		<section class="container" id="succeed"><p>Reset message sent successfuly, cheack your inbox!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

<?php endif;?>
										<!--Reset error handling-->

<?php if (isset($_GET['logout'])):?>

	<?php if ($_GET['logout'] == 'succeed'):?>
		<section class="container" id="succeed"><p>You are loged out!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

<?php endif;?>
										<!--Reset error handling-->

<?php if (isset($_GET['newpass'])):?>

	<?php if ($_GET['newpass'] == 'notEqual'):?>
		<section class="container" id="error"><p>Passwords must be the same!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['newpass'] == '404'):?>
		<section class="container" id="error"><p>Page not found!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['newpass'] == 'succeed'):?>
		<section class="container" id="error"><p>Password updated successfuly!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

<?php endif;?>

										<!--updatePassword error handling-->

<?php if (isset($_GET['updatePassword'])):?>

	<?php if ($_GET['updatePassword'] == 'empty'):?>
		<section class="container" id="error"><p>You have to fill all the input fields!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['updatePassword'] == 'notEqual'):?>
		<section class="container" id="error"><p>New passwords must be the same!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['updatePassword'] == 'invalidPassword'):?>
		<section class="container" id="error"><p>Your password must contain Minimum 8 characters and at least one uppercase letter, one lowercase letter, one number and one special character!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['updatePassword'] == 'invalidOldPass'):?>
		<section class="container" id="error"><p>Old password is invalid!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

	<?php if ($_GET['updatePassword'] == 'succeed'):?>
		<section class="container" id="succeed"><p>Password updated successfuly!</p></section>
		<script> modifyState(); </script>
	<?php endif;?>

<?php endif;?>