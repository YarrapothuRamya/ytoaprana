<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

$res = Query("select * from ytoa_diagnostic as R
			  where diagnostic_id=".$_GET['id']);
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