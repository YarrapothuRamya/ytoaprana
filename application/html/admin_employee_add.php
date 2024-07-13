<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

$gender="";$avatar="";$erow_array=array();$code="";$ems="";$emp_type=4;
$size=2097152; $op=">";$usize="800 x 600";$res_height="600";$res_width="800";$dir="emp_photos";$fileup="file_up";$p="emp_";$t="va_employees";
rns_emptype(1);

$page_name = "Admin Users";
$page_name2 = "";
$page_name3 = "User";
$page_name4 = "Add";

if($_SERVER['REQUEST_METHOD']=="POST"){

	if(!empty($_GET['id'])){ $cond.=" and emp_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("va_employees","count(*)","emp_email='".$_POST['emp_email']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'User with this E-Mail ID already Existed..';
	}else{
		//For Image Upload
		if(isset($_FILES["file_up"]["size"]) && $_FILES["file_up"]["size"]<=$size) { $sree =$_FILES["file_up"]["name"];list($width,$height,$type)=getimagesize($_FILES["file_up"]["tmp_name"]); } else if(!empty($_GET['id']) && !empty($_POST["oldfile"]) && empty($_FILES[$fileup]["size"])) { $sree = substr(strrchr($_POST["oldfile"], '/'), 1); }else { $sree=""; $errmsgimg="File too large. File must be less than 2 megabytes."; }

		if($height<=$res_height || $width<=$res_width) {
				if(!empty($sree)) { rns_fileup($fileup,$sree,$dir,$ft_img,$size,$t,$p);extract($file_up); } else if(!empty($_POST["oldfile"]) && empty($_FILES[$fileup]["size"])){ $errmsgimg="";$path=$_POST["oldfile"]; unset($_POST['oldfile']);} else if(empty($errmsgimg)){$errmsgimg="";$path="";}
		if(empty($errmsgimg)) { 
		$path=substr(strstr($path, '/'),1); // end of Image Upload
		//echo $path;exit;
		$_POST['emp_avatar']= $path;
		
		$_POST['emp_dob']= yyyy_mm_dd($_POST['emp_dob']);		
		if(!empty($_POST['privileges'])){ $_POST['emp_privileges'] = implode('|', $_POST['privileges']); }else{ $_POST['emp_privileges'] = ""; }unset($_POST['privileges']);
		
		if(!empty($_GET['id'])){
			$_POST['emp_updated_by']= $ERP_Uid;
			$_POST['emp_password']=rnsb64ende($_POST['emp_password']);
			update_Defined('va_employees', array_map('trim',$_POST),"emp_id='".$getid."'");
			$msg="up";
		}else{
			$orderby=rns_max('va_employees','emp_order_by');			
			$code=substr(getdata("va_employees","max(emp_code)",1),3);
			if($code!="") { $code=$code+1; } else {  $code=1; }
			$emp_code="ADM".rnsNumPad(4,$code);
			//$emp_username = strtolower(str_replace(' ', '-', $_POST['emp_fname']));
			//$emp_username.= rnsNumPad(4,$code);
			//$emp_password = rnsb64ende(strtolower($emp_code.date('dm', strtotime($_POST['emp_dob']))));
			$_POST['emp_code']= $emp_code;
			$_POST['emp_type']= 3;
			$_POST['emp_password']=rnsb64ende($_POST['emp_password']);
			$_POST['emp_order_by']= $orderby;
			$_POST['emp_added_by']= $ERP_Uid;			
			$_POST['emp_added_date']= $now_time;	
			$_POST['emp_updated_date']= $now_time;
			insert_Defined('va_employees', array_map('trim',$_POST));			
			$msg="ad";
		}
			header("location:employees?msg=".$msg."");
		} 
	} else { $errmsg="Please Upload Image with Dimensions ".$usize; } 
		
	}
}

if(!empty($_GET['id'])){
	$qur = Query("select * from va_employees where emp_id=".$_GET['id']);
	$row = Fetch($qur);	
	$gender = $row["emp_gender"];
	$avatar = $row["emp_avatar"];
	$emp_type = $row["emp_type"];
	$erow_array=explode("|",$row['emp_privileges']);
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
	$("#emp_phone").keypress(function (e) { 
		if (e.which != 8 && e.which != 0 && e.which != 41 && e.which != 40 && (e.which < 43 || e.which > 57)) {
			//display error message
			$("#mob").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	});	
	$("#emp_type").change(function() {
		var action = $(this).val();
		if(action==3) { $("#emp_pri_div").slideDown(1000);} else { $("#emp_pri_div").slideUp(1000); }
	});
});
</script>