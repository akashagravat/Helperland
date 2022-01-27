<?php

  $to_email = $email;
  $subject = "Activation Link For Helperland Account";

  $body = "<h6 style='font-size:16px; color:green;'>Thanks For registering Helperland!</h6>

   <h5 style='font-size:17px; color:red;'>Please Verify Your Mail Using Given Link </h5>
   <br>

   <a href='http://localhost/helper/?controller=Helperland&function=ActivateAccount&parameter=$resetkey'> http://localhost/helper/?controller=helperland&function=ActivateAccount&parameter=$resetkey </a>
 </div>
    ";
  // Set content-type header for sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to_email, $subject, $body, $headers) 


?>


