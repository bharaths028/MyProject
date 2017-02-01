<?php

	# Database connection here...

	$mysql_hostname = "localhost";
	$mysql_user = "root";
	$mysql_password = "";
	$mysql_database = "newsnowi_news";

	#db connetion
	$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die("Oops something went wrong");

?>