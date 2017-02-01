<?php include('includes/config.php') ?>

<!DOCTYPE html>
<html lang="en">
	<head>
	  <title><?php echo $path['call_parts'][0].' | '.$site_title; ?></title>
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