<?php
	include("application/includes/conn.php");
	$portal_dtls=get_data("portal_details","*","p_status=1");
?>

	<!-- FOOTER START -->
    <footer>
        <div class="container">
            <div class="row">
              <div class="col-lg-3">
                <div class="footer-col">
                  <figure class="footer-logo"><img src="img/master/t-logo.png" alt=""></figure>
					<p><?=readMoreFunction_LS("Y to A Prana is with a clear Vision & Mission to remodel & Restructure present medical health care system. Y to A - Prana redefines 21st Century health care with a focus on understanding present & Future barriers encountered in evolving health care system. Y to A prana have Innovative solutions to address medical needs of this generation.</p>
					<p>We believe, health can be enbreced with sustained & systemetic efforts. Y to A prana is devoted in working towards health of mankind.</p>
					<p>We assure you that you are at right place to pursue your healthcare.")?></p>
                  <div class="footer-icon">
                    <div class="span-fi">
                        <div class="fi-fas"><i class="fas fa-map-marker"></i></div>
                        <div class="fi-caption">
                            <p><?=$portal_dtls['p_address'] ?></p>  
                        </div>
                    </div> 
                    <div class="span-fi">
                        <div class="fi-fas"><i class="fas fa-phone"></i></div>
                        <div class="fi-caption">
                            <p>Call US: <?=$portal_dtls['p_phno'] ?></p>  
                        </div>
                    </div> 
                    <div class="span-fi">
                        <div class="fi-fas"><i class="fas fa-envelope"></i></div>
                        <div class="fi-caption">
                            <p><?=$portal_dtls['p_email'] ?></p>  
                        </div>
                    </div>  
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="footer-col">
                  <h4>RECENT POSTS</h4>
<?php
	$sqlqry=Query("select * from ytoa_gallery where va_status=1 and va_cat_id=2 order by va_id DESC LIMIT 3");
//	$pqry=Fetch($sqlqry);
	while($pqry=Fetch($sqlqry)){
		$cat_name=getdata("ytoa_gallery_cat","gal_catname","gal_catid=".$pqry['va_pcatid']);
?>
                  <div class="media-post">
                      <figure class="media-thumb"><a href="#"><img src="uploads/gal_uploads/news/thumb/<?=$pqry['va_path']?>" alt=""></a></figure>
                      <div class="media-caption">
                        <h5><?=$pqry['va_title']?></h5>
                        <p><?=date("d-M-Y",strtotime($pqry['va_added_date']))?></p>
                      </div>
                  </div>
                  <hr class="divider">  
	<?php } ?>
				</div>
              </div>
              <div class="col-lg-3">
                <div class="footer-col">
                  <h4>TAGS</h4>
                  <div class="popular-links">
                    <ul>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="#">Blogs & News</a></li>
                        <li><a href="contact-us.php">Contact US</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="gallery_content.php">Gallery</a></li>
                    </ul>  
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="footer-col last-col">
                  <h4>INSTAGRAM PHOTOS</h4>
                  <div class="footer-grid-box">
                    <div class="row">
                      <div class="col-4 col-sm-2 col-md-2 col-lg-4 gb-photos">
                        <a href="#"><img src="img/images/img15.jpg" alt=""></a>
                      </div>
                      <div class="col-4 col-sm-2 col-md-2 col-lg-4 gb-photos">
                        <a href="#"><img src="img/images/img27.jpg" alt=""></a>
                      </div>
                      <div class="col-4 col-sm-2 col-md-2 col-lg-4 gb-photos">
                        <a href="#"><img src="img/images/img28.jpg" alt=""></a>
                      </div>
                      <div class="col-4 col-sm-2 col-md-2 col-lg-4 gb-photos">
                        <a href="#"><img src="img/images/img29.jpg" alt=""></a>
                      </div>
                      <div class="col-4 col-sm-2 col-md-2 col-lg-4 gb-photos">
                        <a href="#"><img src="img/images/img30.jpg" alt=""></a>
                      </div>
                      <div class="col-4 col-sm-2 col-md-2 col-lg-4 gb-photos">
                        <a href="#"><img src="img/images/img31.jpg" alt=""></a>
                      </div>
                    </div>  
                  </div>
                </div>
              </div>
            </div>
            <hr class="divider">
            <div class="footer-bottom">
                <div class="fb-copyright">
                    <p>© 2021 <?=$portal_dtls['p_name']?></p>
                </div>
                <div class="fb-social">
                    <div class="span-fb-social"><a href="#"><i class="fab fa-facebook-f"></i></a></div>
                    <div class="span-fb-social"><a href="#"><i class="fab fa-twitter"></i></a></div>
                    <div class="span-fb-social"><a href="#"><i class="fab fa-linkedin-in"></i></a></div>
                    <div class="span-fb-social last-box"><a href="#"><i class="fab fa-instagram"></i></a></div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->

