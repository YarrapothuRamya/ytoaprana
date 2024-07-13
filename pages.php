<?php
	include("application/includes/conn.php");
	$portal_dtls=get_data("portal_details","*","p_status=1");
	//alert($_GET['subcat_id']);
	$subcat_id=$_GET['subcat_id'];
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

<?php   
		$subcat_name=getdata("ytoa_regsub_cat","regsubc_name","regsubc_id=".$subcat_id);
?>
<div style="background-image: url('<?php get_subcat_titimage($subcat_id); ?>');     
	height: 500px; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;">
    <div class="sections">
        <div class="container">
            <div class="pages-title">
                <h1>Y to A - Prana<br> <span><?=$subcat_name?></span></h1>
                <p><a href="#">Home</a> &nbsp; > &nbsp; <a href="pages.php?subcat_id=<?=$subcat_id?>"><?=$subcat_name?></a></p>
            </div>
        </div>  
    </div>
</div>	
    
    <!-- CONTENT START -->
    <section>
        <div class="container">
            <div class="row">
              <div class="col-lg-6"><figure class='about-us-alt-img'><?php get_subcat_image($subcat_id); ?></figure>
              </div>
              <div class="col-lg-6 space-break">
                <div class="about-us-alt-info">
                  <div class="about-alt-title">
                    <!--h5>Category : - </h5-->
                    <h2><?=$subcat_name?></h2>  					
                  </div>
				 <form name="" method="POST" action="verify_contact.php">
<?php   
		$cat_id=getdata("ytoa_regsub_cat","regsubc_catid","regsubc_id=".$subcat_id);
?>

						<input type="hidden" name="cat_id" value="<?=$cat_id?>">
						<input type="hidden" name="subcat_id" value="<?=$subcat_id?>">					
						Not a Member? <button type="register" class="btn btn-custom">Register</button><br>
				</form>
						Already you are Member? <a href="doctors_login/" class="btn btn-custom">Login</a><br>
				  <?php get_subcat_details($subcat_id); ?>
                  
                  <!--figure class="signature"><img src="img/images/signature.png" alt=""></figure-->
                </div>
              </div>
            </div>
        </div>
        
        <!-- TEAM START -->
        <div class="container-fluid inner-color">
            <div class="container">
                <div class="section-title">
                    <h2>Our Team</h2>
                    <p>We specialise in <?=$subcat_name?>!</p>
                </div>
                <div class="team-carousel slider hover-effects image-hover">
<?php
		$doc_regscat=Query("select * from ytoa_doctor where doc_reg_subcat=".$subcat_id);
		while($doc_lst=Fetch($doc_regscat)) {

?>
                  <div class="slide">
                     <div class="team-portrait">
                        <a href="doctor_view.php?did=<?=$doc_lst['doc_id']?>">
						<figure class="tp-avatar"><img src="uploads/doctor_photos/<?=$doc_lst['image']?>" alt=""></figure>
                        <div class="tp-caption">
                          <h3><?=$doc_lst['doc_name']?></h3>
                          <h4><?=$subcat_name;?></h4>
                          <p><?=readMoreFunction_LS($doc_lst['doc_singleline'])?></p>
						  </a>
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