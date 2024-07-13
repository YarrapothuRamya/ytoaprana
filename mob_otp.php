<?php
	session_start();
	include("application/includes/conn.php");
	$portal_dtls=get_data("portal_details","*","p_status=1");
	
	if(isset($_POST['submit']))
{
	$otp=$_SESSION['verify_otp'];
	if(strcmp($otp,$_POST['otp'])==0)
	{
		header("location:doctor_reg.php");
	}
	else
	{
		alert("OTP what you have entered is Wrong....!"); 
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
                <h1><?=$portal_dtls['p_title'] ?><br> <span>Mobile Verification</span></h1>
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
                    <h2>Mobile Verification</h2> 
                    <form method="POST" name="regis" enctype="multipart/form-data">
                    <div class="messages"></div>
					OTP
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
										<input type="hidden" name="cat_id" value="<?=$_SESSION['catid']?>">
										<input type="hidden" name="subcat_id" value="<?=$_SESSION['subcatid']?>">
                                        <input id="form_phone" type="tel" name="otp" class="form-control customize-contact" placeholder="Please enter OTP">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 submit-btn">
                                    <p><!--button type="submit" class="btn btn-custom">Send OTP</button-->
                                <input type="submit" value="Submit OTP" name="submit" class="btn btn-custom">
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

 