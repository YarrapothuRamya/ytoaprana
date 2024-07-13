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
?>