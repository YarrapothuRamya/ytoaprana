<div style="width:450px; height:450px;overflow-x:hidden; overflow-y:auto;" >
<table width="100%" border="0" cellpadding="0" cellspacing="5">
  <tr>
    <td align="center"><h3 class="title">Prediction Details</h3></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered">
      <tr>
        <td width="20%" nowrap="nowrap"><strong>Prediction Type </strong></td>
        <td><? if($vrow['vap_parent_id']==1){ echo "Upcoming Prediction"; } else if($vrow['vap_parent_id']==2){ echo "Recent True Prediction"; } ?></td>
      </tr>
      <tbody>
        <tr>
          <td nowrap="nowrap"><strong>Description </strong></td>
          <td><?=$vrow['vap_description'];?></td>
        </tr>
        <tr>
          <td nowrap="nowrap"><strong>Added On</strong></td>
          <td><?=dd_mm_yyyy($vrow['vap_added_date']);?></td>
        </tr>                       
      </tbody>
    </table></td>
    </tr>
</table>
</div>