<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

$cond='';
$page_name = "Shop";
$page_name2 = "";
$page_name3 = "Sub-Category";
$page_name4 =  ucword($pg);
if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }//unset($_SESSION['ser_dept'],$_SESSION['ser_key']); 
	
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty($_POST['search_btn'])) {
	if(!empty($_GET['id'])){ $cond.=" and psubc_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("bi_psub_category","count(*)","psubc_name='".$_POST['psubc_name']."' and psubc_catid='".$_POST['psubc_catid']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Name or  Sub-Category Name for this Category already Existed..';
	}else{		
		
		if(!empty($_GET['id'])){
			$_POST['psubc_updated_by']= $ERP_Uid;
			$_POST['psubc_updated_date']= $now_time;
			update_Defined('bi_psub_category', array_map('trim',$_POST),"psubc_id='".$getid."'");
			$msg="up";
		}else{		
			
			$orderby=rns_max('bi_psub_category','psubc_orderby');
			$_POST['psubc_orderby']= $orderby;
			$_POST['psubc_added_by']= $ERP_Uid;
			$_POST['psubc_added_date']= $now_time;
			insert_Defined('bi_psub_category', array_map('trim',$_POST));			
			$msg="ad";
		}
		header("location:".RNSFI.".php?msg=".$msg."");		
	}
} else {
	//if(!empty($_POST['search'])) { echo "aaaaa";exit;
	
	$_SESSION['ser_key']=$_POST['search'];
	if(!empty($_POST['cat_id'])) { $_SESSION['ser_cat_id']=$_POST['cat_id']; }
	//}
	header("location:sub_categories.php?search=1");
   }	
}
if(!empty($_GET['status'])) { $status_id=$_GET['status']; $sub_qur.=" and psubc_status=".$_GET['status']; } else { $status_id=""; }
if(!empty($_GET['search'])) { 
     if(isset($_SESSION['ser_cat_id'])){ $sub_qur.=" and psubc_catid =".$_SESSION['ser_cat_id']; }
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (psubc_name like '%".$_SESSION['ser_key']."%' or psubc_status='active' like '%".$_SESSION['ser_key']."%')"; }
	//if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (psubc_status='active' like '%".$_SESSION['ser_key']."%')"; } else { $sub_qur.=" and (psubc_status='inactive' like '%".$_SESSION['ser_key']."%')"; }
}
if(!empty($_GET['id'])){
	$qur = Query("select * from bi_psub_category where psubc_id=".$_GET['id']);
	$row = Fetch($qur);	
}
include(RNSTM);
?>
<script type="text/javascript">
/*$(document).ready( function() {
	$(".rnspop").colorbox();
	
	$('.sel_ls').on('change', function(){		
		var val = $(this).find('option:selected').val();
		var sel_id=this.id;

		if(sel_id=="dt_id") {
			var dataString = 'dt_id='+val+'&drop=st'; var result_ls="#proj_loc_id";
		} else if(rnsid=="proj_type") {
			var dataString = 'type_id='+val+'&drop=subtype'; var result_ls="#proj_subtype";
		}

		$.ajax({
			type: "POST", url: "ajax.php", data: dataString, cache: false,
			success: function(data){
				$(result_ls).html(data);
			}
		});
	});
});*/
</script>
<script type="text/javascript">
$(".preview_rns").colorbox();
$(document).ready( function() {
	$('#sta_chk').on('change', function(){		
		var val1 = $('#desig_list option:selected').val();
		var val = $('#sta_chk option:selected').val();
		if(val1!="") {	var dataString ='&status='+ val; } else { var dataString = 'status='+ val; }
		window.location = "sub_categories.php?"+dataString;
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

