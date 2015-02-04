<?php
session_start();
function getRandStr($length) {  $str = '0123456789'; $randString = ''; $len = strlen($str)-1; for($i = 0;$i < $length;$i ++){ $num = mt_rand(0, $len); $randString .= $str[$num]; } return $randString ;  }
$text=getRandStr(4);
$_SESSION['text']=$text;
echo $text;
?>
