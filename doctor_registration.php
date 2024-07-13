<?php
   session_start();
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
<?php 
	include("menu.php");
	if(isset($_GET['msg']) && $_GET['msg']='error'){ echo "<script>alert('Doctor with this Phone Number already existed!'); </script>";  }
	if(isset($_GET['msg1']) && $_GET['msg1']='error'){ echo "<script>alert('Please Check with details and Try Once Again!'); </script>";  }
?>
        
<div style="background-image: url('img/gallery/doc_pat.png');     height: 500px; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;">

    <div class="sections">
        <div class="container">
            <div class="pages-title">
                <h1><?=$portal_dtls['p_title'] ?><br> <span>Doctors Registration</span></h1>
                <p><a href="#">Home</a> &nbsp; > &nbsp; <a href="doctor_registration.php">Doctor Registration</a></p>
            </div>
        </div>  
    </div>
</div>	

    <!-- CONTENT START -->
    <section>
        <div class="container">
<form method="POST" action="docreg_mail.php" enctype = "multipart/form-data" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">    
            <div class="row">
              <!-- DOCTOR SIDEBAR START -->
              <div class="col-lg-4">
                <aside class="doctor">
                  <!--figure class="doctor-portrait"><img src="img/doctors/noavatar.png" alt=""></figure-->
					<div class="doctor-caption">
						<p>Dr.</p><input id="form_name" type="text" name="doc_name" class="form-control customize-contact" placeholder="Enter Doctor Name *" required="required" data-error="Doctor Full Name is required."><p class="profession">(No Space to be placed)</p>
						<input id="form_name" type="text" name="doc_lname" class="form-control customize-contact" placeholder="Enter Last Name *" required="required" data-error="Last Name is required."><br><p>Profile Image:</p>
						<input name="image" id="image" type="file" value="" class="btn btn-custom" style="width: 300px;"><br>
                        <span><p>(Max Size 1MB)</p></span>
                    <p class="profession">
						<select name="doc_reg_cat" id="doc_reg_cat" class="form-control customize-contact" required="required" data-error="Registration Category is required.">
                                <?php dropdown('ytoa_regcat', 'regcat_id,regcat_name', 'regcat_status=1 and regcat_id='. $_SESSION['catid'].' order by regcat_name', @$row['ls_regcatid']); ?>
						</select>
					</p>
                    <p class="profession">
						<select name="doc_reg_subcat" id="doc_reg_subcat" class="form-control customize-contact" required="required" data-error="Specialization is required.">
                                <?php dropdown('ytoa_regsub_cat', 'regsubc_id,regsubc_name', 'regsubc_status=1 and regsubc_catid='. $_SESSION['catid'].' and regsubc_id='.$_SESSION['subcatid'].' order by regsubc_name', @$row['ls_regsubc_id']); ?>
						</select>
					</p>
                    <hr class="d-divider">
                    <p>
						<input id="form_name" type="text" name="doc_singleline" class="form-control customize-contact" placeholder="Enter Single-Line About Me *" required="required" data-error="Single-Line About Me is required.">
					</p>
                    <!--hr class="d-divider"-->
                    <div class="d-schedule">
                      <!--div class="schedule-header">
                        <figure class="clock-svg"><img src="img/master/clock-time.svg" alt=""></figure>
                        <div class="d-caption">
                            <h5>Working hours</h5>  
                            <p>At</p>
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
                      </div-->
                      <hr class="d-divider">
                  <h3>About Doctor</h3>
                  <hr class="d-divider">
                         <textarea id="form_message" name="doc_about" class="form-control customize-contact" placeholder="About Me *" rows="6" required="required" data-error="Please, leave us about you."></textarea>
                      <hr class="d-divider">
                      <!--div class="d-social">
                        <div class="d-social-icons"><p><i class="fab fa-facebook-f"></i>
							<input id="form_name" type="text" name="doc_facebook" class="form-control customize-contact" placeholder="Enter Facebook URL">
						</p></div>  
                        <div class="d-social-icons"><p><i class="fab fa-twitter"></i>
							<input id="form_name" type="text" name="doc_twitter" class="form-control customize-contact" placeholder="Enter Twitter URL">
						</p></div>  
                        <div class="d-social-icons"><p><i class="fab fa-linkedin-in"></i>
							<input id="form_name" type="text" name="doc_linkedin" class="form-control customize-contact" placeholder="Enter LinkedIn URL">
						</p></div>  
                        <div class="d-social-icons"><p><i class="fab fa-instagram"></i>
							<input id="form_name" type="text" name="doc_instagram" class="form-control customize-contact" placeholder="Enter Instagram URL">
						</p></div>  
                      </div-->
                    </div>
                  </div>
                </aside>
              </div>
              <!-- DOCTOR SIDEBAR END -->
                
              <!-- DOCTOR CONTENT START -->
              <div class="col-lg-8 space-break">
                <div class="doctor-information">
                    <h4>Contact Information</h4>
                    <div class="contact-list">
                        <p class="office">+ 91
                            <input id="form_phone" type="tel" name="doc_office"  class="form-control customize-contact" placeholder="Please enter Office Contact">
						</p>  
                        <p class="phone">+ 91 <?=$_SESSION['username']?>
                            <input id="form_phone" type="hidden" name="doc_phone" class="form-control customize-contact" placeholder="Please enter Phone Contact" required="required" value="<?=$_SESSION['username']?>" readonly>
						</p>  
                        <p class="mail">
                            <input id="form_email" type="email" name="doc_email" class="form-control customize-contact" placeholder="Email address *" required="required" data-error="Valid email is required.">
							<!--pattern='^[a-zA-Z0-9]{5}@[a-zA-Z0-9]{2,10}.(es|com|org)$' -->
						</p>  
                        <p class="location">Location
                            <input id="form_location" type="text" name="sh_gloction" class="form-control customize-contact" placeholder="Please enter Location *" required="required" data-error="Valid location is required.">
						</p>  
                    </div>
                    <hr class="d-divider">
					<h3>Experience</h3>
                  <hr class="d-divider">
                  <h4>
					<input id="form_name" type="text" name="doc_exptitle" class="form-control customize-contact" placeholder="Title *" required="required" data-error="Title is required.">
				  </h4>
                    <textarea id="form_message" name="doc_expdtls" class="form-control customize-contact" placeholder="Experience Details *" rows="6" required="required" data-error="Please, leave us about your experience."></textarea>
					<div class="row">
						<div class="col-md-12 submit-btn">
					 <p class="location"><input type="checkbox" required name="checkbox" value="check" id="agree" />&nbsp;&nbsp;&nbsp;<strong>I have read and agree to the <a href="tandc.php">Terms and Conditions</a> and <a href="pp.php">Privacy Policy</a></strong></p>
			<p><input type="submit" class="btn btn-custom" value="Submit Registration"></p>
						</div>
					</div>
                </div>
             </div>
             <!-- DOCTOR CONTENT END -->
            </div>
</form>	
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
	
<script type="text/javascript">
$(document).ready( function() {

   
   	$('.sel_category').on('change', function(){		
		var val = $(this).find('option:selected').val();
		var sel_id=this.id; 
//         alert(sel_id);
		if(sel_id=="doc_reg_cat") { 
			var dataString = 'regcat_id='+val+'&drop=regcat'; var result_ls="#doc_reg_subcat";
		}

		$.ajax({
			type: "POST", url: "application/html/ajax.php", data: dataString, cache: false,
			success: function(data){
				$(result_ls).html(data);
			}
		});
	});
	
	   

});
</script>
	
	
    
    </body>
    

<!-- Mirrored from quickdevs.com/templates/denteur/doctors-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Sep 2021 09:33:57 GMT -->
</html>

