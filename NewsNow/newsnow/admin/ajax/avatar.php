<?php

include('../../includes/connection.php');
	
$id = $_GET['id'];	

$q = "SELECT avatar FROM users WHERE id = $id";
$r = mysqli_query($bd, $q);

$data = mysqli_fetch_assoc($r);

?>

<div class="avatar-container" style="background-image: url('../uploads/<?php echo $data['avatar']; ?>')"></div>