<div class="tablecontent">
      <!--<div class="box addeditform">
        <h3 class="title">Add <?=$page_name3;?>
          <span class="fr">
          <button class="button-blue" onClick="window.location.href='<?=RNSFI?>.php'"><i class="fa fa-th-list fa-lg"></i> Manage Categories
          </button>
          </span> </h3>
      </div>-->
    <div class="box addeditform">
   
      
  <? 
	   $res = Query("select * from ytoa_gallery where va_pcatid=".$_GET['id']);
			
	    $cnt_sel=NumRows($res); 
		if($cnt_sel>0){  
	   while($row=Fetch($res)){ ?>
      
	  <? $img_path="../../uploads/gal_uploads/".$folder_arr[$row["va_cat_id"]]."/thumb/".$row["va_path"]; 
	   
if($row['va_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
           		$status_arr=$row['va_id'].",".$cs.",".$sm.","."ytoa_gallery,va_";
	    ?>
       
         <div class="b-img-n"><a href="<?=$img_path?>" target="_blank"> <img  height="10%"  src="<?=$img_path?>"></a>
         
         <form name="delete" method="post">
         <input type="hidden" value="<?=$row['va_id']?>" name="delete"/>
         <input type="hidden" value="<?=$row["va_path"]?>" name="path"/>
         <input type="hidden" value="<?=$row["va_cat_id"]?>" name="cat_id"/>
         <input type="submit" value="Delete" class="button-orange ml10">
         </form></div> 
              
            <? } }else{?>
             <tr>
          <td colspan="5" align="center" class="red">No Records Found</td>
        </tr>
        <? } ?>        
                 
</div>
    </div>
	
