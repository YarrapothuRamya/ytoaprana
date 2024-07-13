<div class="tablecontent">
	<div class="box addeditform">
    <h3 class="title">Add <?=$page_name3;?>
      <span class="fr">
      <button class="button-blue" onClick="window.location.href='employees'"><i class="fa fa-th-list fa-lg"></i> Manage <?=$page_name3;?>s</button>
      </span> </h3>
    </div>
    <div class="box addeditform">
    <form action="" method="post" name="employye_add_form" id="employye_add_form" enctype="multipart/form-data">
       <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="50%"><div id="basic_details">            
          	<div class="row">
         	    <span class="label">First Name <span class="red">*</span></span>
                <span class="item"><input name="emp_fname" id="emp_fname" type="text" value="<? if(!empty($_GET['id'])) echo $row['emp_fname'];?>" required></span>
                <div class="clear"></div>
          </div>
          <div class="row">
         	   <span class="label">Last Name<span class="red">&nbsp;*</span></span>
               <span class="item">
               <input name="emp_lname" id="emp_lname" type="text" value="<? if(!empty($_GET['id'])) echo $row['emp_lname'];?>" required></span>
               <div class="clear"></div>
          </div>
          <div class="row">
         	   <span class="label">User Name<span class="red">&nbsp;*</span></span>
               <span class="item">
               <input name="emp_username" id="emp_username" type="text" value="<? if(!empty($_GET['id'])) echo $row['emp_username'];?>" required></span>
               <div class="clear"></div>
          </div>
          <div class="row">
         	   <span class="label">Password<span class="red">&nbsp;*</span></span>
               <span class="item">
               <input name="emp_password" id="emp_password" type="password" value="<? if(!empty($_GET['id'])) echo rnsb64ende($row['emp_password'],1);?>" required></span>
               <div class="clear"></div>
          </div>
          <div class="row">
         	   <span class="label">E-Mail Address&nbsp;<span class="red">*</span></span>
               <span class="item">
               <input name="emp_email" id="emp_email" type="text" value="<? if(!empty($_GET['id'])) echo $row['emp_email'];?>" required></span>
               <div class="clear"></div>
          </div>
          <div class="row">
         	   <span class="label">Mobile Number&nbsp;<span class="red">*</span></span>
               <span class="item">
               <input name="emp_phone" id="emp_phone" type="text" maxlength="15" value="<? if(!empty($_GET['id'])) echo $row['emp_phone'];?>" required>&nbsp;<span id="mob"></span></span>
               <div class="clear"></div>
          </div>
          <div class="row">
         	  <span class="label">Avatar<span class="red"></span></span>          
              <span class="item">
                 <input name="file_up" id="file_up" type="file" />
				  <? if(!empty($_GET['id']) && !empty($row['emp_avatar'])) { ?>
                  <a href="view_uploads?v=emp&id=<?=$row['emp_id'];?>" class="ajax tooltip" title="Preview"><img src="<?=$site_url.RNSIM?>view.png" width="16" height="16" border="0" alt="Click to View Image" title="Click to View Image"  align="absmiddle"/></a>
                  <div id="rnsphoto" style="display:none"><img src="<?=BASEURLF.RNSUP."emp_photos/".$avatar?>" border="0" /></div>
                  <input type="hidden" name="oldfile" id="oldfile" value="<?="emp_photos/".$avatar;?>">
                  <? } ?>
                  <span class="red">
                    <?="<br>Max Size (1MB): ".$usize.", Type: ".$ft_img;?>
              </span></span>
          <div class="clear"></div>
          </div>
          <div class="row">
               <span class="label">Date of Birth&nbsp;<span class="red">*</span></span><span class="item">
                   <input name="emp_dob" type="text" class="dob dateinput" id="emp_dob" style="width:110px;" value="<? if(isset($_POST['addate'])){ echo date('d-m-Y'); } 
                   else if(!empty($_GET['id'])){echo date('d-m-Y', strtotime($row['emp_dob']));}else{ echo ""; }?>" size="30" 
                   maxlength="10" required>
               </span>
               <div class="clear"></div>
          </div>
          <div class="row">
              <span class="label">Gender&nbsp;<span class="red">*</span></span>
              <span class="item">
              <input type="radio" name="emp_gender" id="male" value="Male" <?=($gender == 'Male') ? 'checked="checked"' : '';?> checked/>&nbsp;&nbsp;Male&nbsp;&nbsp;</span>
              <span class="item"><input type="radio" name="emp_gender" id="female" value="Female" <?=($gender == 'Female') ? 'checked="checked"' : '';?>/>&nbsp;&nbsp;Female&nbsp;&nbsp;</span>
              <div class="clear"></div>
          </div>
          <div class="row">
                <span class="label">User Type</span>
                <span class="item">
                <select name="emp_type" id="emp_type" placeholder="User Type" style="width: 310px" required>
                    <? unset($get_emptype[4]);rns_drop_foreach_mul($get_emptype,$emp_type,"User Type"); ?>
                </select>
                </span>
          <div class="clear"></div>
          </div>                    
          </div>
          </td>
         </tr>
          <tr>
            <td colspan="3" align="left">
            <div id="emp_pri_div" <? if($emp_type!=3){?>style="display:none;"<? } ?>>
            <div class="row">
              <span class="label" style="width: 12%;">Previliges</span>
              <span class="item">
                <table width="40%" border="1" align="left" cellpadding="10" cellspacing="5">
                  <tr>
                    <td align="left" valign="top">
                      <table cellpadding="5" cellspacing="5">
                        <tr>
                          <td colspan="2" nowrap="nowrap"><strong>Website CMS</strong></td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="MNG_UP" value="MNG_UP" <? if(in_array("MNG_UP", $erow_array)){ echo 'checked';}?> /></td>
                          <td> Upcoming Predictions</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="MNG_RTP" value="MNG_RTP" <? if(in_array("MNG_RTP", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Recent True Predictions</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="GAL_MNG" value="GAL_MNG" <? if(in_array("GAL_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Photo Gallery</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="GAL_ARA" value="GAL_ARA" <? if(in_array("GAL_ARA", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Astrology Research & Analysis</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="GAL_MDA" value="GAL_MDA" <? if(in_array("GAL_MDA", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Media Gallery</td>
                        </tr>
                      </table>
                      </td>
                    <td align="left" valign="top">
                    <table cellpadding="5" cellspacing="5">
                        <tr>
                          <td colspan="2" nowrap="nowrap"><strong>Appointments</strong></td>
                        </tr>
                        
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="APP_MNG" value="APP_MNG" <? if(in_array("APP_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Appointments</td>
                        </tr>
                      </table>
                      </td>
                    <td align="left" valign="top">
                    <table cellpadding="5" cellspacing="5">
                        <tr>
                          <td colspan="2" nowrap="nowrap"><strong>Admin Users</strong></td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BCP_NU" value="BCP_NU" <? if(in_array("BCP_NU", $erow_array)){ echo 'checked';}?> /></td>
                          <td>New User</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BCP_MU" value="BCP_MU" <? if(in_array("BCP_MU", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage Users</td>
                        </tr>
                      </table>
                    </td>
                    </tr>
            	</table>
             </span>
          <div class="clear"></div>
          </div>
        </div>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
      <div class="row">
        <span class="label">&nbsp;</span>
           <input type="submit" value="<? if(!empty($getid)) { echo "Edit"; } else { echo "Add"; } ?> User" class="button-green">
           <input name="reset" type="reset" value="Cancel" class="button-orange ml10" onClick="history.back()">
        <div class="clear"></div>
    </div>
    </form>
    </div>
    </div>