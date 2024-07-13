<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

if(!empty($_GET['start'])){ $start=$_GET['start']; }else{ $start=0; }$len = 50;$link = RNSFI."?";
$sub_qur="1";

$page_name = "Registrations";
//$page_name2 = "Employees";
$page_name3 = "Registrations Fee";
$page_name4 = "";	

if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(!empty($_POST['search'])) { $_SESSION['ser_keyword']=$_POST['search'];}
	if(!empty($_POST['reg_catid'])) { $_SESSION['ser_cati_id']=$_POST['regcat_id']; }
	header("location:regfee.php?search=1");
}

if(isset($_SESSION['ser_keyword'])){ $sub_qur.=" and (regfee_amount like '%".$_SESSION['ser_keyword']."%' or reg_catname like '%".$_SESSION['ser_keyword']."%' or regsubc_name like '%".$_SESSION['ser_keyword']."%')"; }
if(isset($_SESSION['ser_cati_id'])){ $sub_qur.=" and regfee_catid =".$_SESSION['ser_cati_id']; }
if(!empty($_GET['status'])) { $status_id=$_GET['status']; $sub_qur.=" and regfee_status=".$_GET['status']; } else { $status_id=""; }
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
		//alert(currentId);
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