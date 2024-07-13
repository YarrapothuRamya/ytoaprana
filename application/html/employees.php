<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

if(!empty($_GET['start'])){ $start=$_GET['start']; }else{ $start=0; }$len = 50;$link = RNSFI."?";
$sub_qur="emp_delete=0";
$page_name = "User Management";
//$page_name2 = "Employees";
$page_name3 = "User";
$page_name4 = "Manage";

if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(!empty($_POST['search'])) { $_SESSION['ser_keyword']=$_POST['search'];}
	header("location:".RNSFI."?search=1");
}

if(isset($_SESSION['ser_keyword'])){ $sub_qur.=" and (emp_fname like '%".$_SESSION['ser_keyword']."%' or emp_lname like '%".$_SESSION['ser_keyword']."%' or emp_email like '%".$_SESSION['ser_keyword']."%' or emp_phone like '%".$_SESSION['ser_keyword']."%')"; }

if(!empty($_GET['status'])) { $status_id=$_GET['status']; $sub_qur.=" and emp_status=".$_GET['status']; } else { $status_id=""; }
include(RNSTM);
?>
<script type="text/javascript">
$(".preview_rns").colorbox();
$(document).ready( function() {
	$('#sta_chk').on('change', function(){		
		var val1 = $('#desig_list option:selected').val();
		var val = $('#sta_chk option:selected').val();
		if(val1!="") {	var dataString ='&status='+ val; } else { var dataString = 'status='+ val; }
		window.location = "employees.php?"+dataString;
	});
	
	//$('.user_status').on('click', function(){
	return $("body").on("click", ".rec_status",function(){
		var currentId = $(this).attr('id');
    	//var val1 = $('#course_type_id_fk option:selected').val();
		var st_val = currentId.split(',');
		var con=confirm("Do you want to "+st_val[2]+" this employee");
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