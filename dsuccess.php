<?php
	include("application/includes/conn.php");
	$portal_dtls=get_data("portal_details","*","p_status=1");
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
                <h1><?=$portal_dtls['p_title'] ?><br> <span>Success</span></h1>
                <p><a href="index.php">Home</a> &nbsp; > &nbsp; <a href="contact-us.php">Success</a></p>
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
                    
                    <h2 align="center">Successfully Registered!</h2>
					<div class="row">
						<div class="col-md-6 submit-btn" align="center">
							<p><a href="index.php" class="btn btn-custom">Home Page</a></p>
						</div>
						<!--div class="col-md-6 submit-btn" align="center">
							<p><a href="pharma_login" class="btn btn-custom"> Pharmacy Login</a></p>
						</div-->
					</div>
					<br>
					<!--h6 align="right"-->
					<p>- Y to A - Prana Health Services Team</p>
					<!--/h6-->
                </div>  
              </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
              <div class="col-md-4 col-lg-4">
                <div class="contact-box">
                  <div class="phone-icon"><i class="fas fa-phone"></i></div>
                  <h3>Phone</h3>
                  <p>898-557-7209</p>
                  <p>807-430-6303</p>
                </div>  
              </div>
              <div class="col-md-4 col-lg-4 cb-center">
                <div class="contact-box">
                  <div class="phone-icon"><i class="fas fa-map-marker"></i></div>
                  <h3>Address</h3>
                  <p><?=$portal_dtls['p_address'] ?></p>
                </div>  
              </div>
              <div class="col-md-4 col-lg-4">
                <div class="contact-box">
                  <div class="phone-icon"><i class="fas fa-envelope"></i></div>
                  <h3>Email</h3>
                  <p><?=$portal_dtls['p_email']?></p>
                  <p>technical@ytoa-prana.com</p>
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