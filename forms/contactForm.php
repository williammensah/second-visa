<?php

if($_POST) {
    $name = "";
    $email = "";
    $message = "";
    $subject = "";
    $visitor_message = "";
    $email_body = "<div>";
      
    if(isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>client Name:</b></label>&nbsp;<span>".$name."</span>
                        </div>";
    }
 
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Email:</b></label>&nbsp;<span>".$email."</span>
                        </div>";
    }
      
  
    if(isset($_POST['message'])) {
      $message = htmlspecialchars($_POST['message']);
      $email_body .= "<div>
                         <label><b>message:</b></label>
                         <div>".$message."</div>
                      </div>";
  }
      
    if(isset($_POST['subject'])) {
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Visa Type:</b></label>&nbsp;<span>".$subject."</span>
                        </div>";
    }
      
 
      
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
      
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
      
    if(mail($recipient, $email_title, $email_body, $headers)) {
        echo "<p>Thank you for contacting us, $email. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
      
} else {
    echo '<p>Something went wrong</p>';
}
?>