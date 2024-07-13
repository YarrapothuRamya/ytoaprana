<?php
	include("application/includes/conn.php");
	$portal_dtls=get_data("portal_details","*","p_status=1");
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
	
<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        
		<!-- TITLE -->
		<title><?php echo $portal_dtls['p_title']; ?> - Best Portal in Visakhapatnam</title>
        
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
    <div id="loader-wrapper">
        <div class="loader2">
            <svg class="loader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
                 <circle cx="170" cy="170" r="135" stroke="#fd0026"/>
                 <circle cx="170" cy="170" r="110" stroke="#fd0026"/>
                 <circle cx="170" cy="170" r="85" stroke="#001a58"/>
                 <circle cx="170" cy="170" r="60" stroke="#001a58"/>
            </svg>
        </div>
    </div>  
    <!-- LOADER END -->
    
    <?php 
		include("menu.php");
	?>
      
    <!--SLIDER START-->
    <div class="home-slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <!-- Slide Two - Set the background image for this slide in the line below -->
              <!--div class="carousel-item" style="background-image: url('img/images/banner2.jpg')"-->
              <div class="carousel-item" style="background-image: url('img/images/slidings/pharmacy.png')">
                <div class="container">
                    <div class="slider-caption">
                        <h2 class="display-4 animated fadeInRight">Pharmacy<br><span>Medicines</span></h2>
                        <p class="lead animated fadeInRight">An ancient and holistic system of medicine that has been practised and passed down through 36 generations of Siddhars. </p>
                        <div class="btn-more"><a class="btn btn-slider" href="#" role="button">Learn More</a></div>
                    </div>  
                </div>
              </div>
              <!-- Slide Two - Set the background image for this slide in the line below -->
              <div class="carousel-item" style="background-image: url('img/images/banner3.jpg')">
                <div class="container">
                    <div class="slider-caption">
                        <h2 class="display-4 animated fadeInRight">Siddha <br><span>Healing</span></h2>
                        <p class="lead animated fadeInRight">An ancient and holistic system of medicine that has been practised and passed down through 36 generations of Siddhars. </p>
                        <div class="btn-more"><a class="btn btn-slider" href="#" role="button">Learn More</a></div>
                    </div>  
                </div>
              </div>
              <!-- Slide Two - Set the background image for this slide in the line below -->
              <div class="carousel-item" style="background-image: url('img/images/banner4.jpg')">
                <div class="container">
                    <div class="slider-caption">
                        <h2 class="display-4 animated fadeInRight">Siddha <br><span>Healing</span></h2>
                        <p class="lead animated fadeInRight">An ancient and holistic system of medicine that has been practised and passed down through 36 generations of Siddhars. </p>
                        <div class="btn-more"><a class="btn btn-slider" href="#" role="button">Learn More</a></div>
                    </div>  
                </div>
              </div>
              <!-- Slide Three - Set the background image for this slide in the line below -->
              <div class="carousel-item" style="background-image: url('img/images/banner5.jpg')">
                <div class="container">
                    <div class="slider-caption">
                        <h2 class="display-4 animated fadeInRight">Homeopathy<br> <span>Treatment </span></h2>
                        <p class="lead animated fadeInRight">25 years + experience and treated more than 95000 patients. Experience curing Sinus, Thyroid, Sciatica and more “Unique Homeopathy Treatment”</p>
                        <div class="btn-more"><a class="btn btn-slider" href="#" role="button">Learn More</a></div>
                    </div>  
                </div>
              </div>
			  


			  
			  
			  
			  
              <!-- Slide One - Set the background image for this slide in the line below -->
              <div class="carousel-item active" style="background-image: url('img/images/slidings/ayurvedic.png')">
                <div class="container">
                    <div class="slider-caption">
                        <h2 class="display-4 animated fadeInRight">Ayurvedic<br> <span>Your Smile</span></h2>
                        <p class="lead animated fadeInRight">Diagnoses and Treats Naturally.</p>
                        <div class="btn-more"><a class="btn btn-slider" href="#" role="button">Learn More</a></div>
                    </div>  
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>  
    </div>
    <!--SLIDER END-->
    
    <!-- CONTENT START -->
    <section>
	
	
	
	        <!-- SERVICES START -->
        <div class="container-fluid inner-color">
            <div class="container">
                <div class="section-title">
                    <h2>Our Services</h2>
                    <p>We specialise in intelligent & effective Search and believes in the power of partnerships to grow business.</p>
                </div>
                <div class="row">
                  <div class="col-md-6 col-lg-4">
						<div>
							<img src="img/services/1.JPG" width="350px" height="350px">
						</div>
                    <!--div class="service-box">
                        <div class="cb-circle">
                            <figure class="cb-icon">
                                <img class="icon-default" src="img/master/dentist.svg" alt="">
                                <img class="icon-hover" src="img/master/dentist-w.svg" alt="">
                            </figure>
                        </div>
                        <div class="sb-caption">
                            <h4>Prosthodontics</h4>
                            <p>Measures of poor oral health used in the study included painful.</p>
                            <h5><a href="#">Read More</a></h5>
                        </div>
                    </div-->  
                  </div>
				  
                  <div class="col-md-6 col-lg-4 sb-movil-view">
						<div>
							<img src="img/services/2.JPG" width="350px" height="350px">
						</div>
                    <!--div class="service-box">
                        <div class="cb-circle">
                            <figure class="cb-icon">
                                <img class="icon-default" src="img/master/dentist1.svg" alt="">
                                <img class="icon-hover" src="img/master/dentist-w-alt.svg" alt="">
                            </figure>
                        </div>
                        <div class="sb-caption">
                            <h4>Orthodontic</h4>
                            <p>Measures of poor oral health used in the study included painful.</p>
                            <h5><a href="#">Read More</a></h5>
                        </div>
                    </div-->  
                  </div>
                  <div class="col-md-6 col-lg-4 sb-tablet-view">
						<div>
							<img src="img/services/3.JPG" width="350px" height="350px">
						</div>
                    <!--div class="service-box">
                        <div class="cb-circle">
                            <figure class="cb-icon">
                                <img class="icon-default" src="img/master/dental2.svg" alt="">
                                    <img class="icon-hover" src="img/master/dental-w.svg" alt="">
                            </figure>
                        </div>
                        <div class="sb-caption">
                            <h4>Endodontic</h4>
                            <p>Measures of poor oral health used in the study included painful.</p>
                            <h5><a href="#">Read More</a></h5>
                        </div>
                    </div-->  
                  </div>
                  <div class="col-md-6 col-lg-4 sb-desktop-view">
						<div>
							<img src="img/services/4.JPG" width="350px" height="350px">
						</div>
				  <!--div class="service-box">
                        <div class="cb-circle">
                            <figure class="cb-icon">
                                <img class="icon-default" src="img/master/toothbrush.svg" alt="">
                                <img class="icon-hover" src="img/master/toothbrush-w.svg" alt="">
                            </figure>
                        </div>
                        <div class="sb-caption">
                            <h4>Family Dentistry</h4>
                            <p>Measures of poor oral health used in the study included painful.</p>
                            <h5><a href="#">Read More</a></h5>
                        </div>
                    </div-->  
                  </div>
                  <div class="col-md-6 col-lg-4 sb-desktop-view">
						<div>
							<img src="img/services/5.JPG" width="350px" height="350px">
						</div>
                    <!--div class="service-box">
                        <div class="cb-circle">
                            <figure class="cb-icon">
                                <img class="icon-default" src="img/master/tooth-crown-w.svg" alt="">
                                <img class="icon-hover" src="img/master/tooth-crown.svg" alt="">
                            </figure>
                        </div>
                        <div class="sb-caption">
                            <h4>Maxillofacial Surgery</h4>
                            <p>Measures of poor oral health used in the study included painful.</p>
                            <h5><a href="#">Read More</a></h5>
                        </div>
                    </div-->  
                  </div>
                  <div class="col-md-6 col-lg-4 sb-desktop-view">
						<div>
							<img src="img/services/6.JPG" width="350px" height="350px">
						</div>
                    <!--div class="service-box">
                        <div class="cb-circle">
                            <figure class="cb-icon">
                                <img class="icon-default" src="img/master/tooth2.svg" alt="">
                                <img class="icon-hover" src="img/master/tooth2-white.svg" alt="">
                            </figure>
                        </div>
                        <div class="sb-caption">
                            <h4>Periodontics</h4>
                            <p>Measures of poor oral health used in the study included painful.</p>
                            <h5><a href="#">Read More</a></h5>
                        </div>
                    </div-->  
                  </div>
                </div>
            </div>
        </div>    
        <!-- SERVICES END -->
	
	
        
        <div class="container">
            <div class="dental-bar">
                <div class="row">
<?php
	//$regcat_dtls=get_data("ytoa_regcat","*","regcat_status=1");
	$reg_cat=Query("select * from ytoa_regcat where regcat_status=1");
	while($regcat_dtls=Fetch($reg_cat)) {
?>
                  <div class="col-md-3 col-lg-3 dental-col-1">
				  
                    <div class="dental-circle">
                        <div class="dental-icon">
						<!--img class="icon-default" src="img/master/ytoaprana_logo.svg" alt=""-->
                        <img class="icon-hover" src="img/master/ytoaprana_logo-w.svg" alt="">
						</div>
                    </div>
                    <h3><?=$regcat_dtls['regcat_name']?></h3>
                    <p><?=readMoreFunction_LS($regcat_dtls['regcat_desc'])?></p><a href="disp_pages.php?pg=<?=$regcat_dtls['regcat_id']?>">Read More...</a>
                  </div>
	<?php } ?>				  
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="about-us-alt-info">
                  <div class="about-alt-title">
                    <h5>For the life of your Family</h5>
                    <h2>Caring For Your Child</h2>  
                  </div>
                  <p><strong>The results are part of National Smile Month, a nationwide health campaign that promotes the benefits of a healthy smile.</strong> </p>
                  <p>Promotes unrealistic expectations of what a healthy smile looks like and it is clearly having a negative effect on how confident we are when it comes to showing ours off.  A smile represents feelings of happiness and joy.  This is something to be cherished.</p>
                  <figure class="signature"><img src="img/images/signature.png" alt=""></figure>
                </div>
              </div>
              <div class="col-lg-6 space-break">
                <figure class="about-us-alt-img"><img src="img/images/img13.jpg" alt=""></figure>  
              </div>
            </div>
        </div>
        

            
        <!-- TEAM START -->
        <div class="container">
            <div class="section-title">
                <h2>Our Team</h2>
                <p>We specialise in intelligent & effective Search and believes in the power of partnerships to grow business.</p>
            </div>
            <div class="team-carousel slider hover-effects image-hover">
<?php
	$qur_sel=Query("select * from ytoa_doctor where doc_status=1");
	$cnt_sel=NumRows($qur_sel);
          	if($cnt_sel>0){	   
			while($row=Fetch($qur_sel))
			{
				$speciality=getdata("ytoa_regsub_cat","regsubc_name","regsubc_status=1 and regsubc_id=".$row['doc_reg_subcat']);
?>			
              <div class="slide">
                 <div class="team-portrait">
                    <figure class="tp-avatar">
					<a href="doctor_view.php?did=<?=$row['doc_id']?>"><img src="uploads/doctor_photos/<?=$row['image']?>" alt=""></a>
					<!--<img src="img/doctors/noavatar.png" alt="">-->
					</figure>
                    <div class="tp-caption">
                      <h3><?=$row['doc_name']?></h3>
                      <h4><?=$speciality?></h4>
					  <p><?=readMoreFunction_LS($row['doc_singleline'])?></p>
                      <div class="span-social">
                        <!--div class="social-icon"><p><a href="<?//=$row['doc_facebook']?>" target="_blank"><i class="fab fa-facebook-f"></i></a></p></div>
                        <div class="social-icon"><p><a href="<?//=$row['doc_twitter']?>" target="_blank"><i class="fab fa-twitter"></i></a></p></div>
                        <div class="social-icon"><p><a href="<?//=$row['doc_linkedin']?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></p></div>    //fab fa-skype   --> 
                        <div class="social-icon"><p><a href="<?=$row['doc_instagram']?>" target="_blank"><i class="fab fa-instagram"></i></a></p></div> 
                      </div>
                    </div>
                  </div>
              </div>
<?php 	} 	
			}
?>

              <!--div class="slide">
                 <div class="team-portrait">
                    <figure class="tp-avatar">
						<a href="doctor_view.php?did=1"><img src="img/doctors/yaswanth.jpg" alt=""></a>
					</figure>
                    <div class="tp-caption">
                      <h3>Yaswanth</h3>
                      <h4>MBBS General</h4>
                      <p>There are many variations of passages of Lorem Ipsum available but the majority.</p>
                      <div class="span-social">
                        <div class="social-icon"><p><a href="#"><i class="fab fa-facebook-f"></i></a></p></div>
                        <div class="social-icon"><p><a href="#"><i class="fab fa-twitter"></i></a></p></div>
                        <div class="social-icon"><p><a href="#"><i class="fab fa-linkedin-in"></i></a></p></div> 
                        <div class="social-icon"><p><a href="#"><i class="fab fa-skype"></i></a></p></div> 
                      </div>
                    </div>
                  </div>
              </div>
              <div class="slide">
                 <div class="team-portrait">
                    <figure class="tp-avatar"><img src="img/doctors/shalini.jpeg" alt=""></figure>
                    <div class="tp-caption">
                      <h3>Shalini</h3>
                      <h4>Dentist</h4>
                      <p>There are many variations of passages of Lorem Ipsum available but the majority.</p>
                      <div class="span-social">
                        <div class="social-icon"><p><a href="#"><i class="fab fa-facebook-f"></i></a></p></div>
                        <div class="social-icon"><p><a href="#"><i class="fab fa-twitter"></i></a></p></div>
                        <div class="social-icon"><p><a href="#"><i class="fab fa-linkedin-in"></i></a></p></div> 
                        <div class="social-icon"><p><a href="#"><i class="fab fa-skype"></i></a></p></div> 
                      </div>
                    </div>
                  </div>
              </div>
              <div class="slide">
                 <div class="team-portrait">
                    <figure class="tp-avatar"><img src="img/images/staff4.jpg" alt=""></figure>
                    <div class="tp-caption">
                      <h3>Lily Cook</h3>
                      <h4>Orthodontist</h4>
                      <p>There are many variations of passages of Lorem Ipsum available but the majority.</p>
                      <div class="span-social">
                        <div class="social-icon"><p><a href="#"><i class="fab fa-facebook-f"></i></a></p></div>
                        <div class="social-icon"><p><a href="#"><i class="fab fa-twitter"></i></a></p></div>
                        <div class="social-icon"><p><a href="#"><i class="fab fa-linkedin-in"></i></a></p></div> 
                        <div class="social-icon"><p><a href="#"><i class="fab fa-skype"></i></a></p></div> 
                      </div>
                    </div>
                  </div>
              </div>
              <div class="slide">
                 <div class="team-portrait">
                    <figure class="tp-avatar"><img src="img/images/staff11.jpg" alt=""></figure>
                    <div class="tp-caption">
                      <h3>Laura Jones</h3>
                      <h4>Periodontist</h4>
                      <p>There are many variations of passages of Lorem Ipsum available but the majority.</p>
                      <div class="span-social">
                        <div class="social-icon"><p><a href="#"><i class="fab fa-facebook-f"></i></a></p></div>
                        <div class="social-icon"><p><a href="#"><i class="fab fa-twitter"></i></a></p></div>
                        <div class="social-icon"><p><a href="#"><i class="fab fa-linkedin-in"></i></a></p></div> 
                        <div class="social-icon"><p><a href="#"><i class="fab fa-skype"></i></a></p></div> 
                      </div>
                    </div>
                  </div>
              </div>
              <div class="slide">
                 <div class="team-portrait">
                    <figure class="tp-avatar"><img src="img/images/staff3.jpg" alt=""></figure>
                    <div class="tp-caption">
                      <h3>Maria Johnson</h3>
                      <h4>Periodontist</h4>
                      <p>There are many variations of passages of Lorem Ipsum available but the majority.</p>
                      <div class="span-social">
                        <div class="social-icon"><p><a href="#"><i class="fab fa-facebook-f"></i></a></p></div>
                        <div class="social-icon"><p><a href="#"><i class="fab fa-twitter"></i></a></p></div>
                        <div class="social-icon"><p><a href="#"><i class="fab fa-linkedin-in"></i></a></p></div> 
                        <div class="social-icon"><p><a href="#"><i class="fab fa-skype"></i></a></p></div> 
                      </div>
                    </div>
                  </div>
              </div-->
            </div>
        </div>
        <!-- TEAM END -->
        
        <!-- TESTIMONIALS START -->
        <div class="container-fluid testimonials-parallax">
            <div class="container">
                <div id="testimonial-slider" class="owl-carousel">
                    <div class="testimonial">
                        <div class="client-avatar">
                            <img src="img/images/avatar1.jpg" alt="">
                        </div>
                        <div class="testimonial-author">
                            <h3>krystal</h3>
                            <p>Lawyer</p>
                        </div>
                        <div class="testimonial-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda deleniti dolor ipsum
                                molestias mollitia ut. Aliquam aperiam corporis cumque debitis delectus dignissimos.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                    </div>
                    <div class="testimonial">
                        <div class="client-avatar">
                            <img src="img/images/avatar2.jpg" alt="">
                        </div>
                        <div class="testimonial-author">
                            <h3>Martha</h3>
                            <p>Marketing</p>
                        </div>
                        <div class="testimonial-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda deleniti dolor ipsum
                                molestias mollitia ut. Aliquam aperiam corporis cumque debitis delectus dignissimos.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                    </div>
                    <div class="testimonial">
                        <div class="client-avatar">
                            <img src="img/images/avatar3.jpg" alt="">
                        </div>
                        <div class="testimonial-author">
                            <h3>Robert</h3>
                            <p>Web Developer</p>
                        </div>
                        <div class="testimonial-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda deleniti dolor ipsum
                                molestias mollitia ut. Aliquam aperiam corporis cumque debitis delectus dignissimos.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- TESTIMONIALS END -->
        
        <!-- GALLERY START -->
<?php //include("gallery_content.php"); ?>
        <!-- GALLERY END -->
        
        <!-- COUNTER START -->
        <div class="container-fluid counter-section-alt">
            <div class="container">
                <div class="row">
                  <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="inner-counter">
                        <figure class="counter-icon"><img src="img/master/tooth.svg" alt=""></figure>
                        <div class="counter-statistics">
                            <div class="counter">12001</div>
                            <p>Doctors</p>
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-3 c-movil-breakpoint">
                    <div class="inner-counter">
                        <figure class="counter-icon"><img src="img/master/doctor.svg" alt=""></figure>
                        <div class="counter-statistics">
                            <div class="counter">8433</div>
                            <p>Pharmacy</p>
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-3 c-breakpoint">
                    <div class="inner-counter">
                        <figure class="counter-icon"><img src="img/master/happy.svg" alt=""></figure>
                        <div class="counter-statistics">
                            <div class="counter">2911</div>
                            <p>Diagnostics</p>
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-3 c-breakpoint">
                    <div class="inner-counter">
                        <figure class="counter-icon"><img src="img/master/medical.svg" alt=""></figure>
                        <div class="counter-statistics">
                            <div class="counter">11233</div>
                            <p>Emergency Services</p>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- COUNTER END -->
        
        <!-- LATEST NEWS START -->
        <div class="container">
            <div class="section-title">
                <h2>Latest News</h2>
                <p>We specialise in intelligent & effective Search and believes in the power of partnerships to grow business.</p>
            </div>
            <div class="news-carousel slider hover-effects image-hover">
			  
<?php
	$sqlqry=Query("select * from ytoa_gallery where va_status=1 and va_cat_id=2 order by va_id DESC  LIMIT 3");
//	$pqry=Fetch($sqlqry);
	while($pqry=Fetch($sqlqry)){
		$cat_name=getdata("ytoa_gallery_cat","gal_catname","gal_catid=".$pqry['va_pcatid']);
?>			  
              <div class="slide">
                <div class="thumbnail-box">
                    <figure class="tb-image"><img src="uploads/gal_uploads/news/thumb/<?=$pqry['va_path']?>" alt=""></figure>  
                    <div class="tb-caption">
                        <div class="inner-caption">
                            <div class="ic-top">
                                <div class="post-date">
                                    <p><?=date("d",strtotime($pqry['va_added_date']))?><br><span><?=date("M",strtotime($pqry['va_added_date']))?></span></p>
                                </div>
                                <h3><?=$pqry['va_title']?></h3>
                            </div>
                            <p><?=$pqry['va_desc']?></p>
                        </div>
                    </div>
                    <div class="tb-bottom">
                        <div class="tbb-inner">
                            <div class="user-box"><p><?=$cat_name?></p></div>
                            <!--div class="comment-box-alt"><p> 314</p></div-->
                        </div>
                    </div>
                </div> 
              </div>
<?php } ?>				

            </div>
        </div>
        <!-- LATEST NEWS END -->
        
    </section> 
    <!-- CONTENT START -->


<!-- Start of HubSpot Embed Code -->
  <script type="text/javascript" id="hs-script-loader" async defer src="//js-na1.hs-scripts.com/21718707.js"></script>
<!-- End of HubSpot Embed Code -->


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
    
</html>