<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

if(!isset($_SESSION['ERP_Utype']) && $_SESSION['ERP_Utype']!='1' ){	header("location:logout.php"); }

$cond = "";$gender="";

$page_name = "Developer";
$page_name2 = "My Account";
$page_name3 = "Edit";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['doc_name'];
//	$fullname=explode(' ',$name);
	$fname=$_POST['doc_name'];
	$lname=$_POST['doc_lname'];
	
	if(!empty($_GET['id'])){ $cond.=" and doc_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("ytoa_doctor","count(*)","doc_phone='".$_POST['doc_phone']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Employee with this Phone number already Existed..';
	}
		if(!empty($_GET['id'])){
			echo "hello!"; exit;
//			Query("update ytoa_doctor set doc_name='".$fname."',doc_lname='".$lname."',doc_email='".$_POST['doc_email']."',doc_singleline='".$_POST['doc_singleline']."',doc_phone='".$_POST['doc_phone']."',doc_exptitle='".$_POST['qualification']."',sup_pre_address='".$_POST['address']."',sup_phone='".$_POST['mob_num']."',sup_updated_date='".$now."' where sup_id='".$_GET['id']."'");
			
			$msg="up";
		}
		header("location:profile?msg=".$msg."");
		} 

if(!empty($_GET['id'])){
	$admin=$_GET['id'];
    $admin_id=Query("select * from ytoa_doctor where doc_id=$admin");
    $vrow=Fetch($admin_id);
//	$gender = $vrow["sup_gender"];
}
include(RNSTM);
?>
<script type="text/javascript">
$(document).ready( function() {
	$(".ajax").colorbox();
	// Date picker
	$(".dob").datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'dd-mm-yy',
      yearRange: '1950:'+((new Date).getFullYear())     //yearRange: '1950:'+((new Date).getFullYear()-18)    
    });	
});	
</script>