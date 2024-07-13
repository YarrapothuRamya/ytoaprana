<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");
include("../includes/class.phpmailer.php");

$page_name = "Emergency";
$page_name2 = "";
$page_name3 = "Emergency Registration";
$page_name4 = "Edit";

$emergency_data= get_data("ytoa_emergency","*","emergency_id='".$_GET['id']."'");
//$sh_state	= getdata("bi_states","st_name","st_id='".$doc_data['sh_state']."'");
//$sh_district	= getdata("bi_districts","dt_name","dt_id='".$doc_data['sh_district']."'");
//$sh_mandal	= getdata("bi_mandals","md_name","md_id='".$doc_data['sh_mandal']."'");

if($_SERVER['REQUEST_METHOD']=="POST"){

 	$refno= getdata("ytoa_emergency","emergency_refno","emergency_id='".$_GET['id']."'");

	if(!empty($_GET['id'])){ $cond.=" and emergency_id<>'".$_GET['id']."' ";}
		$chck_phone = getdata("ytoa_emergency","count(*)","emergency_phone='".$_POST['emergency_phone']."'".$cond);
	if($chck_phone>0){
		//$errmsg = 'Payment Reference No already Existed..';
        ?><script> alert('Emergency with this Phone Number already Existed!');</script><?
	}else{
	
           /*$_POST['bns_ip']=$_SERVER['REMOTE_ADDR'];
		   $_POST['bns_refno']=$refno;
		   $_POST['bns_regid']=$_GET['idd'];*/
		
		if(!empty($_GET['id'])){
			$_POST['emergency_updated_by']= $ERP_Uid;
			$_POST['emergency_updated_date']= $now_time;
			update_Defined('ytoa_emergency', array_map('trim',$_POST),"emergency_id='".$getid."'");
			
 $sig	= "";
 $sig_admin= "Thanks,<br>Y to A - Prana Health Care Private Limited (Team)";
 $toemail=$_POST['emergency_email'];
 $toname="Emergency";
	  
  // Mail to site Administrator
  $message 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
			<tr>
			  <td width='31%' align='left'  class='textfont'>Emergency Id</td>
			  <td width='4%' align='center'><strong>:</strong></td>
			  <td align='left' class='color'>".$emergency_data['emergency_refno']."</td>
			</tr>
            <tr><td><strong>Contact Details</strong></td></tr>
			 <tr>
			  <td width='31%' align='left'  class='textfont'>Office Number</td>
			  <td width='4%' align='center'><strong>:</strong></td>
			  <td align='left' class='color'>".$emergency_data['emergency_office']."</td>
			</tr>
            <tr>
            <td width='31%' align='left'  class='textfont'>Mobile Number</td>
            <td width='4%' align='center'><strong>:</strong></td>
            <td align='left' class='color'>".$_POST['emergency_mobile']."</td>
          </tr>
			<tr>
			  <td width='31%' align='left'  class='textfont'>E-Mail</td>
			  <td width='4%' align='center'><strong>:</strong></td>
			  <td align='left' class='color'>".$_POST['emergency_email']."</td>
			</tr>
            <tr><td><strong>Survelliance Details</strong></td></tr>
			<tr>
			  <td width='31%' align='left'  class='textfont'>Date / Time</td>
			  <td width='4%' align='center'><strong>:</strong></td>
			  <td align='left' class='color'>".$now_time."</td>
			</tr>
			<tr>
			  <td align='left' class='textfont'>IP Address</td>
			  <td align='center'><strong>:</strong></td>
			  <td align='left' class='color'>".$_SERVER['REMOTE_ADDR']."</td>
			</tr>
			</table>";
			
		  //echo $message;exit;
		  $mail_body=str_replace("{bodycontent}",$message,$mail_template);
		  $mail_body=str_replace("{sig_admin}", $sig_admin,$mail_body);
		  $mail_body=str_replace("disname",$pharma_data['emergency_name'],$mail_body);	
		  //echo $mail_body; exit;
		  $mail = new PHPMailer();	
		  $mail->IsMail();
		  $mail->From 	= FROM_MAIL;
		  $mail->FromName = FROM_NAME;
		  //$mail->AddAddress(FROM_MAIL);
		  $mail->AddAddress($toemail);
		  $mail->AddAddress("technical@ytoa-prana.com");
		  //$mail->AddAddress(DEV_MAIL);
		  $mail->AddBCC("ramyayarrapothu@outlook.com",FROM_NAME);
		  $mail->AddBCC(DEV_MAIL,FROM_NAME);
		  $mail->IsHTML(true);
		  $mail->Subject	= "Emergency Registration Updation Details From ytoa-prana.com";
		  $mail->Body		= stripslashes($mail_body);
		  $mail->Send();
			
			$msg="up";
		}else{
			$_POST['emergency_added_by']= $ERP_Uid;			
			$_POST['emergency_added_date']= $now_time;	
			
			insert_Defined('ytoa_emergency', array_map('trim',$_POST));			
			$msg="ad";
		}
			header("location:emergency_registration?msg=".$msg."");
		} 
}

if(!empty($_GET['id'])){ 
	$qur = Query("select * from ytoa_emergency where emergency_id=".$_GET['id']);
	$row = Fetch($qur);	
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
      yearRange: '1950:'+((new Date).getFullYear()-18)     //yearRange: '1950:'+((new Date).getFullYear()-18)    
    });	
});
</script>
<script type="text/javascript">
$(document).ready( function() {
	$(".rnspop").colorbox();
	
	$('.sel_ls').on('change', function(){		
		var val = $(this).find('option:selected').val();
		var sel_id=this.id;

		if(sel_id=="sh_state") {
			var dataString = 'state_id='+val+'&drop=st'; var result_ls="#sh_district";
		}
		if(sel_id=="sh_district") {
			var dataString = 'dist_id='+val+'&drop=dt'; var result_ls="#sh_mandal";
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