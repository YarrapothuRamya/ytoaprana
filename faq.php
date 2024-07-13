<?php
	include("application/includes/conn.php");
	$portal_dtls=get_data("portal_details","*","p_status=1");
?>
<!DOCTYPE html>
<html lang="en-US" class="no-js">
	
<!-- Mirrored from quickdevs.com/templates/denteur/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Sep 2021 09:33:57 GMT -->
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

	<? 
		include("menu.php"); 
	?>
    
    <div class="sections">
        <div class="container">
            <div class="pages-title">
                <h1><?=$portal_dtls['p_title'] ?><br> <span>FAQ</span></h1>
                <p><a href="#">Home</a> &nbsp; > &nbsp; <a href="faq.php">Frequently Asked Questions</a></p>
            </div>
        </div>  
    </div>
    
    <!-- CONTENT START -->
    <section>
        <!-- FAQ START -->
        <div class="container">
            <div class="accordion-title">
                <h2>Frequently Asked Questions</h2>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
            </div>
            <ul class="accordion">
<?php
	$fqry=Query("select * from ytoa_faq where faq_status=1");
	while($frow=Fetch($fqry)){
?>
                <li>
                    <a><?=$frow['faq_qus']?></a>
                    <p><?=$frow['faq_ans']?></p>
                </li>
	<?php } ?>
            </ul> <!-- / accordion -->
        </div>

        <div class="container">
            <div class="row">
              <div class="col-lg-4 content-box">
                <a href="contact-us.php" target="_blank">
                    <div class="icon-circle"><i class="fas fa-phone"></i></div>
                    <h3>Contact Us</h3>
                    <p>898-557-7209</p>
                  <p>807-430-6303</p>
                </a>
                  <h5><a href="contact-us.php">Call Us</a></h5>
              </div>
              <div class="col-lg-4 content-box middle-box center-box">
                <a href="contact-us.php" target="_blank">
                    <div class="icon-circle"><i class="fas fa-life-ring"></i></div>
                    <h3>Need Help?</h3>
                    <p><?=$portal_dtls['p_email']?></p>
                  <p>support@ytoa-prana.com</p>
                </a>
                <h5><a href="contact-us.php">Send an Email</a></h5>
              </div>
              <div class="col-lg-4 content-box">
                <a href="contact-us.php" target="_blank">
                    <div class="icon-circle"><i class="fas fa-clock"></i></div>
                    <h3>Working Hours</h3>
                    <p>Monday – Friday 8:30 – 18:00</p>
                    <p>Saturday 9:00 – 14:00</p>
                </a>
                <h5><a href="contact-us.php">Visit Our Office</a></h5>
              </div>
            </div>  
        </div>
        <!-- FAQ START -->
    </section> 
    <!-- CONTENT START -->

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
    

<!-- Mirrored from quickdevs.com/templates/denteur/faq.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Sep 2021 09:33:57 GMT -->
</html>