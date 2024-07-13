<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

$gender="";$avatar="";$erow_array=array();$code="";$ems="";$sup_type=4;
$size=2097152; $op=">";$usize="800 x 600";$res_height="600";$res_width="800";$dir="sup_photos";$fileup="file_up";$p="sup_";$t="bi_suppliers";
rns_emptype(1);

$page_name = "User Management";
$page_name2 = "";
$page_name3 = "User";
$page_name4 = "Add";




 // |DBORD|VIEW||ADM_ADD|ADM_MNG   Default Privileges

// Code Generator
 /*$rand=generateCode_ls(8);
			$rand_code="BAIPL-S".date("Y");
			$rand_code.=substr($reg_code,7).$rand;*/
		
			
if($_SERVER['REQUEST_METHOD']=="POST"){

	if(!empty($_GET['id'])){ $cond.=" and sup_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("ytoa_doc_usermanagement","count(*)","doc_um_email='".$_POST['doc_um_email']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'User with this E-Mail ID already Existed..';
	}else{
		//For Image Upload
		if(isset($_FILES["file_up"]["size"]) && $_FILES["file_up"]["size"]<=$size) { $sree =$_FILES["file_up"]["name"];list($width,$height,$type)=getimagesize($_FILES["file_up"]["tmp_name"]); } else if(!empty($_GET['id']) && !empty($_POST["oldfile"]) && empty($_FILES[$fileup]["size"])) { $sree = substr(strrchr($_POST["oldfile"], '/'), 1); }else { $sree=""; $errmsgimg="File too large. File must be less than 2 megabytes."; }

		if($height<=$res_height || $width<=$res_width) {
				if(!empty($sree)) { rns_fileup($fileup,$sree,$dir,$ft_img,$size,$t,$p);extract($file_up); } else if(!empty($_POST["oldfile"]) && empty($_FILES[$fileup]["size"])){ $errmsgimg="";$path=$_POST["oldfile"]; unset($_POST['oldfile']);} else if(empty($errmsgimg)){$errmsgimg="";$path="";}
		if(empty($errmsgimg)) { 
		$path=substr(strstr($path, '/'),1); // end of Image Upload
		
		$_POST['doc_um_avatar']= $path;
		
		$_POST['doc_um_dob']= yyyy_mm_dd($_POST['doc_um_dob']);		
		//if(!empty($_POST['privileges'])){ $_POST['sup_privileges'] = implode('|', $_POST['privileges']); }else{ $_POST['sup_privileges'] = ""; }unset($_POST['privileges']);
		
		if(!empty($_POST['privileges'])){ $sup_privileges="|DBORD|VIEW|"; $doc_um_privileges.=implode('|', $_POST['privileges']); }else{ $_POST['doc_um_privileges'] = ""; }unset($_POST['privileges']);
		if(!empty($doc_um_privileges)){  $_POST['doc_um_privileges'] = $doc_um_privileges; }
		
		if(!empty($_GET['id'])){
			$_POST['doc_um_updated_by']= $ERP_Uid;
			$_POST['doc_um_password']=rnsb64ende($_POST['doc_um_password']);
			update_Defined('ytoa_doc_usermanagement', array_map('trim',$_POST),"doc_um_id='".$getid."'");
			$msg="up";
		}else{
			/*$orderby=rns_max('bi_suppliers','sup_order_by');			
			$code=substr(getdata("bi_suppliers","max(sup_code)",1),7);
			if($code!="") { $code=$code+1; } else {  $code=1; }
			$sup_code="BAIPL-S".rnsNumPad(6,$code);*/
			
			/*$rand=generateCode_ls(8);
			$rand_code="BAIPL-S".date("Y");
			$rand_code.=substr($reg_code,7).$rand;*/
			$_POST['doc_um_code']=$_SESSION['ERP_doc_um_code'];
			
			
			//$sup_username = strtolower(str_replace(' ', '-', $_POST['sup_fname']));
			//$sup_username.= rnsNumPad(4,$code);
			//$sup_password = rnsb64ende(strtolower($sup_code.date('dm', strtotime($_POST['sup_dob']))));
			//$_POST['sup_code']= $sup_code;
			//$_POST['sup_type']= 3;
			$_POST['doc_um_password']=rnsb64ende($_POST['doc_um_password']);
			$_POST['doc_um_order_by']= $orderby;
			$_POST['doc_um_added_by']= $ERP_Uid;			
			$_POST['doc_um_added_date']= $now_time;	
			$_POST['doc_um_updated_date']= $now_time;
			insert_Defined('ytoa_doc_usermanagement', array_map('trim',$_POST));			
			$msg="ad";
		}
			header("location:employees?msg=".$msg."");
		} 
	} else { $errmsg="Please Upload Image with Dimensions ".$usize; } 
		
	}
}

if(!empty($_GET['id'])){
	$qur = Query("select * from ytoa_doc_usermanagement where doc_um_id=".$_GET['id']);
	$row = Fetch($qur);	
	$gender = $row["doc_um_gender"];
	$avatar = $row["doc_um_avatar"];
	$sup_type = $row["doc_um_type"];
	$erow_array=explode("|",$row['doc_um_privileges']);
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
	$("#doc_um_phone").keypress(function (e) { 
		if (e.which != 8 && e.which != 0 && e.which != 41 && e.which != 40 && (e.which < 43 || e.which > 57)) {
			//display error message
			$("#mob").html("Digits Only").show().fadeOut("slow");
			return false;
		}
	});	
	$("#doc_um_type").change(function() {
		var action = $(this).val();
		if(action==3) { $("#doc_um_pri_div").slideDown(1000);} else { $("#doc_um_pri_div").slideUp(1000); }
	});
	
	
	
   	$('.sel_ls_rgcat').on('change', function(){		
		var val = $(this).find('option:selected').val();
		var sel_id=this.id; //alert(sel_id);

		if(sel_id=="doc_um_cat_idfk") { 
			var dataString = 'rgcat_id='+val+'&drop=rgscat'; var result_ls="#doc_um_sub_catidfk";
		} 
		$.ajax({
			type: "POST", url: "ajax.php", data: dataString, cache: false,
			success: function(data){
				$(result_ls).html(data);
			}
		});
	});
	
	
});
</script>