<?php
//config file

error_reporting(0);

#Constatnts:
DEFINE('D_TEMPLATE', 'templates');
DEFINE('D_VIEW', 'views');

#Database connection
include('includes/connection.php');

#function
include('functions/sandbox.php');
include('functions/data.php');
include('functions/template.php');
//include('functions/content.php');

#Site setup:
$debug = data_settings_value($bd, 'debug-status');

$path = get_path();

$site_title = 'NewsNow';
$page_title = 'Headlines';

if(!isset($path['call_parts'][0]) || $path['call_parts'][0] == '') {
	//$path['call_parts'][0] = 'stories';
	header('location: home');
}

#Page setup
$page = data_post($bd,$path['call_parts'][0]);
$post = data_post($bd,$path['call_parts'][1]);
$article = article($bd,$path['call_parts'][0]);

if (!empty($page['type'])) {

	$view = data_post_type($bd, $page['type']);
	
} else {
	$view = data_post_type($bd, $path['call_parts'][0]);
}



?>