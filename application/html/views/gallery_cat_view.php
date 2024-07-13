<div style="width:450px; height:450px;overflow-x:hidden; overflow-y:auto;" >
<form>
<table width="100%" border="0" cellpadding="0" cellspacing="5">
  <tr>
    <td align="center"><h3 class="title">Gallery Details</h3></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered">
      <tbody>
        <tr>
          <td width="20%" nowrap="nowrap"><strong>Title</strong></td>
          <td><? //=$vrow['va_title']?></td>
        </tr>
        
       <? while($row=Fetch($res)){
	   
	   $img_path="../../uploads/gal_uploads/".$folder_arr[$row["va_cat_id"]]."/".$row["va_path"]; 
	   
if($row['va_status']==1) { $cs=2;$sm="Inactivate"; $st_class="icn-link-green";} else { $cs=1;$sm="Activate";$st_class="icn-link-red"; }
           		$status_arr=$row['va_id'].",".$cs.",".$sm.","."bi_gallery,va_";
	    ?>
        <tr>
          <td><strong>Image</strong></td>
          <td><a href="<?=$img_path?>" target="_blank">
                      <img  width="40%" height="40%"  src="<?=$img_path?>">
                    </a>
                      
                    <span id="st_div_<?=$row['va_id']?>"><a id="<?=$status_arr;?>" class="rec_status <?=$st_class?> tooltip" title="Status"><i class="fa fa-bullseye fa-lg"></i></a></span> 
                      
                    </td>
        </tr>
            <? }?>                   
      </tbody>
    </table></td>
    </tr>
</table>


</form>
</div>