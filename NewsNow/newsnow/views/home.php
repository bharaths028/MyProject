
<div class="container">
	
   	<div class="row">
    	<div class="col-md-4"><img alt="Responsive image" class="img-responsive" width="252" height="120" src="images/newsnow_21.gif"></div>
    	<div class="col-md-8"><img alt="Responsive image" class="img-responsive" width="740" height="90" src="images/sample.gif"></div>
    <!-- Add clearfix for only the required viewport -->
    	<div class="clearfix visible-xs"></div>
    </div>


     <div class="panel panel-danger">
     	<div class="panel-heading">
     		<p class="panel-title">Today's Video</p>
     	</div> <!-- Panel Heading closes here -->
     	<div class="panel-body">
     		<div class="row">
     		<div class="col-md-8">
     		<div class="embed-responsive embed-responsive-16by9">
     			<iframe src="https://www.youtube.com/embed/dqEJFl1L2xg" frameborder="0" allowfullscreen></iframe>
     		</div>
     		</div>
     		<div class="col-md-4">
     			<script type="text/javascript">var _mcq=["6",""];</script><span id='_mc_mg6'></span><script language="JavaScript" src="http://stat1.moneycontrol.com/mcjs/common/mc_widget.js"></script><noscript><a href="http://www.moneycontrol.com">Sensex/Nifty</a></noscript>
     		</div>
     		</div>
     	</div> <!-- Panel Body closes here -->
     </div>	<!-- Panel closes here -->


	<!-- Carousel -->
	<div class="panel panel-danger">
	  	<!-- Default panel contents -->
	  	<div class="panel-heading">Latest News</div>
		<div class="panel-body">	
						
			

			<div class="row">
					
						

						<?php
							$q = "SELECT * FROM posts WHERE type = '1' ORDER BY systdate DESC LIMIT 16";
							$r = mysqli_query($bd, $q); 

							while ($list = mysqli_fetch_assoc($r)) { 

									$blurb = substr(strip_tags($list['pagedesc']), 0, 60);

									$html = $list['pagedesc'];
								

									$doc = new DOMDocument();
									$doc->loadHTML($html);
									$xpath = new DOMXPath($doc);
									$src = $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg"
									

						?>
											
							<div id="home_grid" class="col-md-3">
							<img  class="img-responsive" src="<?php echo $src; ?>" alt="<?php echo $src; ?>" style="width:250px;height:180">
							
							<h4><?php echo $list['m_head']; ?></h4>
							<p><?php echo $blurb; ?>....</p>
							<p><a href="post/<?php echo $list['id']; ?>" class="btn btn-danger btn-lg btn-block" role="button" style="right">Read Full story <i class="fa fa-chevron-circle-right"></i></a></p>
						
						</div>
					
						<?php	}	?>
					
					
				
			</div>
		</div>
	</div>					
</div>	


