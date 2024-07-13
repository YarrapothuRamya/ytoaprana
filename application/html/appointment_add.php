<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");
require_once('../includes/php-image-magician/php_image_magician.php');

if(!empty($_GET['start'])){ $start=$_GET['start']; }else{ $start=0; }$len = 50;$link = RNSFI."?";
$gender="";
$cond='';
$page_name = "Appointments";
$page_name2 = "";
$page_name3 = "Appointment";
$page_name4 = "Add";

if($_SERVER['REQUEST_METHOD']=="POST"){

	if(!empty($_GET['id'])){ $cond.=" and vaap_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("va_appointments","count(*)","vaap_appt_no='".$_POST['vaap_appt_no']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Appointment Id already Existed..';
	}else{		
		    $_POST['vaap_dob']= yyyy_mm_dd($_POST['vaap_dob']);
			if(!empty($_GET['id'])){
				$_POST['vaap_updated_by']= $ERP_Uid;
				update_Defined('va_appointments', array_map('trim',$_POST),"vaap_id='".$getid."'");
				$msg="up";
			}else{		
				$cnt_apts = getdata("va_appointments","count(*)","DAY(vaap_added_date)='".date('d')."'");
				$cnt_apts=$cnt_apts+1;
				$rndno=rand(10, 99);
				$todate=date('dm');
				$apt_no=$todate.$rndno.$cnt_apts;
				$orderby=rns_max('va_appointments','vaap_added_by');
				$_POST['vaap_added_by']= $orderby;	
				$_POST['vaap_appt_no']= $apt_no;
				$_POST['vaap_added_by']= $ERP_Uid;
				$_POST['vaap_added_date']= $now_time;
				$_POST['vaap_updated_date']= $now_time;
				insert_Defined('va_appointments', array_map('trim',$_POST));			
				$msg="ad";
			}
			header("location:appointments?msg=".$msg."");		
	}	


}

if(!empty($_GET['id'])){	
	$qur_edit =Query("select * from va_appointments where vaap_id=".$_GET['id']);
	$row = Fetch($qur_edit);
   $gender = $row["vaap_gender"];

}

include(RNSTM);
?>
<script type="text/javascript">
$(document).ready(function() {
$(".dob").datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'dd-mm-yy',
      yearRange: '1950:'+((new Date).getFullYear())     //yearRange: '1950:'+((new Date).getFullYear()-18)    
    });	
	$("#vaap_phone").keypress(function (e) { 
		if (e.which != 8 && e.which != 0 && e.which != 41 && e.which != 40 && (e.which < 43 || e.which > 57)) {
			//display error message
			$("#mob").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	});	
});
</script>

