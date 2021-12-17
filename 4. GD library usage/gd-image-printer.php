<?php
//
//header('Content-Type: image/png');
//
//$width = $_GET['width'];
//$height = $_GET['height'];
//$length = $_GET['length'];
//
//$im = imagecreatefrompng("boost-logo.png");
//
//$white = imagecolorallocate($im, 255, 255, 255);
//$black = imagecolorallocate($im, 0, 0, 0);
////
////$res='';
////
//////$px = (imagesx($im) - 7.5 * strlen('new string length')) / 2;
////$string = imagestring($im, 1, 1, 3, $res, $black);
//////imagepng($im);
////imagecreatefromstring($string);
////imagedestroy($im);
//
//$dw = $width * 2;
//$dh = $height * 2;
//
//// Now copy the entire switch statement from above; the loops can be reduced
//// to 4-5 `imagecopy` statements each instead of loops if you want.
//
//// Create the actual output image:
//$outputimg = imagecreatetruecolor(500, 500);
////$destimg = imagecreatetruecolor($dw, $dh);
////
////// Set tile and use the fill functions...
//imagesettile($outputimg,$im);
//imagefilledrectangle($outputimg, 0, 0,20,20, $white);
//
//header('image/png');
//imagepng($outputimg);

header('content-type: image/png');

//$watermark = imagecreatefrompng('boost-logo.png');
//$watermark_width = imagesx($watermark);
//$watermark_height = imagesy($watermark);

$watermark = imagecreatetruecolor(500, 500);

$image = imagecreatetruecolor(20, 20);
$image = imagecreatefrompng('boost-logo.png');  //Path to the image file

//$size = getimagesize($_GET['src']);
//$dest_x = $size[0] - $watermark_width - 5;
//$dest_y = $size[1] - $watermark_height - 5;

imagecopymerge($image, $watermark, 5, 5, 0, 0, 500, 500, 100);
imagejpeg($image);
imagedestroy($image);
