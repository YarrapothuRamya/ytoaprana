<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

$cond='';
$page_name = "Predictions";
$page_name2 = "";
$page_name3 = "Categories";
$page_name4 =  ucword($pg);
if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); }//unset($_SESSION['ser_dept'],$_SESSION['ser_key']); 
	
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(empty($_POST['search_btn'])) {
	if(!empty($_GET['id'])){ $cond.=" and vpc_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("va_predic_cat_list","count(*)","vpc_name='".$_POST['vpc_name']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Category with this Name already Existed..';
	}else{		
		$_POST['vpc_name']=upper($_POST['vpc_name']);
		if(!empty($_GET['id'])){
			$_POST['vpc_updatedby']= $ERP_Uid;
			update_Defined('va_predic_cat_list', array_map('trim',$_POST),"vpc_id='".$getid."'");
			$msg="up";
		}else{		
			$orderby=rns_max('va_predic_cat_list','vpc_orderby');
			$_POST['vpc_orderby']= $orderby;	
			$_POST['vpc_addedby']= $ERP_Uid;
			$_POST['vpc_added_date']= $now_time;
			$_POST['vpc_updated_date']= $now_time;
			insert_Defined('va_predic_cat_list', array_map('trim',$_POST));			
			$msg="ad";
		}
		header("location:".RNSFI."?msg=".$msg."");		
	}
} else {
	/*if(!empty($_POST['cat_parent_id'])) { $_SESSION['ser_dept']=$_POST['cat_parent_id']; }*/
	if(!empty($_POST['search'])) { $_SESSION['ser_key']=$_POST['search'];}
	header("location:prediction_categories?search=1");
   }	
}
if(!empty($_GET['search'])) { 
	/*if(isset($_SESSION['ser_dept'])){ $sub_qur.=" and cat_parent_id =".$_SESSION['ser_dept']; }*/
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (vpc_name like '%".$_SESSION['ser_key']."%' or vpc_abbreviation like '%".$_SESSION['ser_key']."%')"; }
}
if(!empty($_GET['id'])){
	$qur = Query("select * from va_predic_cat_list where vpc_id=".$_GET['id']);
	$row = Fetch($qur);	
}
include(RNSTM);
?>