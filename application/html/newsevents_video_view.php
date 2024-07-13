<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

$res = Query("select * from bi_news 
			where ne_id=".$_GET['id']);
$vrow = Fetch($res);
$img_path="../../uploads/gal_uploads/news_events/".$vrow["ne_path"]; 

include($incFILE);
?>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>