<? $ses_privileges=$_SESSION['ERP_Uprivileges'];  ?>
<ul class="mainmenu tc">
    <li class="top"><a href="dashboard.php" class="top_link"><span class="icn_home"></span></a></li>
        
		  <?  if( (isset($_SESSION['ERP_Utype']) && $_SESSION['ERP_Utype']=='1') || (is_array($ses_privileges) && count(array_intersect(array('ADM_ADD','ADM_MNG'), $ses_privileges))>0) ) { ?>
         <li class="top"><a href="javascript:;" class="top_link menu_text"><span class="down">User Management<i class="fa fa-angle-down fa-lg"></i></span></a>
            <ul class="sub">
				<? if($_SESSION['ERP_Utype']=='1' || in_array("ADM_ADD", $ses_privileges)){ ?>
                <li><a href="employee_add">New User</a></li>
                <? } if($_SESSION['ERP_Utype']=='1' || in_array("ADM_MNG", $ses_privileges)){ ?>
              	<li><a href="employees">Manage Users</a></li>
                <? } ?>
            </ul>
         </li> 
         <? } ?>
</ul>