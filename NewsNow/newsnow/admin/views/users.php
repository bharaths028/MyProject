<?php if(isset($opened['id'])) { ?>
	<script>
		
		$(document).ready(function() {
			
			Dropzone.autoDiscover = false;
			
			var myDropzone = new Dropzone("#avatar-dropzone");
			
			myDropzone.on("success", function(file){
				
				$("#avatar").load("ajax/avatar.php?id=<?php echo $opened['id']; ?>");
				
			});
	
		});
	
	</script>
<?php } ?>

<h1>User Manager</h1>

<div class="row">

	<div class="col-md-3">


		<div class="list-group">


			<a class="list-group-item" href="?page=users">
				<i class="fa fa-plus-square"></i> New User
			</a>

		<?php

		$q = "SELECT * FROM users ORDER BY last DESC";
		$r = mysqli_query($bd, $q); 

		while ($list = mysqli_fetch_assoc($r)) { 

			$list = data_user($bd, $list['id']);

				//$blurb = substr(strip_tags($list['pagedesc']), 0, 160);

			?>
		
			<a class="list-group-item <?php selected($list['id'], $opened['id'], 'active'); ?>" href="index.php?page=users&id=<?php echo $list['id']; ?>">
				<h4 class="list-group-item-heading"><?php echo $list['reverse_name']; ?></h4>
				<!--<p class="list-group-item-text"><?php //echo $blurb; ?></p>-->
			</a>

			
		<?php	}	?>

		</div>
	</div>

	<div class="col-md-9 container">

		<?php if(isset($message)){	echo $message; }	?>
		
		<form action="index.php?page=users&id=<?php echo $opened['id']; ?>" method="post" role="form">

			<?php if (!empty($opened['avatar']))	{	?>

			<div id="avatar">

				<div class="avatar-container" style="background-image: url('../uploads/<?php echo $opened['avatar']; ?>')"></div>

			</div>

			<?php } ?>

			<div class="form-group">

				<label for="first">First Name:</label>
				<input class="form-control" type="text" name="first" id="first" value="<?php echo $opened['first']; ?>" placeholder="First Name">

			</div>

			<div class="form-group">

				<label for="last">Last Name:</label>
				<input class="form-control" type="text" name="last" id="last" value="<?php echo $opened['last']; ?>" placeholder="Last Name">

			</div>

			<div class="form-group">

				<label for="email">Email:</label>
				<input class="form-control" type="text" name="email" id="email" value="<?php echo $opened['email']; ?>" placeholder="Email Address">

			</div>

			<div class="form-group">

				<label for="status">Status:</label>
				<select class="form-control" name="status" id="status">

					<option value="0" <?php if(isset($_GET['id']))	{ selected('0', $opened['status'], 'selected'); }?>>Inactive</option>
					<option value="1" <?php if(isset($_GET['id']))	{ selected('1', $opened['status'], 'selected'); }?>>Active</option>

				</select>

			</div>

			<div class="form-group">

				<label for="password">Verify Password:</label>
				<input class="form-control" type="password" name="password" id="password" value="" placeholder="Password" autocomplete="off">

			</div>
			


			<div class="form-group">

				<label for="passwordv">Verify Password:</label>
				<input class="form-control" type="password" name="passwordv" id="passwordv" value="" placeholder="Type password again" autocomplete="off">

			</div>


			<button type="submit" class="btn btn-default">Save</button>
			<input type="hidden" name="submitted" value="1">

			<?php if (isset($opened['id'])) { ?>
				<input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
			<?php } ?>
			
		</form>

		<?php if(isset($opened['id'])) { ?>
			
		<form action="uploads.php?id=<?php echo $opened['id']; ?>" class="dropzone" id="avatar-dropzone">
			
			<input type="file" name="file">
			
		</form>
		
		<?php } ?>
	</div>

</div>