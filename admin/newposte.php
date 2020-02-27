<?php ob_start(); ?>
<?php require '../includs/header.inc.php'; ?>
<?php require '../includs/navbar.inc.php'; ?>
<?php if (!isset($_SESSION['id']) && !isset($_COOKIE['login'])):
	header("location: ../index.php");
	exit();
endif;?>
<section class="container">
	<section id="Admin">
		<?php require 'sidebar.php'; ?>
		<main>
			<input id="postTitle" type="text" name="postTitle" placeholder="Add title...">
			<textarea id="postContent" class="content" placeholder="Start writing..."></textarea>
		</main>
		<aside id="rightAdminSide">
			<button class="button" id="publish">
				<span id="pub">Publish</span>
				<span id="spin"><i id="pubspiner" class="fas fa-spinner fa-pulse fa-lg"></i></span>
			</button>
			<label>Categorie</label>
			<input id="postCategorie" type="text" name="categorie">
			<label>Featured image</label>
			<section id="featuredImg">
				<input id="finput" type="file" name="featuredImg">
				<span><i class="fas fa-upload"></i> upload</span>
				<i id="imgspiner" class="fas fa-spinner fa-pulse fa-2x"></i>
			</section>
		</aside>
	</section>
</section>
<?php require '../includs/footer.inc.php'; ?>
<?php ob_end_flush(); ?>