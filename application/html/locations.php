<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

if(!empty($_GET['start'])){ $start=$_GET['start']; }else{ $start=0; }$len = 50;$link = RNSFI."?";
$sub_qur="1";

$cond='';
$page_name = "Website CMS";
$page_name2 = "";
$page_name3 = "Village";
$page_name4 =  ucword($pg);
if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }//unset($_SESSION['ser_dept'],$_SESSION['ser_key']); 
	
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty($_POST['search_btn'])) {
	if(!empty($_GET['id'])){ $cond.=" and ls_id<>'".$_GET['id']."' ";}
 $cnt_qur = getdata("bi_locations","count(*)","ls_name='".$_POST['ls_name']."' and ls_stateid='".$_POST['ls_stateid']."' and ls_distid='".$_POST['ls_distid']."' and ls_mandid='".$_POST['ls_mandid']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Name already Existed..';
	}else{		
		
		if(!empty($_GET['id'])){
			$_POST['ls_updated_by']= $ERP_Uid;
			$_POST['ls_updated_date']= $now_time;
			update_Defined('bi_locations', array_map('trim',$_POST),"ls_id='".$getid."'");
			$msg="up";
		}else{		
			
			
			$_POST['ls_added_by']= $ERP_Uid;
			$_POST['ls_added_date']= $now_time;
			insert_Defined('bi_locations', array_map('trim',$_POST));			
			$msg="ad";
		}
		header("location:".RNSFI.".php?msg=".$msg."");		
	}
} else {
	if(!empty($_POST['search'])) { $_SESSION['ser_key']=$_POST['search'];}
	header("location:locations.php?search=1");
   }	
}
if(!empty($_GET['search'])) { 
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (ls_name like '%".$_SESSION['ser_key']."%' or md_name like '%".$_SESSION['ser_key']."%' or dt_name like '%".$_SESSION['ser_key']."%' or st_name like '%".$_SESSION['ser_key']."%' or ls_pincode like '%".$_SESSION['ser_key']."%')"; }
}
if(!empty($_GET['id'])){
	$qur = Query("select * from bi_locations where ls_id=".$_GET['id']);
	$row = Fetch($qur);	
	$district_qur="and dt_id=".$row['ls_distid'];
	$mand_qur="and md_id=".$row['ls_mandid'];
}
include(RNSTM);
?>

<script type="text/javascript">
$(document).ready( function() {


   	$('.sel_ls').on('change', function(){		
		var val = $(this).find('option:selected').val();
		var sel_id=this.id; 

		if(sel_id=="ls_stateid") { 
			var dataString = 'state_id='+val+'&drop=st'; var result_ls="#ls_distid";
		} else if(sel_id=="ls_distid") {
			var dataString = 'dist_id='+val+'&drop=dt'; var result_ls="#ls_mandid";
		}

		$.ajax({
			type: "POST", url: "ajax.php", data: dataString, cache: false,
			success: function(data){
				$(result_ls).html(data);
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

