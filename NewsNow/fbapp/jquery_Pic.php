<?php
echo "This si image";
?>

<html>
<head>
    <title>How to dynamically change an image using javascript/jquery? - Kalle H. Väravas</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <style>
        html, body {margin: 0px; padding: 0px;}
                html, body, div, th, td, p, a {font-family: "Comic Sans MS", cursive; font-size: 12px; color: #000000;}
                .cb {clear: both;}
                #wrapper {width: 400px; margin: 0px auto;}
                    .main-photo{width: 80%; height: 400px; position: relative; border: 1px solid #000000;}
                        .main-photo img {width:100%; height:100%; position:relative; top: 0; left: 0px;}
                    .main-slider {float: left; position: relative; margin-bottom: 10px; border: 0px solid #000; top: 25px; left: 0px; -moz-border-radius: 5px; border-radius: 5px; -moz-box-shadow: 0px 0px 30px 1px #999; -webkit-box-shadow: 0px 0px 30px 1px #999; box-shadow: 0px 0px 30px 1px #999; padding: 0px; color: #FFF; text-align: center; text-decoration: none; /*background-color: #CCC;*/}
                    .window {width: 700px; height: 230px; overflow: hidden; position: relative;}
                        .slider-large-image {position: relative; overflow: hidden; float: left; list-style-type: none; margin: 0px; padding: 0px;}
                            .slider-large-image li {margin: 0px; padding: 0px; float: left; display: inline-block;}
                                .slider-large-image li img {float: left; width: 200px; height: 150px; margin: 10px; cursor: pointer;}
                    .slider-pager {position: relative; z-index: 2; margin: -40px auto 0px;}
                        .slider-pager a {margin: 0px 2px; padding: 2px; text-align: center; text-decoration: none; font-size: 20px; font-weight: bold; color: #ccc;}
                            .slider-pager a:hover,
                            .slider-pager a:active {background-color: #999; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;}
                            .slider-pager a:hover {color: black;}
                            .slider-pager a.active {/* background-color and border-radius used to be here.. */}
    </style>
</head>
<body>
    <div id="wrapper">
        <div class="main-photo">
            <img id="mainphoto" src="/fbapp/a1.jpg" />
        </div>
        <div class="main-slider">
            <div class="window">
                <ul class="slider-large-image">
                    <li><img src="/fbapp/a1.jpg" /></li>
                    <li><img src="/fbapp/a2.jpg" /></li>
                    <li><img src="/fbapp/a3.jpg" /></li>
                    <li><img src="/fbapp/a1.jpg" /></li>
                </ul>
            </div>
            <div class="slider-pager"><a href="#" id="b">&lsaquo;</a><a href="#" id="f">&rsaquo;</a></div>
        </div>
        <br class="cb" />
    </div>
    <script>
        $(document).ready(function() {
            var imagewidth = $('.slider-large-image li').outerWidth();
            var imagesum = $('.slider-large-image li img').size();
            var imagereelwidth = imagewidth * imagesum;
            $(".slider-large-image").css({'width' : imagereelwidth});
            $('.slider-large-image li:first').before($('.slider-large-image li:last'));
            $('.slider-large-image').css({'left' : '-' + imagewidth + 'px'});
            rotatef = function (imagewidth) {
                var left_indent = parseInt($('.slider-large-image').css('left')) - imagewidth;
                $('.slider-large-image:not(:animated)').animate({'left' : left_indent}, 500, function() {
                    $('.slider-large-image li:last').after($('.slider-large-image li:first'));
                    $('.slider-large-image').css({'left' : '-' + imagewidth + 'px'});
                });
            };
            rotateb = function (imagewidth) {
                var left_indent = parseInt($('.slider-large-image').css('left')) + imagewidth;       
                $('.slider-large-image:not(:animated)').animate({'left' : left_indent}, 500, function(){               
                    $('.slider-large-image li:first').before($('.slider-large-image li:last'));
                    $('.slider-large-image').css({'left' : '-' + imagewidth + 'px'});
                });
            };
            $(".slider-pager a#b").click(function () {
                rotateb(imagewidth);
                return false;
            });
            $(".slider-pager a#f").click(function () {
                rotatef(imagewidth);
                return false;
            });
            $(".slider-large-image li img").click(function() {
                $(".main-photo img").attr("src", $(this).attr('src'));
            });
        });
    </script>
</body>
</html>