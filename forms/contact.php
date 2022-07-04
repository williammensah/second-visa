<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'kwesimensah20@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }
   
  $subject = $_POST['subject'];
if($subject == "1") {
    $recipient = "Standard Visitor Visa";
}
else if($subject == "2") {
    $recipient = "Student Visa";
}
else if($concerned_department == "3") {
    $recipient = "Graduate Route Visa";
}
else if($concerned_department == "4") {
  $recipient = "Start-up Visa";
}
else {
    $recipient = "High Potential Visa";
}
  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $recipient;
  

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  // $contact->smtp = array(
  //   'host' => 'smtp.gmail.com',
  //   'username' => '',
  //   'password' => '',
  //   'port' => '587'
  // );
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
