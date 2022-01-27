<?php
  $to_email = $email;
  $subject = "Forgot Password - Helperland";

  $body = "<h6 style='font-size:16px; color:green;'>Hi, $username .Click Here to Reset Your Password</h6>

   <h5 style='font-size:17px; color:red;'>Please Click This and Reset Your Password </h5>
   <br>

   <a href='http://localhost/helper/?controller=Helperland&function=ResetPassword&parameter=$resetkey'> http://localhost/helper/?controller=Helperland&function=ResetPassword&parameter=$resetkey</a>
 </div>
    ";
  // Set content-type header for sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  mail($to_email, $subject, $body, $headers);

?>