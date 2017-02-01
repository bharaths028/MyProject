<?php
//config file
#Constatnts:

DEFINE('D_TEMPLATE', 'templates');

error_reporting(0);

#Database connection
include('../includes/connection.php');

#function
include('functions/data.php');	
include('functions/template.php');
include('functions/sandbox.php');

#Site setup:
$debug = data_settings_value($bd, 'debug-status');

$site_title = 'NewsNow';
$page_title = 'Headlines';

if(isset($_GET['page'])){
	$page = $_GET['page'];
}	else{
	$page = 'dashboard';
}

#Page setup
include('includes/queries.php');





#user setup:
$user = data_user($bd, $_SESSION['username']);



?>