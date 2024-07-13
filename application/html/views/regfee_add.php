<div class="tablecontent">
  <?  // if(!empty($pg) && $pg==='add') { ?>
  <div class="box addeditform">
    <h3 class="title">Add
      <?=$page_name3;?>
      <span class="fr">
      <button class="button-blue" onClick="window.location.href='regfee'"><i class="fa fa-th-list fa-lg"></i> Manage
      <?=$page_name3;?></button>
      </span> </h3>
  </div>
  <div class="box addeditform">
    <form action="" method="post" name="items" id="items" enctype="multipart/form-data">
   
     <div class="row">
            <span class="label">Reg Category <span class="red">*</span></span>
            <span class="item">
            <select name="regfee_catid" id="regfee_catid" class="sel_rls" placeholder="" style="width: 310px" required>
            <option value="">Select Reg Category</option>
                <?php
                    dropdown('bi_regcat', 'regcat_id,regcat_name', 'regcat_status=1 order by regcat_name', @$row['regfee_catid']); 
                ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>
		  
		  <div class="row">
            <span class="label">Reg Sub-Category <span class="red">*</span></span>
            <span class="item">
            <select name="regfee_subc_id" id="regfee_subc_id" class="sel_rls" placeholder="" style="width: 310px" required>
            <option value="">Select Reg Sub-Category</option>
                <?php
                  dropdown('bi_regsub_cat', 'regsubc_id,regsubc_name', 'regsubc_status=1 '.$cat_qur.' order by regsubc_name', @$row['regfee_subc_id']); 
                ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>
		  
		  <div class="row" id="ltitle">
            <span class="label">Reg Amount<span class="red">*</span></span>
            <span class="item">
        <input name="regfee_amount" id="regfee_amount" type="text" value="<? if(isset($_POST['regfee_amount'])) echo $_POST['regfee_amount']; else if(!empty($_GET['id'])) echo $row['regfee_amount'];?>" required></span>
            <div class="clear"></div>
        </div>
	 
	<div class="row" id="ltitle">
            <span class="label">Reg From Date<span class="red">*</span></span>
            <span class="item">
        <input name="regfee_fromdt" id="regfee_fromdt" type="date" value="<? if(isset($_POST['regfee_fromdt'])) echo $_POST['regfee_fromdt']; else if(!empty($_GET['id'])) echo $row['regfee_fromdt'];?>" required></span>
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
  <?  // }?>