<div class="tablecontent">
	<? if(!empty($pg) && $pg=='add') { ?>
      <div class="box addeditform">
        <h3 class="title">Add <?=$page_name3;?>
          <span class="fr">
          <button class="button-blue" onClick="window.location.href='<?=RNSFI?>.php'"><i class="fa fa-th-list fa-lg"></i> Manage <?=$page_name3;?>s
          </button>
          </span> </h3>
      </div>
    <div class="box addeditform">
    <form action="" method="post" name="designation" id="designation">
        <!--<div class="row">
            <span class="label">Type <span class="red">*</span></span>
            <span class="item">
            <select name="cat_parent_id" id="cat_parent_id" placeholder="Type" style="width: 310px" required>
               	<? // rns_drop_foreach($rns_maincat,@$row['cat_parent_id'],"Type");?>
            </select>
            </span>
            <div class="clear"></div>
        </div>--> 
		<div class="row">
            <span class="label">State <span class="red">*</span></span>
            <span class="item">
            <select name="md_state_id" id="md_state_id" class="sel_ls" placeholder="" style="width: 310px" required>
            <option value="">Select State</option>
                <?php
                    dropdown('bi_states', 'st_id,st_name', 'st_status=1 order by st_name', @$row['md_state_id']);
                ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>
		  <div class="row">
            <span class="label">District <span class="red">*</span></span>
            <span class="item">
            <select name="md_dist_id" id="md_dist_id" class="sel_ls" placeholder="" style="width: 310px" required>
            <option value="">Select District</option>
                <?php
                  if(!empty($_GET['id'])) { dropdown('bi_districts', 'dt_id,dt_name', 'dt_status=1 '.$district_qur.' order by dt_name', @$row['md_dist_id']); }
                ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>	
        <div class="row" id="ltitle">
            <span class="label"> Name <span class="red">*</span></span>
            <span class="item">
        <input name="md_name" id="md_name" type="text" value="<? if(isset($_POST['md_name'])) echo $_POST['md_name']; else if(!empty($_GET['id'])) echo $row['md_name'];?>" required></span>
            <div class="clear"></div>
        </div>
  <!--<div class="row" id="ltitle">
            <span class="label"> Abbreviation <span class="red"></span></span><span class="item">
        <input name="md_abbrev" id="md_abbrev" type="text" value="<? if(isset($_POST['md_abbrev'])) echo $_POST['md_abbrev']; else if(!empty($_GET['id'])) echo $row['md_abbrev'];?>" ></span>
            <div class="clear"></div>
        </div>-->
  
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
      <button class="button-blue" onClick="window.location.href='<?=RNSFI;?>.php?pg=add'"/><i class="fa fa-plus-square fa-lg"></i> Add District</button>
      </span></h3>
  </div>
    <div class="search_box">
    <form method="post">
    
        <input name="search" id="search" type="text" style="width: 150px" value="<? if(!empty($_SESSION['ser_key'])){ echo $_SESSION['ser_key']; }?>" placeholder="Search keyword">
        <input name="search_btn" type="submit" class="button-blue" value="Search"/>
        <input type="button" class="button-orange" value="Clear" onClick="window.location.href='mandals.php?reset'"/>
    <div class="clear"></div>
    </form>
    </div>
    <div id="tab-container" class="box tab-container">
        <table width="100%" class="table table-bordered">
            <thead>
                <tr>
                <th align="center" width="5%">S.No.</th>
                <th width="20%" align="left">State</th>
                <th  align="left">District Name</th>
                <th width="20%"align="left">Mandal Name &nbsp;</th>
                <th width="10%" >Added On</th>
                <th align="center" width="10%" class="hide">Order By</th>
                <th align="center" width="10%">Actions</th>
            </tr></thead>
            <tbody>
            <?php
            $dept=0;
			$qur=Query("select * from bi_mandals as M
			            left join bi_states as S on S.st_id=M.md_state_id
						left join bi_districts as D on D.dt_id=M.md_dist_id
						where ".$sub_qur." order by st_id desc");
            $cnt=NumRows($qur);
            if($cnt>0){
                while($row=Fetch($qur)){ $dept++;
				
				if($row['md_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
           		$status_arr=$row['md_id'].",".$cs.",".$sm.","."bi_mandals,md_";
            ?>
            <tr>
            <td align="center"><?=$dept;?></td>
            <td align="left"><?=$row['st_name']?></td>
            <td align="left"><?=$row['dt_name']?></td>
            <td align="left"><?=$row['md_name']?></td>
            <td align="center" ><?=dd_mm_yyyy($row['dt_added_date'])?></td>
            <td align="right" class="hide"><? if($dept!=1){?>
                <? if(!empty($row['cat_order_by'])){?>
              <a href="?move=up&amp;priority=<?=$row['cat_order_by'];?>&amp;d_type=DEPT" class="icn-link-green tooltip"><i class="fa fa-sort-up fa-lg"></i></a>
              <? }} if($dept!=$cnt){?>&nbsp;<a href="?move=down&amp;priority=<?=$row['cat_order_by'];?>&amp;d_type=DEPT" class="icn-link-red tooltip"><i class="fa fa-sort-down fa-lg"></i></a><? }?></td>
            <td class="actionicons" align="center"><a href="?id=<?=$row['md_id'];?>&pg=add" class="icn-link-green tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a>
			<span id="st_div_<?=$row['md_id']?>"><a id="<?=$status_arr;?>" class="rec_status <?=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span> 
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