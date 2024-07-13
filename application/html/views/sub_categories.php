<div class="tablecontent">
	<? if(!empty($pg) && $pg=='add') { ?>
      <div class="box addeditform">
        <h3 class="title">Add <?=$page_name3;?>
          <span class="fr">
          <button class="button-blue" onClick="window.location.href='<?=RNSFI?>.php'"><i class="fa fa-th-list fa-lg"></i> Manage Sub-Categories
          </button>
          </span> </h3>
      </div>
    <div class="box addeditform">
    <form action="" method="post" name="designation" id="designation">
		<div class="row">
            <span class="label">State <span class="red">*</span></span>
            <span class="item">
            <select name="psubc_catid" id="psubc_catid" class="sel_ls" placeholder="" style="width: 310px" required>
            <option value="">Select Category</option>
                <?php
                    dropdown('bi_pcategory', 'pcat_id,pcat_name', 'pcat_status=1 order by pcat_name', @$row['psubc_catid']);
                ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>	
        <div class="row" id="ltitle">
            <span class="label">Sub Category Name <span class="red">*</span></span>
            <span class="item">
        <input name="psubc_name" id="psubc_name" type="text" value="<? if(isset($_POST['psubc_name'])) echo $_POST['psubc_name']; else if(!empty($_GET['id'])) echo $row['psubc_name'];?>" required></span>
            <div class="clear"></div>
        </div>
  
        <div class="row">
            <span class="label">&nbsp;</span>
            <input name="" type="submit" value="Submit" class="button-green">
            <input name="reset" type="reset" value="Cancel" class="button-orange ml10" onClick="history.back()">
            <div class="clear"></div>
        </div>
    <div class="clear"></div>
    </form>
    </div>
	<? } else { ?>
    <div class="box addeditform">
    <h3 class="title">Manage <?=$page_name3;?><span class="fr">
      <button class="button-blue" onClick="window.location.href='<?=RNSFI;?>.php?pg=add'"/><i class="fa fa-plus-square fa-lg"></i> Add Sub-Category</button>
      </span></h3>
  </div>
    <div class="search_box">
    <form method="post">
        <span class="fl">
    <span class="item">
        <select name="cat_id" id="cat_id" placeholder=" Name" style="width: 280px">
        <option value="">Select Category Name</option>
        <?php dropdown('bi_pcategory', 'pcat_id,pcat_name', 'pcat_status=1 order by pcat_name', @$_SESSION['ser_cat_id']); ?>
        </select>
     </span>
        <input name="search" id="search" type="text" style="width: 150px" value="<? if(!empty($_SESSION['ser_key'])){ echo $_SESSION['ser_key']; }?>" placeholder="Search keyword">
        <input name="search_btn" type="submit" class="button-blue" value="Search"/>
        <input type="button" class="button-orange" value="Clear" onClick="window.location.href='sub_categories?reset'"/>
    
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
                <th width="10%" align="left">Category</th>
                <th  align="left">Sub-Category</th>
                <th width="10%" >Added On</th>
                <th align="center" width="10%" class="hide">Order By</th>
                <th align="center" width="10%">Actions</th>
            </tr></thead>
            <tbody>
            <?php
            $dept=0; 
			$qur=Query("select * from bi_psub_category as S
			            left join bi_pcategory as C on C.pcat_id=S.psubc_catid
						where ".$sub_qur." order by psubc_orderby desc");
            $cnt=NumRows($qur);
            if($cnt>0){
                while($row=Fetch($qur)){ $dept++;
				
				if($row['psubc_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
           		$status_arr=$row['psubc_id'].",".$cs.",".$sm.","."bi_psub_category,psubc_";
            ?>
            <tr>
            <td align="center"><?=$dept;?></td>
            <td align="left"><?=$row['pcat_name']?></td>
            <td align="left"><?=$row['psubc_name']?></td>
            <td align="center" ><?=dd_mm_yyyy($row['psubc_added_date'])?></td>
            <td align="right" class="hide"><? if($dept!=1){?>
                <? if(!empty($row['cat_order_by'])){?>
              <a href="?move=up&amp;priority=<?=$row['cat_order_by'];?>&amp;d_type=DEPT" class="icn-link-green tooltip"><i class="fa fa-sort-up fa-lg"></i></a>
              <? }} if($dept!=$cnt){?>&nbsp;<a href="?move=down&amp;priority=<?=$row['cat_order_by'];?>&amp;d_type=DEPT" class="icn-link-red tooltip"><i class="fa fa-sort-down fa-lg"></i></a><? }?></td>
            <td class="actionicons" align="center"><a href="?id=<?=$row['psubc_id'];?>&pg=add" class="icn-link-green tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a>
			<span id="st_div_<?=$row['psubc_id']?>"><a id="<?=$status_arr;?>" class="rec_status <?=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span> 
			</td>
            </tr>
            <? }}else{?>
            <tr>
              <td colspan="8" align="center" class="red">No Records Found</td>
              </tr>
            <? }?>
            </tbody>
      </table>
  </div>
  <? } ?>
</div>