<?php
	include("application/includes/conn.php");
	$portal_dtls=get_data("portal_details","*","p_status=1");

?>
<!DOCTYPE html>
<html lang="en-US" class="no-js">
	
<!-- Mirrored from quickdevs.com/templates/denteur/doctors-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Sep 2021 09:33:54 GMT -->
<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        
		<!-- TITLE -->
		<title><?=$portal_dtls['p_title']?> - Best Portal in Visakhapatnam</title>
        
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

    <!--HEADER START-->
    <header>
<?php 
	include("header.php"); 
//	include("doc_header.php");
?>
    </header>
    <!--HEADER END-->

<?php 
	$pharmadtls=get_data("ytoa_pharma","*","pharma_id=".$_GET['pharmaid']);
//	$speciality=getdata("ytoa_regsub_cat","regsubc_name","regsubc_status=1 and regsubc_id=".$docdtls['doc_reg_subcat']);
	$speciality="Pharmacy";
?>
    <div class="sections">
        <div class="container">
            <div class="pages-title">
                <h1>INDIA<br> <span><?=$portal_dtls['p_title'] ?></span></h1>
                <p><a href="#">Home</a> &nbsp; > &nbsp; <a href="#"><?=$speciality?></a></p>
            </div>
        </div>  
    </div>
    
    <!-- CONTENT START -->
    <section>
        <div class="container">
            <div class="row">
              <!-- DOCTOR SIDEBAR START -->
              <div class="col-lg-4">
                <aside class="doctor">
				<?php if(empty($pharmadtls['image']))
						$image="noavatar.png";
					else
						$image=$pharmadtls['image'];
				?>

                  <figure class="doctor-portrait"><img src="uploads/pharmacy_photos/<?=$image?>" alt="<?=ucfirst($pharmadtls['pharma_name'])?>"></figure>
                  <div class="doctor-caption">
                    <h3>M/s. <?=ucfirst($docdtls['pharma_name'])." ".ucfirst($docdtls['pharma_lname'])?></h3>
                    <p class="profession"><?=$speciality?></p>
                    <hr class="d-divider">
                    <p><?=ucfirst($pharmadtls['pharma_singleline'])?></p>
                    <hr class="d-divider">
                    <h4>Contact Information</h4>
                    <div class="contact-list">
                        <p class="office">+ 91 <?=$portal_dtls['p_phno']?></p>  
                        <p class="phone">+ 91 *** *** ****</p>  
                        <p class="mail">support@ytoa-prana.com</p>  
                    </div>
                    <hr class="d-divider">
                    <div class="d-schedule">
                      <div class="schedule-header">
                        <figure class="clock-svg"><img src="img/master/clock-time.svg" alt=""></figure>
                        <div class="d-caption">
                            <h5>Working hours</h5>  
                            <p>Available Timings</p>
                        </div>
                        <div class="span-schedule">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="#">Monday to Friday</a>
                                <span class="badge badge-primary badge-pill">9:00 AM - 5:00 PM</span>
                              </li>
                              <li class="list-group-item"><a href="#">Saturday</a>
                                <span class="badge badge-primary badge-pill">9:00 AM - 4:00 PM</span>
                              </li>
                              <li class="list-group-item"><a href="#">Sunday</a>
                                <span class="badge badge-primary badge-pill">9:00 AM - 1:00 PM</span>
                              </li>
                            </ul>
                        </div>
                      </div>
                      <hr class="d-divider">
                      <div class="d-social">
                        <!--div class="d-social-icons"><p><a href="#"><i class="fab fa-facebook-f"></i></a></p></div>  
                        <div class="d-social-icons"><p><a href="#"><i class="fab fa-twitter"></i></a></p></div>  
                        <div class="d-social-icons"><p><a href="#"><i class="fab fa-linkedin-in"></i></a></p></div>  
                        <div class="d-social-icons"><p><a href="#"><i class="fab fa-instagram"></i></a></p></div-->  
                      </div>
                    </div>
                  </div>
                </aside>
              </div>
              <!-- DOCTOR SIDEBAR END -->
                
              <!-- DOCTOR CONTENT START -->
              <div class="col-lg-8 space-break">
                <div class="doctor-information">
                  <h3>About Pharmacy</h3>
                  <hr class="d-divider">
                  <p><?=$pharmadtls['pharma_about']?></p>
                    
                  <h3>Experience</h3>
                  <hr class="d-divider">
                  <h4><?=$pharmadtls['pharma_exptitle']?></h4>
                  <p><?=$pharmadtls['pharma_expdtls']?></p>
                    
                  <h3>Contact Pharmacy <?=$pharmadtls['pharma_name']?></h3>
                  <hr class="d-divider">
                  <div class="contact-doctor">
                    <form method="post" action="pharma_mail.php">
                        <div class="messages"></div>
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="form_name" type="text" name="pharmacon_name" class="form-control customize-contact" placeholder="Name" required="required" data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="form_email" type="email" name="pharmacon_email" class="form-control customize-contact" placeholder="Email address" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea id="form_message" name="pharmacon_message" class="form-control customize-contact" placeholder="Your message" rows="6" required="required" data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
<input id="pharma_id" type="hidden" name="pharmacon_pharmaid" class="form-control customize-contact" placeholder="Pharmacy ID" required="required" value="<?=$_GET['pharmaid']?>" data-error="Pharmacy ID is required.">
                            </div>
                            <div class="row">
                                <div class="col-md-12 submit-btn">
                                    <p><input type="submit" class="btn btn-custom" value="Send message"></p>
                                </div>
                            </div>
                        </div>
                    </form>   
                  </div>
                </div>
             </div>
             <!-- DOCTOR CONTENT END -->
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
    

<!-- Mirrored from quickdevs.com/templates/denteur/doctors-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Sep 2021 09:33:57 GMT -->
</html>