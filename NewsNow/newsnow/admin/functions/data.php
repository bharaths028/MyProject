<?php

	function data_settings_value($bd, $id){

		$q = "SELECT * FROM settings WHERE id = '$id'";
		$r = mysqli_query($bd, $q);

		$data = mysqli_fetch_assoc($r);

		return $data['value'];

	}

	function data_user($bd, $id){
		
		if(is_numeric($id))	{

			$cond = "WHERE id = '$id'";

		}	else {

			$cond = "WHERE email = '$id'";

		}

		$q = "SELECT * FROM users $cond";

		
		$r = mysqli_query($bd, $q);

		$data = mysqli_fetch_assoc($r);

		$data['fullname'] = $data['first'].' '.$data['last'];
		$data['reverse_name'] = $data['last'].','.$data['first'];

		return $data;
	}
	
	function data_post($bd, $id){

		if(is_numeric($id)) {

			$cond = "where id = '$id'";
		} else {
			$cond = "where head = '$id'";
		}

		$q = "SELECT * FROM posts $cond";
		$r =  mysqli_query($bd, $q);

		$data =  mysqli_fetch_assoc($r);

		$data['body_nohtml'] = strip_tags($data['pagedesc']);

		if($data['pagedesc'] == $data['body_nohtml']){

			$data['body_formatted'] = '<p>'.$data['pagedesc'].'</p';
		} else{

			$data['body_formatted'] = $data['pagedesc'];
		}

		return $data;
	}

?>