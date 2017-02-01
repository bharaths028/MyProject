<?php
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '1780726172162517',
  'app_secret' => '1355601b9d9e158ef5a809dcdd4cc581',
  'default_graph_version' => 'v2.4',
]);

$helper = $fb->getCanvasHelper();

$permissions = ['picture']; // optionnal

try {
  if (isset($_SESSION['facebook_access_token'])) {
  $accessToken = $_SESSION['facebook_access_token'];
  } else {
      $accessToken = $helper->getAccessToken();
  }
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
 }

if (isset($accessToken)) {

  if (isset($_SESSION['facebook_access_token'])) {
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
  } else {
    $_SESSION['facebook_access_token'] = (string) $accessToken;

      // OAuth 2.0 client handler
    $oAuth2Client = $fb->getOAuth2Client();

    // Exchanges a short-lived access token for a long-lived one
    $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

    $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
  }

  // validating the access token
  try {
    $request = $fb->get('/me');
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    if ($e->getCode() == 190) {
      unset($_SESSION['facebook_access_token']);
      $helper = $fb->getRedirectLoginHelper();
      $loginUrl = $helper->getLoginUrl('https://apps.facebook.com/APP_NAMESPACE/', $permissions);
      echo "<script>window.top.location.href='".$loginUrl."'</script>";
      exit;
    }
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }

  // getting profile picture of the user
  try {
    $requestPicture = $fb->get('/me/picture?redirect=false&height=300'); //getting user picture
    $requestProfile = $fb->get('/me'); // getting basic info
    $picture = $requestPicture->getGraphUser();
    $profile = $requestProfile->getGraphUser();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
  
  // showing picture on the screen
  // echo "<img src='".$picture['url']."'/>";

  // saving picture

  if (!file_exists($profile['name'])) { mkdir($profile['name'], 0777, true); }
  $img = __DIR__.'/'.$profile['name'].'/'.$profile['name'].'.jpg';
  file_put_contents($img, file_get_contents($picture['url']));

  //merging images
  $width = 320;
    $height = 320;

    $base_image = imagecreatefromjpeg($img);
    $top_image = imagecreatefrompng("/Applications/XAMPP/xamppfiles/htdocs/fbapp/option1.png");

    imagesavealpha($top_image, false);
    imagealphablending($top_image, false);
    imagecopy($base_image, $top_image, 0, 0, 0, 0, $width, $height);
    imagepng($base_image, "/Applications/XAMPP/xamppfiles/htdocs/fbapp/$profile[name]/merged1.png");

    $width = 320;
    $height = 320;

    $base_image = imagecreatefromjpeg($img);
    $top_image = imagecreatefrompng("/Applications/XAMPP/xamppfiles/htdocs/fbapp/option2.png");

    imagesavealpha($top_image, false);
    imagealphablending($top_image, false);
    imagecopy($base_image, $top_image, 0, 0, 0, 0, $width, $height);
    imagepng($base_image, "/Applications/XAMPP/xamppfiles/htdocs/fbapp/$profile[name]/merged2.png");


    //end of merge

    
  
    // Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
  $helper = $fb->getRedirectLoginHelper();
  $loginUrl = $helper->getLoginUrl('https://apps.facebook.com/myprofileappbharath/');
  echo "<script>window.top.location.href='".$loginUrl."'</script>";
}



?>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


</head>
<body>
  <div id="wrapper" class="container" align="center">
    <h3>HEALTHY LIVING</h3>
    <div class="main-photo"><img id="mainphoto" src="/fbapp/<?php echo $profile['name']; ?>/merged1.png" alt="" width="320" height="320" itemprop="image"></div>
    <p>STEP 1: Choose an option</p>

    <div class="window">
      <ul class="slider-large-image" style="list-style: none;display:inline;">
          <li style="display:inline;padding:10px;"><img src="/fbapp/option2.png" width="80" height="80" /></li>
          <li style="display:inline;padding:10px;"><img src="/fbapp/option1.png" width="80" height="80"/></li>
      </ul>
    </div>


    <p>Step 2: Add Custom text </p>
    <p>I Stand for Healthy Living </p>
    <input type="text" style="background-color:#FFF;color:#1D2129;height:29;width:304;" placeholder="Because..."></input>
    <p>Max 24 Characters</p>
    <button style="background-color:#365899;color:#FFF;height:34;width:290;">Use this as profile picture</button>
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
            $(".slider-large-image").on("click","li",function() {
              
              var index = $(this).index();
              
              
              if(index == 0){
              $(".main-photo img").attr("src", "/fbapp/<?php echo $profile['name']; ?>/merged1.png");  
              }
              else{
                $(".main-photo img").attr("src", "/fbapp/<?php echo $profile['name']; ?>/merged2.png");
              }
              

                

            });
        });
    </script>
</body>
</html>