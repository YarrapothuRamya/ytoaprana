<div class="tablecontent">
  <div class="box addeditform">
    <form action="" method="post" name="form" id="form" enctype="multipart/form-data">
      <div class="box addeditform">
        <h1 >Edit Profile</h1>
        <span class="fr">
        <input type="button" class="button-blue" value="Manage My Account" onClick="window.location.href='profile'"/>
        </span>
        </h2>
      </div>
      <table width="0%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="50%"><div id="basic_details">
              <h3 class="form_group_heading">Basic Information</h3>
              <hr style="width:95%">
              <div class="row"> <span class="label">Name<span class="red">*</span></span> <span class="item">
                <input name="name" type="text" value="<? if(!empty($admin)) echo $vrow['emp_fname'];?>&nbsp;<? echo $vrow['emp_lname'];?>" 
                required>
                </span>
                <div class="clear"></div>
              </div>
              <div class="row"> <span class="label">Date of Birth&nbsp;<span class="red">*</span></span><span class="item">
                <input name="addate" type="text" class="dob dateinput" id="addate" style="width:110px;" value="<? if(isset($_POST['addate'])){ echo date('d-m-Y'); } 
				   else if(!empty($_GET['id'])){echo date('d-m-Y', strtotime($vrow['emp_dob']));}else{ echo date('d-m-Y'); }?>" size="30" 
                   maxlength="10">
                </span>
                <div class="clear"></div>
              </div>
              <div class="row"> <span class="label">Gender&nbsp;<span class="red">*</span></span> <span class="item">
                <input type="radio" name="gender" id="male" value="Male" <?=($gender == 'Male') ? 'checked="checked"' : '';?> checked/>
                &nbsp;&nbsp;Male&nbsp;&nbsp;</span> <span class="item">
                <input type="radio" name="gender" id="female" value="Female" <?=($gender == 'Female') ? 'checked="checked"' : '';?>/>
                &nbsp;&nbsp;Female&nbsp;&nbsp;</span>
                <div class="clear"></div>
              </div>
              <div class="row"> <span class="label">Qualification<span class="red">&nbsp;*</span></span> <span class="item">
                <input name="qualification" type="text" value="<? if(!empty($admin)) echo $vrow['emp_qualification'];?>" required>
                </span>
                <div class="clear"></div>
              </div>
            </div></td>
          <td width="10">&nbsp;</td>
          <td width="50%"><div id="Comm_details">
              <h3 class="form_group_heading">Communication Details</h3>
              <hr style="width:95%">
              <div class="row"> <span class="label">Email Address&nbsp;<span class="red">*</span></span> <span class="item">
                <input name="email" type="text" value="<? if(!empty($admin)) echo $vrow['emp_email'];?>" required>
                </span>
                <div class="clear"></div>
              </div>
              <div class="row"> <span class="label">Mobile Number&nbsp;<span class="red">*</span></span> <span class="item">
                <input name="mob_num" type="text"  value="<? if(!empty($admin)) echo $vrow['emp_phone'];?>" required>
                </span>
                <div class="clear"></div>
              </div>
              <div class="row"> <span class="label">Address&nbsp;<span class="red">*</span></span> <span class="item">
                <textarea name="address" value="<? if(!empty($admin)) echo $vrow['emp_pre_address'];?>" required><? if(!empty($admin)) echo $vrow['emp_pre_address'];?>
               </textarea>
                </span>
                <div class="clear"></div>
              </div>
            </div></td>
        </tr>
      </table>
      <div class="row"> <span class="label">&nbsp;</span>
        <input type="submit" value="Edit Profile" class="button-green" >
        <input name="reset" type="reset" value="Cancel" class="button-orange ml10" onClick="history.back()">
        <div class="clear"></div>
      </div>
    </form>
  </div>
</div>
