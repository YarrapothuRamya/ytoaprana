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
	
	$img_thum="../../uploads/gal_uploads/".$folder_arr[$_POST['cat_id']]."/thumb/".$_POST['path']; 
	$image="../../uploads/gal_uploads/".$folder_arr[$_POST['cat_id']]."/".$_POST['path'];
	//echo $image;exit;
	 unlink($img_thum);
	 unlink($image);
	Query("delete from ytoa_gallery where va_id='".$_POST['delete']."'");
	$msg="del"; 
	header("location:gallery_delete?id=".$_GET['id']."&msg=".$msg);	
}

include(RNSTM);
?>
