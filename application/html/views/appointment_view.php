<? $paysts=""; $paysts=$vrow['vaap_pstatus']; ?>

<div style="width:450px; height:450px;overflow-x:hidden; overflow-y:auto;" >
<table width="100%" border="0" cellpadding="0" cellspacing="5">
  <tr>
    <td align="center"><h3 class="title">Appointment Details</h3></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered">
       <tr>
        <td width="20%" nowrap="nowrap"><strong>Appointment Id </strong></td>
        <td><?=$vrow['vaap_appt_no'];?></td>
      </tr>
      <tr>
        <td width="20%" nowrap="nowrap"><strong>Selected Service </strong></td>
        <td><?=$astroservice_arr[$vrow['vaap_service']];?></td>
      </tr>
      <tr>
        <td width="20%" nowrap="nowrap"><strong>Name </strong></td>
        <td><?=$vrow['vaap_name'];?></td>
      </tr>
      <tr>
        <td width="20%" nowrap="nowrap"><strong>Gender </strong></td>
        <td><?=$vrow['vaap_gender'];?></td>
      </tr>
       <tr>
        <td width="20%" nowrap="nowrap"><strong>Date of Birth </strong></td>
        <td><?=dd_mm_yyyy($vrow['vaap_dob']);?></td>
      </tr>
      <tr>
        <td width="20%" nowrap="nowrap"><strong>Time of Birth </strong></td>
        <td><? echo $vrow['vaap_hrs'].":".$vrow['vaap_mts']." ".$vrow['vaap_tob'];?></td>
      </tr>
       <tr>
        <td width="20%" nowrap="nowrap"><strong>Birth City </strong></td>
        <td><?=$vrow['vaap_bcty'];?></td>
      </tr>
       <tr>
        <td width="20%" nowrap="nowrap"><strong>Birth State </strong></td>
        <td><?=$vrow['vaap_bstate'];?></td>
      </tr>
        <tr>
        <td width="20%" nowrap="nowrap"><strong>Birth Country </strong></td>
        <td><?=$country_arr[$vrow['vaap_bcntry']];?></td>
      </tr>
        <tr>
        <td width="20%" nowrap="nowrap"><strong>E-Mail </strong></td>
        <td><?=$vrow['vaap_email'];?></td>
      </tr>
       <tr>
        <td width="20%" nowrap="nowrap"><strong>Phone </strong></td>
        <td><?=$vrow['vaap_phone'];?></td>
      </tr>
       <tr>
        <td width="20%" nowrap="nowrap"><strong>Zip </strong></td>
        <td><?=$vrow['vaap_zip'];?></td>
      </tr>
        <tr>
        <td width="20%" nowrap="nowrap"><strong>Address </strong></td>
        <td><?=$vrow['vaap_address'];?></td>
      </tr>
      <tr>
        <td width="20%" nowrap="nowrap"><strong>Payment Option </strong></td>
        <td><?=$paymenttype_arr[$vrow['vaap_ptype_id']];?></td>
      </tr>
      <tr>
        <td width="20%" nowrap="nowrap"><strong>Payment Status </strong></td>
        <td ><?=$paystatus[$vrow['vaap_pstatus']];?></td>
      </tr>
       <tr>
        <td width="20%" nowrap="nowrap"><strong>Transaction Id </strong></td>
        <td><?=$vrow['vaap_tid'];?></td>
      </tr>
      <tbody>
        <tr>
          <td nowrap="nowrap"><strong>Question/ Comments </strong></td>
          <td><?=$vrow['vaap_description'];?></td>
        </tr>
        <tr>
          <td nowrap="nowrap"><strong>Added On</strong></td>
          <td><?=dd_mm_yyyy($vrow['vaap_added_date']);?></td>
        </tr>                       
      </tbody>
    </table></td>
    </tr>
</table>
</div>