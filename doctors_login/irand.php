<?php
ob_start();
session_start();
include_once("includes/conn.php");
echo '<img src="../'.substr(getdata("bi_settings", "set_image","set_type='INDEXPAGE' and set_status='1' order by rand()"),3).'" border="0" style="border:1px solid #fff; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; height:300px; ">';

//$sql = mysql_query("SELECT set_image FROM settings WHERE set_type='INDEXPAGE' and set_status='1' order by rand()");
//$row = mysql_fetch_array($sql);
//echo '<img src="'.substr($row[0],3).'" border="0">';
?>