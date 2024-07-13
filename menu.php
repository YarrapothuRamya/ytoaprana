<?php
	include("application/includes/conn.php");
?>
    <!--HEADER START-->
    <header>

    <?php 
		include("header.php");
	?>
        
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
                            <li><a href="doctors.php">
                            <div class="product-tab-title">Find Doctors</div>
							<div class="tab-subtitle">Book An Appointment</div></a>
                            </li>
                            <li><a href="javascrips:;">
								<div class="product-tab-title">Specialities</div>
								<div class="tab-subtitle">Super Specialities</div></a>
                                <ul class="nav-dropdown">
<?php 
	$catqry=Query("select * from ytoa_regcat where regcat_status=1");
	while($crow=Fetch($catqry)){
?>
		<li><a href="#"><?=$crow['regcat_name']?></a>
		<?php 
		$subcatqry=Query("select * from ytoa_regsub_cat where regsubc_status=1 and regsubc_catid=".$crow['regcat_id']);
		$sc_count=NumRows($subcatqry);
		if($sc_count>0) {
		?>
			<ul class="nav-dropdown">
				<?php	while($scrow=Fetch($subcatqry)){	?>
					<li><a href="pages.php?subcat_id=<?=$scrow['regsubc_id']?>"><? echo $scrow['regsubc_name'];?></a></li>
				<?php } ?>
			</ul>
			<?php } else {	?>
							<ul class="nav-dropdown">
							<li><a href="catpages.php?cat_id=<?=$crow['regcat_id']?>"><? echo $crow['regcat_name'];?></a></li>
							</ul>
<?php
			}
				?>
		</li>
		<?php } ?>
								</ul>
							</li>
                             <li><a href="pharmacy.php">
                            <div class="product-tab-title">Medicines</div>
							<div class="tab-subtitle">Pharmacy</div></a>
                            </li>
                             <li><a href="diagnostic.php">
                            <div class="product-tab-title">Laboratory</div>
							<div class="tab-subtitle">Diagnostics</div></a>
                                <ul class="nav-dropdown">
									<li><a href="#">Laboratory / Tests</a></li>
									<li><a href="#">Scan / X-Ray</a></li>
								</ul>
                            </li>
                             <li><a href="emergency.php">
							 <!--emeservices_registration.php-->
                            <div class="product-tab-title">Emergency</div>
							<div class="tab-subtitle">Services</div></a>
                                <ul class="nav-dropdown">
									<li><a href="bbservices_registration.php">Blood Banks</a></li>
									<li><a href="#">Ambulances</a></li>
								</ul>
                            </li>
                             <li><a href="about.php">
                            <div class="product-tab-title">About</div>
							<div class="tab-subtitle">Y to A - Prana</div></a>
							</li>
                             <li><a href="contact-us.php">
                            <div class="product-tab-title">Support</div>
							<div class="tab-subtitle">Contact Us</div></a>
                            </li>
                             <li><a href="faq.php">
                            <div class="product-tab-title">Help</div>
							<div class="tab-subtitle">FAQs</div></a>
                            </li>
                            <!--li><a href="#">For Providers</a>
                                <ul class="nav-dropdown">
                                    <li><a href="javascrips:;">Practo Prime</a></li>
                                    <li><a href="javascrips:;">Software for providers</a></li>
                                    <li><a href="javascrips:;">List your practice for Free</a></li>
                                    <li><a href="javascrips:;">Corporate wellness</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Security & Help</a>
                                <ul class="nav-dropdown">
                                    <li><a href="javascrips:;">Data security</a></li>
                                    <li><a href="javascrips:;">Help</a></li>
                                </ul>
                            </li--> 
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--NAVBAR END-->  
    </header> 
    <!--HEADER END-->
       