<div class="tablecontent">
	<? if(!empty($pg) && $pg=='add') { ?>
      <div class="box addeditform">
        <h3 class="title">Add <?=$page_name3;?>
          <span class="fr">
          <button class="button-blue" onClick="window.location.href='<?=RNSFI?>.php'"><i class="fa fa-th-list fa-lg"></i> Manage Reports
          </button>
          </span> </h3>
      </div>
    <div class="box addeditform">
    <form action="" method="post" name="designation" id="designation">

		<div class="row">
            <span class="label">Report Date<span class="red">*</span></span>
            <span class="item">
			<?php echo $now_time; ?>
        <input name="emprep_dt" id="emprep_dt" type="hidden" value="<?=$now_time?>" required readonly>
            </span>
          <div class="clear"></div>
          </div>	

        <div class="row" id="ltitle">
            <span class="label">Report Description<span class="red">*</span></span>
            <span class="item">
			<textarea name="emprep_desc" id="emprep_desc"><? if(isset($_POST['emprep_desc'])) echo $_POST['emprep_desc']; else if(!empty($_GET['id'])) echo $row['emprep_desc'];?></textarea>
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
      <button class="button-blue" onClick="window.location.href='<?=RNSFI;?>.php?pg=add'"/><i class="fa fa-plus-square fa-lg"></i> Add Report</button>
      </span></h3>
  </div>
    <div class="search_box">
    <form method="post">
    <span class="item">
        <input name="emprep_dt" id="emprep_dt" type="text" value="<? if(isset($_POST['emprep_dt'])) echo $_POST['emprep_dt']; else if(!empty($_GET['id'])) echo $row['emprep_dt'];?>" required>
     </span>
        <input name="search" id="search" type="text" style="width: 150px" value="<? if(!empty($_SESSION['ser_key'])){ echo $_SESSION['ser_key']; }?>" placeholder="Search keyword">
        <input name="search_btn" type="submit" class="button-blue" value="Search"/>
        <input type="button" class="button-orange" value="Clear" onClick="window.location.href='employee_reports.php?reset'"/>
    <div class="clear"></div>
    </form>
    </div>
    <div id="tab-container" class="box tab-container">
        <table width="100%" class="table table-bordered">
            <thead>
                <tr>
                <th align="center" width="5%">S.No.</th>
                <th width="10%" align="left">Employee Name</th>
                <th width="10%" align="left">Report Date</th>
                <th  align="left">Report Description</th>
                <th width="10%" >Added On</th>
                <th align="center" width="10%" class="hide">Order By</th>
                <th align="center" width="10%">Actions</th>
            </tr></thead>
            <tbody>
            <?php
            $dept=0; 
			if($_SESSION['ERP_Utype']==3)
			{
				$sub_qur=" emprep_loginid=".$_SESSION['ERP_Uid'];
			}
			$qur=Query("select * from bi_emprep as E where ".$sub_qur." order by emprep_id desc");
			$cnt=NumRows($qur);
            if($cnt>0){
                while($row=Fetch($qur)){ $dept++;
				
				if($row['emprep_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
           		$status_arr=$row['emprep_id'].",".$cs.",".$sm.","."bi_emprep,emprep_";
				$empdtls=get_data('va_employees','emp_fname,emp_lname',"emp_id=".$row['emprep_loginid'])
            ?>
            <tr>
            <td align="center"><?=$dept;?></td>
            <td align="left"><?=$empdtls['emp_fname']." ".$empdtls['emp_lname']?></td>
            <td align="left"><?=$row['emprep_dt']?></td>
            <td align="left"><?=$row['emprep_desc']?></td>
            <td align="center" ><?=dd_mm_yyyy($row['emprep_added_date'])?></td>
            <td align="right" class="hide"><? if($dept!=1){?>
                <? if(!empty($row['emprep_order_by'])){?>
              <a href="?move=up&amp;priority=<?=$row['emprep_order_by'];?>&amp;d_type=DEPT" class="icn-link-green tooltip"><i class="fa fa-sort-up fa-lg"></i></a>
              <? }} if($dept!=$cnt){?>&nbsp;<a href="?move=down&amp;priority=<?=$row['emprep_order_by'];?>&amp;d_type=DEPT" class="icn-link-red tooltip"><i class="fa fa-sort-down fa-lg"></i></a><? }?></td>
            <td class="actionicons" align="center"><a href="?id=<?=$row['emprep_id'];?>&pg=add" class="icn-link-green tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a>
			<span id="st_div_<?=$row['emprep_id']?>"><a id="<?=$status_arr;?>" class="rec_status <?=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span> 
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