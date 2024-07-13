<?php
	include("application/includes/conn.php");
	$portal_dtls=get_data("portal_details","*","p_status=1");
?>

        <!--TOP HEADER START-->
        <div class="top-header">
            <div class="container">
                <div class="header-left">
                    <p style="color: #001a56"><strong>Phone :</strong>+91 <?=$portal_dtls['p_phno'];?></p>
                </div>
                <div class="header-right">
                   <div class="ht-right-email">
                        <p><?=$portal_dtls['p_email'];?></p>
                   </div>
                   <a href="doc_registration.php">
                   <div class="pd-user">
                        <p>Login / Signup</p>
                   </div>
                   </a>
                   <div class="ht-right-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>    
                   </div>
                   <div class="ht-right-social">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                   </div>
                   <div class="ht-right-social">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                   </div>
                </div>
            </div>
        </div>
        <!--TOP HEADER END-->
