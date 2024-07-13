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
                <h1><?=$portal_dtls['p_title'] ?><br> <span>Contact Us</span></h1>
                <p><a href="index.php">Home</a> &nbsp; > &nbsp; <a href="contact-us.php">Contact Us</a></p>
            </div>
        </div>  
    </div>
	
	<? 
		include("menu.php"); 
		if(isset($_GET['msg'])) echo $_GET['msg'];
	?>
    
    <!-- CONTENT START -->
    <section>
        <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="contact-info">
                    <h5>OUR OFFICE</h5>
                    <h2>Get In Touch</h2> 
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <form method="post" action="mail.php" name="contact">
                    <div class="messages"></div>
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="form_name" type="text" name="name" class="form-control customize-contact" placeholder="Name" required="required" data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_email" type="email" name="email" class="form-control customize-contact" placeholder="Email address" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_phone" type="tel" name="phone" class="form-control customize-contact" placeholder="Please enter your phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea id="form_message" name="message" class="form-control customize-contact" placeholder="Your message" rows="3" required="required" data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 submit-btn">
                                    <p><button type="submit" class="btn btn-custom">Send Message</button>
									<!--input type="submit" class="btn btn-custom" value="Send message"--></p>
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>  
              </div>
              <div class="col-lg-6 space-break">
                <div class="map">
                    <!--iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167616.99483399244!2d-74.08279002518668!3d40.67646407501496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a560db693e3%3A0xb05e8b0bdf854b54!2sGowanus%2C+Brooklyn%2C+Nueva+York%2C+EE.+UU.!5e0!3m2!1ses-419!2sdo!4v1560863423970!5m2!1ses-419!2sdo" class="map-iframe"></iframe-->  
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3799.9803316519174!2d83.31935531488142!3d17.7455658878649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb9f07daaa409775a!2zMTfCsDQ0JzQ0LjAiTiA4M8KwMTknMTcuNiJF!5e0!3m2!1sen!2sin!4v1647704804684!5m2!1sen!2sin"  class="map-iframe"></iframe>
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