<?php
ob_start();
include("application/includes/conn.php"); 
include("application/includes/class.phpmailer.php");

if($_SERVER['REQUEST_METHOD']=="POST"){
	
	$title="Doctor - Contact Form Details";

// Doctor-Contact 	// Form
				$update_body="";$dev_mail="";$message="";$txt_name="";
				$master_mail="support@ytoa-prana.com";
				$bcc_mail="technical@ytoa-prana.com";
				$mailto = $master_mail;
			  	
			   $_POST['doccon_added_date']=$now_time;
			   $_POST['system_ip']=$_SERVER["REMOTE_ADDR"];
			   
	$ins_id=insert_Defined('ytoa_doccon', array_map('trim',$_POST),1);


	$sig	= "";
   		$sig_admin= "Thanks,<br>Y to A - Prana Team";
   		$toemail=$_POST['email'];
   		$toname="user";

   		$message 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>			  
			  	  
              <tr><td><strong><u>Contact Details</u></strong></td></tr>
			   <tr>
				<td width='35%' align='left'  class='textfont'>Name</td>
				<td width='5%' align='center'><strong>:</strong></td>
				<td align='left' class='color'>".$_POST['doccon_name']."</td>
			  </tr>
			   <tr>
				<td width='35%' align='left'  class='textfont'>Email</td>
				<td width='5%' align='center'><strong>:</strong></td>
				<td align='left' class='color'>".$_POST['doccon_email']."</td>
			  </tr>
			  <tr><td><strong><u>Contact Message</u></strong></td></tr>
			   <tr>
				<td width='35%' align='left'  class='textfont'>Doctor Name</td>
				<td width='5%' align='center'><strong>:</strong></td>
				<td align='left' class='color'>".$_POST['doc_name']."</td>
			  </tr>
			   <tr>
				<td width='35%' align='left'  class='textfont'>Message</td>
				<td width='5%' align='center'><strong>:</strong></td>
				<td align='left' class='color'>".$_POST['doccon_message']."</td>
			  </tr>
			   <tr><td><strong><u>Survivallence Details</u></strong></td></tr>
			  <tr>
				<td width='35%' align='left'  class='textfont'>Ip Address</td>
				<td width='5%' align='center'><strong>:</strong></td>
				<td align='left' class='color'>".$_SERVER['REMOTE_ADDR']."</td>
			  </tr>
			  <tr>
				<td width='35%' align='left'  class='textfont'>Date:</td>
				<td width='5%' align='center'><strong>:</strong></td>
				<td align='left' class='color'>".$now_time."</td>
			  </tr>
			  <tr><td></td></tr>
			  <tr><td></td></tr>
			  <tr><td></td></tr>";
			$mail_body=str_replace("{bodycontent}",$message,$mail_template);
			$mail_body=str_replace("{sig}",$sig_admin,$mail_body);
			$mail_body=str_replace("disname",$_POST['doccon_name'],$mail_body);	
			//echo $mail_body; exit;
			$mail = new PHPMailer();	
			$mail->IsMail();
			$mail->From 	= FROM_MAIL;
			$mail->FromName = FROM_NAME ."- Doctor Contact Details ";
			//$mail->AddAddress(FROM_MAIL);
			$mail->AddAddress($toemail);
			$mail->AddAddress("technical@ytoa-prana.com");
			$mail->IsHTML(true);
			$mail->Subject	= "Doctor - Contact Details From ytoa-prana.com";
			$mail->Body		= stripslashes($mail_body);
			$mail->Send();
			//echo $toemail;
			//echo $mail_body; exit;
			$msg="Thank you for your Contact.<br>We will get back you soon. ";
//			header("location:doctor_view.php?did=".$_POST['doc_id']);
			header("location:success_doccontact.php");
}
?>