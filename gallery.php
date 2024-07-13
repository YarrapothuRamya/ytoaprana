<?php
	include("application/includes/conn.php");
	$portal_dtls=get_data("portal_details","*","p_status=1");
?>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
	
<!-- Mirrored from quickdevs.com/templates/denteur/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Sep 2021 09:33:54 GMT -->
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
        <!--TOP HEADER START-->
    <?php 
		include("menu.php");
	?>
        <!--TOP HEADER END-->
    </header>
    <!--HEADER END-->

    <div class="sections">
        <div class="container">
            <div class="pages-title">
                <h1>Y to A - Prana<br> <span>Gallery</span></h1>
                <p><a href="index.php">Home</a> &nbsp; > &nbsp; <a href="gallery.php">Gallery</a></p>
            </div>
        </div>  
    </div>
    
<!-- Gallery Content Start -->
	<?php include("gallery_content.php"); ?>
<!-- Gallery Content End -->

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
    

<!-- Mirrored from quickdevs.com/templates/denteur/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Sep 2021 09:33:54 GMT -->
</html>