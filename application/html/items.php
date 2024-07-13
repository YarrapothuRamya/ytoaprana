<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

if(!empty($_GET['start'])){ $start=$_GET['start']; }else{ $start=0; }$len = 50;$link = RNSFI."?";
$sub_qur="1";

$page_name = "Shop";
//$page_name2 = "Employees";
$page_name3 = "Item";
$page_name4 = "";	

if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(!empty($_POST['search'])) { $_SESSION['ser_keyword']=$_POST['search'];}
	if(!empty($_POST['cati_id'])) { $_SESSION['ser_cati_id']=$_POST['cati_id']; }
	header("location:items.php?search=1");
}
if(!empty($_GET['status'])) { $status_id=$_GET['status']; $sub_qur.=" and itm_status=".$_GET['status']; } else { $status_id=""; }

if(isset($_SESSION['ser_keyword'])){ $sub_qur.=" and (itm_code like '%".$_SESSION['ser_keyword']."%' or itm_name like '%".$_SESSION['ser_keyword']."%' or psubc_name like '%".$_SESSION['ser_keyword']."%' or itm_status='active' like '%".$_SESSION['ser_keyword']."%')"; }
if(isset($_SESSION['ser_cati_id'])){ $sub_qur.=" and itm_catid =".$_SESSION['ser_cati_id']; }

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
	$('#sta_chk').on('change', function(){		
		var val1 = $('#desig_list option:selected').val();
		var val = $('#sta_chk option:selected').val();
		if(val1!="") {	var dataString ='&status='+ val; } else { var dataString = 'status='+ val; }
		window.location = "items.php?"+dataString;
	})
	
	
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