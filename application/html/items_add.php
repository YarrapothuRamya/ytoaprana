<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");
require_once('../includes/php-image-magician/php_image_magician.php');

if(!empty($_GET['start'])){ $start=$_GET['start']; }else{ $start=0; }$len = 50;$link = RNSFI."?";
$size="1024";$res_height="1000";$res_width="1000";$usize="1000 x 1000";$com_cond="";


$page_name = "Website CMS";
$page_name2 = "";
$page_name3 = "Items";
$page_name4 = "";
$va_cat_id=1;
$type="galleries?t=1";$cat_qur='';


$cond='';
$page_name4 = "Add";

if($_SERVER['REQUEST_METHOD']=="POST"){ 

   $upload_img=$_FILES['user_files']["name"];
   $imgname=$_POST['itm_path']; 
   //$p_cat_id=$_POST['itm_id'];


//   $p_cat_id=1;
         
  if(!empty($_GET['id'])){ $cond.="and itm_id<>'".$_GET['id']."'";}
$cnt_qur = getdata("bi_item","count(*)","itm_name='".$_POST['itm_name'][0]."' and itm_catid='".$_POST['itm_catid']."' and itm_subcatid='".$_POST['itm_subcatid']."' ".$cond);

if($cnt_qur>0){	   
		$errmsg = 'Title already Existed..';
	}else {

  $valid_image_check = array("gif", "jpeg", "jpg", "png", "bmp");

    $folderName = "../../uploads/items/";
	if (file_exists($folderName)) { } else { mkdir($folderName, 0777); }  // for Directory Creation
	$thumb_folderName = $folderName."thumb/";
	if (file_exists($thumb_folderName)) { } else { mkdir($thumb_folderName, 0777); }  // for Directory Creation
	$image1 = $thumb_folderName.$imgname;
	$image2 = $folderName.$imgname;

	
    for ($i = 0; $i < count($_FILES["user_files"]["name"]); $i++) {
	if(!empty($upload_img[0])){
		  list($width,$height,$type)=getimagesize($_FILES["user_files"]["tmp_name"][$i]);
		  $file_size = filesize($_FILES["user_files"]["tmp_name"][$i]);
		  $file_size = $file_size / 1024;
		if($height<=$res_height && $width<=$res_width && $file_size<= $size) { 
		$image_mime = substr(strrchr($_FILES["user_files"]["name"][$i], '.'), 1);

		// if valid image type then upload
        if (in_array($image_mime, $valid_image_check)) {
          $ext = explode("/", strtolower($image_mime));
          $ext = strtolower(end($ext));
          $filename = rand(10000, 990000) . '_' . time() . '.' . $ext;
          $filepath = $folderName . $filename;
	
          if (!move_uploaded_file($_FILES["user_files"]["tmp_name"][$i], $filepath)) {
            $errmsg= "Failed to upload <strong>" . $_FILES["user_files"]["name"][$i] . "</strong>. <br>";
			$counter++;
          } else {
           
				$magicianObj = new imageLib($filepath); 
				$magicianObj->resizeImage(370, 370); 
				$magicianObj->saveImage($folderName . 'thumb/' . $filename, 100); 
			
			if ($_POST['itm_name'][$i]==''){ $title = $Image;	
							}else{ $title = $_POST['itm_name'][$i]; }

				
		if(!empty($_GET['id'])){
				 
				 $files = array($image1,$image2); 
				foreach($files as $file){ unlink($file); }
				Query("update bi_item set itm_name='$title',itm_path='".$filename."',itm_code='".$_POST['itm_code']."',itm_catid='".$_POST['itm_catid']."',itm_subcatid='".$_POST['itm_subcatid']."',itm_updated_by='".$ERP_Uid."',itm_updated_date='".$now_time."' where itm_id='".$_GET['id']."'");	
				
				$msg="up";
				header("location:items?msg=".$msg);
			}else{
			
			    $orderby=rns_max('bi_item','itm_orderby','itm_catid='.$_POST['itm_catid']); 
				Query("INSERT INTO bi_item(itm_name,itm_path,itm_code,itm_catid,itm_subcatid,itm_added_by,itm_added_date,itm_orderby) VALUES ('".$_POST['itm_name'][0]."','".$filename."','".$_POST['itm_code']."','".$_POST['itm_catid']."','".$_POST['itm_subcatid']."','$ERP_Uid','$now_time','$orderby')");
				$msg="ad";
				header("location:items?msg=".$msg);
			
			}
		}
		  
        }else{ $errmsg="Please Upload Image with Below Extentions";}//errmsgimg
	    }else{ $errmsg="Please Upload Image with Below Dimensions"; }
		}else{ $title=$_POST['itm_name'][0];		
			Query("update bi_item set itm_name='$title',itm_path='".$imgname."',itm_code='".$_POST['itm_code']."',itm_catid='".$_POST['itm_catid']."',itm_subcatid='".$_POST['itm_subcatid']."',itm_updated_by='".$ERP_Uid."',itm_updated_date='".$now_time."' where itm_id='".$_GET['id']."'");	
			$msg="up";
		    header("location:items?msg=".$msg);
			 
		}     
    }
			
  }
}
if(!empty($_GET['id'])){	
	$qur_edit =Query("select * from bi_item where itm_id=".$_GET['id']);
	$row = Fetch($qur_edit);
  $c = $row["itm_catid"];
   $cat_qur= " and psubc_catid='".$c."'";
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
            $(wrapper).append('<div style="margin-top:10px;"><input type="text" name="itm_name[]" placeholder="Enter Title" required/> <input class="files" name="user_files[]" type="file" required ><button type="button" class="button-blue rns-delete" title="Remove"><i class="fa fa-minus fa-lg"></i></button></div>'); //add input box
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
		
		
		
	   	$('.sel_ls').on('change', function(){		
		var val = $(this).find('option:selected').val();
		var sel_id=this.id; 

		if(sel_id=="itm_catid") { 
			var dataString = 'scat_id='+val+'&drop=scat'; var result_ls="#itm_subcatid";
		} else if(rnsid=="proj_type") {
			var dataString = 'type_id='+val+'&drop=subtype'; var result_ls="#proj_subtype";
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
<!--


/*var _URL = window.URL || window.webkitURL;
$(".files").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        var objectUrl = _URL.createObjectURL(file);
        img.onload = function () {
            //alert(this.width + " " + this.height);
			if(this.width>1000 || this.height>1000){
			alert("Please Upload Image Lessthan 1000 x 1000"); 
			//file.val('');
			}
            _URL.revokeObjectURL(objectUrl);
        };
        img.src = objectUrl;
    }
});*/

-->