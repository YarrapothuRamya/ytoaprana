<div class="tablecontent">
	<div class="box addeditform">
    <h3 class="title">Manage <?=$page_name3;?>s<span class="fr">
      <button class="button-blue" onClick="window.location.href='employee_add?pg=add'"/><i class="fa fa-plus-square fa-lg"></i> Add <?=$page_name3;?></button>
      </span></h3>
    </div>
    <div class="search_box">
    <span class="fl">
    <form action="" method="post" name="form" id="form">
        <input name="search" id="search" type="text" placeholder="Search keyword" value="<? if(isset($_SESSION['ser_keyword'])) { echo $_SESSION['ser_keyword']; } ?>" style="min-width:150px">
        <input name="go" type="submit" class="button-blue" value="Search"/>
        <input type="button" class="button-orange" value="Clear" onClick="window.location.href='employees?reset'"/>
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
    <table width="100%" class="table table-bordered" id="employee">
       <thead>
            <tr>
            <th align="center" width="5%">S.No</th>
            <th width="5%" align="left">Avatar</th>
            <th width="10%" align="left">Code</th>
            <th width="30%" align="left">Name</th>
            <th width="25%" align="left">Contact Details</th>
            <th width="5%" align="center" nowrap>Added On</th>
            <th align="center" width="5%">Actions</th>
         </tr></thead>
            <tbody>
            <?php
            if(!empty($_GET['start'])){ $i= $_GET['start']; } else { $i=0; }
            $qur_sel="select * from va_employees as E
			left join va_employees_type as ET on E.emp_type=ET.empt_id
			where ".$sub_qur." and emp_type<>1 order by emp_order_by desc";
            $qur_cnt=Query($qur_sel);
            $cnt_sel=NumRows($qur_cnt);            
            $qur_sel=Query($qur_sel." limit $start,$len");			
            if($cnt_sel>0){
                while($row_sel=Fetch($qur_sel)){ $i++;
                if(!empty($row_sel['emp_avatar'])){
                    $avatar=BASEURLF.RNSUP."emp_photos/".$row_sel['emp_avatar'];
                } else {
                    $avatar=BASEURLF.RNSUP."noavatar.png";					
                }
            if($row_sel['emp_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
            $status_arr=$row_sel['emp_id'].",".$cs.",".$sm.","."va_employees,emp_";
            ?>
            
            <tr>
            <td align="center"><?=$i;?></td>
            <td align="left"><img src="<?=$avatar?>" width="50px;"></td>
            <td align="left"><?=$row_sel['emp_code']."<br>".$row_sel['empt_type'];?></td>
            <td align="left"><?=$row_sel['emp_fname']." ".$row_sel['emp_lname']; ?></td>
            <td align="left"><?=$row_sel['emp_email']; ?><div class="subtitle"><?=$row_sel['emp_phone'];?></div></td>
            <td align="center"><?=date('d-m-Y', strtotime($row_sel['emp_added_date']));?></td>
            <td align="center" nowrap class="actionicons">
            <a href="employee_add?id=<?=$row_sel['emp_id'];?>" class="icn-link-green tooltip" title="Edit"><i class="fa fa-pencil-square fa-lg"></i></a>
            <a href="employee_view?id=<?=$row_sel['emp_id'];?>" class="preview_rns icn-link-green tooltip" title="Preview"><i class="fa fa-search fa-lg"></i></a>
            <span id="st_div_<?=$row_sel['emp_id']?>"><a id="<?=$status_arr;?>" class="rec_status <?=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span>            </td>
            </tr>
            <? }}else{?>
            <tr>
              <td colspan="7" align="center" class="red">No Records Found</td>
              </tr>
            <? } if($cnt_sel>$len){?>
            <tr>
              <td colspan="7" align="center" class="red"><? Navigation($start,$cnt_sel,$link);?></td>
              </tr>
            <? }?>
            </tbody>
      </table>
  </div>
</div>