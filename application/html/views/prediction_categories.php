<div class="tablecontent">
	<? if(!empty($pg) && $pg=='add') { ?>
      <div class="box addeditform">
        <h3 class="title">Add <?=$page_name3;?>
          <span class="fr">
          <button class="button-blue" onClick="window.location.href='<?=RNSFI?>'"><i class="fa fa-th-list fa-lg"></i> Manage <?=$page_name3;?>
          </button>
          </span> </h3>
      </div>
    <div class="box addeditform">
    <form action="" method="post" name="designation" id="designation">
         
        <div class="row" id="ltitle">
            <span class="label"> Name <span class="red">*</span></span>
            <span class="item">
        <input name="vpc_name" id="vpc_name" type="text" value="<? if(isset($_POST['vpc_name'])) echo $_POST['vpc_name']; else if(!empty($_GET['id'])) echo $row['vpc_name'];?>" required></span>
            <div class="clear"></div>
        </div>
  <div class="row" id="ltitle">
            <span class="label"> Abbreviation <span class="red">*</span></span><span class="item">
        <input name="vpc_abbreviation" id="vpc_abbreviation" type="text" value="<? if(isset($_POST['vpc_abbreviation'])) echo $_POST['vpc_abbreviation']; else if(!empty($_GET['id'])) echo $row['vpc_abbreviation'];?>" required></span>
            <div class="clear"></div>
        </div>
  <div class="row" id="ltitle"><span class="label">Description</span>
            <span class="item">
            <textarea name="vpc_description" id="vpc_description" value="<? if(!empty($_GET['id'])) echo $row['vpc_description'];?>" ><? if(!empty($_GET['id'])) echo $row['vpc_description'];?></textarea>
            </span>
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
      <button class="button-blue" onClick="window.location.href='<?=RNSFI;?>?pg=add'"/><i class="fa fa-plus-square fa-lg"></i> Add Category</button>
      </span></h3>
  </div>
    <div class="search_box">
    <form method="post">
    <!--<span class="item">
        <select name="cat_parent_id" id="cat_parent_id" placeholder="Type" style="width: 280px">
        <? // rns_drop_foreach($rns_maincat,@$_SESSION['ser_dept'],"Type");?>
        </select>
    </span>-->
        <input name="search" id="search" type="text" style="width: 150px" value="<? if(!empty($_SESSION['ser_key'])){ echo $_SESSION['ser_key']; }?>" placeholder="Search keyword">
        <input name="search_btn" type="submit" class="button-blue" value="Search"/>
        <input type="button" class="button-orange" value="Clear" onClick="window.location.href='prediction_categories?reset'"/>
    <div class="clear"></div>
    </form>
    </div>
    <div id="tab-container" class="box tab-container">
        <table width="100%" class="table table-bordered">
            <thead>
                <tr>
                <th align="center" width="5%">S.No.</th>
                <th width="20%" align="left">Name</th>
                <th width="10%" align="left">Abbreviation</th>
                <th align="left">Description&nbsp;</th>
                <th width="10%" >Added On</th>
                <th align="center" width="10%" class="hide">Order By</th>
                <th align="center" width="5%">Actions</th>
            </tr></thead>
            <tbody>
            <?php
            $dept=0;
            $qur=Query("select * from va_predic_cat_list where ".$sub_qur." order by vpc_orderby DESC");
            $cnt=NumRows($qur);
            if($cnt>0){
                while($row=Fetch($qur)){ $dept++;
            ?>
            <tr>
            <td align="center"><?=$dept;?></td>
            <td align="left"><?=$row['vpc_name']?></td>
            <td align="left"><?=$row['vpc_abbreviation']?></td>
            <td align="left"><?=$row['vpc_description']?></td>
            <td align="center" ><?=dd_mm_yyyy($row['vpc_added_date'])?></td>
            <td align="right" class="hide"><? if($dept!=1){?>
                <? if(!empty($row['vpc_orderby'])){?>
              <a href="?move=up&amp;priority=<?=$row['vpc_orderby'];?>&amp;d_type=DEPT" class="icn-link-green tooltip"><i class="fa fa-sort-up fa-lg"></i></a>
              <? }} if($dept!=$cnt){?>&nbsp;<a href="?move=down&amp;priority=<?=$row['vpc_orderby'];?>&amp;d_type=DEPT" class="icn-link-red tooltip"><i class="fa fa-sort-down fa-lg"></i></a><? }?></td>
            <td class="actionicons" align="center"><a href="?id=<?=$row['vpc_id'];?>&pg=add" class="icn-link-green tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a></td>
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