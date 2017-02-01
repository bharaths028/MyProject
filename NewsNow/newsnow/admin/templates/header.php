<?php

#Start a session:
session_start();

if(!isset($_SESSION['username'])){
	header('Location: login.php');
}


?>
<?php include('includes/config.php') ?>

<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Login Admin</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <?php include('includes/css.php'); ?>
	  <?php include('includes/js.php'); ?>
	  
	  <style>
	  
	  </style>
	</head>


	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

		<div id="wrap">

					<!-- Nav Bar -->

			<?php include(D_TEMPLATE.'/navigation.php'); ?>