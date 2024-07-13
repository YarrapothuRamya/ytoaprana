<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");
require_once('../includes/php-image-magician/php_image_magician.php');

if(!empty($_GET['start'])){ $start=$_GET['start']; }else{ $start=0; }$len = 50;$link = RNSFI."?";
$size="1024";$res_height="1300";$res_width="1300";$usize="1000 x 1000";$com_cond="";


$page_name = "Shop";
$page_name2 = "";
$page_name3 = "Sub Items";

$cond='';
$page_name4 = "Add";

if($_SERVER['REQUEST_METHOD']=="POST"){ 

   $upload_img=$_FILES['user_files']["name"];
   $imgname=$_POST['psubi_path'];
   //$p_cat_id=$va_cat_id;
   $p_cat_id=$_POST['psubi_itemid'];
         
  if(!empty($_GET['id'])){ $cond.="and psubi_id<>'".$_GET['id']."'";}
$cnt_qur = getdata("bi_sub_item","count(*)","psubi_name='".$_POST['psubi_name'][0]."' and psubi_itemid='".$p_cat_id."'".$cond);
$cnt_qur=0;
if($cnt_qur>0){	   
		$errmsg = 'Title already Existed..';
	}else {
	
  //$valid_image_check = array("image/gif", "image/jpeg", "image/jpg", "image/png", "image/bmp");
  $valid_image_check = array("gif", "jpeg", "jpg", "png", "bmp");
  

    $folderName = "../../uploads/sub_items/";
	if (file_exists($folderName)) { } else { mkdir($folderName, 0777); }  // for Directory Creation
	$thumb_folderName = $folderName."thumb/";
	if (file_exists($thumb_folderName)) { } else { mkdir($thumb_folderName, 0777); }  // for Directory Creation
	//if($p_cat_id!=4){ $image1 = $thumb_folderName.$imgname;	}
	$image2 = $folderName.$imgname;
	
    for ($i = 0; $i < count($_FILES["user_files"]["name"]); $i++) {
		  //if(empty($_FILES["user_files"]["tmp_name"][$i])) {exit;}	
	if(!empty($upload_img[0])){
		  list($width,$height,$type)=getimagesize($_FILES["user_files"]["tmp_name"][$i]);
		  $file_size = filesize($_FILES["user_files"]["tmp_name"][$i]);
		  $file_size = $file_size / 1024;
		if($height<=$res_height && $width<=$res_width && $file_size<= $size) { 
        //$image_mime = strtolower(image_type_to_mime_type(exif_imagetype($_FILES["user_files"]["tmp_name"][$i])));
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
			
			if ($_POST['psubi_name'][$i]==''){ $title = $Image;	
							}else{ $title = $_POST['psubi_name'][$i]; }
			
			if(!empty($_GET['id'])){
				  unlink($image2);
	

	Query("update bi_sub_item set psubi_name='$title',psubi_path='".$filename."',psubi_updated_by='".$ERP_Uid."',psubi_itemid='".$_POST['psubi_itemid']."',psubi_updated_date='".$now_time."' where psubi_id='".$_GET['id']."'");				
				$msg="up";
				//header("location:".$type."&msg=".$msg."");
				//header("location:galleries?t=".$p_cat_id."&status=1&msg=".$msg."");
				header("location:sub_items?msg=".$msg."");
			} else {
			    $orderby=rns_max('bi_sub_item','psubi_orderby','psubi_itemid='.$p_cat_id); 
				
				Query("INSERT INTO bi_sub_item(psubi_name,psubi_path,psubi_status,psubi_orderby,psubi_added_by,psubi_added_date,psubi_itemid) VALUES ('$title','$filename',1,'".$orderby."','$ERP_Uid','$now_time','".$_POST['psubi_itemid']."')");
				$msg="ad";
				header("location:sub_items?msg=".$msg."");
			}
		  }
        }else{ $errmsg="Please Upload Image with Below Extentions";}//errmsgimg
		
	    }else{ 
			$errmsg="Please Upload Image with Below Dimensions";//errmsgimg
		}
		}else{ 		
			Query("update bi_sub_item set psubi_name='".$_POST['psubi_name'][0]."',psubi_path='".$imgname."',psubi_itemid='".$_POST['psubi_itemid']."',psubi_updated_by='".$ERP_Uid."',psubi_updated_date='".$now_time."' where psubi_id='".$_GET['id']."'");
			$msg="up";
			//header("location:galleries?t=".$p_cat_id."&status=1&msg=".$msg.""); 
			header("location:sub_items?msg=".$msg."");
			 
		}      
	}
	
  }
}

if(!empty($_GET['id'])){	
	$qur_edit =Query("select * from bi_sub_item where psubi_id=".$_GET['id']);
	$row = Fetch($qur_edit);
   $img_path="../../uploads/sub_items/".$row["psubi_path"]; 
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
            $(wrapper).append('<div style="margin-top:10px;"><input type="text" name="psubi_name[]" placeholder="" required/> <input class="files" name="user_files[]" type="file" required ><button type="button" class="button-blue rns-delete" title="Remove"><i class="fa fa-minus fa-lg"></i></button></div>'); //add input box
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
});
</script>

