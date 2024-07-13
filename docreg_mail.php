<?php
ob_start();

include("application/includes/conn.php");
require_once('application/includes/php-image-magician/php_image_magician.php');

//include("application/includes/class.phpmailer.php");

if($_SERVER['REQUEST_METHOD']=="POST") {   //print_r($_POST);exit;
$title="Doctor Registration Details";

$size="2048";$res_height="2500";$res_width="2500";$usize="2500 x2500";$com_cond="";
$upload_img=$_FILES['image']["name"];
//$upload_img=$_POST['image'];
//echo "hello"; exit;

// Doctors 	// Registration
			    session_start();
				$update_body="";$dev_mail="";$message="";$txt_name="";
				$master_mail=$_POST['doc_email'];
				$bcc_mail="technical@ytoa-prana.com";
				$mailto = $master_mail;
			  	
			 // code and ref no generation for Doctors Registration
			 	 
			  $cnt = getdata("ytoa_doctor","count(*)","doc_phone='".$_POST['doc_phone']."'");
			  if($cnt>0) { 
					header("location:doctor_registration.php?msg=error");
			 } else {


				//alert($upload_img);
				$valid_image_check = array("gif", "jpeg", "jpg", "png", "bmp","GIF", "JPEG", "JPG", "PNG", "BMP");
				$folderName = "uploads/doctor_photos/";
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

			   $orderby=rns_max('ytoa_doctor','doc_order_by');
			   $code=substr(getdata("ytoa_doctor","max(doc_code)",1),3);
			   if($code!="") { $code=$code+1; } else {  $code=1; }
			   $doc_code="YTOA_DOC_".$orderby;
			   $_POST['doc_code']= $doc_code;
			   $_POST['doc_order_by']=$orderby;
			   $_POST['doc_added_date']=$now_time;
//			   $_POST['mobile']=$_SESSION['username'];
			   $_POST['doc_username']=$_POST['doc_phone'];
				
			   $rand=generateCode_ls(8);
			   $_POST['doc_password']=rnsb64ende($rand);
			   //$rand=hexdec(uniqid());
			   $rand_code="YTOA_DOC_".date("Y");
			   $rand_code.=substr($doc_code,10).$rand;
			    $_POST['doc_refno']=$rand_code;
			   $_POST['system_ip']=$_SERVER["REMOTE_ADDR"];
			   
			   $ins_id=insert_Defined('ytoa_doctor', array_map('trim',$_POST ),1);

		if(!empty($_POST['doc_reg_subcat']))
		{
			    Query("INSERT INTO ytoa_doc_usermanagement SET doc_um_reg_idfk='".$ins_id."',doc_um_code='".$_POST['doc_code']."',doc_um_username='".$_POST['doc_username']."',doc_um_fname='".$_POST['doc_name']."',doc_um_lname='".$_POST['doc_lname']."',doc_um_password='".$_POST['doc_password']."',doc_um_type='2',doc_um_email='".$_POST['doc_email']."',doc_um_cat_idfk='".$_POST['doc_reg_cat']."',doc_um_sub_catidfk='".$_POST['doc_reg_subcat']."',doc_um_phone='".$_POST['doc_phone']."',doc_um_added_date='".$now_time."'");
			
				$doc_subcat = getdata("ytoa_regsub_cat","regsubc_name","regsubc_id='".$_POST['doc_reg_subcat']."'");
		}
		else
		{
			    Query("INSERT INTO ytoa_doc_usermanagement SET doc_um_reg_idfk='".$ins_id."',doc_um_code='".$_POST['doc_code']."',doc_um_username='".$_POST['doc_username']."',doc_um_fname='".$_POST['doc_name']."',doc_um_lname='".$_POST['doc_lname']."',doc_um_password='".$_POST['doc_password']."',doc_um_type='2',doc_um_email='".$_POST['doc_email']."',doc_um_cat_idfk='".$_POST['doc_reg_cat']."',doc_um_phone='".$_POST['doc_phone']."',doc_um_added_date='".$now_time."'");

				$doc_subcat = 0;

		}
			 $doc_cat	= getdata("ytoa_regcat","regcat_name","regcat_id='".$_POST['doc_reg_cat']."'");
			 

				$number=$_POST['doc_phone'];
				$text_message="Dear%20".$_POST['doc_name'].",%20You%20are%20successfully%20registered%20with%20www.ytoa-prana.com%20Login%20Credentials:%20Username%20".$_POST['doc_username']."%20and%20Password%20".rnsb64ende($_POST['doc_password'],1)."%20Thank%20You!";
				
				$reg_result=SendSMS($number,$text_message);	
	
			         $sig	= "";
	$sig_admin= "Please Note: Update your KYC / Certificate Details to get activate your account from Y to A - Prana Team!<br><br>Thanks,<br><br>Y to A Prana Health Care Private Limited";
   $toemail=$_POST['doc_email'];
   $toname=$_POST['doc_name'];
  // $bcc_mail=""
  $message	= "New ".ucfirst($doc_cat." - ".$doc_subcat)." Registration Details From ytoa-prana.com";
	// Mail to site Administrator
	$mail_tag 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
			  <tr><td><strong>Registration Details </strong:></td></tr>			  
			  <tr>
				<td width='40%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Registration Id</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['doc_refno'])."</strong></td>
			  </tr>
			  <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Doctor Name</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td width='70%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['doc_name'])."</strong></td>
  				</tr>
			  <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Specialization</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td width='70%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($doc_cat." - ".$doc_subcat)."</strong></td>
  				</tr>
			  <tr><td><strong>Contact Details</strong></td></tr>
               <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Office Number</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['doc_office'])."</strong></td>
			  </tr>
               <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Phone Number</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".ucfirst($_POST['doc_phone'])."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>E-Mail</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['doc_email']."</strong></td>
			  </tr>
			   <tr><td><strong>About</strong></td></tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>In Singlie Line</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['doc_singleline']."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>Description</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['doc_about']."</strong></td>
			  </tr>
			   <tr><td><strong>Social-Media Details</strong></td></tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>Facebook</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['doc_facebook']."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>Twitter</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['doc_twitter']."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>LinkedIn</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['doc_linkedin']."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'>Instagram</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['doc_instagram']."</strong></td>
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
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".$_POST['doc_username']."</strong></td>
			  </tr>
              <tr>
				<td width='31%' align='left'  style='color:#f28b15; font-size:13px; font-family:century gothic'>Password</td>
				<td width='4%' align='center'><strong>:</strong></td>
				<td align='left' style='color:#f28b15; font-size:13px; font-family:century gothic'><strong>".rnsb64ende($_POST['doc_password'],1)."</strong></td>
			  </tr>
			  </table>
			  ";
			  $flag=0;
				if($doc_subcat==0)
				{
				if((!empty($_POST['doc_name']))&&(!empty($_POST['doc_phone']))&&(!empty($_POST['doc_singleline']))&&(!empty($_POST['doc_reg_cat'])))
					$flag=1;
				}
				else
				{
				if((!empty($_POST['doc_name']))&&(!empty($_POST['doc_phone']))&&(!empty($_POST['doc_singleline']))&&(!empty($_POST['doc_reg_cat']))&&(!empty($_POST['doc_reg_subcat'])))
					$flag=1;
				}
				
			if($flag==1){
				$mail_body=str_replace("{bodycontent}",$mail_tag,$mail_template);
			//	$mail_body=str_replace("{login_credential}",$login_details,$mail_body);
				$mail_body=str_replace("{sig}",$sig_admin,$mail_body);
				$mail_body=str_replace("disname",ucfirst($toname),$mail_body);	
				//echo $mail_body; exit;
				$mailheader = 'MIME-Version: 1.0' . "\r\n";
				$mailheader.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				//$mailheader.="From: ".$txt_name." <".$master_mail.">\r\n";
				$mailheader.="From: ".$_POST['doc_name']." <support@ytoa-prana.com>\r\n";
				$mailheader.="Reply-To: technical@ytoa-prana.com \r\n";
				if(!empty($bcc_mail)) { $mailheader.= 'Bcc: '.$bcc_mail."\r\n"; }
				mail($mailto,$message,$mail_body,$mailheader, '-f technical@ytoa-prana.com');
				//echo $mail_body; exit;
				
				

			header("location:success.php");
			//
			}else{
			$msg1="You are not triggered with mail!!! ahahahahhhhh!!!!";
			//header("location:doctor_registration.php?msg1=error?");
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