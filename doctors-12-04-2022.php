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
<div style="background-image: url('img/gallery/doc_pat.png');     height: 500px; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;">
    <div class="sections">
        <div class="container">
            <div class="pages-title">
                <h1>Y to A - Prana<br> <span>Doctors</span></h1>
                <p><a href="index.php">Home</a> &nbsp; > &nbsp; <a href="doctors.php">Doctors</a></p>
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
		$reg_cat=Query("select * from ytoa_regcat where regcat_status=1");
		while($regcat_dtls=Fetch($reg_cat)) {
                    $subcat_cnt=0;
		$subcat_cnt=getdata("ytoa_regsub_cat","count(*)","regsubc_catid=".$regcat_dtls['regcat_id']);
?>
                          <li class="list-group-item"><a href="#"><?=$regcat_dtls['regcat_name']?></a>
                            <span class="badge badge-primary badge-pill"><?=isset($subcat_cnt)?$subcat_cnt:0;?></span>
                          </li>
<?php } ?>
                        </ul>
                      </div>
                      <div class="aside-tags">
                        <h4>Tags</h4>
<?php
		$sqlquery="select * from ytoa_regsub_cat where regsubc_status=1 order by regsubc_name ASC";
		$reg_scat=Query($sqlquery);
		while($regscat_dtls=Fetch($reg_scat)) {
?>
            <a class="btn btn-tags" href="pages.php?subcat_id=<?=$regscat_dtls['regsubc_id']?>" role="button"><?=$regscat_dtls['regsubc_name']?></a>
		<?php } ?>
                      </div> 
                  </aside>
              </div>
              <!-- BLOG SIDEBAR END -->

              <!-- BLOG CONTENT START -->
              <div class="order-md-9 col-lg-8 col-xl-9">
					<h3>Doctor? - <a href="doc_registration.php">Register</a> / <a href="doctors_login/">Login</a></h3>
<?php
	$sqlquery=Query("select * from ytoa_doctor");
	while($row=Fetch($sqlquery))
	{
	$speciality=getdata("ytoa_regsub_cat","regsubc_name","regsubc_status=1 and regsubc_id=".$row['doc_reg_subcat']);
?>
			<div class="col-md-4 col-lg-4" style="float:left">
                <div class="team-portrait">
                    <figure class="tp-avatar">
					<a href="doctor_view.php?did=<?=$row['doc_id']?>">
					<?php if(empty($row['image']))
								$image="noavatar.png";
							else
								$image=$row['image'];
					?>
					<img src="uploads/doctor_photos/<?=$image?>" alt="<?=$row['doc_name']?>"></a>
					</figure>
                    <div class="tp-caption">
                      <h3>Dr. <?=ucfirst($row['doc_name'])." ".ucfirst($row['doc_lname'])?></h3>
                      <h4><?=$speciality?></h4>
                      <p><?=readMoreFunction_LS($row['doc_singleline'])?></p>
					 
                      <div class="span-social">
                        <div class="social-icon"><p><a href="<?=$row['doc_instagram']?>" target="_blank"><i class="fab fa-instagram"></i></a></p></div> 
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