<div id="mainwrap">
    <span class="fl">&copy; <?=date("Y").' '.TITLE;?>, All Rights Reserved.</span>
    <span class="fr">Powered By <a href="#" title="Website Design, Development, Maintenance &amp; Powered by Group of Companies.," target="_blank">RLK</a></span>
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