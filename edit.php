<?php
header("Content-Type:text/html;charset=utf-8");
include('head.php');
if(isset($_GET['file'])){
	$filename=$_GET['file'];
	$filecontents=file_get_contents($_GET['type'].'/'.$_GET['file']);
}else{header('location:index.php');}
if(isset($_POST['name'])){
	file_put_contents($_GET['type'].'/'.$_GET['file'],$_POST['name']);
	//echo '<script>location.reload();</script>';
	echo '<script>location.replace(location.href)</script>';
}
?>

<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
<link  rel="stylesheet" type="text/css" href="css.css"/>
</head>
<body>
<div class="bottom1"></div>
<div class="bottom b2">
<a href="index.php">Home</a>
<a href="/file/<?php echo $filename; ?>">Exec</a>
<a href="javascript:void(0)">Backup</a>
<a href="javascript:void(0)" style="border-right:none" onclick='handup()'>Save</a>
</div>
<form method='post' name='forms' action="">
<textarea name="name">
<?php print $filecontents; ?>
</textarea>
</form>
<script>
/*
function autosubmit(){
var form = document.forms[0];
var actionPath = "index.php";
form.action = actionPath;
form.submit();
return true;
}//failed
*/
function handup(){
	document.forms.submit();
}
</script>
</body>
</html>
