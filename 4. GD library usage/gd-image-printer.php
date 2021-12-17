<?php

header('Content-Type: image/png');

//fetch parameters passed to url
$width = isset($_GET['width']) ? $_GET['width'] : 500;
$height = isset($_GET['height']) ? $_GET['height'] : 500;
$length = isset($_GET['length']) ? $_GET['length'] : 50;

$column_count = $width/$length;
$row_count = $height/$length;

$img_blank = imagecreatetruecolor($width,$height);

//white_bg
$white_bgc = imagecolorallocate($img_blank,255,255,255);

//black_bg
$black_bgc = imagecolorallocate($img_blank,0,0,0);

//start with black
$black = false;

for ($i = 0;$i<$row_count;$i++){

    for ($j = 0;$j<$column_count;$j++){

        //display black
        if (!$black){
            imagefilledrectangle($img_blank,$j*$length,$i*$length,($j+1)*$length,($i+1)*$length, $black_bgc);

        }else{
            //display white
            imagefilledrectangle($img_blank,$j*$length,$i*$length,($j+1)*$length,($i+1)*$length, $white_bgc);
        }
        $black = !$black;
    }

    //alternate row color
    $black = !$black;
}

imagepng($img_blank);
imagedestroy($img_blank);
