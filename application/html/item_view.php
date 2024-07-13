<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

$res = Query("select * from bi_item as I
              left join bi_pcategory as C on C.pcat_id=I.itm_catid
	          left join bi_psub_category as S on S.psubc_id=I.itm_subcatid
			  where itm_id=".$_GET['id']);
$vrow = Fetch($res);

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