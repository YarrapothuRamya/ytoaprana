<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

if(!empty($_GET['start'])){ $start=$_GET['start']; }else{ $start=0; }$len = 50;$link = RNSFI."?";
$sub_qur="1";

$page_name = "Registrations";
$page_name2 = "Doctor Registration";
$page_name3 = "";
$page_name4 = "";

//
if(!empty($_GET['export']) && $_GET['export']=='true'){
	$sql_query="select  R.doc_refno,R.doc_name,R.doc_email,R.doc_office,R.doc_phone from ytoa_doctor as R"; 
	$resultset=Query($sql_query);	
	
		$records_ls = array();
		while( $rows = Fetch($resultset) ) {
		  $records_ls[] = $rows;
		}
		$col_ls=array('Reference No','Doctor Name','E-Mail','Office No','Mobile No');
		$filename = "Doctor-Registrations.xls";
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
//


if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(!empty($_POST['search'])) { $_SESSION['ser_keyword']=$_POST['search'];}
	header("location:doctor_registration.php?search=1");
}

if(isset($_SESSION['ser_keyword'])){ $sub_qur.=" and (doc_name like '%".$_SESSION['ser_keyword']."%' 
	or doc_refno like '%".$_SESSION['ser_keyword']."%' or doc_email like '%".$_SESSION['ser_keyword']."%' or doc_office like '%".$_SESSION['ser_keyword']."%' or doc_phone like '%".$_SESSION['ser_keyword']."%')"; }

if(!empty($_GET['status'])) { $status_id=$_GET['status']; $sub_qur.=" and doc_status=".$_GET['status']; } else { $status_id=""; }
include(RNSTM);
?>
<script type="text/javascript">
$(document).ready( function() {
	$(".ajax,.preview_rns").colorbox();

	$(".dob").datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'dd-mm-yy',
      yearRange: '2014:'+((new Date).getFullYear()+1)     //yearRange: '1950:'+((new Date).getFullYear()-18)    
    });
	
	
	return $("body").on("click", ".rec_status",function(){
		var currentId = $(this).attr('id');
    	//var val1 = $('#course_type_id_fk option:selected').val();
		var st_val = currentId.split(',');
		var con=confirm("Do you want to "+st_val[2]+" this Record");
		if(con==true) {
			var dataString = 'doc_status=status&id='+ st_val[0] +'&cs='+ st_val[1] +'&t='+ st_val[3]+'&p='+ st_val[4];
			$.ajax({
				type: "POST",
				url: "ajax_mail.php",
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