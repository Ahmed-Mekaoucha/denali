<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<?php if (!array_intersect($url, $pages)):?>
	<script type="text/javascript" src="js/jquery.richtext.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
<?php else:?> 
	<script type="text/javascript" src="../js/jquery.richtext.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
<?php endif;?>

</body>
</html>