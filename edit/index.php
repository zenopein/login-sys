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
<div class="bottom b1">
	<a href="#" id="btn" onclick="clk()">New</a>
	<a href="" style="border-right:0">Log out</a>
</div>
<div class="new" id="new">
	<a href="#" onclick="clk()">X</a>
	<form action="" method='post' style="margin-top:50px;margin-left:2%">
	<input type="text" name="text" style="width:30%;"/>
	<select name="extend">
		<option value='.txt'>.txt</option>
		<option value='.php' selected>.php</option>
		<option value='.htm'>.htm</option>
	</select>
	<input name="submit" type="submit">
	</form>
</div>
<script>
function setCookie(name,value) 
{ 
    var Days = 30; 
    var exp = new Date(); 
    exp.setTime(exp.getTime() + Days*24*60*60*1000); 
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString(); 
}
function getCookie(name)
{
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
 
    if(arr=document.cookie.match(reg))
 
        return unescape(arr[2]); 
    else 
        return null; 
}
var timer1=null
var timer2=null
setCookie("asd","closed");
var grid=document.getElementById('new');
function clk(){
	//grid.style.height='200px';
	//setInterval(function(){if(grid.offsetHeight<200){grid.style.height=grid.offsetHeight+4+'px'}},20);
	
	//document.cookie.indexOf("asd=")==-1
	if(getCookie("asd")=="closed"){
		clearInterval(timer2);
		//grid.style.display="block";
		timer1=setInterval(function(){if(grid.offsetHeight<200){grid.style.height=grid.offsetHeight+20+'px'}},20);
		setCookie("asd","open");
		//alert(getCookie("asd"));
		
	}else{
		clearInterval(timer1);
		//grid.style.display="none";
		timer2=setInterval(function(){if(grid.offsetHeight>0){grid.style.height=grid.offsetHeight-20+'px'}},20)	
		setCookie("asd","closed");
		//alert(getCookie("asd"));
		//alert('a');
	}
	
}


</script>

<?php
header("Content-Type:text/html;charset=utf-8");
//$urldir='http://localhost/file/';
$type='file';
$typedir='/var/www/html/file';

if(isset($_POST['submit'])){
	if(isset($_POST['text'])){$text=$_POST['text'];}else{$text=time();}
	if($_POST['extend']=='.php'){$filetext='<?php 


?>';}else{$filetext='';}
	file_put_contents($type.'/'.$text.$_POST['extend'],$filetext);
	header('location:edit.php?type=file&file='.$text.$_POST['extend']);
}



//print $typedir;
$filesnames=scandir($typedir,0);
//print_r($filesnames);
//$filesnames=array_diff($filesnames,array('..','.'));
$num=count($filesnames);
//echo $num;
//print '<pre>';
//print_r ($filesnames);

if(isset($_GET['page'])){
$page=$_GET['page'];}else{$page=1;}
$pagesize=50;
$imin=($page-1)*$pagesize+2;
$imax=$page*$pagesize+2;
if($imax>$num){$imax=$num;}
print '<table>';
print '<tr><td>filename</td><td>size</td><td>updatetime</td><td>delete this file</td></tr>';
for($i=$imin;$i<$imax;$i++){
	if(!is_dir($filesnames[$i])){
		$name=$filesnames[$i];
		$name1=$typedir.'\\'.$name;
		
		if(isset($_GET['del'])){
		$del=$_GET['del'];
		include_once('delete.php');	
	}
		if(isset($_GET['dell'])){
		
	$delf=$_GET['dell'];
	//echo $delf.'<br>';	
	
	$myfile = $typedir.'\\\\'.$delf;
	if (file_exists($myfile)) {
		$result=unlink ($myfile);
		//echo $result;
		
	}else{echo "<script>location.href='index.php?type=".$type."';</script>";}
	}
		if(file_exists($name1)){
		print '<tr>';
		print  '<td><a href="edit.php?type='.$type.'&file='.$name.'">'.$name.'</a></td>';
		//print '<td>'.$urldir.$name.'</td>';
		print '<td>'.filesize($name1).'B</td>';
		print '<td>'.date('Y-m-d H:i:s',filemtime($name1)).'</td>';//
		//print date('Y-m-d H:i:s',fileatime($name1)).' ';//
		//print date('Y-m-d H:i:s',filectime($name1)).' ';//		
		print '<td><a href="?type='.$type.'&del='.$name.'">delete</a></td>';
		print '<tr>';
		}
	}
}
print '</table>';
if($num>$pagesize){
		$prev=$page-1;
		$next=$page+1;
		if($prev==0){$prev=1;}
		print '<a href="index.php?type='.$type.'&page='.$prev.'" target="_self">prev</a>&nbsp';
		print '<a href="index.php?type='.$type.'&page='.$next.'" target="_self">next</a><br>';
	}

?>

</body>
</html>
