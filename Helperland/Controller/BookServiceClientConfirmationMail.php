<?php

$to_email = $clientemail;
$subject = "Your Service Has Been Booked Succesfully!!";

$body = "<h6 style='font-size:16px; color:green;'>Your Helperland Booking Has Been Completed Successfully. Your Service ID is: <span style='color:red;'>$addressid</span></h6>
  
        <table border='1'>
        <tr>
        <th> Booking Summary </th>
        </tr>
        <tr>
        <td><span style='font-weight: bold;'>Service Request Id :</span>   $addressid </td></tr>
        <tr>
        <td><span style='font-weight: bold;'>Name : </span>  $clientname </td></tr>

        <tr>
        <td><span style='font-weight: bold;'>Email :  </span> $clientemail </td></tr>
        
        <tr>
        <td><span style='font-weight: bold;'>ServiceStartDate : </span>  $selectdate </td></tr>
        
        <tr>
        <td><span style='font-weight: bold;'>ServiceTime : </span>  $servicetime </td></tr>
        
        <tr>
        <td><span style='font-weight: bold;'>Pincode : </span>  $zipcode </td></tr>
        
        <tr>
        <td><span style='font-weight: bold;'>ServiceHourlyRate : </span>  $servicehourate </td></tr>
        
        <tr>
        <td><span style='font-weight: bold;'>Basic Hours : </span>  $servicehours Hrs</td></tr>
        <tr>
        <td><span style='font-weight: bold;'>Extra Hours : </span>  $extrahour Hrs</td></tr>
        <tr>
        <td><span style='font-weight: bold;'>Total Hours : </span>  $totalhour </td></tr>
        <tr>
        <td><span style='font-weight: bold;'>Total Bed : </span> $totalbed </td></tr>
        <tr>
        <td><span style='font-weight: bold;'>Total Bath : </span>  $totalbath </td></tr>
        <tr>
        <td><span style='font-weight: bold;'>Sub Total : </span>  $$subtotal </td></tr>
        <tr>
        <td><span style='font-weight: bold;'>Discount :  </span> $$discount </td></tr>
        <tr>
        <td><span style='font-weight: bold;'>Total Cost : </span> $$totalcost </td></tr>
        <tr>
        <td><span style='font-weight: bold;'>Effective Cost : </span>  $$effectivecost </td></tr>
        <tr>
        <td><span style='font-weight: bold;'>Extra Services : </span>  $extraservice</td></tr>
        <tr>
        <td><span style='font-weight: bold;'>Comments : </span>  $comments </td></tr>
        <tr>
        <td><span style='font-weight: bold;'>Address : </span>  $clientaddresses </td></tr>
        
        <tr>
        <td><span style='font-weight: bold;'>Mobile Number :</span>   $clientmobile </td></tr>
        
        <tr>
        <td><span style='font-weight: bold;'>Payment Refrence No. : </span>  $paymentrefno </td></tr>
        <tr>
        <td><span style='font-weight: bold;'>Has Pets : </span>  $haspets </td></tr>
        <tr>
        <td><span style='font-weight: bold;'>Payment Status :</span>  Success </td></tr>
        <tr>
        <td><span style='font-weight: bold;'>Payment Date :</span>   $date </td></tr>
        </table>
<br>


<p>Please Do Not Share This Details Anyone.</p>
    ";
// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to_email, $subject, $body, $headers)
?>