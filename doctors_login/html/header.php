<!--topwrap start-->
<div class="topwrap">
    <span class="fl mr10"><h3 align="right" id="clock"><?=date('l, d F Y');?> | <span id="time"><?=date('h:i:s A');?></span></h3></span>
    <span class="fl">IP Address : <?=$_SERVER['REMOTE_ADDR'];?></span>
    
    <span class="mymenu">
	<!-- background:url(../images/icn_user.png) no-repeat 10px 9px #ecf5fb;-->
    	<a href="javascript:;" class="myaccmenu"  data-dropdown="#mymenu">	
		<?php $avatar=getdata('ytoa_doc_usermanagement','doc_um_avatar','doc_um_id='.$ERP_Uid); 
		if(!empty($avatar)) {
		?>
		<img src="<?=BASEURLF."uploads/doctor_photos/".$avatar ?>" height="10" >
		<?php } ?>
		<?=$_SESSION['ERP_Uname'];?>
		<i class="fa fa-angle-down fa-lg"></i>
		</a>
        <div id="mymenu" class="dropdown dropdown-tip dropdown-anchor-right">
        	<ul class="dropdown-menu">
				<!--li><img src="<?//=BASEURLF."uploads/doctor_photos/".$avatar ?>" height="80"></li-->
            	<li><a href="profile">My Profile</a></li>
                <li><a href="change_password">Change Password</a></li>
                <li class="dropdown-divider"></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
		</div>
	</span>
    <div class="clear"></div>
</div>

<!--logowrap start-->
<div class="logowrap" style="background:#ffffff; padding:10px 0;">
	<!--<span class="logo"><a href="dashboard.php"><img src="<?=BASEURL.LOGO ?>" alt="<?=TITLE?>"></a></span>-->
    <span style="margin-left:15px;"><a href="dashboard.php"><img src="<?=BASEURL.LOGO ?>" alt="<?=TITLE?>" height="" width="auto"></a></span>
    <span class="logo_weberp4" style=" background:#FFFFFF"><a href="http://www.ytoa-prana.com" target="_blank"><img src="<?=BASEURL.ERPLOGO?>" alt="<?php echo ERPTITLE;?>" width="auto" height="" align="absmiddle"></a></span>
  <div class="clear"></div>
</div>
<div class="clear"></div>