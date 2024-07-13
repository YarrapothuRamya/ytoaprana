<div id="mainwrap">
    <span class="fl">&copy; <?=date("Y").' '.TITLE;?>, All Rights Reserved.</span>
    <span class="fr">Powered By <a href="http://www.ytoa-prana.com" title="Website Design, Development, Maintenance &amp; Powered by Y to A - Prana Health Services Private Limited.," target="_blank">Y to A - Prana Health Services Private Limited</a></span>
    <div class="clear"></div>
</div>

<div class="clear"></div>
<a href="#" class="scrollup" title="Scroll Top">Scroll</a>
<?php include_once("privileges_check.php"); ?>
<script type="text/javascript">
$(document).ready(function(){ 
	$(window).scroll(function(){
		if($(this).scrollTop() > 100){
			$('.scrollup').fadeIn();
		}else{
			$('.scrollup').fadeOut();
		}
	}); 
	
	$('.scrollup').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});
});
</script>