<div class="tablecontent">
  <?  // if(!empty($pg) && $pg==='add') { ?>
  <div class="box addeditform">
    <h3 class="title">ADD
      <?=$page_name3;?>
      <span class="fr">
      <button class="button-blue" onClick="window.location.href='emergency_registration'"><i class="fa fa-th-list fa-lg"></i> Manage
      <?=$page_name3;?>s</button>
      </span> </h3>
  </div>
  <div class="box addeditform">
    <form action="" method="post" name="emergency_reg_edit" id="emergency_reg_edit" enctype="multipart/form-data">
           
        <div class="row" id="ltitle">
            <span class="label">Name of the Emergency<span class="red"> *</span></span>
            <span class="item">
            <?php  echo $emergency_data['emergency_name'];?></span>
            <div class="clear"></div>
        </div>
        
        <div class="row" id="ltitle">
            <span class="label">Registration Number<span class="red"> *</span></span>
            <span class="item">
            <?php  echo $emergency_data['emergency_refno'];?></span>
            <div class="clear"></div>
        </div>
        
        <div class="row" id="ltitle">
            <span class="label">Mobile Number<span class="red"> *</span></span>
            <span class="item">
            <?php  echo $emergency_data['emergency_mobile'];?></span>
            <div class="clear"></div>
        </div>
        <div class="row" id="ltitle">
        <span class="label">Hospital / Clinic Name <span class="red">*</span></span>
            <span class="item">
            <input name="emergency_hosname" id="emergency_hosname" Type="text" 
             value="<? 
            if(isset($_POST['emergency_hosname'])) { 
                echo $_POST['emergency_hosname']; 
                }else { 
                    echo $row['emergency_hosname'];
                    } ?>" required >
            </span> 
            <div class="clear"></div>
        </div>
        <div class="row" id="ltitle">
        <span class="label">Aadhar No <span class="red">*</span></span>
            <span class="item">
            <input name="emergency_aadhaar" id="emergency_aadhaar" type="text" minlength="12" maxlength="12" 
            onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 43"
             value="<? 
            if(isset($_POST['emergency_aadhaar'])) { 
                echo $_POST['emergency_aadhaar']; 
                }else { 
                    echo $row['emergency_aadhaar'];
                    } ?>" required>
            </span> 
            <div class="clear"></div>
            </div>
        <div class="row" id="ltitle">
        <span class="label">GST No </span>
            <span class="item">
            <input name="emergency_gst" id="emergency_gst" type="text" minlength="15"  maxlength="15" 
             value="<? 
            if(isset($_POST['emergency_gst'])) { 
                echo $_POST['emergency_gst']; 
                }else { 
                    echo $row['emergency_gst'];
                    } ?>" >
            </span> 
            <div class="clear"></div>
        </div>
        <div class="row" id="ltitle">
        <span class="label">PAN CARD <span class="red"></span></span>
            <span class="item">
            <input name="emergency_pan" id="emergency_pan" type="text"
             value="<? 
            if(isset($_POST['emergency_pan'])) { 
                echo $_POST['emergency_pan']; 
                }else { 
                    echo $row['emergency_pan'];
                    } ?>">
            </span> 
            <div class="clear"></div>
        </div>

        <div class="row" id="ltitle">
        <span class="label">EMAIL ID <span class="red"></span></span>
            <span class="item">
            <input name="emergency_email" id="emergency_email" type="text"
             value="<? 
            if(isset($_POST['emergency_email'])) { 
                echo $_POST['emergency_email']; 
                }else { 
                    echo $row['emergency_email'];
                    } ?>">
            </span> 
            <div class="clear"></div>
        </div>
           
           <div class="row">
            <span class="label">State <span class="red">*</span></span>
            <span class="item">
            <select name="sh_state" id="sh_state" class="sel_ls" placeholder="" style="width: 310px" required disabled="true">
            <option value="">Select State</option>
                <?php
                    dropdown('bi_states', 'st_id,st_name', 'st_status=1 order by st_name', @$row['sh_state']);
                ?>
            </select>
            </span>
            <div class="clear"></div>
        </div> 
          
          <div class="row" id="ltitle">
            <span class="label">District <span class="red">*</span></span>
            <span class="item">
            <select name="sh_district" id="sh_district" class="sel_ls" placeholder="" style="width: 310px" required disabled="true">
            <option value="">Select District</option>
                <?php
                    dropdown('bi_districts', 'dt_id,dt_name', 'dt_status=1 order by dt_name', @$row['sh_district']);
                ?>
            </select>
            </span>
            <div class="clear"></div>
        </div>
	 
	<div class="row" id="ltitle">
            <span class="label">Mandals <span class="red">*</span></span>
            <span class="item">
            <select name="sh_mandal" id="sh_mandal" class="sel_ls" placeholder="" style="width: 310px" required disabled="true">
            <option value="">Select Mandal</option>
                <?php
                    dropdown('bi_mandals', 'md_id,md_name', 'md_status=1 order by md_name', @$row['sh_mandal']);
                ?>
            </select>
            </span>        
            <div class="clear"></div>
        </div>
		
        <div class="row" id="ltitle">
            <span class="label">Village <span class="red">*</span></span>
            <span class="item">
            <input name="sh_village" id="sh_village" type="text"
             value="<? 
            if(isset($_POST['sh_village'])) { 
                echo $_POST['sh_village']; 
                }else { 
                    echo $row['sh_village'];
                    } ?>" required>
            </span> 
            <div class="clear"></div>
        </div>
        <div class="row" id="ltitle">
        <span class="label">Pin Code <span class="red">*</span></span>
            <span class="item">
            <input name="sh_pincode" id="sh_pincode" type="text"
             value="<? 
            if(isset($_POST['sh_pincode'])) { 
                echo $_POST['sh_pincode']; 
                }else { 
                    echo $row['sh_pincode'];
                    } ?>" required>
            </span> 
            <div class="clear"></div>
        </div>

        <div class="row" id="ltitle">
        <span class="label">Postal Addrass <span class="red">*</span></span>
            <span class="item">
            <input name="emergency_postadd" id="emergency_postadd" type="text"
             value="<? 
            if(isset($_POST['emergency_postadd'])) { 
                echo $_POST['emergency_postadd']; 
                }else { 
                    echo $row['emergency_postadd'];
                    } ?>" required>
            </span> 
            <div class="clear"></div>
        </div>
        <div class="row" id="ltitle">
        <span class="label">Google Location </span>
            <span class="item">
            <input name="sh_gloction" id="sh_gloction" type="text"
             value="<? 
            if(isset($_POST['sh_gloction'])) { 
                echo $_POST['sh_gloction']; 
                }else { 
                    echo $row['sh_gloction'];
                    } ?>" >
            </span> 
            <div class="clear"></div>
        </div>
     
      <div class="row"> <span class="label">&nbsp;</span>
        <input name="" type="submit" value="Submit" class="button-green">
        <input name="reset" type="reset" value="Cancel" class="button-orange ml10" onClick="history.back()">
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </form>
  </div>
 
  