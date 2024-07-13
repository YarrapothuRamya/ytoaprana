<?php
session_start();
	include("application/includes/conn.php");
	$portal_dtls=get_data("portal_details","*","p_status=1");
	
$cat_id=$_POST['cat_id'];
$cat_details=get_data('ytoa_diagnosticcat','*','diagnosticcat_id='.$cat_id);
$title=$cat_details['diagnosticcat_name']." Registration";


if(isset($_POST['submit']))
{
	unset($_SESSION['username']);
	$mobile="";
	$reg_count=getdata("ytoa_diagnostic","count(*)","diagnostic_phone='".$_POST['mobile']."'");
	
	if($reg_count==0)
	{	        
		$otp = rand(100000,999999);
		$result="";
		$n=5;

		$number=$_POST['mobile'];
	$text_message="Dear%20".$number.",%20Please%20Enter%20OTP%20".$otp."%20to%20verify%20your%20contact%20number%20for%20registration%20-%20YtoA-Prana%20Health%20Care%20Private%20Limited";
			//$text_message="Dear%20mithlesh,%20Please%20Enter%20OTP%2022222%20to%20verify%20your%20contact%20number%20for%20registration%20-%20YtoA-Prana%20Health%20Care%20Private%20Limited";
		
		$result=SendSMS($number,$text_message);	
		
		//echo $result.' - tested'; exit;
		$_SESSION['verify_otp']=$otp;
		$_SESSION['catid']=$_POST['cat_id'];
		$_SESSION['username']=$_POST['mobile'];
		
		//echo "OTP: ".$_SESSION['verify_otp']." Cat ID: ".$_SESSION['catid']." Sub Cat ID: ".$_SESSION['subcatid']."  Username: ".$_SESSION['username'];		exit;
		header("location: otp_d.php");
	}
	else
	{
	alert("Already you have registered with this number!...Please Contact Customer Care for more Details....!"); 
	}
}


?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
	
<!-- Mirrored from quickdevs.com/templates/denteur/contact-us-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Sep 2021 09:38:02 GMT -->
<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        
		<!-- TITLE -->
		<title><?=$portal_dtls['p_title']?></title>
        
        <!-- META TAGS -->
        <meta name="keywords" content="dental, care, clinic, clinics, dental care, dentist, doctors, health, healthcare, hospital, medical, pharmacy, treatment">

		<!--  FAVICON  -->
        <link rel="shortcut icon" href="img/master/favicon.png">
        
        <!-- BOOTSTRAP FRAMEWORK STYLES -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <!-- FONT AWESOME ICONS LIBRARY -->
        <link rel="stylesheet" href="fonts/css/all.min.css">
        
        <!-- MAIN CSS STYLE SHEET -->
        <link rel="stylesheet" href="css/navigation.css">
        <link rel="stylesheet" href="css/stylesheet.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/slick.min.css"> 
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        
        <!-- MODERNIZR LIBRARY -->
        <script src="js/modernizr-custom.js"></script>
        
	</head>
    
<body>
    
    <!-- LOADER START -->
 <?php include("loader.php"); ?>
    <!-- LOADER END -->

  

    <div class="sections">
        <div class="container">
            <div class="pages-title">
                <h1><?=$portal_dtls['p_title'] ?><br> <span>Verify Mobile</span></h1>
                <p><a href="index.php">Home</a> &nbsp; > &nbsp; <a href="index.php">Back</a></p>
            </div>
        </div>  
    </div>
	
	<? 
		include("menu.php"); 
		if(isset($_POST['msg'])) echo $_POST['msg'];
	?>
    
    <!-- CONTENT START -->
    <section>
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="contact-info">
                    <h2>Verify Mobile</h2> 
                    <form method="POST" name="regis" onsubmit="return validate()" enctype="multipart/form-data">
                    <div class="messages"></div>
					Mobile Number
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
										<input type="hidden" name="cat_id" value="<?=$cat_id?>" readonly>
                                        <input id="form_phone" type="tel" name="mobile" class="form-control customize-contact" placeholder="Please enter your phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 submit-btn">
                                    <p><!--button type="submit" class="btn btn-custom">Send OTP</button-->
                                <input type="submit" value="Submit" name="submit" class="btn btn-custom">
									<!--input type="submit" class="btn btn-custom" value="Send message"--></p>
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>  
              </div>
            </div>
        </div>

    </section> 
    <!-- CONTENT END -->

    <?php include("footer.php"); ?>
    
    <!--SCROLL TOP START-->
    <a href="#0" class="cd-top">Top</a>
    <!--SCROLL TOP START-->

    <!-- JAVASCRIPTS -->
    <script src="js/plugins.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/navigation.js"></script>
    <!-- JAVASCRIPTS END -->

    <!-- GOOGLE ANALYTICS -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-101241150-1', 'auto');
      ga('send', 'pageview');
    </script>
    <!-- GOOGLE ANALYTICS END -->
    
    </body>
    

<!-- Mirrored from quickdevs.com/templates/denteur/contact-us-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Sep 2021 09:38:02 GMT -->
</html>

  <script type="text/javascript">
      function validate(){
        var mobile = document.forms["regis"]["mobile"].value;
 if(mobile==""){
 alert("Please Enter Phone Number");
 return false;
 }else{
  var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  var y=phoneno.test(mobile);
   if (y) {
   } else {
      alert("Mobile No you entered is not valid");
      return false;
   }
 } 
 }
</script>