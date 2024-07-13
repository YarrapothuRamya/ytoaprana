<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

$res = Query("select * from bi_regfee as RF
              left join bi_regcat as C on C.regcat_id=RF.regfee_catid
	          left join bi_regsub_cat as S on S.regsubc_id=RF.regfee_subc_id
			  where regfee_id=".$_GET['id']);
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