<div class="tablecontent">
	<? if(!empty($pg) && $pg=='add') { ?>
      <div class="box addeditform">
        <h3 class="title">Add <?=$page_name3;?>
          <span class="fr">
          <button class="button-blue" onClick="window.location.href='<?=RNSFI?>.php'"><i class="fa fa-th-list fa-lg"></i> Manage Mitra Reports
          </button>
          </span> </h3>
      </div>
    <div class="box addeditform">
    <form action="" method="post" name="designation" id="designation">

		<div class="row">
            <span class="label">Report Date<span class="red">*</span></span>
            <span class="item">
        <input name="mitrarep_dt" id="mitrarep_dt" type="hidden" value=<?=$now_time?>  required readonly>
		<?php echo $now_time; ?>
<?php /*
value="<? if(isset($_POST['mitrarep_dt'])) echo $_POST['mitrarep_dt']; else if(!empty($_GET['id'])) echo $row['mitrarep_dt'] ?>"
*/  ?>
            </span>
          <div class="clear"></div>
          </div>	

		<div class="row">
            <span class="label">Store Name / Place Visited<span class="red">*</span></span>
            <span class="item">
        <input name="store_visited" id="store_visited" type="text" value="<? if(isset($_POST['store_visited'])) echo $_POST['store_visited']; else if(!empty($_GET['id'])) echo $row['store_visited'] ?>" required>
            </span>
          <div class="clear"></div>
          </div>	
		<div class="row">
            <span class="label">State <span class="red">*</span></span>
            <span class="item">
            <select name="store_stateid" id="store_stateid" class="sel_store" placeholder="" style="width: 310px" required>
            <option value="">Select State</option>
                <?php
                    dropdown('bi_states', 'st_id,st_name', 'st_status=1 '.$state_qur.'order by st_name', @$row['store_stateid']);
                ?>
            </select>
            </span>

          <div class="clear"></div>
          </div>
		  <div class="row">
            <span class="label">District <span class="red">*</span></span>
            <span class="item">
            <select name="store_distid" id="store_distid" class="sel_store" placeholder="" style="width: 310px" required>
            <option value="">Select District</option>
                <?php
                  if(!empty($_GET['id'])) { dropdown('bi_districts', 'dt_id,dt_name', 'dt_status=1 '.$district_qur.' order by dt_name', @$row['store_distid']); }
                ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>
		  <div class="row">
            <span class="label">Mandal <span class="red">*</span></span>
            <span class="item">
            <select name="store_mandid" id="store_mandid" class="sel_store" placeholder="" style="width: 310px" required>
            <option value="">Select Mandal</option>
                <?php
                  if(!empty($_GET['id'])) { dropdown('bi_mandals', 'md_id,md_name', 'md_status=1 '.$mand_qur.' order by md_name', @$row['store_mandid']); }
                ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>	
        <div class="row" id="ltitle">
            <span class="label">Village Name <span class="red">*</span></span>
            <span class="item">
        <input name="store_village" id="store_village" type="text" value="<? if(isset($_POST['store_village'])) echo $_POST['store_village']; else if(!empty($_GET['id'])) echo $row['store_village'];?>" required></span>
            <div class="clear"></div>
        </div>
		
        <div class="row" id="ltitle">
            <span class="label"> Pincode <span class="red">*</span></span>
            <span class="item">
        <input name="store_pincode" id="store_pincode" type="text" maxlength="6" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 43" value="<? if(isset($_POST['store_pincode'])) echo $_POST['store_pincode']; else if(!empty($_GET['id'])) echo $row['store_pincode'];?>" required></span>
            <div class="clear"></div>
        </div>
		
		<div class="row">
            <span class="label">Contact No<span class="red">*</span></span>
            <span class="item">
        <input name="contacted" id="contacted" type="text" maxlength="10" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 43" value="<? if(isset($_POST['contacted'])) echo $_POST['contacted']; else if(!empty($_GET['id'])) echo $row['contacted'] ?>" required>
            </span>
          <div class="clear"></div>
          </div>	

		<div class="row">
            <span class="label">No of HHs Visited<span class="red">*</span></span>
            <span class="item">
        <input name="hh_visited" id="hh_visited" type="text" value="<? if(isset($_POST['hh_visited'])) echo $_POST['hh_visited']; else if(!empty($_GET['id'])) echo $row['hh_visited'] ?>" required>
            </span>
          <div class="clear"></div>
          </div>	

		<div class="row">
            <span class="label">Secondary Sales Value<span class="red">*</span></span>
            <span class="item">
        <input name="sales_value" id="sales_value" type="text" value="<? if(isset($_POST['sales_value'])) echo $_POST['sales_value']; else if(!empty($_GET['id'])) echo $row['sales_value'] ?>" required>
            </span>
          <div class="clear"></div>
          </div>	

        <div class="row" id="ltitle">
            <span class="label">Products Sold Description<span class="red">*</span></span>
            <span class="item">
			<textarea name="mitrarep_desc" id="mitrarep_desc"><? if(isset($_POST['mitrarep_desc'])) echo $_POST['mitrarep_desc']; else if(!empty($_GET['id'])) echo $row['mitrarep_desc'];?></textarea>
			</span>
            <div class="clear"></div>
        </div>

		<div class="row">
            <span class="label">Order Taken - SKUs<span class="red">*</span></span>
            <span class="item">
        <input name="order_taken" id="order_taken" type="text" value="<? if(isset($_POST['order_taken'])) echo $_POST['order_taken']; else if(!empty($_GET['id'])) echo $row['order_taken'] ?>" required>
            </span>
          <div class="clear"></div>
          </div>	

		<div class="row">
            <span class="label">Order Taken - Value<span class="red">*</span></span>
            <span class="item">
        <input name="order_taken_value" id="order_taken_value" type="text" value="<? if(isset($_POST['order_taken_value'])) echo $_POST['order_taken_value']; else if(!empty($_GET['id'])) echo $row['order_taken_value'] ?>" required>
            </span>
          <div class="clear"></div>
          </div>	

		<div class="row">
            <span class="label">Primary Billing Value<span class="red">*</span></span>
            <span class="item">
        <input name="billing_value" id="billing_value" type="text" value="<? if(isset($_POST['billing_value'])) echo $_POST['billing_value']; else if(!empty($_GET['id'])) echo $row['billing_value'] ?>" required>
            </span>
          <div class="clear"></div>
          </div>	

		<div class="row">
            <span class="label">DC No<span class="red">*</span></span>
            <span class="item">
        <input name="dc_no" id="dc_no" type="text" value="<? if(isset($_POST['dc_no'])) echo $_POST['dc_no']; else if(!empty($_GET['id'])) echo $row['dc_no'] ?>" required>
            </span>
          <div class="clear"></div>
          </div>	
  
		<div class="row">
            <span class="label">Total KMs Travelled<span class="red">*</span></span>
            <span class="item">
        <input name="km_travelled" id="km_travelled" type="text" value="<? if(isset($_POST['km_travelled'])) echo $_POST['km_travelled']; else if(!empty($_GET['id'])) echo $row['km_travelled'] ?>" required>
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
      <button class="button-blue" onClick="window.location.href='<?=RNSFI;?>.php?pg=add'"/><i class="fa fa-plus-square fa-lg"></i> Add Mitra Report</button>
      </span></h3>
  </div>
    <div class="search_box">
    <form method="post">
    <span class="item">
        <input name="mitrarep_dt" id="mitrarep_dt" type="text" value="<? if(isset($_POST['mitrarep_dt'])) echo $_POST['mitrarep_dt']; else if(!empty($_GET['id'])) echo $row['mitrarep_dt'];?>" required>
     </span>
        <input name="search" id="search" type="text" style="width: 150px" value="<? if(!empty($_SESSION['ser_key'])){ echo $_SESSION['ser_key']; }?>" placeholder="Search keyword">
        <input name="search_btn" type="submit" class="button-blue" value="Search"/>
        <input type="button" class="button-orange" value="Clear" onClick="window.location.href='mitra_reports.php?reset'"/>
    <div class="clear"></div>
    </form>
    </div>
    <div id="tab-container" class="box tab-container">
        <table width="100%" class="table table-bordered">
            <thead>
                <tr>
                <th align="center" width="5%">S.No.</th>
                <th width="10%" align="left">Mitra Name</th>
                <th width="10%" align="left">Report Date</th>
                <th width="10%" align="left">Store (Visited)</th>
                <th width="10%" align="left">State / District / Mandal / Village</th>
                <th width="10%" align="left">Pin Code</th>
                <th width="10%" align="left">Contacted</th>
                <th width="10%" align="left">No of HH Visited</th>
                <th width="10%" align="left">Sales Value</th>
                <th  align="left">Report Description</th>
                <th width="10%" align="left">Order Taken</th>
                <th width="10%" align="left">Order Taken Value</th>
                <th width="10%" align="left">Billing Value</th>
                <th width="10%" align="left">DC No</th>
                <th width="10%" align="left">Total KMs</th>
                <th width="10%" >Added On</th>
                <th align="center" width="10%" class="hide">Order By</th>
                <th align="center" width="10%">Actions</th>
            </tr></thead>
            <tbody>
            <?php
            $dept=0; 
			if($_SESSION['ERP_Utype']==3)
			{
				$sub_qur=" mitrarep_loginid=".$_SESSION['ERP_Uid'];
			}
			$qur=Query("select * from bi_mitrarep as Mi 
						left join bi_states as S on S.st_id=Mi.store_stateid
						left join bi_districts as D on D.dt_id=Mi.store_distid
						left join bi_mandals as M on M.md_id=Mi.store_mandid
						where ".$sub_qur." order by mitrarep_id desc");
			$cnt=NumRows($qur);
            if($cnt>0){
                while($row=Fetch($qur)){ $dept++;
				
				if($row['mitrarep_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
           		$status_arr=$row['mitrarep_id'].",".$cs.",".$sm.","."bi_mitrarep,mitrarep_";
				$mitradtls=get_data('va_employees','emp_fname,emp_lname',"emp_id=".$row['mitrarep_loginid'])
            ?>
            <tr>
            <td align="center"><?=$dept;?></td>
            <td align="left"><?=$mitradtls['emp_fname']." ".$mitradtls['emp_lname']?></td>
            <td align="left"><?=$row['mitrarep_dt']?></td>
            <td align="left"><?=$row['store_visited']?></td>
            <td align="left"><?=$row['st_name']."/".$row['dt_name']."/".$row['md_name']."/".$row['store_village']?></td>
            <td align="left"><?=$row['store_pincode']?></td>
            <td align="left"><?=$row['contacted']?></td>
            <td align="left"><?=$row['hh_visited']?></td>
            <td align="left"><?=$row['sales_value']?></td>
            <td align="left"><?=$row['mitrarep_desc']?></td>
            <td align="left"><?=$row['order_taken']?></td>
            <td align="left"><?=$row['order_taken_value']?></td>
            <td align="left"><?=$row['billing_value']?></td>
            <td align="left"><?=$row['dc_no']?></td>
            <td align="left"><?=$row['km_travelled']?></td>
            <td align="center" ><?=dd_mm_yyyy($row['mitrarep_added_date'])?></td>
            <td align="right" class="hide"><? if($dept!=1){?>
                <? if(!empty($row['mitrarep_order_by'])){?>
              <a href="?move=up&amp;priority=<?=$row['mitrarep_order_by'];?>&amp;d_type=DEPT" class="icn-link-green tooltip"><i class="fa fa-sort-up fa-lg"></i></a>
              <? }} if($dept!=$cnt){?>&nbsp;<a href="?move=down&amp;priority=<?=$row['mitrarep_order_by'];?>&amp;d_type=DEPT" class="icn-link-red tooltip"><i class="fa fa-sort-down fa-lg"></i></a><? }?></td>
            <td class="actionicons" align="center"><a href="?id=<?=$row['mitrarep_id'];?>&pg=add" class="icn-link-green tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a>
			<span id="st_div_<?=$row['mitrarep_id']?>"><a id="<?=$status_arr;?>" class="rec_status <?=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span> 
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