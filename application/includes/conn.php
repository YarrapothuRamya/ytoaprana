<?php 
global $db;
error_reporting(0);
// Local
$db = mysqli_connect("localhost", "root", "","ytoaprana");

// Live
//$db = mysqli_connect("localhost", "ytoaprana_ytoaprana", "9849048710@R","ytoaprana_ytoaprana");
if (!$db){
   	//die('Could not connect: ' . mysqli_error());	
	die(require("failed.php"));	//exit;
}
include_once("config.php");
include_once("functions.php");
//include_once("../../incs/config.php");
//include_once("../../incs/functions.php");
//mysql_close($link);
?>