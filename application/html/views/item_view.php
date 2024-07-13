<div style="width:450px; height:450px;overflow-x:hidden; overflow-y:auto;" >
<table width="100%" border="0" cellpadding="0" cellspacing="5">
  <tr>
    <td align="center"><h3 class="title">Item Details</h3></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered">
      <tr>
        <td width="20%" nowrap="nowrap"><strong>Category Name </strong></td>
        <td><?=$vrow['pcat_name'];?></td>
      </tr>
      <tbody>
        <tr>
          <td nowrap="nowrap"><strong>Sub Category Name </strong></td>
          <td><?=$vrow['psubc_name'];?></td>
        </tr>
		<tr>
          <td nowrap="nowrap"><strong>Item HSN Code </strong></td>
          <td><?=$vrow['itm_code'];?></td>
        </tr>
		<tr>
          <td nowrap="nowrap"><strong>Item </strong></td>
          <td><?=$vrow['itm_name'];?></td>
        </tr>
		<tr>
          <td nowrap="nowrap"><strong>Item Image </strong></td>
		  <?php if(empty($vrow['itm_path'])) { $itmpath="noavatar.png"; }else{ $itmpath=$vrow['itm_path']; } ?>
          <td><img src="<?="../../uploads/items/".$itmpath;?>"></td>
        </tr>
        <tr>
          <td nowrap="nowrap"><strong>Added On</strong></td>
          <td><?=dd_mm_yyyy($vrow['itm_added_date']);?></td>
        </tr>                       
      </tbody>
    </table></td>
    </tr>
</table>
</div>