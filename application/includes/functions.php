<?php 
define('RNSFIWQ', RNSFI.'?'.rns_QueryString_dupremov($_SERVER['QUERY_STRING'])); // File Name with URL
define('RNSFIFQ', rns_QueryString_first(RNSFIWQ));
function url_get_contents ($Url) {
    if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function getaddress($lat,$lng){
	$url	= 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
	$json	= url_get_contents($url);
	$data	= json_decode($json);
	$status	= @$data->status;
	if($status=="OK")
	return $data->results[0]->formatted_address;
	else
	return false;
}

function secure($str){
	global $db;
	$secured = strip_tags($str);
	$secured = htmlspecialchars($secured);
	$secured = mysqli_real_escape_string($db, $secured);
	$rnsser=array("/n","  ","'");
	$rnsreplace=array("'"," ","&#39");
	$rnstext2=str_replace($rnsser,$rnsreplace,$secured);
	$rnstext1=nl2br($rnstext2);
	$rnstext= preg_replace('/\s\s+/', ' ', $rnstext1);
	return trim($rnstext);
}

function Query($query){
	global $db;
	$return = mysqli_query($db, $query);
	return $return;
}

function NumRows($query){
	$return = mysqli_num_rows($query);
	return $return;
}

function Fetch($query){
	$return = mysqli_fetch_assoc($query);
	return $return;
}
// Data insert and update
function Insert($table, $data){
    $key = array_keys($data);
    $val = array_values($data);
    $sql = "INSERT INTO $table (" . implode(', ', $key) . ") "
         . "VALUES ('" . implode("', '", $val) . "')";
    return($sql);
}

function Update($table, $data, $where){
    $cols = array();

    foreach($data as $key=>$val){
        $cols[] = "$key = '$val'";
    }
    $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";
 
    return($sql);
}

// Defined data insert and update
function insert_Defined($table, $array,$ins=''){
	global $db;
	// insert('table', array_map('trim',$_POST));
    $query = "INSERT INTO" . ' ' . $table;
    $fis = array(); $vas = array();
    
	foreach ($array as $field => $val) {
        $fis[] = "`$field`";
        $vas[] = ($val != "NOW()") ? "'" . mysqli_real_escape_string($db,$val) . "'" : "NOW()";
    }
	
    $query .= "(" . implode(",", $fis) . ") VALUES (" . implode(",", $vas) . ")";
	//echo $query;exit;
	Query($query);if(!empty($ins)){$ins_id=mysqli_insert_id($db);return $ins_id;}
}

function update_Defined($table, $data, $condition){
	// update('table', array_map('trim',$_POST),'id='.$_POST['p_id']);
    global $db;
    $query = "UPDATE `" . $table . "` SET ";
    $fis = array(); $vas = array();
    
	foreach ($data as $field => $val){
        $fis[] = "`$field`";
        $vas[] = "'" . mysqli_real_escape_string($db,$val) . "'";
    }
    
	foreach ($fis as $key => $field_name) {
        $fields[$key] = $field_name;
        if (isset($vas[$key])) {
            $fields[$key] .= '=' . $vas[$key];
        }
    }
	
    $query .= implode(',', $fields);
    $query .= " WHERE " . $condition;
	//echo $query;exit;
    Query($query);
}

function getdata($tble,$field,$whr){
	global $db;
	//echo "SELECT $field FROM $tble WHERE $whr";exit;
	$res = mysqli_query($db, "SELECT $field FROM $tble WHERE $whr");
	$row = mysqli_fetch_array($res);
	return $row[0];
}

function get_data($tble,$field,$whr){
	global $db;
	//echo "SELECT $field FROM $tble WHERE $whr";exit;
	$res = mysqli_query($db, "SELECT $field FROM $tble WHERE $whr");
	$row = mysqli_fetch_array($res);
	return $row;
}

function dropdown($table, $fields, $cond='', $selected=null,$spcond=''){
	global $db;$dropdown="";
	//echo "SELECT $fields FROM $table WHERE $cond";
    $DropDown = mysqli_query($db, "SELECT $fields FROM $table WHERE $cond");
	while($row = mysqli_fetch_array($DropDown)){	
		$dropdown .= '<option value="'.$row[0].'" '.($row[0]==$selected ? 'selected' : '').'>'.$row[1].'</option>'."\n";
	}
	echo $dropdown;
}


function bpsitems_dropdown($table, $fields, $cond='', $selected=null,$spcond=''){
	global $db;$dropdown="";
	//echo "SELECT $fields FROM $table WHERE $cond";
    $DropDown = mysqli_query($db, "SELECT $fields FROM $table WHERE $cond");
	while($row = mysqli_fetch_array($DropDown)){
	$r=explode(",",$row[0]);
	$count_r=count($r);
	$i=0;
	while($i<$count_r)
	{
		$itm_name=getdata("bi_item","itm_name","itm_id=".$r[$i]);
		$dropdown .= '<option value="'.$r[$i].'" '.($r[$i]==$selected ? 'selected' : '').'>'.$itm_name.'</option>'."\n";
		$i++;
	}
//		$dropdown .= '<option value="'.$row[0].'" '.($row[0]==$selected ? 'selected' : '').'>'.$r[0]." ".$row[1].'</option>'."\n";
	}
	echo $dropdown;
}

function bsm_dropdown($table, $fields, $cond='', $selected=null,$spcond=''){
	global $db;$dropdown="";
	//echo "SELECT $fields FROM $table WHERE $cond";
	$table.="							
			left join bi_states as S on S.st_id=bi_bsm.bsm_state
			left join bi_districts as D on D.dt_id=bi_bsm.bsm_district
			left join bi_mandals as M on M.md_id=bi_bsm.bsm_mandal
			";
    $DropDown = mysqli_query($db, "SELECT $fields FROM $table WHERE $cond");
	while($row = mysqli_fetch_array($DropDown)){	
		$dropdown .= '<option value="bsm_'.$row[0].'" '.($row[0]==$selected ? 'selected' : '').'>'.$row[1]." Super Market - Address: ".$row[2].", ".$row[3].", ".$row[4].", ".$row[5].", ".$row[6].'</option>'."\n";
	}
	echo $dropdown;
}

function bshgs_dropdown($table, $fields, $cond='', $selected=null,$spcond=''){
	global $db;$dropdown="";
	//echo "SELECT $fields FROM $table WHERE $cond";
	$table.="							
			left join bi_states as S on S.st_id=bi_bshgs.sh_state
			left join bi_districts as D on D.dt_id=bi_bshgs.sh_district
			left join bi_mandals as M on M.md_id=bi_bshgs.sh_mandal
			";
	$DropDown = mysqli_query($db, "SELECT $fields FROM $table WHERE $cond");
	while($row = mysqli_fetch_array($DropDown)){	
		$dropdown .= '<option value="bshgs_'.$row[0].'" '.($row[0]==$selected ? 'selected' : '').'>'.$row[1]." SHG Store - Address: ".$row[2].", ".$row[3].", ".$row[4].", ".$row[5].", ".$row[6].'</option>'."\n";
	}
	echo $dropdown;
}


function bns_dropdown($table, $fields, $cond='', $selected=null,$spcond=''){
	global $db;$dropdown="";
	//echo "SELECT $fields FROM $table WHERE $cond";
	$table.="							
			left join bi_states as S on S.st_id=bi_bns.bns_state
			left join bi_districts as D on D.dt_id=bi_bns.bns_district
			left join bi_mandals as M on M.md_id=bi_bns.bns_mandal
			";
    $DropDown = mysqli_query($db, "SELECT $fields FROM $table WHERE $cond");
	while($row = mysqli_fetch_array($DropDown)){	
		$dropdown .= '<option value="bns_'.$row[0].'" '.($row[0]==$selected ? 'selected' : '').'>'.$row[1]." Network Store - Address: ".$row[2].", ".$row[3].", ".$row[4].", ".$row[5].", ".$row[6].'</option>'."\n";
	}
	echo $dropdown;
}
 
function lower($str){ $str = strtolower($str); return trim($str); }
function upper($str){ $str = strtoupper(lower($str)); return trim($str); }
function ucword($str){ $str = ucwords(lower($str)); return trim($str); }

function ageCalculator($dob){
	if(!empty($dob)){
		$birthdate = new DateTime($dob);
		$today = new DateTime('today');
		$age = $birthdate->diff($today)->y;
		return $age;
	}else{
		return 0;
	}
}
function dd_mm_yyyy1($str){
	if( !empty($str) && $str!='0000-00-00 00:00:00'){ $dmy = date("d-m-Y", strtotime($str)); }else{ $dmy = ""; }
	return $dmy;
}
function dd_mm_yyyy($str){
	if( !empty($str) && $str!='0000-00-00'){ $dmy = date("d-m-Y", strtotime($str)); }else{ $dmy = ""; }
	return $dmy;
}
function yyyy_mm_dd($str){
	if(!empty($str) && $str!='0000-00-00'){ $ymd = date("Y-m-d", strtotime($str)); }else{ $ymd =""; }
	return $ymd;
}

function show_msg($dismsg){
	switch($dismsg){
		case 'up':			return '<div class="msg_success">Record Updated Successfully..</div>';break;
		case 'del':			return '<div class="msg_success">Record Deleted Successfully..</div>';break;
		case 'idel':		return '<div class="msg_success">Image Deleted Successfully..</div>';break;
		case 'clo': 		return '<div class="msg_success">Record Closed Successfully..</div>';break;
		case 'susp':		return '<div class="msg_success">Record Suspended Successfully..</div>';break;
		case 'ad':			return '<div class="msg_success">Record Added Successfully..</div>';break;
		case 'sts':			return '<div class="msg_success">Record Status Changed Successfully..</div>'; break;
		case 'rest':		return '<div class="msg_success">Record Restored Successfully..</div>'; break;
		case 'ser': 		return '<div class="msg_success">Your Search Completed Sucessfully..</div>'; break;
		case 'pw_ss':		return '<div class="msg_success">Password Changed Successfully..</div>'; break;
		case 'exit':		return '<div class="msg_error">Record Already Existed</div>'; break;
		case 'pw_er':		return '<div class="msg_error">Invalid-Password ,Try Again..</div>'; break;
		case 'assign':		return '<div class="msg_success">Records Assigned Successfully..</div>'; break;
		case 'succ': 		return '<div class="msg_success">Mail sent Successfully..</div>'; break;
		case 'exe': 		return '<div class="msg_success">Recored Executed Successfully..</div>'; break;
		case 'don': 		return '<div class="msg_success">Record Done Successfully..</div>'; break;
		case 'movebill':	return '<div class="msg_success">Record Moved to Billing Successfully..</div>'; break;
		case 'donecomp':	return '<div class="msg_success">Record Moved to Completed Works..</div>'; break;
		case 'send': 		return '<div class="msg_success">Mail Sent Successfully..</div>'; break;
		case 'sendsms': 	return '<div class="msg_success">SMS Sent Successfully..</div>'; break;
		case 'wp':			return '<div class="msg_success">Daily-Work Posted Successfully..</div>'; break;
		case 'wu':			return '<div class="msg_success">Daily-Work Updated Successfully..</div>'; break;
		case 'done':		return '<div class="msg_success">Record Moved Successfully..</div>'; break;
		case 'ad_pages':	return '<div class="msg_success">Pages Added Successfully..</div>'; break;
		case 'upload':		return '<div class="msg_success">Documet Uploaded Successfully..</div>'; break;
		case 'leavesend':	return '<div class="msg_success">Leave Request Sent Successfully..</div>'; break;
		case 'leavefaild':	return '<div class="msg_error">Leave Request Failed, Please Send again..</div>'; break;
		case 'csv_up':		return '<div class="msg_success">CSV File Uploaded Successfully..'; break;
		case 'notassign':	return '<div class="msg_error">Record Not-Assigned.. Please Try again....</div>'; break;
		default: 			return '<div class="msg_error">'.$dismsg.'</div>'; break;
	}
}
extract($config);extract($ftypes);extract($sitearr);extract($samaya);if(!empty($_SESSION)){extract($_SESSION);} 
function Navigation($start,$total,$link){
	global $len;
	$en = $start +$len;
	
	if($start==0){
		if($total>0){ $start1=1; }else{ $start1=0; }
	}else{
		$start1=$start+1;
	}
	
	if($en>$total)
		$en = $total;
		if($total!=0){
			$pagecount=($total % $len)?(intval($total / $len)+1):($total / $len); 
		}else{
			$pagecount=0;
			return;
		}
		
		print "<table cellpading=0 cellspacing=0 width=100% nowrap><tr>";
		print "<td align=right>";
		
		if($en>$len){
			$en1=$start-$len;if($en1<0) {$en1=0; } 
			print "<a href='$link&start=0'>&laquo; <b>Newest</b></a>";
			print "&nbsp;<a href='$link&start=$en1'>&laquo; <b>Newer</b></a>&nbsp;";
		}else
			$numstr="";
			$curpage=intval(($start+1)/$len)+1;
			
			if($pagecount > 10){
				$istart=(intval($curpage/10) * 10)+1;
				if($istart + 10 > $pagecount)$istart=$pagecount - 9;$pagecount=10;
			}else
				$istart=1;
				for($i=$istart;$i<$pagecount+$istart;$i++){
					$ed=($i-1)*$len;
					if($start!=$ed){
						$numstr="";
						/*$numstr.= " <a href='#' class='bodytext'> $start1 - $en of $total </a><span class='bodytext'> | </span>";*/
					}else{
						/*$numstr.= "<span class='bodytext'><strong> $i </strong></span><span class='bodytext'> | </span>";*/
					}
				}	// for..
				
				print $numstr;
				
				if($en<$total){
					$en2=$start+$len;
					$oldest=$total-$len;
					print "$start1 - $en of $total";
					print "&nbsp;<a href='$link&start=$en2'><b>Older</b> &raquo;</a>";
					print "&nbsp;&nbsp;&nbsp;<a href='$link&start=$oldest'><b>Oldest</b> &raquo;</a>";
				}else{
					print "$start1 - $en of $total";
				}
				print "</td></tr></table>";
}

// RNS

function rns_fileup($fileup,$sree,$dir1,$ft,$size,$t,$p,$oldfile="oldfile"){ // File Uploading
	global $file_up,$getid;$file_up=array();$filename="";$errmsgimg="";$path1="";$path="";
	//$dirname = date("F-Y");$filepath = $dir1."/{$dirname}/";  $dir=RNSDD.RNSUP.$dir1."/{$dirname}";  	// Monthwise folder creation
	$filepath = $dir1."/";  $dir=RNSDD.RNSDD.RNSUP.$dir1;//$filepath = $dir1."/";  $dir=RNSDD.RNSUP.$dir1; 				// Direct upload to folder
	if (file_exists($dir)) { } else { mkdir($dir, 0777); }												// for Directory Creation

	$ext = substr(strrchr($sree, '.'), 1);
	if(in_array($ext, explode(',',$ft))) {
		if($_FILES[$fileup]["size"]<=$size) { 
			if(isset($_FILES[$fileup]["name"])) {
				if(!empty($getid) && !empty($_POST[$oldfile])) { 
				 //$doc=getdata($t,$p.'avatar',$p."id=".$_GET['id']."");
				 //@unlink(RNSDD.RNSDD.RNSUP.$filepath.$doc);
				 $doc=$_POST[$oldfile];
				 @unlink(RNSDD.RNSDD.RNSUP.$doc);
				}
					//$filename=strtolower(trim($_POST['name']));
					$filename=substr($_FILES[$fileup]["name"],0,strpos($_FILES[$fileup]["name"],'.'));
					$commonname=str_replace(" ","_",$filename).time();
					$filename=$commonname.strstr($_FILES[$fileup]['name'],'.');
					$path1=RNSDD.RNSDD.RNSUP.$filepath.$filename; 
					$path=$filepath.$filename;
					if(!move_uploaded_file($_FILES[$fileup]['tmp_name'],$path1))
					{
						$path1="";
					}
					chmod($path1,0777);unset($_POST[$oldfile]);
			}  	
		} else {
			$path=$_POST[$oldfile];unset($_POST[$oldfile]);
		}//
		
	} else { $errmsgimg="Please Upload Valid File"; }
	$file_up=array('errmsgimg'=>$errmsgimg,'path'=>$path,'path1'=>$path1);return $file_up;
}// End of File Uploading



function rns_designation($s='1'){
	global $getdesig;$getdesig=array();$p='desg_';$t="si_designations";
	if(!empty($s)) {$st_cond=$s;} else {$st_cond=" and ".$p."status=1";}
	$qur="select ".$p."id,".$p."name from $t where $st_cond order by ".$p."order_by";
	$res=Query($qur);
	while($row=Fetch($res)) { 
	$getdesig[$row[$p."id"]]=array('name'=>$row[$p."name"]);
	}
	return $getdesig;
}
function rns_department($s='1'){
	global $getdept;$getdept=array();$p='dept_';$t="si_departments";
	if(!empty($s)) {$st_cond=$s;} else {$st_cond=" and ".$p."status=1";}
	$qur="select ".$p."id,".$p."name from $t where $st_cond order by ".$p."order_by";
	$res=Query($qur);
	while($row=Fetch($res)) { 
	$getdept[$row[$p."id"]]=array('name'=>$row[$p."name"]);
	}
	return $getdept;
}
function rns_bank($s=''){
	$p='bnk_';$t="ah_bank";
	if(!empty($s)) {$st_cond=$s;} else {$st_cond="  ".$p."status=1";}
	$qur="select * from $t where $st_cond order by ".$p."orderby";
	$res=Query($qur);
	$count = NumRows($res);				
	while($row=Fetch($res)) { 
		$result[$row[$p."id"]]=$row;
	}	
	return $result;
}
function rns_emp($c='',$s='1'){
	$result=array();$p='emp_';$t="hf_employees";
	if(!empty($s)) {$st_cond=$s;} else {$st_cond=" and ".$p."status=1";}
	$qur="select ".$p."id,concat(".$p."fname,' ',".$p."lname) as name from $t where $st_cond $c order by ".$p."fname";
	$res=Query($qur);
	while($row=Fetch($res)) { 
	$result[$row[$p."id"]]=array('name'=>$row["name"]);
	}
	return $result;
}

function rns_emptype($s='1'){
	global $get_emptype;$get_emptype=array();$p='empt_';$t="va_employees_type";
	if(!empty($s)) {$st_cond=$s;} else {$st_cond=" and ".$p."status=1";}
	$qur="select ".$p."id,".$p."type from $t where $st_cond and empt_id not in(1) order by ".$p."order_by";
	$res=Query($qur);
	while($row=Fetch($res)) { 
	$get_emptype[$row[$p."id"]]=array('name'=>$row[$p."type"]);
	}
	return $get_emptype;
}

function rns_getdata($t,$arg,$cond){
	$qur="select $arg from $t where $cond";
	$res=Query($qur);
	$cnt=numRows($res);
	if($cnt>0) { 
	while($row=Fetch($res)) { 
		$result[$row[strstr($arg, ",", true)]]=$row;
	}
	return $result;
	}
}
function rns_max($t,$p,$c="1"){
	$orderby=getdata($t,"max(".$p.")",$c);
	if($orderby!="") { $orderby=$orderby+1; } else {  $orderby=1; }
	return $orderby;
}
function rns_check_record($rec){ if(empty($rec) || $rec=="0000-00-00") { echo " class='hidden'"; } } // For hidding Empty value Records.
function rnsreplace($txt){
	$rnsser=array("/n","  ","'");
	$rnsreplace=array("'"," ","&#39");
	$rnstext2=str_replace($rnsser,$rnsreplace,$txt);
	$rnstext1=nl2br($rnstext2);
	$rnstext= preg_replace('/\s\s+/', ' ', $rnstext1);
    return  trim($rnstext);
}
function rnsmclink($text) {
    $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '<a href="\\1" target="_blank">\\1</a>', $text);
    $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '\\1<a href="http://\\2" target="_blank">\\2</a>', $text);
    $text = eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})', '<a href="mailto:\\1" target="_blank">\\1</a>', $text);
    return $text;
}
function rnsb64ende($s,$t=0){ if($t==0){ $v=base64_encode($s);$v = strtr($v, '+/=', '-_,'); } else { $v = strtr($s, '-_,', '+/=');$v=base64_decode($v); } return $v; }
function rns_print_pre($arr){print("<pre>".print_r($arr,true)."</pre>");}
function rns_drop_foreach($val1,$ids='',$title='',$type1=''){ 
	if(!empty($title)) { 	
		print"<option value=''>Select ".$title."</option>";
	}
	if($type1=="multi") { 
		foreach($val1 as $id =>$name) { 
			if(is_array($ids) && in_array($id, $ids)) 
				print "<option value=\"".$id."\" selected>".stripslashes($name)."</option>\r\n";
			else 
				print "<option value=\"".$id."\">".stripslashes($name)."</option>\r\n";
		} 
	} else {
		foreach($val1 as $id =>$name) { 
			if($ids==$id) 
				print "<option value=\"".$id."\" selected>".stripslashes($name)."</option>\r\n";
			else 
				print "<option value=\"".$id."\">".stripslashes($name)."</option>\r\n";
		}
	}	
}
function rns_drop_foreach_mul($val1,$selids,$title){ 
		print"<option value=''>Select ".$title."</option>";
	foreach($val1 as $id =>$name) { 
	if($selids==$id) 
		print "<option value=\"".$id."\" selected>".stripslashes($name['name'])."</option>\r\n";
	else 
		print "<option value=\"".$id."\">".stripslashes($name['name'])."</option>\r\n";
	}
}
function rns_drop_number($name,$title,$id,$n,$rnscond='required style="width:310px"'){ // Changed function name from fee_installments
		print'<select name="'.$name.'" id="'.$name.'" '.$rnscond.'>';
		print"<option value=''>".$title."</option>";
	for($i=1;$i<=$n;$i++) { 
	if($i==$id) 
		print "<option value=\"".$i."\" selected>".$i."</option>\r\n";
	else 
		print "<option value=\"".$i."\">".$i."</option>\r\n";
	}
	print'</select>';
}

function rns_checkbox_foreach($val1,$cname,$selids){ 
	$sel_ids=explode(",",$selids);
	print '<ul>';
	foreach($val1 as $id =>$name) {  
	if(in_array($id,$sel_ids)) { $checked="checked"; } else { $checked=""; }
		print '<li style="float:left; margin-right:15px; margin-bottom:10px;">';
		print '<input name="'.$cname.'[]" id="'.$cname.'" type="checkbox" value="'.$id.'" style="margin-right:5px" '.$checked.'><label for="'.$id.'">'.stripslashes($name).'</label>';
		print '</li>';
	}
	print '</ul>';	
}
function rns_ClearSession($prefix='ser_'){
	foreach($_SESSION as $key => $value) {
        if (strpos($key, $prefix) === 0) {
          unset($_SESSION[$key]); //add this line
        }
    }
}
function rnsNumDropdown($name,$title,$selid,$n,$Rule='',$r=''){ 
		if(empty($r)) {$r="required='required'";} else { $r=""; } 
		print'<select name="'.$name.'" id="'.$name.'" style="width: 177px" placeholder="'.$title.'" '.$r.'>';
		print"<option value=''>".$title."</option>";
	if(!empty($Rule) && !empty($selid)) {
		 print "<option value=\"".$selid."\" selected>".$selid."</option>\r\n";
	} else { 	
		for($i=1;$i<=$n;$i++) { 
		if($i==$selid) 
			print "<option value=\"".$i."\" selected>".$i."</option>\r\n";
		else 
			print "<option value=\"".$i."\">".$i."</option>\r\n";
		}
	}
	print'</select>';
}

function addNumberSuffix($num) {
    if (!in_array(($num % 100),array(11,12,13))){
      switch ($num % 10) {
        // Handle 1st, 2nd, 3rd
        case 1:  return $num.'st';
        case 2:  return $num.'nd';
        case 3:  return $num.'rd';
      }
    }
    return $num.'th';
}
function rnsPlural( $amount, $singular = '', $plural = 's' ) { //rnsPlural(15)
    return ( $amount == 1 ) ? $singular : $plural;
}
function rnsNumPad($n,$c) { //rnsNumPad(4,5); = 0005
    $num_padded = sprintf("%0".$n."s", $c);
	return $num_padded;
}

function rnsSplitArray($arr){
$result = array();
foreach ($arr as $k => $v) {
    $name = explode('_', $k);
    $newkey = array_shift($name);
    $newname = implode('_', $name);
    $result[$newkey][$newname] = $v;
}
return $result;
}

function rns_QueryString_dupremov($qstring){ // Remove Duplicate QueryStrings from URL
	if(!empty($qstring)) { 
	$vars = explode('&', $qstring);
	$final = array();
	if(!empty($vars)) {
		foreach($vars as $var) {
			$parts = explode('=', $var);
	
			$key = $parts[0];
			if(!empty($parts[1])) { $val = $parts[1]; } else {$val="";} 
	
			if(!array_key_exists($key, $final) && !empty($val))
				$final[$key] = $val;
		}
	}
	return http_build_query($final);
	} else { return false; }
}
function rns_QueryString_first($incomingURL){ // Getting first QueryStrings from URL with file name
	preg_match('/[^&]+/', $incomingURL, $match);
	return $outgoingURL = $match[0];
}
//mysql_close($link);

function rns_drop_Array($arr,$selids,$title='Select'){ 
		print"<option value='0'>".$title."</option>";
	foreach($arr as $id =>$name) { 
	if($selids==$id && $id!=0) 
		print "<option value=\"".$id."\" selected>".stripslashes($name)."</option>\r\n";
	else if($id!=0) 
		print "<option value=\"".$id."\">".stripslashes($name)."</option>\r\n";
	}
}

function readMoreFunction_LS($news_desc) {  
	$chars =77;  
	$news_desc = substr($news_desc,0,$chars);  
	$news_desc = substr($news_desc,0,strrpos($news_desc,' '));  
	$news_desc = $news_desc;  
	return $news_desc." ....";  
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

function generateCode_ls($limit){  //random number
	$code = '';
	for($i = 0; $i < $limit; $i++) { $code .= mt_rand(0, 9); }
	return $code;
}

function num_format($ls){
   return   number_format(floatval(($ls)));
}


/*
function Get_RefNames($tble,$field,$whr,$count){
	global $db;
	$result='';
	//echo "SELECT $field FROM $tble WHERE $whr";
	//exit;
	$res = mysqli_query($db, "SELECT $field FROM $tble WHERE $whr");
	while($row=mysqli_fetch_array($res))
	{
		$result.=$row['bib_name']."(".$row['bib_refno'].")";
		$whr="bib_referalno='".$row['bib_refno']."'";
		echo "<br>Level 1: <br>".$result."<br>";
		Get_RefNames($tble,$field,$whr,$count);
	}
}
*/

// Vertical Display of Ref Names for levels display at WALLET
function Get_RefNames($tble,$field,$whr,$count){
	global $db;
	$result='';
	//echo "SELECT $field FROM $tble WHERE $whr";
	//exit;
	$res = mysqli_query($db, "SELECT $field FROM $tble WHERE $whr");
	while($row=mysqli_fetch_array($res))
	{
		$result.=$row['bib_name']."<br>(".$row['bib_refno'].")";
		$whr="bib_referalno='".$row['bib_refno']."'";
		$res1 = mysqli_query($db, "SELECT $field FROM $tble WHERE $whr");
		while($row1=mysqli_fetch_array($res1))
		{
			$result1.=$row1['bib_name']." (".$row1['bib_refno'].") ,";
			$whr="bib_referalno='".$row1['bib_refno']."'";
			$res2 = mysqli_query($db, "SELECT $field FROM $tble WHERE $whr");
			while($row2=mysqli_fetch_array($res2))
			{
				$result2.=$row2['bib_name']." (".$row2['bib_refno'].") ,";
			}
		}
/*		echo "Level 1:".$result; 
		$disp1=preg_split ("/\,/", $result1);
		$sno=0;
		while($disp1[$sno]!=''){
			echo $disp1[$sno];
			$sno++;
		}
		echo "Level 3: ".$result2;
*/		
		?>
		<p>&nbsp;</p>
        <?php $maxcol=4; ?>
		<table class="table table-bordered table-hover text-center wallet-table-brdrs table-responsive">
		<tr><td>Level 1</td> 
		<?php
		$disp=preg_split ("/\,/", $result);
		$sno=0;
		while($disp[$sno]!=''){
			echo "<td>".$disp[$sno]."</td>";
			$sno++;
		}
		while($sno<$maxcol) { echo "<td></td>"; $sno++; }
		?>
        <tr><td>Level 2</td> 
		<?php
		$disp1=preg_split ("/\,/", $result1);
		$sno=0;
		while($disp1[$sno]!=''){
			echo "<td>".$disp1[$sno]."</td>";
			$sno++;
		}
		while($sno<$maxcol) { echo "<td></td>"; $sno++; }
		?>
        </tr>
        <tr><td>Level 3</td> 
		<?php
		$disp2=preg_split ("/\,/", $result2);
		$sno=0;
		while($disp2[$sno]!=''){
			echo "<td>".$disp2[$sno]."</td>";
			$sno++;
		}
		while($sno<$maxcol) { echo "<td></td>"; $sno++; }
		?>
        </tr>
        
        </table>
		
		<?php
	}
}

function Get_ReferalName($referalno)
{
	$res = Query("select * from bi_biba	where bib_refno='".$referalno."'");
	$vrow = Fetch($res);
	return $vrow['bib_name'];
}

function Get_RefName($refno)
{
	$res = Query("select * from bi_biba	where bib_refno='".$refno."'");
	$vrow = Fetch($res);
	return $vrow['bib_name'];
}

function Get_Levels($result)
{
	global $db;
		$disp=preg_split ("/\,/", $result);
		$sno=0;
		while($disp[$sno]!=''){
//			echo $disp[$sno]."<br><br>";
			$where_con.="bib_referalno='".$disp[$sno]."' or ";
			$sno++;
		}
			$where_con=chop($where_con," or ");
//			echo $where_con;
			$result='';
			$sno_disp=1;
//			echo "select * from bi_biba	where ".$where_con;
			$res = mysqli_query($db, "select * from bi_biba	where ".$where_con);
			while($row=mysqli_fetch_array($res))
			{
				$result.=$row['bib_refno'].",";
				echo $sno_disp.") ".Get_RefName($row['bib_refno'])."<br>Reffered By:<br>".Get_ReferalName($row['bib_referalno'])."<br>(".$row['bib_referalno'].")<br><br>";
				$sno_disp++;
			}
		return $result;
}

function default_sidebar()
{
	$myacc_class="class=''"; 
	$wallet_class="class=''";
	$chpwd_class="class=''"; 
	$paydtls_class="class=''";
	$purchasesdtls_class="class=''";
	$productdtls_class="class=''";
}

function gstvalues($gsttype,$gstp)
{
	//CGST and SGST
	if($gsttype==1) 
	{ 
		$cgst=($gstp/2);
		$sgst=($gstp/2);
		$igst='';
	}elseif($gsttype==2) 
	{
		//IGST
		$cgst='';
		$sgst='';
		$igst=($gstp);
	} 
	$gstvalues=$cgst.",".$sgst.",".$igst;
	return $gstvalues;
}

function get_bps_price($bp_pro_cost,$bp_process_cost,$bp_mfg_m,$bp_bpc,$bp_bm,$bp_mrp,$bp_gst,$bp_gtype,$bp_disc)
{

/*
get_bps_price($row['bpsprod_procurement_cost'],$row['bpsprod_process_cost'],$row['bpsprod_mfg_margin'],$row['bpsprod_bpc'],$row['bpsprod_bm'],$row['bpsprod_mrp'],$row['bpsprod_gst'],$row['bpsprod_gsttype'],$row['bpsprod_disc'])
*/
	
	$procurement_cost=round($bp_pro_cost,2);
	$process_cost=round($bp_pro_cost,2)*(round($bp_process_cost,2)/100);
	$mfg_margin=(round($procurement_cost,2)+round($process_cost,2))*(round($bp_mfg_m,2)/100);
	$msp=round($procurement_cost,2)+round($process_cost,2)+round($mfg_margin,2);
	$without_gst=round($bp_mrp,2)/((100+round($bp_gst,2))/100);
	$disc_amt=round($bp_mrp,2)*(round($bp_disc,2)/100);
	$without_gst_disc=round($without_gst,2)-round($disc_amt,2);
	$bairisons_price=round($msp,2)+(round($msp,2)*(round($bp_bpc,2)/100));
	$margin_price=round($without_gst,2)-(round($msp,2)+(round($msp,2)*(round($bp_bpc,2)/100)));
	$bmp_oncost=round($margin_price,2)/round($bairisons_price,2);
	$bsper=(round($bmp_oncost,2)*100)*(round($bp_bm,2)/100);
	$bspprice=round($bairisons_price,2)*(round($bsper,2)/100);
	$bsp_withoutgst=round($bairisons_price,2)+round($bspprice,2);
	$bsp_storeprice=round($bsp_withoutgst,2)+(round($bsp_withoutgst,2)*(round($bp_gst,2)/100));
	$margin_disc=round($without_gst_disc,2)-round($bsp_withoutgst,2);
	$margin_per=(round($margin_disc,2)/round($bsp_withoutgst,2))*100;
	$margin_totqty=round($margin_disc,2);

	//$margin_totqty=$margin_disc*$row['bpsprod_qty'];
	//$r=round($bsp_storeprice,2);
//	alert($margin_totqty); exit;
	return round($margin_totqty,2);
//	return round($bsp_withoutgst,2);
}

function get_multiple_itemnames($item_list){
	global $db;
	
	$bps_item= explode(',',$item_list);
	foreach($bps_item as $itemnames)
	{
	   $itemnames_disp=getdata("bi_item","itm_name","itm_id='".$itemnames."'");
	   $item_disp.=$itemnames_disp.",";
	}
	$item_display=rtrim($item_disp,",");

	return $item_display;
}



function get_subcat_details($subcat_id){
	global $db;
	
switch ($subcat_id)
{
	case 1:		//Cardiology
			echo "<p><strong>This may be caused by high blood pressure, smoking, diabetes mellitus, lack of exercise, obesity, high blood cholesterol, poor diet, excessive alcohol consumption, and poor sleep.</strong> </p>
			<p>Cardiovascular disease (CVD) is a class of diseases that involve the heart or blood vessels. CVD includes coronary artery diseases (CAD) such as angina and myocardial infarction (commonly known as a heart attack).</p>
			<p>Other CVDs include stroke, heart failure, hypertensive heart disease, rheumatic heart disease, cardiomyopathy, abnormal heart rhythms, congenital heart disease, valvular heart disease, carditis, aortic aneurysms, peripheral artery disease, thromboembolic disease, and venous thrombosis.</p>";
			break;
	case 2:		//Neurology
			echo "<p><strong>Neurology is a branch of medicine that deals with the diagnosis and treatments of all diseases involving the central and peripheral nervous system  such as brain, spinal cord and nerve diseases.</strong> </p>
			<p>The neurologists assess the patients motor strength their sensation, reflexes, coordination, gait, cognitive functions, cranial nerves.</p>
			<p>Several diagnostic procedures involved with neurology includes imaging studies such as computed axial tomography scans (CAT), Magnetic resonance imaging (MRI), EEG and EMG.</p>
			<p>The neurologists frequently perform lumbar punctures to assess the characteristics of patients cerebrospinal fluid. Some the common diseases associated are neuropathy, stroke, dementia, seizures and epilepsy, Alzheimers disease, Attention deficit hyperactivity disorder (ADHD), Parkinsons disease, head trauma, sleep disorders, neuromuscular diseases and tumours of nervous system.</p>";
			break;
	case 3:		//Nephrology
			echo "<p><strong>Nephrology is a speciality related to study of kidneys,their functioning and the diseases related to it. Nephrologists deal with diseases such as diabetes ,autoimmune disease and systemic disease that occur as a result of kidney disease,such as renal osteodystrophy and hypertension.</strong> </p>
			<p>Nephrologists treat the diagnosis and treatment of electrolyte imbalances and patients who require Dialysis, renal transplant ,renal replacement therapies, polycystic kidney disease ,kidney stones, acute kidney injury.</p>
			<p>Basic diagnostic tests required in nephrology are urinalysis,blood tests which are used to check the concentration of hemoglobin, white count, platelets, sodium, potassium, chloride, bicarbonate, urea, creatinine, albumin, calcium, magnesium, phosphate, alkaline phosphatase and parathyroid harmone in blood.</p>";
			break;
	case 4:		//Obstetrics
			echo  "<p><strong>Obstetrics is a medical speciality involving pregnancy ,child birth ,postpartum period and its complications. </strong> </p>
			<p>Gynecology is a speciality that includes the problems associated with the female reproductive system i.e, vagina,uterus,ovaries and breasts.</p>
			<p>It includes subspecialities such as</p>
				<li>Maternal Fetal medicine,</li>
				<li>Reproductive Endocrinology</li> 
				<li>Infertility</li>
				<li>Gynecological Oncology</li>
				<li>Advanced laproscopic surgeries</li>
				<li>Family planning</li>
				<li>Menopausal and geriatric gynecology</li>";
			break;
	case 5:		//Rheumatology
			echo "<p><strong> Rheumatology s a branch of medicine devoted to the diagnosis and therapy of rheumatic diseases. Physicians who have undergone formal training in rheumatology are called rheumatologists. Rheumatologists deal mainly with immune-mediated disorders of the musculoskeletal system, soft tissues, autoimmune diseases, vasculitides, and inherited connective tissue disorders.</strong> </p>
			<p>Rheumatologists treat arthritis, autoimmune diseases, pain disorders affecting joints, and osteoporosis. There are more than 200 types of these diseases, including rheumatoid arthritis, osteoarthritis, gout, lupus, back pain, osteoporosis, and tendinitis. Some of these are very serious diseases that can be difficult to diagnose and treat. They treat soft tissue problems related to musculoskeletal system sports related soft tissue disorders.</p>";
			break;
	case 6:		//Radiology
			echo "<p><strong> Radiology is the medical discipline that uses medical imaging to diagnose and treat diseases within the bodies of animals and humans.</strong> </p>
			<p>A variety of imaging techniques such as X-ray radiography, ultrasound, computed tomography (CT), nuclear medicine including positron emission tomography (PET), fluoroscopy, and magnetic resonance imaging (MRI) are used to diagnose or treat diseases. Interventional radiology is the performance of usually minimally invasive medical procedures with the guidance of imaging technologies such as those mentioned above.</p>
			<p>The modern practice of radiology involves several different healthcare professions working as a team. The radiologist is a medical doctor who has completed the appropriate post-graduate training and interprets medical images, communicates these findings to other physicians by means of a report or verbally, and uses imaging to perform minimally invasive medical procedures.</p>
			<p>Interventional radiology (IR or sometimes VIR for vascular and interventional radiology) is a subspecialty of radiology in which minimally invasive procedures are performed using image guidance. Some of these procedures are done for purely diagnostic purposes (e.g., angiogram), while others are done for treatment purposes (e.g., angioplasty).</p>
			<p>The basic concept behind interventional radiology is to diagnose or treat pathologies, with the most minimally invasive technique possible. Minimally invasive procedures are currently performed more than ever before. These procedures are often performed with the patient fully awake, with little or no sedation required. Interventional radiologists and interventional radiographers.diagnose and treat several disorders, including peripheral vascular disease, renal artery stenosis, inferior vena cava filter placement, gastrostomy tube placements, biliary stents and hepatic interventions. Radiographic images, fluoroscopy, and ultrasound modalities are used for guidance, and the primary instruments used during the procedure are specialized needles and catheters. </p>";
			break;
	case 7:		//Oncology
			echo "<p><strong>Oncology is a branch of medicine that deals with the prevention, diagnosis and treatment of cancer.</strong> </p>
			<p>Cancer specialists include surgical oncologists, radiation oncologists, medical oncologists, pathologists, radiologists.</p>
			<p>The diagnostic and staging investigations depend upon the size and type of malignancy.</p>
			<p>The treatments includes chemotherapy ,stem cell transplantation, radiation therapy and immunotherapy.</p>";
			break;
	case 8:		//Dermatologists
			echo "<p><strong>The medical speciality that studies the anatomy and physiology of the integumentary system and uses diagnostic tests,medical and surgical procedures, and drugs to treat integumentary diseases.</strong> </p>
			<p>Dermatologists have been leaders in the field of cosmetic surgery. Some dermatologists complete fellowships in surgical dermatology. Many are trained in their residency on the use of botulinum toxin, fillers, and laser surgery. Some dermatologists perform cosmetic procedures including liposuction, blepharoplasty, and face lifts.Most dermatologists limit their cosmetic practice to minimally invasive procedures.</p>
			<p>Each year 2-3 million non-melanoma and 132,000 melanoma skin cancers occur globally according to statistics from the WHO.</p>";
			break;
	case 9:		//Urology
			echo "<p><strong> Urology also known as genitourinary surgery, is the branch of medicine that focuses on surgical and medical diseases of the male and female urinary-tract system and the male reproductive organs. Organs under the domain of urology include the kidneys, adrenal glands, ureters, urinary bladder, urethra, and the male reproductive organs (testes, epididymis, vas deferens, seminal vesicles, prostate, and penis).</strong> </p>
			<p>Urology combines the management of medical (i.e., non-surgical) conditions, such as urinary-tract infections and benign prostatic hyperplasia, with the management of surgical conditions such as bladder or prostate cancer, kidney stones, congenital abnormalities, traumatic injury, and stress incontinence.</p> 
			<p>Female urology - Female urology is a branch of urology dealing with overactive bladder, pelvic organ prolapse, and urinary incontinence. Many of these physicians also practice neurourology and reconstructive urology as mentioned above. Female urologists (many of whom are men) complete a 1–3-year fellowship after completion of a 5–6-year urology residency.Thorough knowledge of the female pelvic floor together with intimate understanding of the physiology and pathology of voiding are necessary to diagnose and treat these disorders. Depending on the cause of the individual problem, a medical or surgical treatment can be the solution. Their field of practice heavily overlaps with that of urogynecologists, physicians in a sub-discipline of gynecology, who have done a three-year fellowship after a four-year OBGYN residency.</p>
			<p>Andrology -  the medical specialty that deals with male health, particularly relating to the problems of the male reproductive system and urological problems that are unique to men such as prostate cancer, male fertility problems, and surgery of the male reproductive system. It is the counterpart to gynaecology, which deals with medical issues that are specific to female health, especially reproductive and urologic health.</p>";
			break;
	case 10:	//Pediatrics
			echo "<p><strong>Pediatrics is a branch of medicine that involves medical care of infants, adolescents and children.</strong> </p>
			<p>The doctor who specializes in this area is known as pediatrician. The specialities for  children includes pediatric surgery, urology, radiology, neuro surgery, psychiatry, dentistry, child neurology, Neonatology.</p>
			<p>Specialising in the care of ill or premature new born babies in the 1st 28 days of life is known as Neonatal care.</p>
			<p>Most pediatric doctors are specialised to treat young patients until the age of 18.</p>";
			break;
	case 11:	//Anesthesiology
			echo "<p><strong>This allows patients to undergo surgery and other procedures without the distress and pain they would otherwise experience.</strong> </p>
			<p>Anesthesiology is the medical specialty concerned with the total perioperative care of patients before, during and after surgery. It encompasses anesthesia, intensive care medicine, critical emergency medicine, and pain medicine.</p>
			<p>Their role can extend far beyond the traditional role of anesthesia care in the operating room, including fields such as providing pre-hospital emergency medicine, running intensive care units, transporting critically ill patients between facilities, and prehabilitation programs to optimize patients for surgery.</p>";
			break;
	case 12:	//Pulmonology
			echo "<p><strong>Pulmonology is also termed as respiratory medicine or chest medicine. The pulmonology is involved in treating patients who need life support and mechanical ventilation.</strong> </p>
			<p>Pulmonologists are specially trained in treating the diseases and abnormalities of the chest such as pneumonia,asthma , tuberculosis and emphysema.</p>
			<p>Many surgeries and procedures involved in pulmonology are bronchoscopy, pleuroscopy, spirometry. Interventional pulmonology, critical care medicine are done by the specialists in the team. </p>
			<p>The pulmonologists played a vital role in treating the patients effected with SARS-COV 1 and 2 and the comorbidities associated with it.</p> ";
			break;
	case 13:	//ENT Surgery
			echo "<p><strong>These commonly include functional diseases that affect the senses and activities of eating, drinking, speaking, breathing, swallowing, and hearing.</strong> </p>
			<p>Ear, nose, and throat (ENT), is a surgical subspecialty within medicine that deals with the surgical and medical management of conditions of the head and neck. Doctors who specialize in this area are called otorhinolaryngologists, head and neck surgeons. Patients seek treatment from an otorhinolaryngologist for diseases of the ear, nose, throat, base of the skull, head, and neck.</p>
			<p>Additionally , ENT surgery encompasses the surgical management and reconstruction of cancers and benign tumors of the head and neck as well as plastic surgery of the face and neck.</p>";
			break;
	case 14:	//General Surgery
			echo "<p><strong> General surgery is a surgical specialty that focuses on abdominal contents including the esophagus, stomach, small intestine, large intestine, liver, pancreas, gallbladder, appendix and bile ducts, and often the thyroid gland. They also deal with diseases involving the skin, breast, soft tissue, trauma, peripheral artery disease and hernias and perform endoscopic procedures such as gastroscopy and colonoscopy.</strong> </p>
			<p> Different types of surgeries includes </p> 
			<p>Laparoscopic surgery - this is a relatively new specialty dealing with minimal access techniques using cameras and small instruments inserted through 3 to 15mm incisions. Robotic surgery is now evolving from this concept (see below). Gallbladders, appendices, and colons can all be removed with this technique. Hernias are also able to be repaired laparoscopically. Bariatric surgery can be performed laparoscopically and there a benefits of doing so to reduce wound complications in obese patients. General surgeons that are trained today are expected to be proficient in laparoscopic procedures.</p>
			<p>Colorectal surgery - General surgeons treat a wide variety of major and minor colon and rectal diseases including inflammatory bowel diseases (such as ulcerative colitis or Crohn's disease), diverticulitis, colon and rectal cancer, gastrointestinal bleeding and hemorrhoids.</p>
			<p>Breast surgery - General surgeons perform a majority of all non-cosmetic breast surgery from lumpectomy to mastectomy, especially pertaining to the evaluation, diagnosis and treatment of breast cancer.</p>
			<p>Vascular surgery - General surgeons can perform vascular surgery if they receive special training and certification in vascular surgery. Otherwise, these procedures are typically performed by vascular surgery specialists. However, general surgeons are capable of treating minor vascular disorders.</p>";
			break;
	case 15:	//Gastrointestinal
			echo "<p><strong>Gastrointestinal (GI) symptoms and disease are extremely common in the general population. It is a medical speciality that deals with structure,function,diagnosis and treatment of diseases of stomach and intestines .</strong> </p>
			<p>Advanced endoscopy, sometimes called interventional or surgical endoscopy, is a sub-specialty of gastroenterology that focuses on advanced endoscopic techniques for the treatment of pancreatic, hepatobiliary, and gastrointestinal disease.</p>
			<p>The diagnostics included in gastroenterology constitutes colonoscopy, esophagogastroduodenoscopy,endoscopic retrograde cholangiopancreatography,endoscopic ultrasound and live biopsy.</p>";
			break;
	case 16:	//General Medicine
			echo "<p><strong>Internal medicine or general internal medicine  is the medical specialty dealing with the prevention, diagnosis, and treatment of internal diseases. Physicians specializing in internal medicine are called physicians or family practitioners.</strong> </p>
			<p>This group of physicians treat a single - organ disease or multisystem dysfunctions and any different comorbidities of the patients.</p>
			<p>Physicians are interlinked with many sub specialities such as cardiology ,critical care medicine ,gastroenterology,nephrology,pulmonology.</p>";
			break;
	case 17:	//Emergency Medicine
			echo "<p><strong>Emergency medicine is the medical speciality concerned with the care of illnesses or injuries requiring immediate medical attention. Emergency physicians continuously learn to care for unscheduled and undifferentiated patients of all ages.</strong> </p>
			<p>They are primarily responsible for initiating resuscitation and stabilization and performing the initial investigations and interventions necessary to diagnose and treat illnesses or injuries in the acute phase. Emergency physicians generally practise in hospital emergency departments, pre-hospital settings via emergency medical services, and intensive care units. Still, they may also work in primary care settings such as urgent care clinics.</p>";
			break;
	case 18:	//Oral Medicine and Radiology
			echo "<p><strong>Oral Medicine and Radiology is the specialty that focuses on the diagnosis and medical management of complex diagnostic and medical disorders affecting the mouth and jaws and the Radiology part of the subject equips the dentists in the field of diagnosis using conventional and advanced imaging methods</strong></p>";
			break;
	case 19:	//Oral and Maxillo Facial Surgery
			echo "<p><strong>Maxillofacial surgery is a special type of dentistry. It involves operations to correct diseases, injuries and defects of your face, jaw or mouth. Maxillofacial surgeons are advanced specialists who diagnose and treat problems with: Bones and tissues of your jaw and lower face (maxillofacial area).</strong></p>";
			break;
	case 20:	//Pedodontics and Preventive Dentistry
			echo "<p><strong>Preventive Dentistry and Pedodontics are considered to be age-old specialties providing primary and comprehensive therapeutic and preventive oral health care for children in their adolescence, infants and even those who require special healthcare needs.</strong></p>";
			break;
	case 21:	//Orthodontics
			echo "<p></strong>Orthodontics is a branch of dentistry that treats malocclusion, a condition in which the teeth are not correctly positioned when the mouth is closed. This results in an improper bite. An orthodontist specializes in making the teeth straight.</strong></p>";
			break;
	case 22:	//Endodontics
			echo "<p><strong>Endodontics, in dentistry, diagnosis, treatment, and prevention of diseases of the dental pulp and the surrounding tissues. (The dental pulp is soft tissue in the centre of the tooth; it contains the nerve, blood and lymphatic vessels, and connective tissue.)</strong></p>";
			break;
	case 23:	//Periodontist
			echo "<p><strong>Periodontics is the dental specialty focusing exclusively in the inflammatory disease that destroys the gums and other supporting structures around the teeth. A periodontist is a dentist who specializes in the prevention, diagnosis, and treatment of periodontal, or disease, and in the placement of dental implants.</strong></p>";
			break;
	case 24:   //Prosthodontist
			echo "<p><strong>A prosthodontist is a dentist who specializes in treating complex dental and facial matters, including the restoration and replacement of missing or damaged teeth with artificial devices. They are highly trained in dental implants, crowns, bridges, dentures, jaw disorders, and more.</strong></p>";
			break;
	case 25: //implantology
			echo "<p><strong>The branch of dentistry dealing with the permanent implantation or attachment of artificial teeth in the jaw.</strong></p>";
			break;
	case 26:	//Public Health Dentistry
			echo "<p><strong>Dental Public Health (DPH) is a para-clinical specialty of dentistry that deals with the prevention of oral disease and promotion of oral health.</strong></p>";
			break;
	case 27:	//oral pathology
			echo "<p><strong>Oral pathology is the specialty of dentistry and discipline of pathology that deals with the nature, identification, and management of diseases affecting the oral and maxillofacial regions.</strong></p>";
			break;
	default:
			echo "<p><strong>Under Progress</strong> </p>";
			break;
}
	return true;
}


function get_subcat_image($subcat_id){
	global $db;
	
switch ($subcat_id)
{
	case 1:
			echo "<img src='img/gallery/cardiology/1.png' alt=''>";
			break;
	case 2:
			echo "<img src='img/gallery/neurology/1.png' alt=''>";
			break;
	case 3:
			echo "<img src='img/gallery/nephrology/1.png' alt=''>";
			break;
	case 4:
			echo "<img src='img/gallery/gynaecology/1.png' alt=''>";
			break;
	case 5:
			echo "<img src='img/gallery/rheumatology/1.png' alt=''>";
			break;
	case 6:
			echo "<img src='img/gallery/radiology/1.png' alt=''>";
			break;
	case 7:
			echo "<img src='img/gallery/oncology/1.png' alt=''>";
			break;
	case 8:
			echo "<img src='img/gallery/dermatology/1.png' alt=''>";
			break;
	case 9:
			echo "<img src='img/gallery/urology/1.png' alt=''>";
			break;
	case 10:
			echo "<img src='img/gallery/pediatrics/1.png' alt=''>";
			break;
	case 11:
			echo "<img src='img/gallery/anesthesia/1.png' alt=''>";
			break;
	case 12:
			echo "<img src='img/gallery/pulmonology/1.png' alt=''>";
			break;
	case 13:
			echo "<img src='img/gallery/ent/1.png' alt=''>";
			break;
	case 14:
			echo "<img src='img/gallery/generalsurgery/1.png' alt=''>";
			break;
	case 15:
			echo "<img src='img/gallery/gastroenterology/1.png' alt=''>";
			break;
	case 16:
			echo "<img src='img/gallery/general/1.png' alt=''>";
			break;
	case 17:
			echo "<img src='img/gallery/emergency/1.png' alt=''>";
			break;
	case 18:
			echo "<img src='img/gallery/omr/1.jpg' alt=''>";
			break;
	case 19:
			echo "<img src='img/gallery/omfs/1.jpg' alt=''>";
			break;
	case 20:
			echo "<img src='img/gallery/pdp/1.jpg' alt=''>";
			break;
	case 21:
			echo "<img src='img/gallery/orthodontics/1.jpg' alt=''>";
			break;
	case 22:
			echo "<img src='img/gallery/endodontics/1.jpg' alt=''>";
			break;
	case 23:
			echo "<img src='img/gallery/periodontics/1.jpg' alt=''>";
			break;
	case 24:
			echo "<img src='img/gallery/prosthodontics/1.jpg' alt=''>";
			break;
	case 25:
			echo "<img src='img/gallery/implantology/1.jpg' alt=''>";
			break;
	case 26:
			echo "<img src='img/gallery/dph/1.jpg' alt=''>";
			break;
	case 27:
			echo "<img src='img/gallery/oralpathology/1.jpg' alt=''>";
			break;
	default:
			echo "<img src='img/gallery/noavatar.png' alt='No Image Found!'>";
			break;
}
	return true;
}



function get_subcat_titimage($subcat_id){
	global $db;
	
switch ($subcat_id)
{
	case 1:
			echo "img/gallery/cardiology/2.png";
			break;
	case 2:
			echo "img/gallery/neurology/2.png";
			break;
	case 3:
			echo "img/gallery/nephrology/2.png";
			break;
	case 4:
			echo "img/gallery/gynaecology/1.png";
			break;
	case 5:
			echo "img/gallery/rheumatology/2.png";
			break;
	case 6:
			echo "img/gallery/radiology/2.png";
			break;
	case 7:
			echo "img/gallery/oncology/2.png";
			break;
	case 8:
			echo "img/gallery/dermatology/2.png";
			break;
	case 9:
			echo "img/gallery/urology/2.png";
			break;
	case 10:
			echo "img/gallery/pediatrics/2.png";
			break;
	case 11:
			echo "img/gallery/anesthesia/2.png";
			break;
	case 12:
			echo "img/gallery/pulmonology/2.png";
			break;
	case 13:
			echo "img/gallery/ent/2.png";
			break;
	case 14:
			echo "img/gallery/generalsurgery/2.png";
			break;
	case 15:
			echo "img/gallery/gastroenterology/2.png";
			break;
	case 16:
			echo "img/gallery/general/2.png";
			break;
	case 17:
			echo "img/gallery/emergency/2.png";
			break;
	case 18:
			echo "img/gallery/noavatar.png";
			break;
	case 19:
			echo "img/gallery/noavatar.png";
			break;
	case 20:
			echo "img/gallery/noavatar.png";
			break;
	case 21:
			echo "img/gallery/noavatar.png";
			break;
	case 22:
			echo "img/gallery/noavatar.png";
			break;
	case 23:
			echo "img/gallery/noavatar.png";
			break;
	case 24:
			echo "img/gallery/noavatar.png";
			break;
	case 25:
			echo "img/gallery/noavatar.png";
			break;
	case 26:
			echo "img/gallery/noavatar.png";
			break;
	case 27:
			echo "img/gallery/noavatar.png";
			break;
	default:
			echo "img/gallery/noavatar.png";
			break;
}
	return true;
}


function SendSMS($mobile_number,$message)
{
	$sender_id="ytoapr";
	$username="Ytoaprana";
	$password="Ytoaprana@y1";
 
 $fullapiurl="http://login.bulksmsinmumbai.com/api/mt/SendSMS?user=".$username."&password=".$password."&senderid=".$sender_id."&channel=TRANS&DCS=0&flashsms=0&number=".$mobile_number."&text=".$message."&route=8";
 
 //echo $fullapiurl; exit;

  //Call API 
	$ch_opt=curl_init();
	curl_setopt($ch_opt,CURLOPT_URL,$fullapiurl);
	curl_setopt($ch_opt, CURLOPT_RETURNTRANSFER, true);
	$result=curl_exec($ch_opt);
 //echo $result; //For report or Code check
  curl_close($ch_opt);
  return $result;
  //echo "<p>SMS Request Sent - Message Id - ".$result;
}


function get_cat_details($cat_id){
	global $db;
	switch ($cat_id)
	{
		case 3:
				echo "<p><strong>Ayurvedic</strong> </p>
					<p><strong>The ancient Indian medical system, also known as Ayurveda, is based on ancient writings that rely on a “natural” and holistic approach to physical and mental health. Ayurvedic medicine is one of the world's oldest medical systems and remains one of India's traditional health care systems.<br><br>Therapies include herbal medicines, special diets, meditation, yoga, massage, laxatives, enemas, and medical oils. Ayurvedic preparations are typically based on complex herbal compounds, minerals, and metal substances .</strong></p>";
				break;
		case 4:
				echo "<p><strong>Homeo</strong> </p>
				  <p><strong>Homeopathy or homoeopathy is a pseudoscientific  system of alternative medicine.<br><br>Homeopathy achieved its greatest popularity in the 19th century. It was introduced to the United States in 1825 with the first homeopathic school opening in 1835.Homeopathy is one of the most commonly used forms of alternative medicines and it has a large worldwide market.</strong></p>";
				break;
		case 5:
				echo "<p><strong>Veterinary</strong> </p>
				  <p><strong>A veterinarian (vet), also known as a veterinary surgeon or veterinary physician, is a medical professional who practices veterinary medicine. They manage a wide range of health conditions and injuries in non-human animals. Along with this, vets also play vital role in animal reproduction, animal health management, conservation, husbandry and breeding and preventive medicine like animal nutrition, vaccination and parasitic control as well as bio security and zoonotic disease surveillance and prevention.</strong></p>";
				break;
		case 6:
				echo "<p><strong>Unani</strong> </p>
				  <p><strong>Unani or Yunani medicine is Perso-Arabic traditional medicine as practiced in Muslim culture in South Asia and modern day Central Asia. Unani medicine is pseudoscientific.<br><br>Unani medicine interacted with Indian Buddist medicine at the time of Alaxander's invasion of India. There was a great exchange of knowledge at that time which is visible from the similarity of the basic conceptual frames of the two systems.</strong></p>";
				break;
		case 7:
				echo "<p><strong>Sidha</strong> </p>
				  <p><strong>Siddha medicine is one of the oldest traditional systems of medicine practiced in southern part of India mostly in Tamil nadu and Kerala. Siddha means “perfection”. It has holistic approach and covers physical, psychological, social and spiritual well being of an individual. Siddha medicine has been used for the management of chronic diseases and degenerative conditions, such as rheumatoid arthritis, autoimmune conditions, collagen disorders, and conditions of the central nervous system. Its effectiveness in those situations has varied.</strong></p>";
				break;
		case 8:
				echo "<p><strong>Physiotherapy</strong> </p>
				<p>Physical therapy (PT), also known as physiotherapy, is one of the allied health professions. It is provided by physical therapists who promote, maintain, or restore health through physical examination, diagnosis, prognosis, patient education, physical intervention, rehabilitation, disease prevention, and health promotion. Physical therapists are known as physiotherapists in many countries.</p>
				<p>Physical therapist practice include research, education, consultation, and health administration. Physical therapy is provided as a primary care treatment or alongside, or in conjunction with, other medical services</p>";
				break;
		default:
				break;
	}
	return true;
}

function get_cat_titimage($cat_id){
	global $db;
	switch ($cat_id)
	{
		case 3:		//category: Ayurvedic
				echo "img/gallery/ayurvedic/title.png";
				break;
		case 4:		//category: Homeo
				echo "img/gallery/homeo/title.jpeg";
				break;
		case 5:		//category: Veterinary
				echo "img/gallery/veterinary/title.jpg";
				break;
		case 6:		//category: Unani
				echo "img/gallery/unani/title.jpg";
				break;
		case 7:		//category: Sidha
				echo "img/gallery/sidha/title.jpg";
				break;
		case 8:		//category: Physiotherapy
				echo "img/gallery/physiotherapy/title.jpg";
				break;
		default:
				echo "img/gallery/noavatar.png";
				break;
	}
return true;
}


function get_cat_image($cat_id){
	global $db;
	switch ($cat_id)
	{		
		case 3:	//category: Ayurvedic
				echo "<img src='img/gallery/ayurvedic/title.png' alt=''>";
				break;
		case 4:	//category: Homeo
				echo "<img src='img/gallery/homeo/title.jpeg' alt=''>";
				break;
		case 5:	//category: Veterinary
				echo "<img src='img/gallery/veterinary/title.jpg' alt=''>";
				break;
		case 6:	//category: Unani
				echo "<img src='img/gallery/unani/title.jpg' alt=''>";
				break;
		case 7:	//category: Sidha
				echo "<img src='img/gallery/sidha/title.jpg' alt=''>";
				break;
		case 8:	//category: Physiotherapy
				echo "<img src='img/gallery/physiotherapy/title.jpg' alt=''>";
				break;
		default:
				echo "<img src='img/gallery/noavatar.png' alt=''>";
				break;
	}
	return true;
}

?>