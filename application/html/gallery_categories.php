<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

$cond='';
$page_name = "Website CMS";
$page_name2 = "Gallery";
$page_name3 = "Category";
$page_name4 =  ucword($pg);
if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }//unset($_SESSION['ser_dept'],$_SESSION['ser_key']); 
	
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty($_POST['search_btn'])) {
	if(!empty($_GET['id'])){ $cond.=" and gal_catid<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("gal_catname","count(*)","gal_catname='".$_POST['gal_catname']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Category Name already Existed..';
	}else{		
		
		if(!empty($_GET['id'])){
			$_POST['gal_updated_by']= $ERP_Uid;
			$_POST['gal_updated_date']= $now_time;
			update_Defined('ytoa_gallery_cat', array_map('trim',$_POST),"gal_catid='".$getid."'");
			$msg="up";
		}else{		
			//$orderby=rns_max('bi_pcategory','pcat_orderby');
			//$_POST['pcat_orderby']= $orderby;
			$_POST['gal_added_by']= $ERP_Uid;
			$_POST['gal_added_date']= $now_time;
			insert_Defined('ytoa_gallery_cat', array_map('trim',$_POST));			
			$msg="ad";
		}
		header("location:".RNSFI.".php?msg=".$msg."");		
	}
} else {
	if(!empty($_POST['search'])) { $_SESSION['ser_key']=$_POST['search'];}
	header("location:gallery_categories.php?search=1");
   }	
}
if(!empty($_GET['search'])) { 
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (gal_catname like '%".$_SESSION['ser_key']."%')"; }
}
if(!empty($_GET['id'])){
	$qur = Query("select * from ytoa_gallery_cat where gal_catid=".$_GET['id']);
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