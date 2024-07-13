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
        <? if(!empty($vrow['sup_avatar'])){?>
            <img src="<?=BASEURLF.RNSUP."sup_photos/".$vrow['sup_avatar'];?>" width="100" height="auto" />
		<?php }?>
		</td>
        <td><h3><?=$vrow['sup_fname']." ".$vrow['sup_lname'];?></h3></td>
      </tr>
    </table>
    </div>      </td>
    </tr>
  <tr>
    <td valign="top"><table cellspacing="0" cellpadding="0" border="0" class="table table-bordered">
      <tbody>
        <tr>
          <td nowrap="nowrap"><strong>Employee Code</strong></td>
          <td><?=$vrow['sup_code']?></td>
        </tr>
        <tr>
          <td><strong>User Name</strong></td>
          <td><?=$vrow['sup_username']?></td>
        </tr>
		<?php
			if(($ERP_Uid==1)||($ERP_Uid==2))
			{
		?>
        <tr>
          <td><strong>Password</strong></td>
          <td ><?=rnsb64ende($vrow['sup_password'],1)?></td>
        </tr>    
			<?php } ?>
      </tbody>
    </table></td>
    <td align="left" valign="top"><table  cellspacing="0"  cellpadding="0" border="0" class="table table-bordered">
      <tbody>
        <tr>
          <td nowrap="nowrap"><strong>Date of Birth</strong></td>
          <td nowrap="nowrap"><?php echo dd_mm_yyyy($vrow['sup_dob']);?>&nbsp;(<? if(!empty($vrow['sup_dob'])) {echo ageCalculator($vrow['sup_dob']); echo "&nbsp;Years"; }else{echo "--";}?>)</td>
        </tr>
        <tr>
          <td><strong>Gender</strong></td>
          <td><?=$vrow['sup_gender'];?></td>
        </tr>
        <tr<?=rns_check_record($vrow['sup_email']);?>>
          <td><strong>E-Mail</strong></td>
          <td><? if(!empty($vrow['sup_email'])){ echo $vrow['sup_email']; }else{ echo '--'; }?></td>
        </tr>
        <tr<?=rns_check_record($vrow['sup_phone']);?>>
          <td><strong>Phone</strong></td>
          <td><? if(!empty($vrow['sup_phone'])){ echo $vrow['sup_phone']; }else{ echo '--'; }?></td>
        </tr>
        
        <tr<?=rns_check_record($vrow['sup_privileges']);?>>
          <td><strong>Privileges</strong></td>
          <td style="word-break:break-all;"><?=$vrow['sup_privileges'];?></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
</table>
</div>

</div>