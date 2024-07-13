<?php

include_once("includes/conn.php");
//include_once("../incs/conn.php");
//if(!empty($_SESSION['UID'])){ header('location: html/dashboard.php'); exit; }
session_start();
$ip = $_SERVER["REMOTE_ADDR"];

if($_SERVER['REQUEST_METHOD']=="POST"){
	$qur	  = Query("select * from va_employees where emp_status=1 and emp_username='".secure($_POST['log_id'])."' and emp_password='".secure(rnsb64ende($_POST['log_pswd']))."'");
	$cnt_user = NumRows($qur);
	$row	  = Fetch($qur);
	
	if($cnt_user>0){
		//SUCCESS LOGIN MAIL
	
		//ADMIN-USER SESSIONS :
		if($row['emp_type']==1 || $row['emp_type']==2) { $emp_type=1; } else { $emp_type=$row['emp_type']; } 
		$_SESSION['ERP_timestamp'] = time(); //set new timestamp
		$_SESSION['ERP_Uid']	= $row['emp_id'];
		$_SESSION['ERP_Uname']	= (!empty($row['emp_dispname'])?$row['emp_dispname']:$row['emp_fname']." ".$row['emp_lname']);
		$_SESSION['ERP_Uemail']	= $row['emp_email'];
		$_SESSION['ERP_Utype']	= $emp_type;
		$_SESSION['ERP_Udept']	= $row['emp_desg_id'];
		$_SESSION['ERP_Udesg']	= $row['emp_desg_id'];
		$_SESSION['ERP_Uprivileges']=explode('|',$row['emp_privileges']);	
		// Remember me Login Details
		if(!empty($_POST['remember'])){
			setcookie("ah_log_id", $_POST['log_id'], time()+ (10*365*24*60*60));
			setcookie("ah_log_pswd", $_POST['log_pswd'], time()+ (10*365*24*60*60));
		}else{
			if(isset($_COOKIE['ah_log_id'])){ setcookie("ah_log_id",""); }
			if(isset($_COOKIE['ah_log_pswd'])){ setcookie("ah_log_pswd",""); }
		}
		
	//LOGIN-SUCCESS MAIL	
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
        <div style="width:70%; background:##3281C1" align="center">
        <div style=" border:1px solid #3281C1; padding:1px;">
		<table width="100%" border="0" align="center" cellpadding="5" cellspacing="2" bgcolor="#FFFFFF">
          <tr bgcolor="#9999FF">
            <td colspan="3" bgcolor="#F0F0F0" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="left"><a href="'.BASEURL.'" target="_blank"><img src="'.BASEURL.LOGO.'" alt="'.TITLE.'" height="110px" width="auto" border="0"></a></td>
                  <td align="right"><a href="#" target="_blank"><img src="'.BASEURL.RNSIM.'/logo.jpeg" alt="Group of Companies" width="150" border="0" align="middle"></a></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="3"><p><strong>Dear Sir,</strong></p>
                <p>Details for <strong class="price_green">ERP APPLICATION - Success</strong> Log-In Attempt :</p></td>
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
            <th width="5%" align="left" nowrap bgcolor="#F0F0F0">URL</th>
            <th width="5%" align="center" nowrap bgcolor="#F0F0F0">:</th>
            <td bgcolor="#F0F0F0"><a href="'.$baseurl.'" target="_blank">'.$baseurl.'</a></td>
          </tr>
          <tr>
            <th width="5%" align="left" nowrap bgcolor="#F0F0F0">Username</th>
            <th width="5%" align="center" nowrap bgcolor="#F0F0F0">:</th>
            <td bgcolor="#F0F0F0">'.$_POST["log_id"].'</td>
          </tr>
          <tr>
            <th width="5%" align="left" nowrap bgcolor="#F0F0F0">Password</th>
            <th width="5%" align="center" nowrap bgcolor="#F0F0F0">:</th>
            <td bgcolor="#F0F0F0">******</td>
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
        </table>
		</div></div>';
		
		//echo $mail_body;exit;
		
		$mailto		= MASTER_MAIL;
		$mailheader = 'MIME-Version: 1.0' . "\r\n";
		$mailheader.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$mailheader.= 'From: '.$_SESSION['ERP_Uname']."<".$_SESSION['ERP_Uemail'].">". "\r\n";
		$mailheader.= 'Bcc: '.DEV_MAIL.'' . "\r\n";
		$mess		= $_SESSION['ERP_Uname'].' - '.TITLE.' Success Log-In Attempt';
		header("location:html/dashboard.php");
	}else{

	//LOGIN-FAILURE MAIL
		$emp_name	= getdata("va_employees","emp_fname,emp_lname","emp_username='".$_POST['log_id']."'");
		$mail_body	= '<style type=text/css>
		td,th { font-family: Tahoma;font-size: 12px;}
		.Headings {font-family: Tahoma;font-size: 12px;  font-weight: bold; color:#228A07;}
		.Headings1 {font-family: Tahoma; font-size: 12px; font-weight: bold; color:#FB8A36; text-decoration:none}
		.name{ clear:#0B55C4; font-size:11px; font-weight:bold; padding-left:3px;}
		.price_green{font-family:Tahoma;font-size:12px;font-weight:bold; color:  #09B642 ; text-decoration:none; }
		.price_yellow{font-family:Tahoma;font-size:12px;font-weight:bold; color:  #FF9900 ; text-decoration:none; }
		.price_red{font-family:Tahoma;font-size:12px;font-weight:bold; color:#FF0000 ; text-decoration:none; }
		.blue_bold{font-family:Tahoma;font-size:12px;font-weight:bold; color: #4040FF ; text-decoration:none; }
		.blue_lighter{font-family:Tahoma;font-size:12px;font-weight:lighter; color:  #4040FF ; text-decoration:none; }
		.sub_heading_black{	height:20px;color:#000000;font-size:11px;padding-left:3px;}
		.main_heading_green { height:20px;color:#09B642;font-size:11px; font-weight:bold;padding-left:3px;}
		</style>		
        <div style="width:70%; background:##3281C1" align="center">
          
          <div style=" border:1px solid #3281C1; padding:1px;">
          	<table width="100%" border="0" align="center" cellpadding="5" cellspacing="2" bgcolor="#FFFFFF">
              <tr bgcolor="#9999FF">
                <td colspan="3" bgcolor="#F0F0F0" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="left"><a href="'.BASEURL.'" target="_blank"><img src="'.BASEURL.LOGO.'" alt="'.TITLE.'" height="110px" width="auto" border="0"></a></td>
                      <td align="right"><a href="#" target="_blank"><img src="'.BASEURL.ERPLOGO.'" alt="'.ERPTITLE.'" width="200" height="57" border="0" align="middle"></a></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td colspan="3"><p><strong>Dear Sir,</strong></p>
                    <p>Here is the details about <strong class="price_red">Application Failed</strong> Log-In Attempt :</p></td>
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
                <th width="5%" align="left" nowrap bgcolor="#F0F0F0">URL</th>
                <th width="5%" align="center" nowrap bgcolor="#F0F0F0">:</th>
                <td bgcolor="#F0F0F0"><a href="'.$baseurl.'" target="_blank">'.$baseurl.'</a></td>
              </tr>
              <tr>
                <th width="5%" align="left" nowrap bgcolor="#F0F0F0">Username</th>
                <th width="5%" align="center" nowrap bgcolor="#F0F0F0">:</th>
                <td bgcolor="#F0F0F0">'.$_POST["log_id"].'</td>
              </tr>
              <tr>
                <th width="5%" align="left" nowrap bgcolor="#F0F0F0">Password</th>
                <th width="5%" align="center" nowrap bgcolor="#F0F0F0">:</th>
                <td bgcolor="#F0F0F0">'.$_POST['log_pswd'].'</td>
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
            </table>
          </div>
        </div>';
		
		$mailto		= MASTER_MAIL;
		$mailheader = 'MIME-Version: 1.0' . "\r\n";
		$mailheader.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$mailheader.= 'From: '.$emp_name." <".$_POST['log_id'].">". "\r\n";
		$mailheader.= 'Bcc: '.DEV_MAIL.'' . "\r\n";
		$mess		= $_POST['log_id'].' - '.TITLE.' Failed Log-In Attempt';
		//@mail($mailto,$mess,$mail_body,$mailheader);
		echo '<script>alert("Invalid Username / Password ...");</script>';
	}
}
?>
<!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>

<meta charset="utf-8">
<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title><?php echo TITLE;?></title>
<meta http-equiv="cleartype" content="on">
<meta name="robots" content="noindex, nofollow">

<!-- Stylesheets -->
<link rel="stylesheet" href="css/styles.css" media="all">
<link rel="stylesheet" href="css/font-awesome.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){ 
	setInterval(function(){ $("#screen").load('irand.php')}, 2000);
});
</script>


</head>
<body>
<div style="margin-top:30px;">
    <div id="loginheader" style="background:#FFFFFF; padding:10px 0;" class="header-upper">
        <span style="margin-left:15px;"><img src="<?=BASEURL.LOGO;?>" alt="<?php echo TITLE;?>" width="" height="" align="absmiddle" ></span>
        <span class="logo_weberp4 fr" style="background:#FFFFFF"><a href="#" target="_blank"><img src="<?=BASEURL.ERPLOGO?>" alt="<?php echo ERPTITLE;?>" width="auto" height="" align="absmiddle"></a></span>
      <div class="clear"></div>
    </div>
</div>
    
<div class="loginbg_admin">
<div class="login_left" id="screen"></div> 
<div class="login">
    <h1 class="maintitle"><?php echo TITLE;?></h1>
    <h5 class="smltxt">Please Login to Access Application</h5>
    <div id="login-content">
        <form name="form_login" id="form_login" action="" method="post" autocomplete="on">
            <br>
            <input name="log_id" id="log_id" placeholder="Enter Username" type="text" value="<?php if(!empty($_COOKIE['ah_log_id'])){ echo $_COOKIE['ah_log_id']; }?>" required autofocus>
            <span id="next_view">
            <br><br><input name="log_pswd" id="log_pswd" placeholder="Enter Password" type="password" value="<?=(!empty($_COOKIE['ah_log_pswd'])? $_COOKIE['ah_log_pswd']:'');?>" required><br>
            <p><br><label><input name="remember" id="remember" type="checkbox" value="1" <?=(!empty($_COOKIE['ah_log_id'])? 'checked':'')?>>&nbsp;Remember me</label></p><p><input name="submit" id="submit" value="Sign In" class="button-green fl" type="Submit"></p>
            </span>
            <input type="hidden" id="Latitude" name="Latitude"/><input type="hidden" id="Longitude" name="Longitude"/>
            <div class="clear"></div>
        </form>
    </div>
</div>
<div class="clear"></div>
</div>
	
<div id="mainwrap" class="loginfooter">
    <span class="fl">&copy; <?=date("Y").' '.TITLE;?><em></em>, All Rights Reserved.</span>
    <span class="fr">Powered by <a href="#" title="Website Design, Development, Maintenance &amp; Powered by Group of Companies.," target="_blank">RLK</a></span>
    <div class="clear"></div>
</div>
</body>
</html>