<?php require '../includs/header.inc.php'; ?>
<?php require '../includs/navbar.inc.php'; ?>

<section class="container">
	<section id="mainAsideParent">
		<?php require '../includs/sidebar.inc.php'; ?> 
		<main>
			<section id="getInTouch">
				<h1>Get in touch</h1>
				<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
				<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Etiam porta sem malesuada magna mollis euismod. Etiam porta sem malesuada magna mollis euismod. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
				<form>
					<label>Name</label>
					<input type="text" name="name" placeholder="Enter your name...">
					<label>Email address</label>
					<input type="email" name="email" placeholder="Enter your email...">
					<label>Message</label>
					<textarea placeholder="your message here..."></textarea>
					<input class="button" type="submit" name="contactUs" value="Submit">
				</form>
			</section>
		</main>
	</section>
</section>

<?php require '../includs/footer.inc.php'; ?>