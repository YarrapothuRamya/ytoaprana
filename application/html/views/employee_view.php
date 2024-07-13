<div style="width:800px;">
<div id="printdetails"> 
 <table border="0" cellspacing="5" cellpadding="0">
  <tr>
    <td colspan="2" align="center"><h3 class="title">Employee Details</h3></td>
  </tr>
  <tr>
    <td colspan="2">
    <div style="border:1px solid #CCCCCC;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="20%">
        <? if(!empty($vrow['emp_avatar'])){?>
            <img src="<?=BASEURLF.RNSUP."emp_photos/".$vrow['emp_avatar'];?>" width="100" height="auto" />
		<?php }?>
		</td>
        <td><h3><?=$vrow['emp_fname']." ".$vrow['emp_lname'];?></h3></td>
      </tr>
    </table>
    </div>      </td>
    </tr>
  <tr>
    <td valign="top"><table cellspacing="0" cellpadding="0" border="0" class="table table-bordered">
      <tbody>
        <tr>
          <td nowrap="nowrap"><strong>Employee Code</strong></td>
          <td><?=$vrow['emp_code']?></td>
        </tr>
        <tr>
          <td><strong>User Name</strong></td>
          <td><?=$vrow['emp_username']?></td>
        </tr>
		<?php
			if(($ERP_Uid==1)||($ERP_Uid==2))
			{
		?>
        <tr>
          <td><strong>Password</strong></td>
          <td ><?=rnsb64ende($vrow['emp_password'],1)?></td>
        </tr>    
			<?php } ?>
      </tbody>
    </table></td>
    <td align="left" valign="top"><table  cellspacing="0"  cellpadding="0" border="0" class="table table-bordered">
      <tbody>
        <tr>
          <td nowrap="nowrap"><strong>Date of Birth</strong></td>
          <td nowrap="nowrap"><?php echo dd_mm_yyyy($vrow['emp_dob']);?>&nbsp;(<? if(!empty($vrow['emp_dob'])) {echo ageCalculator($vrow['emp_dob']); echo "&nbsp;Years"; }else{echo "--";}?>)</td>
        </tr>
        <tr>
          <td><strong>Gender</strong></td>
          <td><?=$vrow['emp_gender'];?></td>
        </tr>
        <tr<?=rns_check_record($vrow['emp_email']);?>>
          <td><strong>E-Mail</strong></td>
          <td><? if(!empty($vrow['emp_email'])){ echo $vrow['emp_email']; }else{ echo '--'; }?></td>
        </tr>
        <tr<?=rns_check_record($vrow['emp_phone']);?>>
          <td><strong>Phone</strong></td>
          <td><? if(!empty($vrow['emp_phone'])){ echo $vrow['emp_phone']; }else{ echo '--'; }?></td>
        </tr>
        
        <tr<?=rns_check_record($vrow['emp_privileges']);?>>
          <td><strong>Privileges</strong></td>
          <td style="word-break:break-all;"><?=$vrow['emp_privileges'];?></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
</table>
</div>

</div>