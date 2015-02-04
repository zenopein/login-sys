<?php
if(!isset($_SESSION)){
	session_start();
}
//echo $_SESSION['url'];
global $url;
if(isset($_SESSION['url'])){
	$url=$_SESSION['url'];
}else{$url='/index.php';}
//$addr = $_SERVER['REMOTE_ADDR'];
$addr='1922.168.2.5';
//if(strpos($addr,'180.175')!==FALSE){header('location:/analyz/index.php');}
if(strpos($addr,"180.175")!==FALSE){header("location:".$url);}
//else if(isset($_SESSION['pass'])&&$_SESSION['pass']=='ok'){header('location:code.php');}//让不让随便去 code.php;
else{
//echo $_COOKIE["code"];
?>
<script>
function load(){
if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function(){
	if(xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById('img').innerHTML=xmlhttp.responseText;
	}
}  
xmlhttp.open("GET","img1.php",true);
xmlhttp.send();
}
load()
</script>
<div id='img'  style="width:200px;height:40px;background:#eee" onclick='load()'>click me</div>
<form action="" method="post">
Mail:<input type="text" name="pass"/><br/>
<!--
<img src="/img.php" onclick="this.src='/img.php'"/><br/>
-->
VC:<input type="text" name="validate" maxlength=4 size=10 /><br/>
<input type="submit" name="submit"/>
</form>

<?php
//echo $_SESSION["text"];
if(isset($_POST["validate"])&&isset($_POST["pass"])){
$validate=$_POST["validate"];
echo "您刚才输入的是：".$_POST["validate"]."<br>";
if($validate!=$_SESSION["text"]){
//判断session值与用户输入的验证码是否一致;
//$_SESSION['date']='no';
//$v='no';
echo "<font color=red>信息有误</font>";
header('location:login.php');// header 与js location的区别在于 header 把表单记录去掉了
}else{

	//echo "<font color=green>通过验证</font>"; 
	$pass=$_POST['pass'];
	$arr=array('asd','name','18721676683@139.com');
	foreach($arr as $ar){//in_array()
	if($pass==$ar){
		include('mail1.php');//fantastic		
		$_SESSION['pass']='ok';		
		header('location:code.php');
		break;
	}//else{echo 'retext<br>';}
	}
}
}//else{$validate='';}
}
?>
