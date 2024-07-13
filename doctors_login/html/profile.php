<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");
$page_name="My Account";

if(!isset($_SESSION['ERP_Utype']) && $_SESSION['ERP_Utype']!='1' ){	header("location:logout.php"); }

$admin_id=Query("select * from ytoa_doctor where doc_id='$ERP_Uid'");
$vrow=Fetch($admin_id);
include(RNSTM);
?>