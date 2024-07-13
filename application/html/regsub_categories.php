<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");
include_once("../includes/class.phpmailer.php");

$cond='';
$page_name = "Registrations";
$page_name2 = "";
$page_name3 = "Reg Sub-Category";
$page_name4 =  ucword($pg);
if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }//unset($_SESSION['ser_dept'],$_SESSION['ser_key']); 
	
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty($_POST['search_btn'])) {
	if(!empty($_GET['id'])){ $cond.=" and regsubc_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("ytoa_regsub_cat","count(*)","regsubc_name='".$_POST['regsubc_name']."' and regsubc_catid='".$_POST['regsubc_catid']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Name or Registration Sub-Category Name for this Category already Existed..';
	}else{		
		
		if(!empty($_GET['id'])){
			$_POST['regsubc_updated_by']= $ERP_Uid;
			$_POST['regsubc_updated_date']= $now_time;
			$updated_by_name=getdata("va_employees","emp_fname","emp_id='".$ERP_Uid."'");

			update_Defined('ytoa_regsub_cat', array_map('trim',$_POST),"regsubc_id='".$getid."'");

			$category	= getdata("ytoa_regcat","regcat_name","regcat_id='".$_POST['regsubc_catid']."'");



			$sig_admin	= "Thanks,<br>Y to A - Prana Team";
			$toname = "Sir / Madam";
			$toemail	= "technical@ytoa-prana.com";
		   
			//$rand_link=$rand."-".$id;
				// Mail to User
			 $message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
						   
						   <tr>
							 <td align='left'  class='textfont'><strong>Registration Sub-Category Updated successfully.</strong></td>
						   </tr>
							 <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
							<tr>
							 <td align='left'  class='textfont'><strong>  Category  Name : </strong>".$category."</td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
							<tr>
							 <td align='left'  class='textfont'><strong> Subcategory  Name : </strong>".$_POST['regsubc_name']."</td>
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
				 $mail_user->AddBCC("ramyayarrapothu@outlook.com");
				 $mail_user->AddAddress(FROM_MAIL);
				 $mail_user->AddBCC(DEV_MAIL,FROM_NAME);
				 $mail_user->IsHTML(true);
				 $mail_user->Subject	= "Y to A - Prana - Registration Sub-Category Added Successfully";
				 $mail_user->Body		= stripslashes($mail_body_user);
				 $mail_user->Send();
				 //echo $mail_body_user; exit;

			$msg="up";
		}else{		
			
			$orderby=rns_max('ytoa_regsub_cat','regsubc_orderby');
			$_POST['regsubc_orderby']= $orderby;
			$_POST['regsubc_added_by']= $ERP_Uid;
			$_POST['regsubc_added_date']= $now_time;
			insert_Defined('ytoa_regsub_cat', array_map('trim',$_POST));			

			$category	= getdata("ytoa_regcat","regcat_name","regcat_id='".$_POST['regsubc_catid']."'");
			$updated_by_name	= getdata("va_employees","emp_fname","emp_id='".$ERP_Uid."'");


			$sig_admin	= "Thanks,<br>Y to A - Prana Team";
			$toname = "Sir / Madam";
			$toemail	= "technical@ytoa-prana.com";
		   
			//$rand_link=$rand."-".$id;
				// Mail to User
			 $message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
						   
						   <tr>
							 <td align='left'  class='textfont'><strong>New Registration Sub-Category Added successfully.</strong></td>
						   </tr>
							 <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
							<tr>
							 <td align='left'  class='textfont'><strong>  Category  Name : </strong>".$category."</td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
							<tr>
							 <td align='left'  class='textfont'><strong> Sub-Category  Name : </strong>".$_POST['regsubc_name']."</td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'><strong>Added By : </strong>".$updated_by_name."</td>
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
				 $mail_user->AddBCC("ramyayarrapothu@outlook.com");
				 $mail_user->AddAddress(FROM_MAIL);
				 $mail_user->AddBCC(DEV_MAIL,FROM_NAME);
				 $mail_user->IsHTML(true);
				 $mail_user->Subject	= "Y to A - Prana - Registration Sub-Category Added Successfully.";
				 $mail_user->Body		= stripslashes($mail_body_user);
				 $mail_user->Send();
				 //echo $mail_body_user; exit;

				$msg="ad";
		}
		header("location:".RNSFI.".php?msg=".$msg."");		
	}
} else {
	//if(!empty($_POST['search'])) { echo "aaaaa";exit;
	
	$_SESSION['ser_key']=$_POST['search'];
	if(!empty($_POST['cat_id'])) { $_SESSION['ser_cat_id']=$_POST['cat_id']; }
	//}
	header("location:regsub_categories.php?search=1");
   }	
}
if(!empty($_GET['search'])) { 
     if(isset($_SESSION['ser_cat_id'])){ $sub_qur.=" and regsubc_catid =".$_SESSION['ser_cat_id']; }
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (regsubc_name like '%".$_SESSION['ser_key']."%')"; }
}
if(!empty($_GET['id'])){
	$qur = Query("select * from ytoa_regsub_cat where regsubc_id=".$_GET['id']);
	$row = Fetch($qur);	
}
include(RNSTM);
?>

<script type="text/javascript">
$(".preview_rns").colorbox();
$(document).ready( function() {

	
	//$('.user_status').on('click', function(){
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

