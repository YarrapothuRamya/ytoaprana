<div style="width:450px; height:450px;overflow-x:hidden; overflow-y:auto;" >

<table width="100%" border="0" cellpadding="0" cellspacing="5">
  <tr>
    <td align="center"><h3 class="title">News&Events Details</h3></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered">
      <tbody>
        <tr>
          <td width="20%" nowrap="nowrap"><strong>Title</strong></td>
          <td><?=$vrow['ne_title']?></td>
        </tr>
        <tr>
          <td width="20%" nowrap="nowrap"><strong>Gallery Type</strong></td>
          <td>News&Events video</td>
        </tr> 
		<tr>
          <td width="20%" nowrap="nowrap"><strong>Description </strong></td>
          <td><?=$vrow['ne_desc']?></td>
        </tr>     
        <tr>
          <td><strong>Added On</strong></td>
          <td><?=dd_mm_yyyy($vrow['ne_added_date']);?></td>
        </tr>
        <tr>
          <td><strong>Video URL</strong></td>
          <td><a href="<?=$vrow['ne_url']?>" target="_blank"><?=$vrow['ne_url']?> </a></td>
        </tr>                       
      </tbody>
    </table></td>
    </tr>
</table>

</div>