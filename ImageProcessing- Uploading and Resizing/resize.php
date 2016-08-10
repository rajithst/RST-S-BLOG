<?php

function resize($img,$newimg,$resWidth,$resHeight,$exte){
    
    list($width,$height)= getimagesize($img);
    $scale_ratio = $width/$height;
    
    if (($resWidth/$resHeight)>$scale_ratio){
        
        $resWidth = $resHeight*$scale_ratio;
    }else{
        $resHeight= $resWidth/$scale_ratio;
    }
      
 $image = "";
 
 if ($exte == "gif" ||$exte == "GIF" ) {
     
     $image = imagecreatefromgif($img);
     
 }else if ($exte == "png" ||$exte == "PNG") {
     
     $image = imagecreatefrompng($img);
     
 }else{
     
     $image = imagecreatefromjpeg($img);
 }
 
 $layout = imagecreatetruecolor($resWidth, $resHeight);
 imagecopyresampled($layout, $image, 0,0,0, 0, $resWidth, $resHeight, $width, $height);
 imagejpeg($layout,$newimg,80);
}