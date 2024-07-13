<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");
require_once('../includes/php-image-magician/php_image_magician.php');

if(!empty($_GET['start'])){ $start=$_GET['start']; }else{ $start=0; }$len = 50;$link = RNSFI."?";
$size="1024";$res_height="1000";$res_width="1000";$usize="1000 x 1000";$com_cond="";


$page_name = "Registrations";
$page_name2 = "";
$page_name3 = "Reg Fee";
$page_name4 = "";
$va_cat_id=1;
$type="galleries?t=1";$cat_qur='';


$cond='';
$page_name4 = "Add";

if($_SERVER['REQUEST_METHOD']=="POST"){ 
/*
   $upload_img=$_FILES['user_files']["name"];
   $imgname=$_POST['va_path'];
*/   
   //$p_cat_id=$va_cat_id;
   $p_cat_id=1;
         
  if(!empty($_GET['id'])){ $cond.="and regfee_id<>'".$_GET['id']."'";}
$cnt_qur = getdata("bi_regfee","count(*)","regfee_catid='".$_POST['regfee_catid']."' and regfee_fromdt='".$_POST['regfee_fromdt']."' and regfee_subc_id='".$_POST['regfee_subc_id']."' ".$cond);

if($cnt_qur>0){	   
		$errmsg = 'Amount already Existed..';
	}else {

	
			if(!empty($_GET['id'])){
				
				Query("update bi_regfee set regfee_amount='".$_POST['regfee_amount']."',regfee_fromdt='".$_POST['regfee_fromdt']."',regfee_catid='".$_POST['regfee_catid']."',regfee_subc_id='".$_POST['regfee_subc_id']."',regfee_updated_by='".$ERP_Uid."',regfee_updated_date='".$now_time."' where regfee_id='".$_GET['id']."'");		
				
				$msg="up";
				header("location:regfee?msg=".$msg);
			} else {
			    $orderby=rns_max('bi_regfee','regfee_orderby','regfee_catid='.$_POST['regfee_catid']); 
				
			
				Query("INSERT INTO bi_regfee(regfee_catid,regfee_subc_id,regfee_amount,regfee_fromdt,regfee_added_by,regfee_added_date,regfee_orderby) VALUES ('".$_POST['regfee_catid']."','".$_POST['regfee_subc_id']."','".$_POST['regfee_amount']."','".$_POST['regfee_fromdt']."','$ERP_Uid','$now_time','$orderby')");
				$msg="ad";
				header("location:regfee?msg=".$msg);
			}
			header("location:regfee?msg=".$msg);
		}     
}
if(!empty($_GET['id'])){	
	$qur_edit =Query("select * from bi_regfee where regfee_id=".$_GET['id']);
	$row = Fetch($qur_edit);
    $c = $row["regfee_subc_id"];
    $cat_qur= " and regsubc_id=".$c;
//	alert($cat_qur);
}

include(RNSTM);
?>
<script type="text/javascript">
$(document).ready(function() {
    var max_fields      =5; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".rns-add"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div style="margin-top:10px;"><input type="text" name="va_title[]" placeholder="Enter Title" required/> <input class="files" name="user_files[]" type="file" required ><button type="button" class="button-blue rns-delete" title="Remove"><i class="fa fa-minus fa-lg"></i></button></div>'); //add input box
        }else{ alert("Only 5 Images allowed");
		return false;}
		
    });
   
    $(wrapper).on("click",".rns-delete", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
	
	  $('.files').on('change', function() { 
            const size =  
               (this.files[0].size / 1024 / 1024).toFixed(2); 
            if (size > 1) { 
                alert("Please Upload File Lessthan 1 Mb"); 
				$(".files").val('');
            } else { 
                
            } 
        });
		
		
		
	   	$('.sel_rls').on('change', function(){		
		var val = $(this).find('option:selected').val();
		var sel_id=this.id; 

		if(sel_id=="regfee_catid") { 
			var dataString = 'scat_id='+val+'&drop=rscat'; var result_ls="#regfee_subc_id";
		}

		$.ajax({
			type: "POST", url: "ajax.php", data: dataString, cache: false,
			success: function(data){
				$(result_ls).html(data);
			}
		});
	});	
		
});

</script>

