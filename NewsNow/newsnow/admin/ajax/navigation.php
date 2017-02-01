<?php

include('../../includes/connection.php');

$label = mysqli_real_escape_string($bd, $_POST['label']);
$url = mysqli_real_escape_string($bd, $_POST['url']);

$q = "UPDATE navigation SET id = '$_POST[id]', label = '$label', url = '$url', status = $_POST[status] WHERE id = '$_POST[openedid]'";
$r = mysqli_query($bd, $q);

if($r){
	
	echo 'Saved <br>'.$q;
	
	
} else {
	
	echo mysqli_error($bd).'<br>'.$q;

}


?>