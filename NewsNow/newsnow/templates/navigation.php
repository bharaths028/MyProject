<nav id="nav" class="navbar navbar-inverse">

  <?php if($debug == 1) { ?>
  <button id="btn-debug" class="btn btn-default"><i class="fa fa-bug"></i></button>
  <?php } ?>
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home">NewsNow</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">


      	<?php nav_main($bd, $path); ?>

        <!--<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li> -->
          </ul>
        
      </ul>
    </div>
  </div>
</nav>