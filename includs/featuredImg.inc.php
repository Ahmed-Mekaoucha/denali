<?php
session_start();
$featuredImg = $_FILES['featuredImg'];
$tmp_name = $_FILES['featuredImg']['tmp_name'];

$path = 'images/'.$_SESSION['username'].'/article/';

if (!is_dir("../".$path)):
	mkdir("../".$path, 0777, true);
endif;
if (move_uploaded_file($featuredImg['tmp_name'], "../".$path.$featuredImg['name'])):
	echo $path.$featuredImg['name'];
endif;