<div class="tablecontent">
	<? if(!empty($pg) && $pg=='add') { ?>
      <div class="box addeditform">
      <? if(!empty($_GET['id'])){ ?>
			<h3 class="title">Edit <?=$page_name3;?>
		<? } else { ?><h3 class="title">Add <?=$page_name3; 
		}	?>          <span class="fr">
          <button class="button-blue" onClick="window.location.href='<?=RNSFI?>.php'"><i class="fa fa-th-list fa-lg"></i> Manage FAQ Categories
          </button>
          </span> </h3>
      </div>
    <div class="box addeditform">
    <form action="" method="post" name="designation" id="designation">
        
        <div class="row" id="ltitle">
            <span class="label">FAQ Category Name <span class="red">*</span></span>
            <span class="item">
        <input name="fcat_name" id="fcat_name" type="text" value="<? if(isset($_POST['fcat_name'])) echo $_POST['fcat_name']; else if(!empty($_GET['id'])) echo $row['fcat_name'];?>" required></span>
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
      <button class="button-blue" onClick="window.location.href='<?=RNSFI;?>.php?pg=add'"/><i class="fa fa-plus-square fa-lg"></i> Add FAQ Category</button>
      </span></h3>
  </div>
    <div class="search_box">
    <span class="fl">
    <form method="post">
    
        <input name="search" id="search" type="text" style="width: 150px" value="<? if(!empty($_SESSION['ser_key'])){ echo $_SESSION['ser_key']; }?>" placeholder="Search keyword">
        <input name="search_btn" type="submit" class="button-blue" value="Search"/>
        <input type="button" class="button-orange" value="Clear" onClick="window.location.href='faq_categories.php?reset'"/>
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
    <div class="box Export">
    <span class="fr">
    <span style="float:right">
    <input type="button"  class="button-green" value="Export" onClick="window.location.href='faq_categories.php?export=true'"/>
    </span>
    </span>
     <div class="clear"></div>
    </div>
    <div id="tab-container" class="box tab-container">
        <table width="100%" class="table table-bordered">
            <thead>
                <tr>
                <th align="center" width="5%">S.No.</th>
                <th width="20%" align="left">FAQ Category Name</th>
                <th width="10%" >Added On</th>
                 <th width="10%" >Added By</th>
                <th width="10%" >Updated On</th>
                <th width="10%" >Updated By</th>
                <th align="center" width="10%" class="hide">Order By</th>
                <th align="center" width="8%">Actions</th>
            </tr></thead>
            <tbody>
            <?php
            $dept=0;
            $qur=Query("select * from ytoa_fcategories where ".$sub_qur." order by fcat_orderby desc");
            $cnt=NumRows($qur);
            if($cnt>0){
                while($row=Fetch($qur)){ $dept++;
				$updated_by_name  = getdata("va_employees","emp_fname","emp_id='".$row['fcat_updated_by']."'");
                  $Added_by_name  = getdata("va_employees","emp_fname","emp_id='".$row['fcat_added_by']."'");
				if($row['fcat_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
           		$status_arr=$row['fcat_id'].",".$cs.",".$sm.","."ytoa_fcategories,fcat_";
                if($row['fcat_updated_date']==NULL){$updated_date='';}else{ $updated_date=dd_mm_yyyy($row['fcat_updated_date']);}
            ?>
            <tr>
            <td align="center"><?=$dept;?></td>
            <td align="left"><?=$row['fcat_name']?></td>
            <td align="center" ><?=dd_mm_yyyy($row['fcat_added_date'])?></td>
            <td align="left"><?=$Added_by_name?></td>
            <td align="center" ><?=$updated_date?></td>
            <td align="left"><?=$updated_by_name?></td>
            <td align="right" class="hide"><? if($dept!=1){?>
                <? if(!empty($row['cat_order_by'])){?>
              <a href="?move=up&amp;priority=<?=$row['cat_order_by'];?>&amp;d_type=DEPT" class="icn-link-green tooltip"><i class="fa fa-sort-up fa-lg"></i></a>
              <? }} if($dept!=$cnt){?>&nbsp;<a href="?move=down&amp;priority=<?=$row['cat_order_by'];?>&amp;d_type=DEPT" class="icn-link-red tooltip"><i class="fa fa-sort-down fa-lg"></i></a><? }?></td>
            <td class="actionicons" align="center"><a href="?id=<?=$row['fcat_id'];?>&pg=add" class="icn-link-green tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a>
			<span id="st_div_<?=$row['fcat_id']?>"><a id="<?=$status_arr;?>" class="rec_status <?=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span>
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