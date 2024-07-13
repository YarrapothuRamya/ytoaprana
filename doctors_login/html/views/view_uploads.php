
<span class="bold red"><?=$name;?></span>
	<div style=" <?=$styles?>overflow-x:hidden; overflow-y:auto;">
      <table width="99%" align="center" class="table table-bordered">
        <tr>
          <td colspan="4" align="center">
          <? if($typ=="img") { ?>
          	<img src="<?=BASEURLF.RNSUP.$avatar;?>" />
          <? } else { ?>
          	<a href="<?=BASEURLF.RNSUP.$avatar;?>" target="_blank">Download</a>
          <? } ?>  
          </td>
        </tr>
      </table>
	</div>
  <div class="clear"></div>
