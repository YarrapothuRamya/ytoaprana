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
<?php 
	include("menu.php");
	if(isset($_GET['msg']) && $_GET['msg']='error'){ echo "<script>alert('Emergency with this Phone Number already existed!'); </script>";  }
	if(isset($_GET['msg1']) && $_GET['msg1']='error'){ echo "<script>alert('Please Check with details and Try Once Again!'); </script>";  }
?>
        
<div style="background-image: url('img/gallery/emergency.jpg');     height: 500px; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;">
        
    <div class="sections">
        <div class="container">
            <div class="pages-title">
                <h1><?=$portal_dtls['p_title'] ?><br> <span>Blood Bank Services - Registration</span></h1>
                <p><a href="#">Home</a> &nbsp; > &nbsp; <a href="bbservices_registration.php">Blood Bank Services Registration</a></p>
            </div>
        </div>  
    </div>
</div>	

    <!-- CONTENT START -->
    <section>
        <div class="container">
<form method="POST" action="amreg_mail.php">    
            <div class="row">
              <!-- DOCTOR SIDEBAR START -->
              <div class="col-lg-12">
                <aside class="doctor">
                    <h4>Basic Information</h4>
                  <!--figure class="doctor-portrait"><img src="img/doctors/noavatar.png" alt=""></figure-->
					<div class="doctor-caption">
						<input id="form_name" type="text" name="emergency_name" class="form-control customize-contact" placeholder="Emergency Service Name" required="required" data-error="Emergency Services - Name is required.">
                    <p class="profession">
						<select name="emergency_reg_cat" id="emergency_reg_cat" class="sel_category form-control customize-contact" required="required" data-error="Emergency Services Category is required." readonly>
							<option value="1">Ambulance</option>
                                <?php /*
								dropdown('ytoa_emergencycat', 'emergencycat_id,emergencycat_name', 'emergencycat_status=1 and emergencycat=2', @$row['ls_emergencycatid']); 
								*/ ?>
						</select>
					</p>

                    <hr class="d-divider">
                    <p>
						<input id="form_name" type="text" name="emergency_singleline" class="form-control customize-contact" placeholder="Enter Single-Line About Emergency Services" required="required" data-error="Single-Line About - required.">
					</p>
                    <!--hr class="d-divider"-->
                    <div class="d-schedule">
                      <!--div class="schedule-header">
                        <figure class="clock-svg"><img src="img/master/clock-time.svg" alt=""></figure>
                        <div class="d-caption">
                            <h5>Diagnostic Working hours</h5>  
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
                      <div class="d-social">
                        <div class="d-social-icons"><p><i class="fab fa-facebook-f"></i>
							<input id="form_name" type="text" name="emergency_facebook" class="form-control customize-contact" placeholder="Enter Facebook URL">
						</p></div>  
                        <div class="d-social-icons"><p><i class="fab fa-twitter"></i>
							<input id="form_name" type="text" name="emergency_twitter" class="form-control customize-contact" placeholder="Enter Twitter URL">
						</p></div>  
                        <div class="d-social-icons"><p><i class="fab fa-linkedin-in"></i>
							<input id="form_name" type="text" name="emergency_linkedin" class="form-control customize-contact" placeholder="Enter LinkedIn URL">
						</p></div>  
                        <div class="d-social-icons"><p><i class="fab fa-instagram"></i>
							<input id="form_name" type="text" name="emergency_instagram" class="form-control customize-contact" placeholder="Enter Instagram URL">
						</p></div>  
                      </div>
                    </div><br>
                    <h4>Contact Information</h4>
<div class="emergency-information">
                    <div class="contact-list">
                        <p class="office">+ 91
                            <input id="form_phone" type="tel" name="emergency_office" class="form-control customize-contact" placeholder="Office Contact" required="required">
						</p>  
                        <p class="phone">+ 91
                            <input id="form_phone" type="tel" name="emergency_phone" class="form-control customize-contact" placeholder="Phone Contact" required="required">
						</p>  
                        <p class="mail">
                            <input id="form_email" type="email" name="emergency_email" class="form-control customize-contact" placeholder="Email address" required="required" data-error="Valid email is required.">
						</p>  
                        <p class="location">
                            <input id="form_location" type="text" name="sh_gloction" class="form-control customize-contact" placeholder="Location" required="required">
						</p>  
                    </div>
                    <hr class="d-divider">
                  <h3>About Emergency Services</h3>
                  <hr class="d-divider">
                         <textarea id="form_message" name="emergency_about" class="form-control customize-contact" placeholder="About Emergency Services" rows="6" required="required" data-error="Please, leave us about you."></textarea>
                    <hr class="d-divider">
					<div class="row">
						<div class="col-md-12 submit-btn">
							<p><input type="submit" class="btn btn-custom" value="Submit Registration"></p>
						</div>
					</div>
</div>                  
				</div>
                </aside>
              </div>
              <!-- DOCTOR SIDEBAR END -->
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
		if(sel_id=="diagnostic_reg_cat") { 
			var dataString = 'diagnosticcat_id='+val+'&drop=diagnosticcat'; var result_ls="#diagnostic_reg_subcat";
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

