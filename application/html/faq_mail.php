<?php
session_start();
include '../includes/conn.php'; // include the library for database connection
include_once("../includes/class.phpmailer.php");

//alert( $_SESSION['ERP_Uid']);
if(!empty($_REQUEST['caact_fcat']) && $_REQUEST['caact_fcat']=='status'){
	$id=$_POST['id'];$t=$_POST['t'];$p=$_POST['p'];
	$sts_val = get_data("ytoa_fcategories","fcat_status,fcat_name ","fcat_id='".$id."'");
	//$_SESSION['ERP_Uid']=;
	$changed_by_name	= getdata("va_employees","emp_fname","emp_id='".$_SESSION['ERP_Uid']."'");
	$sts_id=$sts_val['fcat_status'];
	if($sts_id==1){ 
        $up_arr['fcat_status']=2;
		$up_arr['fcat_updated_by']=$_SESSION['ERP_Uid'];
		$up_arr['fcat_updated_date']=$now_time;
		update_Defined('ytoa_fcategories', array_map('trim',$up_arr),"fcat_id='".$id."'");
		$st_class='icn-link-red';$cs=1;$sm="Activate";
		$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;
	echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';

		$sig_admin	= "Thanks,<br>Y to A - Prana Team";
	   $toname = "Sir/Madam";
	   $toemail	= "technical@ytoa-prana.com";
	  
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'><img src='../images/faq_header.jpeg' width='80%'></td>
					  </tr>					  
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><strong> '".$sts_val['fcat_name']."' Inactivated successfully.</strong></td>
					  </tr>
					    <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><img src='../images/by.jpg' width='10%'>Inactivated By : <strong>".$changed_by_name."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'><img src='../images/dt.png' width='10%'>Inactivated on : <strong>".$now_time."</strong></td>
					  </tr>
					 
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					</table>
					";
					
					//echo $mail_body; exit;
			$mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
			$mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
			$mail_body_user=str_replace("disname",$toname,$mail_body_user);	
			
			$mail_user = new PHPMailer();	
			$mail_user->IsMail();
			$mail_user->FromName = FROM_NAME;
			$mail_user->From 	= FROM_MAIL;
			$mail_user->AddAddress($toemail);
		    $mail_user->AddAddress("support@ytoa-prana.com");
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "Y to A - Prana FAQ Category Status Updated Successfully";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user;echo "<br>";echo $mail_body; exit;
			$msg="up";
	 }else{
	//$upqur=Query("update $t set ".$p."status='".$_POST['cs']."' where ".$p."id='".$id."'");
	if($_POST['cs']==1){ $st_class='icn-link-green';$cs=2;$sm="Inactivate"; } else { $st_class='icn-link-red';$cs=1;$sm="Activate"; }
	$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;	
	echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
	if($sts_id==2){
        $up_arr['fcat_status']=1;
		$up_arr['fcat_updated_by']=$_SESSION['ERP_Uid'];
		$up_arr['fcat_updated_date']=$now_time;
		update_Defined('ytoa_fcategories', array_map('trim',$up_arr),"fcat_id='".$id."'");
		$st_class='icn-link-green';$cs=2;$sm="Inactivate";
		$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;
	 
		$sig_admin	= "Thanks,<br>Y to A - Prana Team";       
	   $toname = "Sir/Madam";
	   $toemail	= "technical@ytoa-prana.com";
	  // $Inactivated_by_name	= get_data("va_employees","emp_fname","emp_id='".$up_arr['fcat_updated_by']."'");
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'><img src='../images/faq_header.jpeg' width='80%'></td>
					  </tr>					  
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  
					  <tr>
						<td align='left'  class='textfont'><strong>Reactivated successfully!</strong></td>
					  </tr>
					    <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'>Category  Name : <strong>".$sts_val['fcat_name']."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><img src='../images/by.jpg' width='10%'>Activated By : <strong>".$changed_by_name."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'>
						<img src='../images/dt.png' width='10%'>Activated on : <strong>".$now_time."</strong></td>
					  </tr>
					 
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					</table>
					";
			$mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
			$mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
			$mail_body_user=str_replace("disname",$toname,$mail_body_user);	
		   
			$mail_user = new PHPMailer();	
			$mail_user->IsMail();
			$mail_user->FromName = FROM_NAME;
			$mail_user->From 	= FROM_MAIL;
			$mail_user->AddAddress($toemail);
			$mail_user->AddAddress("support@ytoa-prana.com");
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "Y to A - Prana FAQ Category Status Updated Successfully";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user;echo "<br>";echo $mail_body; exit;
			$msg="up";
	 
	 }
	}
}

//FAQ sub-categories

if(!empty($_REQUEST['subact_fsub']) && $_REQUEST['subact_fsub']=='status'){
	$id=$_POST['id'];$t=$_POST['t'];$p=$_POST['p'];
	$sts_val = get_data("ytoa_fsub_category","fsubc_status,fsubc_name ,fsubc_catid","fsubc_id='".$id."'");
	$category	= getdata("ytoa_fcategories","fcat_name","fcat_id='".$sts_val['fsubc_catid']."'");
	//$_SESSION['ERP_Uid']=;
	$changed_by_name = getdata("va_employees","emp_fname","emp_id='".$_SESSION['ERP_Uid']."'");
	$sts_id=$sts_val['fsubc_status'];
	if($sts_id==1){ 


        $up_arr['fsubc_status']=2;
		$up_arr['fsubc_updated_by']=$_SESSION['ERP_Uid'];
		$up_arr['fsubc_updated_date']=$now_time;
		update_Defined('ytoa_fsub_category', array_map('trim',$up_arr),"fsubc_id='".$id."'");
		$st_class='icn-link-red';$cs=1;$sm="Activate";
		$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;
	echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
    
		$sig_admin	= "Thanks,<br>Y to A - Prana Team";
	   $toname = "Sir/Madam";
	   $toemail	= "technical@ytoa-prana.com";
	  
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'><img src='../images/faq_header.jpeg' width='80%'></td>
					  </tr>					  
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  
					  <tr>
						<td align='left'  class='textfont'><strong>FAQ Sub-Category Inactivated successfully.</strong></td>
					  </tr>
					    <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'>Category  Name : <strong>".$category."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'>Sub-Category  Name : <strong>".$sts_val['fsubc_name']."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><img src='../images/by.jpg' width='10%'>Inactivated By : <strong>".$changed_by_name."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'><img src='../images/dt.png' width='10%'>Inactivated on : <strong>".$now_time."</strong></td>
					  </tr>
					 
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					</table>
					";
					
					//echo $mail_body; exit;
			$mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
			$mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
			$mail_body_user=str_replace("disname",$toname,$mail_body_user);	
			
			$mail_user = new PHPMailer();	
			$mail_user->IsMail();
			$mail_user->FromName = FROM_NAME;
			$mail_user->From 	= FROM_MAIL;
			$mail_user->AddAddress($toemail);
			$mail_user->AddAddress("support@ytoa-prana.com");
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "Y to A - Prana FAQ Sub-Category Status Updated Successfully";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user;echo "<br>";echo $mail_body; exit;
			
	 }else{
	//$upqur=Query("update $t set ".$p."status='".$_POST['cs']."' where ".$p."id='".$id."'");
	if($_POST['cs']==1){ $st_class='icn-link-green';$cs=2;$sm="Inactivate"; } else { $st_class='icn-link-red';$cs=1;$sm="Activate"; }
	$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;	
	echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
	if($sts_id==2){
        $up_arr['fsubc_status']=1;
		$up_arr['fsubc_updated_by']=$_SESSION['ERP_Uid'];
		$up_arr['fsubc_updated_date']=$now_time;
		update_Defined('ytoa_fsub_category', array_map('trim',$up_arr),"fsubc_id='".$id."'");
		$st_class='icn-link-green';$cs=2;$sm="Inactivate";
		$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;
		$sig_admin	= "Thanks,<br>Y to A - Prana Team";       
	   $toname = "Sir/Madam";
	   $toemail	= "technical@ytoa-prana.com";
	  // $Inactivated_by_name	= get_data("va_employees","emp_fname","emp_id='".$up_arr['fcat_updated_by']."'");
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'><img src='../images/faq_header.jpeg' width='80%'></td>
					  </tr>					  
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  
					  <tr>
						<td align='left'  class='textfont'><strong>FAQ Sub-Category Reactivated successfully.</strong></td>
					  </tr>
					    <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'>Category  Name : <strong>".$category."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'>Sub-Category  Name : <strong>".$sts_val['fsubc_name']."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><img src='../images/by.jpg' width='10%'>Activated By : <strong>".$changed_by_name."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'><img src='../images/dt.png' width='10%'>Activated on : <strong>".$now_time."</strong></td>
					  </tr>
					 
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					</table>
					";
			$mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
			$mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
			$mail_body_user=str_replace("disname",$toname,$mail_body_user);	
		   
			$mail_user = new PHPMailer();	
			$mail_user->IsMail();
			$mail_user->FromName = FROM_NAME;
			$mail_user->From 	= FROM_MAIL;
			$mail_user->AddAddress($toemail);
			$mail_user->AddAddress("support@ytoa-prana.com");
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "Y to A - Prana FAQ Sub-Category Status Updated Successfully";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user;echo "<br>";echo $mail_body; exit;
			
	 
	 }
	}
}
//FAQs STATUS mail
if(!empty($_REQUEST['subact_faq']) && $_REQUEST['subact_faq']=='status'){
	$id=$_POST['id'];$t=$_POST['t'];$p=$_POST['p'];
	$sts_val = get_data("ytoa_faq","*","faq_id='".$id."'");
	$category	= getdata("ytoa_fcategories","fcat_name","fcat_id='".$sts_val['faq_catid']."'");
	$subcategory	= getdata("ytoa_fsub_category","fsubc_name","fsubc_id='".$sts_val['faq_subid']."'");
	//$_SESSION['ERP_Uid']=;
	$changed_by_name = getdata("va_employees","emp_fname","emp_id='".$_SESSION['ERP_Uid']."'");
	$sts_id=$sts_val['faq_status'];
	if($sts_id==1){ 


        $up_arr['faq_status']=2;
		$up_arr['faq_updated_by']=$_SESSION['ERP_Uid'];
		$up_arr['faq_updated_date']=$now_time;
		update_Defined('ytoa_faq', array_map('trim',$up_arr),"faq_id='".$id."'");
		$st_class='icn-link-red';$cs=1;$sm="Activate";
		$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;
	echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
    
		$sig_admin	= "Thanks,<br>Y to A - Prana Team";
	   $toname = "Sir/Madam";
	   $toemail	= "technical@ytoa-prana.com";
	  
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'><img src='../images/faq_header.jpeg' width='80%'></td>
					  </tr>					  
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><strong>FAQ Question & Answer Inactivated successfully.</strong></td>
					  </tr>
					    <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'>FAQ Category  Name : <strong>".$category."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'>FAQ Sub-Category  Name : <strong>".$subcategory."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'>FAQ Question : <strong>".$sts_val['faq_qus']."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'>FAQ Answer : <strong>".$sts_val['faq_ans']."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><img src='../images/by.jpg' width='10%'>Inactivated By : <strong>".$changed_by_name."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'><img src='../images/dt.png' width='10%'>Inactivated on : <strong>".$now_time."</strong></td>
					  </tr>
					 
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					</table>
					";
					
					//echo $mail_body; exit;
			$mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
			$mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
			$mail_body_user=str_replace("disname",$toname,$mail_body_user);	
			
			$mail_user = new PHPMailer();	
			$mail_user->IsMail();
			$mail_user->FromName = FROM_NAME;
			$mail_user->From 	= FROM_MAIL;
			$mail_user->AddAddress($toemail);
			$mail_user->AddAddress("support@ytoa-prana.com");
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "Y to A - Prana FAQ Question & Answer Status Updated Successfully";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user;echo "<br>";echo $mail_body; exit;
			
	 }else{
	//$upqur=Query("update $t set ".$p."status='".$_POST['cs']."' where ".$p."id='".$id."'");
	if($_POST['cs']==1){ $st_class='icn-link-green';$cs=2;$sm="Inactivate"; } else { $st_class='icn-link-red';$cs=1;$sm="Activate"; }
	$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;	
	echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
	if($sts_id==2){
        $up_arr['faq_status']=1;
		$up_arr['faq_updated_by']=$_SESSION['ERP_Uid'];
		$up_arr['faq_updated_date']=$now_time;
		update_Defined('ytoa_faq', array_map('trim',$up_arr),"faq_id='".$id."'");
		$st_class='icn-link-green';$cs=2;$sm="Inactivate";
		$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;
		$sig_admin	= "Thanks,<br>Y to A - Prana Team";       
	   $toname = "Sir/Madam";
	   $toemail	= "technical@ytoa-prana.com";
	  // $Inactivated_by_name	= get_data("va_employees","emp_fname","emp_id='".$up_arr['fcat_updated_by']."'");
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'><img src='../images/faq_header.jpeg' width='80%'></td>
					  </tr>					  
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  
					  <tr>
						<td align='left'  class='textfont'><strong>FAQ Question & Answer Reactivated successfully.</strong></td>
					  </tr>
					    <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'>FAQ Category  Name : <strong>".$category."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'>FAQ Sub-Category  Name : <strong>".$subcategory."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'>FAQ Question : <strong>".$sts_val['faq_qus']."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'>FAQ Answer : <strong>".$sts_val['faq_ans']."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><img src='../images/by.jpg' width='10%'>Activated By : <strong>".$changed_by_name."</strong></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'><img src='../images/dt.png' width='10%'>Activated on : <strong>".$now_time."</strong></td>
					  </tr>
					 
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					</table>
					";
			$mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
			$mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
			$mail_body_user=str_replace("disname",$toname,$mail_body_user);	
		   
			$mail_user = new PHPMailer();	
			$mail_user->IsMail();
			$mail_user->FromName = FROM_NAME;
			$mail_user->From 	= FROM_MAIL;
			$mail_user->AddAddress($toemail);
			$mail_user->AddAddress("support@ytoa-prana.com");
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "Y to A - Prana FAQ Question & Answer Status Updated Successfully";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user;echo "<br>";echo $mail_body; exit;
	 }
	}
}

