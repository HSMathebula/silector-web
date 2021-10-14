<?php

header('Access-Control-Allow-Origin: *');

// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])    ||
   empty($_POST['subject'])    ||
   empty($_POST['message'])     ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }

   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['subject']));
$phone = strip_tags(htmlspecialchars($_POST['message']));

   
// Create the email and send the message
$to = 'info@silector.co.za'; 
$email_subject = "Website's Expression of Interest Form:  $name";
$email_body = "You have received a new message from your Website's Expression of Interest Form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\subject: $subject\n\nMessage: $message\n\n";

$headers = "From: info@silector\n";

$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true; 
?>