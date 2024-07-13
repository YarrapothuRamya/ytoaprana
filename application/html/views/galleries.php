  <div class="box addeditform">
    <h3 class="title">Manage
      <?=$page_name3;?><span class="fr">
      <button class="button-blue" onClick="window.location.href='<?=$type;?>'"/>
      <i class="fa fa-plus-square fa-lg"></i> Add
      <?=$page_name3;?>
      </button>
      </span></h3>
  </div>
  <div class="search_box">
   <span class="fl">
    <form method="post">      
      <input name="search" id="search" type="text" style="width: 150px" value="<? if(!empty($_SESSION['ser_key'])){ echo $_SESSION['ser_key']; }?>" placeholder="Search keyword">
      <input name="search_btn" type="submit" class="button-blue" value="Search"/>
      <input type="button" class="button-orange" value="Clear" onClick="window.location.href='galleries?t=<?=$_GET['t']?>&status=1&reset'"/>
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
          <th align="left">Title</th>
          <th width="10%" >Added On</th>
          <th align="center" width="5%" nowrap="nowrap" class="hide">Order By</th>
          <th align="center" width="5%">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
		if(!empty($_GET['start'])){ $i= $_GET['start']; } else { $i=0; }
            $dept=0;
			 $qur_sel="select * from ytoa_gallery where ".$sub_qur." and va_cat_id=".$parent_id." order by va_id DESC";
			$qur_cnt=Query($qur_sel);
            $cnt_sel=NumRows($qur_cnt);            
            $qur_sel=Query($qur_sel." limit $start,$len");			
            if($cnt_sel>0){
                while($row=Fetch($qur_sel)){ $i++; $dept++;
                //while($row=Fetch($qur)){ $dept++;
				if($row['va_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
           		$status_arr=$row['va_id'].",".$cs.",".$sm.","."ytoa_gallery,va_";
            ?>
        <tr>
          <td align="center"><?=$dept;?></td>
          <td align="left"><?=$row['va_title']?></td>
          <td align="center" ><?=dd_mm_yyyy($row['va_added_date'])?></td>
          <td align="right" class="hide"><? if($dept!=1){?>
            <? if(!empty($row['va_order_by'])){?>
            <a href="<?=RNSFIFQ?>&move=up&id=<?=$row['va_id'];?>" class="icn-link-green tooltip"><i class="fa fa-sort-up fa-lg"></i></a>
            <? }} if($dept!=$cnt){?>
            &nbsp;<a href="<?=RNSFIFQ?>&move=down&id=<?=$row['va_id'];?>" class="icn-link-red tooltip"><i class="fa fa-sort-down fa-lg"></i></a>
          <? }?></td>
          <td align="center" nowrap="nowrap" class="actionicons">
          	<a href="<?=$type?>&id=<?=$row['va_id'];?>" class="icn-link-green tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a>
            <a href="gallery_view?id=<?=$row['va_id'];?>" class="preview_rns icn-link-green tooltip" title="Preview"><i class="fa fa-search fa-lg"></i></a>
            <span id="st_div_<?=$row['va_id']?>"><a id="<?=$status_arr;?>" class="rec_status <?=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span> </td>
        </tr>
        <? }}else{?>
        <tr>
          <td colspan="5" align="center" class="red">No Records Found</td>
        </tr>
         <? } if($cnt_sel>$len){?>
            <tr>
              <td colspan="7" align="center" class="red"><? Navigation($start,$cnt_sel,$link);?></td>
              </tr>
            <? }?>
      </tbody>
    </table>
  </div>
</div>