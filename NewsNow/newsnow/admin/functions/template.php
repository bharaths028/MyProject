<?php

	function nav_main($bd, $id) {

	   	$q = "select DISTINCT head from cmp_det";
  		$r = mysqli_query($bd,$q);

  		while ($nav = mysqli_fetch_assoc($r)) {	?>

  		<li<?php if($id== $nav['head']) { echo ' class="active"'; } ?>><a href="?page=<?php echo $nav['head']; ?>"><?php echo $nav['head']; ?></a></li>

  		<?php	}

	}
?>