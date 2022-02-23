<?php
class HelperlandController
{
    function __construct()
    {
        include('Models/Helperland.php');
        $this->model = new Helperland();
        session_start();
    }
    public function HomePage()
    {
        include("./Views/index.php");
    }

    public function InsertUser()
    {
        $baseurl = "http://localhost/helper/Customer-Signup";
        $base_url = 'http://localhost/helper/#LoginModal';
        if (isset($_POST)) {
            $resetkey = bin2hex(random_bytes(15));
            $email = $_POST['email'];
            $count = $this->model->EmailExists($email);
            // echo '<script>alert('.$count.');</script>';
            if ($count == 0) {
                $array = [
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'email' => $email,
                    'mobile' => $_POST['mobile'],
                    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                    'usertypeid' => 0,
                    'roleid' => 'Customer',
                    'resetkey' => $resetkey,
                    'creationdt' => date('Y-m-d H:i:s'),
                    'status' => 'New',
                    'isactive' => 'No',
                    'isregistered' => 'yes',
                ];
                $result = $this->model->InsertCustomer_SP($array);
                $_SESSION['status_msg'] = $result[0];
                $_SESSION['status_txt'] = $result[1];
                $_SESSION['status'] = $result[2];
                include('ActivateAccount.php');
                header('Location:' . $base_url);
            } else {
                $_SESSION['status_msg'] = "Email Already Exists";
                $_SESSION['status_txt'] = "Try Another Email";
                $_SESSION['status'] = "error";
                // $_SESSION['err'] = "Email Already Exists";
                header("Location:" . $baseurl);
            }
        }
    }

    public function CheckEmail()
    {
        // Check Email Exist or not
        if (isset($_POST)) {
            $email = $_POST['email_id'];
            $count = $this->model->EmailExists($email);
            if ($count > 0) {
                echo "Email Already Exists. Please Try Another Email";
            } else {
                echo "Email Available";
            }
        }
    }

    public function ActivateAccount()
    {
        $base_url = 'http://localhost/helper/#LoginModal';
        if (isset($_GET)) {
            $resetkey = $_GET['parameter'];
            $result = $this->model->Activation($resetkey);
            header('Location:' . $base_url);
        }
    }

    public function Login()
    {
        $base_url = "http://localhost/helper/#LoginModal";
        $customer = "http://localhost/helper/Customer-Servicehistory";
        if (isset($_POST)) {
            $email = $_POST['loginemail'];
            $password = $_POST['password'];
            if (isset($_POST['remember'])) {
                setcookie('emailcookie', $email, time() + 86400, '/');
                setcookie('passwordcookie', $password, time() + 86400, '/');
            }
            $count = $this->model->CheckLogin($email, $password);
            $results = $this->model->ResetKey($email);
            $_SESSION['firstname'] = $results[0];
        }
    }

    public function CustomerLogin()
    {
        $base_url = "http://localhost/helper/#LoginModal";
        $customer = "http://localhost/helper/Customer-Servicehistory";
        if (isset($_POST)) {
            $email = $_POST['loginemail'];
            $password = $_POST['password'];
            if (isset($_POST['remember'])) {
                setcookie('emailcookie', $email, time() + 86400, '/');
                setcookie('passwordcookie', $password, time() + 86400, '/');
            }
            $count = $this->model->CheckLoginCustomer($email, $password);
            $results = $this->model->ResetKey($email);
            $_SESSION['firstname'] = $results[0];
        }
    }
    public function ForgotCheckEmail()
    {
        // Check Email Exist or not
        if (isset($_POST)) {
            $email = $_POST['email_id'];
            $count = $this->model->EmailExists($email);
            if ($count == 1) {
                echo "Email Available";
            } else {
                echo "Email Not Available.";
            }
        }
    }

    public function ForgotMail()
    {
        // forgot Password mail sent
        if (isset($_POST)) {
            $base_url = "http://localhost/helper/#LoginModal";
            $email = $_POST['forgot_email'];
            $result = $this->model->ResetKey($email);
            $username = $result[0];
            $resetkey = $result[1];
            $count = $result[2];
            if ($count == 1) {
                include('ForgotPassword.php');
                $_SESSION['status_msg'] = "Reset Password Link has been sent successfully!";
                $_SESSION['status_txt'] = "";
                $_SESSION['status'] = "success";
                // $_SESSION['msg'] = "Reset Password Link has been sent successfully!";
                header('Location:' . $base_url);
            } else {
                $_SESSION['status_msg'] = "Please Enter Valid Email";
                $_SESSION['status_txt'] = "";
                $_SESSION['status'] = "error";
                // $_SESSION['msg'] = "Please Enter Valid Email";
                header('Location:' . $base_url);
            }
        }
    }

    public function ResetPassword()
    {
        $resetkey = $_GET['parameter'];
        include('./Views/ResetPassword.php');
    }

    public function ResetKeyPassword()
    {
        if (isset($_POST)) {
            $base_url = "http://localhost/helper/#LoginModal";
            $resetkey = $_POST['reset'];
            $newpass = $_POST['newpassword'];
            $newcpass = $_POST['newcpassword'];
            $update_date = date('Y-m-d H:i:s');
            $pass = password_hash($newpass, PASSWORD_BCRYPT);
            $cpass = password_hash($newcpass, PASSWORD_BCRYPT);
            if ($newpass == $newcpass) {
                $array = [
                    'password' => $pass,
                    'updatedate' => $update_date,
                    'modifiedby' => 0,
                    'resetkey' => $resetkey,
                ];
                $result = $this->model->ResetPass($array);
                $_SESSION['status_msg'] = $result[0];
                $_SESSION['status_txt'] = $result[1];
                $_SESSION['status'] = $result[2];
                header('Location:' . $base_url);
            } else {
                $_SESSION['status_msg'] = "Password Not Match";
                $_SESSION['status_txt'] = "Please Try Again";
                $_SESSION['status'] = "warning";
                header('Location:' . $base_url);
            }
        }
    }

    public function ContactUs()
    {
        if (isset($_POST)) {
            $base_url = "http://localhost/helper/Contact";

            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            if ($fname == "") {
                $_SESSION['status_msg'] = "Please Enter FirstName";
                $_SESSION['status_txt'] = "";
                $_SESSION['status'] = "error";
            } else if ($lname == "") {
                $_SESSION['status_msg'] = "Please Enter LastName";
                $_SESSION['status_txt'] = "";
                $_SESSION['status'] = "error";
            } else if ($email == "") {
                $_SESSION['status_msg'] = "Please Enter Email";
                $_SESSION['status_txt'] = "";
                $_SESSION['status'] = "error";
            } else if ($mobile == "") {
                $_SESSION['status_msg'] = "Please Enter Valid Mobile Number";
                $_SESSION['status_txt'] = "";
                $_SESSION['status'] = "error";
            }
            if ($fname && $lname && $email && $mobile != "") {
                $email = $_POST['email'];
                $subject = $_POST['sub'];
                $message = $_POST['message'];
                $name = $_POST['firstname'] . " " . $_POST['lastname'];
                $array = [
                    'name' => $name,
                    'email' => $email,
                    'subject' => $subject,
                    'mobile' => $mobile,
                    'message' => $message,
                    'creationdt' => date('Y-m-d H:i:s'),
                    'status' => 'success',
                    'priority' => 4,
                ];
                $result = $this->model->Contactus($array);
                $results = $this->model->ResetKey($email);
                $_SESSION['firstname'] = $results[0];
                $_SESSION['status_msg'] = $result[0];
                $_SESSION['status_txt'] = $result[1];
                $_SESSION['status'] = $result[2];
            }
            header('Location:' . $base_url);
        }
    }


    public function Logout()
    {
        if (isset($_POST)) {
            $base_url = "http://localhost/helper/#LoginModal";
            unset($_SESSION['username']);
            $_SESSION['status_msg'] = "You are Logged Out";
            $_SESSION['status_txt'] = "";
            $_SESSION['status'] = "success";
            // $_SESSION['msg'] = "You are Logged Out"; 
            header('Location:' . $base_url);
        }
    }

    public function InsertServiceProvider()
    {
        $baseurl = "http://localhost/helper/ServiceProvider-Become-a-pro";
        $base_url = 'http://localhost/helper/#LoginModal';
        if (isset($_POST)) {
            $resetkey = bin2hex(random_bytes(15));
            $email = $_POST['email'];
            $count = $this->model->EmailExists($email);
            // echo '<script>alert('.$count.');</script>';
            if ($count == 0) {
                $array = [
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'email' => $email,
                    'mobile' => $_POST['mobile'],
                    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                    'usertypeid' => 1,
                    'roleid' => 'ServiceProvider',
                    'resetkey' => $resetkey,
                    'creationdt' => date('Y-m-d H:i:s'),
                    'status' => 'Pending',
                    'isactive' => 'No',
                    'isregistered' => 'yes',
                ];
                $result = $this->model->InsertCustomer_SP($array);
                include('ActivateAccount.php');
                header('Location:' . $base_url);
            } else {
                $_SESSION['err'] = "Email Already Exists";
                header("Location:" . $baseurl);
            }
        }
    }


    public function CheckPostalCode()
    {
        if (isset($_POST)) {
            $postal = $_POST['postal'];
            $count = $this->model->PostalExists($postal);
            if ($count > 0) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function InsertAddress()
    {

        if (isset($_POST)) {
            $street = $_POST['street'];
            $houseno = $_POST['houseno'];
            $pincode = $_POST['pincode'];
            $location = $_POST['location'];
            $mobilenum = $_POST['mobilenum'];
            $email = $_POST['username'];

            $result = $this->model->ResetKey($email);
            $userid = $result[3];
            $type = 0;
            $getstate = $this->model->CityLocation($pincode);
            $state = $getstate[1];

            $array = [
                'userid' => $userid,
                'street' => $street,
                'houseno' => $houseno,
                'location' => $location,
                'state' => $state,
                'pincode' => $pincode,
                'mobilenum' => $mobilenum,
                'email' => $email,
                'type' => $type,

            ];
            $result = $this->model->InsertAddress($array);
        }
    }


    public function GetLocationCity()
    {
        if (isset($_POST)) {
            $pincode = $_POST['postalcode'];
            $result = $this->model->CityLocation($pincode);
            $city = $result[0];
            $state = $result[1];
            $return = [$city, $state];
            echo json_encode($return);
        }
    }


    public function GetAddress()
    {
        if (isset($_POST)) {
            $email = $_POST['username'];

            $result = $this->model->GetAddress($email);
            if (count($result)) {
                foreach ($result as $row) {
                    $street = $row['AddressLine1'];
                    $houseno = $row['AddressLine2'];
                    $city = $row['City'];
                    $pincode = $row['PostalCode'];
                    $mobile = $row['Mobile'];
                    $isdefault = $row['IsDefault'];
                    $isdeleted = $row['IsDeleted'];
                    $addressid = $row['AddressId'];
                    if ($isdefault == 1) {
                        $isdefault =  'checked';
                    } else {
                        $isdefault = '';
                    }
                    if ($isdeleted == 0) {
                        $output = '<div class="row addresses"  onclick="AddRadio()">
                            <div class="col-md-1 col-1">
                                <input type="radio" id="unique' . $addressid . '" name="address_radio" value="' . $addressid . '" class="address-radio" ' . $isdefault . '>
                            </div>
                            <div class="col-md-11 address-phone col-11">
                                <p class="addresse"> Address: <span>' . $street . '  ' . $houseno . ' , ' . $city . ' ' . $pincode . '</span></p>
                                <p class="phonenumber"> Phone Number: <span> ' . $mobile . '</p>
                
                            </div>
                        </div>';

                        echo $output;
                    }
                }
            }
        }
    }


    function GetServiceProvider()
    {
        if (isset($_POST)) {
            $result = $this->model->GetServiceProvider();

            if (count($result)) {
                foreach ($result as $row) {
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                    $output = '
               <div class="col-md-3 ">
                   <div class="service-provider-imgs">
                       <img src="./assets/image/forma-1-copy-19.png" class="service-provider-img">
                   </div>
                   <h5 class="service-provider-name">' . $firstname . ' ' . $lastname . '</h5>
                   <button type="button" class="btn selectbtn">Select</button>
               </div>
           ';
                    echo $output;
                }
            }
        }
    }


    public function GetFavouriteServiceProvider()
    {
        if (isset($_POST)) {
            $email = $_POST['username'];
            $result = $this->model->ResetKey($email);
            $userid = $result[3];
            // echo $userid;
            $results = $this->model->Favourite($userid);
            // TargetUserId
            if (count($results)) {
                foreach ($results as $row) {
                    $id = $row['TargetUserId'];
                    $favourite = $row['IsFavorite'];
                    $blocked = $row['IsBlocked'];

                    $targetresult = $this->model->GetUsers($id);
                    if (count($targetresult)) {
                        foreach ($targetresult as $target) {
                            $serviceproviderid = $target['UserId'];
                            $firstname = $target['FirstName'];
                            $lastname = $target['LastName'];
                            if ($favourite == 1 && $blocked == 0) {
                                $output = '
                    <div class="col-md-3 ">
                        <div class="service-provider-imgs">
                            <img src="./assets/image/forma-1-copy-19.png" class="service-provider-img">
                        </div>
                        <h5 class="service-provider-name">' . $firstname . ' ' . $lastname . '</h5>
                        <button type="button" class="btn selectbtn selectsp"  value="' . $serviceproviderid . '" onclick ="CheckSP()" >Select</button>
                    </div>
                ';
                                echo $output;
                            }
                        }
                    }
                    // echo $id;

                }
            }
        }
    }


    public function AddServiceRequest()
    {
        // $value = $parameter;
        if (isset($_POST)) {
            $email  = $_POST['username'];
            $selectdate = $_POST['selectdate'];
            $servicetime = $_POST['servicetime'];
            $zipcode = $_POST['zipcode'];
            $servicehourate = $_POST['servicehourate'];
            $servicehours = $_POST['servicehours'];
            $extrahour = $_POST['extrahour'];
            $totalhour = $_POST['totalhour'];
            $totalbed = $_POST['totalbed'];
            $totalbath = $_POST['totalbath'];
            $subtotal = $_POST['subtotal'];
            $discount = $_POST['discount'];
            $totalcost = $_POST['totalcost'];
            $effectivecost = $_POST['effectivecost'];
            $extraservice = $_POST['extraservice'];
            $comments = $_POST['comments'];
            $addressid = $_POST['addressid'];
            $paymentrefno = $_POST['paymentrefno'];
            $paymentdue = $_POST['paymentdue'];
            $haspets = $_POST['haspets'];
            $status = 'Pending';
            $date = date('Y-m-d H:i:s');
            $paymentdone = 1;
            $recordversion = 1;
            $ids = $_POST['selectedsp'];
            $id = array_slice($ids, 1);
            // print_r($id);
            // echo $selectdate. ''. $servicetime. ''. $zipcode.''.$servicehourate.''.$servicehours.''
            // .$extrahour.''.$totalhour.''.$totalbed.''.$totalbath.''.$subtotal.''.$discount.''.$totalcost.''.$effectivecost.''.$extraservice.''. $comments.''
            // .$addressid.''. $paymentrefno.''.$paymentdue.''.$haspets;

            $result = $this->model->ResetKey($email);
            $clientaddress = $this->model->GetSelectedAddress($addressid);
            if (count($clientaddress)) {
                foreach ($clientaddress as $address) {
                    $clientaddresses = $address['AddressLine2'] . ' ' . $address['AddressLine1'] . ' , ' . $address['City'] . ',' . $address['State'] . ' ,' . $address['PostalCode'];
                    $clientmobile = $address['Mobile'];
                }
            }
            $clientemail = $email;
            $clientname = $result[0];
            $useid = $result[3];


            $array = [
                'userid' => $useid,
                'servicedate' => $selectdate,
                'servicetime' => $servicetime,
                'zipcode'   => $zipcode,
                'servicehourlyrate' => $servicehourate,
                'servicehours' => $servicehours,
                'extrahours' => $extrahour,
                'totalhours' => $totalhour,
                'totalbed' => $totalbed,
                'totalbath' => $totalbath,
                'subtotal' => $subtotal,
                'discount' => $discount,
                'totalcost' => $totalcost,
                'effectivecost' => $effectivecost,
                'extraservices' => $extraservice,
                'comments' => $comments,
                'addressid' => $addressid,
                'paymentrefno' => $paymentrefno,
                'paymentdue' => $paymentdue,
                'pets' => $haspets,
                'status' => $status,
                'createddate' => $date,
                'paymentdone' => $paymentdone,
                'recordversion' => $recordversion,
            ];

            $result = $this->model->AddService($array);
            $serviceprovider = $this->model->GetActiveServiceProvider();
            if ($result) {
                include('BookServiceClientConfirmationMail.php');
                if (sizeof($id) > 0) {
                    $sp = $this->model->GetUsersServiceprovider($id);
                    if (count($sp)) {
                        // $email = $sp['Email'];
                        $addressid = $result;

                        foreach ($sp as $emails) {
                            $email = $emails['Email'];
                            include('BookingMail.php');
                        }
                    }
                    echo $addressid;
                    // print_r($sp);
                } else {
                    if (count($serviceprovider)) {
                        foreach ($serviceprovider as $row) {
                            $addressid = $result;
                            $email = $row['Email'];
                            include('BookingMail.php');
                        }
                    }
                    $addressid = $result;
                    echo $addressid;
                }
            } else {
                echo 0;
            }
        }
    }
    public function CustomerDetails()
    {
        if (isset($_POST)) {
            $email = $_POST['username'];
            $result = $this->model->GetUserAllDetails($email);
            if (count($result)) {
                foreach ($result as $row) {
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                    $email = $row['Email'];
                    $mobile = $row['Mobile'];
                    $date = $row['DateOfBirth'];
                    $languageid = $row['LanguageId'];

                    if (!empty($date)) {

                        list($year, $month, $day) = explode("-", $date);
                    } else {
                        $year = "Year";
                        $month = "Month";
                        $day = "Day";
                    }

                    $result = [$firstname, $lastname, $email, $mobile, $day, $month, $year, $languageid];

                    echo json_encode($result);
                }
            }
        }
    }

    public function AddCustomerDetails()
    {
        if (isset($_POST)) {
            $firstname =   $_POST['firstname'];
            $lastname =   $_POST['lastname'];
            $email =   $_POST['email'];
            $mobile =   $_POST['mobile'];
            $birthdate =   $_POST['birthdate'];
            $language =   $_POST['language'];
            $modifiedby = $firstname . " " . $lastname;
            $modifieddate = date('Y-m-d H:i:s');
            $array = [
                'fistname' => $firstname,
                'lastname' => $lastname,
                'mobile' => $mobile,
                'birthdate' => $birthdate,
                'language' => $language,
                'modifieddate' => $modifieddate,
                'modifiedby' => $modifiedby,
                "email" => $email,
            ];
            $result = $this->model->UpdateCustomer($array);
            $count = $result[0];
            if ($count == 1) {
                $_SESSION['firstname'] = $modifiedby;
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function UpdatePassword()
    {
        if (isset($_POST)) {
            $email = $_POST['username'];
            $currentpassword = $_POST['currentpassword'];
            $newpassword = $_POST['newpassword'];
            $confirmpassword = $_POST['newconfirmpassword'];
            $modifiedby = $_POST['modifiedby'];
            $password = $this->model->GetUserAllDetails($email);
            if (count($password)) {
                foreach ($password as $pass) {
                    $databasepassword = $pass['Password'];
                    $resetkey = $pass['ResetKey'];
                    if (password_verify($currentpassword, $databasepassword)) {
                        if ($newpassword == $confirmpassword) {
                            $update_date = date('Y-m-d H:i:s');
                            $newpass = password_hash($newpassword, PASSWORD_BCRYPT);
                            $cpass = password_hash($confirmpassword, PASSWORD_BCRYPT);
                            $array = [
                                'password' => $newpass,
                                'updatedate' => $update_date,
                                'modifiedby' => $modifiedby,
                                'resetkey' => $resetkey,
                            ];
                            $result = $this->model->ResetPass($array);
                            unset($_SESSION['status_msg']);
                            unset($_SESSION['status_txt']);
                            unset($_SESSION['status']);

                            $count = $result[3];
                            if ($count == 1) {
                                echo 1;
                            } else {
                                echo 2;
                            }
                        }
                    } else {
                        echo 0;
                    }
                }
            }
        }
    }



    public function Getaddresstable()
    {
        if (isset($_POST)) {
            $email = $_POST['username'];
            $result = $this->model->GetAddress($email);
            $json['data'] = array();
            if (count($result)) {
                foreach ($result as $row) {
                    $street = $row['AddressLine1'];
                    $houseno = $row['AddressLine2'];
                    $city = $row['City'];
                    $pincode = $row['PostalCode'];
                    $mobile = $row['Mobile'];
                    $isdefault = $row['IsDefault'];
                    $isdeleted = $row['IsDeleted'];
                    $addressid = $row['AddressId'];
                    if ($isdefault == 1) {
                        $isdefault =  'checked';
                    } else {
                        $isdefault = '';
                    }
                    if ($isdeleted == 0) {
                        $radiooutput = '
                        <div scope="row" class="addressradio">
                        <input type="radio" id="unique' . $addressid . '" value="' . $addressid . '" name="addressradio" ' . $isdefault . '>
                    </div>';

                        $addressline =  ' 
                      <div scope="row">
                                <div class="form-row control"><b>Address:</b> ' . $street . '  ' . $houseno . ' , ' . $city . ' ' . $pincode . '</div>
                                <div class="form-row control"><b>Phone number:</b> ' . $mobile . '</div>
                            </div>';

                        $editdelete = ' <div class="edit_delete_address">
                            <a href="#" class="edit_delete editaddress" id="' . $addressid . '" data-toggle="modal" data-target="#addaddress">
                                <img src="./assets/Image/edit-icon.png">
                            </a>
                            <a href="#" class="edit_delete deleteaddress" id="' . $addressid . '" data-toggle="modal" data-target="#deleteaddress">
                                <img src="./assets/Image/delete-icon.png">
                            </a>
                        </div>';

                        $results = array();
                        $results['radiobutton'] = $radiooutput;
                        $results['addressoutput'] = $addressline;
                        $results['editordelete'] = $editdelete;
                        array_push($json['data'], $results);
                    }
                }
            }
            echo json_encode($json);
        }
    }

    public function CustomerHistory()
    {
        if (isset($_POST)) {
            $email = $_POST['username'];
            $result = $this->model->ResetKey($email);
            $userid = $result[3];
            $result = $this->model->GetServiceHistory($userid);
            $json['data'] = array();
            if (count($result)) {
                foreach ($result as $row) {
                    $date = $row['ServiceStartDate'];
                    $starttime = $row['ServiceTime'];
                    $totaltime = $row['TotalHours'];
                    $payment = $row['TotalCost'];
                    $serviceid = $row['ServiceRequestId'];
                    $status = $row['Status'];
                    $control = '';
                    if ($status != "Cancelled" && $status != "Completed") {

                        $starttime =  date("H:i", strtotime($starttime));
                        $startime = str_replace(":", ".", $starttime);
                        $hoursq = intval($startime);
                        $realPartq =  $startime - $hoursq;
                        $minutesq = intval($realPartq * 60);
                        if ($minutesq == 18) {
                            $minutesq = 5;
                        } else {
                            $minutesq = 0;
                        }
                        $startime =  $hoursq . "." . $minutesq;

                        $hours = intval($totaltime);
                        $realPart = $totaltime - $hours;
                        $minutes = intval($realPart * 60);
                        if ($minutes == 30) {
                            $minutes = 5;
                        } else {
                            $minutes = 0;
                        }
                        $totaltimes = $hours . ":" . $minutes;
                        $totaltimes = str_replace(":", ".", $totaltimes);

                        $totaltimes = number_format(($startime +  $totaltimes), 2);
                        $var1 = intval($totaltimes);
                        $var2 = $totaltimes - $var1;
                        if ($var2 == 0.50) {
                            $var2 = 30;
                        } else {
                            $var2 = 00;
                        }
                        $totaltimes = number_format(($var1 . '.' . $var2), 2);
                        $totaltimes = str_replace(".", ":", $totaltimes);


                        $endtime =  $totaltimes;

                        // $starttimes = $startimes + $totaltime;



                        $serviceidcolumn = ' <td class="serviceids" ><p class="specialmodaltext" title="View Service Details" data-toggle="modal" data-target="#bookingdetails" name="' . $serviceid . '" >' . $serviceid . '</p></td>';
                        $datecolumn = '<td scope="row" class="dtime">
                
                        <div class="col date specialmodaltext" title="View Service Details" data-toggle="modal" name="' . $serviceid . '"  data-target="#bookingdetails"><img src="./assets/image/calendar2.png" class="calender">' . $date . '</div>

                            <div class="col time specialmodaltext" title="View Service Details" data-toggle="modal" name="' . $serviceid . '"  data-target="#bookingdetails"><img src="./assets/image/layer-712.png" class="clock mr-1">' . $starttime . ' - ' . $endtime . '</div>
 
                                        </td>';
                        $serviceprovider = '';
                        if ($status == 'Pending') {
                            $serviceprovider = '';
                        }
                        if ($status == 'Approoved') {
                            $serviceproviderid = $row['ServiceProviderId'];
                            $spalldetails = $this->model->GetUsers($serviceproviderid);
                            if (count($spalldetails)) {
                                foreach ($spalldetails as $sp) {
                                    $spfirstname = $sp['FirstName'];
                                    $splastname = $sp['LastName'];
                                    $spratings = $this->model->GetSPRattings($serviceproviderid);
                                    if (count($spratings[0])) {
                                        $sprate = 0;
                                        $count = $spratings[1];
                                        foreach ($spratings[0] as $sprating) {
                                            $sprate = ($sprate + $sprating['Ratings']);
                                        }
                                        // $sprate = $sprate+$sprate;
                                        $sprate = round(($sprate / $count), 2);
                                        $spratings = round($sprate);
                                        $valu = $spratings;
                                        if ($valu != 0) {
                                            $val = '';
                                            $values = '';
                                            for ($i = 1; $i <= $valu; $i++) {

                                                $values = $values .  '<i class="fa fa-star " style="color:rgb(236, 185, 28);"></i>';
                                                // $values = $val.'' .$val;

                                            }
                                            if ($valu <= 5) {
                                                for ($count = ($spratings + 1); $count <= 5; $count++) {
                                                    $values = $values . '<i class="fa fa-star "></i>';
                                                }
                                            }
                                        }
                                        if ($valu = 0) {
                                            $values = '';
                                            for ($i = 1; $i <= 5; $i++) {
                                                $values = $values .  '<i class="fa fa-star " "></i>';
                                            }
                                        }

                                        $values = $values;
                                    } else {
                                        $values = "";
                                        $sprate = 0;
                                        for ($i = 1; $i <= 5; $i++) {
                                            $values = $values .  '<i class="fa fa-star "  style="margin-right:4px;"></i>';
                                        }
                                    }
                                    $serviceprovider = '<td class="service_provider_names">
                                   <div class="row serviceproviderblocks">
                                       <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                       <div class="col ml-3">
                                           <div class="row service-provider">' . $spfirstname . ' ' . $splastname . '</div>
                                           <div class="row star">

                                           ' . $values . '
                                           </div>
                                           <span class="info">' . $sprate . '</span>

                                       </div>
                                   </div>
                               </td>';
                                }
                            }
                        }

                        if ($status == 'Reschedule') {
                            $serviceprovider = '<p class="text-success serviceproviderblocks">You Have Requested to Change SP. New SP Will be Provided Soon.</p>';
                        }
                        $paymentcolumn = '<td>
                                <div class="payment">
                                    <span class="euro">€</span>' . $payment . '
                                </div>
                            </td>';

                        $actioncolumn =  ' <td class="actionblock">
                            <div class="row actionblocks">
                                <div class="col-lg-6 col-md-6 col-6">
                                    <button class="btn reschedule" title="Reschedule" id="' . $serviceid . '" data-toggle="modal" data-target="#rescheduletime">Reschedule</button>
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
                                    <button class="btn cancel" title="Cancel" data-toggle="modal" id="' . $serviceid . '" data-target="#cancelmodal">Cancel</button>
                                </div>
                            </div>
                        </td>';

                        $results = array();
                        $results['blocks'] = $control;
                        $results['serviceid'] = $serviceidcolumn;
                        $results['date'] = $datecolumn;
                        $results['serviceprovider'] = $serviceprovider;
                        $results['payment'] = $paymentcolumn;
                        $results['action'] = $actioncolumn;

                        array_push($json['data'], $results);
                    }
                }
                echo json_encode($json);
                // $return = json_encode($output);

            }
        }
    }

    public function PinCodeCity()
    {
        if (isset($_POST)) {
            $pincode = $_POST['postalcode'];
            $result = $this->model->CityLocation($pincode);
            $city = $result[0];
            $state = $result[1];
            $return = [$city, $state];
            $output =  '<option value="' . $city . '" selected>
            ' . $city . '
        </option>';
            echo $output;
        }
    }


    public function GetSpecificServiceRequest()
    {
        if (isset($_POST)) {
            $serviceid = $_POST['serviceid'];
            $result = $this->model->GetServiceHistoryUser($serviceid);
            $json = array();
            if (count($result)) {
                foreach ($result as $row) {
                    $date = $row['ServiceStartDate'];
                    $starttime = $row['ServiceTime'];
                    $totaltime = $row['TotalHours'];
                    $payment = $row['TotalCost'];
                    $serviceid = $row['ServiceRequestId'];
                    $extraservices = $row['ExtraServices'];
                    $comments = $row['Comments'];
                    $haspets = $row['HasPets'];
                    $addressid = $row['AddressId'];
                    $status = $row['Status'];

                    $totalrequiredtime = $totaltime;

                    $starttime =  date("H:i", strtotime($starttime));

                    $startime = str_replace(":", ".", $starttime);

                    $hoursq = intval($startime);
                    $realPartq =  $startime - $hoursq;
                    $minutesq = intval($realPartq * 60);
                    if ($minutesq == 18) {
                        $minutesq = 5;
                    } else {
                        $minutesq = 0;
                    }
                    $startime =  $hoursq . "." . $minutesq;

                    // $startime =$hours.'.'.$mins; 

                    $hours = intval($totaltime);
                    $realPart = $totaltime - $hours;
                    $minutes = intval($realPart * 60);
                    if ($minutes == 30) {
                        $minutes = 5;
                    } else {
                        $minutes = 0;
                    }
                    $totaltimes = $hours . "." . $minutes;
                    $totaltimes = number_format(($startime + $totaltimes), 2);
                    $var1 = intval($totaltimes);
                    $var2 = $totaltimes - $var1;
                    if ($var2 == 0.50) {
                        $var2 = 30;
                    } else {
                        $var2 = 00;
                    }
                    $totaltimes = number_format(($var1 . '.' . $var2), 2);
                    $totalltimes = str_replace(".", ":", $totaltimes);

                    $address = $this->model->GetSelectedAddress($addressid);
                    // // $json['data'] = array();
                    if (count($address)) {
                        foreach ($address as $adr) {
                            $address1 = $adr['AddressLine1'];
                            $address2 = $adr['AddressLine2'];
                            $city = $adr['City'];
                            $postalcode = $adr['PostalCode'];

                            $serviceaddress = $address1 . ' ' . $address2 . ' , ' . $postalcode . ' ' . $city;
                            $billingaddress = "Same as cleaning Address";

                            $mobile = $adr['Mobile'];
                            $email = $adr['Email'];

                            //   $address = array();
                            //   $address['serviceaddress'] = $serviceaddress;
                            //   $address['billingaddress'] = $billingaddress;
                            //   $address['mobile'] = $mobile;
                            //   $address['email'] = $email; 

                            // array_push($json['data'], $address);

                        }
                    }

                    if ($haspets == 0) {
                        $pets =  '<span><img src="./assets/Image/not-included.png"></span> I haven\'t pets at home';
                    }
                    if ($haspets == 1) {
                        $pets =  '<span><img src="./assets/Image/included.png"></span> I have pets at home';
                    }

                    // $totalresult = array();
                    // $totalresult['pets'] = $pets;
                    // $totalresult['date'] = $date;
                    // $totalresult['starttime'] = $starttime;
                    // $totalresult['endtime'] = $starttime;

                    // array_push($json, $totalresult);
                    $reschedule =   '<button type="submit" class="btn  rescheduleconfirms" id=' . $serviceid . ' title="Reschedule" data-toggle="modal" data-target="#rescheduletime" data-dismiss="modal"><img src="./assets/Image/reschedule-icon-small.png" class="mr-2">Reschedule</button>';
                    $cancel = '<button type="submit" class="btn  cancelconfirm" id=' . $serviceid . ' title="Cancel" data-toggle="modal" data-target="#cancelmodal" data-dismiss="modal"><img src="./assets/Image/close-white.png" style="    width: 15px;
                    height: 15px;" class="mr-2" >Cancel</button>';
                    $updatebutton = '
                    <button type="submit" title="Reschedule" id=' . $serviceid . ' class="btn save rescheduleconfirm" data-dismiss="modal">Update</button>';
                    $cancelbtn = '
                    <button type="submit" title="Cancel" id=' . $serviceid . ' class="btn  finalcancel" disabled="disabled" data-dismiss="modal" style="cursor:not-allowed;">Cancel Now</button>';
                    $selectyourtime = ' <select id="selectime" class="selectime">
                    <option value="8">8:00 </option>
                    <option value="8.5">8:30 </option>
                    <option value="9">9:00 </option>
                    <option value="9.5">9:30 </option>
                    <option value="10">10:00</option>
                    <option value="10.5">10:30</option>
                    <option value="11">11:00</option>
                    <option value="11.5">11:30</option>
                    <option value="12">12:00</option>
                    <option value="12.5">12:30</option>
                    <option value="13">13:00</option>
                    <option value="13.5">13:30</option>
                    <option value="14">14:00</option>
                    <option value="14.5">14:30</option>
                    <option value="15">15:00</option>
                    <option value="15.5">15:30</option>
                    <option value="16">16:00</option>
                    <option value="16.5">16:30</option>
                    <option value="17">17:00</option>
                    <option value="17.5">17:30</option>
                    <option value="18">18:00</option>

                </select>
                <span class="timingerr text-danger"></span>';

                    $commenttextara =  '                    <textarea class="form-control mb-3 cancelreason" id="exampleFormControlTextarea1" rows="3"></textarea>
                ';
                    $selectnewdateandtime = '<p id="' . $totalrequiredtime . '">Select New Date & Time</p>';
                    $output = [$date, $starttime, $totalltimes, $totalrequiredtime, $serviceid, $extraservices, $payment, $serviceaddress, $billingaddress, $mobile, $email, $comments, $pets, $reschedule, $cancel, $updatebutton, $cancelbtn, $selectyourtime, $commenttextara, $selectnewdateandtime];
                }
            }
            echo json_encode($output);
        }
    }


    public function UpdateUserBookingDate()
    {
        if (isset($_POST)) {
            $serviceid = $_POST['serviceid'];
            $newtime = $_POST['newtime'];
            $newdate = $_POST['newdate'];
            $result = $this->model->GetServiceHistoryUser($serviceid);
            if (count($result)) {
                foreach ($result as $row) {
                    $recordversion = $row['RecordVersion'];
                    $userid = intval($row['UserId']);
                    $spid = $row['ServiceProviderId'];
                }
            }
            $recordversion = $recordversion + 1;

            $useremail = $this->model->GetUsers($userid);

            if (count($useremail)) {
                foreach ($useremail as $emails) {
                    $modifiedby  = $emails['Email'];
                }
            }
            $modifieddate = date('Y-m-d H:i:s');;
            $status = "Pending";
            if (!empty($spid)) {
                $status = "Reschedule";
            }
            $array = [
                'newdate' => $newdate,
                'newtime' => $newtime,
                'modifieddate' => $modifieddate,
                'modifiedby' => $modifiedby,
                'recordversion' => $recordversion,
                'status' => $status,
                'serviceid' => $serviceid,

            ];

            $updatedresult = $this->model->RescheduleServiceRequest($array);
            if (!empty($spid)) {
                $Spemail = $this->model->GetUsers($spid);
                if (count($Spemail)) {
                    foreach ($Spemail as $spemail) {
                        $email  = $spemail['Email'];
                    }
                }
            }

            $count = $updatedresult[0];
            if ($count == 1) {
                $clientemail = $modifiedby;
                $subjectmsg = " Reschedule";

                $mailbody = "
                New Date And Time is : <span style='color:red;'>$newdate  $newtime </span>
                <br>
                More Reschedule Details You can show from Customer Dashboard Section.
               <br>
                When Service Provider Accept Your Reschedule Request Than You can show SP Details";
                $mailbodymsg = "
                New Date And Time is : <span style='color:red;'>$newdate  $newtime </span>
                <br>
                More Details you can show from ServiceHistory Section.
                <br>
                Please Check Service Details And Accept The Service Request for Service ID :" . $serviceid;

                $servicemailid = $serviceid;
                include("Views/ClientRescheduleCancelMail.php");
                if (!empty($spid)) {
                    $spemail = $email;

                    include("Views/ServiceProviderRescheduleCancelMail.php");
                }
                if (empty($spid)) {
                    $serviceproviders = $this->model->GetActiveServiceProvider();
                    if (count($serviceproviders)) {
                        foreach ($serviceproviders as $row) {
                            $spemail = $row['Email'];
                            include("Views/ServiceProviderRescheduleCancelMail.php");
                        }
                    }
                }
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function CancelServiceRequest()
    {
        if (isset($_POST)) {
            $serviceid  = $_POST['serviceid'];
            $hasissue = $_POST['hasissue'];
            $result = $this->model->GetServiceHistoryUser($serviceid);
            if (count($result)) {
                foreach ($result as $row) {
                    $recordversion = $row['RecordVersion'];
                    $userid = intval($row['UserId']);
                    $spid = $row['ServiceProviderId'];
                }
            }
            $recordversion = $recordversion + 1;
            $useremail = $this->model->GetUsers($userid);

            if (count($useremail)) {
                foreach ($useremail as $emails) {
                    $modifiedby  = $emails['Email'];
                }
            }
            $modifieddate = date('Y-m-d H:i:s');;
            $status = "Cancelled";
            $array = [
                'hasissue' => $hasissue,
                'modifieddate' => $modifieddate,
                'modifiedby' => $modifiedby,
                'recordversion' => $recordversion,
                'status' => $status,
                'serviceid' => $serviceid,

            ];
            $cancelrequest = $this->model->CancelServiceRequest($array);
            if (!empty($spid)) {
                $Spemail = $this->model->GetUsers($spid);
                if (count($Spemail)) {
                    foreach ($Spemail as $spemail) {
                        $email  = $spemail['Email'];
                    }
                }
            }

            $count = $cancelrequest[0];
            if ($count == 1) {
                $clientemail = $modifiedby;
                $subjectmsg = " Cancelled";
                $mailbody = "Your Request Has Been Cancelled Successfully";
                $mailbodymsg = "
                    Please Check Reason and Feedback For Cancellation Request $serviceid
                    <br>
                    We Hope This Feedback is Useful for You 
                    <br>
                    Feedback : <span style='color:red;'>$hasissue</span>";
                $servicemailid = $serviceid;
                include("./Views/ClientRescheduleCancelMail.php");
                if (!empty($spid)) {
                    $spemail = $email;

                    include("./Views/ServiceProviderRescheduleCancelMail.php");
                }

                if (empty($spid)) {
                    $serviceproviders = $this->model->GetActiveServiceProvider();
                    if (count($serviceproviders)) {
                        foreach ($serviceproviders as $row) {
                            $spemail = $row['Email'];
                            include("Views/ServiceProviderRescheduleCancelMail.php");
                        }
                    }
                }
                echo 1;
            } else {
                echo 0;
            }
        }
    }



    public function ChangeDefaultAddress()
    {
        if (isset($_POST)) {
            $checkedradio = $_POST['checkedradio'];
            $defaultchanged = $this->model->ChangeDefaultAddress($checkedradio);
            $count = $defaultchanged[0];
            if ($count == 1) {
                echo 1;
            } else {
                echo 0;
            }

            // echo $checkedradio;
        }
    }

    public function EditAddressPopup()
    {
        if (isset($_POST)) {
            $addressid  =  $_POST['addressid'];
            $result = $this->model->GetSpecificAddress($addressid);
            if (count($result)) {
                foreach ($result as $row) {
                    $street = $row['AddressLine1'];
                    $houseno = $row['AddressLine2'];
                    $city = $row['City'];
                    $pincode = $row['PostalCode'];
                    $mobile = $row['Mobile'];
                    $cityval =  '<option value="' . $city . '" selected>
                    ' . $city . '
                </option>';
                    $output = [$street, $houseno, $cityval, $pincode, $mobile, $addressid];
                }
            }
            echo json_encode($output);
        }
    }

    public function UpdateCustomerAddress()
    {
        if (isset($_POST)) {
            $street = $_POST['street'];
            $houseno = $_POST['houseno'];
            $pincode = $_POST['pincode'];
            $location = $_POST['location'];
            $mobilenum = $_POST['mobilenum'];
            $addressid = $_POST['addressid'];

            $getstate = $this->model->CityLocation($pincode);
            $state = $getstate[1];

            $array = [
                'street' => $street,
                'houseno' => $houseno,
                'location' => $location,
                'state' => $state,
                'pincode' => $pincode,
                'mobilenum' => $mobilenum,
                'addressid' => $addressid,

            ];
            $result = $this->model->UpdateCustomerAddress($array);

            $count = $result[0];
            if ($count == 1) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function DeleteCustomerAddress()
    {
        if (isset($_POST)) {

            $addressid = $_POST['addressid'];
            $result = $this->model->DeleteCustomerAddress($addressid);

            $count = $result[0];
            if ($count == 1) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function GetCustomerHistory()
    {
        if (isset($_POST)) {
            $email = $_POST['username'];
            $result = $this->model->ResetKey($email);
            $userid = $result[3];
            $result = $this->model->GetServiceHistory($userid);
            $json['data'] = array();
            if (count($result)) {
                foreach ($result as $row) {
                    $date = $row['ServiceStartDate'];
                    $starttime = $row['ServiceTime'];
                    $totaltime = $row['TotalHours'];
                    $payment = $row['TotalCost'];
                    $serviceid = $row['ServiceRequestId'];
                    $spid =  $row['ServiceProviderId'];
                    $status = $row['Status'];
                    $control = '';
                    if ($status != "Pending" && $status != "Approoved" && $status != "Reschedule") {

                        $starttime =  date("H:i", strtotime($starttime));

                        $startime = str_replace(":", ".", $starttime);
                        $hoursq = intval($startime);
                        $realPartq =  $startime - $hoursq;
                        $minutesq = intval($realPartq * 60);
                        if ($minutesq == 18) {
                            $minutesq = 5;
                        } else {
                            $minutesq = 0;
                        }
                        $startime =  $hoursq . "." . $minutesq;

                        $hours = intval($totaltime);
                        $realPart = $totaltime - $hours;
                        $minutes = intval($realPart * 60);
                        if ($minutes == 30) {
                            $minutes = 5;
                        } else {
                            $minutes = 0;
                        }
                        $totaltimes = $hours . "." . $minutes;
                        $totaltimes = number_format(($startime + $totaltimes), 2);
                        $var1 = intval($totaltimes);
                        $var2 = $totaltimes - $var1;
                        if ($var2 == 0.50) {
                            $var2 = 30;
                        } else {
                            $var2 = 00;
                        }
                        $totaltimes = number_format(($var1 . '.' . $var2), 2);
                        $endtime = str_replace(".", ":", $totaltimes);

                        // $starttimes = $startimes + $totaltime;


                        $serviceidcolumn = ' <td class="serviceids" ><p class="specialmodaltext" title="View Service Details" data-toggle="modal" data-target="#bookingdetails" name="' . $serviceid . '" >' . $serviceid . '</p></td>';
                        $datecolumn = '
                        <td>
                                <div scope="row">
                                    <div class="col calenders specialmodaltext" title="View Service Details" data-toggle="modal" name="' . $serviceid . '"  data-target="#bookingdetails"><img src="./assets/image/calendar.png" class="calender">' . $date . '
                                    </div>
                                    <div class="col time specialmodaltext" title="View Service Details" data-toggle="modal" name="' . $serviceid . '"  data-target="#bookingdetails">' . $starttime . ' - ' . $endtime . '</div>
                                </div>
                            </td>
                      ';
                        $serviceprovider = '';
                        if (!empty($spid)) {
                            $spalldetails = $this->model->GetUsers($spid);
                            $values = '';
                            $sprate = 0;
                            if ($sprate == 0) {
                                $values = '';
                                for ($i = 1; $i <= 5; $i++) {
                                    $values = $values .  '<i class="fa fa-star " ></i>';
                                }
                            }
                            if (count($spalldetails)) {

                                foreach ($spalldetails as $sp) {
                                    $spratings = $this->model->GetSPRattings($spid);
                                    if (count($spratings[0])) {
                                        $sprate = 0;
                                        $count = $spratings[1];
                                        foreach ($spratings[0] as $sprating) {
                                            $sprate = ($sprate + $sprating['Ratings']);
                                        }
                                        // $sprate = $sprate+$sprate;
                                        $sprate = number_format((round(($sprate / $count), 2)), 1);
                                        $spratings = round($sprate);
                                        $valu = $spratings;

                                        if ($valu != 0) {
                                            $val = '';
                                            $values = '';
                                            for ($i = 1; $i <= $valu; $i++) {

                                                $values = $values .  '<i class="fa fa-star " style="color:rgb(236, 185, 28);"></i>';
                                                // $values = $val.'' .$val;

                                            }
                                            if ($valu <= 5) {
                                                for ($count = ($spratings + 1); $count <= 5; $count++) {
                                                    $values = $values . '<i class="fa fa-star "></i>';
                                                }
                                            }
                                        }
                                        if ($valu = 0) {
                                            $values = '';
                                            for ($i = 1; $i <= 5; $i++) {
                                                $values = $values .  '<i class="fa fa-star " ></i>';
                                            }
                                        }
                                    }

                                    $spfirstname = $sp['FirstName'];
                                    $splastname = $sp['LastName'];

                                    $serviceprovider = '<td class="service_provider_names">
                                    <div class="row ">
                                        <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                        <div class="col ml-3">
                                            <div class="row service-provider serviceproviderblocks">' . $spfirstname . ' ' . $splastname . '</div>
                                            <div class="row star ">

                                            ' . $values . '
                                          
                                            </div>
                                            <span class="info-start ml-3">' . $sprate . '</span>

                                        </div>
                                    </div>
                                </td>';
                                }
                            }
                        }

                        $paymentcolumn = '<td>
                                <div class="payment">
                                    <span class="euro">€</span>' . $payment . '
                                </div>
                            </td>';
                        if ($status == "Cancelled") {

                            $userstatus =  ' 
                        <td>
                        <button class="btn cancelled" title="' . $status . '">' . $status . '</button>
                    </td>
                        ';
                        }
                        if ($status == "Completed") {

                            $userstatus =  ' 
                                <td>
                                <button class="btn completed" title="' . $status . '">' . $status . '</button>
                            </td>
                                ';
                        }
                        if ($status == "Cancelled") {
                            $ratesp = ' <td>
                        <button class="btn save ratesp" title="Rate Sp" id="' . $serviceid . '" disabled="disabled" style="cursor:not-allowed">Rate Sp</button>
                    </td>
                        ';
                        }
                        if ($status == "Completed") {
                            $ratesp = ' <td>
                             <button class="btn ratesp" title="Rate Sp" id="' . $serviceid . '" data-toggle="modal" name="' . $serviceid . '"  data-target="#RateSP">Rate Sp</button>
                         </td>
                             ';
                        }

                        $results = array();
                        $results['blocks'] = $control;
                        $results['serviceid'] = $serviceidcolumn;
                        $results['date'] = $datecolumn;
                        $results['serviceprovider'] = $serviceprovider;
                        $results['payment'] = $paymentcolumn;
                        $results['status'] = $userstatus;
                        $results['ratesp'] = $ratesp;

                        array_push($json['data'], $results);
                    }
                }
                echo json_encode($json);
                // $return = json_encode($output);

            }
        }
    }


    public function GetSPDetails()
    {
        if (isset($_POST)) {
            $serviceid = $_POST['serviceid'];
            $result = $this->model->GetServiceHistoryUser($serviceid);
            if (count($result)) {
                foreach ($result as $row) {
                    $spid =  $row['ServiceProviderId'];
                    if (!empty($spid)) {
                        $spalldetails = $this->model->GetUsers($spid);
                        if (count($spalldetails)) {
                            foreach ($spalldetails as $sp) {

                                $spfirstname = $sp['FirstName'];
                                $splastname = $sp['LastName'];
                                $serviceproviderid = $spid;
                                $spratings = $this->model->GetSPRattings($spid);
                                if (count($spratings[0])) {
                                    $sprate = 0;
                                    $count = $spratings[1];
                                    foreach ($spratings[0] as $sprating) {
                                        $sprate = ($sprate + $sprating['Ratings']);
                                    }
                                    // $sprate = $sprate+$sprate;
                                    $sprate = round(($sprate / $count), 2);
                                    $spratings = round($sprate);
                                    $valu = $spratings;
                                    if ($valu != 0) {
                                        $val = '';
                                        $values = '';
                                        for ($i = 1; $i <= $valu; $i++) {

                                            $values = $values .  '<i class="fa fa-star " style="color:rgb(236, 185, 28);"></i>';
                                            // $values = $val.'' .$val;

                                        }
                                        if ($valu <= 5) {
                                            for ($count = ($spratings + 1); $count <= 5; $count++) {
                                                $values = $values . '<i class="fa fa-star "></i>';
                                            }
                                        }
                                    }
                                    if ($valu = 0) {
                                        $values = '';
                                        for ($i = 1; $i <= 5; $i++) {
                                            $values = $values .  '<i class="fa fa-star " "></i>';
                                        }
                                    }

                                    $values = $values;

                                    $serviceprovider = '
                                    <div class="row ml-1">
                                    <div class="col service-provider-imgs" ><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3" >
                                        <div class="row service-provider" style="width: 200px;" id="' . $serviceproviderid . '" name="' . $serviceid . '">' . $spfirstname . ' ' . $splastname . '</div>
                                        <div class="row star">
                          
                                        ' . $values . '
                                        </div>
                                        <span class="spratings ml-3">' . $sprate . '</span>
                          
                              
                                     </div>
                          
                                </div>
                            ';
                                } else {
                                    $values = "";
                                    for ($i = 1; $i <= 5; $i++) {
                                        $values = $values .  '<i class="fa fa-star "  style="margin-right:4px;"></i>';
                                    }
                                    $serviceprovider = '
                                    <div class="row ml-1">
                                    <div class="col service-provider-imgs" ><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3" >
                                        <div class="row service-provider" style="width: 200px;" id="' . $serviceproviderid . '" name="' . $serviceid . '">' . $spfirstname . ' ' . $splastname . '</div>
                                        <div class="row star">
                                            ' . $values . '
                                        
                                        </div>
                                        <span class="spratings ml-3"> 0 </span>
                          
                              
                                     </div>
                          
                                </div>
                            ';
                                }
                                $valu = $spratings;
                            }
                        }
                    }
                }
                $ontimearrival = '
                <i class="fa fa-star" id="ratings1"></i>
                <i class="fa fa-star " id="ratings2"></i>
                <i class="fa fa-star " id="ratings3"></i>
                <i class="fa fa-star " id="ratings4"></i>
                <i class="fa fa-star " id="ratings5"></i>
                <span class="infomsg"></span>';

                $friendly = '     <i class="fa fa-star " id="friendly1"></i>
                <i class="fa fa-star " id="friendly2"></i>
                <i class="fa fa-star " id="friendly3"></i>
                <i class="fa fa-star " id="friendly4"></i>
                <i class="fa fa-star " id="friendly5"></i>
                <span class="friendlymsg"></span>';

                $quality = '  <i class="fa fa-star " id="quality1"></i>
                <i class="fa fa-star " id="quality2"></i>
                <i class="fa fa-star " id="quality3"></i>
                <i class="fa fa-star " id="quality4"></i>
                <i class="fa fa-star " id="quality5"></i>
                <span class="qualitymsg"></span>
                    ';

                $comments = '
                    <label for="feedbackcomment">Comments</label>
                    <textarea class="form-control" id="feedbackcomment" rows="2"></textarea>
            ';
                $output = [$serviceprovider, $ontimearrival, $friendly, $quality, $serviceid, $comments];
            }


            echo json_encode($output);
        }
    }

    public function InsertRating()
    {
        if (isset($_POST)) {

            $ontimearrival =    $_POST['timearrival'];
            $friendly =    $_POST['friendly'];
            $quality =    $_POST['quality'];
            $ratingto =   $_POST['spid'];
            $serviceid =   $_POST['serviceid'];
            $username =  $_POST['ratingsfrom'];
            $comment = $_POST['comment'];
            $result = $this->model->ResetKey($username);

            $userid = $result[3];
            $countrating =  $this->model->CountRating($serviceid);
            $countedrating = $countrating[1];

            $averagerating =  round(((intval($ontimearrival) + intval($friendly) + intval($quality)) / 3), 2);
            //  echo $averagerating;

            $array = [
                'serviceid' => $serviceid,
                'ratingfrom' => $userid,
                'ratingto' => $ratingto,
                'averagerating' => $averagerating,
                'comments' => $comment,
                'ratingdt' => date('Y-m-d H:i:s'),
                'isapproved' => 1,
                'visiblehome' => 0,
                'ontimearrival' => $ontimearrival,
                'friendly' => $friendly,
                'quality' => $quality,

            ];
            if ($countedrating > 0) {
                echo 2;
            } else {
                $results = $this->model->InsertRating($array);
                if ($results == 1) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
        }
    }


    public function GetWorkedSP()
    {
        if (isset($_POST)) {
            $username =  $_POST['username'];
            $getuserid = $this->model->ResetKey($username);
            $userid = $getuserid[3];
            $getsps = $this->model->GetSPCompleted($userid);
            $json['data'] = array();
            if (count($getsps[0])) {
                foreach ($getsps[0] as $row) {
                    $fname =   $row['FirstName'];
                    $lname =   $row['LastName'];
                    //  $email = $row['Email'];
                    $serviceproviderid = $row['ServiceProviderId'];
                    $count = $this->model->GetSPAllCount($userid, $serviceproviderid);
                    $result = array();
                    if (count($count)) {
                        foreach ($count as $spcount) {
                            $spid = $spcount['ServiceProviderId'];
                            $counts =  $spcount['COUNT(`ServiceProviderId`)'];
                            $spratings = $this->model->GetSPRattings($spid);

                            if ($serviceproviderid ==  $spid) {
                                if (count($spratings[0])) {
                                    $sprate = 0;
                                    $count = $spratings[1];
                                    foreach ($spratings[0] as $sprating) {
                                        $sprate = ($sprate + $sprating['Ratings']);
                                    }
                                    $sprate = round(($sprate / $count), 2);
                                    $spratings = round($sprate);
                                    $valu = $spratings;
                                    if ($valu != 0) {
                                        $val = '';
                                        $values = '';
                                        for ($i = 1; $i <= $valu; $i++) {

                                            $values = $values .  '<i class="fa fa-star " style="color:rgb(236, 185, 28);"></i>';
                                            // $values = $val.'' .$val;

                                        }
                                        if ($valu <= 5) {
                                            for ($count = ($spratings + 1); $count <= 5; $count++) {
                                                $values = $values . '<i class="fa fa-star "></i>';
                                            }
                                        }
                                    }
                                    if ($valu = 0) {
                                        $values = '';
                                        for ($i = 1; $i <= 5; $i++) {
                                            $values = $values .  '<i class="fa fa-star " "></i>';
                                        }
                                    }

                                    $values = $values;
                                    $favornot =  $this->model->CheckFavouriteOrNot($userid, $spid);

                                    if (count($favornot[1])) {
                                        foreach ($favornot[1] as $fav) {
                                            $isfav = $fav['IsFavorite'];
                                            $isblock = $fav['IsBlocked'];
                                            if ($isfav == 1) {
                                                $favouritebutton = '
                                                        <button type="button" class="btn btn-favourite-unfavourite mr-4" id="' . $spid . '" >UnFavourite</button>';
                                            } else {
                                                $favouritebutton = '
                                                        <button type="button" class="btn btn-favourite-unfavourite mr-4" id="' . $spid . '">Favourite</button>';
                                            }

                                            if ($isblock == 1) {
                                                $blockbtn = '<button type="button" class="btn btn-block-unblock " id="' . $spid . '">UnBlock</button>';
                                            } else {
                                                $blockbtn = '<button type="button" class="btn btn-block-unblock " id="' . $spid . '">Block</button>';
                                            }
                                        }
                                    } else {
                                        $favouritebutton = '
                                            <button type="button" class="btn btn-favourite-unfavourite mr-4" id="' . $spid . '">Favourite</button>';
                                        $blockbtn = '<button type="button" class="btn btn-block-unblock " id="' . $spid . '">Block</button>';
                                    }

                                    $result['serviceprovider'] = '  <td>
                                        <div class="block-customer odd">
                                            <div class="borderimg">
                                                <div class=" serviceproviderimgs"><img src="./assets/image/forma-1-copy-19.png" class="serviceproviderimg">
                                                </div>
                                                <p class="spnames">' . $fname . '   ' . $lname . '</p>
                                                <div class="ratings3 ">
                                                    ' . $values . '
                                                    <span class="qualitymsg">' . $sprate . '</span>
                              
                                                </div>
                                                <div class="cleaningtxt">
                                                    ' . $counts . ' Cleanings
                                                </div>
                                                <div class="favblockbutton">   
                                                ' . $favouritebutton . '
                                                    ' . $blockbtn . '
                                                </div>
                                            </div>
                              
                                    </td>';

                                    array_push($json['data'], $result);
                                } else {
                                    $favornot =  $this->model->CheckFavouriteOrNot($userid, $spid);

                                    if (count($favornot[1])) {
                                        foreach ($favornot[1] as $fav) {
                                            $isfav = $fav['IsFavorite'];
                                            $isblock = $fav['IsBlocked'];
                                            if ($isfav == 1) {
                                                $favouritebutton = '
                                                              <button type="button" class="btn btn-favourite-unfavourite mr-4" id="' . $spid . '">UnFavourite</button>';
                                            } else {
                                                $favouritebutton = '
                                                              <button type="button" class="btn btn-favourite-unfavourite mr-4" id="' . $spid . '">Favourite</button>';
                                            }

                                            if ($isblock == 1) {
                                                $blockbtn = '<button type="button" class="btn btn-block-unblock " id="' . $spid . '">UnBlock</button>';
                                            } else {
                                                $blockbtn = '<button type="button" class="btn btn-block-unblock " id="' . $spid . '">Block</button>';
                                            }
                                        }
                                    } else {
                                        $favouritebutton = '
                                                <button type="button" class="btn btn-favourite-unfavourite mr-4" id="' . $spid . '">Favourite</button>';
                                        $blockbtn = '<button type="button" class="btn btn-block-unblock " id="' . $spid . '">Block</button>';
                                    }
                                    $values = "";
                                    for ($i = 1; $i <= 5; $i++) {
                                        $values = $values .  '<i class="fa fa-star "  style="margin-right:4px;"></i>';
                                    }
                                    $result['serviceprovider'] = '  <td>
                                        <div class="block-customer odd">
                                            <div class="borderimg">
                                                <div class=" serviceproviderimgs"><img src="./assets/image/forma-1-copy-19.png" class="serviceproviderimg">
                                                </div>
                                                <p class="spnames">' . $fname . '   ' . $lname . '</p>
                                                <div class="ratings3 ">
                                                    ' . $values . '
                                                    <span class="qualitymsg">0</span>
                              
                                                </div>
                                                <div class="cleaningtxt">
                                                    ' . $counts . ' Cleanings
                                                </div>
                                                <div class="favblockbutton">
                                                ' . $favouritebutton . '
                                                ' . $blockbtn . '
                                              </div>
                                            </div>
                              
                                    </td>';

                                    array_push($json['data'], $result);
                                }
                            }
                        }
                    }
                }
            }

            echo json_encode($json);
        }
    }


    public function FavUnFav()
    {
        if (isset($_POST)) {
            $username = $_POST['username'];
            $spid = $_POST['spid'];
            $favtext = $_POST['favtext'];

            // echo $username.' '.$spid.' '.$favtext;
            $getuserid = $this->model->ResetKey($username);
            $userid = $getuserid[3];

            $checkDetails = $this->model->CheckValueInFavourite($userid, $spid);
            if ($checkDetails[0] == 0) {
                $array = [
                    'userid' => $userid,
                    'targetuser' => $spid,
                    'isfav' => $favtext,
                    'isblock' => 0,
                ];
                $insetfavsp = $this->model->InsertFavBlockSp($array);
                if ($insetfavsp[0] == 1) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                $array = [
                    'isfav' => $favtext,
                    'isblock' => $checkDetails[1],
                    'userid' => $userid,
                    'targetuser' => $spid,
                ];
                $updatefav = $this->model->UpdateFavBlockSp($array);
                if ($updatefav[0] == 1) {
                    echo 1;
                } else {
                    echo 2;
                }
            }
        }
    }

    public function BlockUnblock()
    {
        if (isset($_POST)) {
            $username = $_POST['username'];
            $spid = $_POST['spid'];
            $blocktext = $_POST['blocktext'];

            // echo $username.' '.$spid.' '.$favtext;
            $getuserid = $this->model->ResetKey($username);
            $userid = $getuserid[3];

            $checkDetails = $this->model->CheckValueInFavourite($userid, $spid);
            if ($checkDetails[0] == 0) {
                $array = [
                    'userid' => $userid,
                    'targetuser' => $spid,
                    'isfav' => 0,
                    'isblock' => $blocktext,
                ];
                $insetblocksp = $this->model->InsertFavBlockSp($array);
                if ($insetblocksp[0] == 1) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                $array = [
                    'isfav' => $checkDetails[2],
                    'isblock' => $blocktext,
                    'userid' => $userid,
                    'targetuser' => $spid,
                ];
                $updateblock = $this->model->UpdateFavBlockSp($array);
                if ($updateblock[0] == 1) {
                    echo 1;
                } else {
                    echo 2;
                }
            }
        }
    }
}
