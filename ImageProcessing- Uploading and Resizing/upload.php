<?php

$fileName= $_FILES["image"]["name"];
$fileTmp = $_FILES["image"]["tmp_name"];
$fileType = $_FILES["image"]["type"];
$fileSize = $_FILES["image"]["size"];
$fileError = $_FILES["image"]["error"];
$file = explode(".", $fileName);
$extension = $file[1];


if (!$fileTmp){
    echo "ERROR:Please select a file";
    exit();
}elseif (!preg_match("/\.(gif|jpg|png)$/i", $fileName)){
    echo "ERROR,File should be .gif,.jpg or .png";
    
    exit();
        
}elseif ($fileError == 1){
    echo "ERROR: Error occured..";
    exit();
}

$res = move_uploaded_file($fileTmp, "images/$fileName");
if ($res != true){
    echo "ERROR:File not uploaded!!";
    exit();
}

include_once 'resize.php';

$target_file = "images/$fileName";
$resize_copy = "images/resize/thumb_$fileName";
$maxWidth =300;
$maxHeight=200;
resize($target_file, $resize_copy, $maxWidth, $maxHeight, $extension);


echo "File $fileName uploaded successfully";

