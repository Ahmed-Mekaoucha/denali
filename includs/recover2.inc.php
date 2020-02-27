<?php require 'header.inc.php'; ?>
<?php require 'navbar.inc.php'; ?>

<?php $verify = new View();?>
<?php $result = $verify->getTokenBySelector($_GET['selector']);?>
<?php if (is_object($result)):?>
	<?php foreach ($result as $row):?>
		<?php $goodUrl = password_verify($_GET['validator'], $row['validator']);?>
		<?php $expire = $row['expire'];?>
	<?php endforeach;?>

	<?php $curTime = time();?>
	<?php if ($expire < $curTime):?>
		<section class='container' id='error'><p>The url is expired try again!</p></section>
	<?php endif;?>

	<?php if (!$goodUrl):?>
		<section class='container' id='error'><p>The url is not valid try again!</p></section>
	<?php endif;?>
<?php endif;?>

<section class="container">
	<form id="recover2" method="POST" action=<?php echo constant("DOMAIN")."includs/recover2Action.inc.php";?>>
		<?php if (isset($_GET['selector'])):?>
			<input type="hidden" name="selector" value=<?php echo $_GET['selector'];?>>
			<input type="hidden" name="validator" value=<?php echo $_GET['validator'];?>>
		<?php endif;?>
		<label>New password</label>
		<input type="password" name="new_password" placeholder="Enter new password">
		<label>Repeat password</label>
		<input type="password" name="rnew_password" placeholder="Repeat new password">
		<input type="submit" name="recover2" value="submit" class="button">
	</form>
</section>
<?php require 'footer.inc.php'; ?>