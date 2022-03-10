<?php

$to_email = $email;
$subject = "New Service Booked! Please Accept the Service";

$body = "<h6 style='font-size:16px; color:green;'>You Are received this mail because you are service provider for helperland</h6>

   <h5 style='font-size:17px; color:red;'>You are Directly assigned for This Service Request. Please Check All Details.</h5>
   <br>
  <h4 style='font-size:17px; color:green;'>Service Request Id is : <span style='color:red;'>$addressid</span></h4>

   <h4 style='font-size:17px; color:red;'>If You are not Logged in than Please Login and Accept Request</h4>
   <a href='http://localhost/helper/#LoginModal'> http://localhost/helper/#LoginModal </a>
   <h4 style='font-size:17px; color:red;'>If You are Logged in than Using Below Link Accept Request</h4>
   <a href='http://localhost/helper/ServiceProviderUpcomingService'> http://localhost/helper/ServiceProviderUpcomingService </a>

 </div>
    ";
// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to_email, $subject, $body, $headers);
?>