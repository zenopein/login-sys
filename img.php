<?php
//sometimes it does not work on linux , i dont know why, so img1.php show up
header("Content-type:image/png");//原来是这么用的
if(!isset($_SESSION)){
	session_start();
}
//include ('rand2.php');

function getRandStr($length) {  $str = '0123456789'; $randString = ''; $len = strlen($str)-1; for($i = 0;$i < $length;$i ++){ $num = mt_rand(0, $len); $randString .= $str[$num]; } return $randString ;  }
$text=getRandStr(4);

$myImage=ImageCreate(400,60);
$black=ImageColorAllocate($myImage, 0, 0, 0); 
$blue=ImageColorAllocate($myImage, 0, 0, 255);
$white=ImageColorAllocate($myImage,255, 255,255); 
ImageRectangle($myImage, 50, 10, 200, 40,$blue);

imagettftext($myImage, 12, 0, 5, 20, $white, 'Elephant.ttf', $text);


$_SESSION['text']=$text;



ImagePng($myImage);
ImageDestroy($myImage);//居然做的这么精细
?>
