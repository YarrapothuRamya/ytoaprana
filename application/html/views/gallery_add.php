<div class="tablecontent">
 <?  if(!empty($pg) && $pg==='add') { ?>
	<div class="box addeditform">
    <h3 class="title">Add <?=$page_name3;?>
      <span class="fr">
      <!--<button class="button-blue" onClick="window.location.href='photos'"><i class="fa fa-th-list fa-lg"></i> Manage <? //=$page_name3;?>s</button>-->
      <button class="button-blue" onClick="window.location.href='<?=$type;?>&status=1'"><i class="fa fa-th-list fa-lg"></i> Manage
      <?=$page_name3;?></button>
      </span> </h3>
    </div>
	 <div class="box addeditform">
    <form action="" method="post" name="" id="" enctype="multipart/form-data">
       <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="50%"><div id="basic_details"> 
            <? if(!empty($_GET['type']) && $_GET['type']==='Photo_Gallery'){?>
            <input type="hidden" name="cat_id" id="cat_id" value="1">
            <? } else if(!empty($_GET['type']) && $_GET['type']==='News-Articles'){ ?> 
             <input type="hidden" name="cat_id" id="cat_id" value="2">
              <? } ?>     
          	
            <div class="row">
            <span class="label">Category <span class="red">*</span></span>
            <span class="item">
            <select name="va_pcatid" id="va_pcatid" class="sel_ls" placeholder="" style="width: 310px" required>
            <option value="">Select Category</option>
                <?php
                    dropdown('ytoa_gallery_cat', 'gal_catid,gal_catname', 'gal_status=1 order by gal_catid DESC', @$row['va_pcatid']);
                ?>
            </select>
            </span>
          <div class="clear"></div>
          </div>
             
          <div class="row">
         	  <span class="label">AlT Tag &amp; Image <span class="red">*</span></span>          
              <span class="item">
			    <input type="hidden" name="va_path" value="<? if(!empty($_GET['id'])){ echo $row["va_path"];}?>">
		  <div class="input_fields_wrap">
          <div><input type="text" name="va_title[]"  value="<? if(!empty($_GET['id'])) echo $row['va_title'];?>" placeholder="" required> 
		  <input class="files" name="user_files[]" type="file" 
		  <? if(empty($_GET['id'])){?>  required <? }?> ><? if(!empty($_GET['id'])){?><a href="<?=$img_path?>" target="_blank">
		  <img src="<?=$site_url.RNSIM?>view.png" width="16" height="16" border="0" alt="Click to View Image" title="Click to View Image"  align="absmiddle"/></a> 
		  <? }else{ ?><button type="button" class="button-blue rns-add" id="subClone" title="Add New"><i class="fa fa-plus fa-lg"></i></button><? }?> 
		   <span id="p1" class="red"></span>
           </div>
          </div>
            <span class="red"><?="<br>Max Size (1MB): ".$usize.", Type: ".$ft_img;?></span></span>     
          </div>
          <div class="clear"></div>
          <!--<div class="row" id="ltitle"><span class="label">Keywords</span>
            <span class="item">
            <textarea name="va_keywords" id="va_keywords" value="<? // if(!empty($_GET['id'])) echo $row['va_keywords'];?>" ><? // if(!empty($_GET['id'])) echo $row['va_keywords'];?></textarea>
            </span>
            <div class="clear"></div>
        </div>-->
          
          </div></td>
         </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table> 
      <div class="row">
        <span class="label">&nbsp;</span>
           <input type="submit" value="<? if(!empty($getid)) { echo "Edit"; } else { echo "Add"; } ?> Photo" class="button-green">
           <input name="reset" type="reset" value="Cancel" class="button-orange ml10" onClick="history.back()">
        <div class="clear"></div>
    </div>
    </form>
    </div>
    <? } ?>
	</div>