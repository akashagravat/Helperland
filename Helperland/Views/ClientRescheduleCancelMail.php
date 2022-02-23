<?php

$to_email = $clientemail;
$subject = "Your Service Request Has Been".$subjectmsg." Successfully";

$body =

"
<h4 style='font-size:17px; color:green;'>Service Request Id is : <span style='color:red;'>$servicemailid</span></h4>

   <br>
   <h4 style='font-size:15px; color:Black;'>
   $mailbody
   </h4>
<br>
   <h5 style='font-size:14x; color:red;'>Thanks For Using Helperland Service</h5>

 </div>
    ";
// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to_email, $subject, $body, $headers);
?>