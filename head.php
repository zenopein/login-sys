<?php
if(!isset($_SESSION)){
	session_start();
}
//echo $_SERVER["URL"];//works in windows
//echo $_SERVER["SCRIPT_NAME"];//works in ubuntu

$_SESSION['url']=$_SERVER["SCRIPT_NAME"];

//echo $_SERVER["URL"];
//$addr = $_SERVER['REMOTE_ADDR'];
$addr='192.168.2.5';

if(strpos($addr,'180.175.')!==FALSE){
	//$_SESSION['code']='ok';//cookieԭ���� ������ѭcookie
	setcookie('code', 'name');
}
//echo $_COOKIE["code"];
/*
$a='b';
echo 'a';
*/
//if(isset($_SESSION['code'])&&$_SESSION['code']=='ok'){
if(isset($_COOKIE["code"])&&$_COOKIE["code"]=='name'){//ͨ��ԭ��
/*
	if(strpos($addr,'180.175.')===FALSE){
		?>
		<!--<a href="?out=r">logout</a>-->
		<form action='' method='post'>
		<input type="submit" value="logout" name="submit1" style="float:right"/>
		</form>
		<?php
	}//else{echo 'a';}

	//$res=mysqli_query($con,"update info set text='login' where id='54'");
	//if(isset($_GET['out'])&&$_GET['out']=='r'){
	if(isset($_POST['submit1'])){		
		$_SESSION['pass']='false';//valueֻҪ���ǡ�ok���������еǳ���Ч��
		setcookie('code', 'false');
		//$_COOKIE['code']='false';//����
		//$res2=mysqli_query($con,"update info set text='logout' where id='54'");
		header('location:login.php');
	}		
*/
if(isset($_GET['out'])){
	$_SESSION['pass']='false';
	setcookie('code', 'false');
	header('location:login.php');
}	
	
	
}else{header('location:login.php');}//mysql update almost failed;
?>
