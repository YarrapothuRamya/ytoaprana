<div class="tablecontent">
  <?  if(!empty($pg) && $pg==='add') { ?>
  <div class="box addeditform">
    <h3 class="title">Add
      <?=$page_name3;?>
      <span class="fr">
      <button class="button-blue" onClick="window.location.href='<?=$type;?>&status=1'"><i class="fa fa-th-list fa-lg"></i> Manage
      <?=$page_name3;?></button>
      </span> </h3>
  </div>
  <div class="box addeditform">
    <form action="" method="post" name="predictions" id="predictions" enctype="multipart/form-data">
   <!-- <div class="row">
            <span class="label">Type <span class="red">*</span></span>
            <span class="item">
            <select name="vap_parent_id" id="vap_parent_id" placeholder="Type" style="width: 310px" required>
               	<? // rns_drop_foreach($pre_cat,@$row['vap_parent_id'],"Type");?>
            </select>
            </span>
            <div class="clear"></div>
        </div>-->
    <!--<div class="row" id="ltitle"> <span class="label"> Title <span class="red"></span></span> <span class="item">
        <input name="n_name" id="n_name" type="text" value="<? // if(isset($_POST['n_name'])) echo $_POST['n_name']; else if(!empty($_GET['id'])) echo $row['n_name'];?>" required>
        </span>
        <div class="clear"></div>
      </div>--> 
      <div class="row" id="ltitle"> <span class="label"> Description <span class="red">*</span></span>
        <span class="item">
   <textarea name="vap_description" id="vap_description" value="<? if(!empty($_GET['id'])) echo $row['vap_description'];?>"  required><? if(!empty($_GET['id'])) echo $row['vap_description'];?></textarea></span>
        <script>
    CKEDITOR.replace('vap_description');
  </script>
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
  <? }?>