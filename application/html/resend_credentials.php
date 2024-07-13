<?php
ob_start();
//include_once("login_chk.php");
include_once("../includes/conn.php");
include("../includes/class.phpmailer.php");
//$bps_data= get_data("bi_bps","*","bps_id='".$_GET['id']."'");
//if($_SERVER['REQUEST_METHOD']=="POST"){
  //alert($bps_data['bps_name']);
$type=$_GET['type'];
//alert($type);
switch($type){
  
//if($type=='bps'){ $tname="bi_bps"; $col="bps_id"; }
case "bps":
  //alert('hello');
   if(!empty($_GET['id'])){ $cond.=" and bps_id<>'".$_GET['id']."' ";}
   $bps_data= get_data("bi_bps","*","bps_id='".$_GET['id']."'");
   //alert($bps_data['bps_name']);
  // $chck_status =  getdata("bi_bps","bps_status","bps_id='".$_GET['id']."'");
  $chck_status=$bps_data['bps_status'];
 
	if( $chck_status==1){
        
        $sig_admin	= "Thanks,<br>Bairisons Team";
        $toname = $bps_data['bps_name'];
        $toemail	= $bps_data['bps_email'];
        $bps_username	= $bps_data['bps_username'];
        $bps_password	=rnsb64ende($bps_data['bps_password'],1);
         $bps_refno = $bps_data['bps_refno'];
         
        //$rand_link=$rand."-".$id;
            // Mail to User
         $message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
                       <tr>
                         <td align='left'  class='textfont'></td>
                       </tr>
                       <tr>
                         <td align='left'  class='textfont'>Your Registration Details .</td>
                       </tr>
                         <tr>
                         <td align='left'  class='textfont'></td>
                       </tr>
                        <tr>
                         <td align='left'  class='textfont'><strong> Name: </strong>".$toname."</td>
                       </tr>
                       <tr>
                         <td align='left'  class='textfont'></td>
                       </tr>
                       <tr>
                         <td align='left'  class='textfont'><strong>User Name: </strong>".$bps_username."</td>
                       </tr>
                       <tr>
                         <td align='left'  class='textfont'></td>
                       </tr>
                      <tr>
                         <td align='left'  class='textfont'><strong>Password : </strong>".$bps_password."</td>
                       </tr>
                         <tr>
                         <td align='left'  class='textfont'></td>
                       </tr>
                          <tr>
                         <td align='left'  class='textfont'><strong>Refreance NO :</strong>".$bps_refno."</td>
                       </tr>
                       <tr>
                         <td align='left'  class='textfont'></td>
                       </tr>
                       <tr>
                         <td align='left'  class='textfont'><a href='".BASEURLF."bps_dashboard/' target='_blank'>Click here</a> to login.</td>
                       </tr>
                       <tr>
                         <td align='left'  class='textfont'></td>
                       </tr>
                     </table>
                     ";
                    
             $mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
             $mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
             $mail_body_user=str_replace("disname",$toname,$mail_body_user);
              	
             //echo $mail_body_user; exit;
             $mail_user = new PHPMailer();	
             $mail_user->IsMail();
             $mail_user->FromName = FROM_NAME;
             $mail_user->From 	= FROM_MAIL;
             $mail_user->AddAddress($toemail);
             $mail_user->AddAddress(FROM_MAIL);
             $mail_user->AddBCC(DEV_MAIL,FROM_NAME);
             $mail_user->IsHTML(true);
             $mail_user->Subject	= "BPS Registration Details Bairisons.com";
             $mail_user->Body		= stripslashes($mail_body_user);
             $mail_user->Send();
             //echo $mail_body_user; exit;
             //echo $mail_body; exit;
             $msg="resend";
             header("location:bps_registration?msg=".$msg."");
    }
    else{
        $msg="Activate Account Frist";
       header("location:bps_registration?msg=".$msg."");
    }
    


    if(!empty($_GET['id'])){ 
        $qur = Query("select * from bi_bps where bps_id=".$_GET['id']);
        $row = Fetch($qur);	
    }
    include(RNSTM);
  break;
  case 'bns':
    if(!empty($_GET['id'])){ $cond.=" and bns_id<>'".$_GET['id']."' ";}
    $bns_data= get_data("bi_bns","*","bns_id='".$_GET['id']."'");
    //alert($bps_data['bps_name']);
   // $chck_status =  getdata("bi_bps","bps_status","bps_id='".$_GET['id']."'");
   $chck_status=$bns_data['bns_status'];
  
   if( $chck_status==1){
         
         $sig_admin	= "Thanks,<br>Bairisons Team";
         $toname = $bns_data['bns_name'];
         $toemail	= $bns_data['bns_email'];
         $bns_username	= $bns_data['bns_username'];
         $bns_password	=rnsb64ende($bns_data['bns_password'],1);
          $bns_refno = $bns_data['bns_refno'];
          
         //$rand_link=$rand."-".$id;
             // Mail to User
          $message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'>Your Registration Details .</td>
                        </tr>
                          <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                         <tr>
                          <td align='left'  class='textfont'><strong> Name: </strong>".$toname."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'><strong>User Name: </strong>".$bns_username."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                       <tr>
                          <td align='left'  class='textfont'><strong>Password : </strong>".$bns_password."</td>
                        </tr>
                          <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                           <tr>
                          <td align='left'  class='textfont'><strong>Refreance NO :</strong>".$bns_refno."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'><a href='".BASEURLF."bns_dashboard/' target='_blank'>Click here</a> to login.</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                      </table>
                      ";
                     
              $mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
              $mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
              $mail_body_user=str_replace("disname",$toname,$mail_body_user);
                 
              //echo $mail_body_user; exit;
              $mail_user = new PHPMailer();	
              $mail_user->IsMail();
              $mail_user->FromName = FROM_NAME;
              $mail_user->From 	= FROM_MAIL;
              $mail_user->AddAddress($toemail);
              $mail_user->AddAddress(FROM_MAIL);
              $mail_user->AddBCC(DEV_MAIL,FROM_NAME);
              $mail_user->IsHTML(true);
              $mail_user->Subject	= "BNS Registration Details Bairisons.com";
              $mail_user->Body		= stripslashes($mail_body_user);
              $mail_user->Send();
              //echo $mail_body_user; exit;
              //echo $mail_body; exit;
              $msg="resend";
              header("location:bns_registration?msg=".$msg."");
     }
     else{
         $msg="Activate Account Frist";
        header("location:bns_registration?msg=".$msg."");
     }
     
 
 
     if(!empty($_GET['id'])){ 
         $qur = Query("select * from bi_bns where bns_id=".$_GET['id']);
         $row = Fetch($qur);	
     }
     include(RNSTM);
   break;

   case 'bsm':
    if(!empty($_GET['id'])){ $cond.=" and bsm_id<>'".$_GET['id']."' ";}
    $bsm_data= get_data("bi_bsm","*","bsm_id='".$_GET['id']."'");
    //alert($bps_data['bps_name']);
   // $chck_status =  getdata("bi_bps","bps_status","bps_id='".$_GET['id']."'");
   $chck_status=$bsm_data['bsm_status'];
  
   if( $chck_status==1){
         
         $sig_admin	= "Thanks,<br>Bairisons Team";
         $toname = $bsm_data['bsm_name'];
         $toemail	= $bsm_data['bsm_email'];
         $bsm_username	= $bsm_data['bsm_username'];
         $bsm_password	=rnsb64ende($bsm_data['bsm_password'],1);
          $bsm_refno = $bsm_data['bsm_refno'];
          
         //$rand_link=$rand."-".$id;
             // Mail to User
          $message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'>Your Registration Details .</td>
                        </tr>
                          <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                         <tr>
                          <td align='left'  class='textfont'><strong> Name: </strong>".$toname."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'><strong>User Name: </strong>".$bsm_username."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                       <tr>
                          <td align='left'  class='textfont'><strong>Password : </strong>".$bsm_password."</td>
                        </tr>
                          <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                           <tr>
                          <td align='left'  class='textfont'><strong>Refreance NO :</strong>".$bsm_refno."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'><a href='".BASEURLF."bsm_dashboard/' target='_blank'>Click here</a> to login.</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                      </table>
                      ";
                     
              $mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
              $mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
              $mail_body_user=str_replace("disname",$toname,$mail_body_user);
                 
              //echo $mail_body_user; exit;
              $mail_user = new PHPMailer();	
              $mail_user->IsMail();
              $mail_user->FromName = FROM_NAME;
              $mail_user->From 	= FROM_MAIL;
              $mail_user->AddAddress($toemail);
              $mail_user->AddAddress(FROM_MAIL);
              $mail_user->AddBCC(DEV_MAIL,FROM_NAME);
              $mail_user->IsHTML(true);
              $mail_user->Subject	= "BSM Registration Details Bairisons.com";
              $mail_user->Body		= stripslashes($mail_body_user);
              $mail_user->Send();
              //echo $mail_body_user; exit;
              //echo $mail_body; exit;
              $msg="resend";
              header("location:bsm_registration?msg=".$msg."");
     }
     else{
         $msg="Activate Account Frist";
        header("location:bsm_registration?msg=".$msg."");
     }
     
 
 
     if(!empty($_GET['id'])){ 
         $qur = Query("select * from bi_bsm where bsm_id=".$_GET['id']);
         $row = Fetch($qur);	
     }
     include(RNSTM);
   break;
   case 'biba':
    if(!empty($_GET['id'])){ $cond.=" and bib_id<>'".$_GET['id']."' ";}
    $bib_data= get_data("bi_biba","*","bib_id='".$_GET['id']."'");
    //alert($bps_data['bps_name']);
   // $chck_status =  getdata("bi_bps","bps_status","bps_id='".$_GET['id']."'");
   $chck_status=$bib_data['bib_status'];
  
   if( $chck_status==1){
         
         $sig_admin	= "Thanks,<br>Bairisons Team";
         $toname = $bib_data['bib_name'];
         $toemail	= $bib_data['bib_email'];
         $bib_username	= $bib_data['bib_username'];
         $bib_password	=rnsb64ende($bib_data['bib_password'],1);
          $bib_refno = $bib_data['bib_refno'];
          
         //$rand_link=$rand."-".$id;
             // Mail to User
          $message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'>Your Registration Details .</td>
                        </tr>
                          <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                         <tr>
                          <td align='left'  class='textfont'><strong> Name: </strong>".$toname."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'><strong>User Name: </strong>".$bib_username."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                       <tr>
                          <td align='left'  class='textfont'><strong>Password : </strong>".$bib_password."</td>
                        </tr>
                          <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                           <tr>
                          <td align='left'  class='textfont'><strong>Refreance NO :</strong>".$bib_refno."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'><a href='".BASEURLF."biba_dashboard/' target='_blank'>Click here</a> to login.</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                      </table>
                      ";
                     
              $mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
              $mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
              $mail_body_user=str_replace("disname",$toname,$mail_body_user);
                 
              //echo $mail_body_user; exit;
              $mail_user = new PHPMailer();	
              $mail_user->IsMail();
              $mail_user->FromName = FROM_NAME;
              $mail_user->From 	= FROM_MAIL;
              $mail_user->AddAddress($toemail);
              $mail_user->AddAddress(FROM_MAIL);
              $mail_user->AddBCC(DEV_MAIL,FROM_NAME);
              $mail_user->IsHTML(true);
              $mail_user->Subject	= "BIBA Registration Details Bairisons.com";
              $mail_user->Body		= stripslashes($mail_body_user);
              $mail_user->Send();
              //echo $mail_body_user; exit;
              //echo $mail_body; exit;
              $msg="resend";
              header("location:biba_registration?msg=".$msg."");
     }
     else{
         $msg="Activate Account Frist";
        header("location:biba_registration?msg=".$msg."");
     }
     
 
 
     if(!empty($_GET['id'])){ 
         $qur = Query("select * from bi_biba where bib_id=".$_GET['id']);
         $row = Fetch($qur);	
     }
     include(RNSTM);
   break;

   case 'bshgs':
    if(!empty($_GET['id'])){ $cond.=" and bshgs_id<>'".$_GET['id']."' ";}
    $bshgs_data= get_data("bi_bshgs","*","bshgs_id='".$_GET['id']."'");
    //alert($bps_data['bps_name']);
   // $chck_status =  getdata("bi_bps","bps_status","bps_id='".$_GET['id']."'");
   $chck_status=$bshgs_data['bshgs_status'];
  
   if( $chck_status==1){
         
         $sig_admin	= "Thanks,<br>Bairisons Team";
         $toname = $bshgs_data['bshgs_name'];
         $toemail	= $bshgs_data['bshgs_email'];
         $bshgs_username	= $bshgs_data['bshgs_username'];
         $bshgs_password	=rnsb64ende($bshgs_data['bshgs_password'],1);
          $bshgs_refno = $bshgs_data['bsghs_refno'];
          
         //$rand_link=$rand."-".$id;
             // Mail to User
          $message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'>Your Registration Details .</td>
                        </tr>
                          <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                         <tr>
                          <td align='left'  class='textfont'><strong> Name: </strong>".$toname."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'><strong>User Name: </strong>".$bshgs_username."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                       <tr>
                          <td align='left'  class='textfont'><strong>Password : </strong>".$bshgs_password."</td>
                        </tr>
                          <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                           <tr>
                          <td align='left'  class='textfont'><strong>Refreance NO :</strong>".$bshgs_refno."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'><a href='".BASEURLF."bshgs_dashboard/' target='_blank'>Click here</a> to login.</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                      </table>
                      ";
                     
              $mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
              $mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
              $mail_body_user=str_replace("disname",$toname,$mail_body_user);
                 
              //echo $mail_body_user; exit;
              $mail_user = new PHPMailer();	
              $mail_user->IsMail();
              $mail_user->FromName = FROM_NAME;
              $mail_user->From 	= FROM_MAIL;
              $mail_user->AddAddress($toemail);
              $mail_user->AddAddress(FROM_MAIL);
              $mail_user->AddBCC(DEV_MAIL,FROM_NAME);
              $mail_user->IsHTML(true);
              $mail_user->Subject	= "BSHGS Registration Details Bairisons.com";
              $mail_user->Body		= stripslashes($mail_body_user);
              $mail_user->Send();
              //echo $mail_body_user; exit;
              //echo $mail_body; exit;
              $msg="resend";
              header("location:bshgs_registration?msg=".$msg."");
     }
     else{
         $msg="Activate Account Frist";
        header("location:bshgs_registration?msg=".$msg."");
     }
     
 
 
     if(!empty($_GET['id'])){ 
         $qur = Query("select * from bi_bshgs where bshgs_id=".$_GET['id']);
         $row = Fetch($qur);	
     }
     include(RNSTM);
   break;
   case 'bibad':
    if(!empty($_GET['id'])){ $cond.=" and bibd_id<>'".$_GET['id']."' ";}
    $bibd_data= get_data("bi_bibad","*","bibd_id='".$_GET['id']."'");
    //alert($bps_data['bps_name']);
   // $chck_status =  getdata("bi_bps","bps_status","bps_id='".$_GET['id']."'");
   $chck_status=$bibd_data['bibd_status'];
  
   if( $chck_status==1){
         
         $sig_admin	= "Thanks,<br>Bairisons Team";
         $toname = $bibd_data['bibd_name'];
         $toemail	= $bibd_data['bibd_email'];
         $bibd_username	= $bibd_data['bibd_username'];
         $bibd_password	=rnsb64ende($bibd_data['bibd_password'],1);
          $bibd_refno = $bibd_data['bibd_refno'];
          
         //$rand_link=$rand."-".$id;
             // Mail to User
          $message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'>Your Registration Details .</td>
                        </tr>
                          <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                         <tr>
                          <td align='left'  class='textfont'><strong> Name: </strong>".$toname."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'><strong>User Name: </strong>".$bibd_username."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                       <tr>
                          <td align='left'  class='textfont'><strong>Password : </strong>".$bibd_password."</td>
                        </tr>
                          <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                           <tr>
                          <td align='left'  class='textfont'><strong>Refreance NO :</strong>".$bibd_refno."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'><a href='".BASEURLF."bibad_dashboard/' target='_blank'>Click here</a> to login.</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                      </table>
                      ";
                     
              $mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
              $mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
              $mail_body_user=str_replace("disname",$toname,$mail_body_user);
                 
              //echo $mail_body_user; exit;
              $mail_user = new PHPMailer();	
              $mail_user->IsMail();
              $mail_user->FromName = FROM_NAME;
              $mail_user->From 	= FROM_MAIL;
              $mail_user->AddAddress($toemail);
              $mail_user->AddAddress(FROM_MAIL);
              $mail_user->AddBCC(DEV_MAIL,FROM_NAME);
              $mail_user->IsHTML(true);
              $mail_user->Subject	= "BIBAD Registration Details Bairisons.com";
              $mail_user->Body		= stripslashes($mail_body_user);
              $mail_user->Send();
              //echo $mail_body_user; exit;
             // echo $mail_body; exit;
              $msg="resend";
              header("location:bibad_registration?msg=".$msg."");
     }
     else{
         $msg="Activate Account Frist";
        header("location:bibad_registration?msg=".$msg."");
     }
     
 
 
     if(!empty($_GET['id'])){ 
         $qur = Query("select * from bi_bibad where bibd_id=".$_GET['id']);
         $row = Fetch($qur);	
     }
     include(RNSTM);
   break;
   case 'fpo':
    if(!empty($_GET['id'])){ $cond.=" and fpo_id<>'".$_GET['id']."' ";}
    $fpo_data= get_data("bi_fpo","*","fpo_id='".$_GET['id']."'");
    //alert($bps_data['bps_name']);
   // $chck_status =  getdata("bi_bps","bps_status","bps_id='".$_GET['id']."'");
   $chck_status=$fpo_data['fpo_status'];
  
   if( $chck_status==1){
         
         $sig_admin	= "Thanks,<br>Bairisons Team";
         $toname = $fpo_data['fpo_name'];
         $toemail	= $fpo_data['fpo_email'];
         $fpo_username	= $fpo_data['fpo_username'];
         $fpo_password	=rnsb64ende($fpo_data['fpo_password'],1);
          $fpo_refno = $fpo_data['fpo_refno'];
          
         //$rand_link=$rand."-".$id;
             // Mail to User
          $message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'>Your Registration Details .</td>
                        </tr>
                          <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                         <tr>
                          <td align='left'  class='textfont'><strong> Name: </strong>".$toname."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'><strong>User Name: </strong>".$fpo_username."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                       <tr>
                          <td align='left'  class='textfont'><strong>Password : </strong>".$fpo_password."</td>
                        </tr>
                          <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                           <tr>
                          <td align='left'  class='textfont'><strong>Refreance NO :</strong>".$fpo_refno."</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'><a href='".BASEURLF."fpo_dashboard/' target='_blank'>Click here</a> to login.</td>
                        </tr>
                        <tr>
                          <td align='left'  class='textfont'></td>
                        </tr>
                      </table>
                      ";
                     
              $mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
              $mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
              $mail_body_user=str_replace("disname",$toname,$mail_body_user);
                 
              //echo $mail_body_user; exit;
              $mail_user = new PHPMailer();	
              $mail_user->IsMail();
              $mail_user->FromName = FROM_NAME;
              $mail_user->From 	= FROM_MAIL;
              $mail_user->AddAddress($toemail);
              $mail_user->AddAddress(FROM_MAIL);
              $mail_user->AddBCC(DEV_MAIL,FROM_NAME);
              $mail_user->IsHTML(true);
              $mail_user->Subject	= "FPO Registration Details Bairisons.com";
              $mail_user->Body		= stripslashes($mail_body_user);
              $mail_user->Send();
              //echo $mail_body_user; exit;
             // echo $mail_body; exit;
              $msg="resend";
              header("location:fpo_registration?msg=".$msg."");
     }
     else{
         $msg="Activate Account Frist";
        header("location:fpo_registration?msg=".$msg."");
     }
     
 
 
     if(!empty($_GET['id'])){ 
         $qur = Query("select * from bi_fpo where fpo_id=".$_GET['id']);
         $row = Fetch($qur);	
     }
     include(RNSTM);
   break;
   case 'shgm':
      if(!empty($_GET['id'])){ $cond.=" and shgm_id<>'".$_GET['id']."' ";}
      $shgm_data= get_data("bi_shgm","*","shgm_id='".$_GET['id']."'");
      //alert($bps_data['bps_name']);
     // $chck_status =  getdata("bi_bps","bps_status","bps_id='".$_GET['id']."'");
     $chck_status=$shgm_data['shgm_status'];
    
     if( $chck_status==1){
           
           $sig_admin	= "Thanks,<br>Bairisons Team";
           $toname = $shgm_data['shgm_name'];
           $toemail	= $shgm_data['shgm_email'];
           $shgm_username	= $shgm_data['shgm_username'];
           $shgm_password	=rnsb64ende($shgm_data['shgm_password'],1);
            $shgm_refno = $shgm_data['shgm_refno'];
            
           //$rand_link=$rand."-".$id;
               // Mail to User
            $message_user 	= "<table width='550'  border='0' align='center' cellpadding='3' cellspacing='0' class='borblue'>
                          <tr>
                            <td align='left'  class='textfont'></td>
                          </tr>
                          <tr>
                            <td align='left'  class='textfont'>Your Registration Details .</td>
                          </tr>
                            <tr>
                            <td align='left'  class='textfont'></td>
                          </tr>
                           <tr>
                            <td align='left'  class='textfont'><strong> Name: </strong>".$toname."</td>
                          </tr>
                          <tr>
                            <td align='left'  class='textfont'></td>
                          </tr>
                          <tr>
                            <td align='left'  class='textfont'><strong>User Name: </strong>".$shgm_username."</td>
                          </tr>
                          <tr>
                            <td align='left'  class='textfont'></td>
                          </tr>
                         <tr>
                            <td align='left'  class='textfont'><strong>Password : </strong>".$shgm_password."</td>
                          </tr>
                            <tr>
                            <td align='left'  class='textfont'></td>
                          </tr>
                             <tr>
                            <td align='left'  class='textfont'><strong>Refreance NO :</strong>".$shgm_refno."</td>
                          </tr>
                          <tr>
                            <td align='left'  class='textfont'></td>
                          </tr>
                          <tr>
                            <td align='left'  class='textfont'><a href='".BASEURLF."shgm_dashboard/' target='_blank'>Click here</a> to login.</td>
                          </tr>
                          <tr>
                            <td align='left'  class='textfont'></td>
                          </tr>
                        </table>
                        ";
                       
                $mail_body_user=str_replace("{bodycontent}",$message_user,$mail_template);
                $mail_body_user=str_replace("{sig}",$sig_admin,$mail_body_user);
                $mail_body_user=str_replace("disname",$toname,$mail_body_user);
                   
                //echo $mail_body_user; exit;
                $mail_user = new PHPMailer();	
                $mail_user->IsMail();
                $mail_user->FromName = FROM_NAME;
                $mail_user->From 	= FROM_MAIL;
                $mail_user->AddAddress($toemail);
                $mail_user->AddAddress(FROM_MAIL);
                $mail_user->AddBCC(DEV_MAIL,FROM_NAME);
                $mail_user->IsHTML(true);
                $mail_user->Subject	= "SHGM Registration Details Bairisons.com";
                $mail_user->Body		= stripslashes($mail_body_user);
                $mail_user->Send();
                //echo $mail_body_user; exit;
               // echo $mail_body; exit;
                $msg="resend";
                header("location:shgm_registration?msg=".$msg."");
       }
       else{
           $msg="Activate Account Frist";
          header("location:shgm_registration?msg=".$msg."");
       }
       
   
   
       if(!empty($_GET['id'])){ 
           $qur = Query("select * from bi_shgm where shgm_id=".$_GET['id']);
           $row = Fetch($qur);	
       }
       include(RNSTM);
     break;
     default:
        $msg="Please Recheck and Try Once Again"; 

  }