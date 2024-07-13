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
              <div class="row"> <span class="label">Name</span><span class="red">*</span>
			    <span class="item">
                <input name="name" type="text" value="<? if(!empty($admin)) echo $vrow['doc_name'];?>&nbsp;<? echo $vrow['doc_lname'];?>" 
                required>
                </span>
                <div class="clear"></div>
              </div><!--class="dob dateinput"    id="addate"   style="width:110px;" -->
              <div class="row"> <span class="label">About Single Line&nbsp;</span><span class="red">*</span>
			  <span class="item">
                <input name="doc_singleline" type="text"  value="<? if(!empty($admin)){ echo $vrow['doc_singleline']; }else{ echo $vrow['singleline']; }?>">
                </span>
                <div class="clear"></div>
              </div>
            </div>
		   </td>
          <td width="10">&nbsp;</td>
          <td width="50%"><div id="Comm_details">
              <h3 class="form_group_heading">Communication Details</h3>
              <hr style="width:95%">
              <div class="row"> <span class="label">Email Address&nbsp;<span class="red">*</span></span> <span class="item">
                <input name="email" type="text" value="<? if(!empty($admin)) echo $vrow['doc_email'];?>" required>
                </span>
                <div class="clear"></div>
              </div>
              <div class="row"> <span class="label">Mobile Number&nbsp;<span class="red">*</span></span> <span class="item">
                <input name="mob_num" type="text"  value="<? if(!empty($admin)) echo $vrow['doc_phone'];?>" required readonly>
                </span>
                <div class="clear"></div>
              </div>
              <div class="row"> <span class="label">Address&nbsp;<span class="red">*</span></span> <span class="item">
                <textarea name="address" value="<? if(!empty($admin)) echo $vrow['sh_gloction'];?>" required><? if(!empty($admin)) echo $vrow['sh_gloction'];?>
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
