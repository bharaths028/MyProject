<?php
//CSS Style sheet


?>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<style>
    html,
    body{
      height: 100%;
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
      background-color: #ECECEA;
    }

    #wrap{
      min-height: 100%;
      height: auto;
      margin: 0 auto -60px;
      padding: 0 0 60px;
    }

    #footer{
      height: 60px;
      background: none repeat scroll 0% 0% rgba(0, 0, 0, 0.8);
      /*background-color: #f5f5f5;*/
    }

    #nav{
      background: none repeat scroll 0% 0% rgba(0, 0, 0, 0.8);

    }

    .navbar-nav > .active{
      background-color: 
    }

    #btn-debug{
      position: absolute;
    }

    #console-debug{
      position: absolute; 
      top: 50px;
      left: 0px;
      width: 30%;
      height: 600px;
      overflow-y: scroll;
      background-color: #bfbfbf;
      box-shadow: 2px 2px 5px #808080;
    }

    #console-debug pre{
      
    }


    #homepage-grid {
    width:910px;
    position:relative;
    padding:0;
    overflow: hidden;
}

#tumb {
  border-spacing: 6px;
}

/* image thumbnail */
.thumb {
    display: block;
  width: 100%;
  margin: 0;
}

/* Style to article Author */
.by-author {
  font-style: italic;
  line-height: 1.3;
  color: #aab6aa;
}

.panel{
  background-color: #F2F2F2;
  border-color: #e3e0cf;
}

.panel-danger > .panel-heading{
 background-color: #C11B17;
 color:  #F2F2F2;
}

.thumbnail{
  background-color: #F2F2F2;

}


#article {
  padding-left: .5em;
}

#article .media {
  padding-top: 1em;
  padding-bottom: 1em;
  border-bottom: 1px solid #e8e8e8;
}

#home_grid {
  padding-top: 1em;
  padding-bottom: 1em;
  border-bottom: 1px solid #e8e8e8;
  border-right: 1px solid #e8e8e8;
}

.btn{
  background-color: #c11b17;
}

.jumbotron {
    background: none repeat scroll 0% 0% rgba(0, 0, 0, 0.8);
    color: #ffffff;
   padding: 100px 25px;
   font-family: Montserrat, sans-serif;
 }

 #about {
    padding: 60px 50px;
}

.logo {
    font-size: 200px;
    color: #C11B17;

}
@media screen and (max-width: 768px) {
    .col-sm-4 {
        text-align: center;
        margin: 25px 0;
    }
}
.carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #f4511e;
}

.carousel-indicators li {
    border-color: #f4511e;
}

.carousel-indicators li.active {
    background-color: #f4511e;
}

.item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
}

.item span {
    font-style: normal;
}

h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 30px;
}

h4 {
    font-size: 19px;
    line-height: 1.375em;
    color: #303030;
    font-weight: 400;
    margin-bottom: 30px;
}

#home_grid {
  height: 400px;
}

</style>