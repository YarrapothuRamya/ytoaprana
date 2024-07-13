<?php
	include("application/includes/conn.php");
	$portal_dtls=get_data("portal_details","*","p_status=1");
?>
<!DOCTYPE html>
<html lang="en-US" class="no-js">
	
<!-- Mirrored from quickdevs.com/templates/denteur/about-us-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Sep 2021 09:33:54 GMT -->
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

    <!--HEADER START-->
    <header>
<?php 
//	include("header.php"); 
//	include("doc_header.php");
	include("menu.php"); 
?>
    </header>
    <!--HEADER END-->


    <div class="sections">
        <div class="container">
            <div class="pages-title">
                <h1>Y to A - Prana<br> <span>ENT</span></h1>
                <p><a href="#">Home</a> &nbsp; > &nbsp; <a href="ent.php">ENT</a></p>
            </div>
        </div>  
    </div>
    
    <!-- CONTENT START -->
    <section>
        <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <figure class="about-us-alt-img"><img src="img/gallery/ent/1.png" alt=""></figure>  
              </div>
              <div class="col-lg-6 space-break">
                <div class="about-us-alt-info">
                  <div class="about-alt-title">
                    <h5>Allopathy</h5>
                    <h2>ENT</h2>  
                  </div>
                  <p><strong>These commonly include functional diseases that affect the senses and activities of eating, drinking, speaking, breathing, swallowing, and hearing.</strong> </p>
                  <p>Ear, nose, and throat (ENT), is a surgical subspecialty within medicine that deals with the surgical and medical management of conditions of the head and neck. Doctors who specialize in this area are called otorhinolaryngologists, head and neck surgeons. Patients seek treatment from an otorhinolaryngologist for diseases of the ear, nose, throat, base of the skull, head, and neck.</p>
				  <p>Additionally , ENT surgery encompasses the surgical management and reconstruction of cancers and benign tumors of the head and neck as well as plastic surgery of the face and neck.</p>
                  <!--figure class="signature"><img src="img/images/signature.png" alt=""></figure-->
                </div>
              </div>
            </div>
        </div>
<?php /*        
        <!-- SERIVCES START -->
        <div class="container">
            <div class="row">
              <div class="col-md-6 col-lg-3">
                <div class="box-layer active-layer">
                  <figure class="bl-icon-active"><img src="img/master/implant-w.svg" alt=""></figure>
                  <h4 class="active">Periodontics</h4>
                  <p class="active">Measures of poor oral health used in the study included painful.</p>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 bl-movil-view">
                <div class="box-layer">
                  <figure class="bl-icon"><img src="img/master/dentist1.svg" alt=""></figure>
                  <figure class="bl-icon-hover"><img src="img/master/dentist-w-alt.svg" alt=""></figure>
                  <h4>Orthodontic</h4>
                  <p>Getting into a simple routine that includes adequate care teeth.</p>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 bl-tablet-view">
                <div class="box-layer">
                  <figure class="bl-icon"><img src="img/master/dental2.svg" alt=""></figure>
                  <figure class="bl-icon-hover"><img src="img/master/dental-w.svg" alt=""></figure>
                  <h4>Endodontic</h4>
                  <p>Sometimes a little effort goes a long way and in this benefits.</p>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 bl-tablet-view">
                <div class="box-layer">
                  <figure class="bl-icon"><img src="img/master/toothbrush.svg" alt=""></figure>
                  <figure class="bl-icon-hover"><img src="img/master/toothbrush-w.svg" alt=""></figure>
                  <h4>Family Dentistry</h4>
                  <p>Balanced diet and visiting the dentist often they recommend.</p>
                </div>
              </div>
            </div>
        </div>
        <!-- SERIVCES END -->
*/ ?>
        
        <!-- TEAM START -->
        <div class="container-fluid inner-color">
            <div class="container">
                <div class="section-title">
                    <h2>Our Team</h2>
                    <p>We specialise in **********************.</p>
                </div>
                <div class="team-carousel slider hover-effects image-hover">
<?php
		$doc_regscat=Query("select * from ytoa_doctor where doc_status=1 and doc_reg_subcat=13");
		while($doc_lst=Fetch($doc_regscat)) {

		$subcat_name=getdata("ytoa_regsub_cat","regsubc_name","regsubc_id=13");
?>
                  <div class="slide">
                     <div class="team-portrait">
                        <figure class="tp-avatar"><img src="img/images/staff6.jpg" alt=""></figure>
                        <div class="tp-caption">
                          <h3><?=$doc_lst['doc_name']?></h3>
                          <h4><?=$subcat_name;?></h4>
                          <p>There are many variations of passages of Lorem Ipsum available but the majority.</p>
                          <!--div class="span-social">
                            <div class="social-icon"><p><a href="#"><i class="fab fa-facebook-f"></i></a></p></div>
                            <div class="social-icon"><p><a href="#"><i class="fab fa-twitter"></i></a></p></div>
                            <div class="social-icon"><p><a href="#"><i class="fab fa-linkedin-in"></i></a></p></div> 
                            <div class="social-icon"><p><a href="#"><i class="fab fa-skype"></i></a></p></div> 
                          </div-->
                        </div>
                      </div>
                  </div>
<?php } ?>
                </div>
            </div>
        </div>
        <!-- TEAM END -->
 <?php  /*     
        <!-- SECTION ABOUT START -->
        <div class="container">
            <div class="row">
              <div class="col-lg-7">
                <div class="og-section-tittle">
                  <h5>About Denteur</h5>
                  <h2>Simply Better Dentistry</h2>
                </div> 
                <div class="og-about-alt">
                    <p><strong>All practicing at Denteur have earned either three or more years of undergraduate, The most common misuse for our teeth is tearing Sellotape.</strong></p>
                    <p>A general dentist is your primary care dental provider. This dentist diagnoses, treats, and manages your overall oral health care needs, including gum care, root canals, fillings, crowns, veneers, bridges, and preventive education.</p>  
                    <div class="og-accordion">
                        <ul class="accordion">
                            <li>
                                <a>How can i contact you?</a>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its grid-item. The point of using Lorem Ipsum.</p>
                            </li>
                            <li>
                                <a>What is your payment method?</a>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its grid-item. The point of using Lorem Ipsum.</p>
                            </li>
                            <li class="last-item">
                                <a>What are gas solutions?</a>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its grid-item. The point of using Lorem Ipsum.</p>
                            </li>
                        </ul> <!-- / accordion -->
                    </div>
                </div>
              </div>
              <div class="col-lg-5 space-break">
                <figure class="worker-portrait">
                    <img src="img/images/img38.jpg" alt="">
                </figure>  
              </div>
            </div>
        </div>
        <!-- SECTION ABOUT END -->
        
        <!-- TESTIMONIALS START -->
        <div class="container-fluid testimonials-parallax-alt">
            <div class="container">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="about-testimonials">
                        <h5>Wha our customer are saying</h5> 
                        <h2>Testimonials</h2>  
                        <p><strong>Going to use a passage of Lorem Ipsum, you need to be sure there readable content of a page.</strong></p>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                    </div>
                  </div>
                  <div class="col-lg-8">
                      <div id="testimonial-carousel">
                        <div class="testimonials-box groucho">
                          <p>I just wanted to share a quick note and let you know that you guys do a really good job. I’m glad I decided to work with.</p>
                            <div class="tb-client-details">
                                <figure class="tb-client-avatar"><img src="img/images/avatar1.jpg" alt=""></figure>
                                <div class="caption">
                                    <h4><strong>Sara Jones</strong> - Designer</h4>
                                    <div class="span-rating">
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonials-box groucho">
                          <p>I just wanted to share a quick note and let you know that you guys do a really good job. I’m glad I decided to work with.</p>
                            <div class="tb-client-details">
                                <figure class="tb-client-avatar"><img src="img/images/avatar2.jpg" alt=""></figure>
                                <div class="caption">
                                    <h4><strong>Martha Smith</strong> - Lawyer</h4>
                                    <div class="span-rating">
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonials-box groucho">
                          <p>I just wanted to share a quick note and let you know that you guys do a really good job. I’m glad I decided to work with.</p>
                            <div class="tb-client-details">
                                <figure class="tb-client-avatar"><img src="img/images/avatar3.jpg" alt=""></figure>
                                <div class="caption">
                                    <h4><strong>Tim Cook</strong> - Developer</h4>
                                    <div class="span-rating">
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonials-box groucho">
                          <p>I just wanted to share a quick note and let you know that you guys do a really good job. I’m glad I decided to work with.</p>
                            <div class="tb-client-details">
                                <figure class="tb-client-avatar"><img src="img/images/avatar4.jpg" alt=""></figure>
                                <div class="caption">
                                    <h4><strong>Albert Allen</strong> - Architect</h4>
                                    <div class="span-rating">
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonials-box groucho">
                          <p>I just wanted to share a quick note and let you know that you guys do a really good job. I’m glad I decided to work with.</p>
                            <div class="tb-client-details">
                                <figure class="tb-client-avatar"><img src="img/images/avatar5.jpg" alt=""></figure>
                                <div class="caption">
                                    <h4><strong>Jim Law</strong> - Marketing</h4>
                                    <div class="span-rating">
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonials-box groucho">
                          <p>I just wanted to share a quick note and let you know that you guys do a really good job. I’m glad I decided to work with.</p>
                            <div class="tb-client-details">
                                <figure class="tb-client-avatar"><img src="img/images/avatar6.jpg" alt=""></figure>
                                <div class="caption">
                                    <h4><strong>Donald Jones</strong> - Designer</h4>
                                    <div class="span-rating">
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                        <div class="inner-star"><i class="fas fa-star"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- TESTIMONIALS END -->
        
        <!-- LATEST NEWS START -->
        <div class="container">
            <div class="section-title">
                <h2>Latest News</h2>
                <p>We specialise in intelligent & effective Search and believes in the power of partnerships to grow business.</p>
            </div>
            <div class="news-carousel slider hover-effects image-hover">
              <div class="slide">
                <div class="thumbnail-box">
                    <figure class="tb-image"><img src="img/images/img37.jpg" alt=""></figure>  
                    <div class="tb-caption">
                        <div class="inner-caption">
                            <div class="ic-top">
                                <div class="post-date">
                                    <p>25<br><span>May</span></p>
                                </div>
                                <h3>Causes and Treatment of Gengivitis</h3>
                            </div>
                            <p>The ground-breaking research took 11 years to complete and is the longest study.</p>
                        </div>
                    </div>
                    <div class="tb-bottom">
                        <div class="tbb-inner">
                            <div class="user-box"><p> John Anderson</p></div>
                            <div class="comment-box-alt"><p> 314</p></div>
                        </div>
                    </div>
                </div> 
              </div>
              <div class="slide">
                <div class="thumbnail-box">
                    <figure class="tb-image"><img src="img/images/img34.jpg" alt=""></figure>  
                    <div class="tb-caption">
                        <div class="inner-caption">
                            <div class="ic-top">
                                <div class="post-date">
                                    <p>23<br><span>May</span></p>
                                </div>
                                <h3>Oral Health Foundation Green Paper</h3>
                            </div>
                            <p>Scientists found that people who use an electric toothbrush have healthier gums.</p>
                        </div>
                    </div>
                    <div class="tb-bottom">
                        <div class="tbb-inner">
                            <div class="user-box"><p> Lisa Jones</p></div>
                            <div class="comment-box-alt"><p> 245</p></div>
                        </div>
                    </div>
                </div> 
              </div>
              <div class="slide">
                <div class="thumbnail-box">
                    <figure class="tb-image"><img src="img/images/img35.jpg" alt=""></figure>  
                    <div class="tb-caption">
                        <div class="inner-caption">
                            <div class="ic-top">
                                <div class="post-date">
                                    <p>12<br><span>May</span></p>
                                </div>
                                <h3>Share a Smile Winners Announced</h3>
                            </div>
                            <p>Having undertaken a comprehensive review of existing guidance for best use of denture.</p>
                        </div>
                    </div>
                    <div class="tb-bottom">
                        <div class="tbb-inner">
                            <div class="user-box"><p> Sara Smith</p></div>
                            <div class="comment-box-alt"><p> 433</p></div>
                        </div>
                    </div>
                </div> 
              </div>
              <div class="slide">
                <div class="thumbnail-box">
                    <figure class="tb-image"><img src="img/images/img36.jpg" alt=""></figure>  
                    <div class="tb-caption">
                        <div class="inner-caption">
                            <div class="ic-top">
                                <div class="post-date">
                                    <p>12<br><span>May</span></p>
                                </div>
                                <h3>Launch of New Guidelines for Denture</h3>
                            </div>
                            <p>The new recommendations have been launched to combat the current lack of guidance.</p>
                        </div>
                    </div>
                    <div class="tb-bottom">
                        <div class="tbb-inner">
                            <div class="user-box"><p> Tim Cook</p></div>
                            <div class="comment-box-alt"><p> 189</p></div>
                        </div>
                    </div>
                </div> 
              </div>
            </div>
        </div>
        <!-- LATEST NEWS END -->
        
    </section> 
    <!-- CONTENT END -->
*/ ?>
    <!-- FOOTER START -->
<?php include("footer.php"); ?>
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
    

<!-- Mirrored from quickdevs.com/templates/denteur/about-us-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Sep 2021 09:33:54 GMT -->
</html>