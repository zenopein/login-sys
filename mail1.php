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
// ����˵��(���͵�, �ʼ�����, �ʼ�����, ������Ϣ, �û���)    
smtp_mail($pass, $text1, "NULL", "NULL", "username"); 	
echo 'aaa';
 
    function smtp_mail( $sendto_email, $subject, $body, $extra_hdrs, $user_name){    
        $mail = new PHPMailer();    
        $mail->IsSMTP();                  // send via SMTP    
        $mail->Host = "smtp.163.com";   // SMTP servers    
        $mail->SMTPAuth = true;           // turn on SMTP authentication    
        $mail->Username = "seaman121";     // SMTP username  ע�⣺��ͨ�ʼ���֤����Ҫ�� @����    
        $mail->Password = "81008555"; // SMTP password    
        $mail->From = "seaman121@163.com";      // ����������    
        $mail->FromName =  "pan";  // ������    

        $mail->CharSet = "GB2312";   // ����ָ���ַ�����    
        $mail->Encoding = "base64";    
        $mail->AddAddress($sendto_email,"username");  // �ռ������������    
        $mail->AddReplyTo("yourmail@yourdomain.com","yourdomain.com");    
        //$mail->WordWrap = 50; // set word wrap ��������    
        //$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment ����    
        //$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    
        $mail->IsHTML(true);  // send as HTML    
        // �ʼ�����    
        $mail->Subject = $subject;    
        // �ʼ�����    
        $mail->Body = 'NULL';                                                                          
        $mail->AltBody ="";    //value
        if(!$mail->Send())    
        {    
            echo "�ʼ��������� <p>";    
            echo "�ʼ�������Ϣ: " . $mail->ErrorInfo;    
            exit;    
        }    
        else {    
            echo "$user_name �ʼ����ͳɹ�!<br />";    
        }    
    }
	
    
?>