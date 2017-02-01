<?php

include('../../includes/connection.php');
	
$list = $_GET['list'];	

//print_r($list);

foreach ($list as $position => $id) {
	
	$q = "UPDATE navigation SET position = $position WHERE id = $id";
	$r = mysqli_query($bd, $q);
	
	echo mysqli_error($bd);
	
	
}



?>