<?php
ob_start();
session_start();

if(time() - $_SESSION['ERP_timestamp'] > 1500) { //subtract new timestamp from the old one
    unset($_SESSION['ERP_Uid'], $_SESSION['ERP_timestamp']);
    header("Location: logout.php"); //redirect to index.php
    exit;
} else {
	$_SESSION['ERP_timestamp']=time();
}

if(empty($_SESSION['ERP_Uid'])){ header('location: logout.php'); exit; }
if(!isset($_SESSION['ERP_Utype']) && $_SESSION['ERP_Utype']!='1' ){	header("location:logout.php"); }
?>