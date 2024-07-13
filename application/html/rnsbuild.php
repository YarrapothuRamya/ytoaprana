<!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>

<meta charset="utf-8">
<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title><?=TITLE;?></title>
<meta http-equiv="cleartype" content="on">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<!-- Stylesheets -->
<link rel="stylesheet" href="../css/font-awesome.css">
<link rel="stylesheet" href="../css/styles.css" media="all">
<link rel="stylesheet" href="../css/menu.css" media="all">
<link rel="stylesheet" href="../css/grid.css" media="screen">
<link rel="stylesheet" href="../css/jquery.dropdown.css" type="text/css"/>
<link rel="stylesheet" href="../css/colorbox.css" />
<link rel="stylesheet" href="../js/jquery-ui.css">
<link rel="stylesheet" href="../css/select2.min.css">
<!-- jquery library-->
<script type="text/javascript" src="../js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../js/jquery.easytabs.min.js"></script>
<script type="text/javascript" src="../js/jquery.dropdown.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<!-- Menu sticky wrapper -->
<script type="text/javascript" src="../js/sticky-wrapper.js"></script>
<!-- Colorbox -->
<script type="text/javascript" src="../js/jquery.colorbox.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<!--<script type="text/javascript" src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>-->
<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../js/plugin.js"></script>

</head>
<body>
<div id="headerwrap"><? include("header.php"); ?></div><!-- End of Header -->
<!--Menuwrap start-->
<div class="menuwrap"><? include("menu.php"); ?>
<!--navigation start-->
<div class="navigation box">
    <div class="navigate">
        <div><a href="dashboard.php">Home</a>
         <? if(!empty($page_name)) { ?>
        <span class="divied"></span><a href="javascript:;"><?=$page_name?></a>        
        <? } if(!empty($page_name2)) { ?>
        <span class="divied"></span>
        <span class="pagetitle"><?=$page_name2?></span>
        <? } if(!empty($page_name3)) { ?>
        <span class="divied"></span>        
        <span class="pagetitle"><?=$page_name3?></span>
        <? } if(!empty($page_name4)) { ?>
        <span class="divied"></span>        
        <span class="pagetitle"><?=$page_name4?></span>
        <? } ?>
        </div>
    </div>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div> <!-- End of Menu -->
<div id="mainwrap" class="contentwrap">
<div class="grid_12 omega">
    <div class="alert-box"><?php if(!empty($errmsg)){ echo show_msg($errmsg); } ?></div>
    <?php if(empty($incHTML)) { if(!empty($incFILE)) require_once($incFILE);} else echo $incHTML; ?> 
</div>
</div>
<div class="clear"></div>
<div id="footerwrap"><? include("footer.php");?></div>
</body>
</html>