  <div class="box addeditform">
    <h3 class="title">Manage
      <?=$page_name3;?>s<span class="fr">
      <button class="button-blue" onClick="window.location.href='items_add'"/>
      <i class="fa fa-plus-square fa-lg"></i> Add
      <?=$page_name3;?>
      </button></span></h3>
  </div>
 <div class="search_box">
    <form method="post">
    <span class="fl">
    <span class="item">
        <select name="cati_id" id="cati_id" placeholder=" Name" style="width: 280px">
        <option value="">Select Category</option>
        <?php dropdown('bi_pcategory', 'pcat_id,pcat_name', 'pcat_status=1 order by pcat_name', @$_SESSION['ser_cati_id']); ?>
        </select>
     </span>
        <input name="search" id="search" type="text" style="width: 150px" value="<? if(!empty($_SESSION['ser_key'])){ echo $_SESSION['ser_key']; }?>" placeholder="Search keyword">
        <input name="search_btn" type="submit" class="button-blue" value="Search"/>
        <input type="button" class="button-orange" value="Clear" onClick="window.location.href='items?reset'"/>
    
    </form>
</span>
<span class="fr">
            <select name="sta_chk" id="sta_chk">
                <option value="">Select Status</option>
                <option value="1"<? echo ($status_id==1 ? 'selected' : '') ?>>Active</option>
                <option value="2"<? echo ($status_id==2 ? 'selected' : '') ?>>Inactive</option> 
            </select>
    </span>
    <div class="clear"></div>
    </div>
  <div id="tab-container" class="box tab-container">
    <table width="100%" class="table table-bordered">
      <thead>
        <tr>
          <th align="center" width="5%">S.No.</th>
          <th  align="left" width="20%">Category Name</th>
		   <th  align="left" width="20%" >Sub Category Name</th>
		   <th  align="left" width="10%" >HSN Code</th>
		   <th align="left" width="20%" >Item</th>
		   <th align="left">Item Image</th>
          <th width="10%" >Added On</th>
          <th align="center" width="5%" nowrap="nowrap" class="hide">Order By</th>
          <th align="center" width="5%">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
		if(!empty($_GET['start'])){ $i= $_GET['start']; } else { $i=0; }
            $dept=0;
			 $qur_sel="select * from bi_item as I
			           left join bi_pcategory as C on C.pcat_id=I.itm_catid
					   left join bi_psub_category as S on S.psubc_id=I.itm_subcatid
			           where ".$sub_qur."  order by itm_id DESC";
			 $qur_cnt=Query($qur_sel);
            $cnt_sel=NumRows($qur_cnt);            
            $qur_sel=Query($qur_sel." limit $start,$len");			
            if($cnt_sel>0){
                while($row=Fetch($qur_sel)){ $i++; $dept++;

				if($row['itm_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
           		$status_arr=$row['itm_id'].",".$cs.",".$sm.","."bi_item,itm_";
			if(empty($row['itm_path'])) { $imgpath="noavatar.png"; } else { $imgpath=$row['itm_path']; }

		    ?>
        <tr>
          <td align="center"><?=$i;?></td>
          <td align="left"><?=$row['pcat_name']?></td>
		  <td align="left"><?=$row['psubc_name']?></td>
		  <td align="left"><?=$row['itm_code']?></td>
		  <td align="left"><?=$row['itm_name']?></td>
		  <td align="left"><img src="<?="../../uploads/items/".$imgpath?>"></td>
          <td align="center" ><?=dd_mm_yyyy($row['itm_added_date'])?></td>
          <td align="right" class="hide"><? if($dept!=1){?>
            <? if(!empty($row['vap_order_by'])){?>
            <a href="<?=RNSFIFQ?>&move=up&id=<?=$row['vap_id'];?>" class="icn-link-green tooltip"><i class="fa fa-sort-up fa-lg"></i></a>
            <? }} if($dept!=$cnt){?>
            &nbsp;<a href="<?=RNSFIFQ?>&move=down&id=<?=$row['vap_id'];?>" class="icn-link-red tooltip"><i class="fa fa-sort-down fa-lg"></i></a>
          <? }?></td>
          <td align="center" nowrap="nowrap" class="actionicons">
          	<a href="items_add?id=<?=$row['itm_id'];?>" class="icn-link-green tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a>
            <a href="item_view?id=<?=$row['itm_id'];?>" class="preview_rns icn-link-green tooltip" title="Preview"><i class="fa fa-search fa-lg"></i></a>
            <span id="st_div_<?=$row['itm_id']?>"><a id="<?=$status_arr;?>" class="rec_status <?=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span> 
           
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