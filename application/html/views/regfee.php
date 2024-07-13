  <div class="box addeditform">
    <h3 class="title">Manage
      <?=$page_name3;?>s<span class="fr">
      <button class="button-blue" onClick="window.location.href='regfee_add'"/>
      <i class="fa fa-plus-square fa-lg"></i> Add
      <?=$page_name3;?>
      </button></span></h3>
  </div>
 <div class="search_box">
    <form method="post">
    <span class="item">
        <select name="cati_id" id="cati_id" placeholder=" Name" style="width: 280px">
        <option value="">Select Reg Category</option>
        <?php dropdown('bi_regcat', 'regcat_id,regcat_name', 'regcat_status=1 order by regcat_name', @$_SESSION['ser_cati_id']); ?>
        </select>
     </span>
        <input name="search" id="search" type="text" style="width: 150px" value="<? if(!empty($_SESSION['ser_key'])){ echo $_SESSION['ser_key']; }?>" placeholder="Search keyword">
        <input name="search_btn" type="submit" class="button-blue" value="Search"/>
        <input type="button" class="button-orange" value="Clear" onClick="window.location.href='regfee.php?reset'"/>
    <div class="clear"></div>
    </form>
    </div>
  <div id="tab-container" class="box tab-container">
    <table width="100%" class="table table-bordered">
      <thead>
        <tr>
          <th align="center" width="5%">S.No.</th>
          <th  align="left" width="20%">Reg Category Name</th>
		   <th  align="left" width="20%" >Reg Sub Category Name</th>
		   <th align="left" width="20%" >Reg Fee Amount</th>
		   <th align="left" width="20%" >Reg Fee From Date</th>
          <th width="10%" >Added On</th>
          <th align="center" width="5%" nowrap="nowrap" class="hide">Order By</th>
          <th align="center" width="5%">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
		if(!empty($_GET['start'])){ $i= $_GET['start']; } else { $i=0; }
            $dept=0;
			 $qur_sel="select * from bi_regfee as RF
			           left join bi_regcat as C on C.regcat_id=RF.regfee_catid
					   left join bi_regsub_cat as S on S.regsubc_id=RF.regfee_subc_id
			           where ".$sub_qur."  order by regfee_id DESC";
			 $qur_cnt=Query($qur_sel);
            $cnt_sel=NumRows($qur_cnt);            
            $qur_sel=Query($qur_sel." limit $start,$len");			
            if($cnt_sel>0){
                while($row=Fetch($qur_sel)){ $i++; $dept++;

				if($row['regfee_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
           		$status_arr=$row['regfee_id'].",".$cs.",".$sm.","."bi_regfee,regfee_";

		    ?>
        <tr>
          <td align="center"><?=$i;?></td>
          <td align="left"><?=$row['regcat_name']?></td>
		  <td align="left"><?=$row['regsubc_name']?></td>
		  <td align="left"><?=$row['regfee_amount']?></td>
		  <td align="left"><?=$row['regfee_fromdt']?></td>
          <td align="center" ><?=dd_mm_yyyy($row['regfee_added_date'])?></td>
          <td align="right" class="hide"><? if($dept!=1){?>
            <? if(!empty($row['regfee_order_by'])){?>
            <a href="<?=RNSFIFQ?>&move=up&id=<?=$row['regfee_id'];?>" class="icn-link-green tooltip"><i class="fa fa-sort-up fa-lg"></i></a>
            <? }} if($dept!=$cnt){?>
            &nbsp;<a href="<?=RNSFIFQ?>&move=down&id=<?=$row['regfee_id'];?>" class="icn-link-red tooltip"><i class="fa fa-sort-down fa-lg"></i></a>
          <? }?></td>
          <td align="center" nowrap="nowrap" class="actionicons">
          	<a href="regfee_add?id=<?=$row['regfee_id'];?>" class="icn-link-green tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a>
            <a href="regfee_view?id=<?=$row['regfee_id'];?>" class="preview_rns icn-link-green tooltip" title="Preview"><i class="fa fa-search fa-lg"></i></a>
            <span id="st_div_<?=$row['regfee_id']?>"><a id="<?=$status_arr;?>" class="rec_status <?=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span> 
           
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