<div class="tablecontent">
  <?  // if(!empty($pg) && $pg==='add') { ?>
  <div class="box addeditform">
    <h3 class="title">Add
      <?=$page_name3;?>
      <span class="fr">
      <button class="button-blue" onClick="window.location.href='items'"><i class="fa fa-th-list fa-lg"></i> Manage
      <?=$page_name3;?></button>
      </span> </h3>
  </div>
  <div class="box addeditform">
    <form action="" method="post" name="items" id="items" enctype="multipart/form-data">
   
     <div class="row">
            <span class="label">Category <span class="red">*</span></span>
            <span class="item">
            <select name="itm_catid" id="itm_catid" class="sel_ls" placeholder="" style="width: 310px" required>
            <option value="">Select Category</option>
                <?php
                    dropdown('bi_pcategory', 'pcat_id,pcat_name', 'pcat_status=1 order by pcat_name', @$row['itm_catid']);
                ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>
		  
		  <div class="row">
            <span class="label">Sub-Category <span class="red">*</span></span>
            <span class="item">
            <select name="itm_subcatid" id="itm_subcatid" class="sel_ls" placeholder="" style="width: 310px" required>
            <option value="">Select Sub-Category</option>
                <?php
                  if(!empty($_GET['id'])) { dropdown('bi_psub_category', 'psubc_id,psubc_name', 'psubc_status=1 '.$cat_qur.' order by psubc_name', @$row['itm_subcatid']); }
                ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>
		  
		  <div class="row" id="ltitle">
            <span class="label">Item HSN Code / No <span class="red">*</span></span>
            <span class="item">
        <input name="itm_code" id="itm_code" type="text" value="<? if(isset($_POST['itm_code'])) echo $_POST['itm_code']; else if(!empty($_GET['id'])) echo $row['itm_code'];?>" required></span>
            <div class="clear"></div>
        </div>
	 <?php /*
	<div class="row" id="ltitle">
            <span class="label">Item Name <span class="red">*</span></span>
            <span class="item">
        <input name="itm_name" id="itm_name" type="text" value="<? if(isset($_POST['itm_name'])) echo $_POST['itm_name']; else if(!empty($_GET['id'])) echo $row['itm_name'];?>" required></span>
            <div class="clear"></div>
        </div>
		*/ ?>
		
		
          <div class="row">
         	  <span class="label">Item &amp; Image <span class="red">*</span></span>          
              <span class="item">
			    <input type="hidden" name="itm_path" value="<? if(!empty($_GET['id'])){ echo $row["itm_path"];}?>">
		  <div class="input_fields_wrap">
          <div><input type="text" name="itm_name[]"  value="<? if(!empty($_GET['id'])) echo $row['itm_name'];?>" placeholder="" required> <input class="files" name="user_files[]" type="file" <? if(empty($_GET['id'])){?>  required <? }?> ><? if(!empty($_GET['id'])){?><a href="<?=$img_path?>" target="_blank"><img src="<?=$site_url.RNSIM?>view.png" width="16" height="16" border="0" alt="Click to View Image" title="Click to View Image"  align="absmiddle"/></a> <? }else{ ?><button type="button" class="button-blue rns-add" id="subClone" title="Add New"><i class="fa fa-plus fa-lg"></i></button><? }?> 
		   <span id="p1" class="red"></span>
           </div>
          </div>
            <span class="red"><?="<br>Max Size (1MB): ".$usize.", Type: ".$ft_img;?></span></span>     
          </div>
          <div class="clear"></div>
	  
      <div class="row"> <span class="label">&nbsp;</span>
        <input name="" type="submit" value="Submit" class="button-green">
        <input name="reset" type="reset" value="Cancel" class="button-orange ml10" onClick="history.back()">
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </form>
  </div>
  <?  // }?>