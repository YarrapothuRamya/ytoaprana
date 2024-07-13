<?php
ob_start();
include("application/includes/conn.php");
include("application/includes/class.phpmailer.php");
require_once('application/includes/php-image-magician/php_image_magician.php');

if($_SERVER['REQUEST_METHOD']=="POST") {   //print_r($_POST);exit;
	$cat_details=get_data('ytoa_diagnosticcat','*','diagnosticcat_id='.$_POST['diagnostic_reg_cat']);
$title="Diagnostic Registration Details";

$size="2048";$res_height="2500";$res_width="2500";$usize="2000 x2000";$com_cond="";
$upload_img=$_FILES['image']["name"];

// Diagnostic 	// Registration
			    session_start();

/*				if(empty($_POST["captcha"]) || $_SESSION["code"]!=$_POST["captcha"]){?>
			    	<script> alert('Wrong Captcha Entered'); window.history.back(); </script>
			    <? exit; }
*/
//				unset($_POST['shipping-option'],$_POST['captcha']);
				
				$update_body="";$dev_mail="";$message="";$txt_name="";
				$master_mail=$_POST['diagnostic_email'];
				$bcc_mail="technical@ytoa-prana.com";
				$mailto = $master_mail;
			  	
			 // code and ref no generation for Doctors Registration
			 	 
			  $cnt = getdata("ytoa_diagnostic","count(*)","diagnostic_phone='".$_POST['diagnostic_phone']."'");
			  if($cnt>0) { 
					header("location:diagnostic_registration.php?msg=error");
			 } else {

				//alert($upload_img);
				$valid_image_check = array("gif", "jpeg", "jpg", "png", "bmp","GIF", "JPEG", "JPG", "PNG", "BMP");
				$folderName = "uploads/diagnostic_photos/";
					if (file_exists($folderName)) { } else { mkdir($folderName, 0777); }  // for Directory Creation
					$thumb_folderName = $folderName."thumb/";
					if (file_exists($thumb_folderName)) { } else { mkdir($thumb_folderName, 0777); }  // for Directory Creation
					//if($p_cat_id!=4){ $image1 = $thumb_folderName.$imgname;	}
					$image2 = $folderName.$imgname;
					if(!empty($upload_img)){
					//alert('hello11');
						list($width,$height,$type)=getimagesize($_FILES["image"]["tmp_name"]);
						$file_size = filesize($_FILES["image"]["tmp_name"]);
						$file_size = $file_size / 1024;
						if($height<=$res_height && $width<=$res_width && $file_size<= $size) { 
							$image_mime = substr(strrchr($_FILES["image"]["name"], '.'), 1);
							//alert('hello10');
							if (in_array($image_mime, $valid_image_check)) {
								$ext = explode("/", strtolower($image_mime));
								$ext = strtolower(end($ext));
								$filename = rand(10000, 990000) . '_' . time() . '.' . $ext;
								$filepath = $folderName . $filename;
								//alert('hello11');
								move_uploaded_file($_FILES["image"]["tmp_name"], $filepath);
									//alert('hello7');
									$magicianObj = new imageLib($filepath);
									$magicianObj->resizeImage(113, 112);
									$magicianObj->saveImage($folderName . 'thumb/' . $filename, 100);
									$_POST['image']=$filename;
											//alert('hello7');
											
			   $orderby=rns_max('ytoa_diagnostic','diagnostic_order_by');
			   $code=substr(getdata("ytoa_diagnostic","max(diagnostic_code)",1),3);
			   if($code!="") { $code=$code+1; } else {  $code=1; }
			   $diagnostic_code="YTOA_DI_".$orderby;
			   $_POST['diagnostic_code']= $diagnostic_code;
			   $_POST['diagnostic_order_by']=$orderby;
			   $_POST['diagnostic_added_date']=$now_time;
//			   $_POST['mobile']=$_SESSION['username'];
			   $_POST['diagnostic_username']=$_POST['diagnostic_phone'];
				
			   $rand=generateCode_ls(8);
			   $_POST['diagnostic_password']=rnsb64ende($rand);
			   //$rand=hexdec(uniqid());
			   $rand_code="YTOA_PH_".date("Y");
			   $rand_code.=substr($diagnostic_code,10).$rand;
			    $_POST['diagnostic_refno']=$rand_code;
			   $_POST['system_ip']=$_SERVER["REMOTE_ADDR"];
			   /*
			   print_r($_POST);
			   exit;
			   */
			   $ins_id=insert_Defined('ytoa_diagnostic', array_map('trim',$_POST ),1);
				
			    Query("INSERT INTO ytoa_diagnostic_usermanagement SET diagnostic_um_reg_idfk='".$ins_id."',diagnostic_um_code='".$_POST['diagnostic_code']."',diagnostic_um_username='".$_POST['diagnostic_username']."',diagnostic_um_password='".$_POST['diagnostic_password']."',diagnostic_um_type='2',diagnostic_um_email='".$_POST['diagnostic_email']."',diagnostic_um_phone='".$_POST['diagnostic_phone']."',diagnostic_um_added_date='".$now_time."'");


				$number=$_POST['diagnostic_phone'];
				$text_message="Dear%20".$_POST['diagnostic_name'].",%20You%20are%20successfully%20registered%20with%20www.ytoa-prana.com%20Login%20Credentials:%20Username%20".$_POST['diagnostic_username']."%20and%20Password%20".rnsb64ende($_POST['diagnostic_password'],1)."%20Thank%20You!";
				
				$reg_result=SendSMS($number,$text_message);	
				
			  //Contact
			  //".$site_name."/
			         $sig	= "";
	$sig_admin= "Please Note: Update your KYC / Certificate Details to get activate your account from Y to A - Prana Team!<br><br>Thanks,<br><br>Y to A Prana Health Services Pvt. Ltd.";
   $toemail=$_POST['diagnostic_email'];
   $toname=$_POST['diagnostic_name'];

		
	// Mail to site Administrator
	$message 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
			  <tr><td><strong>Registration Details </strong:></td></tr>			  
			  <tr>
				<td width='40%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Registration Id</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['diagnostic_refno'])."</strong></td>
			  </tr>
			  <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Diagnostic Name</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td width='70%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['diagnostic_name'])."</strong></td>
  				</tr>
  				<tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Establishment Date</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".dd_mm_yyyy($_POST['diagnostic_added_date'])."</strong></td>
			  </tr>
			  <tr><td><strong>Contact Details</strong></td></tr>
               <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Phone Number</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['diagnostic_phone'])."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>E-Mail</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['diagnostic_email']."</strong></td>
			  </tr>
			   <tr><td><strong>Survivallence Details</strong></td></tr>
			   <tr>
				<td width='36%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>diagnostic Category Name</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td width='60%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($cat_details['diagnosticcat_name'])."</strong></td>
  				</tr>
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
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['username'])."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Password</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".rnsb64ende($_POST['password'],1)."</strong></td>
			  </tr>
			  </table>
			  ";
			  
			  if((!empty($_POST['diagnostic_name']))&&(!empty($_POST['diagnostic_phone']))&&(!empty($_POST['diagnostic_singleline']))&&(!empty($_POST['diagnostic_reg_cat']))){
				  //&&(!empty($_POST['diagnostic_reg_subcat']))

			//echo $message;exit;
			$mail_body=str_replace("{bodycontent}",$message,$mail_template);
			$mail_body=str_replace("{login_credential}",$login_details,$mail_body);
			//$mail_body=str_replace("{sig}",$sig_admin,$mail_body);
			$mail_body=str_replace("disname",ucfirst($toname),$mail_body);	
			//echo $mail_body; exit;
			$mail = new PHPMailer();	
			$mail->IsMail();
			$mail->From  = FROM_MAIL;
			$mail->FromName = FROM_NAME." - ".$cat_details['diagnosticcat_name']." Registration";
			$mail->AddAddress(FROM_MAIL);
			$mail->AddAddress($toemail);
			//$mail->AddAddress(DEV_MAIL);
			$mail->AddBCC("technical@ytoa-prana.com",FROM_NAME);
			$mail->AddBCC(DEV_MAIL,FROM_NAME);
			$mail->IsHTML(true);
			$mail->Subject	= "New ".ucfirst($cat_details['diagnosticcat_name'])." Registration Details From ytoa-prana.com";
			$mail->Body	= stripslashes($mail_body);
			$mail->Send();
			header("location:dsuccess.php");
			//echo $mail_body; exit;
			}else{
			$msg1="You are not triggered with mail!!! ahahahahhhhh!!!!";
			header("location:diagnostic_registration.php?msg1=error?");
		}
							}
/*	 }
	 else
	 {
		 $msg1="Sorry! You are uploading more than specified size image!";
	 }
	*/
	}
}
}
}
?>