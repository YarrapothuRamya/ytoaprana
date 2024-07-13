<?php
//define("MBCC",	"katurilokesh7@gmail.com");

/*
$mail_body ="<style type='text/css'>
	body, td, th {
		font-family: Verdana;
		font-size:12px;
		color:#333333;
	}
	.borblue {
		border: 2px solid #111111;
	}
	.textfont {
		font-family:Verdana;
		font-size:13px;
		color:#000000;
		padding-left:10px;
		line-height:22px;
	}
	.givendata {
		font-family:Verdana;
		font-size:12px;
		font-size:bold;
		color:#ffffff;
	}
	.tdbg {
		background-color:#44AFD5;
	}
	.heading {
		color:#5C5C5C;
		background-color:#F2FBFF;
		font-size:12px;
		padding-left:8px;
	}
	.color {
		color:black;
	}
	.Left-Bullet {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 11px;
		font-weight: bold;
		color: #EA9336;
	}
	.style2 {
		color: #FFFFFF;
		font-weight: bold;
	}
	</style>
	<table width='550' border='0' align='center' cellpadding='5' cellspacing='0' style='border-bottom:2px solid #aaa'>
	  <tr>
		<td align='left' valign='middle' style='border-bottom:1px solid #DBDBDB'><img src='http://meuniversal.com/images/logo.png' width='221' height='52'></td>
	  </tr>
	  <tr>
		<td height='40' align='left' valign='middle' bgcolor='#c3272f' style='border-bottom:1px solid #DBDBDB'><span class='style2'>&nbsp;&nbsp;contact</span></td>
	  </tr>
	  <tr>
		<td align='center' valign='top' bgcolor='#F2F2F2'><table  border='0' align='left' cellpadding='5' cellspacing='1' width='100%'>
			<tr>
			  <td width='1%' align='left' class='textfont'>Name</td>
			  <td width='1%' align='center'><strong>:</strong></td>
			  <td align='left' class='color'>Lokesh MBCCTEST</td>
			</tr>
			<tr>
			  <td align='left' class='textfont'>E-Mail</td>
			  <td align='center'><strong>:</strong></td>
			  <td align='left' class='color'>katurilokesh7@gmail.com</td>
			</tr>
			<tr>
			  <td align='left' nowrap class='textfont'>Mobile No.</td>
			  <td align='center'><strong>:</strong></td>
			  <td align='left' class='color'>9987458745</td>
			</tr>
			<tr>
			  <td align='left' nowrap class='textfont'>Service</td>
			  <td align='center'>:</td>
			  <td align='left' class='color'>Smart Consulting</td>
			</tr>
			<tr>
			  <td align='left' class='textfont'>Country</td>
			  <td align='center'>:</td>
			  <td align='left' class='color'>Aruba</td>
		  </tr>
			<tr>
			  <td align='left' class='textfont'>Message</td>
			  <td align='center'><strong>:</strong></td>
			  <td align='left' class='color'>Test</td>
			</tr>
			<tr>
			  <td align='left' nowrap class='textfont'>IP Address</td>
			  <td align='center'><strong>:</strong></td>
			  <td align='left' class='color'>66.248.202.9</td>
			</tr>
		</table></td>
	  </tr>
	</table>";
	
/*$mailto="lokesh@bitragroup.com";
$mailheader = 'MIME-Version: 1.0' . "\r\n";
$mailheader.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$mailheader.="From:  <apsubmit@secureserver.net>\r\n";
$mailheader.= "Bcc: ".MBCC."\r\n";
@mail($mailto,$message,$mail_body,$mailheader, '-f apsubmit@secureserver.net');*/

   //echo $mail_body;exit;
   
        $mailto	= "registration@bairisons.com";
		$subject = "PHP Mail Test script";
		$mailheader = 'MIME-Version: 1.0' . "\r\n";
		$mailheader.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$mailheader.="From:  <registration@bairisons.com>\r\n";
		//$mailheader.= "Bcc: ".MBCC."\r\n";
		$mailheader.= 'Reply-To: lokesh@bitragroup.com' . "\r\n";
		$message	= "Test123456987Testerp";
		@mail($mailto,$subject,$message,$mailheader);




/*
    $from = "apsubmit@secureserver.net";
    $to = "katurilokesh7@gmail.com";
    $subject = "PHP Mail Test script";
    $message = "This is a test to check the PHP Mail functionality";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "Test";*/
	
	
?>