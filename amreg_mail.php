<?php
ob_start();

include("application/includes/conn.php");
include("application/includes/class.phpmailer.php");

if($_SERVER['REQUEST_METHOD']=="POST") {   //print_r($_POST);exit;
$title="Emergency Registration Details";

// Blood Bank 	// Registration
			    session_start();
				$update_body="";$dev_mail="";$message="";$txt_name="";
				$master_mail=$_POST['emergency_email'];
				$bcc_mail="technical@ytoa-prana.com";
				$mailto = $master_mail;
			  	
			 // code and ref no generation for Pharma Registration
			 	 
			  $cnt = getdata("ytoa_emergency","count(*)","emergency_phone='".$_POST['emergency_phone']."'");
			  if($cnt>0) { 
					header("location:bbservices_registration.php?msg=error");
			 } else {
			   $orderby=rns_max('ytoa_emergency','emergency_order_by');
			   $code=substr(getdata("ytoa_emergency","max(emergency_code)",1),3);
			   if($code!="") { $code=$code+1; } else {  $code=1; }
			   $emergency_code="YTOA_EME_".$orderby;
			   $_POST['emergency_code']= $emergency_code;
			   $_POST['emergency_order_by']=$orderby;
			   $_POST['emergency_added_date']=$now_time;
//			   $_POST['mobile']=$_SESSION['username'];
			   $_POST['emergency_username']=$_POST['emergency_phone'];
				
			   $rand=generateCode_ls(8);
			   $_POST['emergency_password']=rnsb64ende($rand);
			   //$rand=hexdec(uniqid());
			   $rand_code="YTOA_EME_".date("Y");
			   $rand_code.=substr($emergency_code,10).$rand;
			    $_POST['emergency_refno']=$rand_code;
			   $_POST['system_ip']=$_SERVER["REMOTE_ADDR"];

			   $ins_id=insert_Defined('ytoa_emergency', array_map('trim',$_POST ),1);
			    Query("INSERT INTO ytoa_emergency_usermanagement SET emergency_um_reg_idfk='".$ins_id."',emergency_um_code='".$_POST['emergency_code']."',emergency_um_username='".$_POST['emergency_username']."',emergency_um_fname='".$_POST['emergency_name']."',emergency_um_password='".$_POST['emergency_password']."',emergency_um_type='2',emergency_um_email='".$_POST['emergency_email']."',emergency_um_cat_idfk='".$_POST['emergency_reg_cat']."',emergency_um_phone='".$_POST['emergency_phone']."',emergency_um_added_date='".$now_time."'");

			 $emergency_cat	= getdata("ytoa_regcat","regcat_name","regcat_id='".$_POST['emergency_reg_cat']."'");

/*
			 $sh_state	= getdata("bi_states","st_name","st_id='".$_POST['sh_state']."'");
			 $sh_district = getdata("bi_districts","dt_name","dt_id='".$_POST['sh_district']."'");
			 $sh_mandal	= getdata("bi_mandals","md_name","md_id='".$_POST['sh_mandal']."'");
*/			 
			  //Contact
			  //".$site_name."/
			         $sig	= "";
	$sig_admin= "Please Note: Update your KYC / Certificate Details to get activate your account from Y to A - Prana Team!<br><br>Thanks,<br><br>Y to A Prana Health Care Private Limited";
   $toemail=$_POST['emergency_email'];
   $toname=$_POST['emergency_name'];

		
	// Mail to site Administrator
	$message 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
			  <tr><td><strong>Registration Details </strong:></td></tr>			  
			  <tr>
				<td width='40%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Registration Id</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['emergency_refno'])."</strong></td>
			  </tr>
			  <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Emergency Name</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td width='70%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['emergency_name'])."</strong></td>
  				</tr>
			  <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Specialization</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td width='70%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($emergency_cat)."</strong></td>
  				</tr>
			  <tr><td><strong>Contact Details</strong></td></tr>
               <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Office Number</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['emergency_office'])."</strong></td>
			  </tr>
               <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Phone Number</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['emergency_phone'])."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>E-Mail</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['emergency_email']."</strong></td>
			  </tr>
			   <tr><td><strong>About</strong></td></tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>In Singlie Line</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['emergency_singleline']."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>Description</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['emergency_about']."</strong></td>
			  </tr>
			   <tr><td><strong>Social-Media Details</strong></td></tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>Facebook</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['emergency_facebook']."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>Twitter</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['emergency_twitter']."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>LinkedIn</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['emergency_linkedin']."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>Instagram</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['emergency_instagram']."</strong></td>
			  </tr>
			   			   
			   <tr><td><strong>Survivallence Details</strong></td></tr>
			  <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Date / Time</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".dd_mm_yyyy($now_time)."</strong></td>
			  </tr>
			  <tr>
			    <td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>IP Address</td>
			    <td align='center'><strong>:</strong></td>
			    <td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_SERVER['REMOTE_ADDR'])."</strong></td>
		      </tr>
			  </table>";
			  $login_details="<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
               <tr>
				<td width='40%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>User Name</td>
				<td width='13%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['emergency_username']."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Password</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".rnsb64ende($_POST['emergency_password'],1)."</strong></td>
			  </tr>
			  </table>
			  ";
			  
			  if((!empty($_POST['emergency_name']))&&(!empty($_POST['emergency_phone']))&&(!empty($_POST['emergency_singleline']))&&(!empty($_POST['emergency_reg_cat']))){

			//echo $message;exit;
			$mail_body=str_replace("{bodycontent}",$message,$mail_template);
			$mail_body=str_replace("{login_credential}",$login_details,$mail_body);
			$mail_body=str_replace("{sig}",$sig_admin,$mail_body);
			$mail_body=str_replace("disname",ucfirst($toname),$mail_body);	
			//echo $mail_body; exit;
			$mail = new PHPMailer();	
			$mail->IsMail();
			$mail->From  = FROM_MAIL;
			$mail->FromName = FROM_NAME." - ".$subcat_details['regsubc_name']." Registration";
			$mail->AddAddress(FROM_MAIL);
			$mail->AddAddress($toemail);
			//$mail->AddAddress(DEV_MAIL);
			$mail->AddBCC("technical@ytoa-prana.com",FROM_NAME);
			$mail->AddBCC(DEV_MAIL,FROM_NAME);
			$mail->IsHTML(true);
			$mail->Subject	= "New ".ucfirst($pharma_cat)." Registration Details From ytoa-prana.com";
			$mail->Body	= stripslashes($mail_body);
			$mail->Send();
			header("location:success.php");
			//echo $mail_body; exit;
			}else{
			$msg1="You are not triggered with mail!!! ahahahahhhhh!!!!";
			//header("location:pharma_registration.php?msg1=error?");
		}
		
	 }
	}
?>