<div id="console-debug">

	<?php

		$all_vars = get_defined_vars();

	?>

	<?php	//print_r($all_vars); ?>

	<h1>Query run</h1>

	<pre>
		<?php	print_r($r); ?>
		
	</pre>

	<pre>
		<?php	print_r($q); ?>
		
	</pre>


	<h1>Get</h1>

	<pre>
		<?php	print_r($_GET); ?>
		
	</pre>

	<h1>Opened</h1>

	<pre>
		<?php	print_r($Opened); ?>
	</pre>

	<h1>Post</h1>

	<pre>
		<?php	print_r($_POST); ?>
		
	</pre>

	<h1>Page Array</h1>

	<pre>
		<?php	print_r($page); ?>
	</pre>


</div>