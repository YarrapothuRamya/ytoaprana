<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

//print_r($country_arr);
/*$cnt_apts = getdata("va_appointments","count(*)","DAY(vaap_added_date)='".date('d')."'");
$cnt_apts=$cnt_apts+1;
$rndno=rand(10, 99);
$todate=date('dm');
echo $todate.$rndno.$cnt_apts;exit;*/
if(!empty($_GET['start'])){ $start=$_GET['start']; }else{ $start=0; }$len = 50;$link = RNSFI."?";
$sub_qur="1"; 
$page_name = "Appointments";
//$page_name2 = "Projects";
$page_name3 = "Appointment";
$page_name4 = "Manage";

if(isset($_GET['reset']) || empty($_GET['search'])){  rns_ClearSession(); }
if($_SERVER['REQUEST_METHOD']=="POST"){ //print_r($_POST);exit;
   rns_ClearSession();
	if(!empty($_POST['search'])) { $_SESSION['ser_keyword']=$_POST['search'];}
	if(!empty($_POST['upi_type'])) { $_SESSION['ser_upi_type']=$_POST['upi_type'];}
	if(!empty($_POST['paymentsts'])) { $_SESSION['ser_paysts']=$_POST['paymentsts'];}
	header("location:".RNSFI."?search=1");
	//header("location:".RNSFI."?t=".$_GET['t']."&search=1");	
}

if(isset($_SESSION['ser_keyword'])){ $sub_qur.=" and (vaap_name like '%".$_SESSION['ser_keyword']."%' or vaap_service like '%".$_SESSION['ser_keyword']."%' or vaap_email like '%".$_SESSION['ser_keyword']."%' or vaap_phone like '%".$_SESSION['ser_keyword']."%' or vaap_tid like '%".$_SESSION['ser_keyword']."%' or vaap_appt_no like '%".$_SESSION['ser_keyword']."%')"; }
if(isset($_SESSION['ser_upi_type'])){  $sub_qur.=" and vaap_ptype_id=".$_SESSION['ser_upi_type']; }
if(isset($_SESSION['ser_paysts'])){  $sub_qur.=" and vaap_pstatus=".$_SESSION['ser_paysts']; }
if(!empty($_GET['status'])) { $status_id=$_GET['status']; $sub_qur.=" and vaap_status=".$_GET['status']; } else { $status_id=""; }

include(RNSTM);
?>
<script type="text/javascript">
$(".preview_rns").colorbox();
$(document).ready( function() {
	$('#sta_chk').on('change', function(){		
		var val1 = $('#desig_list option:selected').val();
		var val = $('#sta_chk option:selected').val();
		if(val1!="") {	var dataString ='&status='+ val; } else { var dataString = 'status='+ val; }
		window.location = "projects.php?"+dataString;
	});
	
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