<?php

// check if fields passed are empty
if(empty($_POST['contact-name'])        ||
   empty($_POST['contact-email'])       ||
   empty($_POST['contact-phone']) ||
   !filter_var($_POST['contact-email'],FILTER_VALIDATE_EMAIL))
   {
    echo "No arguments Provided!";
    return false;
   }
     
$contact_name = $_POST['contact-name'];
$contact_email = $_POST['contact-email'];
$contact_phone = $_POST['contact-phone'];
$contact_organization = $_POST['contact-organization'];
$contact_title = $_POST['contact-title'];
$contact_message = $_POST['contact-message'];
$contact_demo = $_POST['contact-demo'];

$contact_demo = ($contact_demo == 'on' ? 'yes' : 'no');

     
// create email body and send it    
//$to = 'phil.george@mentorcliq.com';
$to = 'luis.sanchez.franco@gmail.com';
$email_subject = "Contact form submitted by: $contact_name";
$email_body = "You have received a new message.\n\n" .
              "Name: $contact_name \n" .
              "Email: $contact_email\n\n" .
              "Phone: $contact_phone\n\n" .
              "Organization: $contact_organization\n\n" .
              "Title: $contact_title\n\n" .
              "Request a demo?: $contact_demo\n\n" .
	            "Message:\n$contact_message";
$headers = "From: contact@mentorcliq.com\n";
$headers .= "Reply-To: $contact-email"; 
mail($to,$email_subject,$email_body,$headers);
header('Location: contact.html?send=true');
die();
?>
