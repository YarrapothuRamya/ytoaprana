<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

$cond='';
$page_name = "Employee";
$page_name2 = "";
$page_name3 = "Reports";
$page_name4 =  ucword($pg);
if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }


	
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty($_POST['search_btn'])) {
	if(!empty($_GET['id'])){ $cond.=" and emprep_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("bi_emprep","count(*)","emprep_dt='".$_POST['emprep_dt']."' and emprep_loginid='".$_POST['emprep_loginid']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Report Generation for this Date already Existed..';
	}else{		
		
		if(!empty($_GET['id'])){
			$_POST['emprep_loginid']=$_SESSION['ERP_Uid'];
			$_POST['emprep_updated_by']= $ERP_Uid;
			$_POST['emprep_updated_date']= $now_time;
			update_Defined('bi_emprep', array_map('trim',$_POST),"emprep_id='".$getid."'");
			$msg="up";
		}else{		
			
			$orderby=rns_max('bi_emprep','emprep_orderby');
			$_POST['emprep_loginid']=$_SESSION['ERP_Uid'];
			$_POST['emprep_orderby']= $orderby;
			$_POST['emprep_added_by']= $ERP_Uid;
			$_POST['emprep_added_date']= $now_time;
			insert_Defined('bi_emprep', array_map('trim',$_POST));			
			$msg="ad";
		}
		header("location:".RNSFI.".php?msg=".$msg."");		
	}
} else {
	
	$_SESSION['ser_key']=$_POST['search'];
	if(!empty($_POST['emprep_id'])) { $_SESSION['ser_cat_id']=$_POST['emprep_id']; }
	//}
	header("location:employee_reports.php?search=1");
   }	
}
if(!empty($_GET['search'])) { 
     if(isset($_SESSION['ser_cat_id'])){ $sub_qur.=" and emprep_id =".$_SESSION['ser_cat_id']; }
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (emprep_loginid like '%".$_SESSION['ser_key']."%')"; }
}
if(!empty($_GET['id'])){
	$qur = Query("select * from bi_emprep where emprep_id=".$_GET['id']);
	$row = Fetch($qur);	
//	$sub_qur="emprep_loginid=".$_SESSION['ERP_Uid'];
}
include(RNSTM);
?>


<script type="text/javascript">
$(".preview_rns").colorbox();
$(document).ready( function() {
	
	//$('.user_status').on('click', function(){
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

