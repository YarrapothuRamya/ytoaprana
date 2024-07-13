<?php
include '../includes/conn.php'; // include the library for database connection
include_once("../includes/class.phpmailer.php"); 
$dropdown = "";
session_start(); //print_r($_POST);exit;
// Status Change
if(!empty($_REQUEST['act']) && $_REQUEST['act']=='status'){ 
	$id=$_POST['id'];$t=$_POST['t'];$p=$_POST['p'];
	$upqur=Query("update $t set ".$p."status='".$_POST['cs']."' where ".$p."id='".$id."'");
	if($_POST['cs']==1){ $st_class='icn-link-green';$cs=2;$sm="Inactivate"; } else { $st_class='icn-link-red';$cs=1;$sm="Activate"; }
	$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;	
	echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
}
// Dropdown fetching
if(!empty($_REQUEST['drop'])) {

	if($_REQUEST['drop']=='st'){ // For District
		echo '<option value="">Select District</option>';
		dropdown('bi_districts', 'dt_id,dt_name', 'dt_status=1 and dt_state_id="'.$_POST['state_id'].'" order by dt_name', '');
	}  else if($_REQUEST['drop']=='dt'){ // For Mandals
		echo '<option value="">Select Mandal</option>';
		dropdown('bi_mandals', 'md_id,md_name', 'md_status=1 and md_dist_id="'.$_POST['dist_id'].'" order by md_name', '');
	}  else if($_REQUEST['drop']=='fscat'){ // For Sub-Category
		echo '<option value="">Select FAQ Sub-Category</option>';
		dropdown('ytoa_fsub_category', 'fsubc_id,fsubc_name', 'fsubc_status=1 and fsubc_catid="'.$_POST['fascat_id'].'" order by fsubc_name', '');	
	}  else if($_REQUEST['drop']=='regcat'){ // For Sub-Category
	//alert("hello");
		echo '<option value="">Select Department / Category</option>';
		dropdown('ytoa_regsub_cat', 'regsubc_id,regsubc_name', 'regsubc_status=1 and regsubc_catid="'.$_POST['regcat_id'].'" order by regsubc_name', '');
	}  else if($_REQUEST['drop']=='rscat'){ // For Sub-Category
		echo '<option value="">Select Reg Sub-Category</option>';
		dropdown('bi_regsub_cat', 'regsubc_id,regsubc_name', 'regsubc_status=1 and regsubc_catid="'.$_POST['scat_id'].'" order by regsubc_name', '');
	}
	}


if(!empty($_REQUEST['act']) && $_REQUEST['act']=='pre_move'){ 
	$id=$_POST['id'];$t=$_POST['t'];$p=$_POST['p'];
	$upqur=Query("update $t set ".$p."parent_id='".$_POST['cs']."',vap_movdate='".$now_time."' where ".$p."id='".$id."'");
}

if(!empty($_REQUEST['refaval']) && $_REQUEST['refaval']=='availability'){ 
$aval_qnt = getdata("bi_biba","count(*)","bib_status=1 and bib_refno='".$_POST['refno']."'");
if($aval_qnt>0){
echo "";
}else{
 echo "<span class='alert alert-danger'> Referral Number Not Available.</span>";
 }
}


if(!empty($_REQUEST['qtyaval']) && $_REQUEST['qtyaval']=='avail'){ 
$aval_bpsqty = getdata("bi_bpsproducts","sum(bpsprod_qty)","bpsprod_status=1 and bpsprod_subi='".$_POST['subi']."'");
$aval_bshgsqty=getdata("bi_bshgsproducts","sum(bshgsprod_qty)","bshgsprod_status=1 and bpsprod_subi='".$_POST['subi']."'");
$aval_bnsqty=getdata("bi_bnsproducts","sum(bnsprod_qty)","bnsprod_status=1 and bpsprod_subi='".$_POST['subi']."'");
if($aval_bpsqty==NULL) $aval_bpsqty=0;
if($aval_bshgsqty==NULL) $aval_bshgsqty=0;
if($aval_bnsqty==NULL) $aval_shgsqty=0;
//Used Quantity
//$used_qnt=$aval_bpsqty-($aval_bshgsqty+$aval_bnsqty);
$aval_qnt=$aval_bpsqty-($aval_bshgsqty+$aval_bnsqty+$_POST['reqqty']);
//alert($aval_qnt); exit;
if($aval_qnt>=0){
echo "";
}else{
 echo "<span class='alert alert-danger'> Quantity Not Available.</span>";
 }
}