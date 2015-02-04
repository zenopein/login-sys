<?php
require("class.phpmailer.php");   
function getRandStr($length) {  $str = '0123456789'; $randString = ''; $len = strlen($str)-1; for($i = 0;$i < $length;$i ++){ $num = mt_rand(0, $len); $randString .= $str[$num]; } return $randString ;  }
	$text1=getRandStr(4);	
	$_SESSION['text1']=$text1;
	
	/*
	include('../conn.php');
	$res=mysqli_query($con,"update info set text='$text1' where id='54'");
	if(!$res){echo 'failed';}else{echo 'sec';}
	$res2=mysqli_query($con,"select text from info where id='54'");
	$row=mysqli_fetch_array($res2);
	echo $row[0];
	*/
// 参数说明(发送到, 邮件主题, 邮件内容, 附加信息, 用户名)    
smtp_mail($pass, $text1, "NULL", "NULL", "username"); 	
echo 'aaa';
 
    function smtp_mail( $sendto_email, $subject, $body, $extra_hdrs, $user_name){    
        $mail = new PHPMailer();    
        $mail->IsSMTP();                  // send via SMTP    
        $mail->Host = "smtp.163.com";   // SMTP servers    
        $mail->SMTPAuth = true;           // turn on SMTP authentication    
        $mail->Username = "seaman121";     // SMTP username  注意：普通邮件认证不需要加 @域名    
        $mail->Password = "81008555"; // SMTP password    
        $mail->From = "seaman121@163.com";      // 发件人邮箱    
        $mail->FromName =  "pan";  // 发件人    

        $mail->CharSet = "GB2312";   // 这里指定字符集！    
        $mail->Encoding = "base64";    
        $mail->AddAddress($sendto_email,"username");  // 收件人邮箱和姓名    
        $mail->AddReplyTo("yourmail@yourdomain.com","yourdomain.com");    
        //$mail->WordWrap = 50; // set word wrap 换行字数    
        //$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment 附件    
        //$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    
        $mail->IsHTML(true);  // send as HTML    
        // 邮件主题    
        $mail->Subject = $subject;    
        // 邮件内容    
        $mail->Body = 'NULL';                                                                          
        $mail->AltBody ="";    //value
        if(!$mail->Send())    
        {    
            echo "邮件发送有误 <p>";    
            echo "邮件错误信息: " . $mail->ErrorInfo;    
            exit;    
        }    
        else {    
            echo "$user_name 邮件发送成功!<br />";    
        }    
    }
	
    
?>