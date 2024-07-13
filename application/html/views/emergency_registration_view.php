<div style="width:850px; height:600px;overflow-x:hidden; overflow-y:auto;">
<table width="100%" border="0" cellpadding="0" cellspacing="5">
  <tr>
    <td align="center"><h3 class="title">Emergency - Registration Details</h3></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered">
      <tr>
        <td width="20%" nowrap="nowrap"><strong>Name of the Emergency</strong></td>
        <td><?=$vrow['emergency_name'];?></td>
      </tr>
      <tbody>
        <tr>
          <td nowrap="nowrap"><strong>Registration Number </strong></td>
          <td><?=$vrow['emergency_refno'];?></td>
        </tr>
  <tr>
    <td align="left" colspan="2"><h3 class="title">KYC Details</h3></td>
  </tr>
		<tr>
          <td nowrap="nowrap"><strong>GST Number </strong></td>
          <td><?=$vrow['emergency_gst'];?></td>
        </tr>
        <tr>
          <td nowrap="nowrap"><strong>Aadhaar Card </strong></td>
          <td><?=$vrow['emergency_aadhaar'];?></td>
        </tr>
        <tr>
          <td nowrap="nowrap"><strong>PAN Card</strong></td>
          <td><?=$vrow['emergency_pan'];?></td>
        </tr>
  <tr>
    <td align="left" colspan="2"><h3 class="title">Contact Details</h3></td>
  </tr>
         <tr>
          <td nowrap="nowrap"><strong>Office Number</strong></td>
          <td><?=$vrow['emergency_office'];?></td>
        </tr>
         <tr>
          <td nowrap="nowrap"><strong>Mobile Number</strong></td>
          <td><?=$vrow['emergency_phone'];?></td>
        </tr>
         <tr>
          <td nowrap="nowrap"><strong>E-Mail ID</strong></td>
          <td><?=$vrow['emergency_email'];?></td>
        </tr>
         <tr>
          <td nowrap="nowrap"><strong>UserName</strong></td>
          <td><?=$vrow['emergency_username'];?></td>
        </tr>
		<tr>
          <td nowrap="nowrap"><strong>Password </strong></td>
          <td><?=rnsb64ende($vrow['emergency_password'],1);?></td>
        </tr>
        <tr>
          <td nowrap="nowrap"><strong>Added On</strong></td>
          <td><?=dd_mm_yyyy($vrow['emergency_added_date']);?></td>
        </tr>                       
      </tbody>
    </table></td>
    </tr>
    <tr>
    <td align="center"><h3 class="title">Emergency - Transaction Details</h3></td>
  </tr>
   <tr>
    <td valign="top">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered">
     <thead>
        <tr>
          <th align="center">S.No.</th>
          <th>Payment Mode</th>
		  <th>Type of Transaction</th>
          <th>Transaction ID</th>
          <th>Amount</th>
          <th>Date</th>
          <th>Description</th>
          <th>Added Date</th>
          <th>Added By</th>
          <th>Updated Date</th>
          <th>Updated By</th>
        </tr>
      </thead>
      <tbody> 
      <?php
	      $qur_cnt=Query("select * from bi_fpo_payment where  fpo_regid=".$_GET['id']);
            $cnt_sel=NumRows($qur_cnt); $ls=0; $total="";
			 if($cnt_sel>0){
			while($row=Fetch($qur_cnt)){
			$ls++; $total+=$row['fpo_amount'];
			$payment_mode	= getdata("bi_payment_mode","paym_name","paym_id='".$row['fpo_pcatid']."'");
			$addedby	= getdata("va_employees","emp_fname","emp_id='".$row['fpo_added_by']."'");
			$updatedby	= getdata("va_employees","emp_fname","emp_id='".$row['fpo_updated_by']."'");
	  ?>
      <tr>
      <td><?=$ls?></td>
      <td><?=$payment_mode?></td>
      <td><?=$row['fpo_paymentid']?></td>
      <td><?=num_format($row['fpo_amount'])?></td>
      <td><?=$row['fpo_date']?></td>
       <td><?=$row['fpo_description']?></td>
       <td><?=dd_mm_yyyy1($row['fpo_added_date'])?></td>
       <td><?=$addedby?></td>
       <td><?=dd_mm_yyyy1($row['fpo_updated_date'])?></td>
       <td><?=$updatedby?></td>
      </tr>
       <? }?>
       <tr>
       <td colspan="3" align="right"><strong>Total</strong></td>
      <td colspan="7"><strong><?=num_format($total)?></strong></td>
      </tr>
	   <? }else{?>
        <tr>
          <td colspan="12" align="center" class="red">No Records Found</td>
        </tr>
        <? }?>
     </table>
     </td>
     </tr>
</table>
</div>