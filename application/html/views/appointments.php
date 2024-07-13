<div class="tablecontent">
	<div class="box addeditform">
    <h3 class="title">Manage <?=$page_name3;?>s
    <!--<span class="fr">
      <button class="button-blue" onClick="window.location.href='photo_add'"/><i class="fa fa-plus-square fa-lg"></i> Add <?=$page_name3;?></button>
      </span>--></h3>
    </div>
    <div class="search_box">
    <span class="fl">
    <form action="" method="post" name="form" id="form">
        <input name="search" id="search" type="text" placeholder="Search keyword" value="<? if(isset($_SESSION['ser_keyword'])) { echo $_SESSION['ser_keyword']; } ?>" style="min-width:150px">
      <span class="item">
      <select name="paymentsts" id="paymentsts" placeholder="UPI Type" style="width: 160px">
      <?php rns_drop_foreach($paystatus,@$_SESSION['ser_paysts'],'Payment Status',''); ?>
        </select>
     </span>
      <span class="item">
      <select name="upi_type" id="upi_type" placeholder="UPI Type" style="width: 150px">
      <?php rns_drop_foreach($paymenttype_arr,@$_SESSION['ser_upi_type'],'Payment Type',''); ?>
        </select>
     </span>
        <input name="go" type="submit" class="button-blue" value="Search"/>
        <input type="button" class="button-orange" value="Clear" onClick="window.location.href='<?=RNSFIWQ?>&reset'"/>
    </form>
    </span>
   
    <div class="clear"></div>
    </div>
    <div id="tab-container" class="box tab-container">
    <table width="100%" class="table table-bordered" id="employee">
       <thead>
            <tr>
            <th align="center" width="5%">S.No</th>
             <th width="7%" align="left">Appointment Id</th>
            <th width="13%" align="left">Name</th>
            <th width="12%" align="left">Service</th>
            <th width="8%" align="left">Phone</th>
            <th width="10%" align="left">E-Mail</th>
            <th width="10%" align="left">Payment Type</th>
            <th width="8%" align="left">Payment Status</th>
            <th  align="left">Transaction Id</th>
            <th width="8%" align="center" nowrap>Added On</th>
            <th align="center" width="5%">Actions</th>
         </tr></thead>
            <tbody>
            <?php $paysts="";
			if(!empty($_GET['start'])){ $i= $_GET['start']; } else { $i=0; }
            $qur_sel="select * from va_appointments 
			where ".$sub_qur."  order by vaap_id desc";
			//echo $qur_sel;exit;
            $qur_cnt=Query($qur_sel);
            $cnt_sel=NumRows($qur_cnt);            
            $qur_sel=Query($qur_sel." limit $start,$len");			
            if($cnt_sel>0){
				while($row_sel=Fetch($qur_sel)){ $i++;
				if($row_sel['vaap_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
				$status_arr=$row_sel['vaap_id'].",".$cs.",".$sm.","."va_appointments,vaap_";
				$paysts=$row_sel['vaap_pstatus'];	
            ?>            
            <tr>
            <td align="center"><?=$i;?></td>
            <td align="left"><?=$row_sel['vaap_appt_no'];?></td>
            <td align="left"><?=$row_sel['vaap_name'];?></td>
            <td align="left"><?=$astroservice_arr[$row_sel['vaap_service']]; ?></td>
            <td align="left"><?=$row_sel['vaap_phone']; ?></td>
            <td align="left"><?=$row_sel['vaap_email']; ?></td>
            <td align="left"><?=$paymenttype_arr[$row_sel['vaap_ptype_id']]; ?></td>
            <td align="left" style="background-color:<? if($paysts==1){?> #FFDBB7 <? }else if($paysts==2){?>#CCFFCC<? }else if($paysts==3){?> #FFC6C6 <? }?>"><?=$paystatus[$row_sel['vaap_pstatus']]; ?></td>
            <td align="left"><?=$row_sel['vaap_tid']; ?></td>
            <td align="center" nowrap="nowrap"><?=dd_mm_yyyy($row_sel['vaap_added_date']);?></td>
            <td align="center" nowrap class="actionicons">
            <a href="appointment_add?id=<?=$row_sel['vaap_id'];?>" class="icn-link-green tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a>
            <a href="appointment_view?id=<?=$row_sel['vaap_id'];?>" class="preview_rns icn-link-green tooltip" title="Preview"><i class="fa fa-search fa-lg"></i></a>
            <!--<span id="st_div_<? //=$row_sel['vaap_id']?>"><a id="<? //=$status_arr;?>" class="rec_status <? //=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span>-->
            </td>
            </tr>
            <? }}else{?>
            <tr>
              <td colspan="11" align="center" class="red">No Records Found</td>
              </tr>
            <? } if($cnt_sel>$len){?>
            <tr>
              <td colspan="11" align="center" class="red"><? Navigation($start,$cnt_sel,$link);?></td>
              </tr>
            <? }?>
            </tbody>
      </table>
  </div>
</div>