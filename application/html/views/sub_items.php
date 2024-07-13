<div class="tablecontent">
 <?  if(!empty($pg) && $pg==='add') { ?>
	<div class="box addeditform">
    <h3 class="title">Add <?=$page_name3;?>
      <span class="fr">
      <!--<button class="button-blue" onClick="window.location.href='photos'"><i class="fa fa-th-list fa-lg"></i> Manage <? //=$page_name3;?>s</button>-->
      <button class="button-blue" onClick="window.location.href='sub_items'"><i class="fa fa-th-list fa-lg"></i> Manage
      <?=$page_name3;?></button>
      </span> </h3>
    </div>
	 <div class="box addeditform">
    <form action="" method="post" name="" id="" enctype="multipart/form-data">
       <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="50%"><div id="basic_details"> 
            <div class="row">
            <span class="label">Items<span class="red">*</span></span>
            <span class="item">
            <select name="psubi_itemid" id="psubi_itemid" class="sel_ls" placeholder="" style="width: 310px" required>
            <option value="">Select Item</option>
                <?php //if(!empty($_GET['id'])) alert($itemid);
//				alert('itm_status=1'.$itemid.' order by itm_name');
                    dropdown('bi_item', 'itm_id,itm_name', 'itm_status=1'.$itemid.' order by itm_name', @$row['psubi_itemid']);
                ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>
             
          <div class="row">
         	  <span class="label">Sub Item &amp; Image <span class="red">*</span></span>          
              <span class="item">
			    <input type="hidden" name="psubi_path" value="<? if(!empty($_GET['id'])){ echo $row["psubi_path"];}?>">
		  <div class="input_fields_wrap">
          <div><input type="text" name="psubi_name[]"  value="<? if(!empty($_GET['id'])) echo $row['psubi_name'];?>" placeholder="" required> <input class="files" name="user_files[]" type="file" <? if(empty($_GET['id'])){?>  required <? }?> ><? if(!empty($_GET['id'])){?><a href="<?=$img_path?>" target="_blank"><img src="<?=$site_url.RNSIM?>view.png" width="16" height="16" border="0" alt="Click to View Image" title="Click to View Image"  align="absmiddle"/></a> <? }else{ ?><button type="button" class="button-blue rns-add" id="subClone" title="Add New"><i class="fa fa-plus fa-lg"></i></button><? }?> 
		   <span id="p1" class="red"></span>
           </div>
          </div>
            <span class="red"><?="<br>Max Size (1MB): ".$usize.", Type: ".$ft_img;?></span></span>     
          </div>
          <div class="clear"></div>
          <!--<div class="row" id="ltitle"><span class="label">Keywords</span>
            <span class="item">
            <textarea name="va_keywords" id="va_keywords" value="<? // if(!empty($_GET['id'])) echo $row['va_keywords'];?>" ><? // if(!empty($_GET['id'])) echo $row['va_keywords'];?></textarea>
            </span>
            <div class="clear"></div>
        </div>-->
          
          </div></td>
         </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table> 
      <div class="row">
        <span class="label">&nbsp;</span>
           <input type="submit" value="<? if(!empty($getid)) { echo "Edit"; } else { echo "Add"; } ?> Photo" class="button-green">
           <input name="reset" type="reset" value="Cancel" class="button-orange ml10" onClick="history.back()">
        <div class="clear"></div>
    </div>
    </form>
    </div>
    <? } else { ?>
    <div class="box addeditform">
    <h3 class="title">Manage <?=$page_name3;?><span class="fr">
      <button class="button-blue" onClick="window.location.href='<?=RNSFI;?>.php?pg=add'"/><i class="fa fa-plus-square fa-lg"></i> Add Sub-Item</button>
      </span></h3>
  </div>
    <div class="search_box">
    <form method="post">
    <span class="item">
        <select name="itm_id" id="itm_id" placeholder=" Name" style="width: 280px">
        <option value="">Select Item Name</option>
        <?php dropdown('bi_item', 'itm_id,itm_name', 'itm_status=1 order by itm_name', @$_SESSION['ser_itm_id']); ?>
        </select>
     </span>
        <input name="search" id="search" type="text" style="width: 150px" value="<? if(!empty($_SESSION['ser_key'])){ echo $_SESSION['ser_key']; }?>" placeholder="Search keyword">
        <input name="search_btn" type="submit" class="button-blue" value="Search"/>
        <input type="button" class="button-orange" value="Clear" onClick="window.location.href='sub_items?reset'"/>
    <div class="clear"></div>
    </form>
    </div>
    <div id="tab-container" class="box tab-container">
        <table width="100%" class="table table-bordered">
            <thead>
                <tr>
                <th align="center" width="5%">S.No.</th>
                <th width="10%" align="left">Item</th>
                <th  align="left">Sub-Item</th>
                <th  align="left">Product Image</th>
                <th width="10%" >Added On</th>
                <th align="center" width="10%" class="hide">Order By</th>
                <th align="center" width="10%">Actions</th>
            </tr></thead>
            <tbody>
            <?php
			if(!empty($_GET['start'])){ $i= $_GET['start']; } else { $i=0; }
            $dept=0; 
			$qur_sel="select * from bi_sub_item as S
			            left join bi_item as I on I.itm_id=S.psubi_itemid
						where ".$sub_qur." order by psubi_id desc";
            $qur_cnt=Query($qur_sel);
            $cnt_sel=NumRows($qur_cnt);            
            $qur_sel=Query($qur_sel." limit $start,$len");			
            if($cnt_sel>0){
                while($row=Fetch($qur_sel)){ $dept++; $i++;
				
				if($row['psubi_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
           		$status_arr=$row['psubi_id'].",".$cs.",".$sm.","."bi_sub_item,psubi_";
			if(empty($row['psubi_path'])) $path="noavatar.png"; else $path=$row['psubi_path']; 
            ?>
            <tr>
            <td align="center"><?=$i;?></td>
            <td align="left"><?=$row['itm_name']?></td>
            <td align="left"><?=$row['psubi_name']?></td>
            <td align="left">
			<img src="../../uploads/sub_items/<?=$path?>" width="100" height="100">
			</td>
            <td align="center" ><?=dd_mm_yyyy($row['psubi_added_date'])?></td>
            <td align="right" class="hide"><? if($dept!=1){?>
                <? if(!empty($row['itm_order_by'])){?>
              <a href="?move=up&amp;priority=<?=$row['itm_order_by'];?>&amp;d_type=DEPT" class="icn-link-green tooltip"><i class="fa fa-sort-up fa-lg"></i></a>
              <? }} if($dept!=$cnt){?>&nbsp;<a href="?move=down&amp;priority=<?=$row['itm_order_by'];?>&amp;d_type=DEPT" class="icn-link-red tooltip"><i class="fa fa-sort-down fa-lg"></i></a><? }?></td>
            <td class="actionicons" align="center"><a href="?id=<?=$row['psubi_id'];?>&pg=add" class="icn-link-green tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a>
			<span id="st_div_<?=$row['psubi_id']?>"><a id="<?=$status_arr;?>" class="rec_status <?=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span> 
			</td>
            </tr>
            <? }}else{?>
            <tr>
              <td colspan="8" align="center" class="red">No Records Found</td>
              </tr>
            <? }if($cnt_sel>$len){?>
            <tr>
              <td colspan="7" align="center" class="red"><? Navigation($start,$cnt_sel,$link);?></td>
              </tr>
            <? }?>
            </tbody>
      </table>
  </div>
  <? } ?>
	</div>