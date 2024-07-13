<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

$cond='';
$page_name = "Website CMS";
$page_name2 = "";
$page_name3 = "States";
$page_name4 =  ucword($pg);
if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }//unset($_SESSION['ser_dept'],$_SESSION['ser_key']); 
	
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty($_POST['search_btn'])) {
	if(!empty($_GET['id'])){ $cond.=" and st_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("bi_states","count(*)","st_name='".$_POST['st_name']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Name already Existed..';
	}else{		
		
		if(!empty($_GET['id'])){
			$_POST['st_updated_by']= $ERP_Uid;
			$_POST['st_updated_date']= $now_time;
			update_Defined('bi_states', array_map('trim',$_POST),"st_id='".$getid."'");
			$msg="up";
		}else{		
			
			
			$_POST['st_added_by']= $ERP_Uid;
			$_POST['st_added_date']= $now_time;
			insert_Defined('bi_states', array_map('trim',$_POST));			
			$msg="ad";
		}
		header("location:".RNSFI.".php?msg=".$msg."");		
	}
} else {
	if(!empty($_POST['search'])) { $_SESSION['ser_key']=$_POST['search'];}
	header("location:states.php?search=1");
   }	
}
if(!empty($_GET['search'])) { 
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (st_name like '%".$_SESSION['ser_key']."%' or st_abbreviation like '%".$_SESSION['ser_key']."%')"; }
}
if(!empty($_GET['id'])){
	$qur = Query("select * from bi_states where st_id=".$_GET['id']);
	$row = Fetch($qur);	
}
include(RNSTM);
?>