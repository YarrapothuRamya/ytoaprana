<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");

if(!isset($_SESSION['ERP_Utype'])){ header("location: logout.php"); }
	if($_GET['v']=='emp') {
		$res = Query("select sup_avatar,sup_fname,sup_lname from bi_suppliers where sup_id=".$_GET['id']);
		$path="sup_photos/"; $typ="img";
	} else if($_GET['v']=='mem') {
		$res = Query("select mem_avatar from hf_members where mem_id=".$_GET['id']);
		$path="mem_photos/"; $typ="img";
	} else if($_GET['v']=='tp') {
		$res = Query("select p_upload from hf_photos where p_id=".$_GET['id']);
		$path="p_uploads/"; $typ="img";
	} else if($_GET['v']=='hps') {
		$res = Query("select hps_upload from hf_sliders where hps_id=".$_GET['id']);
		$path="sponsor_uploads/"; $typ="img";		
	} else if($_GET['v']=='su') {
		$res = Query("select n_upload from hf_news where n_id=".$_GET['id']);
		$path="news_uploads/"; $typ="img";
	} else if($_GET['v']=='ev') {
		$res = Query("select ev_upload from hf_events where ev_id=".$_GET['id']);
		$path="events_uploads/"; $typ="img";
	} else if($_GET['v']=='dwl') {
		$res = Query("select rep_path from hf_reports where rep_id=".$_GET['id']);
		$path="rep_uploads/"; $typ="doc";
	} 
 if($typ=="img") { $styles="max-width:800px; max-height:600px;min-width:200px;";} else { $styles="min-width:200px;"; }
		$vrow = mysqli_fetch_row($res);
		if(isset($vrow[1])) { $name=$vrow[1]." ".$vrow[2]; } else { $name=""; }
		$avatar=$path.$vrow[0];
include($incFILE);		
?>