<div style="width:450px; height:450px;overflow-x:hidden; overflow-y:auto;" >
<table width="100%" border="0" cellpadding="0" cellspacing="5">
  <tr>
    <td align="center"><h3 class="title">News Details</h3></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered">
      <tbody>
        <tr>
          <td nowrap="nowrap"><strong>Description </strong></td>
          <td><?=$vrow['van_description'];?></td>
        </tr>
        <tr>
          <td nowrap="nowrap"><strong>Added On</strong></td>
          <td><?=dd_mm_yyyy($vrow['van_added_date']);?></td>
        </tr>                       
      </tbody>
    </table></td>
    </tr>
</table>
</div>