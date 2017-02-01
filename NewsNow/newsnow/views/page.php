<div class="container">

	<div class="panel panel-danger">
     	<div class="panel-heading">
     		<p class="panel-title"><?php echo $page['head']; ?></p>
     	</div>
     	<div class="panel-body">
			<!-- Carousel -->
			
			<div class="row">

					

						<?php
							$slug = $path[call_parts][0];
							$q = "SELECT * FROM posts WHERE type = '1' AND slug = '$slug' ORDER BY systdate DESC LIMIT 10";
							$r = mysqli_query($bd, $q); 

							while ($list = mysqli_fetch_assoc($r)) { 

									$blurb = substr(strip_tags($list['pagedesc']), 0, 160);

									$html = $list['pagedesc'];
								

									$doc = new DOMDocument();
									$doc->loadHTML($html);
									$xpath = new DOMXPath($doc);
									$src = $xpath->evaluate("string(//img/@src)");

						?>
						<div id="article" class="col-md-12">
							<div class="media">
							
						  <div class="media-left media-middle">
						    <a href="post/<?php echo $list['id']; ?>">
						      <img class="media-object" src="<?php echo $src; ?>" alt="<?php echo $src; ?>" style="width:200px;height:180">
						    </a>
						  </div>
						  <div class="media-body">
						    <h4 class="media-heading"><?php echo $list['m_head']; ?></h4>
						    <p><?php echo $blurb; ?>....</p>
							<p><a href="post/<?php echo $list['id']; ?>" class="btn btn-danger" style="float:right" role="button" style="right">Read Full story <i class="fa fa-chevron-circle-right"></i></a></p>
						  </div>
						</div>
						</div>
						<?php } ?>
					
				</div>
 			</div>	
		</div>
	</div>
</div>	
