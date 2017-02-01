<?php 

	#Start Session:
	session_start();
	
	#Database connection
	include('../includes/connection.php');


	if($_POST){

		$q = "SELECT * FROM users WHERE email = '$_POST[email]' and password = SHA1('$_POST[password]')";
		$r = mysqli_query($bd, $q);

		if(mysqli_num_rows($r) == 1){

			$_SESSION['username'] = $_POST['email'];
			header('location: index.php');
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
	  <title><?php echo $page['head'].' | '.$site_title; ?></title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <?php include('includes/css.php'); ?>
	  <?php include('includes/js.php'); ?>
	  
	  <style>
	  
	  </style>
	</head>


	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

		<div id="wrap">

					<!-- Nav Bar -->

			<?php //include(D_TEMPLATE.'/navigation.php'); ?>

			<div class="container">

				

				<div class="row">

					
					<div class="col-md-4 col-md-offset-4">

						<div class="panel panel-info">

							<div class="panel-heading">

								<strong>Login</strong>

							</div>	<!-- End panel heading -->

							<div class="panel-body">

							<form action="login.php" method="post" role="form">
							  <div class="form-group">
							    <label for="email">Email address</label>
							    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
							  </div>

							  <div class="form-group">
							    <label for="password">Password</label>
							    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
							  </div>
							 
							 <!-- <div class="checkbox">
							    <label>
							      <input type="checkbox"> Check me out
							    </label>
							  </div> -->
							  <button type="submit" class="btn btn-default">Submit</button>
							</form>
						</div> <!-- End Panel Body -->

					</div> <!-- End Panel -->

					</div> <!-- End Column -->
					

				</div> <!-- End row -->

				

			</div>	<!-- End Container -->

		</div>	<!-- End wrap -->

		<!-- Footer -->
		<?php //include(D_TEMPLATE.'/footer.php'); ?>

		<?php //if($debug == 1) { include('widgets/debug.php'); } ?>

	

	</body>
</html>
