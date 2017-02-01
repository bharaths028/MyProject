<?php

$output = "images/textimage1.png";
$x = 720;
$y = 480;

$image = "images/option2.png";

//colors to use
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);

$text1 = imagettftext($image, 40, 0, 20, 40, $black, "fonts/Aller_Lt.TTF", "along the test");

imagejpeg($image,$output);

?>
<img src="<?php echo $output; ?>" >