<div class="tablecontent">

	<div class="box addeditform">
    <h3 class="title">Add <?=$page_name3;?>
      <span class="fr">
      <button class="button-blue" onClick="window.location.href='appointments'"><i class="fa fa-th-list fa-lg"></i> Manage <?=$page_name3;?>s</button>
      </span> </h3>
    </div>
	 <div class="box addeditform">
    <form action="" method="post" name="" id="" enctype="multipart/form-data">
       <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="50%"><div id="basic_details"> 
            <? if(!empty($_GET['id'])){ ?>           
          	 <div class="row">
         	    <span class="label">Appointment Id <span class="red">*</span></span>
                <span class="item"><input name="vaap_appt_no" id="vaap_appt_no" type="text" value="<? if(!empty($_GET['id'])) echo $row['vaap_appt_no'];?>" required readonly="readonly"></span>
                <div class="clear"></div>
          </div> <? } ?>
             <div class="row">
            <span class="label">Service <span class="red">*</span></span>
            <span class="item">
            <select name="vaap_service" id="vaap_service" class="rnscall" placeholder=" Name" style="width: 310px" required>
                <?php // dropdown('hf_category_list', 'cat_id,cat_name', 'cat_status=1 and cat_parent_id=1 order by cat_name', @$row['p_cat_id']); ?>
                <?php rns_drop_foreach($astroservice_arr,@$row['vaap_service'],'Service',''); ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>
           
          <div class="row">
         	    <span class="label">Name <span class="red">*</span></span>
                <span class="item"><input name="vaap_name" id="vaap_name" type="text" value="<? if(!empty($_GET['id'])) echo $row['vaap_name'];?>" required></span>
                <div class="clear"></div>
          </div>
          <div class="row">
              <span class="label">Gender&nbsp;<span class="red">*</span></span>
              <span class="item">
              <input type="radio" name="vaap_gender" id="male" value="Male" <?=($gender == 'Male') ? 'checked="checked"' : '';?> checked/>&nbsp;&nbsp;Male&nbsp;&nbsp;</span>
              <span class="item"><input type="radio" name="vaap_gender" id="female" value="Female" <?=($gender == 'Female') ? 'checked="checked"' : '';?>/>&nbsp;&nbsp;Female&nbsp;&nbsp;</span>
              <div class="clear"></div>
          </div>
          <div class="row">
               <span class="label">Date of Birth&nbsp;<span class="red">*</span></span><span class="item">
                   <input name="vaap_dob" type="text" class="dob dateinput" id="vaap_dob" style="width:110px;" value="<? if(isset($_POST['vaap_dob'])){ echo $_POST['vaap_dob']; } 
                   else if(!empty($_GET['id'])){echo date('d-m-Y', strtotime($row['vaap_dob']));}else{ echo ""; }?>" size="30" 
                   maxlength="10" required>
               </span>
               <div class="clear"></div>
          </div>
          <div class="row">
               <span class="label">Time of Birth&nbsp;<span class="red">*</span></span><span class="item">
                  
                  <?php  rns_drop_number('vaap_hrs','select Hours',@$row['vaap_hrs'],'12'); ?>
                   <?php  rns_drop_number('vaap_mts','select Minutes',@$row['vaap_mts'],'59'); ?>
                   <select name="vaap_tob" id="vaap_tob" style="width:110px" required>
                                            <option value="">Select</option>           
                                            <option value="AM" <? if(!empty($_GET['id']) && $row['vaap_tob']=='AM'){ ?>selected <? }?> >AM</option>
                                            <option value="PM" <? if(!empty($_GET['id']) && $row['vaap_tob']=='PM'){ ?>selected <? }?> >PM</option>
                                       </select>
               </span>
               <div class="clear"></div>
          </div>
          <div class="row">
         	    <span class="label">Birth City <span class="red">*</span></span>
                <span class="item"><input name="vaap_bstate" id="vaap_bstate" type="text" value="<? if(!empty($_GET['id'])) echo $row['vaap_bstate'];?>" required></span>
                <div class="clear"></div>
          </div>
           <div class="row">
         	    <span class="label">Birth State <span class="red">*</span></span>
                <span class="item"><input name="vaap_bcty" id="vaap_bcty" type="text" value="<? if(!empty($_GET['id'])) echo $row['vaap_bcty'];?>" required></span>
                <div class="clear"></div>
          </div>
          <div class="row">
            <span class="label">Birth Country <span class="red">*</span></span>
            <span class="item">
            <select name="vaap_bcntry" id="vaap_bcntry" class="rnscall" placeholder="Name" style="width: 310px" required>
                <?php // dropdown('hf_category_list', 'cat_id,cat_name', 'cat_status=1 and cat_parent_id=1 order by cat_name', @$row['p_cat_id']); ?>
                <?php rns_drop_foreach($country_arr,@$row['vaap_bcntry'],'Country',''); ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>
          
          <div class="row">
         	    <span class="label">E-Mail <span class="red">*</span></span>
                <span class="item"><input name="vaap_email" id="vaap_email" type="text" value="<? if(!empty($_GET['id'])) echo $row['vaap_email'];?>" required></span>
                <div class="clear"></div>
          </div>
          <div class="row">
         	    <span class="label">Phone <span class="red">*</span></span>
                <span class="item"><input name="vaap_phone" id="vaap_phone" type="text" value="<? if(!empty($_GET['id'])) echo $row['vaap_phone'];?>" required> <span id="mob"></span></span>
                <div class="clear"></div>
          </div>
          <div class="row">
         	    <span class="label">Zip <span class="red">*</span></span>
                <span class="item"><input name="vaap_zip" id="vaap_zip" type="text" value="<? if(!empty($_GET['id'])) echo $row['vaap_zip'];?>" required></span>
                <div class="clear"></div>
          </div>
          <div class="row">
         	   <span class="label">Address&nbsp;<span class="red">*</span></span>
               <span class="item">
               <textarea name="vaap_address" id="vaap_address" value="<? if(!empty($_GET['id'])) echo $row['vaap_address'];?>" required><? if(!empty($_GET['id'])) echo $row['vaap_address'];?></textarea></span>
               <div class="clear"></div>
          </div>
             
             <div class="row">
         	    <span class="label">Payment Options <span class="red">*</span></span>
                <span class="item">
                 <select name="vaap_ptype_id" id="vaap_ptype_id" placeholder="UPI Type" style="width: 190px" required>
              <?php rns_drop_foreach($paymenttype_arr,$row['vaap_ptype_id'],'UPI'); ?>
             
               </select>
                </span>
                <div class="clear"></div>
          </div> 
          
          <div class="row">
         	    <span class="label">Transaction Id <span class="red">*</span></span>
                <span class="item"><input name="vaap_tid" id="vaap_tid" type="text" value="<? if(!empty($_GET['id'])) echo $row['vaap_tid'];?>" required></span>
                <div class="clear"></div>
          </div>
          <div class="row" id="ltitle"> <span class="label"> Question/ Comments <span class="red">*</span></span>
        <span class="item">
   <textarea name="vaap_description" id="vaap_description" value="<? if(!empty($_GET['id'])) echo $row['vaap_description'];?>"  required><? if(!empty($_GET['id'])) echo $row['vaap_description'];?></textarea></span>
        <script>
			CKEDITOR.replace( 'vaap_description' );
        </script>
        <div class="clear"></div>
      </div>
      <div class="row">
            <span class="label">Payment Status <span class="red">*</span></span>
            <span class="item">
            <select name="vaap_pstatus" id="vaap_pstatus" class="rnscall" placeholder=" Name" style="width: 310px" required>
            <option value=""> Payment Status</option>
                <?php rns_drop_foreach($paystatus,@$row['vaap_pstatus']); ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>
          </div></td>
         </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table> 
      <div class="row">
        <span class="label">&nbsp;</span>
           <input type="submit" value="<? if(!empty($getid)) { echo "Edit"; } else { echo "Add"; } ?> " class="button-green">
           <input name="reset" type="reset" value="Cancel" class="button-orange ml10" onClick="history.back()">
        <div class="clear"></div>
    </div>
    </form>
    </div>
	</div>