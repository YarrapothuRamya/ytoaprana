<?php
ob_start();

include("application/includes/conn.php");
include("application/includes/class.phpmailer.php");
require_once('application/includes/php-image-magician/php_image_magician.php');

if($_SERVER['REQUEST_METHOD']=="POST") {   //print_r($_POST);exit;
$title="Pharma Registration Details";

$size="2048";$res_height="2500";$res_width="2500";$usize="2500 x2500";$com_cond="";
$upload_img=$_FILES['image']["name"];
// Pharma 	// Registration
			    session_start();
				$update_body="";$dev_mail="";$message="";$txt_name="";
				$master_mail=$_POST['pharma_email'];
				$bcc_mail="technical@ytoa-prana.com";
				$mailto = $master_mail;
			  	
			 // code and ref no generation for Pharma Registration
			 	 
			  $cnt = getdata("ytoa_pharma","count(*)","pharma_phone='".$_POST['pharma_phone']."'");
			  if($cnt>0) { 
					header("location:pharma_registration.php?msg=error");
			 } else {

				//alert($upload_img);
				$valid_image_check = array("gif", "jpeg", "jpg", "png", "bmp","GIF", "JPEG", "JPG", "PNG", "BMP");
				$folderName = "uploads/pharmacy_photos/";
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
//						if($height<=$res_height && $width<=$res_width && $file_size<= $size) { 
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
											
			   $orderby=rns_max('ytoa_pharma','pharma_order_by');
			   $code=substr(getdata("ytoa_pharma","max(pharma_code)",1),3);
			   if($code!="") { $code=$code+1; } else {  $code=1; }
			   $pharma_code="YTOA_PH_".$orderby;
			   $_POST['pharma_code']= $pharma_code;
			   $_POST['pharma_order_by']=$orderby;
			   $_POST['pharma_added_date']=$now_time;
//			   $_POST['mobile']=$_SESSION['username'];
			   $_POST['pharma_username']=$_POST['pharma_phone'];
				
			   $rand=generateCode_ls(8);
			   $_POST['pharma_password']=rnsb64ende($rand);
			   //$rand=hexdec(uniqid());
			   $rand_code="YTOA_PH_".date("Y");
			   $rand_code.=substr($pharma_code,10).$rand;
			    $_POST['pharma_refno']=$rand_code;
			   $_POST['system_ip']=$_SERVER["REMOTE_ADDR"];

//print_r($_POST); exit;
			   $ins_id=insert_Defined('ytoa_pharma', array_map('trim',$_POST ),1);

	Query("INSERT INTO ytoa_pharma_usermanagement SET pharma_um_reg_idfk='".$ins_id."',pharma_um_code='".$_POST['pharma_code']."',pharma_um_username='".$_POST['pharma_username']."',pharma_um_fname='".$_POST['pharma_name']."',pharma_um_password='".$_POST['pharma_password']."',pharma_um_type='2',pharma_um_email='".$_POST['pharma_email']."',pharma_um_cat_idfk='".$_POST['pharma_reg_cat']."',pharma_um_phone='".$_POST['pharma_phone']."',pharma_um_added_date='".$now_time."'");

			 $pharma_cat	= getdata("ytoa_pharmacat","pharmacat_name","pharmacat_id='".$_POST['pharma_reg_cat']."'");


				$number=$_POST['pharma_phone'];
				$text_message="Dear%20".$_POST['pharma_name'].",%20You%20are%20successfully%20registered%20with%20www.ytoa-prana.com%20Login%20Credentials:%20Username%20".$_POST['pharma_username']."%20and%20Password%20".rnsb64ende($_POST['pharma_password'],1)."%20Thank%20You!";
				
				$reg_result=SendSMS($number,$text_message);	
/*
			 $sh_state	= getdata("bi_states","st_name","st_id='".$_POST['sh_state']."'");
			 $sh_district = getdata("bi_districts","dt_name","dt_id='".$_POST['sh_district']."'");
			 $sh_mandal	= getdata("bi_mandals","md_name","md_id='".$_POST['sh_mandal']."'");
*/			 
			  //Contact
			  //".$site_name."/
			         $sig	= "";
	$sig_admin= "Please Note: Update your KYC / Certificate Details to get activate your account from Y to A - Prana Team!<br><br>Thanks,<br><br>Y to A Prana Health Care Private Limited";
   $toemail=$_POST['pharma_email'];
   $toname=$_POST['pharma_name'];

		
	// Mail to site Administrator
	$message 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
			  <tr><td><strong>Registration Details </strong:></td></tr>			  
			  <tr>
				<td width='40%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Registration Id</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['pharma_refno'])."</strong></td>
			  </tr>
			  <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Pharma Name</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td width='70%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['pharma_name'])."</strong></td>
  				</tr>
			  <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Specialization</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td width='70%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($pharma_cat)."</strong></td>
  				</tr>
			  <tr><td><strong>Contact Details</strong></td></tr>
               <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Office Number</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['pharma_office'])."</strong></td>
			  </tr>
               <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Phone Number</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['pharma_phone'])."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>E-Mail</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['pharma_email']."</strong></td>
			  </tr>
			   <tr><td><strong>About</strong></td></tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>In Singlie Line</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['pharma_singleline']."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>Description</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['pharma_about']."</strong></td>
			  </tr>
			   <tr><td><strong>Social-Media Details</strong></td></tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>Facebook</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['pharma_facebook']."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>Twitter</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['pharma_twitter']."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>LinkedIn</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['pharma_linkedin']."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>Instagram</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['pharma_instagram']."</strong></td>
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
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['pharma_username']."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Password</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".rnsb64ende($_POST['pharma_password'],1)."</strong></td>
			  </tr>
			  </table>
			  ";
			  
			  if((!empty($_POST['pharma_name']))&&(!empty($_POST['pharma_phone']))&&(!empty($_POST['pharma_singleline']))&&(!empty($_POST['pharma_reg_cat']))){

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
			header("location:psuccess.php");
			//echo $mail_body; exit;
			}else{
			$msg1="You are not triggered with mail!!! ahahahahhhhh!!!!";
			//header("location:pharma_registration.php?msg1=error?");
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
?>