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
<?php include("header.php"); ?>
        
        <!--NAVBAR START-->
        <div class="main-nav" id="navbar">
            <div class="container">
                <nav id="navigation1" class="navigation">
                    <div class="nav-header">
                        <a class="nav-logo" href="index.php">
                            <img src="img/images/logo.png"  class="white-logo" alt="">
                        </a>
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper">
                        <ul class="nav-menu align-to-right">
                            <li><a href="#">HOME</a>
                            </li>
                            <li><a href="#">About</a>
                                <ul class="nav-dropdown">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="#">Doctors</a></li>
                                    <li><a href="#">Doctor Staff</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Pricing</a></li>
                                </ul>
                            </li>
                            <li><a href="services.html">SERVICES</a></li>
                            <li><a href="#">DEPARTMENTS</a>
                                <ul class="nav-dropdown">
                                    <li><a href="department-endodontic.html">Endodontic</a></li>
                                    <li><a href="department-periodontics.html">Periodontics</a></li>
                                    <li><a href="department-prosthodontics.html">Prosthodontics</a></li>
                                    <li><a href="department-surgery.html">Surgery</a></li>
                                    <li><a href="department-orthodontic.html">Orthodontic</a></li>
                                    <li><a href="family-dentistry.html">Family Dentistry</a></li>
                                </ul>
                            </li> 
                            <li><a href="#">BLOGS</a>
                            </li>
                            <li><a href="#">CONTACT</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--NAVBAR END-->         
    </header>
    <!--HEADER END-->

    <div class="sections">
        <div class="container">
            <div class="pages-title">
                <h1>INDIA<br> <span><?=$portal_dtls['p_title'] ?></span></h1>
                <p><a href="#">Home</a> &nbsp; > &nbsp; <a href="#">MBBS General</a></p>
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
                  <figure class="doctor-portrait"><img src="img/doctors/yaswanth.jpg" alt=""></figure>
                  <div class="doctor-caption">
                    <h3>Dr. Yaswanth</h3>
                    <p class="profession">MBBS General</p>
                    <hr class="d-divider">
                    <p>From teenagers to seniors, men and women of all ages schedule their annual visit with their family Health Issues.</p>
                    <hr class="d-divider">
                    <h4>Contact Information</h4>
                    <div class="contact-list">
                        <p class="office">+ 91 798 126 4498</p>  
                        <p class="phone">+ 91 798 126 4498</p>  
                        <p class="mail">swasthcareindia@swasthcareindia.com</p>  
                    </div>
                    <hr class="d-divider">
                    <div class="d-schedule">
                      <div class="schedule-header">
                        <figure class="clock-svg"><img src="img/master/clock-time.svg" alt=""></figure>
                        <div class="d-caption">
                            <h5>Working hours</h5>  
                            <p>At vero eos et accusamus et iusto odio.</p>
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
                        <div class="d-social-icons"><p><a href="#"><i class="fab fa-facebook-f"></i></a></p></div>  
                        <div class="d-social-icons"><p><a href="#"><i class="fab fa-twitter"></i></a></p></div>  
                        <div class="d-social-icons"><p><a href="#"><i class="fab fa-linkedin-in"></i></a></p></div>  
                        <div class="d-social-icons"><p><a href="#"><i class="fab fa-instagram"></i></a></p></div>  
                      </div>
                    </div>
                  </div>
                </aside>
              </div>
              <!-- DOCTOR SIDEBAR END -->
                
              <!-- DOCTOR CONTENT START -->
              <div class="col-lg-8 space-break">
                <div class="doctor-information">
                  <h3>About Doctor</h3>
                  <hr class="d-divider">
                  <p>Dra. Sara Jones trained General Practice Family Doctor. He graduated in 1991 from Toulouse Rangueil University of Medicine France and has additional qualifications in ultrasound, additions, emergency medicine, traumatology and pneumology..</p>
                    
                  <p>After his military service in the air force, he has worked for more than 15 years in the French countryside and mountainous regions including in some remote places and ski resorts she has extensive medical experience across general medicine, emergency medicine, radiology, trauma, pneumology, addictions and paediatrics.</p>
                    
                    
                  <h3>Experience</h3>
                  <hr class="d-divider">
                  <h4>Medicalcare Hospital:</h4>
                  <p>Begin getting tested for human papillomavirus. Common among this age group, HPV often has no symptoms. If left untreated, some strains of HPV can cause cervical cancer, genital warts or head and neck cancer.</p>
                    
                  <h4>Hospiten Inc:</h4>
                  <p>Congress of Obstetrics and Gynecology’s recommendation, women should start getting a mammogram at age 40. If there’s a strong family history of breast cancer, such as a mother or sibling, the recommendation</p>
                 
                  <h3>Contact Dr. Yaswanth</h3>
                  <hr class="d-divider">
                  <div class="contact-doctor">
                    <form id="contact-form" method="post" action="http://quickdevs.com/templates/denteur/contact.php">
                        <div class="messages"></div>
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="form_name" type="text" name="name" class="form-control customize-contact" placeholder="Name" required="required" data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="form_email" type="email" name="email" class="form-control customize-contact" placeholder="Email address" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea id="form_message" name="message" class="form-control customize-contact" placeholder="Your message" rows="6" required="required" data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
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

    <!-- FOOTER START -->
    <footer>
        <div class="container">
            <div class="row">
              <div class="col-lg-3">
                <div class="footer-col">
                  <figure class="footer-logo"><img src="img/master/logo-footer.png" alt=""></figure>
                  <p>Denteur care about dental promote dental health through organized.</p>
                  <div class="footer-icon">
                    <div class="span-fi">
                        <div class="fi-fas"><i class="fas fa-map-marker"></i></div>
                        <div class="fi-caption">
                            <p>PO BOX 33195 NW 56th ST Miami, Florida</p>  
                        </div>
                    </div> 
                    <div class="span-fi">
                        <div class="fi-fas"><i class="fas fa-phone"></i></div>
                        <div class="fi-caption">
                            <p>Call US: + 1 800 722 8987</p>  
                        </div>
                    </div> 
                    <div class="span-fi">
                        <div class="fi-fas"><i class="fas fa-envelope"></i></div>
                        <div class="fi-caption">
                            <p>info@denteur.com</p>  
                        </div>
                    </div>  
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="footer-col">
                  <h4>RECENT POSTS</h4>
                  <div class="media-post">
                      <figure class="media-thumb"><a href="#"><img src="img/images/blog-thumb.jpg" alt=""></a></figure>
                      <div class="media-caption">
                        <h5>What Causes Periocoronitis</h5>
                        <p>24 July 2019</p>
                      </div>
                  </div>
                  <hr class="divider">  
                  <div class="media-post">
                      <figure class="media-thumb"><a href="#"><img src="img/images/blog-thumb2.jpg" alt=""></a></figure>
                      <div class="media-caption">
                        <h5>Gingivitis Causes and Treatment</h5>
                        <p>22 July 2019</p>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="footer-col">
                  <h4>TAGS</h4>
                  <div class="popular-links">
                    <ul>
                        <li><a href="about-us-1.html">About Us</a></li>
                        <li><a href="blog-grid.html">Blogs & News</a></li>
                        <li><a href="contact-us-1.html">Contact US</a></li>
                        <li><a href="services.html">Our Services</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                    </ul>  
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="footer-col last-col">
                  <h4>INSTAGRAM PHOTOS</h4>
                  <div class="footer-grid-box">
                    <div class="row">
                      <div class="col-4 col-sm-2 col-md-2 col-lg-4 gb-photos">
                        <a href="#"><img src="img/images/img15.jpg" alt=""></a>
                      </div>
                      <div class="col-4 col-sm-2 col-md-2 col-lg-4 gb-photos">
                        <a href="#"><img src="img/images/img27.jpg" alt=""></a>
                      </div>
                      <div class="col-4 col-sm-2 col-md-2 col-lg-4 gb-photos">
                        <a href="#"><img src="img/images/img28.jpg" alt=""></a>
                      </div>
                      <div class="col-4 col-sm-2 col-md-2 col-lg-4 gb-photos">
                        <a href="#"><img src="img/images/img29.jpg" alt=""></a>
                      </div>
                      <div class="col-4 col-sm-2 col-md-2 col-lg-4 gb-photos">
                        <a href="#"><img src="img/images/img30.jpg" alt=""></a>
                      </div>
                      <div class="col-4 col-sm-2 col-md-2 col-lg-4 gb-photos">
                        <a href="#"><img src="img/images/img31.jpg" alt=""></a>
                      </div>
                    </div>  
                  </div>
                </div>
              </div>
            </div>
            <hr class="divider">
            <div class="footer-bottom">
                <div class="fb-copyright">
                    <p>© 2021 Swasth Care India - Portal</p>
                </div>
                <div class="fb-social">
                    <div class="span-fb-social"><a href="#"><i class="fab fa-facebook-f"></i></a></div>
                    <div class="span-fb-social"><a href="#"><i class="fab fa-twitter"></i></a></div>
                    <div class="span-fb-social"><a href="#"><i class="fab fa-linkedin-in"></i></a></div>
                    <div class="span-fb-social last-box"><a href="#"><i class="fab fa-instagram"></i></a></div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->
    
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