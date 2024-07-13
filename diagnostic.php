<?php
	include("application/includes/conn.php");
	$portal_dtls=get_data("portal_details","*","p_status=1");
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
	
<!-- Mirrored from quickdevs.com/templates/denteur/doctors.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Sep 2021 09:33:54 GMT -->
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
	include("menu.php"); 
?>
        <!--NAVBAR END-->         
    </header>
    <!--HEADER END-->
<div style="background-image: url('img/gallery/diagnostics.png');     height: 500px; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;">
    <div class="sections">
        <div class="container">
            <div class="pages-title">
                <h1>Y to A - Prana<br> <span>Diagnostic</span></h1>
                <p><a href="index.php">Home</a> &nbsp; > &nbsp; <a href="diagnostic.php">Diagnostic</a></p>
            </div>
        </div>  
    </div>
</div>	
    
    <!-- CONTENT START -->
    <section>
		<div class="container">
            <div class="row">
              <!-- BLOG SIDEBAR START -->
              <div class="order-last order-md-3 col-lg-4 col-xl-3 space-break">
                  <aside>
                    <div class="form-group blog-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Search">
                      </div>
                      <div class="aside-list-group">
                          <h4>Categories</h4>
                        <ul class="list-group list-group-flush">
<?php
		$diagnosticreg_cat=Query("select * from ytoa_diagnosticcat where diagnosticcat_status=1");
		while($diagnosticregcat_dtls=Fetch($diagnosticreg_cat)) {
?>
            <li class="list-group-item"><a href="#"><?=$diagnosticregcat_dtls['diagnosticcat_name']?></a></li>
<?php } ?>
                        </ul>
                      </div>
                  </aside>
              </div>
              <!-- BLOG SIDEBAR END -->

              <!-- BLOG CONTENT START -->
              <div class="order-md-9 col-lg-8 col-xl-9">
					<h3>Diagnostic? - <a href="verify_dmobile.php">Register</a> / Login</h3>
<?php
	$sqlquery=Query("select * from ytoa_diagnostic");
	while($row=Fetch($sqlquery))
	{
?>
			<div class="col-md-4 col-lg-4" style="float:left">
                <div class="team-portrait">
                    <figure class="tp-avatar">
					<a href="pharma_view.php?pharmaid=<?=$row['diagnostic_id']?>">
					<?php if(empty($row['image']))
								$image="noavatar.png";
							else
								$image=$row['image'];
					?>
					<img src="uploads/diagnostic_photos/<?=$image?>" alt=""></a>
					</figure>
                    <div class="tp-caption">
                      <h3><?=$row['diagnostic_name']?></h3>
                      <h4><?//=$speciality?></h4>
                      <p><?=readMoreFunction_LS($row['diagnostic_singleline'])?></p>
                      <div class="span-social">
					    <button class="copy-link" title="Copy Link" link="www.ytoa-prana.com/diagnostic_view.php?did=<?=$row['diagnostic_id']?>"><img src="img/images/copylink.png"></button> 
                        <!--div class="social-icon"><p><a href="<?//=$row['diagnostic_instagram']?>" target="_blank"><i class="fab fa-instagram"></i></a></p></div--> 
                      </div>
                    </div>
                </div>
			</div>
	<?php } ?>
		</div>
	</div>


        </div>
    </section> 
    <!-- CONTENT END -->

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
    

<!-- Mirrored from quickdevs.com/templates/denteur/doctors.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Sep 2021 09:33:54 GMT -->
</html>