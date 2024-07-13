<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");
include_once("../includes/class.phpmailer.php");

$cond='';
$page_name = "FAQ";
$page_name2 = "";
$page_name3 = "FAQ Category";
$page_name4 =  ucword($pg);

if(!empty($_GET['export']) && $_GET['export']=='true'){

$sql_query="select S.fcat_name,S.fcat_added_date,V.emp_fname from ytoa_fcategories as S 
			left join va_employees as V on S.fcat_added_by=V.emp_id 
			order by S.fcat_name ASC";

 $resultset=Query($sql_query);	
	
		$records_ls = array();
		while( $rows = Fetch($resultset) ) {
			
		  $records_ls[] = $rows;
		}
		$col_ls=array('Categories Name','Added On','Added By');
		$filename = "FAQ Categories".$now_time.".xls";
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

//alert($_GET['id']);
if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }//unset($_SESSION['ser_dept'],$_SESSION['ser_key']); 
/*$title1="New faq_categories Added ";
$title2=" Categorie Updated ";
$thank="Thanks<br>Bairisons Team";
$site_name="Bairisons";*/
if($_SERVER['REQUEST_METHOD']=="POST"){
	
	if(empty($_POST['search_btn'])) {
		if(!empty($_GET['id'])){ $cond.=" and fcat_id<>'".$_GET['id']."' ";}
			$cnt_qur = getdata("ytoa_fcategories","count(*)","fcat_name='".$_POST['fcat_name']."'".$cond);
		if($cnt_qur>0){
			$errmsg = 'Name or Category Name already Existed..';
			
		}else{		
			if(!empty($_GET['id'])){
				$_POST['fcat_updated_by']= $ERP_Uid;
				$_POST['fcat_updated_date']= $now_time;
				$updated_by_name	= getdata("va_employees","emp_fname","emp_id='".$ERP_Uid."'");
			
				update_Defined('ytoa_fcategories', array_map('trim',$_POST),"fcat_id='".$getid."'");
				//alert($title2);
				$sig_admin	= "Thanks,<br>Y to A - Prana Team";
	   $toname = "Sir/Madam";
	   $toemail	= "support@ytoa-prana.com";
	  
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
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'><strong> FAQ Category Updated Successfully </strong></td>
					  </tr>
					    <tr>
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'></td>
					  </tr>
					   <tr>
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'>Category  Name : <strong>  ".ucfirst($_POST['fcat_name'])."</strong></td>
					  </tr>
					  <tr>
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'></td>
					  </tr>
					  <tr>
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'>
						<img src='../images/by.jpg' width='10%'>
						Updated By : <strong>".ucfirst($updated_by_name)."</strong></td>
					  </tr>
					  <tr>
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'></td>
					  </tr>
					 <tr>
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'><img src='../images/dt.png' width='10%'>
						Updated On: <strong>".$now_time."</strong></td>
					  </tr>
					 
					  <tr>
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'></td>
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
			$mail_user->AddAddress("technical@ytoa-prana.com");
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "Y to A - Prana FAQ Category Updated Successfully";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user; exit;
			//echo $mail_body;exit;
			header("location:faq_categories.php?msg=");

			$msg="up";
		}else{		
			$orderby=rns_max('ytoa_fcategories','fcat_orderby');
			$_POST['fcat_orderby']= $orderby;
			$_POST['fcat_added_by']= $ERP_Uid;
			$_POST['fcat_added_date']= $now_time;
			$Added_by_name	= getdata("va_employees","emp_fname","emp_id='".$ERP_Uid."'");
			insert_Defined('ytoa_fcategories', array_map('trim',$_POST));
			//alert('hello');
			$sig_admin	= "Thanks,<br>Y to A - Prana Team";
	   $toname = "Sir/Madam";
	   $toemail	= "support@ytoa-prana.com";
	  
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'><img src='../images/faq_header.jpeg' width='80%'></td>
					  </tr>
					  <tr>
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'></td>
					  </tr>
					  
					  <tr>
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'><strong> New FAQ Category Added successfully.</strong></td>
					  </tr>
					    <tr>
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'></td>
					  </tr>
					   <tr>
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'><strong>  Category  Name : </strong>".$_POST['fcat_name']."</td>
					  </tr>
					  <tr>
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'></td>
					  </tr>
					  <tr>
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'><img src='../images/by.jpg' width='10%'>
						<strong>Added By : </strong>".$Added_by_name."</td>
					  </tr>
					  <tr>
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'></td>
					  </tr>
					 <tr>
						<td align='left' style='color:#f28b16; font-size:16px; font-family:century gothic'>
						<img src='../images/dt.png' width='10%'>
						<strong>Added on : </strong>".$now_time."</td>
					  </tr>
					 
					  <tr>
						<td align='left' style='color:#f28b15; font-size:16px; font-family:century gothic'></td>
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
			$mail_user->AddAddress("technical@ytoa-prana.com");
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "Y to A - Prana FAQ Category Added Successfully";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user; exit;
		header("location:faq_categories.php?msg=");
		//header("location:index.php");

			$msg="ad";
		}
		header("location:".RNSFI.".php?msg=".$msg."");		
	}
} else {
	if(!empty($_POST['search'])) { $_SESSION['ser_key']=$_POST['search'];}
	header("location:faq_categories.php?search=1");
   }	
}
if(!empty($_GET['search'])) { 
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (fcat_name like '%".$_SESSION['ser_key']."%')"; }
}
if(!empty($_GET['id'])){
	$qur = Query("select * from ytoa_fcategories where fcat_id=".$_GET['id']);
	$row = Fetch($qur);	
}
if(!empty($_GET['status'])) { $status_id=$_GET['status']; $sub_qur.=" and fcat_status=".$_GET['status']; } else { $status_id=""; }
include(RNSTM);
?>

<script type="text/javascript">
$(".preview_rns").colorbox();
$(document).ready( function() {

	$('#sta_chk').on('change', function(){		
		var val1 = $('#desig_list option:selected').val();
		var val = $('#sta_chk option:selected').val();
		if(val1!="") {	var dataString ='&status='+ val; } else { var dataString = 'status='+ val; }
		window.location = "faq_categories.php?"+dataString;
	});
	


	return $("body").on("click", ".rec_status",function(){
		var currentId = $(this).attr('id');
    	//var val1 = $('#course_type_id_fk option:selected').val();
		var st_val = currentId.split(',');
		var con=confirm("Do you want to "+st_val[2]+" this Record");
		if(con==true) {
			var dataString = 'caact_fcat=status&id='+ st_val[0] +'&cs='+ st_val[1] +'&t='+ st_val[3]+'&p='+ st_val[4];;
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