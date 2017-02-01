<?php

	include('../../includes/connection.php');

	$id = $_GET['id'];

	$q = "DELETE FROM posts where id = $id";
	$r = mysqli_query($bd,$q);

	if ($r) {
		echo 'Page Deleted';
	} else {
		echo 'There was an error....</br>';
		echo $q.'</br>';
		echo mysqli_error($bd);
	}

?>