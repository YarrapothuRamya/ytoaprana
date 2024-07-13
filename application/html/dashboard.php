<?php
include_once("login_chk.php");
include_once("../includes/conn.php");
header('refresh:900; url='.$file);
$page_name = "Dash Board";
$sub_qur1="";$com_cond="";$ocnt_class="";$ord_status_cnt=array();$neo_cnt=0;
//$emp_names=rns_emp();

// For Displaying BirthDay List of Current Month
//$emp_bd_list=rns_getdata('va_employees','emp_id,emp_dob,concat(emp_fname," ",emp_lname) as name',"emp_type<>1 and emp_status=1 and Month(emp_dob)=$cur_month order by day(emp_dob)");

// For Displaying CMS Pages Notices/Updates
//$cms_res = Query("select * from hf_cms where cms_status=1 and cms_cmsc_id=1 order by cms_id desc limit 10");
//$cms_cnt = NumRows($cms_res);

include(RNSTM);
?>
<script>
$(".preview_rns").colorbox();
$(".preview_rns_cc").colorbox({
	onComplete: function(){
		$(this).colorbox.resize();
		$("#enquiry_comments").submit(function(){
			valid = valid_form();
			if(valid == true){
				$.post(
					$(this).attr('action'),
					$(this).serialize(),function(data){
						$('#success').html(data);
						$(this).colorbox.resize();
						location.reload();
				});
				return false;
			}else{
				return false;
			}
			});
	}
});
</script>