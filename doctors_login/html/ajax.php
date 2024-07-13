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
	}  else if($_REQUEST['drop']=='scat'){ // For Sub-Category
		echo '<option value="">Select Sub-Category</option>';
		dropdown('bi_psub_category', 'psubc_id,psubc_name', 'psubc_status=1 and psubc_catid="'.$_POST['scat_id'].'" order by psubc_name', '');
	}  else if($_REQUEST['drop']=='fscat'){ // For Sub-Category
		echo '<option value="">Select FAQ Sub-Category</option>';
		dropdown('bi_fsub_category', 'fsubc_id,fsubc_name', 'fsubc_status=1 and fsubc_catid="'.$_POST['fascat_id'].'" order by fsubc_name', '');	
	}  else if($_REQUEST['drop']=='rscat'){ // For Sub-Category
		echo '<option value="">Select Reg Sub-Category</option>';
		dropdown('bi_regsub_cat', 'regsubc_id,regsubc_name', 'regsubc_status=1 and regsubc_catid="'.$_POST['scat_id'].'" order by regsubc_name', '');
	} else if($_REQUEST['drop']=='mitra_mem'){ // For mitra number
		$n=getdata("bi_employees","emp_phone","emp_id=".$_POST['mem_id']."");		
		echo $n;
	} else if($_REQUEST['drop']=='rgscat'){ // For Registration Sub-Category
		echo '<option value="">Select Reg Sub Category</option>';
		dropdown('bi_regsub_cat', 'regsubc_id,regsubc_name', 'regsubc_status=1 and regsubc_catid="'.$_POST['rgcat_id'].'" order by regsubc_name', '');
	  }else if($_REQUEST['drop']=='subtype'){ // For Project
		echo '<option value="">Select Sub Type</option>';
		call_user_func_array('dropdown',array('si_property_type', 'pt_id,pt_name', 'pt_status=1 and pt_parent="'.$_POST['type_id'].'" order by pt_name', '')); 
	} else if($_REQUEST['drop']=='bps_per'){ // For BPS Product Cost, Values and Percentage
		$process_cost=$_POST['bps_procur_cost']*($_POST['bps_process_per']/100);
		$mfg_cost=$_POST['bps_procur_cost']*($_POST['bps_mfg_per']/100);
		$bairi_procur_cost=$_POST['bps_procur_cost']+$process_cost+$mfg_cost;
		$bairi_process_cost=$bairi_procur_cost*($_POST['bairi_process_cost']/100);	
		$bairi_promote_cost=$bairi_procur_cost+$bairi_process_cost;
		$gst=$_POST['mrp']*($_POST['gst']/100);
		$prod_withoutgst=round(($_POST['mrp']/(($_POST['gst']+100)/100)),2);
		$margin=$prod_withoutgst-$bairi_promote_cost;
		$margin_per_cost=round((($margin/$bairi_promote_cost)*100),0);
		$bairi_margin_cost=$margin_per_cost*($_POST['bairi_margin_cost']/100);	
		$margin_amount=round(($bairi_promote_cost*($bairi_margin_cost/100)),2);
		$store_price=round(($bairi_promote_cost+$margin_amount),2);
		$disc_amount=round(($_POST['mrp']*($_POST['disc_per']/100)),2);
		$sell_after_disc=$prod_withoutgst-$disc_amount;
		$sell_margin=round(($sell_after_disc-$store_price),2);
		$sell_margin_per=round((($sell_margin/$store_price)*100),0);
		$totalselling_marginprice_qty=$sell_margin*$_POST['qty'];
		echo $process_cost.",".$mfg_cost.",".$bairi_procur_cost.",".$bairi_process_cost.",".$bairi_promote_cost.",".$gst.",".$prod_withoutgst.",".$margin.",".$margin_per_cost.",".$bairi_margin_cost.",".$margin_amount.",".$store_price.",".$disc_amount.",".$sell_after_disc.",".$sell_margin.",".$sell_margin_per.",".$totalselling_marginprice_qty;
	}  else if($_REQUEST['drop']=='bps_items'){ // For Product Items of BPS
		echo '<option value="">Select Items</option>';
		//$n=getdata("bi_bps","bps_itemid","bps_id=".$_POST['bps_id']);	
		//echo $n;
//		echo '<option value="">Select Items</option>';
		bpsitems_dropdown('bi_bps', 'bps_itemid,bps_itemid', 'bps_status=1 and bps_id="'.$_POST['bps_id'].'" order by bps_name', '');
	}  else if($_REQUEST['drop']=='bps_subitems'){ // For Product Sub Items of BPS
		echo '<option value="">Select Sub Items</option>';
		dropdown('bi_sub_item', 'psubi_id,	psubi_name', 'psubi_status=1 and psubi_itemid="'.$_POST['bps_itemid'].'" order by psubi_name', '');
	}  else if($_REQUEST['drop']=='bps_invoice'){ // For Product Invoice of BPS
		//alert($_POST['bps_id']);
		echo '<option value="">Select Invoice Nos</option>';
		dropdown('bi_bpsproducts', 'bpsprod_invoiceno,	bpsprod_invoiceno', 'bpsprod_status=1 and bpsprod_vendor_id='.$_POST['bps_id'].' and bpsprod_subi='.$_POST['bps_subi'], '');
	}  else if($_REQUEST['drop']=='bpsprod_qty'){ // For Product Qty of BPS Products
		
		$bpsqty=get_data("bi_bpsproducts","bpsprod_qty,bpsprod_sellmargin,bpsprod_storeprice","bpsprod_subi=".$_POST['bpsprod_id']." and bpsprod_vendor_id=".$_POST['bpsprod_vid']." and bpsprod_invoiceno='".$_POST['bps_invoiceno']."' and bpsprod_status=1");

		$bnsqty=getdata("bi_bnsproducts","bnsprod_qty","bpsprod_subi=".$_POST['bpsprod_id']." and bpsprod_vendor_id=".$_POST['bpsprod_vid']." and bpsprod_invoiceno='".$_POST['bps_invoiceno']."' and bnsprod_status=1");
		if($bnsqty==NULL) $bnsqty=0;
		
		$bshgsqty=getdata("bi_bshgsproducts","bshgsprod_qty","bpsprod_subi=".$_POST['bpsprod_id']." and bpsprod_vendor_id=".$_POST['bpsprod_vid']." and bpsprod_invoiceno='".$_POST['bps_invoiceno']."' and bshgsprod_status=1");
		if($bshgsqty==NULL) $bshgsqty=0;
		
		$bsmqty=getdata("bi_bsmproducts","bsmprod_qty","bpsprod_subi=".$_POST['bpsprod_id']." and bpsprod_vendor_id=".$_POST['bpsprod_vid']." and bpsprod_invoiceno='".$_POST['bps_invoiceno']."' and bsmprod_status=1");
		if($bsmqty==NULL) $bsmqty=0;

		$bpsvalue=getdata("bi_bpsproducts","bpsprod_sellmargin","bpsprod_subi=".$_POST['bpsprod_id']." and bpsprod_vendor_id=".$_POST['bpsprod_vid']." and bpsprod_status=1 order by bpsprod_id DESC");

		$qty=$bpsqty['bpsprod_qty']-($bnsqty+$bshgsqty+$bsmqty);
		//alert($bsmqty); exit;
		echo $qty.",".$bpsqty['bpsprod_sellmargin'].",".$bpsvalue.",".$bpsqty['bpsprod_storeprice'];
	}	else if(($_REQUEST['drop']=='bshgs_per')||($_REQUEST['drop']=='bns_per')||($_REQUEST['drop']=='bsm_per')) { // BSHGS Calculations according to percentage values
		$storemargin_value=round(($_POST['bps_sellmargin']*$_POST['storemargin_per']/100),2);
		$balmargin=100-$_POST['storemargin_per'];
		$balance_value=round(($_POST['bps_sellmargin']*$balmargin/100),2);
		
		$actincome=round(($balance_value*$_POST['act_inc']/100),2);
		$pasincome=round(($balance_value*$_POST['pas_inc']/100),2);
		$contmargin=round(($balance_value*$_POST['cont_margin']/100),2);
		$mi2047margin=100-($_POST['act_inc']+$_POST['pas_inc']+$_POST['cont_margin']);
		$mi2047margin_value=round(($balance_value*$mi2047margin/100),2);
		
		$totbiba_per=$_POST['act_inc']+$_POST['pas_inc']+$_POST['cont_margin']+$mi2047margin;
		$totbiba_value=$actincome+$pasincome+$contmargin+$mi2047margin_value;
		
		$mngincome=round(($mi2047margin_value*$_POST['mng_margin']/100),2);
		$supincome=round(($mi2047margin_value*$_POST['sup_margin']/100),2);
		$companymi_per=100-($_POST['mng_margin']+$_POST['sup_margin']);
		$companymi_value=round(($mi2047margin_value*$companymi_per/100),2);
		
		$totdist_per=$_POST['mng_margin']+$_POST['sup_margin']+$companymi_per;
		$totdist_value=$mngincome+$supincome+$companymi_value;
		
		$abmincome=round(($mngincome*$_POST['abm_margin']/100),2);
		$foincome=round(($mngincome*$_POST['fo_margin']/100),2);
		$chairincome=round(($mngincome*$_POST['chair_margin']/100),2);
		$mdincome=round(($mngincome*$_POST['md_margin']/100),2);
		$ceoincome=round(($mngincome*$_POST['ceo_margin']/100),2);
		$cooincome=round(($mngincome*$_POST['coo_margin']/100),2);
		$srmincome=round(($mngincome*$_POST['srm_margin']/100),2);
		$mngmincome=round(($mngincome*$_POST['mng_mrg']/100),2);
		$srcincome=round(($mngincome*$_POST['src_margin']/100),2);
		$conincome=round(($mngincome*$_POST['con_margin']/100),2);
		$aibaincome=round(($mngincome*$_POST['aiba_margin']/100),2);
		$ibatincome=round(($mngincome*$_POST['ibat_margin']/100),2);

		$totmngr_per=$_POST['abm_margin']+$_POST['fo_margin']+$_POST['chair_margin']+$_POST['md_margin']+$_POST['ceo_margin']+$_POST['coo_margin']+$_POST['srm_margin']+$_POST['mng_mrg']+$_POST['src_margin']+$_POST['con_margin']+$_POST['aiba_margin']+$_POST['ibat_margin'];
		$totmngr_value=$abmincome+$foincome+$chairincome+$mdincome+$ceoincome+$cooincome+$srmincome+$mngmincome+$srcincome+$conincome+$aibaincome+$ibatincome;

		$mifaincome=round(($supincome*$_POST['mifa_margin']/100),2);
		$bhk3income=round(($supincome*$_POST['bhk3_margin']/100),2);
		$carincome=round(($supincome*$_POST['car_margin']/100),2);
		$hltincome=round(($supincome*$_POST['hlt_margin']/100),2);
		$accincome=round(($supincome*$_POST['acc_margin']/100),2);
		$eduincome=round(($supincome*$_POST['edu_margin']/100),2);
		$agrincome=round(($supincome*$_POST['agr_margin']/100),2);
		$localincome=round(($supincome*$_POST['local_margin']/100),2);
		$emgincome=round(($supincome*$_POST['emg_value']/100),2);
		
		$totsup_per=$_POST['mifa_margin']+$_POST['bhk3_margin']+$_POST['car_margin']+$_POST['hlt_margin']+$_POST['acc_margin']+$_POST['edu_margin']+$_POST['agr_margin']+$_POST['local_margin']+$_POST['emg_value'];
		$totsup_value=$mifaincome+$bhk3income+$carincome+$hltincome+$accincome+$eduincome+$agrincome+$localincome+$emgincome;
		
		echo $storemargin_value.",".$balmargin.",".$balance_value.",".$actincome.",".$pasincome.",".$contmargin.",".$mi2047margin.",".$mi2047margin_value.",".$mngincome.",".$supincome.",".$abmincome.",".$foincome.",".$chairincome.",".$mdincome.",".$ceoincome.",".$cooincome.",".$srmincome.",".$mngmincome.",".$srcincome.",".$conincome.",".$aibaincome.",".$ibatincome.",".$mifaincome.",".$bhk3income.",".$carincome.",".$hltincome.",".$accincome.",".$eduincome.",".$agrincome.",".$localincome.",".$emgincome.",".$totdist_per.",".$totdist_value.",".$totbiba_per.",".$totbiba_value.",".$totmngr_per.",".$totmngr_value.",".$totsup_per.",".$totsup_value.",".$companymi_per.",".$companymi_value;
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
/*
////
$dropdown = "";$sts_val = "";$sts_id="";

// Status Change
if(!empty($_REQUEST['memact']) && $_REQUEST['memact']=='status'){
	$id=$_POST['id'];$t=$_POST['t'];$p=$_POST['p'];
	//$sts_val = getdata("sh_members","mem_status","mem_id='".$id."'");
	$sts_val = get_data("bi_bsm","bsm_status,bsm_email,bsm_name","bsm_id='".$id."'");
	$sts_id=$sts_val['bsm_status'];
	if($sts_id==0){ 
       $sig_admin	= "Thanks,<br>Bairisons Team";
	   $toname = $sts_val['bsm_name'];
	   $toemail	= $sts_val['bsm_email'];
	   $rand=uniqid();
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'>Your Registration Details verified successfully.</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					</table>
					";
			$mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
			$mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
			$mail_body_user=str_replace("disname",$toname,$mail_body_user);	
		    //echo $mail_body_user; exit;
			$mail_user = new PHPMailer();	
			$mail_user->IsMail();
			$mail_user->FromName = FROM_NAME;
			$mail_user->From 	= FROM_MAIL;
			$mail_user->AddAddress($toemail);
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "BSM Registration Status from Bairisons.com";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user;echo "<br>";echo $mail_body; exit;
		$up_arr['bsm_status']=1;
		$up_arr['bsm_updated_by']=$_SESSION['ERP_Uid'];
		$up_arr['bsm_updated_date']=$now_time;
		update_Defined('bi_bsm', array_map('trim',$up_arr),"bsm_id='".$id."'");
		$st_class='icn-link-green';$cs=2;$sm="Inactivate";
		$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;
	 echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
	 }else{
	$upqur=Query("update $t set ".$p."status='".$_POST['cs']."' where ".$p."id='".$id."'");
	if($_POST['cs']==1){ $st_class='icn-link-green';$cs=2;$sm="Inactivate"; } else { $st_class='icn-link-red';$cs=1;$sm="Activate"; }
	$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;	
	echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
  }
}

// Status Change for BIBA
if(!empty($_REQUEST['memact_biba']) && $_REQUEST['memact_biba']=='status'){
	$id=$_POST['id'];$t=$_POST['t'];$p=$_POST['p'];
	//$sts_val = getdata("sh_members","mem_status","mem_id='".$id."'");
	$sts_val = get_data("bi_biba","bib_status,bib_email,bib_name,bib_username,bib_password","bib_id='".$id."'");
	$sts_id=$sts_val['bib_status'];
	if($sts_id==0){ 
       $sig_admin	= "Thanks,<br>Bairisons Team";
	   $toname = $sts_val['bib_name'];
	   $toemail	= $sts_val['bib_email'];
	   $bps_username	= $sts_val['bib_username'];
	   $bps_password	=rnsb64ende($sts_val['bib_password'],1);
	   
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'>Your Registration Details verified successfully.</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					   <tr>
						<td align='left'  class='textfont'><strong>User Name: </strong>".$bps_username."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'><strong>Password : </strong>".$bps_password."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><a href='".BASEURLF."biba_dashboard/' target='_blank'>Click here</a> to login.</td>
					  </tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					</table>
					";
			$mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
			$mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
			$mail_body_user=str_replace("disname",$toname,$mail_body_user);	
		    //echo $mail_body_user; exit;
			$mail_user = new PHPMailer();	
			$mail_user->IsMail();
			$mail_user->FromName = FROM_NAME;
			$mail_user->From 	= FROM_MAIL;
			$mail_user->AddAddress($toemail);
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "BIBA Registration Status from Bairisons.com";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user;echo "<br>";echo $mail_body; exit;
		$up_arr['bib_status']=1;
		$up_arr['bib_updated_by']=$_SESSION['ERP_Uid'];
		$up_arr['bib_updated_date']=$now_time;
		update_Defined('bi_biba', array_map('trim',$up_arr),"bib_id='".$id."'");
		$st_class='icn-link-green';$cs=2;$sm="Inactivate";
		$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;
	 echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
	 }else{
	$upqur=Query("update $t set ".$p."status='".$_POST['cs']."' where ".$p."id='".$id."'");
	if($_POST['cs']==1){ $st_class='icn-link-green';$cs=2;$sm="Inactivate"; } else { $st_class='icn-link-red';$cs=1;$sm="Activate"; }
	$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;	
	echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
  }
}

// Status Change for BPS
if(!empty($_REQUEST['memact_bps']) && $_REQUEST['memact_bps']=='status'){
	$id=$_POST['id'];$t=$_POST['t'];$p=$_POST['p'];
	$sts_val = get_data("bi_bps","bps_status,bps_email,bps_name,bps_username,bps_password","bps_id='".$id."'");
	$sts_id=$sts_val['bps_status'];
	if($sts_id==0){ 
       $sig_admin	= "Thanks,<br>Bairisons Team";
	   $toname = $sts_val['bps_name'];
	   $toemail	= $sts_val['bps_email'];
	   $bps_username	= $sts_val['bps_username'];
	   $bps_password	=rnsb64ende($sts_val['bps_password'],1);
	   
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'>Your Registration Details verified successfully.</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><strong>User Name: </strong>".$bps_username."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'><strong>Password : </strong>".$bps_password."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><a href='".BASEURLF."bps_dashboard/' target='_blank'>Click here</a> to login.</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					</table>
					";
			$mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
			$mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
			$mail_body_user=str_replace("disname",$toname,$mail_body_user);	
		    //echo $mail_body_user; exit;
			$mail_user = new PHPMailer();	
			$mail_user->IsMail();
			$mail_user->FromName = FROM_NAME;
			$mail_user->From 	= FROM_MAIL;
			$mail_user->AddAddress($toemail);
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "BPS Registration Status from Bairisons.com";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user;echo "<br>";echo $mail_body; exit;
		$up_arr['bps_status']=1;
		$up_arr['bps_updated_by']=$_SESSION['ERP_Uid'];
		$up_arr['bps_updated_date']=$now_time;
		update_Defined('bi_bps', array_map('trim',$up_arr),"bps_id='".$id."'");
		$st_class='icn-link-green';$cs=2;$sm="Inactivate";
		$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;
	 echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
	 }else{
	$upqur=Query("update $t set ".$p."status='".$_POST['cs']."' where ".$p."id='".$id."'");
	if($_POST['cs']==1){ $st_class='icn-link-green';$cs=2;$sm="Inactivate"; } else { $st_class='icn-link-red';$cs=1;$sm="Activate"; }
	$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;	
	echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
  }
}


// Status Change for Bshgs
if(!empty($_REQUEST['memact_bshgs']) && $_REQUEST['memact_bshgs']=='status'){
	$id=$_POST['id'];$t=$_POST['t'];$p=$_POST['p'];
	$sts_val = get_data("bi_bshgs","bshgs_status,bshgs_email,bshgs_name,bshgs_username,bshgs_password","bshgs_id='".$id."'");
	$sts_id=$sts_val['bshgs_status'];
	if($sts_id==0){ 
       $sig_admin	= "Thanks,<br>Bairisons Team";
	   $toname = $sts_val['bshgs_name'];
	   $toemail	= $sts_val['bshgs_email'];
	   $bps_username	= $sts_val['bshgs_username'];
	   $bps_password	=rnsb64ende($sts_val['bshgs_password'],1);
	   
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'>Your Registration Details verified successfully.</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><strong>User Name: </strong>".$bps_username."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'><strong>Password : </strong>".$bps_password."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><a href='".BASEURLF."bshgs_dashboard/' target='_blank'>Click here</a> to login.</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					</table>
					";
			$mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
			$mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
			$mail_body_user=str_replace("disname",$toname,$mail_body_user);	
		    //echo $mail_body_user; exit;
			$mail_user = new PHPMailer();	
			$mail_user->IsMail();
			$mail_user->FromName = FROM_NAME;
			$mail_user->From 	= FROM_MAIL;
			$mail_user->AddAddress($toemail);
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "BSHGS Registration Status from Bairisons.com";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user;echo "<br>";echo $mail_body; exit;
		$up_arr['bshgs_status']=1;
		$up_arr['bshgs_updated_by']=$_SESSION['ERP_Uid'];
		$up_arr['bshgs_updated_date']=$now_time;
		update_Defined('bi_bshgs', array_map('trim',$up_arr),"bshgs_id='".$id."'");
		$st_class='icn-link-green';$cs=2;$sm="Inactivate";
		$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;
	 echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
	 }else{
	$upqur=Query("update $t set ".$p."status='".$_POST['cs']."' where ".$p."id='".$id."'");
	if($_POST['cs']==1){ $st_class='icn-link-green';$cs=2;$sm="Inactivate"; } else { $st_class='icn-link-red';$cs=1;$sm="Activate"; }
	$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;	
	echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
  }
}


// Status Change for BNS
if(!empty($_REQUEST['memact_bns']) && $_REQUEST['memact_bns']=='status'){
	$id=$_POST['id'];$t=$_POST['t'];$p=$_POST['p'];
	$sts_val = get_data("bi_bns","bns_status,bns_email,bns_name,bns_username,bns_password","bns_id='".$id."'");
	$sts_id=$sts_val['bns_status'];
	if($sts_id==0){ 
       $sig_admin	= "Thanks,<br>Bairisons Team";
	   $toname = $sts_val['bns_name'];
	   $toemail	= $sts_val['bns_email'];
	   $bps_username	= $sts_val['bns_username'];
	   $bps_password	=rnsb64ende($sts_val['bns_password'],1);
	   
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'>Your Registration Details verified successfully.</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><strong>User Name: </strong>".$bps_username."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'><strong>Password : </strong>".$bps_password."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					</table>
					";
			$mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
			$mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
			$mail_body_user=str_replace("disname",$toname,$mail_body_user);	
		    //echo $mail_body_user; exit;
			$mail_user = new PHPMailer();	
			$mail_user->IsMail();
			$mail_user->FromName = FROM_NAME;
			$mail_user->From 	= FROM_MAIL;
			$mail_user->AddAddress($toemail);
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "BNS Registration Status from Bairisons.com";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user;echo "<br>";echo $mail_body; exit;
		$up_arr['bns_status']=1;
		$up_arr['bns_updated_by']=$_SESSION['ERP_Uid'];
		$up_arr['bns_updated_date']=$now_time;
		update_Defined('bi_bns', array_map('trim',$up_arr),"bns_id='".$id."'");
		$st_class='icn-link-green';$cs=2;$sm="Inactivate";
		$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;
	 echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
	 }else{
	$upqur=Query("update $t set ".$p."status='".$_POST['cs']."' where ".$p."id='".$id."'");
	if($_POST['cs']==1){ $st_class='icn-link-green';$cs=2;$sm="Inactivate"; } else { $st_class='icn-link-red';$cs=1;$sm="Activate"; }
	$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;	
	echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
  }
}

// Status Change for SHGM
if(!empty($_REQUEST['memact_shgm']) && $_REQUEST['memact_shgm']=='status'){
	$id=$_POST['id'];$t=$_POST['t'];$p=$_POST['p'];
	$sts_val = get_data("bi_shgm","shgm_status,shgm_email,shgm_name,shgm_username,shgm_password","shgm_id='".$id."'");
	$sts_id=$sts_val['shgm_status'];
	if($sts_id==0){ 
       $sig_admin	= "Thanks,<br>Bairisons Team";
	   $toname = $sts_val['shgm_name'];
	   $toemail	= $sts_val['shgm_email'];
	   $bps_username	= $sts_val['shgm_username'];
	   $bps_password	=rnsb64ende($sts_val['shgm_password'],1);
	   
	   //$rand_link=$rand."-".$id;
	   	// Mail to User
		$message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'>Your Registration Details verified successfully.</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'><strong>User Name: </strong>".$bps_username."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					 <tr>
						<td align='left'  class='textfont'><strong>Password : </strong>".$bps_password."</td>
					  </tr>
					  <tr>
						<td align='left'  class='textfont'></td>
					  </tr>
					</table>
					";
			$mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
			$mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
			$mail_body_user=str_replace("disname",$toname,$mail_body_user);	
		    //echo $mail_body_user; exit;
			$mail_user = new PHPMailer();	
			$mail_user->IsMail();
			$mail_user->FromName = FROM_NAME;
			$mail_user->From 	= FROM_MAIL;
			$mail_user->AddAddress($toemail);
			$mail_user->AddAddress(FROM_MAIL);
			$mail_user->AddBCC(DEV_MAIL,FROM_NAME);
			$mail_user->IsHTML(true);
			$mail_user->Subject	= "SHGM Registration Status from Bairisons.com";
			$mail_user->Body		= stripslashes($mail_body_user);
			$mail_user->Send();
			//echo $mail_body_user;echo "<br>";echo $mail_body; exit;
		$up_arr['shgm_status']=1;
		$up_arr['shgm_updated_by']=$_SESSION['ERP_Uid'];
		$up_arr['shgm_updated_date']=$now_time;
		update_Defined('bi_shgm', array_map('trim',$up_arr),"shgm_id='".$id."'");
		$st_class='icn-link-green';$cs=2;$sm="Inactivate";
		$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;
	 echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
	 }else{
	$upqur=Query("update $t set ".$p."status='".$_POST['cs']."' where ".$p."id='".$id."'");
	if($_POST['cs']==1){ $st_class='icn-link-green';$cs=2;$sm="Inactivate"; } else { $st_class='icn-link-red';$cs=1;$sm="Activate"; }
	$status_arr=$id.",".$cs.",".$sm.",".$t.",".$p;	
	echo '<a id="'.$status_arr.'" class="rec_status user_status '.$st_class.' tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a>';
  }
}*/