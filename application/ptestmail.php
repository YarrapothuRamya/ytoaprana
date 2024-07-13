<?php
//require 'PHPMailer/PHPMailerAutoload.php';

include("class.phpmailer.php");
        
		//$fromemail="lokesh@bitragroup.com";
	    $mail = new PHPMailer;
		$mail->isHTML(true); 
		$mail->Host = "localhost";
	    $mail->Port = 25;
	    $mail->SMTPAuth = false;
		//$mail->setFrom('info@natsoft.com', 'Lokesh');
		$mail->From = 'info@bairisons.com';
        $mail->FromName = 'Lokesh';
		//$mail->From 	= $fromemail; 
		$mail->addAddress('registration@bairisons.com', 'Lokesh');
		$mail->addAddress('katurilokesh7@gmail.com', 'Lokesh');
		
		$mail->Subject = 'Bairisons Test1';
		$mail->Body    ="Bairisons";
		
		//echo $mail->Body;exit;
		
		$mail->send();
		echo"Test";
		
		 //header("location:success.php");
	

?>
