<? $ses_privileges=$_SESSION['ERP_Uprivileges']; ?>
<ul class="mainmenu tc">
    <li class="top"><a href="dashboard.php" class="top_link"><span class="icn_home"></span></a></li>
      <? /* if( (isset($_SESSION['ERP_Utype']) && $_SESSION['ERP_Utype']=='1') || (is_array($ses_privileges) && count(array_intersect(array('CMS_STS','CMS_DTS','CMS_MDS','CMS_LOC','CMS_GALL','CMS_PAYM'), $ses_privileges))>0) ){ ?>
          <li class="top"><a href="javascript:;" class="top_link menu_text"><span class="down">Website CMS<i class="fa fa-angle-down fa-lg"></i></span></a>
            <ul class="sub">
            <? if($_SESSION['ERP_Utype']=='1' || in_array("CMS_STS", $ses_privileges)){ ?>
            <li><a href="states">Manage States</a></li>
            <? } if($_SESSION['ERP_Utype']=='1' || in_array("CMS_DTS", $ses_privileges)){ ?>
            <li><a href="districts">Manage Districts</a></li>
            <? } if($_SESSION['ERP_Utype']=='1' || in_array("CMS_MDS", $ses_privileges)){ ?>
             <li><a href="mandals">Manage Mandals</a></li>
<?php /*
            <? } if($_SESSION['ERP_Utype']=='1' || in_array("CMS_LOC", $ses_privileges)){ ?>
           <li><a href="locations">Manage Village</a></li> */ ?>
            <? /* } if($_SESSION['ERP_Utype']=='1' || in_array("CMS_GALL", $ses_privileges)){ ?>
            <li><a href="#nogo"><span class="right" >Gallery <i class="fa fa-angle-right fa-lg" style="float:right;"></i></span></a>
                <ul>
                	 <li><a href="gallery_categories">Manage Photo Categories</a></li>
                     <li><a href="gallery_add?pg=add&type=Photo_Gallery">Add Photo Gallery</a></li>
                    <li><a href="gallery_add?pg=add&type=News-Articles">Add News-Articles Gallery</a></li>
                </ul>
          <? } if($_SESSION['ERP_Utype']=='1' || in_array("CMS_PAYM", $ses_privileges)){ ?>
                <li><a href="payment_categories">Manage Payment Modes</a></li>

            <? } ?>
            </ul>
         </li>
     <? } */
	 if( (isset($_SESSION['ERP_Utype']) && ($_SESSION['ERP_Utype']=='1')) || (is_array($ses_privileges) && count(array_intersect(array('MNG_REGCAT','MNG_REGSUBCAT','MNG_REGFEE'), $ses_privileges))>0) ) { ?>
         
         <li class="top"><a href="javascript:;" class="top_link menu_text"><span class="down">All Categories<i class="fa fa-angle-down fa-lg"></i></span></a>
            <ul class="sub">
				
               <li><a href="#nogo"><span class="right" >Doctors Categories<i class="fa fa-angle-right fa-lg" style="float:right;"></i></span></a>
               <ul>
					<? if($_SESSION['ERP_Utype']=='1' || in_array("MNG_REGCAT", $ses_privileges)){ ?>
						<li><a href="regcategories">Manage Doctor Categories</a></li>
					<? } if($_SESSION['ERP_Utype']=='1' || in_array("MNG_REGSUBCAT", $ses_privileges)){ ?>
						<li><a href="regsub_categories">Manage Doctor Sub Categories</a></li>
				</ul></li>
                <? } if($_SESSION['ERP_Utype']=='1' || in_array("MNG_PHCAT", $ses_privileges)){ ?>
                <li><a href="pharmacategories">Pharma Categories</a></li>
                <? } if($_SESSION['ERP_Utype']=='1' || in_array("MNG_DIAGCAT", $ses_privileges)){ ?>
                <li><a href="diagnosticcategories">Diagnostic Categories</a></li>
                <? } if($_SESSION['ERP_Utype']=='1' || in_array("MNG_EMERCAT", $ses_privileges)){ ?>
                <li><a href="emergencycategories">Emergency Categories</a></li>
<?php /*
                <? } if($_SESSION['ERP_Utype']=='1' || in_array("MNG_PHSUBCAT", $ses_privileges)){ ?>
                <li><a href="pharmasub_categories">Manage Pharma Sub Categories</a></li>
                <? } if($_SESSION['ERP_Utype']=='1' || in_array("MNG_REGFEE", $ses_privileges)){ ?>
                 <li><a href="regfee">Manage Registrations Fee</a></li>
                 <? } if($_SESSION['ERP_Utype']=='1' || in_array("MNG_DLOFF", $ses_privileges)){ ?>
                 <li><a href="deals">Manage Deals/Offers</a></li>
*/ ?>
                <? } ?>
            </ul>
         </li>         


         <? }  if( (isset($_SESSION['ERP_Utype']) && ($_SESSION['ERP_Utype']=='1')) || (is_array($ses_privileges) && count(array_intersect(array('SHG_REG_MNG','SHG_PAY_MNG','BPS_REG_MNG','BPS_PAY_MNG','DOC_REG_MNG','DOC_PAY_MNG'), $ses_privileges))>0) ) { ?>
         <li class="top"><a href="javascript:;" class="top_link menu_text"><span class="down">Doctors<i class="fa fa-angle-down fa-lg"></i></span></a>
            <ul class="sub">
		       <? if($_SESSION['ERP_Utype']=='1' || in_array("DOC_REG_MNG", $ses_privileges)){ ?>
                <li><a href="doctor_registration">Manage Doctors Registrations</a></li> 
                  <? } if($_SESSION['ERP_Utype']=='1' || in_array("DOC_PAY_MNG", $ses_privileges)){ ?>
                <li><a href="#">Manage Doctors Payments</a></li> 
                <? } ?>
                </ul>
               </li>
			   
		 <? }  if( (isset($_SESSION['ERP_Utype']) && ($_SESSION['ERP_Utype']=='1')) || (is_array($ses_privileges) && count(array_intersect(array('PHARMA_REG_MNG'), $ses_privileges))>0) ) { ?>
         <li class="top"><a href="javascript:;" class="top_link menu_text"><span class="down">Pharmacy<i class="fa fa-angle-down fa-lg"></i></span></a>
            <ul class="sub">
		        <? if($_SESSION['ERP_Utype']=='1' || in_array("PHARMA_REG_MNG", $ses_privileges)){ ?>
                <li><a href="pharma_registration.php">Manage Pharmacy Registrations</a></li>
                 <? } if($_SESSION['ERP_Utype']=='1' || in_array("PHARMA_PAY_MNG", $ses_privileges)){ ?> 
                <li><a href="#">Manage Pharmacy Payments</a></li> 
                <? } ?>
            </ul>
         </li>

		 <? }  if( (isset($_SESSION['ERP_Utype']) && ($_SESSION['ERP_Utype']=='1')) || (is_array($ses_privileges) && count(array_intersect(array('PHARMA_REG_MNG'), $ses_privileges))>0) ) { ?>
         <li class="top"><a href="javascript:;" class="top_link menu_text"><span class="down">Diagnostic<i class="fa fa-angle-down fa-lg"></i></span></a>
            <ul class="sub">
		        <? if($_SESSION['ERP_Utype']=='1' || in_array("DIAG_REG_MNG", $ses_privileges)){ ?>
                <li><a href="diagnostic_registration.php">Manage Diagnostic Registrations</a></li>
                 <? } if($_SESSION['ERP_Utype']=='1' || in_array("DIAG_PAY_MNG", $ses_privileges)){ ?> 
                <li><a href="#">Manage Diagnostic Payments</a></li> 
                <? } ?>
            </ul>
         </li>


		 <? }  if( (isset($_SESSION['ERP_Utype']) && ($_SESSION['ERP_Utype']=='1')) || (is_array($ses_privileges) && count(array_intersect(array('PHARMA_REG_MNG'), $ses_privileges))>0) ) { ?>
         <li class="top"><a href="javascript:;" class="top_link menu_text"><span class="down">Emergency<i class="fa fa-angle-down fa-lg"></i></span></a>
            <ul class="sub">
		        <? if($_SESSION['ERP_Utype']=='1' || in_array("EMER_REG_MNG", $ses_privileges)){ ?>
                <li><a href="emergency_registration.php">Manage Emergency Registrations</a></li>
                 <? } if($_SESSION['ERP_Utype']=='1' || in_array("EMER_PAY_MNG", $ses_privileges)){ ?> 
                <li><a href="#">Manage Emergency Payments</a></li> 
                <? } ?>
            </ul>
         </li>

		  <? } if( (isset($_SESSION['ERP_Utype']) && ($_SESSION['ERP_Utype']=='1')) || (is_array($ses_privileges) && count(array_intersect(array('BIBA_REG_MNG','BIBA_PAY_MNG','NRV_REG_MNG','NRV_PAY_MNG','NRI_REG_MNG','NRI_PAY_MNG','SHGM_REG_MNG','SHGM_PAY_MNG'), $ses_privileges))>0) ) { ?>
         <li class="top"><a href="javascript:;" class="top_link menu_text"><span class="down">Patients<i class="fa fa-angle-down fa-lg"></i></span></a>
            <ul class="sub">
		        <? if($_SESSION['ERP_Utype']=='1' || in_array("BIBA_REG_MNG", $ses_privileges)){ ?>
                <li><a href="#">Manage Patients Registrations</a></li>
                 <? } if($_SESSION['ERP_Utype']=='1' || in_array("BIBA_PAY_MNG", $ses_privileges)){ ?> 
                <li><a href="#">Manage Patients Payments</a></li> 
                <? } ?>
                </ul></li>


     <? } if( (isset($_SESSION['ERP_Utype']) && ($_SESSION['ERP_Utype']=='1')) || (is_array($ses_privileges) && count(array_intersect(array('FAQ_CAT_ADD','FAQ_CAT','FAQ_SCAT_ADD','FAQ_SCAT','FAQ_ADD','FAQ_MNG'), $ses_privileges))>0) ) { ?>
         
         <li class="top"><a href="javascript:;" class="top_link menu_text"><span class="down">FAQs<i class="fa fa-angle-down fa-lg"></i></span></a>
            <ul class="sub">
                <? if($_SESSION['ERP_Utype']=='1' || in_array("FAQ_CAT", $ses_privileges)){ ?>
                <li><a href="faq_categories">FAQ Categories</a></li>
                <? } if($_SESSION['ERP_Utype']=='1' || in_array("FAQ_SCAT", $ses_privileges)){ ?>
                <li><a href="faq_sub_categories">FAQ Sub Categories</a></li>
                <? } if($_SESSION['ERP_Utype']=='1' || in_array("FAQ_MNG", $ses_privileges)){ ?>
                 <li><a href="faqs">FAQ's</a></li>
                <? } ?>
            </ul>
         </li>     
	<? 	} ?>   
</ul>