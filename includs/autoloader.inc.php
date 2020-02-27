<?php

spl_autoload_register('autoload');

function autoload ($class) {

$url = explode('/', $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$pages = array('includs', 'pages', 'admin');

	if (!array_intersect($url, $pages)):
		require 'classes/'.$class.'.class.php';
	else:
		require '../classes/'.$class.'.class.php';
	endif;
}