<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");
include_once("../includes/class.phpmailer.php");

$cond='';
$page_name = "FAQ";
$page_name2 = "";
$page_name3 = "FAQ Sub-Category";
$page_name4 =  ucword($pg);

if(!empty($_GET['export']) && $_GET['export']=='true'){

$sql_query="select  C.fcat_name,S.fsubc_name,S.fsubc_added_date,V.emp_fname from ytoa_fsub_category as S 
			left join va_employees as V on S.fsubc_added_by=V.emp_id 
			left join ytoa_pcategory as C on S.fsubc_catid=C.fcat_id 
			order by C.fcat_name,S.fsubc_name ASC";

 $resultset=Query($sql_query);	
	
		$records_ls = array();
		while( $rows = Fetch($resultset) ) {
			
		  $records_ls[] = $rows;
		}
		$col_ls=array('FAQ Categories Name','FAQ Sub-categories Name','Added On','Added By');
		$filename = "FAQ Sub-categories".$now_time.".xls";
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		$show_coloumn = false;
		if(!empty($records_ls)) {
		foreach($records_ls as $record) {
		if(!$show_coloumn) {
			echo implode("\t", array_values($col_ls)) . "\n";
			$show_coloumn = true;
		 }
		 echo implode("\t", array_values($record)) . "\n";
		}
	  }
		exit;
	 }	




if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }//unset($_SESSION['ser_dept'],$_SESSION['ser_key']); 
	
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty($_POST['search_btn'])) {
	if(!empty($_GET['id'])){ $cond.=" and fsubc_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("ytoa_fsub_category","count(*)","fsubc_name='".$_POST['fsubc_name']."' and fsubc_catid='".$_POST['fsubc_catid']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Name or  Sub-Category Name for this Category already Existed..';
	}else{		
		
		if(!empty($_GET['id'])){
			$_POST['fsubc_updated_by']= $ERP_Uid;
			$_POST['fsubc_updated_date']= $now_time;
			$updated_by_name	= getdata("va_employees","emp_fname","emp_id='".$ERP_Uid."'");
			
			update_Defined('ytoa_fsub_category', array_map('trim',$_POST),"fsubc_id='".$getid."'");
			$category	= getdata("ytoa_fcategories","fcat_name","fcat_id='".$_POST['fsubc_catid']."'");


			$sig_admin	= "Thanks,<br>Y to A - Prana HSPL Team";
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
							 <td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'><strong>New FAQ Sub-Category Updated Successfully.</strong></td>
						   </tr>
							 <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
							<tr>
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'>FAQ Category  Name : <strong>".ucfirst($category)."</strong></td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
							<tr>
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'>FAQ Sub-Category Name : <strong>".ucfirst($_POST['fsubc_name'])."</td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
						   <tr>
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'><img src='../images/by.jpg' width='10%'>Updated By : <strong>".$updated_by_name."</strong></td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
						  <tr>
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'><img src='../images/dt.png' width='10%'>Updated On : <strong>".$now_time."</strong></td>
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
				 $mail_user->Subject	= "Y to A - Prana FAQ Sub-Category Added Successfully";
				 $mail_user->Body		= stripslashes($mail_body_user);
				 $mail_user->Send();
				 //echo $mail_body_user; exit;



			$msg="up";
		}else{		
			
			$orderby=rns_max('ytoa_fsub_category','fsubc_orderby');
			$_POST['fsubc_orderby']= $orderby;
			$_POST['fsubc_added_by']= $ERP_Uid;
			$_POST['fsubc_added_date']= $now_time;
			insert_Defined('ytoa_fsub_category', array_map('trim',$_POST));
			$category	= getdata("ytoa_fcategories","fcat_name","fcat_id='".$_POST['fsubc_catid']."'");
			$updated_by_name	= getdata("va_employees","emp_fname","emp_id='".$ERP_Uid."'");


			$sig_admin	= "Thanks,<br>Y to A - Prana HSPL Team";
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
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'><strong>FAQ Sub-Category Added successfully.</strong></td>
						   </tr>
							 <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
							<tr>
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'>FAQ Category  Name :<strong>".ucfirst($category)."</strong></td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
							<tr>
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'>FAQ Sub-Category  Name :<strong>".$_POST['fsubc_name']." </strong></td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
						   <tr>
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'><img src='../images/by.jpg' width='10%'>Added By : <strong>".$updated_by_name."</strong></td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
						  <tr>
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'><img src='../images/dt.png' width='10%'>Added On :<strong>".$now_time."</strong></td>
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
				 $mail_user->Subject	= "Y to A - Prana FAQ Sub-Category Added Successfully.";
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
	if(!empty($_POST['fat_id'])) { $_SESSION['ser_cat_id']=$_POST['fat_id']; }
	//}
	header("location:faq_sub_categories.php?search=1");
   }	
}
if(!empty($_GET['status'])) { $status_id=$_GET['status']; $sub_qur.=" and fsubc_status=".$_GET['status']; } else { $status_id=""; }
if(!empty($_GET['search'])) { 
     //if(isset($_SESSION['ser_cat_id'])){ $sub_qur.=" and fsubc_catid =".$_SESSION['ser_cat_id']; }
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (fsubc_name like '%".$_SESSION['ser_key']."%' or fsubc_status='active' like '%".$_SESSION['ser_key']."%')"; }
	//if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (fsubc_status='active' like '%".$_SESSION['ser_key']."%')"; } else { $sub_qur.=" and (fsubc_status='inactive' like '%".$_SESSION['ser_key']."%')"; }
}
if(!empty($_GET['search'])) {
	if(isset($_SESSION['ser_cat_id'])){ $sub_qur.=" and fsubc_catid =".$_SESSION['ser_cat_id']; }
}
if(!empty($_GET['id'])){
	$qur = Query("select * from ytoa_fsub_category where fsubc_id=".$_GET['id']);
	$row = Fetch($qur);	
}
include(RNSTM);
?>
<script type="text/javascript">
/*$(document).ready( function() {
	$(".rnspop").colorbox();
	
	$('.sel_ls').on('change', function(){		
		var val = $(this).find('option:selected').val();
		var sel_id=this.id;

		if(sel_id=="dt_id") {
			var dataString = 'dt_id='+val+'&drop=st'; var result_ls="#proj_loc_id";
		} else if(rnsid=="proj_type") {
			var dataString = 'type_id='+val+'&drop=subtype'; var result_ls="#proj_subtype";
		}

		$.ajax({
			type: "POST", url: "ajax.php", data: dataString, cache: false,
			success: function(data){
				$(result_ls).html(data);
			}
		});
	});
});*/
</script>
<script type="text/javascript">
$(".preview_rns").colorbox();
$(document).ready( function() {
	$('#sta_chk').on('change', function(){		
		var val1 = $('#desig_list option:selected').val();
		var val = $('#sta_chk option:selected').val();
		if(val1!="") {	var dataString ='&status='+ val; } else { var dataString = 'status='+ val; }
		window.location = "faq_sub_categories.php?"+dataString;
	});

	
	//$('.user_status').on('click', function(){
	return $("body").on("click", ".rec_status",function(){
		var currentId = $(this).attr('id');
    	//var val1 = $('#course_type_id_fk option:selected').val();
		var st_val = currentId.split(',');
		var con=confirm("Do you want to "+st_val[2]+" this Record");
		if(con==true) {
			var dataString = 'subact_fsub=status&id='+ st_val[0] +'&cs='+ st_val[1] +'&t='+ st_val[3]+'&p='+ st_val[4];;
			$.ajax({
				type: "POST",
				url: "faq_mail.php",
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

