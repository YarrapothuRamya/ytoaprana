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
				<? if(!empty($vrow['image'])){?>
				<img src="<?=BASEURLF.RNSUP."doctor_photos/".$vrow['image'];?>" width="100" height="auto" />
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
                    <td width="888" align="left" class="bold"><?=$vrow['doc_name'];?>
                      &nbsp;
                      <?=$vrow['doc_lname'];?></td>
                  </tr>
                  <tr>
                    <td align="left">Single Line</td>
                    <td align="left">:</td>
                    <td align="left" class="bold"><?=$vrow['doc_singleline'];?></td>
                  </tr>
                  <tr>
                    <td align="left">About</td>
                    <td align="left">:</td>
                    <td align="left" class="bold"><?=$vrow['doc_about'];?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left">Experience Title</td>
                    <td align="left">:</td>
                    <td align="left" class="bold"><?=$vrow['doc_exptitle']?></td>
                  </tr>
                  <tr>
                    <td align="left">Experience Details</td>
                    <td align="left">:</td>
                    <td align="left" class="bold"><?=$vrow['doc_expdtls']?></td>
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
                    <td width="67%" align="left" class="bold"><? if(!empty($vrow['doc_email'])){echo $vrow['doc_email'];}else{ echo '--'; }?></td>
                  </tr>
                  <tr>
                    <td align="left">Mobile Number</td>
                    <td align="left">:</td>
                    <td align="left" class="bold"><? if(!empty($vrow['doc_phone'])){ echo $vrow['doc_phone']; }else{ echo '--'; }?></td>
                  </tr>
                  <tr>
                    <td align="left">Address / Location</td>
                    <td align="left">:</td>
                    <td align="left" class="bold"><?=$vrow['sh_gloction']?></td>
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
