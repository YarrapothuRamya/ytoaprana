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
    $name=$_POST['name'];
	$fullname=explode(' ',$name);
	$fname=$fullname[0];
	$lname=$fullname[1];
	
	if(!empty($_GET['id'])){ $cond.=" and emp_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("va_employees","count(*)","emp_email='".$_POST['email']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Employee with this E-Mail ID already Existed..';
	}
		if(!empty($_GET['id'])){
			Query("update va_employees set emp_fname='".$fname."',emp_lname='".$lname."',emp_email='".$_POST['email']."',emp_dob='".yyyy_mm_dd($_POST['addate'])."',emp_gender='".$_POST['gender']."',emp_qualification='".$_POST['qualification']."',emp_pre_address='".$_POST['address']."',emp_phone='".$_POST['mob_num']."',emp_updated_date='".$now."' where emp_id='".$_GET['id']."'");
			
			$msg="up";
		}
		header("location:profile?msg=".$msg."");
		} 

if(!empty($_GET['id'])){
	$admin=$_GET['id'];
    $admin_id=Query("select * from va_employees where emp_id='$admin'");
    $vrow=Fetch($admin_id);
	$gender = $vrow["emp_gender"];
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