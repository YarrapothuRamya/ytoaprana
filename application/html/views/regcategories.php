<div class="tablecontent">
	<? if(!empty($pg) && $pg=='add') { ?>
      <div class="box addeditform">
        <h3 class="title">Add <?=$page_name3;?>
          <span class="fr">
          <button class="button-blue" onClick="window.location.href='<?=RNSFI?>.php'"><i class="fa fa-th-list fa-lg"></i> Manage Registration Category
          </button>
          </span> </h3>
      </div>
    <div class="box addeditform">
    <form action="" method="post" name="designation" id="designation">
        <div class="row" id="ltitle">
            <span class="label">Category Name <span class="red">*</span></span>
            <span class="item">
        <input name="regcat_name" id="regcat_name" type="text" value="<? if(isset($_POST['regcat_name'])) echo $_POST['regcat_name']; else if(!empty($_GET['id'])) echo $row['regcat_name'];?>" required></span>
            <div class="clear"></div>
        </div>

        <div class="row" id="ltitle">
            <span class="label">Category Description<span class="red">*</span></span>
            <span class="item">
        <textarea name="regcat_desc" id="regcat_desc" required><? if(isset($_POST['regcat_desc'])) echo $_POST['regcat_desc']; else if(!empty($_GET['id'])) echo $row['regcat_desc'];?></textarea></span>
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
      <button class="button-blue" onClick="window.location.href='<?=RNSFI;?>.php?pg=add'"/><i class="fa fa-plus-square fa-lg"></i> Add Registration Category</button>
      </span></h3>
  </div>
    <div class="search_box">
    <form method="post">
    
        <input name="search" id="search" type="text" style="width: 150px" value="<? if(!empty($_SESSION['ser_key'])){ echo $_SESSION['ser_key']; }?>" placeholder="Search keyword">
        <input name="search_btn" type="submit" class="button-blue" value="Search"/>
        <input type="button" class="button-orange" value="Clear" onClick="window.location.href='regcategories.php?reset'"/>
    <div class="clear"></div>
    </form>
    </div>
    <div id="tab-container" class="box tab-container">
        <table width="100%" class="table table-bordered">
            <thead>
                <tr>
                <th align="center" width="5%">S.No.</th>
                <th>Category Name</th>
                <th>Category Description</th>
                <th width="10%" >Added On</th>
                <th align="center"class="hide">Order By</th>
                <th align="center" width="8%">Actions</th>
            </tr></thead>
            <tbody>
            <?php
            $sno=0;
            $qur=Query("select * from ytoa_regcat where ".$sub_qur." order by regcat_id desc");
            $cnt=NumRows($qur);
            if($cnt>0){
                while($row=Fetch($qur)){ $sno++;
				
				if($row['regcat_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
           		$status_arr=$row['regcat_id'].",".$cs.",".$sm.","."ytoa_regcat,regcat_";
            ?>
            <tr>
            <td align="center"><?=$sno;?></td>
            <td><?=$row['regcat_name']?></td>
            <td><?=$row['regcat_desc']?></td>
            <td align="center" ><?=dd_mm_yyyy($row['regcat_added_date'])?></td>
            
            <td class="actionicons" align="center"><a href="?id=<?=$row['regcat_id'];?>&pg=add" class="icn-link-green tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a>
			<span id="st_div_<?=$row['regcat_id']?>"><a id="<?=$status_arr;?>" class="rec_status <?=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span>
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