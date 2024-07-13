<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

if(!empty($_GET['start'])){ $start=$_GET['start']; }else{ $start=0; }$len = 50;$link = RNSFI."?t=".$_GET['t']."&status=1";
$sub_qur="1";
if(!empty($_GET['t']) && $_GET['t']==='1'){
$page_name = "Website CMS";
//$page_name2 = "Employees";
$page_name3 = "Photo Gallery";
$page_name4 = "Manage";	
$type="gallery_add?pg=add&type=Photo_Gallery";
$parent_id="1";
}else if(!empty($_GET['t']) && $_GET['t']==='2'){
$page_name = "Website CMS";
$page_name3 = "News-Articles Gallery";
$page_name4 = "Manage";
$type="gallery_add?pg=add&type=News-Articles";
$parent_id="2";
}
if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(!empty($_POST['search'])) { $_SESSION['ser_keyword']=$_POST['search'];}
	header("location:galleries?t=".$_GET['t']."&search=1");
}

if(isset($_SESSION['ser_keyword'])){ $sub_qur.=" and (va_title like '%".$_SESSION['ser_keyword']."%')"; }

if(!empty($_GET['status'])) { $status_id=$_GET['status']; $sub_qur.=" and va_status=".$_GET['status']; } else { $status_id=""; }
include(RNSTM);
?>
<script type="text/javascript">
$(document).ready( function() {
	$(".ajax,.preview_rns").colorbox();
	$('#sta_chk').on('change', function(){		
		var val1 = $('#desig_list option:selected').val();
		var val = $('#sta_chk option:selected').val();
		if(val1!="") {	var dataString ='&status='+ val; } else { var dataString = 'status='+ val; }
		window.location = "galleries?t=<?=$_GET['t']?>"+dataString;
	});
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
			var dataString = 'act=status&id='+ st_val[0] +'&cs='+ st_val[1] +'&t='+ st_val[3]+'&p='+ st_val[4];
			$.ajax({
				type: "POST",
				url: "ajax.php",
				data: dataString,
				cache: false,
				success: function(data){var div_name="#st_div_"+st_val[0];
					$(div_name).html(data);
					location.reload();
				}
			});
		} else { return false; }
	});
	
});
</script>