<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

$cond='';
$page_name = "Website CMS";
$page_name2 = "";
$page_name3 = "News&Events Video";
$page_name4 =  ucword($pg);
if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }//unset($_SESSION['ser_dept'],$_SESSION['ser_key']); 
	
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty($_POST['search_btn'])) {
	if(!empty($_GET['id'])){ $cond.=" and ne_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("bi_news","count(*)","ne_name='".$_POST['ne_name']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Name already Existed..';
	}else{		
		
		
		$_POST['ne_cat_id']=2;
		if(!empty($_GET['id'])){
			$_POST['ne_updated_by']= $ERP_Uid;
			$_POST['ne_updated_date']= $now_time;
			update_Defined('bi_news', array_map('trim',$_POST),"ne_id='".$getid."'");
			$msg="up";
		}else{		
			
			$_POST['ne_added_by']= $ERP_Uid;
			$_POST['ne_added_date']= $now_time;
			insert_Defined('bi_news', array_map('trim',$_POST));			
			$msg="ad";
		}
		header("location:".RNSFI.".php?msg=".$msg."");		
	}
} else {
	if(!empty($_POST['search'])) { $_SESSION['ser_key']=$_POST['search'];}
	header("location:news_events_video_add.php?search=1");
   }	
}
if(!empty($_GET['search'])) { 
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (ne_title like '%".$_SESSION['ser_key']."%' or ne_desc like '%".$_SESSION['ser_key']."%')"; }
}
if(!empty($_GET['id'])){
	$qur = Query("select * from bi_news where ne_id=".$_GET['id']);
	$row = Fetch($qur);	
}
include(RNSTM);
?>
<script type="text/javascript">
$(document).ready( function() {
	$(".ajax,.preview_rns").colorbox();
	
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
					//location.reload();
				}
			});
		} else { return false; }
	});
	
});
</script>