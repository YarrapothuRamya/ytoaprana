<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

$cond='';
$page_name = "Website CMS";
$page_name2 = "";
$page_name3 = "Districts";
$page_name4 =  ucword($pg);
if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }//unset($_SESSION['ser_dept'],$_SESSION['ser_key']); 
	
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty($_POST['search_btn'])) {
	if(!empty($_GET['id'])){ $cond.=" and dt_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("bi_districts","count(*)","dt_name='".$_POST['dt_name']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Name already Existed..';
	}else{		
		
		if(!empty($_GET['id'])){
			$_POST['dt_updated_by']= $ERP_Uid;
			$_POST['dt_updated_date']= $now_time;
			update_Defined('bi_districts', array_map('trim',$_POST),"dt_id='".$getid."'");
			$msg="up";
		}else{		
			
			
			$_POST['dt_added_by']= $ERP_Uid;
			$_POST['dt_added_date']= $now_time;
			insert_Defined('bi_districts', array_map('trim',$_POST));			
			$msg="ad";
		}
		header("location:".RNSFI.".php?msg=".$msg."");		
	}
} else {
	if(!empty($_POST['search'])) { $_SESSION['ser_key']=$_POST['search'];}
	header("location:districts.php?search=1");
   }	
}
if(!empty($_GET['search'])) { 
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (dt_name like '%".$_SESSION['ser_key']."%' or dt_abbrev like '%".$_SESSION['ser_key']."%')"; }
}
if(!empty($_GET['id'])){
	$qur = Query("select * from bi_districts where dt_id=".$_GET['id']);
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

