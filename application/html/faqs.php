<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");
include_once("../includes/class.phpmailer.php");

$cond='';
$page_name = "FAQ";
$page_name2 = "";
$page_name3 = "FAQS";
$page_name4 =  ucword($pg);

if(!empty($_GET['export']) && $_GET['export']=='true'){

$sql_query="select  C.fcat_name,S.fsubc_name,F.faq_qus,F.faq_ans,F.faq_added_date,V.emp_fname from ytoa_faq as F 
			left join va_employees as V on F.faq_added_by=V.emp_id 
			left join ytoa_fcategories as C on F.faq_catid=C.fcat_id 
			left join ytoa_fsub_category as S on F.faq_subid=S.fsubc_id 
			order by C.fcat_name,S.fsubc_name,F.faq_qus ";

 $resultset=Query($sql_query);	
	
		$records_ls = array();
		while( $rows = Fetch($resultset) ) {
			
		  $records_ls[] = $rows;
		}
		$col_ls=array('FAQ Categories Name','FAQ Sub-categories Name','FAQ Questions','FAQ Answers','Added On','Added By');
		$filename = "FAQS".$now_time.".xls";
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
	if(!empty($_GET['id'])){ $cond.=" and faq_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("ytoa_faq","count(*)","faq_qus='".$_POST['faq_qus']."' and faq_catid='".$_POST['faq_catid']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'FAQ Question for this Category already Existed..';
	}else{		
		
		if(!empty($_GET['id'])){
			$_POST['faq_updated_by']= $ERP_Uid;
			$_POST['faq_updated_date']= $now_time;
			$updated_by_name	= getdata("va_employees","emp_fname","emp_id='".$ERP_Uid."'");
			
			update_Defined('ytoa_faq', array_map('trim',$_POST),"faq_id='".$getid."'");
			$category=getdata("ytoa_fcategories","fcat_name","fcat_id='".$_POST['faq_catid']."'");
			$subcategory=getdata("ytoa_fsub_category","fsubc_name","fsubc_id='".$_POST['faq_subid']."'");

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
							 <td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'><strong>FAQ Updated successfully.</strong></td>
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
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'>FAQ Sub-Category  Name :<strong> ".ucfirst($subcategory)."</strong></td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
						   <tr>
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'>FAQ Question: <strong>".ucfirst($_POST['faq_qus'])."</strong></td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
						   <tr>
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'>FAQ Answer : <strong>".ucfirst($_POST['faq_ans'])."</strong></td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
						   <tr>
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'><img src='../images/by.jpg' width='10%'>Updated By : <strong>".ucfirst($updated_by_name)."</strong></td>
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
				 $mail_user->Subject	= "Y to A - Pranan HSPL FAQ Added Successfully";
				 $mail_user->Body		= stripslashes($mail_body_user);
				 $mail_user->Send();
				 //echo $mail_body_user; exit;



			$msg="up";
		}else{		
			
			$orderby=rns_max('ytoa_faq','faq_orderby');
			$_POST['faq_orderby']= $orderby;
			$_POST['faq_added_by']= $ERP_Uid;
			$_POST['faq_added_date']= $now_time;
			insert_Defined('ytoa_faq', array_map('trim',$_POST));
			$category	= getdata("ytoa_fcategories","fcat_name","fcat_id='".$_POST['faq_catid']."'");
			$subcategory	= getdata("ytoa_fsub_category","fsubc_name","fsubc_id='".$_POST['faq_subid']."'");
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
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'><strong> New FAQ Added successfully.</strong></td>
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
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'>FAQ Sub-Category  Name : <strong>".ucfirst($subcategory)."</strong></td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
						   <tr>
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'>FAQ Question: <strong>".ucfirst($_POST['faq_qus'])."</strong></td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
						   <tr>
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'>FAQ Answer :<strong>".ucfirst($_POST['faq_ans'])."</strong></td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
						   <tr>
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'><img src='../images/by.jpg' width='10%'>Added By : <strong>".ucfirst($updated_by_name)."</strong></td>
						   </tr>
						   <tr>
							 <td align='left'  class='textfont'></td>
						   </tr>
						  <tr>
							 <td align='left'  style='color:#f28b15; font-size:16px; font-family:century gothic'><img src='../images/dt.png' width='10%'>Added On :<strong> ".$now_time."</strong></td>
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
				 $mail_user->Subject	= "Y to A - Prana HSPL FAQ  Added Successfully.";
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
	header("location:faqs.php?search=1");
   }	
}
if(!empty($_GET['status'])) { $status_id=$_GET['status']; $sub_qur.=" and faq_status=".$_GET['status']; } else { $status_id=""; }
if(!empty($_GET['search'])) { 
     if(isset($_SESSION['ser_cat_id'])){ $sub_qur.=" and faq_catid =".$_SESSION['ser_cat_id']; }
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (faq_qus like '%".$_SESSION['ser_key']."%' or faq_status='active' like '%".$_SESSION['ser_key']."%' or fsubc_name like '%".$_SESSION['ser_key']."%' or fcat_name like '%".$_SESSION['ser_key']."%' or faq_ans like '%".$_SESSION['ser_key']."%')"; }
}
if(!empty($_GET['id'])){
	$qur = Query("select * from ytoa_faq where faq_id=".$_GET['id']);
	$row = Fetch($qur);	
	/*$c = $row["faq_catid"];
   $cat_qur= " and fsubc_catid='".$c."'";*/
}
if(!empty($_GET['status'])) { $status_id=$_GET['status']; $sub_qur.=" and faq_status=".$_GET['status']; } else { $status_id=""; }
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
		window.location = "faqs.php?"+dataString;
	});

	
	//$('.user_status').on('click', function(){
	return $("body").on("click", ".rec_status",function(){
		var currentId = $(this).attr('id');
    	//var val1 = $('#course_type_id_fk option:selected').val();
		var st_val = currentId.split(',');
		var con=confirm("Do you want to "+st_val[2]+" this Record");
		if(con==true) {
			var dataString = 'subact_faq=status&id='+ st_val[0] +'&cs='+ st_val[1] +'&t='+ st_val[3]+'&p='+ st_val[4];;
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
<script type="text/javascript">
$(".preview_rns").colorbox();
$(document).ready( function() {

	$('.sel_ls').on('change', function(){		
		var val = $(this).find('option:selected').val();
		var sel_id=this.id; 

		if(sel_id=="faq_catid") { 
			var dataString = 'fascat_id='+val+'&drop=fscat'; var result_ls="#faq_subid";
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
});
</script>

