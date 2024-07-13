<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

$cond='';
$page_name = "Shop";
$page_name2 = "";
$page_name3 = "Category";
$page_name4 =  ucword($pg);
if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }//unset($_SESSION['ser_dept'],$_SESSION['ser_key']); 
	
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty($_POST['search_btn'])) {
	if(!empty($_GET['id'])){ $cond.=" and pcat_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("bi_pcategory","count(*)","pcat_name='".$_POST['pcat_name']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Name or Category Name already Existed..';
	}else{		
		
		if(!empty($_GET['id'])){
			$_POST['pcat_updated_by']= $ERP_Uid;
			$_POST['pcat_updated_date']= $now_time;
			update_Defined('bi_pcategory', array_map('trim',$_POST),"pcat_id='".$getid."'");
			$msg="up";
		}else{		
			$orderby=rns_max('bi_pcategory','pcat_orderby');
			$_POST['pcat_orderby']= $orderby;
			$_POST['pcat_added_by']= $ERP_Uid;
			$_POST['pcat_added_date']= $now_time;
			insert_Defined('bi_pcategory', array_map('trim',$_POST));			
			$msg="ad";
		}
		header("location:".RNSFI.".php?msg=".$msg."");		
	}
} else {
	if(!empty($_POST['search'])) { $_SESSION['ser_key']=$_POST['search'];}
	header("location:categories.php?search=1");
   }	
}
if(!empty($_GET['search'])) { 
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (pcat_name like '%".$_SESSION['ser_key']."%')"; }
}
if(!empty($_GET['id'])){
	$qur = Query("select * from bi_pcategory where pcat_id=".$_GET['id']);
	$row = Fetch($qur);	
}
if(!empty($_GET['status'])) { $status_id=$_GET['status']; $sub_qur.=" and pcat_status=".$_GET['status']; } else { $status_id=""; }
include(RNSTM);
?>

<script type="text/javascript">
$(".preview_rns").colorbox();
$(document).ready( function() {

	$('#sta_chk').on('change', function(){		
		var val1 = $('#desig_list option:selected').val();
		var val = $('#sta_chk option:selected').val();
		if(val1!="") {	var dataString ='&status='+ val; } else { var dataString = 'status='+ val; }
		window.location = "categories.php?"+dataString;
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