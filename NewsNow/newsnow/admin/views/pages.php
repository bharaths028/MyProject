<h1>Page Manager</h1>

<div class="row">

	<div class="col-md-3">


		<div class="list-group">


			<a class="list-group-item" href="?page=pages">
				<i class="fa fa-plus-square"></i> New Page
			</a>

		<?php

		$q = "SELECT * FROM posts WHERE type = 1 ORDER BY systdate DESC";
		$r = mysqli_query($bd, $q); 

		while ($list = mysqli_fetch_assoc($r)) { 

				$blurb = substr(strip_tags($list['pagedesc']), 0, 160);

			?>
		
			<div id="page_<?php echo $list['id']; ?>" class="list-group-item <?php selected($list['id'], $opened['id'], 'active'); ?>">
				<h4 class="list-group-item-heading"><?php echo $list['m_head']; ?>
					<span class="pull-right">
						<a href="#" id="del_<?php echo $list['id']; ?>" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i></a>
						<a href="index.php?page=pages&id=<?php echo $list['id']; ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i></a>
					</span>
				</h4>
				<p class="list-group-item-text"><?php echo $blurb; ?></p>
			</div>

			
		<?php	}	?>

		</div>
	</div>

	<div class="col-md-9 container">

		<?php if(isset($message)){	echo $message; }	?>
		
		<form action="index.php?page=pages&id=<?php echo $opened['id']; ?>" method="post" role="form">

			<div class="form-group">

				<label for="head">Head:</label>
				<input class="form-control" type="text" name="head" id="head" value="<?php echo $opened['head']; ?>" placeholder="Head">

			</div>

			<div class="form-group">

				<label for="user">User:</label>
				<select class="form-control" name="user" id="user">

				<option value="0">no user</option>

				<?php

					$q = "SELECT id FROM users ORDER BY first ASC";
					$r = mysqli_query($bd, $q);

					while ($user_list = mysqli_fetch_assoc($r)) { 

							$user_data = data_user($bd, $user_list['id']);

						?>

						<option value="<?php echo $user_data['id'];	?>" 
							<?php 
								if(isset($_GET['id']))	{
									
									selected($user_data['id'], $opened['user'], 'selected');
								}	else {
									
									selected($user_data['id'], $user['id'], 'selected');

								}
								
							?>>	<?php echo $user_data['fullname'];?></option>

					<?php }	?>

				?>
				</select>

			</div>

			
			<div class="form-group">

				<label for="slug">Slug:</label>
				<input class="form-control" type="text" name="slug" id="slug" value="<?php echo $opened['slug']; ?>" placeholder="Slug">

			</div>

			<div class="form-group">

				<label for="m_head">Headline:</label>
				<input class="form-control" type="text" name="m_head" id="m_head" value="<?php echo $opened['m_head']; ?>" placeholder="Headline">

			</div>

			<div class="form-group">

				<label for="pagedesc">Pagedesc:</label>
				<textarea class="form-control editor" type="text" name="pagedesc" id="pagedesc" rows="8" placeholder="Page description"><?php echo $opened['pagedesc']; ?></textarea>

			</div>

			<button type="submit" class="btn btn-default">Save</button>
			<input type="hidden" name="submitted" value="1">
			<?php if (isset($opened['id'])) { ?>
				<input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
			<?php } ?>


		</form>
	</div>

</div>