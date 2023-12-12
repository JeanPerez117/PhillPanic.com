<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

require_once "Mail.php";

//smtp email setup

 


$to = "jebediah92@gmail.com";
$email_subject = "Test";
$email_body = "This is a Test!";


$headers = ['From' => $email_from, 'To' => $to, 'Subject' => $email_subject, 'Reply-To' => $email_address];
$smtp = Mail::factory('smtp', ['host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password]);

$mail = $smtp->send($to, $headers, $email_body);

if (PEAR::isError($mail)) 
{
  echo "<p>" . $mail->getMessage() . "</p>";
} else 
{
  echo "<p>Message successfully sent!</p>";
}


 
  //create or generate a token that is attached to the userid then store token in db. Give token a create date. Then create an event in table to clear tokens older than 10 minutes.



  
 
?>