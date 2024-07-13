// JavaScript Document


/*-------------- LIVE CLOCK -----------------*/
setInterval('startTime()', 1000);
function startTime(){
	var d = new Date();
	$('#time').html(d.toLocaleTimeString());
}

function isEmail(string){
	if(string.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1)
	return true; else return false;	
}

function IsDigit(){ alert("asd");
  return ((event.keyCode >= 48) && (event.keyCode <= 57));
}
function isDigrns(e){ //onKeyPress="return isDigrns(event)"
	if(e.keyCode)
		code = e.keyCode;
	else if(e.which)
		code = e.which;
	if(code == 8 || code == 9 || code == 13)
		return true;
		var character = String.fromCharCode (code);
		return '0' <= character && character <= '9';
}
function numeric(txb) {
   txb.value = txb.value.replace(/[^\0-9]/ig, "");
   //onKeyUp="numeric(this);"
}

function numeric2(txb){
	txb.value = txb.value.replace(/[^\0-9]/ig, "").replace(/[`~!@#$%^&*()_|+\=÷¿?;:'",.<>\{\}\[\]\\\/]/gi, "");
	//onKeyUp="numeric2(this);"
}

function del_rec(id, pageurl){
	if(confirm("Are you sure you want to delete this?")){
		if(id>0){
			document.location.href = pageurl+'&delid='+id;
		}
	} 
}

function suspend_rec(id, pageurl){
	if(confirm("Really you want to Change the Status")){
		if(id>0){
			document.location.href=pageurl+'&susid='+id;
		}
	} 
}

function isDigrns(e){ //onKeyPress="return isDigrns(event)"
	if(e.keyCode)
		code = e.keyCode;
	else if(e.which)
		code = e.which;
	if(code == 8 || code == 9 || code == 13)
		return true;
		var character = String.fromCharCode (code);
		return '0' <= character && character <= '9';
}

function mask(str,textbox,loc,delim){
	var locs = loc.split(',');
	for (var i = 0; i <= locs.length; i++){
		for (var k = 0; k <= str.length; k++){
			if (k == locs[i]){
				if (str.substring(k, k+1) != delim){
					str = str.substring(0,k) + delim + str.substring(k,str.length)
				}
			}
		}
	}
	textbox.value = str
}

function chk(st,pageurl){
	// is for getting Active and In-Active records.....(onChange)
	window.location.href = pageurl+'?st='+st;
}

function goto(){
	if(confirm("Do You want to Exit from Here..?")==true){
		
	}else{
		return false;
	}
}

function goback(){
	if(confirm("Do You want to Cancel the form?")==true){
		window.history.back();
	}else{
		return false;
	}
}

function toTitleCase(str, lname){
	var sp = str.split(' ');
	var wl=0;
	var f ,r;
	var word = new Array();
	for (i = 0 ; i < sp.length ; i ++ ) {
		f = sp[i].substring(0,1).toUpperCase();
		r = sp[i].substring(1);
		word[i] = f+r;
	}
	newstring = word.join(' ');
	document.getElementById(lname).value = newstring;
	return true;
	//onKeyUp="toTitleCase(this.value, name);"
}

function expandingWindow(website){
	var windowprops='width=100,height=100,scrollbars=yes,status=yes,resizable=yes'
	var heightspeed = 20; // vertical scrolling speed (higher = slower)
	var widthspeed = 20; // horizontal scrolling speed (higher = slower)
	var leftdist = 550; // distance to left edge of window
	var topdist = 100; // distance to top edge of window
	
	if(window.resizeTo && navigator.userAgent.indexOf("Opera")==-1){
		var winwidth = window.screen.availWidth - leftdist;
		var winheight = window.screen.availHeight - topdist;
		var sizer = window.open("","","left=" + leftdist + ",top=" + topdist +","+ windowprops);
		
		for(sizeheight = 1; sizeheight < winheight; sizeheight += heightspeed){
			sizer.resizeTo("1", sizeheight);
		}
		
		for(sizewidth = 1; sizewidth < winwidth; sizewidth += widthspeed){
			sizer.resizeTo(sizewidth, sizeheight);
			sizer.location = website;
		}
	}else{
		window.open(website,'mywindow');
	}
}
function inline_search() {
 var input, filter, table, tr, td_two, td_three, td_one, i;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td_one = tr[i].getElementsByTagName("td")[1];
    td_two = tr[i].getElementsByTagName("td")[2];
    td_three = tr[i].getElementsByTagName("td")[3];
	td_four = tr[i].getElementsByTagName("td")[4];
    if (td_one) {
     	  if (td_one.innerHTML.toUpperCase().indexOf(filter) > -1) { tr[i].style.display = ""; }
          else if (td_two){ if (td_two.innerHTML.toUpperCase().indexOf(filter) > -1) { tr[i].style.display = ""; }
          else if (td_three){ if (td_three.innerHTML.toUpperCase().indexOf(filter) > -1) { tr[i].style.display = ""; }
		  else if (td_four){ if (td_four.innerHTML.toUpperCase().indexOf(filter) > -1) { tr[i].style.display = ""; }
          else { tr[i].style.display = "none"; }
		}
       }
      }
     }
  } 
}
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
// RNS function 2017
function rnsimcall(rns) { document.getElementById("rnsphoto").style.display=rns; }
function fn_academic_year(h) { if(h!='')document.frm_academic.submit(); } 
$(document).ready( function() {
// For Success/Error Msg Fadeout
setTimeout(function() { $('.alert-box').fadeOut(2000);$('.search').fadeOut(2000); }, 2000); });
function ord_status_change() {			
	var val = $('option:selected',this).val();
	if(val=="") { alert("Please select Order Stage"); return false; }
	var oid=parseInt(val)-parseInt(1);
	var ostatus = ['Pending','Processing','Confirmed','Failed'];
	var con=confirm("Do you want to move this order to "+ostatus[oid]);//to "+stname);
	if(con==true) {		
		var dropid = this.id;
		var order_code = dropid.replace('ord_move_', '');
		var pageURL = $(location). attr("href");
		//if(val==3) { gotoURL="orders?pg=add&oid="+order_code;} else { 
		gotoURL=pageURL+"&id="+order_code+"&om="+val;//}
		window.location = gotoURL;
	} else { return false; }
}