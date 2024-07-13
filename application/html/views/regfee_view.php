<div style="width:450px; height:450px;overflow-x:hidden; overflow-y:auto;" >
<table width="100%" border="0" cellpadding="0" cellspacing="5">
  <tr>
    <td align="center"><h3 class="title">Registration Fee Details</h3></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered">
      <tr>
        <td width="20%" nowrap="nowrap"><strong>Reg Category Name </strong></td>
        <td><?=$vrow['regcat_name'];?></td>
      </tr>
      <tbody>
        <tr>
          <td nowrap="nowrap"><strong>Reg Sub Category Name </strong></td>
          <td><?=$vrow['regsubc_name'];?></td>
        </tr>
		<tr>
          <td nowrap="nowrap"><strong>Reg Amount</strong></td>
          <td><?=$vrow['regfee_amount'];?></td>
        </tr>
		<tr>
          <td nowrap="nowrap"><strong>From Date</strong></td>
          <td><?=$vrow['regfee_fromdt'];?></td>
        </tr>

        <tr>
          <td nowrap="nowrap"><strong>Added On</strong></td>
          <td><?=dd_mm_yyyy($vrow['regfee_added_date']);?></td>
        </tr>                       
      </tbody>
    </table></td>
    </tr>
</table>
</div>