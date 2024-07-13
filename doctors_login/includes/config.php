<?php
global $now,$ymd,$dmy,$now_time,$now_onlytime,$bcc_mail,$frommail,$email_ext,$mastermail,$getid;
$cond="";$height="";$cnt="";$sub_qur="1";$path="";$code="";

date_default_timezone_set("Asia/Kolkata");
//date_default_timezone_set("America/Mexico_City");
//Local
$baseurl	= 'http://localhost/ytoaprana/doctors_login/';
$baseurl_front	= 'http://localhost/ytoaprana/';


$keyId='rzp_test_xsRJDlfrxW9hyS';
$keySecret='28ZmqH6odgJ4uH95bNej0wCU';
$displayCurrency='INR';

//Live
//$baseurl	= 'http://'.$_SERVER['SERVER_NAME'].'/doctors_login/';
//$baseurl_front	= 'http://'.$_SERVER['SERVER_NAME'].'/';
$dir =str_replace ("\\", "/",dirname(__FILE__));define( 'DS', '/' );
if (!defined('RNSAP')) define('RNSAP', $dir .DS);
define('RNSFI', basename($_SERVER['SCRIPT_NAME'],".php"));
define('RNSDD', '..'.DS);
define('RNSTM', "rnsbuild.php");
define('RNSIN', 'includes'.DS);
define('RNSHT', 'html'.DS);
define('RNSVI', 'views'.DS);
define('RNSIM', 'images'.DS);
define('RNSUP', 'uploads'.DS);
define("BASEURL", $baseurl);
define("BASEURLF", $baseurl_front);
//define("LOGO", "images/logo_application.png");
define("LOGO", "images/logo.png");
define("TITLE", "Doctors Panel");
define("ERPLOGO", "images/logo_erp4.jpeg");
define("ERPTITLE", "Web-ERP");
// Mail Ids
//define("DEV_MAIL", "ramya@bitragroup.com");
define("MASTER_MAIL", "technical@ytoa-prana.com");
define("FROM_MAIL", "support@ytoa-prana.com");
define("REG_MAIL", "technical@ytoa-prana.com");
define("FROM_NAME", "YtoA-Prana Health Care Private Limited");
define("BCC_MAIL", "ramyayarrapothu@outlook.com");

$cur_month=date('m');
$file			= basename($_SERVER['REQUEST_URI'], '?' .$_SERVER['QUERY_STRING']);
$page			= basename($_SERVER['SCRIPT_NAME']);
$config['samaya']=array("now"=>date("Y-m-d"),"ymd"=>date("Ymd"),"dmy"=>date("d-m-Y"),"now_time"=>date("Y-m-d H:i:s"),"now_onlytime"=>date("H:i"),"month_year"=>date("F Y"));
$config['ftypes']=array('ft_doc'=>"txt,doc,xls,ppt,mdb,pdf,chm",'ft_img'=>"jpeg,jpg,gif,png,bmp,tiff",'ft_aud'=>"mp3,rm",'ft_vid'=>"wav,wmp,avi,flv,3gpp",'ft_com'=>"zip,rar",'ft_oth'=>"tpb,swf",'ft_mix'=>'pdf,doc,docx,xls,xlsx,ppt,pptx,txt,rtf,gif,jpg');
$config['sitearr']=array("site_tit"=>FROM_NAME,"site_url"=>$baseurl,"logo"=>"logo_application.png");

$config['gall_cat']=array("1"=>"Photo Gallery","Video Gallery");
$config['reg_type']=array("1"=>"Registration","2"=>"Donor");
$config['states']=array("AL"=>"AL","AK"=>"AK","AZ"=>"AZ","AR"=>"AR","CA"=>"CA","CO"=>"CO","CT"=>"CT","DE"=>"DE","DC"=>"DC","FL"=>"FL","GA"=>"GA","HI"=>"HI","ID"=>"ID","IL"=>"IL","IN"=>"IN","IA"=>"IA","KS"=>"KS","KY"=>"KY","LA"=>"LA","ME"=>"ME","MD"=>"MD","MA"=>"MA","MI"=>"MI","MN"=>"MN","MS"=>"MS","MO"=>"MO","MT"=>"MT","NE"=>"NE","NV"=>"NV","NH"=>"NH","NJ"=>"NJ","NM"=>"NM","NY"=>"NY","NC"=>"NC","ND"=>"ND","OH"=>"OH","OK"=>"OK","OR"=>"OR","PA"=>"PA","RI"=>"RI","SC"=>"SC","SD"=>"SD","TN"=>"TN","TX"=>"TX","UT"=>"UT","VT"=>"VT","VA"=>"VA","WA"=>"WA","WV"=>"WV","WI"=>"WI","WY"=>"WY","Other"=>"Other","India"=>"India");
$config['pre_cat']=array("1"=>"Upcoming Predictions","2"=>"Recent True Prediction");
$config['gall_cat']=array("1"=>"Photo Gallery","Astrology Research & Analysis Gallery");
$config['tc_status']=array("1"=>"Given","2"=>"Not Given");
$config['gen_status']=array('No','Yes');
$config['gender_arr']=array("1"=>"Male","2"=>"Female");
$config['marital_status_arr']=array("1"=>"Single","2"=>"Married");
$config['weekdays_arr']=array("1"=>'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
$config['enquiry_type_arr']=array("1"=>'Hot', 'Warm', 'Cold', 'No-Response', 'Confirmed');
$config['pvalidity']=array("1"=>'Day', 'Month', 'Year');
$config['ostatus']=array(1=>'Pending','Paid','Confirmed','Failed');
$config['ccard_type']=array('','Visa','Visa Electron','Master','Maestro','Discover','Amex');
$config['cur_unit_type']=array('AUD'=>'Australian dollar ','BRL'=>'Brazilian real 2 ','CAD'=>'Canadian dollar ','CZK'=>'Czech koruna ','DKK'=>'Danish krone ','EUR'=>'Euro ','HKD'=>'Hong Kong dollar ','HUF'=>'Hungarian forint 1 ','ILS'=>'Israeli new shekel ','JPY'=>'Japanese yen 1 ','MYR'=>'Malaysian ringgit 2 ','MXN'=>'Mexican peso ','TWD'=>'New Taiwan dollar 1 ','NZD'=>'New Zealand dollar ','NOK'=>'Norwegian krone ','PHP'=>'Philippine peso ','PLN'=>'Polish zloty ','GBP'=>'Pound sterling ','RUB'=>'Russian ruble ','SGD'=>'Singapore dollar ','SEK'=>'Swedish krona ','CHF'=>'Swiss franc ','THB'=>'Thai baht ','USD'=>'United States dollar ');
$config['color_arr']=array(1=>'col_gre',2=>'col_red',3=>'col_ora');
//$folder_arr=array(1=>"photo/",2=>"astro/");
$config['folder_arr']=array(1=>'gallery/',2=>'news/');
$config['prodcat_ls']=array(1=>'Grocery',2=>'Household',3=>'Textiles',4=>'Agro Inputs',5=>'Stationary');

$incFILE = RNSVI.RNSFI.".php";//BASEURL.RNSHT.

if(!empty($_GET['id'])){$getid=$_GET['id'];} else {$getid="";}
if(!empty($_GET['pg'])){$pg=$_GET['pg'];} else {$pg="Manage";}
if(!empty($_GET['msg'])){ $errmsg=$_GET['msg']; }

//mail template
$mail_template="
		<style type='text/css'>
		 body,td,th { font-family:Tahoma; font-size:12px; font-weight:normal; color:#333333;	}
		 a:link,a:visited,a:hover,a:active{outline: none;  -moz-outline-style: none; color: #0B55C4; text-decoration: none;font-family: Verdana,  Arial, Helvetica, sans-serif;}
		 a:hover {color: #C81A1A; }
		 table.datatable td {background-color:#EBEFF9;	border-bottom: 2px solid #FFF; }
		.insub:link{font-size:11px; font-family: Verdana,  Arial, Helvetica, sans-serif; color:#000;  text-decoration:underline;}
		.insub:visited{font-size:11px; font-family: Verdana,  Arial, Helvetica, sans-serif; color:#000;  text-decoration:underline;}
		.insub:hover{font-size:11px; font-family: Verdana,  Arial, Helvetica, sans-serif; color: #FF3300;  text-decoration:none;}
		.insub:active{font-size:11px; font-family: Verdana,  Arial, Helvetica, sans-serif; color:#000;  text-decoration:underline;}
		.heading-red { color: #FF0000; font: small-caps bold 14px Tahoma; }
		.heading-orange { color: #5B3B54; font: small-caps bold 18px Tahoma; }
		.inner-heading-orange {font-family: Trebuchet MS; color: #0092DF; font-size: 13px; font-weight: bold;}
		.textorange {color: #FF6600}
		</style>
		<table align='center' width='760' cellpadding='0' cellspacing='1' bgcolor='#AECDF6' bordercolor='#DDF0FD' border='5'>
		  <tr>
			<td bgcolor='#FFFFFF'><table width='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
			  <tr>
				<td><a href='http://localhost/swasthcare/ytoaprana/' target='_blank'><img src='".BASEURL.LOGO."' alt='".TITLE."'></a></td>
			  </tr>
			  <tr>
				<td  colspan='2' bgcolor='#2D88C6' height='5'></td>
			  </tr>
			</table></td>
		  </tr>
		  <tr>
			<td align='center' valign='middle' bgcolor='#FFFFFF'><table width='100%' border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
			  <tr>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td align='center' valign='top'><table width='90%' border='0' cellpadding='8' cellspacing='1' bgcolor='#FFFFFF'>
				  <tr class='uid'>
					<td align='left' ><strong>Dear</strong>&nbsp;<span class='heading-orange'><strong>disname</strong></span><span class='uid'>, </span></td>
				  </tr>
				  <tr>
					<td align='left' class='uid'>{bodycontent}</td>
				  </tr>
				  <tr>
					<td align='left'>
						{sig}
					</td>
				  </tr>
				  <tr>
					<td align='left' >&nbsp;</td>
				  </tr>
				</table></td>
			  </tr>
			</table></td>
		  </tr>
		</table>
	";
// end mail template
?>