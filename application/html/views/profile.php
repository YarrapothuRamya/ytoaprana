<div class="tablecontent">
    <div class="box addeditform">
        <h3 class="title">MY PROFILE</h3>
    </div>
  <div class="box addeditform">
    <div id="tab-container" class="box tab-container">
      <div >
        <table>
		<tr>
			<td align=2>
				<? if(!empty($vrow['emp_avatar'])){?>
				<img src="<?=BASEURLF.RNSUP."emp_photos/".$vrow['emp_avatar'];?>" width="100" height="auto" />
				<?php }?>
			</td>
		</tr>
          <tr>
            <td width="50%"><ul class='etabs' >
                <li class='tab' ><a href="#tabs1" >Basic Information</a></li></ul>
              <table  class="table table-bordered ctable" style="float: left">
                <tbody>
                  <tr>
                    <td width="248" align="left">First Name</td>
                    <td width="114" align="left">:</td>
                    <td width="888" align="left" class="bold"><?=$vrow['emp_fname'];?>
                      &nbsp;
                      <?=$vrow['emp_lname'];?></td>
                  </tr>
                  <tr>
                    <td align="left">Date of Birth</td>
                    <td align="left">:</td>
                    <td align="left" class="bold"><?php echo dd_mm_yyyy($vrow['emp_dob']);?></td>
                  </tr>
                  <tr>
                    <td align="left">Gender</td>
                    <td align="left">:</td>
                    <td align="left" class="bold"><?=$vrow['emp_gender'];?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left">Qualification</td>
                    <td align="left">:</td>
                    <td align="left" class="bold"><?=$vrow['emp_qualification']?></td>
                  </tr>
                </tbody>
              </table></td>
            <td width="50%"><ul class='etabs' >
                <li class='tab'> <a href="#tabs2">Communication Details</a> </li>
              </ul>
              <table width="100%" class="table table-bordered ctable">
                <tbody>
                  <tr>
                    <td width="24%" align="left"> E-Mail ID</td>
                    <td width="9%" align="left">:</td>
                    <td width="67%" align="left" class="bold"><? if(!empty($vrow['emp_email'])){echo $vrow['emp_email'];}else{ echo '--'; }?></td>
                  </tr>
                  <tr>
                    <td align="left">Mobile Number</td>
                    <td align="left">:</td>
                    <td align="left" class="bold"><? if(!empty($vrow['emp_phone'])){ echo $vrow['emp_phone']; }else{ echo '--'; }?></td>
                  </tr>
                  <tr>
                    <td align="left">Address</td>
                    <td align="left">:</td>
                    <td align="left" class="bold"><?=$vrow['emp_pre_address']?></td>
                  </tr>
                </tbody>
            </table></td>
          </tr>
        </table>
        <div class="row" style="padding-right:200px;"> <span class="label">&nbsp;</span>
          <input name="Submit" type="submit" class="button-green" id="button" value="Edit Profile" onClick="window.location.href='profile-edit.php?id=<?=$ERP_Uid;?>'"/>
          <span class="label">&nbsp;</span>
          <input name="change_pass" type="submit" class="button-green" id="button" value="Change Password" onClick="window.location.href='change_password.php'"/>
        </div>
      </div>
    </div>
  </div>
</div>
