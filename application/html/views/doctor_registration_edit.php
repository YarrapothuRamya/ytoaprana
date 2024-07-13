<div class="tablecontent">
  <?  // if(!empty($pg) && $pg==='add') { ?>
  <div class="box addeditform">
    <h3 class="title">ADD
      <?=$page_name3;?>
      <span class="fr">
      <button class="button-blue" onClick="window.location.href='doctor_registration'"><i class="fa fa-th-list fa-lg"></i> Manage
      <?=$page_name3;?>s</button>
      </span> </h3>
  </div>
  <div class="box addeditform">
    <form action="" method="post" name="doc_reg_edit" id="doc_reg_edit" enctype="multipart/form-data">
           
        <div class="row" id="ltitle">
            <span class="label">Name of the Doctor<span class="red"> *</span></span>
            <span class="item">
            <?php  echo $doc_data['doc_name'];?></span>
            <div class="clear"></div>
        </div>
        
        <div class="row" id="ltitle">
            <span class="label">Registration Number<span class="red"> *</span></span>
            <span class="item">
            <?php  echo $doc_data['doc_refno'];?></span>
            <div class="clear"></div>
        </div>
        
        <div class="row" id="ltitle">
            <span class="label">Mobile Number<span class="red"> *</span></span>
            <span class="item">
            <?php  echo $doc_data['doc_mobile'];?></span>
            <div class="clear"></div>
        </div>
        <div class="row" id="ltitle">
        <span class="label">Hospital / Clinic Name <span class="red">*</span></span>
            <span class="item">
            <input name="doc_hosname" id="doc_hosname" Type="text" 
             value="<? 
            if(isset($_POST['doc_hosname'])) { 
                echo $_POST['doc_hosname']; 
                }else { 
                    echo $row['doc_hosname'];
                    } ?>" required >
            </span> 
            <div class="clear"></div>
        </div>
        <div class="row" id="ltitle">
        <span class="label">Aadhar No <span class="red">*</span></span>
            <span class="item">
            <input name="doc_aadhaar" id="doc_aadhaar" type="text" minlength="12" maxlength="12" 
            onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 43"
             value="<? 
            if(isset($_POST['doc_aadhaar'])) { 
                echo $_POST['doc_aadhaar']; 
                }else { 
                    echo $row['doc_aadhaar'];
                    } ?>" required>
            </span> 
            <div class="clear"></div>
            </div>
        <div class="row" id="ltitle">
        <span class="label">GST No </span>
            <span class="item">
            <input name="doc_gst" id="doc_gst" type="text" minlength="15"  maxlength="15" 
             value="<? 
            if(isset($_POST['doc_gst'])) { 
                echo $_POST['doc_gst']; 
                }else { 
                    echo $row['doc_gst'];
                    } ?>" >
            </span> 
            <div class="clear"></div>
        </div>
        <div class="row" id="ltitle">
        <span class="label">PAN CARD <span class="red"></span></span>
            <span class="item">
            <input name="doc_pan" id="doc_pan" type="text"
             value="<? 
            if(isset($_POST['doc_pan'])) { 
                echo $_POST['doc_pan']; 
                }else { 
                    echo $row['doc_pan'];
                    } ?>">
            </span> 
            <div class="clear"></div>
        </div>

        <div class="row" id="ltitle">
        <span class="label">EMAIL ID <span class="red"></span></span>
            <span class="item">
            <input name="doc_email" id="doc_email" type="text"
             value="<? 
            if(isset($_POST['doc_email'])) { 
                echo $_POST['doc_email']; 
                }else { 
                    echo $row['doc_email'];
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
            <input name="doc_postadd" id="doc_postadd" type="text"
             value="<? 
            if(isset($_POST['doc_postadd'])) { 
                echo $_POST['doc_postadd']; 
                }else { 
                    echo $row['doc_postadd'];
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
 
  