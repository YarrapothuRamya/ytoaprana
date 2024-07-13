<div class="tablecontent">
	<? if(!empty($pg) && $pg=='add') { ?>
      <div class="box addeditform">
        <h3 class="title">Add <?=$page_name3;?>
          <span class="fr">
          <button class="button-blue" onClick="window.location.href='<?=RNSFI?>.php'"><i class="fa fa-th-list fa-lg"></i> Manage Reg Sub-Categories
          </button>
          </span> </h3>
      </div>
    <div class="box addeditform">
    <form action="" method="post" name="designation" id="designation">
		<div class="row">
            <span class="label">Reg Category <span class="red">*</span></span>
            <span class="item">
            <select name="regsubc_catid" id="regsubc_catid" class="sel_ls" placeholder="" style="width: 310px" required>
            <option value="">Select Reg Category</option>
                <?php
                    dropdown('ytoa_regcat', 'regcat_id,regcat_name', 'regcat_status=1 order by regcat_name', @$row['regsubc_catid']);
                ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>	
		  
        <div class="row" id="ltitle">
            <span class="label">Reg Sub Category Name <span class="red">*</span></span>
            <span class="item">
        <input name="regsubc_name" id="regsubc_name" type="text" value="<? if(isset($_POST['regsubc_name'])) echo $_POST['regsubc_name']; else if(!empty($_GET['id'])) echo $row['regsubc_name'];?>" required></span>
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
      <button class="button-blue" onClick="window.location.href='<?=RNSFI;?>.php?pg=add'"/><i class="fa fa-plus-square fa-lg"></i> Add Reg Sub-Category</button>
      </span></h3>
  </div>
    <div class="search_box">
    <form method="post">
    <span class="item">
        <select name="cat_id" id="cat_id" placeholder=" Name" style="width: 280px">
        <option value="">Select Reg Category Name</option>
        <?php dropdown('ytoa_regcat', 'regcat_id,regcat_name', 'regcat_status=1 order by regcat_name', @$_SESSION['ser_cat_id']); ?>
        </select>
     </span>
        <input name="search" id="search" type="text" style="width: 150px" value="<? if(!empty($_SESSION['ser_key'])){ echo $_SESSION['ser_key']; }?>" placeholder="Search keyword">
        <input name="search_btn" type="submit" class="button-blue" value="Search"/>
        <input type="button" class="button-orange" value="Clear" onClick="window.location.href='regsub_categories?reset'"/>
    <div class="clear"></div>
    </form>
    </div>
    <div id="tab-container" class="box tab-container">
        <table width="100%" class="table table-bordered">
            <thead>
                <tr>
                <th align="center" width="5%">S.No.</th>
                <th width="10%" align="left">Reg Category</th>
                <th  align="left">Reg Sub-Category</th>
                <th width="10%" >Added On</th>
                <th align="center" width="10%" class="hide">Order By</th>
                <th align="center" width="10%">Actions</th>
            </tr></thead>
            <tbody>
            <?php
            $dept=0; 
			$qur=Query("select * from ytoa_regsub_cat as S
			            left join ytoa_regcat as C on C.regcat_id=S.regsubc_catid
						where ".$sub_qur." order by regsubc_orderby desc");
            $cnt=NumRows($qur);
            if($cnt>0){
                while($row=Fetch($qur)){ $dept++;
				
				if($row['regsubc_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
           		$status_arr=$row['regsubc_id'].",".$cs.",".$sm.","."bi_regsub_cat,regsubc_";
            ?>
            <tr>
            <td align="center"><?=$dept;?></td>
            <td align="left"><?=$row['regcat_name']?></td>
            <td align="left"><?=$row['regsubc_name']?></td>
            <td align="center" ><?=dd_mm_yyyy($row['regsubc_added_date'])?></td>
            <td align="right" class="hide"><? if($dept!=1){?>
                <? if(!empty($row['cat_order_by'])){?>
              <a href="?move=up&amp;priority=<?=$row['cat_order_by'];?>&amp;d_type=DEPT" class="icn-link-green tooltip"><i class="fa fa-sort-up fa-lg"></i></a>
              <? }} if($dept!=$cnt){?>&nbsp;<a href="?move=down&amp;priority=<?=$row['cat_order_by'];?>&amp;d_type=DEPT" class="icn-link-red tooltip"><i class="fa fa-sort-down fa-lg"></i></a><? }?></td>
            <td class="actionicons" align="center"><a href="?id=<?=$row['regsubc_id'];?>&pg=add" class="icn-link-green tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a>
			<span id="st_div_<?=$row['regsubc_id']?>"><a id="<?=$status_arr;?>" class="rec_status <?=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span> 
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