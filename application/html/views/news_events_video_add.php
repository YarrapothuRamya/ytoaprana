<div class="tablecontent">
	<? if(!empty($pg) && $pg=='add') { ?>
      <div class="box addeditform">
        <h3 class="title">Add <?=$page_name3;?>
          <span class="fr">
          <button class="button-blue" onClick="window.location.href='<?=RNSFI?>.php'"><i class="fa fa-th-list fa-lg"></i> Manage <?=$page_name3;?>
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
        <div class="row" id="ltitle">
            <span class="label"> Name <span class="red">*</span></span>
            <span class="item">
        <input name="ne_title" id="ne_title" type="text" value="<? if(isset($_POST['ne_title'])) echo $_POST['ne_title']; else if(!empty($_GET['id'])) echo $row['ne_title'];?>" required></span>
            <div class="clear"></div>
        </div>
		<div class="row" id="ltitle">
            <span class="label"> URL <span class="red">*</span></span>
            <span class="item">
        <input name="ne_url" id="ne_url" type="text" value="<? if(isset($_POST['ne_url'])) echo $_POST['ne_url']; else if(!empty($_GET['id'])) echo $row['ne_url'];?>" required></span>
            <div class="clear"></div>
        </div>
  
        <div class="row" id="ltitle"> <span class="label"> Description <span class="red"></span></span>
        <span class="item">
   <textarea name="ne_desc" id="ne_desc" value="<? if(!empty($_GET['id'])) echo $row['ne_desc'];?>"  required><? if(!empty($_GET['id'])) echo $row['ne_desc'];?></textarea></span>
        <script>
    CKEDITOR.replace('ne_desc');
  </script>
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
      <button class="button-blue" onClick="window.location.href='<?=RNSFI;?>.php?pg=add'"/><i class="fa fa-plus-square fa-lg"></i> Add News&Events Video</button>
      </span></h3>
  </div>
    <div class="search_box">
    <form method="post">
    
        <input name="search" id="search" type="text" style="width: 150px" value="<? if(!empty($_SESSION['ser_key'])){ echo $_SESSION['ser_key']; }?>" placeholder="Search keyword">
        <input name="search_btn" type="submit" class="button-blue" value="Search"/>
        <input type="button" class="button-orange" value="Clear" onClick="window.location.href='<?=RNSFI;?>.php?reset'"/>
    <div class="clear"></div>
    </form>
    </div>
    <div id="tab-container" class="box tab-container">
        <table width="100%" class="table table-bordered">
            <thead>
                <tr>
                <th align="center" width="5%">S.No.</th>
               
                <th align="left">Name</th>
             
                <th width="10%" >Added On</th>
                <th align="center" width="10%" class="hide">Order By</th>
                <th align="center" width="10%">Actions</th>
            </tr></thead>
            <tbody>
            <?php
            $dept=0;
            $qur=Query("select * from bi_news where ".$sub_qur." and ne_cat_id=2 order by ne_id desc");
            $cnt=NumRows($qur);
            if($cnt>0){
                while($row=Fetch($qur)){ $dept++;
				
				if($row['ne_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
           		$status_arr=$row['ne_id'].",".$cs.",".$sm.","."bi_news,ne_";
            ?>
            <tr>
            <td align="center"><?=$dept;?></td>
            <td align="left"><?=$row['ne_title']?></td>
            <td align="center" ><?=dd_mm_yyyy($row['ne_added_date'])?></td>
            <td align="right" class="hide"><? if($dept!=1){?>
                <? if(!empty($row['cat_order_by'])){?>
              <a href="?move=up&amp;priority=<?=$row['cat_order_by'];?>&amp;d_type=DEPT" class="icn-link-green tooltip"><i class="fa fa-sort-up fa-lg"></i></a>
              <? }} if($dept!=$cnt){?>&nbsp;<a href="?move=down&amp;priority=<?=$row['cat_order_by'];?>&amp;d_type=DEPT" class="icn-link-red tooltip"><i class="fa fa-sort-down fa-lg"></i></a><? }?></td>
            <td class="actionicons" align="center"><a href="?id=<?=$row['ne_id'];?>&pg=add" class="icn-link-green tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a>
			 <a href="newsevents_video_view?id=<?=$row['ne_id'];?>" class="preview_rns icn-link-green tooltip" title="Preview"><i class="fa fa-search fa-lg"></i></a>
			  <span id="st_div_<?=$row['ne_id']?>"><a id="<?=$status_arr;?>" class="rec_status <?=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span>
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