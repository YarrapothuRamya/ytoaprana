<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");
require_once('../includes/php-image-magician/php_image_magician.php');

if(!empty($_GET['start'])){ $start=$_GET['start']; }else{ $start=0; }$len = 50;$link = RNSFI."?";
$size="1024";$res_height="1000";$res_width="1000";$usize="1000 x 1000";$com_cond="";

if(!empty($_GET['type']) && $_GET['type']==='news'){
$page_name = "Website CMS";
$page_name2 = "";
$page_name3 = "News & Events";
$va_cat_id=1;
$type="news_events?t=1";
}else if(!empty($_GET['type']) && $_GET['type']==='events'){
$page_name = "Website CMS";
$page_name2 = "";
$page_name3 = "News & Events";
$va_cat_id=2;
$type="news_events?t=2";
}

$cond='';
$page_name4 = "Add";

if($_SERVER['REQUEST_METHOD']=="POST"){ 

   $upload_img=$_FILES['user_files']["name"];
   $imgname=$_POST['ne_path'];
   //$p_cat_id=$va_cat_id;
   $p_cat_id=$_POST['cat_id'];
         
  if(!empty($_GET['id'])){ $cond.="and ne_id<>'".$_GET['id']."'";}
$cnt_qur = getdata("bi_news","count(*)","ne_title='".$_POST['ne_title'][0]."' and ne_cat_id='".$p_cat_id."'".$cond);

if($cnt_qur>0){	   
		$errmsg = 'Title already Existed..';
	}else {
	
  //$valid_image_check = array("image/gif", "image/jpeg", "image/jpg", "image/png", "image/bmp");
  $valid_image_check = array("gif", "jpeg", "jpg", "png", "bmp");
  

    $folderName = "../../uploads/gal_uploads/news_events/";
	if (file_exists($folderName)) { } else { mkdir($folderName, 0777); }  // for Directory Creation
	$thumb_folderName = $folderName."thumb/";
	if (file_exists($thumb_folderName)) { } else { mkdir($thumb_folderName, 0777); }  // for Directory Creation
	if($p_cat_id!=4){ $image1 = $thumb_folderName.$imgname;	}
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
            if($p_cat_id!=4){
				$magicianObj = new imageLib($filepath); 
				if($p_cat_id==3){
				$magicianObj->resizeImage(250, 300);
				}else{
				$magicianObj->resizeImage(370, 310); }
				$magicianObj->saveImage($folderName . 'thumb/' . $filename, 100); 
			}
			if ($_POST['ne_title'][$i]==''){ $title = $Image;	
							}else{ $title = $_POST['ne_title'][$i]; }
			
			if(!empty($_GET['id'])){
			   if($p_cat_id!=4){   
					$files = array($image1,$image2); 
					foreach($files as $file){ unlink($file); }
				 }else{
				  unlink($image2);
				 }
				//echo "update hf_photos set p_title='$title',p_path='".$filename."',p_updated_by='".$ERP_Uid."',p_updated_date='".$now_time."' where p_id='".$_GET['id']."'";exit;
				Query("update bi_news set ne_title='$title',ne_desc='".$_POST['ne_desc']."',ne_path='".$filename."',ne_updated_by='".$ERP_Uid."',ne_updated_date='".$now_time."' where ne_id='".$_GET['id']."'");				
				$msg="up";
				//header("location:".$type."&msg=".$msg."");
				header("location:news_events?t=".$p_cat_id."&status=1&msg=".$msg."");
			} else {
			    $orderby=rns_max('bi_news','ne_order_by','ne_cat_id='.$p_cat_id); 
				
				Query("INSERT INTO bi_news(ne_cat_id,ne_title,ne_desc,ne_path,ne_status,ne_order_by,ne_added_by,ne_added_date) VALUES ('".$p_cat_id."','$title','".$_POST['ne_desc']."','$filename',1,'".$orderby."','$ERP_Uid','$now_time')");
				$msg="ad";
				header("location:news_events?t=".$p_cat_id."&status=1&msg=".$msg."");
			}
		  }
        }else{ $errmsg="Please Upload Image with Below Extentions";}//errmsgimg
		
	    }else{ 
			$errmsg="Please Upload Image with Below Dimensions";//errmsgimg
		}
		}else{ 		
			Query("update bi_news set ne_title='".$_POST['ne_title'][0]."',ne_desc='".$_POST['ne_desc']."',ne_path='".$imgname."',ne_updated_by='".$ERP_Uid."',ne_updated_date='".$now_time."' where ne_id='".$_GET['id']."'");
			$msg="up";
			header("location:news_events?t=".$p_cat_id."&status=1&msg=".$msg."");
		}      
	}
	
}
}

if(!empty($_GET['id'])){	
	$qur_edit =Query("select * from bi_news where ne_id=".$_GET['id']);
	$row = Fetch($qur_edit);
   $c = $row["ne_cat_id"];
   $com_cond= " and comm_id='".$c."'";
   $img_path="../../uploads/gal_uploads/news_events/".$row["ne_path"]; 
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
            $(wrapper).append('<div style="margin-top:10px;"><input type="text" name="ne_title[]" placeholder="Enter Title" required/> <input class="files" name="user_files[]" type="file" required ><button type="button" class="button-blue rns-delete" title="Remove"><i class="fa fa-minus fa-lg"></i></button></div>'); //add input box
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
