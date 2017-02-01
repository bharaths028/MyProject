<?php

	switch ($page) {
		case 'dashboard':
			
		break;

		case 'pages':

		#insert and update queries to cmp_det table
		if(isset($_POST['submitted']) == 1){

			$head = mysqli_real_escape_string($bd, $_POST['head']);
			$m_head = mysqli_real_escape_string($bd, $_POST['m_head']);
			$pagedesc = mysqli_real_escape_string($bd, $_POST['pagedesc']);

			if(!empty($_POST['id']))	{
				$action = 'updated';
				$q = "UPDATE posts SET user = $_POST[user], slug = '$_POST[slug]', head = '$head', m_head = '$m_head', pagedesc = '$pagedesc' WHERE id = $_GET[id]";

			}	else {
				$action = 'added';
				$q = "INSERT INTO posts (type, user, slug, head, m_head, pagedesc) VALUES (1, $_POST[user], '$_POST[slug]', '$head', '$m_head', '$pagedesc')";

			}

			
			$r = mysqli_query($bd, $q);

			if($r){
					
				$message = '<p class="alert alert-success">Page was '.$action.'!</p>';
				
			} else {
				
				$message = '<p class="alert alert-danger">Page could not be '.$action.' because: '.mysqli_error($dbc);
				$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
				
			}

		}

		if(isset($_GET['id']))	{ $opened = data_post($bd, $_GET['id']); }
			
		break;

		case 'users':

		#insert and update users data to users table
		if(isset($_POST['submitted']) == 1){

			$first = mysqli_real_escape_string($bd, $_POST['first']);
			$last = mysqli_real_escape_string($bd, $_POST['last']);

			if(!empty($_POST['password'])){

				if($_POST['password'] == $_POST['passwordv']) {
						
					$password = " password = SHA1('$_POST[password]'),";
					$verify = true;
						
				} else {
						
					$verify = false;
						
				}					
					
			} else {
						
				$verify = false;	
					
			}

			if(!empty($_POST['id']))	{
				$action = 'updated';
				$q = "UPDATE users SET first = '$first', last = '$last', email = '$_POST[email]', $password status = $_POST[status] WHERE id = $_GET[id]";
				$r = mysqli_query($bd, $q);

			}	else {

				$action = 'added';
				$q = "INSERT INTO users (first, last, email, password, status) VALUES ('$first', '$last', '$_POST[email]', SHA1('$_POST[password]'), '$_POST[status]')";
				if($verify == true)	{

					
					$r = mysqli_query($bd, $q);

				}
				
				

			}
			
			if($r){
					
					$message = '<p class="alert alert-success">User was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">User could not be '.$action.' because: '.mysqli_error($dbc);
					if($verify == false) {
						$message .= '<p class="alert alert-danger">Password fields empty and/or do not match.</p>';
					}
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}

			if(isset($_GET['id']))	{ $opened = data_user($bd, $_GET['id']); }
			
		break;

		case 'navigation':
		
			if(isset($_POST['submitted']) == 1) {
				
				$label = mysqli_real_escape_string($bd, $_POST['label']);
				$url = mysqli_real_escape_string($bd, $_POST['url']);
				
				
					
					$action = 'updated';
					$q = "UPDATE navigation SET id = '$_POST[id]', label = '$label', url = '$url', position = $_POST[position], status = $_POST[status] WHERE id = '$_POST[openedid]'";
					$r = mysqli_query($bd, $q);
					
				
				

				
				if($r){
					
					$message = '<p class="alert alert-success">Navigation Item was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">Navigation Item could not be '.$action.' because: '.mysqli_error($dbc);
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}

		break;

		case 'settings':
		
			if(isset($_POST['submitted']) == 1) {
				
				$label = mysqli_real_escape_string($bd, $_POST['label']);
				$value = mysqli_real_escape_string($bd, $_POST['value']);
				
				
					
					$action = 'updated';
					$q = "UPDATE settings SET id = '$_POST[id]', label = '$label', value = '$value' WHERE id = '$_POST[openedid]'";
					$r = mysqli_query($bd, $q);
					
				
				

				
				if($r){
					
					$message = '<p class="alert alert-success">Setting was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">Setting could not be '.$action.' because: '.mysqli_error($dbc);
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}

		break;

		default:
			# code...
		break;
	}

	

?>