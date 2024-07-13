<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");
include_once("../includes/class.phpmailer.php");

$cond='';
$page_name = "Registrations";
$page_name2 = "";
$page_name3 = "Pharma Category";
$page_name4 =  ucword($pg);
if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }//unset($_SESSION['ser_dept'],$_SESSION['ser_key']); 
	
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty($_POST['search_btn'])) {
	if(!empty($_GET['id'])){ $cond.=" and pharmacat_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("ytoa_pharmacat","count(*)","pharmacat_name='".$_POST['pharmacat_name']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Name or Category Name already Existed..';
	}else{		
		
		if(!empty($_GET['id'])){
			$_POST['pharmacat_updated_by']= $ERP_Uid;
			$_POST['pharmacat_updated_date']= $now_time;

			$updated_by_name=getdata("va_employees","emp_fname","emp_id='".$ERP_Uid."'");

			update_Defined('ytoa_pharmacat', array_map('trim',$_POST),"pharmacat_id='".$getid."'");
			$msg="up";
			$pharmacat_name=$_POST['pharmacat_name'];
//  Mail
		$sig_admin	= "Thanks,<br>Y to A - Prana HSPL Team";
		$toname = "Sir/Madam";
		$toemail	= "technical@ytoa-prana.com";
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  
					  <tr>
						<td align='left'  class='textfont'><strong>Pharma Category Updated Successfully.</strong></td>
					  </tr>
					    <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'><strong>Pharma Category  Name : </strong>".$pharmacat_name."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><strong>Updated By : </strong>".$updated_by_name."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'><strong>Updated On : </strong>".$now_time."</td>
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
			$mail_user->AddAddress("ramyayarrapothu@outlook.com");
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "Y to A Prana HSPL - Pharma Category Updated Successfully";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user; exit;
			//echo $mail_body;exit;
			//header("location:categories.php?msg=");

			$msg="up";
			

		}else{		
			$orderby=rns_max('ytoa_pharmacat','pharmacat_orderby');
			$_POST['pharmacat_orderby']= $orderby;
			$_POST['pharmacat_added_by']= $ERP_Uid;
			$_POST['pharmacat_added_date']= $now_time;
			$Added_by_name	= getdata("va_employees","emp_fname","emp_id='".$ERP_Uid."'");

			insert_Defined('ytoa_pharmacat', array_map('trim',$_POST));		

			$sig_admin	= "Thanks,<br>Y to A Prana HSPL - Team";
	   $toname = "Sir/Madam";
	   $toemail	= "technical@ytoa-prana.com";
	  
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  
					  <tr>
						<td align='left'  class='textfont'><strong>Pharma Category Added successfully.</strong></td>
					  </tr>
					    <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'><strong>Pharma Category Name : </strong>".$_POST['pharmacat_name']."</td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'><strong>Category Description : </strong>".$_POST['pharmacat_desc']."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><strong>Added By : </strong>".$Added_by_name."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'><strong>Added On : </strong>".$now_time."</td>
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
			$mail_user->AddAddress("ramyayarrapothu@outlook.com");
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "Y to A - Prana HSPL - Pharma Category Added Successfully";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user; exit;
			
			$msg="ad";
		}
		header("location:".RNSFI.".php?msg=".$msg."");		
	}
} else {
	if(!empty($_POST['search'])) { $_SESSION['ser_key']=$_POST['search'];}
	header("location:pharmacategories.php?search=1");
   }	
}
if(!empty($_GET['search'])) { 
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (pharmacat_name like '%".$_SESSION['ser_key']."%')"; }
}
if(!empty($_GET['id'])){
	$qur = Query("select * from ytoa_pharmacat where pharmacat_id=".$_GET['id']);
	$row = Fetch($qur);	
}
include(RNSTM);
?>

<script type="text/javascript">
$(document).ready( function() {

	return $("body").on("click", ".rec_status",function(){
		var currentId = $(this).attr('id');
    	//var val1 = $('#course_type_id_fk option:selected').val();
		var st_val = currentId.split(',');
		var con=confirm("Do you want to "+st_val[2]+" this Record");
		if(con==true) {
			var dataString = 'act=status&id='+ st_val[0] +'&cs='+ st_val[1] +'&t='+ st_val[3]+'&p='+ st_val[4];;
			$.ajax({
				type: "POST",
				url: "ajax.php",
				data: dataString,
				cache: false,
				success: function(data){var div_name="#st_div_"+st_val[0];
					$(div_name).html(data);
				}
			});
		} else { return false; }
	});
});
</script>