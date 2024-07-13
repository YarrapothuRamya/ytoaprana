<?php
if(!empty($_SESSION['ERP_Uprivileges']) && $ERP_Utype!=1){ //print_r($ses_privileges);

$user_privileges=array(
'states'=>'CMS_STS',
'states_add'=>'CMS_STS_ADD',
'districts'=>'CMS_DTS',
'districts_add'=>'CMS_DTS_ADD',
'mandals'=>'CMS_MDS',
'mandals_add'=>'CMS_MDS_ADD',
'locations'=>'CMS_LOC',
'locations_add'=>'CMS_LOC_ADD',
'gallery_categories'=>'CMS_GALL',
'gallery_add'=>'CMS_GALL',
'news_events'=>'CMS_GALL',
'news_events_add'=>'CMS_GALL',
'payment_categories'=>'CMS_PAYM',
'payment_categories_add'=>'CMS_PAYM',
'items'=>'SH_ITM',
'items_add'=>'SH_ITM_ADD',
'sub_items'=>'SH_SUB_ITM',
'sub_items_add'=>'SH_SUB_ITM_ADD',
'regcategories'=>'MNG_REGCAT',
'regsub_categories'=>'MNG_REGSUBCAT',
'regfee'=>'MNG_REGFEE',
'regcategories_add'=>'ADD_REGCAT',
'regsub_categories_add'=>'ADD_REGSUBCAT',
'regfee_add'=>'ADD_REGFEE',
'deals_add'=>'ADD_DLOFF',
'deals'=>'MNG_DLOFF',
'login_chk'=>'DBORD','employee_add'=>'ADM_ADD','employees'=>'ADM_MNG','view'=>'VIEW','change_password'=>'DBORD','profile'=>'DBORD','profile-edit'=>'DBORD','logout_idle'=>'DBORD','admin_add'=>'ADM_A','admins'=>'ADM_M','dashboard'=>'DBORD','ajax'=>'DBORD');
$page_name= RNSFI;
if($pg=='add'){
$page_name=$page_name."_add";
} 
if(preg_match("/_view/", RNSFI)){
$page_name="view";
}
/*if($_SESSION['ERP_Utype']=='4' && !empty($getid) && preg_match("/student_add/", RNSFI) ){
$page_name=$page_name."_edit";
}*/
//echo $page_name;
$page_pri=$user_privileges[$page_name];
//echo $page_pri;
if(!in_array($page_pri, $ses_privileges)){ 
header("Location:".$baseurl."html/dashboard.php?msg=no_access");
}
}
?>