<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

$cond='';
$page_name = "Employee";
$page_name2 = "";
$page_name3 = "Mitra Reports";
$page_name4 =  ucword($pg);
if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }


	
if($_SERVER['REQUEST_METHOD']=="POST"){
	
	if(empty($_POST['search_btn'])) {
	if(!empty($_GET['id'])){ $cond.=" and mitrarep_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("bi_mitrarep","count(*)","mitrarep_dt='".$_POST['mitrarep_dt']."' and mitrarep_loginid=".$_POST['mitrarep_loginid'].$cond);
	if($cnt_qur>0){
		$errmsg = 'Report Generation for this Date already Existed..';
	}else{		
		
		if(!empty($_GET['id'])){
			$_POST['mitrarep_loginid']=$_SESSION['ERP_Uid'];
			$_POST['mitrarep_updated_by']= $ERP_Uid;
			$_POST['mitrarep_updated_date']= $now_time;
			update_Defined('bi_mitrarep', array_map('trim',$_POST),"mitrarep_id='".$getid."'");
			$msg="up";
		}else{		
			
			$orderby=rns_max('bi_mitrarep','mitrarep_orderby');
			$_POST['mitrarep_loginid']=$_SESSION['ERP_Uid'];
			$_POST['mitrarep_orderby']= $orderby;
			$_POST['mitrarep_added_by']= $ERP_Uid;
			$_POST['mitrarep_added_date']= $now_time;
			insert_Defined('bi_mitrarep', array_map('trim',$_POST));			
			$msg="ad";
		}
		header("location:".RNSFI.".php?msg=".$msg."");		
	}
} else {
	
	$_SESSION['ser_key']=$_POST['search'];
	if(!empty($_POST['mitrarep_id'])) { $_SESSION['ser_cat_id']=$_POST['mitrarep_id']; }
	//}
	header("location:mitra_reports.php?search=1");
   }	
}
if(!empty($_GET['search'])) { 
     if(isset($_SESSION['ser_cat_id'])){ $sub_qur.=" and mitrarep_id =".$_SESSION['ser_cat_id']; }
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (mitrarep_loginid like '%".$_SESSION['ser_key']."%')"; }
}
if(!empty($_GET['id'])){
	$qur = Query("select * from bi_mitrarep where mitrarep_id=".$_GET['id']);
	$row = Fetch($qur);	
	$district_qur="and dt_id=".$row['store_distid'];
	$mand_qur="and md_id=".$row['store_mandid'];
}
include(RNSTM);
?>


<script type="text/javascript">
$(document).ready( function() {


   	$('.sel_store').on('change', function(){		
		var val = $(this).find('option:selected').val();
		var sel_id=this.id; 

		if(sel_id=="store_stateid") { 
			var dataString = 'state_id='+val+'&drop=st'; var result_store="#store_distid";
		} else if(sel_id=="store_distid") {
			var dataString = 'dist_id='+val+'&drop=dt'; var result_store="#store_mandid";
		}

		$.ajax({
			type: "POST", url: "ajax.php", data: dataString, cache: false,
			success: function(data){
				$(result_store).html(data);
			}
		});
	});
	
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

