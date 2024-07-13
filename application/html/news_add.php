<?php
ob_start();
include_once("login_chk.php");
include_once("../includes/conn.php");
if(!empty($_GET['start'])){ $start=$_GET['start']; }else{ $start=0; }
$len =50;$link = RNSFIFQ;
$cond='';
$page_name = "Website CMS";
$page_name2="News";
$page_name3="Add";
//$page_name4 =  ucword($pg);
$size=2097152; $op=">";$usize="600 x 400";$res_height="400";$res_width="600";$dir="news_uploads";$fileup="file_up";$p="van_";$t="va_news";$width=0;$height=0;$sree="";$path="";
if(isset($_GET['reset']) || empty($_GET['search'])){ rns_ClearSession(); } 
	
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(!empty($_GET['id'])){ $cond.=" and van_id<>'".$_GET['id']."' ";}
		$cnt_qur = getdata("va_news","count(*)","van_description='".$_POST['van_description']."'".$cond);
	if($cnt_qur>0){
		$errmsg = 'Title already Existed..';
	}else{		
		
			if(!empty($_GET['id'])){
				$_POST['van_updated_by']= $ERP_Uid;
				update_Defined('va_news', array_map('trim',$_POST),"van_id='".$getid."'");
				$msg="up";
			}else{		
				
				$orderby=rns_max('va_news','van_order_by');
				$_POST['van_order_by']= $orderby;	
				$_POST['van_added_by']= $ERP_Uid;
				$_POST['van_added_date']= $now_time;
				$_POST['van_updated_date']= $now_time;
				insert_Defined('va_news', array_map('trim',$_POST));			
				$msg="ad";
			}
			header("location:news?status=1&msg=".$msg."");		
	}	
}
if(!empty($_GET['search'])) { 
	if(isset($_SESSION['ser_key'])){ $sub_qur.=" and (van_description like '%".$_SESSION['ser_key']."%')"; }
}

//For ORDER BY
/*if(!empty($_GET['move'])){
	$mcond=($_GET['move']=="down")? "(select min(n_order_by) from va_news where ".$sub_qur." and n_order_by > t.n_order_by ) as newval" : "( select max(n_order_by) from va_news where ".$sub_qur." and n_order_by < t.n_order_by ) as newval" ;

	$mqur=Query("select n_order_by, ".$mcond." from va_news as t where ".$sub_qur." and n_id = '".$_GET['id']."'");
	$mrow=Fetch($mqur);	   
	$new_position = $mrow['newval'];
	$old_position = $mrow['n_order_by'];
	Query("UPDATE hf_news SET n_order_by = CASE 
				WHEN (n_order_by= $new_position) THEN $old_position   
				WHEN (n_order_by= $old_position) THEN $new_position
				END 
				WHERE n_order_by in ($new_position, $old_position)");
	if(!empty($_GET['search'])) { $link = RNSFI."?search=1"; } else { 	header("location: ".RNSFI); }
}*/
if(!empty($_GET['id'])){
	$qur = Query("select * from va_news where van_id=".$_GET['id']);
	$row = Fetch($qur);	
	//$avatar = $row["n_upload"];
}
include(RNSTM);
?>
<!--<script src="<?=BASEURLF?>js/Common.js"></script>-->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready( function() {
	$(".ajax,.preview_rns").colorbox();
	$("#predictions").validate({
                ignore: [],
              debug: false,
                rules: { 

                    van_description:{
                         required: function() 
                        {
                         CKEDITOR.instances.van_description.updateElement();
                        },

                         minlength:7
                    }
                },
                messages:
                    {

                    van_description:{
                        required:"Please Enter Description",
                        minlength:"Please Enter  Description"


                    }
                }
            });
	$(".dob").datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'dd-mm-yy',
      yearRange: '2014:'+((new Date).getFullYear()+1)     //yearRange: '1950:'+((new Date).getFullYear()-18)    
    });
	return $("body").on("click", ".rec_status",function(){
		var currentId = $(this).attr('id');
    	//var val1 = $('#course_type_id_fk option:selected').val();
		var st_val = currentId.split(',');
		var con=confirm("Do you want to "+st_val[2]+" this Record");
		if(con==true) {
			var dataString = 'act=status&id='+ st_val[0] +'&cs='+ st_val[1] +'&t='+ st_val[3]+'&p='+ st_val[4];;
			$.ajax({
				type: "POST",
				url: "ajax.php",
				data: dataString,
				cache: false,
				success: function(data){var div_name="#st_div_"+st_val[0];
					$(div_name).html(data);
				}
			});
		} else { return false; }
	});
	 
	
});
</script>