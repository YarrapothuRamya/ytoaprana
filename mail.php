<?php

 $name1="ramya";
 $msubject="subject";
 $emailid="ramyayarrapothu@outlook.com";
 $message1="message from ytoa prana contact page";
 $from = "ramyayarrapothu@gmail.com";
 $to = "ramyayarrapothu@gmail.com";
 $subject = "subject original";
 $body = "message contact page from ytoaprana.com";
 
$host = "mail.ytoa-prana.com";
 $username = "technical@ytoa-prana.com";
 $password = "9849048710@R";

 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);

echo "mail page - after headers intialization";

 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));

echo "mail page - after smtp intialization";
/* 

 alert("hello");
 $mail = $smtp->send($to, $headers, $body);
 
 
 if (PEAR::isError($mail)) {
   echo("<p>unsuccesss</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }*/
 ?>