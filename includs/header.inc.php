<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8">
  <title>Denali</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/580226163c.js" crossorigin="anonymous"></script>
    <?php define('DOMAIN', 'http://localhost/Denali/');
      $url = explode('/', $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
      $pages = array('includs', 'pages', 'admin');
    if (!array_intersect($url, $pages)):?>
      <link rel="stylesheet" type="text/css" href="css/richtext.min.css">
  	  <link rel="stylesheet" type="text/css" href="css/style.css">
      <?php require 'includs/autoloader.inc.php';?>
    <?php else:?>
      <link rel="stylesheet" type="text/css" href="../css/richtext.min.css">
      <link rel="stylesheet" type="text/css" href="../css/style.css">
      <?php require '../includs/autoloader.inc.php';?>
    <?php endif;?>
  </head>
  <body>