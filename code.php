<?php
if(!isset($_SESSION)){
	session_start();
}

?>		
		you will get the message in a while..<br><br>
		<form action="" method="post">
		varification code：<input type="text" name="name" maxlength=4 size=10 />
		<input type="submit" name="submit1"/>
		</form>		
		<?php
//$addr = $_SERVER['REMOTE_ADDR'];
$addr='1922.168.2.5';
if(isset($_SESSION['url'])){
	$url=$_SESSION['url'];
}else{$url='/index.php';}

if(strpos($addr,'180.175.')!==FALSE){header('location:'.$url);}else{
	if(!isset($_SESSION['text1'])||!isset($_SESSION['pass'])||$_SESSION['pass']!='ok'){header('location:login.php');}else{//不通过原则	
		//echo $_SESSION['text1'];		
		if(isset($_POST['name'])){
			$name=$_POST['name'];
			if($name==$_SESSION['text1']){
				//$_SESSION['code']='ok';
				setcookie('code', 'name', time()+3600*2);
				header('location:'.$url);				
			}else{
			$_SESSION['pass']=false;
			header('location:login.php');
			}		
		}
	}
}
?>
