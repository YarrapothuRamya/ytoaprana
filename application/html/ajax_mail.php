<?php
include '../includes/conn.php'; // include the library for database connection
include_once("../includes/class.phpmailer.php");
$dropdown = "";
session_start(); //print_r($_POST);exit;
// Status Change
if(!empty($_REQUEST['act']) && $_REQUEST['act']=='status'){ 
	$id=$_POST['id'];$t=$_POST['t'];$p=$_POST['p'];
	$upqur=Query("update $t set ".$p."status='".$_POST['cs']."' where ".$p."id='".$id."'");
	if($_POST['cs']==1){ $st_class='icn-link-green';$cs=2;$sm="Inactivate"; } else { $st_class='icn-link-red';$cs=1;$sm="Activate"; }
	$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;	
	echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
}



////
$dropdown = "";$sts_val = "";$sts_id="";
// Doctor Status Change
if(!empty($_REQUEST['doc_status']) && $_REQUEST['doc_status']=='status'){
	$id=$_POST['id'];$t=$_POST['t'];$p=$_POST['p'];
	$sts_val = get_data("ytoa_doctor","doc_status,doc_email,doc_name,doc_username,doc_password,doc_refno","doc_id='".$id."'");
	$sts_id=$sts_val['doc_status'];
	if($sts_id==0){ 
	
       $sig_admin	= "Thanks,<br>Y to A - Prana HSPL Team";
	   $toname = $sts_val['doc_name'];
	   $toemail	= $sts_val['doc_email'];
	   $doc_username	= $sts_val['doc_username'];
	   $doc_password	=rnsb64ende($sts_val['doc_password'],1);
	    $doc_refno = $sts_val['doc_refno'];
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'>Your Registration Details verified successfully.</td>
					  </tr>
					    <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'><strong> Name: </strong>".$toname."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><strong>User Name: </strong>".$doc_username."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'><strong>Password : </strong>".$doc_password."</td>
					  </tr>
					    <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					     <tr>
						<td align='left'  class='textfont'><strong>Refreance NO :</strong>".$doc_refno."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><a href='".BASEURLF."doctors_login/' target='_blank'>Click here</a> to login.</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					</table>
					";
			$mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
			$mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
			$mail_body_user=str_replace("disname",$toname,$mail_body_user);	
		   // echo $mail_body_user; exit;
			$mail_user = new PHPMailer();	
			$mail_user->IsMail();
			$mail_user->FromName = FROM_NAME;
			$mail_user->From 	= FROM_MAIL;
			$mail_user->AddAddress($toemail);
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "Doctor Registration Status from YtoA-Prana.com";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user;echo "<br>";echo $mail_body; exit;
		$up_arr['doc_status']=1;
		$up_arr['doc_updated_by']=$_SESSION['ERP_Uid'];
		$up_arr['doc_updated_date']=$now_time;
		update_Defined('ytoa_doctor', array_map('trim',$up_arr),"doc_id='".$id."'");
		$st_class='icn-link-green';$cs=2;$sm="Inactivate";
		$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;
	 echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
	 }else{
	$upqur=Query("update $t set ".$p."status='".$_POST['cs']."' where ".$p."id='".$id."'");
	if($_POST['cs']==1){ $st_class='icn-link-green';$cs=2;$sm="Inactivate"; } else { $st_class='icn-link-red';$cs=1;$sm="Activate"; }
	$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;	
	echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
	if($sts_id==1){ 
       $sig_admin	= "Thanks,<br>YtoA-Prana HSPL Team";
	   $toname = $sts_val['doc_name'];
	   $toemail	= $sts_val['doc_email'];
	   $doc_username	= $sts_val['doc_username'];
	   $doc_password	=rnsb64ende($sts_val['doc_password'],1);
	    $doc_refno = $sts_val['doc_refno'];
	   //$rand_link=$rand."-".$id;
	   	//Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'>Your Account Inactivated  successfully.</td>
					  </tr>
					    <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'><strong> Name: </strong>".$toname."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><strong>User Name: </strong>".$doc_username."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'><strong>Password : </strong>".$doc_password."</td>
					  </tr>
					    <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					     <tr>
						<td align='left'  class='textfont'><strong>Refreance NO :</strong>".$doc_refno."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><a href='".BASEURLF."doctors_login/' target='_blank'>Click here</a> to login.</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					</table>
					";
			$mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
			$mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
			$mail_body_user=str_replace("disname",$toname,$mail_body_user);	
		   // echo $mail_body_user; exit;
			$mail_user = new PHPMailer();	
			$mail_user->IsMail();
			$mail_user->FromName = FROM_NAME;
			$mail_user->From 	= FROM_MAIL;
			$mail_user->AddAddress($toemail);
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "Doctor Registration Status from YtoA-Prana.com";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user;echo "<br>";echo $mail_body; exit;
		$up_arr['doc_status']=2;
		$up_arr['doc_updated_by']=$_SESSION['ERP_Uid'];
		$up_arr['doc_updated_date']=$now_time;
		update_Defined('ytoa_doctor', array_map('trim',$up_arr),"doc_id='".$id."'");
		$st_class='icn-link-green';$cs=2;$sm="Inactivate";
		$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;
		}else{
		if($sts_id==2){ 
       $sig_admin	= "Thanks,<br>YtoA-Prana HSPL Team";
	   $toname = $sts_val['doc_name'];
	   $toemail	= $sts_val['doc_email'];
	   $doc_username	= $sts_val['doc_username'];
	   $doc_password	=rnsb64ende($sts_val['doc_password'],1);
	    $doc_refno = $sts_val['doc_refno'];
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'>Your Account Reactivated  successfully.</td>
					  </tr>
					    <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'><strong> Name: </strong>".$toname."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><strong>User Name: </strong>".$doc_username."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'><strong>Password : </strong>".$doc_password."</td>
					  </tr>
					    <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					     <tr>
						<td align='left'  class='textfont'><strong>Refreance NO :</strong>".$doc_refno."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><a href='".BASEURLF."doctors_login/' target='_blank'>Click here</a> to login.</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					</table>
					";
			$mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
			$mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
			$mail_body_user=str_replace("disname",$toname,$mail_body_user);	
		   // echo $mail_body_user; exit;
			$mail_user = new PHPMailer();	
			$mail_user->IsMail();
			$mail_user->FromName = FROM_NAME;
			$mail_user->From 	= FROM_MAIL;
			$mail_user->AddAddress($toemail);
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "Doctor Registration Status from YtoA-Prana.com";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user;echo "<br>";echo $mail_body; exit;
		$up_arr['doc_status']=1;
		$up_arr['doc_updated_by']=$_SESSION['ERP_Uid'];
		$up_arr['doc_updated_date']=$now_time;
		update_Defined('ytoa_doctor', array_map('trim',$up_arr),"doc_id='".$id."'");
		$st_class='icn-link-green';$cs=2;$sm="Inactivate";
		$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;
		}
     }
  }
}

