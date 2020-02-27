<?php require '../includs/header.inc.php'; ?>
<?php require '../includs/navbar.inc.php';?>

<section class="container">
	<section id="mainAsideParent">
		<?php require '../includs/sidebar.inc.php'; ?> 
		<main>
			<section id="aboutMe">
				<h1>About me</h1>
				<p>The rich text element allows you to create and format headings, paragraphs, blockquotes, images, and video all in one place instead of having to add and format them individually. Just double-click and easily create content.</p>
				<h2>Something else here</h2>
				<p>Maecenas faucibus mollis interdum. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Curabitur blandit tempus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id ligula porta felis euismod semper.</p>
				<p>Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec id elit non mi porta gravida at eget metus. Donec ullamcorper nulla non metus auctor fringilla.</p>
				<a href=<?php echo constant("DOMAIN").'pages/contact.php';?>><button class="button">Get in touch</button></a>
			</section>
		</main>
	</section>
</section>

<?php require '../includs/footer.inc.php'; ?> 