<div style="width:450px; height:450px;overflow-x:hidden; overflow-y:auto;" >

<table width="100%" border="0" cellpadding="0" cellspacing="5">
  <tr>
    <td align="center"><h3 class="title">Gallery Details</h3></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered">
      <tbody>
        <tr>
          <td width="20%" nowrap="nowrap"><strong>Title</strong></td>
          <td><?=$vrow['va_title']?></td>
        </tr>
        <tr>
          <td width="20%" nowrap="nowrap"><strong>Gallery Type</strong></td>
          <td><?=$gall_cat[$vrow['va_cat_id']]?></td>
        </tr>     
        <tr>
          <td><strong>Added On</strong></td>
          <td><?=dd_mm_yyyy($vrow['va_added_date']);?></td>
        </tr>
        <tr>
          <td><strong>Photo</strong></td>
          <td><a href="<?=$img_path?>" target="_blank">
                      <img  width="40%" height="40%"  src="<?=$img_path?>" alt="<?php echo $vrow["va_title"]; ?>">
                    </a></td>
        </tr>                       
      </tbody>
    </table></td>
    </tr>
</table>

</div>