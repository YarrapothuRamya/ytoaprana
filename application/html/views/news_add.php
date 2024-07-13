<div class="tablecontent">
  <div class="box addeditform">
    <h3 class="title">Add
      <?=$page_name2;?>
      <span class="fr">
      <button class="button-blue" onClick="window.location.href='news?status=1'"><i class="fa fa-th-list fa-lg"></i> Manage
      News</button>
      </span> </h3>
  </div>
  <div class="box addeditform">
    <form action="" method="post" name="predictions" id="predictions" enctype="multipart/form-data">
      <div class="row" id="ltitle"> <span class="label"> Description <span class="red">*</span></span>
        <span class="item">
   <textarea name="van_description" id="van_description" required><? if(!empty($_GET['id'])) echo $row['van_description'];?></textarea></span>
      
        <script>
    CKEDITOR.replace('van_description', {
      height: 250,
      extraPlugins: 'colorbutton,colordialog'
    });
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