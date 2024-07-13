<div class="box addeditform">
    <h3 class="title">Manage
      Pharma Registrations<span class="fr">
      <!--<button class="button-blue" onClick="window.location.href='items_add'"/>
      <i class="fa fa-plus-square fa-lg"></i> Add
      <?//=$page_name3;?>
      </button>-->
	</span></h3>
  </div>
  <div class="search_box">
    <span class="fl">
   <form action="" method="post" name="form" id="form">
        <input name="search" id="search" type="text" placeholder="Search keyword" value="<? if(isset($_SESSION['ser_keyword'])) { echo $_SESSION['ser_keyword']; } ?>" style="min-width:150px">
        <input name="go" type="submit" class="button-blue" value="Search"/>
        <input type="button" class="button-orange" value="Clear" onClick="window.location.href='pharma_registration?reset'"/>
    </form>
    </span>
    <span style="float:right">
    <input type="button"  class="button-green" value="Export" onClick="window.location.href='pharma_registration?export=true'"/>
    </span>
    <div class="clear"></div>
    
    <div class="clear"></div>
    </div>
  <div id="tab-container" class="box tab-container">
    <table width="100%" class="table table-bordered">
      <thead>
        <tr>
          <th align="center" >S.No.</th>
          <th  align="left">Name Of The Pharma</th>
          <th  align="left">Registration No</th>
		   <th  align="left"  >Office No</th>
		   <th  align="left"  >Mobile No</th>
		   <th align="left" >E-Mail</th>
          <th width="10%" >Added On</th>
          <th align="center" width="10%" nowrap="nowrap" class="hide">Order By</th>
          <th align="center" width="5%">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
		if(!empty($_GET['start'])){ $i= $_GET['start']; } else { $i=0; }
            $dept=0;
			 $qur_sel="select * from ytoa_pharma as pharma
			           where ".$sub_qur."  order by pharma_id DESC";
			 $qur_cnt=Query($qur_sel);
            $cnt_sel=NumRows($qur_cnt);            
            $qur_sel=Query($qur_sel." limit $start,$len");			
            if($cnt_sel>0){
                while($row=Fetch($qur_sel)){ $i++; $dept++;
				if($row['pharma_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} 
        elseif($row['pharma_status']==2) { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
        else{ $cs=1;$sm="Activate";$st_class="icn-link-orng"; }
           		$status_arr=$row['pharma_id'].",".$cs.",".$sm.","."ytoa_pharma,pharma_";

		    ?>
        <tr>
          <td align="center"><?=$i;?></td>
          <td align="left"><?=$row['pharma_name']?></td>
          <td align="left"><?=$row['pharma_refno']?></td>
		  <td align="left"><?=$row['pharma_office']?></td>
		  <td align="left"><?=$row['pharma_phone']?></td>
		  <td align="left"><?=$row['pharma_email']?></td>
          <td align="center" ><?=dd_mm_yyyy($row['pharma_added_date'])?></td>
          <td align="right" class="hide"><? if($dept!=1){?>
            <? if(!empty($row['pharma_order_by'])){?>
            <a href="<?=RNSFIFQ?>&move=up&id=<?=$row['pharma_id'];?>" class="icn-link-green tooltip"><i class="fa fa-sort-up fa-lg"></i></a>
            <? }} if($dept!=$cnt){?>
            &nbsp;<a href="<?=RNSFIFQ?>&move=down&id=<?=$row['pharma_id'];?>" class="icn-link-red tooltip"><i class="fa fa-sort-down fa-lg"></i></a>
          <? }?></td>
          <td align="center" nowrap="nowrap" class="actionicons">
          <!--a href="doc_payment_add?idd=<?=$row['pharma_id'];?>" class="icn-link-blue tooltip" title="Add Payment"><i class="fa fa-money" aria-hidden="true"></i></a-->
            <a href="pharma_registration_view?id=<?=$row['pharma_id'];?>" class="preview_rns icn-link-green tooltip" title="Preview"><i class="fa fa-search fa-lg"></i></a>
           <span id="st_div_<?=$row['pharma_id']?>"><a id="<?=$status_arr;?>" class="rec_status <?=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span>
            <a href="pharma_registration_edit?id=<?=$row['pharma_id'];?>" class="icn-link-blue tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a> 
            <a href="resend_credentials?id=<?=$row['pharma_id'];?>&type=pharma" class="" title="Resend"><i class="fa fa-send-o"></i></a> 
            </td>
        </tr>
        <? }}else{?>
        <tr>
          <td colspan="5" align="center" class="red">No Records Found</td>
        </tr>
                <? }if($cnt_sel>$len){?>
            <tr>
              <td colspan="7" align="center" class="red"><? Navigation($start,$cnt_sel,$link);?></td>
              </tr>
            <? }?>
      </tbody>
    </table>
  </div>
</div>