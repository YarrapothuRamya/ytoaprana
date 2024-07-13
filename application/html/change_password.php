<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");
$page_name="Change Password";

if($_SERVER['REQUEST_METHOD']=="POST"){
	$errmsg="";
	$qur_emp=Query("select * from va_employees where emp_password = '".secure(rnsb64ende($_POST['pwd1']))."' and emp_id='".$_SESSION['ERP_Uid']."'");
	$cnt_emp=NumRows($qur_emp);
	$row_emp=Fetch($qur_emp);
	if($cnt_emp>0){		
		Query("UPDATE va_employees set emp_password = '".secure(rnsb64ende($_POST['pswd']))."' where emp_id='".$_SESSION['ERP_Uid']."' and emp_password='".secure(rnsb64ende($_POST['pwd1']))."'");	
		$mail_body	 = "<style type=text/css>
		td { font-family: Tahoma;font-size: 12px;}
		.Headings {font-family: Tahoma;font-size: 12px;  font-weight: bold; color:#228A07;}
		.Headings1 {font-family: Tahoma; font-size: 12px; font-weight: bold; color:#FB8A36; text-decoration:none}
		</style>
		<table width='70%' border='0' align='center' cellpadding='0' cellspacing='1' bgcolor='#9DACBF'>
		  <tr>
			<td bgcolor='#FFFFFF'><table width='100%' border='0' align='center' cellpadding='1' cellspacing='0'>
			  <tr>
				<td align='center'><strong>&quot; Change Password &quot; Details</strong></td>
			  </tr>
			  <tr>
				<td height=1><table width='100%' border='0' cellspacing='0' cellpadding='0'>
				  <tr>
					<td bgcolor='#00548D' height='1'></td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td align='left' valign='top'><table width='100%' border='0' align='center' cellpadding='5' cellspacing='0'>
					<tr>
					  <td>&nbsp;</td>
					</tr>
					<tr>
					  <td><table width='100%' border='0' cellspacing='1' cellpadding='1'>
						  <tr>
							<td><strong>Dear Sir</strong>,</td>
						  </tr>
						  <tr>
							<td>Here is My <strong>Change Password</strong> Details :</td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td>Username : ".$row['emp_username']."</td>
						  </tr>
						  <tr>
							<td>Password : ".$_POST['pwd3']."</td>
						  </tr>
						  <tr>
							<td>Old-Password : ".$_POST['pwd1']."</td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td><strong>Thanks & Regards..</strong></td>
						  </tr>
						  <tr>
							<td><strong>".$_SESSION['ERP_Uname']."</strong></td>
						  </tr>
					  </table></td>
					</tr>
					<tr>
					  <td>&nbsp;</td>
					</tr>
				</table></td>
			  </tr>
			</table></td>
		  </tr>
		</table>";
		$mailto		 = $_SESSION['Uemail'];
		$mailheader  = 'MIME-Version: 1.0' . "\r\n";
		$mailheader .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$mailheader	.= 'From: '.$_SESSION['ERP_Uname']." - ".$_SESSION['ERP_Utype']." <".$_SESSION['ERP_Uemail'].">". "\r\n";		
		$mess		 = 'Change Password Details of '.$_SESSION['ERP_Uname'];
		//@mail($mailto,$mess,$mail_body,$mailheader);
		
		session_destroy();
		header("location:change_password?msg=pass");
    }else{
		$errmsg="Invalid Password , Try again..";
	}
}

$res_sel=Query("select * from va_employees where emp_id='".$_SESSION['ERP_Uid']."'");
$row_qur=Fetch($res_sel);
include(RNSTM);
?>
<script type="text/javascript">
$(document).ready(function(){
	// Basic usage
	$('#example-1').tipsy();
	$('.tooltip').tipsy({ html:true, gravity: 's' });
	// Input field focus
	$('input').tipsy({trigger: 'focus', gravity: 'w'});
	// Dinamic gravity
	$('#dinamic').tipsy({gravity: $.fn.tipsy.autoNS});
	// Open and close tooltip manually
	$('#manual-example a[rel=tipsy]').tipsy({trigger: 'manual'});
});

function trimstr(str) {
	str= this != window? this : str;
	return str.replace(/^\s+/g, '').replace(/\s+$/g, '');
}

function pass_valid(){
	var d = document.changepassword;
	if(d.pwd1.value==""){ alert("Please Enter Old Password"); d.pwd1.focus(); return false; }
	
	if(d.pswd.value==""){ alert("Please Enter New Password"); d.pswd.focus(); return false; }
	if(d.pswd.value.length < 8){ alert("Password must contain at least eight characters"); d.pswd.focus(); return false; }
	re = /[0-9]/;
	if(!re.test(d.pswd.value)){ alert("Password must contain at least one number (0-9)"); d.pswd.focus(); return false; }
	re = /[a-z]/;
	if(!re.test(d.pswd.value)){ alert("Password must contain at least one lowercase letter (a-z)"); d.pswd.focus(); return false; }
	re = /[A-Z]/;
	if(!re.test(d.pswd.value)){ alert("Password must contain at least one uppercase letter (A-Z)"); d.pswd.focus(); return false; }
	re = /[!@#$%\^&*)(+=_-]/;
	if(!re.test(d.pswd.value)){ alert("Password must contain at least one special letter [!@#$%\^&*)(+=_-]"); d.pswd.focus(); return false; }

	if(d.pwd3.value==""){ alert("Please Confirm your New Password"); d.pwd3.focus(); return false; }
	if(d.pswd.value!=d.pwd3.value){ alert("New-Password and Confirm-Password doesn't Match.."); d.pwd3.value=""; d.pwd3.focus(); return false;  }
}
</script>	