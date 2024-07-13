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
         	    <span class="label">Name <span class="red">*</span></span>
                <span class="item"><input name="sup_fname" id="sup_fname" type="text" value="<? if(!empty($_GET['id'])) echo $row['sup_fname'];?>" required></span>
                <div class="clear"></div>
          </div>
          <div class="row">
         	   <span class="label">User Name<span class="red">&nbsp;*</span></span>
               <span class="item">
               <input name="sup_username" id="sup_username" type="text" value="<? if(!empty($_GET['id'])) echo $row['sup_username'];?>" required></span>
               <div class="clear"></div>
          </div>
          <div class="row">
         	   <span class="label">Password<span class="red">&nbsp;*</span></span>
               <span class="item">
               <input name="sup_password" id="sup_password" type="password" value="<? if(!empty($_GET['id'])) echo rnsb64ende($row['sup_password'],1);?>" required></span>
               <div class="clear"></div>
          </div>
          <div class="row">
         	   <span class="label">E-Mail Address&nbsp;<span class="red">*</span></span>
               <span class="item">
               <input name="sup_email" id="sup_email" type="text" value="<? if(!empty($_GET['id'])) echo $row['sup_email'];?>" required></span>
               <div class="clear"></div>
          </div>
          <div class="row">
         	   <span class="label">Mobile Number&nbsp;<span class="red">*</span></span>
               <span class="item">
               <input name="sup_phone" id="sup_phone" type="text" maxlength="15" value="<? if(!empty($_GET['id'])) echo $row['sup_phone'];?>" required>&nbsp;<span id="mob"></span></span>
               <div class="clear"></div>
          </div>
          
          <div class="row">
            <span class="label">Reg Category <span class="red">*</span></span>
            <span class="item">
            <select name="sup_cat_idfk" id="sup_cat_idfk" class="sel_ls_rgcat" placeholder="" style="width: 310px" required>
            <option value="">Select Reg Category</option>
                <?php
                    dropdown('bi_regcat', 'regcat_id,regcat_name', 'regcat_status=1 order by regcat_name', @$row['sup_cat_idfk']);
                ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>
          
          <div class="row">
            <span class="label">Reg Sub Category <span class="red">*</span></span>
            <span class="item">
            <select name="sup_sub_catidfk" id="sup_sub_catidfk" class="sel_ls_rgcat" placeholder="" style="width: 310px" required>
            <option value="">Select Reg Sub Category</option>
                <?php
                  if(!empty($_GET['id'])) { dropdown('bi_regsub_cat', 'regsubc_id,regsubc_name', 'regsubc_status=1 '.$district_qur.' order by regsubc_name', @$row['sup_sub_catidfk']); }
                ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>
          
       <div class="row">
         	  <span class="label">Avatar<span class="red"></span></span>          
              <span class="item">
                 <input name="file_up" id="file_up" type="file" />
				  <? if(!empty($_GET['id']) && !empty($row['sup_avatar'])) { ?>
                  <a href="view_uploads?v=emp&id=<?=$row['sup_id'];?>" class="ajax tooltip" title="Preview"><img src="<?=$site_url.RNSIM?>view.png" width="16" height="16" border="0" alt="Click to View Image" title="Click to View Image"  align="absmiddle"/></a>
                  <div id="rnsphoto" style="display:none"><img src="<?=BASEURLF.RNSUP."sup_photos/".$row['sup_avatar']?>" border="0" /></div>
                  <input type="hidden" name="oldfile" id="oldfile" value="<?="sup_photos/".$row['sup_avatar'];?>">
                  <? } ?>
                  <span class="red">
                    <?="<br>Max Size (1MB): ".$usize.", Type: ".$ft_img;?>
              </span></span>
          <div class="clear"></div>
          </div>
          
          <div class="row">
               <span class="label">Date of Birth&nbsp;<span class="red">*</span></span><span class="item">
                   <input name="sup_dob" type="text" class="dob dateinput" id="sup_dob" style="width:110px;" value="<? if(isset($_POST['addate'])){ echo date('d-m-Y'); } 
                   else if(!empty($_GET['id'])){echo date('d-m-Y', strtotime($row['sup_dob']));}else{ echo ""; }?>" size="30" 
                   maxlength="10" required>
               </span>
               <div class="clear"></div>
          </div>
          <div class="row">
              <span class="label">Gender&nbsp;<span class="red">*</span></span>
              <span class="item">
              <input type="radio" name="sup_gender" id="male" value="Male" <?=($gender == 'Male') ? 'checked="checked"' : '';?> checked/>&nbsp;&nbsp;Male&nbsp;&nbsp;</span>
              <span class="item"><input type="radio" name="sup_gender" id="female" value="Female" <?=($gender == 'Female') ? 'checked="checked"' : '';?>/>&nbsp;&nbsp;Female&nbsp;&nbsp;</span>
              <div class="clear"></div>
          </div>
          <div class="row">
                <span class="label">User Type</span>
                <span class="item">
                <select name="sup_type" id="sup_type" placeholder="User Type" style="width: 310px" required>
                    <?  unset($get_emptype[4]);rns_drop_foreach_mul($get_emptype,$sup_type,"User Type"); ?>
                </select>
                </span>
          <div class="clear"></div>
          </div>                    
          </div>
          </td>
         </tr>
          <tr>
            <td colspan="3" align="left">
            <div id="sup_pri_div" <? if($sup_type!=3){?>style="display:none;"<? } ?>>
            <div class="row">
              <span class="label" style="width: 12%;">Previliges</span>
              <span class="item">
                <table width="100%" border="1" align="left" cellpadding="5" cellspacing="5">
                    <tr>
                    <td align="left" valign="top">
                     <table cellpadding="5" cellspacing="5">
                       <tr>
                         <td colspan="2" nowrap="nowrap"><strong>Website</strong></td>
                         </tr>
                       <tr>
                         <td><input type="checkbox" name="privileges[]" id="CMS_STS_ADD" value="CMS_STS_ADD" <? if(in_array("CMS_STS_ADD", $erow_array)){ echo 'checked';}?>></td>
                         <td>Add States </td>
                       </tr>
                       <tr>
                         <td><input type="checkbox" name="privileges[]" id="CMS_STS" value="CMS_STS" <? if(in_array("CMS_STS", $erow_array)){ echo 'checked';}?>></td>
                         <td>Manage States</td>
                       </tr>
                       <tr>
                         <td><input type="checkbox" name="privileges[]" id="CMS_DTS_ADD" value="CMS_DTS_ADD" <? if(in_array("CMS_DTS_ADD", $erow_array)){ echo 'checked';}?> /></td>
                         <td>Add Districts</td>
                       </tr>
                       <tr>
                         <td><input type="checkbox" name="privileges[]" id="CMS_DTS" value="CMS_DTS" <? if(in_array("CMS_DTS", $erow_array)){ echo 'checked';}?> /></td>
                         <td>Manage Districts</td>
                       </tr>
                       <tr>
                        <td><input type="checkbox" name="privileges[]" id="CMS_MDS_ADD" value="CMS_MDS_ADD" <? if(in_array("CMS_MDS_ADD", $erow_array)){ echo 'checked';}?> /></td>
                         <td>Add Mandals</td>
                       </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="CMS_MDS" value="CMS_MDS" <? if(in_array("CMS_MDS", $erow_array)){ echo 'checked';}?> /></td>
                         <td>Manage Mandals</td>
                       </tr>
                        <tr>
                        <td><input type="checkbox" name="privileges[]" id="CMS_LOC_ADD" value="CMS_LOC_ADD" <? if(in_array("CMS_LOC_ADD", $erow_array)){ echo 'checked';}?> /></td>
                         <td>Add Village</td>
                       </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="CMS_LOC" value="CMS_LOC" <? if(in_array("CMS_LOC", $erow_array)){ echo 'checked';}?> /></td>
                         <td>Manage Villages</td>
                       </tr>
                        <tr>
                        <td><input type="checkbox" name="privileges[]" id="CMS_GALL" value="CMS_GALL" <? if(in_array("CMS_GALL", $erow_array)){ echo 'checked';}?> /></td>
                         <td>Add Gallery</td>
                       </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="CMS_PAYM_ADD" value="CMS_PAYM_ADD" <? if(in_array("CMS_PAYM_ADD", $erow_array)){ echo 'checked';}?> /></td>
                         <td>Add Payment Modes</td>
                       </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="CMS_PAYM" value="CMS_PAYM" <? if(in_array("CMS_PAYM", $erow_array)){ echo 'checked';}?> /></td>
                         <td>Manage Payment Modes</td>
                       </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="CMS_GST_ADD" value="CMS_GST_ADD" <? if(in_array("CMS_GST_ADD", $erow_array)){ echo 'checked';}?> /></td>
                         <td>Add GST Modes</td>
                       </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="CMS_GST" value="CMS_GST" <? if(in_array("CMS_GST", $erow_array)){ echo 'checked';}?> /></td>
                         <td>Manage GST Modes</td>
                       </tr>
                       
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="CMS_CONTACT" value="CMS_CONTACT" <? if(in_array("CMS_CONTACT", $erow_array)){ echo 'checked';}?> /></td>
                         <td>Contact Us</td>
                       </tr>
                     </table>    
					
                    
                        <table cellpadding="5" cellspacing="5">
                        <tr>
                          <td colspan="2" nowrap="nowrap"><strong>Reports</strong></td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="EMP_REP_ADD" value="EMP_REP_ADD" <? if(in_array("EMP_REP_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add Staff Reports</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="EMP_REP_MNG" value="EMP_REP_MNG" <? if(in_array("EMP_REP_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td> Manage Staff Reports</td>
                        </tr>
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="EMP_REP_MIT_ADD" value="EMP_REP_MIT_ADD" <? if(in_array("EMP_REP_MIT_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add Mitra Reports</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="EMP_REP_MIT_MNG" value="EMP_REP_MIT_MNG" <? if(in_array("EMP_REP_MIT_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td> Manage Mitra Reports</td>
                        </tr>
                        
                      </table>   
                    
                    
                     <table cellpadding="5" cellspacing="5">
                        <tr>
                          <td colspan="2" nowrap="nowrap"><strong>Product</strong></td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="SH_CAT_ADD" value="SH_CAT_ADD" <? if(in_array("SH_CAT_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add Category</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="SH_CAT" value="SH_CAT" <? if(in_array("SH_CAT", $erow_array)){ echo 'checked';}?> /></td>
                          <td> Manage Categories</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="SH_SCAT_ADD" value="SH_SCAT_ADD" <? if(in_array("SH_SCAT_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Add Sub Category</td>
                        </tr>
						<tr>
                          <td><input type="checkbox" name="privileges[]" id="SH_SCAT" value="SH_SCAT" <? if(in_array("SH_SCAT", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Manage Sub Categories</td>
                        </tr>
						<tr>
                          <td><input type="checkbox" name="privileges[]" id="SH_ITM_ADD" value="SH_ITM_ADD" <? if(in_array("SH_ITM_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Add Items</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="SH_ITM" value="SH_ITM" <? if(in_array("SH_ITM", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Manage Items</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="SH_SUB_ITM_ADD" value="SH_SUB_ITM_ADD" <? if(in_array("SH_SUB_ITM_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Add Sub Items</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="SH_SUB_ITM" value="SH_SUB_ITM" <? if(in_array("SH_SUB_ITM", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Manage Sub Items</td>
                        </tr>
                        
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="SH_UNITS_ADD" value="SH_UNITS_ADD" <? if(in_array("SH_UNITS_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Add Units</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="SH_UNITS" value="SH_UNITS" <? if(in_array("SH_UNITS", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Manage Units</td>
                        </tr>
                        
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="SH_SUNITS_ADD" value="SH_SUNITS_ADD" <? if(in_array("SH_SUNITS_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Add Sub Units</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="SH_SUB_UNITS" value="SH_SUB_UNITS" <? if(in_array("SH_SUB_UNITS", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Manage Sub Units</td>
                        </tr>
                        
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="INV_ITMS_ADD" value="INV_ITMS_ADD" <? if(in_array("INV_ITMS_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Add Inventory Items</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="INV_ITMS" value="INV_ITMS" <? if(in_array("INV_ITMS", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Manage Inventory Items</td>
                        </tr>
                      </table>                    
                      
                       <table cellpadding="5" cellspacing="5">
                        <tr>
                          <td colspan="2" nowrap="nowrap"><strong>Registrations</strong></td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="ADD_REGCAT" value="ADD_REGCAT" <? if(in_array("ADD_REGCAT", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add Reg Categories</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="MNG_REGCAT" value="MNG_REGCAT" <? if(in_array("MNG_REGCAT", $erow_array)){ echo 'checked';}?> /></td>
                          <td> Manage Reg Categories</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="ADD_REGSUBCAT" value="ADD_REGSUBCAT" <? if(in_array("ADD_REGSUBCAT", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Add Sub Category</td>
                        </tr>
						<tr>
                          <td><input type="checkbox" name="privileges[]" id="MNG_REGSUBCAT" value="MNG_REGSUBCAT" <? if(in_array("MNG_REGSUBCAT", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Manage Sub Categories</td>
                        </tr>
						<tr>
                          <td><input type="checkbox" name="privileges[]" id="ADD_REGFEE" value="ADD_REGFEE" <? if(in_array("ADD_REGFEE", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Add Items</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="MNG_REGFEE" value="MNG_REGFEE" <? if(in_array("MNG_REGFEE", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Manage Items</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="ADD_DLOFF" value="ADD_DLOFF" <? if(in_array("ADD_DLOFF", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Add Deals</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="MNG_DLOFF" value="MNG_DLOFF" <? if(in_array("MNG_DLOFF", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Manage Deals</td>
                        </tr>
                      </table>
                       </td>
                    <td align="left" valign="top"><table cellpadding="5" cellspacing="5">
                        <tr>
                          <td colspan="2" nowrap="nowrap"><strong>Manufacturers</strong></td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="FPO_REG_MNG" value="FPO_REG_MNG" <? if(in_array("FPO_REG_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage FPO Registration</td>
                        </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="FPO_REG_ADD" value="FPO_REG_ADD" <? if(in_array("FPO_REG_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add FPO Registration</td>
                        </tr>
                        
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="FPO_PAY_MNG" value="FPO_PAY_MNG" <? if(in_array("FPO_PAY_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage FPO Payments</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="FPO_PAY_ADD" value="FPO_PAY_ADD" <? if(in_array("FPO_PAY_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add FPO Payments</td>
                        </tr>
                        
                        
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="SHG_REG_MNG" value="SHG_REG_MNG" <? if(in_array("SHG_REG_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage SHG Registration</td>
                        </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="SHG_PAY_ADD" value="SHG_PAY_ADD" <? if(in_array("SHG_PAY_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add SHG Payments</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="SHG_PAY_MNG" value="SHG_PAY_MNG" <? if(in_array("SHG_PAY_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage SHG Payments</td>
                        </tr>
                        
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BPS_REG_MNG" value="BPS_REG_MNG" <? if(in_array("BPS_REG_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BPS Registration</td>
                        </tr>
                      
                          <tr>
                          <td><input type="checkbox" name="privileges[]" id="BPS_QUOTATIONS_ADD" value="BPS_QUOTATIONS_ADD" <? if(in_array("BPS_QUOTATIONS_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BPS Quotations</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BPS_QUOTATIONS" value="BPS_QUOTATIONS" <? if(in_array("BPS_QUOTATIONS", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BPS Quotations</td>
                        </tr>
                      
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="BPS_PAY_ADD" value="BPS_PAY_ADD" <? if(in_array("BPS_PAY_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BPS Payments</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BPS_PAY_MNG" value="BPS_PAY_MNG" <? if(in_array("BPS_PAY_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BPS Payments</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BPS_PROD_ADD" value="BPS_PROD_ADD" <? if(in_array("BPS_PROD_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BPS Products</td>
                        </tr>
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="BPS_PROD_MNG" value="BPS_PROD_MNG" <? if(in_array("BPS_PROD_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BPS Products</td>
                        </tr>
                      
                      </table>
                      <table cellpadding="5" cellspacing="5">
                        <tr>
                          <td colspan="2" nowrap="nowrap"><strong>Vendors / Stores</strong></td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BNS_REG_MNG" value="BNS_REG_MNG" <? if(in_array("BNS_REG_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BNS Registration</td>
                        </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="BNS_PAY_ADD" value="BNS_PAY_ADD" <? if(in_array("BNS_PAY_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BNS Payments</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BNS_PAY_MNG" value="BNS_PAY_MNG" <? if(in_array("BNS_PAY_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BNS Payments</td>
                        </tr>
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="BNS_PROD_ADD" value="BNS_PROD_ADD" <? if(in_array("BNS_PROD_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BNS Products</td>
                        </tr>
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="BNS_PROD_MNG" value="BNS_PROD_MNG" <? if(in_array("BNS_PROD_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BNS Products</td>
                        </tr>
                        
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="BIBAD_REG_ADD" value="BIBAD_REG_ADD" <? if(in_array("BIBAD_REG_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BIBAD Registration</td>
                        </tr>
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="BIBAD_REG_MNG" value="BIBAD_REG_MNG" <? if(in_array("BIBAD_REG_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BIBAD Registration</td>
                        </tr>
                        
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BIBAD_PAY_ADD" value="BIBAD_PAY_ADD" <? if(in_array("BIBAD_PAY_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BIBAD Payments</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BIBAD_PAY_MNG" value="BIBAD_PAY_MNG" <? if(in_array("BIBAD_PAY_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BIBAD Payments</td>
                        </tr>
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="BIBAD_PROD_ADD" value="BIBAD_PROD_ADD" <? if(in_array("BIBAD_PROD_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BIBAD Products</td>
                        </tr>
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="BIBAD_PROD_MNG" value="BIBAD_PROD_MNG" <? if(in_array("BIBAD_PROD_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BIBAD Products</td>
                        </tr>
                        
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BSHGS_REG_MNG" value="BSHGS_REG_MNG" <? if(in_array("BSHGS_REG_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BSHGS Registration</td>
                        </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="BSHGS_PAY_ADD" value="BSHGS_PAY_ADD" <? if(in_array("BSHGS_PAY_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BSHGS Payments</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BSHGS_PAY_MNG" value="BSHGS_PAY_MNG" <? if(in_array("BSHGS_PAY_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BSHGS Payments</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BSHGS_PROD_ADD" value="BSHGS_PROD_ADD" <? if(in_array("BSHGS_PROD_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BSHGS Products</td>
                        </tr>
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="BSHGS_PROD_MNG" value="BSHGS_PROD_MNG" <? if(in_array("BSHGS_PROD_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BSHGS Products</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BSM_REG_MNG" value="BSM_REG_MNG" <? if(in_array("BSM_REG_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BSM Registration</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BSM_PROD_ADD" value="BSM_PROD_ADD" <? if(in_array("BSM_PROD_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BSM Products</td>
                        </tr>
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="BSM_PROD_MNG" value="BSM_PROD_MNG" <? if(in_array("BSM_PROD_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BSM Products</td>
                        </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="BSM_PAY_ADD" value="BSM_PAY_ADD" <? if(in_array("BSM_PAY_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BSM Payments</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BSM_PAY_MNG" value="BSM_PAY_MNG" <? if(in_array("BSM_PAY_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BSM Payments</td>
                        </tr>
                        
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BMM_REG_MNG" value="BMM_REG_MNG" <? if(in_array("BMM_REG_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BMM Registration</td>
                        </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="BMM_PAY_ADD" value="BMM_PAY_ADD" <? if(in_array("BMM_PAY_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BMM Payments</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BMM_PAY_MNG" value="BMM_PAY_MNG" <? if(in_array("BMM_PAY_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BMM Payments</td>
                        </tr>
                        
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BOL_REG_MNG" value="BOL_REG_MNG" <? if(in_array("BOL_REG_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BOL Registration</td>
                        </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="BOL_PAY_ADD" value="BOL_PAY_ADD" <? if(in_array("BOL_PAY_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BOL Payments</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BOL_PAY_MNG" value="BOL_PAY_MNG" <? if(in_array("BOL_PAY_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BOL Payments</td>
                        </tr>
                        
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="BES_REG_MNG" value="BES_REG_MNG" <? if(in_array("BES_REG_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BES Registration</td>
                        </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="BES_PAY_ADD" value="BES_PAY_ADD" <? if(in_array("BES_PAY_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BES Payments</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BES_PAY_MNG" value="BES_PAY_MNG" <? if(in_array("BES_PAY_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BES Payments</td>
                        </tr>
                        
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="BKOW_REG_MNG" value="BKOW_REG_MNG" <? if(in_array("BKOW_REG_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BKOW Registration</td>
                        </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="BKOW_PAY_ADD" value="BKOW_PAY_ADD" <? if(in_array("BKOW_PAY_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BKOW Payments</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BKOW_PAY_MNG" value="BKOW_PAY_MNG" <? if(in_array("BKOW_PAY_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BKOW Payments</td>
                        </tr>
                      </table></td>
                    <td align="left" valign="top">
                      <table cellpadding="5" cellspacing="5">
                        <tr>
                          <td colspan="2" nowrap="nowrap"><strong>Consumers</strong></td>
                        </tr>
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="BIBA_REG_MNG" value="BIBA_REG_MNG" <? if(in_array("BIBA_REG_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BIBA Registration</td>
                        </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="BIBA_PAY_ADD" value="BIBA_PAY_ADD" <? if(in_array("BIBA_PAY_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add BIBA Payments</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BIBA_PAY_MNG" value="BIBA_PAY_MNG" <? if(in_array("BIBA_PAY_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage BIBA Payments</td>
                        </tr>
                          <tr>
                          <td><input type="checkbox" name="privileges[]" id="BIBA_DEALS_ADD" value="BIBA_DEALS_ADD" <? if(in_array("BIBA_DEALS_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add Deals</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="BIBA_DEALS_MNG" value="BIBA_DEALS_MNG" <? if(in_array("BIBA_DEALS_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage Deals</td>
                        </tr>
                        
                        
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="SHGM_REG_MNG" value="SHGM_REG_MNG" <? if(in_array("SHGM_REG_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage SHGM Registration</td>
                        </tr>
                        
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="NRV_REG_MNG" value="NRV_REG_MNG" <? if(in_array("NRV_REG_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage NRV Registration</td>
                        </tr>
                       <tr>
                          <td><input type="checkbox" name="privileges[]" id="NRV_PAY_ADD" value="NRV_PAY_ADD" <? if(in_array("NRV_PAY_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add NRV Payments</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="NRV_PAY_MNG" value="NRV_PAY_MNG" <? if(in_array("NRV_PAY_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Manage NRV Payments</td>
                        </tr>
                      </table>
                      
                      <table cellpadding="5" cellspacing="5">
                        <tr>
                          <td colspan="2" nowrap="nowrap"><strong>FAQs</strong></td>
                        </tr>
                         <tr>
                          <td><input type="checkbox" name="privileges[]" id="FAQ_CAT_ADD" value="FAQ_CAT_ADD" <? if(in_array("FAQ_CAT_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td nowrap="nowrap">Add FAQ Category</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="FAQ_CAT" value="FAQ_CAT" <? if(in_array("FAQ_CAT", $erow_array)){ echo 'checked';}?> /></td>
                          <td> Manage FAQ Categories</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="FAQ_SCAT_ADD" value="FAQ_SCAT_ADD" <? if(in_array("FAQ_SCAT_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Add FAQ Sub Category</td>
                        </tr>
						<tr>
                          <td><input type="checkbox" name="privileges[]" id="FAQ_SCAT" value="FAQ_SCAT" <? if(in_array("FAQ_SCAT", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Manage FAQ Sub Categories</td>
                        </tr>
						<tr>
                          <td><input type="checkbox" name="privileges[]" id="FAQ_ADD" value="FAQ_ADD" <? if(in_array("FAQ_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Add FAQ</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="FAQ_MNG" value="FAQ_MNG" <? if(in_array("FAQ_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Manage FAQs</td>
                        </tr>
                      </table>
                     
                     <table cellpadding="5" cellspacing="5">
                        <tr>
                          <td colspan="2" nowrap="nowrap"><strong>Stock Point</strong></td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="STK_REG_MNG" value="STK_REG_MNG" <? if(in_array("STK_REG_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Manage Registration</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="STK_REG_ADD" value="STK_REG_ADD" <? if(in_array("STK_REG_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td>New Registration</td>
                        </tr>
                      </table>
                     
                      <table cellpadding="5" cellspacing="5">
                        <tr>
                          <td colspan="2" nowrap="nowrap"><strong>Users Management</strong></td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="ADM_ADD" value="ADM_ADD" <? if(in_array("ADM_ADD", $erow_array)){ echo 'checked';}?> /></td>
                          <td>New User</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="privileges[]" id="ADM_MNG" value="ADM_MNG" <? if(in_array("ADM_MNG", $erow_array)){ echo 'checked';}?> /></td>
                          <td>Manage Users</td>
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