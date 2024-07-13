<?php
ob_start();
session_start();
include_once("../includes/conn.php");
	
if(!empty($_SESSION['tm_type'])){
	
	//mysql_query("update tm_logindetails set out_time='".$now_onlytime."', logouttime='".$now_time."' where login_entryid='".$ymd.$_SESSION['tm_id']."' and login_regid='".$_SESSION['tm_id']."' ");
	//mysql_query("update tm_emp set sup_logout=1 where sup_id='".$_SESSION['tm_id']."'");
	//mysql_query("update daily_works set dw_outtime='".$now_onlytime."' where dw_entryid='".$ymd.$_SESSION['tm_id']."'");
	
	//mysql_query("insert into tc_followups (f_parenttype,f_feedback,f_date,f_time,f_branch,followup_by,f_datetime,f_dateadded) values('LogInOut','Idle Logout','".$now."','".$now_onlytime."','".$_SESSION['tm_branch']."','".$_SESSION['tm_id']."','".$now_time."','".$now."')");
	
	//LOGOUT MAIL
	$mail_body	= '<style type=text/css>
	td,th { font-family: Tahoma;font-size: 12px;}
	.Headings {font-family: Tahoma;font-size: 12px;  font-weight: bold; color:#228A07;}
	.Headings1 {font-family: Tahoma; font-size: 12px; font-weight: bold; color:#FB8A36; text-decoration:none}
	.name{ clear:#0B55C4; font-size:11px; font-weight:bold; padding-left:3px;}
	.price_green{font-family:Tahoma;font-size:12px;font-weight:bold; color:  #09B642 ; text-decoration:none; }
	.blue_bold{font-family:Tahoma;font-size:12px;font-weight:bold; color: #4040FF ; text-decoration:none; }
	.blue_lighter{font-family:Tahoma;font-size:12px;font-weight:lighter; color:  #4040FF ; text-decoration:none; }
	.sub_heading_black{	height:20px;color:#000000;font-size:11px;padding-left:3px;}
	.main_heading_green { height:20px;color:#09B642;font-size:11px; font-weight:bold;padding-left:3px;}
	</style>
	<table width="70%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#E07010">
	  <tr>
		<td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
		  <tr>
			<td align="left" valign="top" bgcolor="#E07010"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="2" bgcolor="#FFFFFF">
			<tr bgcolor="#9999FF">
			  <td colspan="3" bgcolor="#F0F0F0" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td align="left"><a href="http://www.ssitserp.com" target="_blank"><img src="'.BASEURL.RNSIM.'/header_logo.gif" alt="'.TITLE.'" width="" height="" border="0" align="middle"></a></td>
				  <td align="right"><a href="http://www.weberp4.com" target="_blank"><img src="'.BASEURL.RNSIM.'/erp4-transparent200x57.gif" alt="Automate Your Business" width="200" height="57" border="0" align="middle"></a></td>
				</tr>
			  </table></td>
			</tr>
			<tr>
			<td colspan="3"><p><strong>Dear Sir,</strong></p>
			<p>Details for <strong class="price_green">ERP APPLICATION - Success</strong> Idle Log-Out Attempt</p></td>
			  </tr>
				<tr>
				  <td colspan="3"></td>
			  </tr>
				<tr>
				  <th width="5%" align="left" nowrap bgcolor="#F0F0F0">Date / Time</th>
				  <th width="5%" align="center" nowrap bgcolor="#F0F0F0">:</th>
				  <td bgcolor="#F0F0F0">'.date("d-m-Y").' / '.date("g:i:s A").'</td>
			  </tr>
				<tr>
				  <th width="5%" align="left" nowrap bgcolor="#F0F0F0">Employee Name</th>
				  <th width="5%" align="center" nowrap bgcolor="#F0F0F0">:</th>
				  <td bgcolor="#F0F0F0">'.getdata("tm_emp","sup_dispname","sup_id='".$_SESSION['tm_id']."'").'</td>
			  </tr>
				<tr>
				  <th align="left" nowrap bgcolor="#F0F0F0">Reason</th>
				  <th width="5%" align="center" nowrap bgcolor="#F0F0F0">:</th>
				  <td bgcolor="#F0F0F0">Idle Log-Out</td>
			  </tr>
				<tr align="left">
				  <th colspan="3" nowrap>&nbsp;</th>
			  </tr>
				<tr>
				  <th width="5%" align="left" nowrap bgcolor="#F0F0F0">IP Address</th>
				  <th width="5%" align="center" nowrap bgcolor="#F0F0F0">:</th>
				  <td bgcolor="#F0F0F0">'.$_SERVER["REMOTE_ADDR"].'</td>
			  </tr>
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
			</table></td>
		  </tr>
		</table></td>
	  </tr>
	</table>';
	//echo $mail_body;exit;
	
	$mailto		= MASTER_MAIL;
	$mailheader = 'MIME-Version: 1.0' . "\r\n";
	$mailheader.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$mailheader.= 'From: '.$_SESSION['tm_dispname']." - ".$_SESSION['tm_desig']."<".$_SESSION['tm_email'].">". "\r\n";
	//$mailheader.= 'Cc: '.getApproverMail($_SESSION['tm_approver']). "\r\n";
	$mailheader.= 'Bcc: '.DEV_MAIL.'' . "\r\n";
	$mess		= date("d-m-Y").' - '.$_SESSION['tm_dispname'].' - ERP Application Success Idle Log-Out Attempt';
	//echo $mailto."<br>".$mess."<br>".$mail_body."<br>".$mailheader;exit;
	@mail($mailto,$mess,$mail_body,$mailheader);
	
	session_unset();
	session_destroy();
	header("location:../index.php");
	exit();
}else{
	header("location:../index.php");
	exit();
}
?>