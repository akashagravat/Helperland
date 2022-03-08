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
                $addressid = $result;
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
                    $statusactive = $row['Status'];
                    $avtarimg = $row['UserProfilePicture'];
                    $natinallity = $row['NationalityId'];
                    $gender = $row['Gender'];
                    $isactives = $row['IsActive'];
                    $address = $this->model->GetAddress($email);
                    if (count($address)) {
                        foreach ($address as $addr) {
                            $street = $addr['AddressLine1'];
                            $houseno = $addr['AddressLine2'];
                            $postalcode = $addr['PostalCode'];
                            $cityval = $addr['City'];
                        }
                    }
                    if ($isactives == "Yes") {
                        $isactive = 1;
                    } else {
                        $isactive = 0;
                    }
                    if (!empty($date)) {

                        list($year, $month, $day) = explode("-", $date);
                    } else {
                        $year = "Year";
                        $month = "Month";
                        $day = "Day";
                    }
                    $city =  '<option value="' . $cityval . '" selected>
                        ' . $cityval . '
                    </option>';
                    $result = [$firstname, $lastname, $email, $mobile, $day, $month, $year, $languageid, $isactive, $avtarimg, $natinallity, $gender, $street, $houseno, $postalcode, $city];

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
                        if ($status == 'Approoved' || $status == 'Reschedule') {
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
                        $actioncolumn = "";
                        if ($status == 'Reschedule') {
                            $actioncolumn  = '<p class="text-success">You have rescheduled service request. Your SP will accept it soon.</p>';
                            // $serviceprovider = '<p class="text-success serviceproviderblocks">You Have Requested to Change SP. New SP Will be Provided Soon.</p>';
                        }
                        $paymentcolumn = '<td>
                                <div class="payment">
                                    <span class="euro">€</span>' . $payment . '
                                </div>
                            </td>';
                        if ($status != 'Reschedule') {
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
                        }
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
            if (isset($_POST['userid'])) {
                $spuserid = $_POST['userid'];
            }
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
                    $userid = $row['UserId'];
                    $totalrequiredtime = $totaltime;
                    $serviceproviderid = $row['ServiceProviderId'];

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
                    $serviceprovider = '';
                    if (empty($serviceproviderid)) {
                        $serviceprovider = '';
                    }
                    if (!empty($serviceproviderid)) {
                        $spalldetails = $this->model->GetUsers($serviceproviderid);

                        if ($status == 'Approoved' || $status == 'Completed' || $status == 'Reschedule' || $status == "Cancelled") {

                            if (count($spalldetails)) {
                                foreach ($spalldetails as $sp) {
                                    $picture = $sp['UserProfilePicture'];
                                    $spfirstname = $sp['FirstName'];
                                    $splastname = $sp['LastName'];
                                    $spratings = $this->model->GetSPRattings($serviceproviderid);
                                    $countsps = $this->model->GetSPAllCount($userid, $serviceproviderid);
                                    if (count($countsps)) {
                                        foreach ($countsps as $spcount) {
                                            $counts =  $spcount['COUNT(`ServiceProviderId`)'];

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
                                            if (strlen($picture) != 0) {
                                                // $pictures = "http://localhost/helper/assets/image/car.png";
                                                $image = str_replace("http://localhost/helper/", "./", $picture);
                                                $imgs = '<img  src="' . $image . '" class="service-provider-img">';
                                            } else {
                                                // $pictures = "./assets/image/car.png";

                                                $imgs = '<img src="./assets/image/avatar-hat.png" class="service-provider-img">';
                                            }
                                            $serviceprovider = '
                                <div class="totaldetils">
                                <h4>Service Provider Details
                                </h4>
                               <div class="row serviceproviderblocks">
                                            ' . $imgs . '
                               <div class="col ml-3">
                                       <div class="row service-provider">' . $spfirstname . ' ' . $splastname . '</div>
                                       <div class="row star">

                                       ' . $values . '
                                       </div>
                                       <span class="info">' . $sprate . '</span>

                                   </div>
                               </div>
                               <p class="mt-2">' . $counts . ' Cleaning</p>     
                               </div>
                           ';
                                        }
                                    }
                                }
                            }
                        }
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
                    $mapaddress = $address1 . ' ' . $postalcode;
                    $map = '   <iframe width="100%" height="400" src="https://maps.google.com/maps?q=' . $mapaddress . '&output=embed"></iframe>';

                    $customerdetails =  $this->model->GetUsers($userid);
                    if (count($customerdetails)) {
                        foreach ($customerdetails as $cs) {
                            $custfname = $cs['FirstName'];
                            $custlname = $cs['FirstName'];
                        }
                    }

                    if (isset($spuserid)) {

                        $endtimws = $var1 + 1;
                        $totaltimefs = number_format(($endtimws . '.' . $var2), 2);
                        $totalltimefs = str_replace(".", ":", $totaltimefs);
                        $endtime = "'.$totalltimefs.'";
                        $stime = $date;

                        $resultsp = $this->model->ConflictSP($spuserid, $stime, $endtime);
                        $countsall = $resultsp[0];
                        // $servicerequestid = $resultsp[1];

                        if ($countsall >= 1) {
                            $acceptbtn = '
                                    <button type="submit" class="btn  btn-accept-green"   id=' . $serviceid . ' title="Accept Service Request"  data-dismiss="modal" disabled="disabled" style="cursor:not-allowed;"><img src="./assets/Image/included.png" class="mr-2">Accept</button>
                                    ';
                        } else {
                            $acceptbtn = '
                            <button type="submit" class="btn  btn-accept-green" id=' . $serviceid . ' title="Accept Service Request"  data-dismiss="modal"><img src="./assets/Image/included.png" class="mr-2">Accept</button>
                            ';
                        }
                    } else {
                        $acceptbtn = '
                    <button type="submit" class="btn  btn-accept-green" id=' . $serviceid . ' title="Accept Service Request"  data-dismiss="modal"><img src="./assets/Image/included.png" class="mr-2">Accept</button>
                    ';
                    }

                    date_default_timezone_set('Asia/Kolkata');
                    $todaydate = date("d/m/Y");
                    $todaydate = strtotime($todaydate);
                    $str = strtotime($date);
                    $currenttime = date("H:i");
                    $currenttime = strtotime($currenttime);
                    $ts = strtotime($totalltimes);
                    if ($todaydate >= $str) {
                        if ($todaydate == $str) {
                            if ($currenttime >= $ts) {
                                $cancelupcomingbtn = '        
                                <button class="btn btn-completed " id="' . $serviceid . '"   name="' . $serviceid . '"  data-dismiss="modal" title="Completed"><i class="fa fa-check mr-2"></i>Completed </button> ';
                            } else {

                                $cancelupcomingbtn = '<button type="submit" class="btn  cancelconfirm" id=' . $serviceid . ' title="Cancel" data-toggle="modal" data-target="#cancelmodal" data-dismiss="modal"><img src="./assets/Image/close-white.png" style="    width: 15px;
                            height: 15px;" class="mr-2" >Cancel</button>';
                            }
                        } else {
                            $cancelupcomingbtn = '        
                    <button class="btn btn-completed " id="' . $serviceid . '"   name="' . $serviceid . '"  data-dismiss="modal" title="Completed"><i class="fa fa-check mr-2"></i>Completed </button> ';
                        }
                    } else {
                        $cancelupcomingbtn = '<button type="submit" class="btn  cancelconfirm" id=' . $serviceid . ' title="Cancel" data-toggle="modal" data-target="#cancelmodal" data-dismiss="modal"><img src="./assets/Image/close-white.png" style="    width: 15px;
                    height: 15px;" class="mr-2" >Cancel</button>';
                    }
                    //      $cancelupcomingbtn = '<button type="submit" class="btn  cancelconfirm" id=' . $serviceid . ' title="Cancel" data-toggle="modal" data-target="#cancelmodal" data-dismiss="modal"><img src="./assets/Image/close-white.png" style="    width: 15px;
                    // height: 15px;" class="mr-2" >Cancel</button>';
                    $custmernames = $custfname . '  ' . $custlname;
                    $commenttextara =  '                    <textarea class="form-control mb-3 cancelreason" id="exampleFormControlTextarea1" rows="3"></textarea>
                ';
                    //data-toggle="modal" data-target="#bookingdetails" name="'.$serviceid.'"
                    $selectnewdateandtime = '<p id="' . $totalrequiredtime . '">Select New Date & Time</p>';
                    if($status == "Completed"){
                        $finalview = "";
                    }
                    if($status == "Approoved"){
                        $finalview =  $cancelupcomingbtn;
                    }
                 
                    $output = [$date, $starttime, $totalltimes, $totalrequiredtime, $serviceid, $extraservices, $payment, $serviceaddress, $billingaddress, $mobile, $email, $comments, $pets, $reschedule, $cancel, $updatebutton, $cancelbtn, $selectyourtime, $commenttextara, $selectnewdateandtime, $serviceprovider, $custmernames, $acceptbtn, $cancelupcomingbtn, $map,$finalview];
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
            $modifieddate = date('Y-m-d H:i:s');
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


    public function InsertUpdateAddress()
    {

        $street = $_POST['street'];
        $houseno = $_POST['houseno'];
        $pincode = $_POST['pincode'];
        $location = $_POST['location'];
        $mobilenum = $_POST['mobilenum'];
        $email = $_POST['username'];
        $useraddress = $this->model->GetAddress($email);

        $result = $this->model->ResetKey($email);
        $userid = $result[3];
        $type = 1;
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
        if (!count($useraddress)) {
            $result = $this->model->InsertAddress($array);
        }
        if (count($useraddress)) {
            $result = $this->model->UpdateCustomerAddress($array);
        }
    }

    public function AddSPDetails()
    {
        if (isset($_POST)) {
            $firstname =   $_POST['firstname'];
            $lastname =   $_POST['lastname'];
            $email =   $_POST['email'];
            $mobile =   $_POST['mobile'];
            $birthdate =   $_POST['birthdate'];
            $avtarimg = $_POST['avtarimg'];
            $gender = $_POST['gender'];
            $pincode = $_POST['pincode'];
            $street = $_POST['street'];
            $houseno = $_POST['houseno'];
            $location = $_POST['location'];
            $mobilenum = $_POST['mobilenum'];
            $nationallity = $_POST['nationallity'];
            $modifiedby = $firstname . " " . $lastname;
            $modifieddate = date('Y-m-d H:i:s');
            $useraddress = $this->model->GetAddress($email);

            $result = $this->model->ResetKey($email);
            $userid = $result[3];
            $type = 1;
            $getstate = $this->model->CityLocation($pincode);
            $state = $getstate[1];


            $array = [
                'fistname' => $firstname,
                'lastname' => $lastname,
                'mobile' => $mobile,
                'avtarimg' => $avtarimg,
                'gender' => $gender,
                'pincode' => $pincode,
                'nationallity' => $nationallity,
                'birthdate' => $birthdate,
                'modifieddate' => $modifieddate,
                'modifiedby' => $email,
                "email" => $email,
            ];

            $addressarray = [
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

            $updateaddressarray = [

                'street' => $street,
                'houseno' => $houseno,
                'location' => $location,
                'state' => $state,
                'pincode' => $pincode,
                'mobilenum' => $mobilenum,
                'email' => $email,

            ];
            if (!count($useraddress)) {
                $results = $this->model->InsertSPAddress($addressarray);
                $counts = $results[0];
            }
            if (count($useraddress)) {
                $results = $this->model->UpdateSPAddress($updateaddressarray);
                $countsupdate = $results[0];
            }
            $result = $this->model->UpdateSP($array);

            $count = $result[0];
            if ($count == 1 || $counts == 1) {
                $_SESSION['firstname'] = $modifiedby;
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function GetPendingBookedService()
    {
        if (isset($_POST)) {
            $username = $_POST['username'];
            $haspet = intval($_POST['pets']);

            $uerid = $this->model->ResetKey($username);
            $userid = $uerid[3];
            $json['data'] = array();
            $results = $this->model->GetPendingService();
            if (count($results)) {
                foreach ($results as $row) {
                    $serviceid = $row['ServiceRequestId'];
                    $servicestartdate = $row['ServiceStartDate'];
                    $servicestarttime = $row['ServiceTime'];
                    $fname = $row['FirstName'];
                    $lname = $row['LastName'];
                    $street = $row['AddressLine1'];
                    $houseno = $row['AddressLine2'];
                    $city  = $row['City'];
                    $state = $row['State'];
                    $postalcode = $row['PostalCode'];
                    $payment = $row['TotalCost'];
                    $totaltime = $row['TotalHours'];
                    $status = $row['Status'];
                    $pets = $row['HasPets'];
                    $serviceproviderid = $row['ServiceProviderId'];

                    $starttime =  date("H:i", strtotime($servicestarttime));

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

                    $endtimws = $var1 + 1;
                    $totaltimefs = number_format(($endtimws . '.' . $var2), 2);
                    $totalltimefs = str_replace(".", ":", $totaltimefs);
                    $endtime = "'.$totalltimefs.'";
                    $stime = $servicestartdate;
                    $resultsp = $this->model->ConflictSP($userid, $stime, $endtime);
                    $counts = $resultsp[0];
                    if ($counts >= 1) {
                        $servicerequestid = $resultsp[1];
                        $timeconflict = '<div class="time_conflict">
                              <p class="text-danger">Another service request ' . $servicerequestid . '  has already been assigned which has time overlap with this service request. You can’t pick this one!</p>                        </div>';

                        $action = '        
                        <button class="btn btn-accept specialmodtext" id="' . $serviceid . '" data-toggle="modal" data-target="#bookingdetails"  name="' . $serviceid . '"  title="Accept Service Request" disabled="disabled" style="cursor:not-allowed;">Accept</button>
                                      ';
                    } else {
                        $timeconflict = '<div class="time_conflict"></div>';
                        $action = '        
                        <button class="btn btn-accept specialmodtext" id="' . $serviceid . '" data-toggle="modal" data-target="#bookingdetails"  name="' . $serviceid . '"  title="Accept Service Request">Accept</button>
                                      ';
                    }



                    $serviceids = '
                        <div class="specialmodtext" data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '" name="' . $serviceid . '" title="View Service Details">' . $serviceid . '</div>
                       ';
                    $dates = ' <div scope="row" >
                        <div class="col date specialmodtext" data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '" name="' . $serviceid . '" title="View Service Details"><img src="./assets/image/calendar2.png" class="calender mr-2">' . $servicestartdate . '</div>
                        <div class="col time specialmodtext" data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '" name="' . $serviceid . '" title="View Service Details"><img src="./assets/image/layer-712.png" class="clock mr-2">' . $starttime . ' - ' . $totalltimes . '</div>
                    </div>';

                    $userdetails = '     <div class="row addressp">
                    <div class="col-12 specialmodtext"data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '"  name="' . $serviceid . '" title="View Service Details">' . $fname . ' ' . $lname . ' </div>
                    <div class="col-12 address specialmodtext" data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '"  name="' . $serviceid . '" title="View Service Details"><img src="./assets/image/layer-719.png" class="home">' . $street . ' ' . $houseno . ',' . $postalcode . ' ' . $city . '</div>
                </div>';

                    $paymnetbook = '<div class="payment paymentbooked">
                <span class="euro">€</span>' . $payment . '
            </div>';


                    $result = array();
                    if ($haspet == 1) {
                        if ($pets == 1) {
                            $result = array();
                            $result['blocks'] = "";
                            $result['serviceid'] = $serviceids;
                            $result['dates'] = $dates;
                            $result['customerdetails'] = $userdetails;
                            $result['payment'] = $paymnetbook;
                            $result['timeconflict'] = $timeconflict;
                            $result['action'] = $action;
                        } else {
                            $result = array();
                            $result['blocks'] = "";
                            $result['serviceid'] = "";
                            $result['dates'] = "";
                            $result['customerdetails'] = "";
                            $result['payment'] = "";
                            $result['timeconflict'] = "";
                            $result['action'] = "";
                        }
                    }
                    if ($haspet == 0) {

                        $result = array();
                        $result['blocks'] = "";
                        $result['serviceid'] = $serviceids;
                        $result['dates'] = $dates;
                        $result['customerdetails'] = $userdetails;
                        $result['payment'] = $paymnetbook;
                        $result['timeconflict'] = $timeconflict;
                        $result['action'] = $action;
                    }
                    array_push($json['data'], $result);
                }
            }
            echo json_encode($json);
        }
    }


    public function AcceptClientRequest()
    {
        if (isset($_POST)) {
            $serviceid = $_POST['serviceid'];
            $username = $_POST['username'];
            $result = $this->model->GetServiceHistoryUser($serviceid);
            if (count($result)) {
                foreach ($result as $row) {
                    $recordversion = $row['RecordVersion'];
                    $customeruserid = intval($row['UserId']);
                    $status = $row['Status'];
                }
            }
            if ($status != "Approoved") {
                $recordversion = $recordversion + 1;

                $spdetails = $this->model->ResetKey($username);
                $useremail = $this->model->GetUsers($customeruserid);
                $spid = $spdetails[3];

                if (count($useremail)) {
                    foreach ($useremail as $emails) {
                        $customeremail  = $emails['Email'];
                    }
                }
                $modifieddate = date('Y-m-d H:i:s');;
                $status = "Approoved";

                $array = [
                    'modifieddate' => $modifieddate,
                    'modifiedby' => $username,
                    'recordversion' => $recordversion,
                    'status' => $status,
                    'serviceproviderid' =>   $spid,
                    'spaccept' => $modifieddate,
                    'serviceid' => $serviceid,

                ];

                $updatedresult = $this->model->ApprooveServiceRequest($array);
                $usertype = 1;
                $getspall =  $this->model->GetSPall($usertype, $spid);

                $count = $updatedresult[0];

                if ($count == 1) {
                    $customeremail = $customeremail;
                    $clientemail = $customeremail;
                    $servicemailid = $serviceid;
                    $subjectmsg = " Accepted";
                    $mailbody = 'To view More Details Please Login and Check All Service provider.';
                    include('./Views/ClientRescheduleCancelMail.php');
                    if (count($getspall)) {
                        foreach ($getspall as $getsps) {
                            $spemails =  $getsps['Email'];
                            $subjectmsg = ' Accepted';
                            $mailbody = 'This service request has already been accepted by someone and is no more available for you.';
                            $serviceid  = $serviceid;
                            include('./Views/ServiceBookedbySP.php');
                        }
                    }

                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 2;
            }
        }
    }

    public function GetSPUpcomingService()
    {
        if (isset($_POST)) {
            $username = $_POST['username'];
            $json['data'] = array();
            $spdetails = $this->model->ResetKey($username);
            $userid = $spdetails[3];
            $upcoming = $this->model->GetUpcomingServiceHistory($userid);
            if (count($upcoming)) {
                foreach ($upcoming as $row) {
                    $serviceid = $row['ServiceRequestId'];
                    $servicestartdate = $row['ServiceStartDate'];
                    $servicestarttime = $row['ServiceTime'];
                    $fname = $row['FirstName'];
                    $lname = $row['LastName'];
                    $street = $row['AddressLine1'];
                    $houseno = $row['AddressLine2'];
                    $city  = $row['City'];
                    $state = $row['State'];
                    $postalcode = $row['PostalCode'];
                    $payment = $row['TotalCost'];
                    $totaltime = $row['TotalHours'];
                    $status = $row['Status'];
                    $serviceproviderid = $row['ServiceProviderId'];
                    $serviceid = $row['ServiceRequestId'];
                    $servicestartdate = $row['ServiceStartDate'];
                    $servicestarttime = $row['ServiceTime'];
                    $fname = $row['FirstName'];
                    $lname = $row['LastName'];
                    $street = $row['AddressLine1'];
                    $houseno = $row['AddressLine2'];
                    $city  = $row['City'];
                    $state = $row['State'];
                    $postalcode = $row['PostalCode'];
                    $payment = $row['TotalCost'];
                    $totaltime = $row['TotalHours'];
                    $status = $row['Status'];
                    $serviceproviderid = $row['ServiceProviderId'];

                    $starttime =  date("H:i", strtotime($servicestarttime));

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


                    $serviceids = '
                    <div class="specialmodtext" data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '" name="' . $serviceid . '" title="View Service Details">' . $serviceid . '</div>
                   ';
                    $dates = ' <div scope="row" >
                    <div class="col date specialmodtext" data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '" name="' . $serviceid . '" title="View Service Details"><img src="./assets/image/calendar2.png" class="calender mr-2">' . $servicestartdate . '</div>
                    <div class="col time specialmodtext" data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '" name="' . $serviceid . '" title="View Service Details"><img src="./assets/image/layer-712.png" class="clock mr-2">' . $starttime . ' - ' . $totalltimes . '</div>
                </div>';

                    $userdetails = '     <div class="row addressp">
                <div class="col-12 specialmodtext"data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '"  name="' . $serviceid . '" title="View Service Details">' . $fname . ' ' . $lname . ' </div>
                <div class="col-12 address specialmodtext" data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '"  name="' . $serviceid . '" title="View Service Details"><img src="./assets/image/layer-719.png" class="home">' . $street . ' ' . $houseno . ',' . $postalcode . ' ' . $city . '</div>
            </div>';
                    date_default_timezone_set('Asia/Kolkata');
                    $todaydate = date("d/m/Y");
                    $todaydate = strtotime($todaydate);
                    $str = strtotime($servicestartdate);
                    $currenttime = date("H:i");
                    $currenttime = strtotime($currenttime);
                    $ts = strtotime($totalltimes);
                    if ($todaydate >= $str) {
                        if ($todaydate == $str) {
                            if ($currenttime >= $ts) {
                                $action = '        
                        <button class="btn btn-completed specialmodtext" id="' . $serviceid . '" data-toggle="modal" data-target="#bookingdetails"  name="' . $serviceid . '"  title="Completed"><i class="fa fa-check mr-2"></i>Completed</button>';
                            } else {
                                $action = '        
                        <button class="btn btn-cancel specialmodtext" id="' . $serviceid . '" data-toggle="modal" data-target="#cancelmodal"  name="' . $serviceid . '"  title="Cancel Service Request">Cancel</button>';
                            }
                        } else {
                            $action = '        
                    <button class="btn btn-completed specialmodtext" id="' . $serviceid . '" data-toggle="modal" data-target="#bookingdetails"  name="' . $serviceid . '"  title="Completed"><i class="fa fa-check mr-2"></i>Completed</button>';
                        }
                    } else {
                        $action = '        
            <button class="btn btn-cancel specialmodtext" id="' . $serviceid . '" data-toggle="modal" data-target="#cancelmodal"  name="' . $serviceid . '"  title="Cancel Service Request">Cancel</button>';
                    }


                    $result = array();
                    $result['blocks'] = '';
                    $result['serviceid'] = $serviceids;
                    $result['dates'] = $dates;
                    $result['details'] =  $userdetails;
                    $result['distance'] = '21km';
                    $result['action'] = $action;

                    array_push($json['data'], $result);
                }
            }
            echo json_encode($json);
        }
    }

    public function CompleteRequest()
    {
        if (isset($_POST)) {
            $serviceid  = $_POST['serviceid'];
            $result = $this->model->GetServiceHistoryUser($serviceid);
            if (count($result)) {
                foreach ($result as $row) {
                    $recordversion = $row['RecordVersion'];
                    $userid = intval($row['UserId']);
                    $spid = $row['ServiceProviderId'];
                }
            }
            $recordversion = $recordversion + 1;
            $useremail = $this->model->GetUsers($spid);

            if (count($useremail)) {
                foreach ($useremail as $emails) {
                    $modifiedby  = $emails['Email'];
                }
            }
            $modifieddate = date('Y-m-d H:i:s');;
            $status = "Completed";
            $array = [
                'modifieddate' => $modifieddate,
                'modifiedby' => $modifiedby,
                'recordversion' => $recordversion,
                'status' => $status,
                'serviceid' => $serviceid,
            ];
            $cancelrequest = $this->model->CompleteServiceRequest($array);

            $count = $cancelrequest[0];
            if ($count == 1) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function CancelServiceRequestSP()
    {
        if (isset($_POST)) {
            $serviceid  = $_POST['serviceid'];
            $hasissue = $_POST['hasissue'];
            $result = $this->model->GetServiceHistoryUser($serviceid);
            if (count($result)) {
                foreach ($result as $row) {
                    $recordversion = $row['RecordVersion'];
                    $userid = intval($row['UserId']);
                    $spid = intval($row['ServiceProviderId']);
                }
            }
            $recordversion = $recordversion + 1;
            $useremail = $this->model->GetUsers($spid);

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

            $count = $cancelrequest[0];
            if ($count == 1) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }


    public function GetSPHistory()
    {
        if (isset($_POST)) {
            $email = $_POST['username'];
            $paymentstatus = intval($_POST['pyst']);
            $result = $this->model->ResetKey($email);
            $userid = $result[3];
            $result = $this->model->GetServiceSPHistory($userid);
            $json['data'] = array();
            if (count($result)) {
                foreach ($result as $row) {
                    $date = $row['ServiceStartDate'];
                    $starttime = $row['ServiceTime'];
                    $totaltime = $row['TotalHours'];
                    $payment = $row['TotalCost'];
                    $user = $row['UserId'];

                    $serviceid = $row['ServiceRequestId'];
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
                        <div scope="row" >
                    <div class="col date specialmodtext" data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '" name="' . $serviceid . '" title="View Service Details"><img src="./assets/image/calendar2.png" class="calender mr-2">' . $date . '</div>
                    <div class="col time specialmodtext" data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '" name="' . $serviceid . '" title="View Service Details"><img src="./assets/image/layer-712.png" class="clock mr-2">' . $starttime . ' - ' . $endtime . '</div>
                </div>
                      ';



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
                        $userdetails =  $this->model->CustComplteDetails($serviceid);
                        if (count($userdetails)) {
                            foreach ($userdetails as $ud) {
                                $fname = $ud['FirstName'];
                                $lname = $ud['LastName'];
                                $street = $ud['AddressLine1'];
                                $houseno = $ud['AddressLine2'];
                                $city = $ud['City'];
                                $postalcode = $ud['PostalCode'];

                                $userdetails = '     <div class="row addressp">
                               <div class="col-12 specialmodtext"data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '"  name="' . $serviceid . '" title="View Service Details">' . $fname . ' ' . $lname . ' </div>
                               <div class="col-12 address specialmodtext" data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '"  name="' . $serviceid . '" title="View Service Details"><img src="./assets/image/layer-719.png" class="home">' . $street . ' ' . $houseno . ',' . $postalcode . ' ' . $city . '</div>
                           </div>';
                            }
                        }

                        if ($paymentstatus == 1) {
                            $results = array();
                            $results['blocks'] = $control;
                            $results['serviceid'] = $serviceidcolumn;
                            $results['date'] = $datecolumn;
                            $results['payment'] = $paymentcolumn;
                            $results['details'] = $userdetails;

                            $results['status'] = $userstatus;
                        }
                        if ($paymentstatus == 2) {
                            if ($status == "Completed") {
                                $results = array();
                                $results['blocks'] = $control;
                                $results['serviceid'] = $serviceidcolumn;
                                $results['date'] = $datecolumn;
                                $results['payment'] = $paymentcolumn;
                                $results['details'] = $userdetails;

                                $results['status'] = $userstatus;
                            } else {
                                $results = array();
                                $results['blocks'] = "";
                                $results['serviceid'] = "";
                                $results['date'] = "";
                                $results['payment'] = "";
                                $results['details'] = "";

                                $results['status'] = "";
                            }
                        }


                        if ($paymentstatus == 3) {
                            if ($status == "Cancelled") {
                                $results = array();
                                $results['blocks'] = $control;
                                $results['serviceid'] = $serviceidcolumn;
                                $results['date'] = $datecolumn;
                                $results['payment'] = $paymentcolumn;
                                $results['details'] = $userdetails;

                                $results['status'] = $userstatus;
                            } else {
                                $results = array();
                                $results['blocks'] = "";
                                $results['serviceid'] = "";
                                $results['date'] = "";
                                $results['payment'] = "";
                                $results['details'] = "";

                                $results['status'] = "";
                            }
                        }
                        array_push($json['data'], $results);
                    }
                }
                echo json_encode($json);
                // $return = json_encode($output);

            }
        }
    }

    public function GetSPratings()
    {
        if (isset($_POST)) {
            $username = $_POST['username'];
            $selectbtn = intval($_POST['selects']);
            $result = $this->model->ResetKey($username);
            $userid = $result[3];
            $ratings = $this->model->GetRating($userid);
            $json['data'] = array();
            if (count($ratings[0])) {
                foreach ($ratings[0] as $row) {
                    $serviceid = $row['ServiceRequestId'];
                    $ratingfrom = $row['RatingFrom'];
                    $visible = $row['VisibleOnHomeScreen'];
                    $spcomment  = $row['Comments'];
                    $results = $this->model->GetUsers($ratingfrom);
                    if (count($results)) {
                        foreach ($results as $nm) {
                            $custname = $nm['FirstName'] . ' ' . $nm['LastName'];
                        }
                    }
                    // $custname = $results[0];
                    $sprate = $row['Ratings'];
                    $sprates = $row['Ratings'];

                    $spratings = round($sprate);
                    $sprate = intval($sprate);
                    $valu = $spratings;

                    if ($valu != 0) {
                        $val = '';
                        $values = '';
                        for ($i = 1; $i <= $valu; $i++) {
                            ?>
                            <?php
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
                                   
                             // $values = "<script language=javascript>rating</script>";
                    if ($sprates >= 4 && $sprates <= 5) {
                        $txt = "Very Good";
                    } else if ($sprates >= 3 && $sprates < 4) {
                        $txt = "Good";
                    } else if ($sprates >= 2) {
                        $txt = "Poor";
                    } else if ($sprates < 2) {
                        $txt = "Very Poor";
                    }
                    if ($visible == 0) {
                        $comment = "";
                    }

                    if ($visible == 1) {
                        $comment = $spcomment;
                    }
                    $servicedetails = $this->model->GetServiceHistoryUser($serviceid);
                    if (count($servicedetails)) {
                        foreach ($servicedetails as $sps) {
                            $date = $sps['ServiceStartDate'];
                            $starttime = $sps['ServiceTime'];
                            $totaltime = $sps['TotalHours'];
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
                   
                             $cnt = $ratings[1];
                           
                            $out1 = '  <div class="ratig mb-5">
                                      <div class="ratingsall">
            
                                        <div class="col firstcol">
                                            <div class="col">' . $serviceid . '</div>
                                            <div class="col"><b>' . $custname . '</b></div>
                            
                                        </div>
                                        <div class="col secondcol">
                                            <div class="col date"><img src="./assets/image/calendar2.png" class="calender">' . $date . '</div>
                                            <div class="col time"><img src="./assets/image/layer-712.png" class="clock">' . $starttime . ' - ' . $endtime . '</div>
                            
                                        </div>
                                        <div class="col thirdcol">
                                            <div><b>Ratings</b></div>
                                            <div class="col">
                                                <div class="row star">
                                                    ' . $values . '
                            
                                                    <span>' . $txt  . '</span>
                                                </div>
                                            </div>
                            
                                        </div>
                                    </div>
                                    <hr class="ratinghr">
                                    <div class="cname "><b>Customer Comment:</b></div>
                                    <div class="cname">' . $comment . '</div>
                                </div>';
                            $outs = "No Record Found";
                            // $output = [$out1];
                            $out2 = '';
                            $out3 = '';
                            $out4 = '';
                            $out5 = '';
                            $output = array();

                            if ($sprates >= 4 && $sprates < 5) {
                                $out2 = $out1;
                            }
                            if ($sprates >= 3 && $sprates < 4) {
                                $out3 = $out1;
                            }
                            if ($sprates >= 2 && $sprates < 3) {
                                $out4 = $out1;
                            }
                            if ($sprates < 2) {
                                $out5 = $out1;
                            }

                            if ($selectbtn == 1) {
                                $output['ratings'] = $out1;
                                //   echo  $out1;
                            }
                            if ($selectbtn == 2) {
                                $output['ratings'] = $out2;

                                // echo  $out2;
                            }
                            if ($selectbtn == 3) {
                                $output['ratings'] = $out3;

                                // echo  $out3;
                            }
                            if ($selectbtn == 4) {
                                $output['ratings'] = $out4;

                                // echo  $out4;
                            }
                            if ($selectbtn == 5) {
                                $output['ratings'] = $out5;
                            }

                            // $output = [$out1];
                            array_push($json['data'], $output);
                        }
                    }
                }
            }
            echo json_encode($json);
        }
    }

    public function GetWorkedCustomer()
    {
        if (isset($_POST)) {
            $username =  $_POST['username'];
            $result = $this->model->ResetKey($username);
            $userid = $result[3];
            $getcust =  $this->model->WorkedCust($userid);
            $json['data'] = array();
            if (count($getcust)) {
                foreach ($getcust as $cust) {
                    $custfname =  $cust['FirstName'];
                    $custlname =  $cust['LastName'];
                    $custid = $cust['UserId'];
                    $resultall = array();
                    $values = $this->model->CheckValueInFavourite($userid, $custid);
                    $isblock = $values[1];
                    if ($values == 0) {
                        $blockbtn = '<button type="button" class="btn btn-block-unblock " name = "' . $userid . '" id="' . $custid . '">Block</button>';

                        $resultall['serviceprovider'] = '';
                    } else {
                        if ($isblock == 1) {
                            $blockbtn = '<button type="button" class="btn btn-block-unblock " name = "' . $userid . '" id="' . $custid . '">UnBlock</button>';
                        } else {
                            $blockbtn = '<button type="button" class="btn btn-block-unblock " name = "' . $userid . '" id="' . $custid . '">Block</button>';
                        }
                        $resultall['serviceprovider'] = '  <td>
                        <div class="block-customer odd">
                            <div class="borderimg">
                                <div class=" serviceproviderimgs"><img src="./assets/image/forma-1-copy-19.png" class="serviceproviderimg">
                                </div>
                                <p class="spnames">' . $custfname . '   ' . $custlname . '</p>
                             
                                <div class="favblockbutton">   
                                    ' . $blockbtn . '
                                </div>
                            </div>
              
                    </td>';
                    }
                    array_push($json['data'], $resultall);
                }
            }
            echo json_encode($json);
        }
    }


    public function AdminUser()
    {
        if (isset($_POST)) {
            $users = $this->model->Alluser();
            $json['data'] = array();
            if (count($users)) {
                foreach ($users as $us) {
                    $userid = $us['UserId'];
                    $firstname  = $us['FirstName'];
                    $lastname  = $us['LastName'];
                    $role = $us['RoleId'];
                    $date = $us['CreatedDate'];
                    $dates = date("d/m/Y", strtotime($date));

                    $usertype = $us['RoleId'];
                    $phone = $us['Mobile'];
                    $zipcode = $us['ZipCode'];
                    $isactive = $us['IsActive'];

                    $dates = '
                    <div class="date" ><img src="./assets/image/calendar2.png" class="calender mr-2"><b>' . $dates . '</b></div>
                    ';
                    if ($isactive == "Yes") {
                        $userstatus = '
                        <div class="action"><button class="btn active">Active</button></div>
                        ';
                        $action = ' 
                        <div class="action card-title">

                            <a class="dropdown-toggle Actions " href="#" id="navbarDropdowns" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu tooltiptext" aria-labelledby="navbarDropdowns">
                            <div class="dropdown-item deactivateuser" id="' . $userid . '">Deactivate</div>
                            

                        </div>';
                    }
                    if ($isactive == "No") {
                        $userstatus = '
                        <div class="action"><button class="btn inactive">InActive</button></div>
                        ';

                        $action = ' 
                        <div class="action card-title">

                            <a class="dropdown-toggle Actions " href="#" id="navbarDropdowns" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu tooltiptext" aria-labelledby="navbarDropdowns">
                            <div class="dropdown-item activateuser" id="' . $userid . '">Activate</div>
                        </div>';
                    }

                    $cardview = '<div class="card table-card mt-4">
                        <div class="card-body">
                    

                            <div class="username">
                                <div class="card-title">' . $firstname . ' ' . $lastname . '</div>
                            </div>
                            <div class="usertype">
                                <div class="card-title">' . $role . ' </div>
                            </div>
                            <div class="role">
                                <div class="card-title">' . $dates . ' </div>
                            </div>
                            <div class="postal-code">
                                <div class="card-title">' . $phone . '</div>
                            </div>
                            <div class="city">
                                <div class="card-title">' . $zipcode . '</div>
                            </div>
                            
                            <div class="user-status">
                                <div class="action card-title">' . $userstatus . '</div>
                            </div>
                            <div class="user-action">
                                <div class="action card-title">
                                        ' . $action . '
                                </div>
                            </div>
                    
                        </div>
                    </div>';
                    $result = array();
                    $result['username'] = $firstname . ' ' . $lastname;
                    $result['blocks'] = "";

                    $result['role'] = $role;
                    $result['dtregister'] = $dates;
                    $result['usertype'] = $role;
                    $result['phone'] = $phone;
                    $result['pincode'] = $zipcode;
                    $result['status'] = $userstatus;
                    $result['action'] = $action;
                    $result['cardview'] =   $cardview;

                    array_push($json['data'], $result);
                }
            }
            echo json_encode($json);
        }
    }

    public function ActivateDeactivate()
    {
        if (isset($_POST)) {
            $username =  $_POST['username'];
            $status =  $_POST['status'];
            $userid =  $_POST['uid'];

            $modifieddate = date('Y-m-d H:i:s');
            $modifiedby = $username;

            $array = [
                'isactive' => $status,
                'modifieddate' => $modifieddate,
                'modifiedby' => $modifiedby,
                'userid' => $userid,
            ];
            $results =  $this->model->ActivateDeactivate($array);
            $count = $results[0];
            if ($count == 1) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function GetRoleAndUser()
    {
        if (isset($_POST)) {
            $users = $this->model->selectdistinctuser();
            if (count($users[0])) {
                foreach ($users[0] as $us) {
                    $usernames =  $us['UserName'];
                    // $userids = $us['UserId'];

                    $user = '<option >' . $usernames . '</option>';
                    // if(count($users[1])){
                    //     foreach($users[1] as $roles){
                    //         $role = $roles['RoleId'];
                    //         $role = '<option value="'.$role.'" >'.$role.'</option>';
                    //     }
                    // }
                    // $output = [$user ];
                    echo $user;
                }
            }
            //    echo json_encode($output);
        }
    }

    public function InsertUserAdmin()
    {
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
                unset($_SESSION['status_msg']);
                unset($_SESSION['status_txt']);
                unset($_SESSION['status']);

                include('ActivateAccount.php');
                echo 1;
            } else {
                echo 0;
            }
        }
    }


    public function searchAdmin()
    {
        if (isset($_POST)) {
            $selecteduser = $_POST['seluser'];
            $role = $_POST['role'];
            $phone = $_POST['phone'];
            $zipcode = $_POST['zipcode'];

            if ($selecteduser != '' && $role == '' && $phone == '' && $zipcode == '') {
                $result = $this->model->Selectuser($selecteduser);
            }
            if ($role != '' && $selecteduser == ''  && $phone == '' && $zipcode == '') {
                $result = $this->model->selrole($role);
            }
            if ($phone != '' && $selecteduser == '' && $role == '' && $zipcode == '') {
                $result = $this->model->selmobile($phone);
            }
            if ($zipcode != '' && $selecteduser == '' && $role == '' && $phone == '') {
                $result = $this->model->selzip($zipcode);
            }
            if ($selecteduser != '' && $role != '' && $phone == '' && $zipcode == '') {
                $result = $this->model->seluserrole($selecteduser, $role);
            }
            if ($selecteduser != '' && $role == '' && $phone != '' && $zipcode == '') {
                $result = $this->model->seluserphone($selecteduser, $phone);
            }
            if ($selecteduser != '' && $role == '' && $phone == '' && $zipcode != '') {
                $result = $this->model->seluserzip($selecteduser, $zipcode);
            }
            if ($selecteduser != '' && $role != '' && $phone == '' && $zipcode != '') {
                $result = $this->model->seluserrolezip($selecteduser, $role, $zipcode);
            }
            if ($selecteduser != '' && $role != '' && $phone != '' && $zipcode == '') {
                $result = $this->model->seluserrolephone($selecteduser, $role, $phone);
            }
            if ($selecteduser != '' && $role == '' && $phone != '' && $zipcode != '') {
                $result = $this->model->seluserphonezip($selecteduser, $phone, $zipcode);
            }
            if ($selecteduser != '' && $role != '' && $phone != '' && $zipcode != '') {
                $result = $this->model->seluserrolephonezip($selecteduser, $role, $phone, $zipcode);
            }
            if ($selecteduser == '' && $role != '' && $phone != '' && $zipcode == '') {
                $result = $this->model->selrolephone($role, $phone);
            }
            if ($selecteduser == '' && $role != '' && $phone == '' && $zipcode != '') {
                $result = $this->model->selrolezip($role, $zipcode);
            }
            if ($selecteduser == '' && $role != '' && $phone != '' && $zipcode != '') {
                $result = $this->model->selrolephonezip($role, $phone, $zipcode);
            }
            if ($selecteduser == '' && $role == '' && $phone != '' && $zipcode != '') {
                $result = $this->model->selzipphone($phone, $zipcode);
            }
            $json['data'] = array();
            if (count($result)) {
                foreach ($result as $us) {
                    $userid = $us['UserId'];
                    $firstname  = $us['FirstName'];
                    $lastname  = $us['LastName'];
                    $role = $us['RoleId'];
                    $date = $us['CreatedDate'];
                    $dates = date("d/m/Y", strtotime($date));

                    $usertype = $us['RoleId'];
                    $phone = $us['Mobile'];
                    $zipcode = $us['ZipCode'];
                    $isactive = $us['IsActive'];

                    $dates = '
                <div class="date" ><img src="./assets/image/calendar2.png" class="calender mr-2"><b>' . $dates . '</b></div>
                ';
                    if ($isactive == "Yes") {
                        $userstatus = '
                    <div class="action"><button class="btn active">Active</button></div>
                    ';
                        $action = ' 
                    <div class="action card-title">

                        <a class="dropdown-toggle Actions " href="#" id="navbarDropdowns" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu tooltiptext" aria-labelledby="navbarDropdowns">
                        <div class="dropdown-item deactivateuser" id="' . $userid . '">Deactivate</div>
                        

                    </div>';
                    }
                    if ($isactive == "No") {
                        $userstatus = '
                    <div class="action"><button class="btn inactive">InActive</button></div>
                    ';

                        $action = ' 
                    <div class="action card-title">

                        <a class="dropdown-toggle Actions " href="#" id="navbarDropdowns" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu tooltiptext" aria-labelledby="navbarDropdowns">
                        <div class="dropdown-item activateuser" id="' . $userid . '">Activate</div>
                    </div>';
                    }

                    $cardview = '<div class="card table-card mt-4">
                    <div class="card-body">
                

                        <div class="username">
                            <div class="card-title">' . $firstname . ' ' . $lastname . '</div>
                        </div>
                        <div class="usertype">
                            <div class="card-title">' . $role . ' </div>
                        </div>
                        <div class="role">
                            <div class="card-title">' . $dates . ' </div>
                        </div>
                        <div class="postal-code">
                            <div class="card-title">' . $phone . '</div>
                        </div>
                        <div class="city">
                            <div class="card-title">' . $zipcode . '</div>
                        </div>
                        
                        <div class="user-status">
                            <div class="action card-title">' . $userstatus . '</div>
                        </div>
                        <div class="user-action">
                            <div class="action card-title">
                                    ' . $action . '
                            </div>
                        </div>
                
                    </div>
                </div>';
                    $result = array();
                    $result['username'] = $firstname . ' ' . $lastname;
                    $result['blocks'] = "";

                    $result['role'] = $role;
                    $result['dtregister'] = $dates;
                    $result['usertype'] = $role;
                    $result['phone'] = $phone;
                    $result['pincode'] = $zipcode;
                    $result['status'] = $userstatus;
                    $result['action'] = $action;
                    $result['cardview'] =   $cardview;

                    array_push($json['data'], $result);
                }
            }
            echo json_encode($json);
        }
    }

    public function GetAllServiceRequest()
    {
        if (isset($_POST)) {
            $serviceid = $_POST['serviceid'];
            $seluser = $_POST['seluser'];
            $selsp = $_POST['selsp'];
            $statusall = $_POST['statusall'];
            $strtdt = $_POST['startdate'];
            $enddt = $_POST['enddate'];
            if ($statusall == "New") {
                $statusall = "Pending";
            } else if ($statusall == "Pending") {
                $statusall = "Approoved";
            } else {
                $statusall = $statusall;
            }
            // serviceid
            // 2part
            if ($serviceid != "" && $seluser == "" && $selsp == "" && $statusall == "" && $strtdt == "" && $enddt == "") {
                $val = "WHERE `servicerequest`.`ServiceRequestId` = $serviceid";
                $result = $this->model->SearchServiceid($val);
            }
            if ($serviceid != "" && $seluser != "" && $selsp == "" && $statusall == "" && $strtdt == "" && $enddt == "") {
                $val = "WHERE `servicerequest`.`ServiceRequestId` = $serviceid && CONCAT(user.FirstName , ' ',user.LastName) = '$seluser'";
                $result = $this->model->SearchServiceid($val);
            }
            if ($serviceid != "" && $seluser == "" && $selsp == "" && $statusall != "" && $strtdt == "" && $enddt == "") {

                $val = "WHERE `servicerequest`.`ServiceRequestId` = $serviceid &&  `servicerequest`.`status` = '$statusall'";
                $result = $this->model->SearchServiceid($val);
            }
            if ($serviceid != "" && $seluser == "" && $selsp == "" && $statusall == "" && $strtdt != "" && $enddt == "") {
                $val = "WHERE `servicerequest`.`ServiceRequestId` = $serviceid && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') >= str_to_date('$strtdt','%d/%m/%Y')";
                $result = $this->model->SearchServiceid($val);
            }
            if ($serviceid != "" && $seluser == "" && $selsp == "" && $statusall == "" && $strtdt == "" && $enddt != "") {
                $val = "WHERE `servicerequest`.`ServiceRequestId` = $serviceid && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') <= str_to_date('$enddt','%d/%m/%Y')";
                $result = $this->model->SearchServiceid($val);
            }
            //3part(1)
            if ($serviceid != "" && $seluser != "" && $selsp == "" && $statusall != "" && $strtdt == "" && $enddt == "") {
                $val = "WHERE `servicerequest`.`ServiceRequestId` = $serviceid && CONCAT(user.FirstName , ' ',user.LastName) = '$seluser' && `servicerequest`.`status` = '$statusall'  ";
                $result = $this->model->SearchServiceid($val);
            }
            if ($serviceid != "" && $seluser != "" && $selsp == "" && $statusall == "" && $strtdt != "" && $enddt == "") {
                $val = "WHERE `servicerequest`.`ServiceRequestId` = $serviceid && CONCAT(user.FirstName , ' ',user.LastName) = '$seluser' && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') >= str_to_date('$strtdt','%d/%m/%Y') ";
                $result = $this->model->SearchServiceid($val);
            }
            if ($serviceid != "" && $seluser != "" && $selsp == "" && $statusall == "" && $strtdt == "" && $enddt != "") {
                $val = "WHERE `servicerequest`.`ServiceRequestId` = $serviceid && CONCAT(user.FirstName , ' ',user.LastName) = '$seluser' && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') <= str_to_date('$enddt','%d/%m/%Y') ";
                $result = $this->model->SearchServiceid($val);
            }
            // 3part(2)
            if ($serviceid != "" && $seluser == "" && $selsp == "" && $statusall != "" && $strtdt != "" && $enddt == "") {
                $val = "WHERE `servicerequest`.`ServiceRequestId` = $serviceid && `servicerequest`.`status` = '$statusall' && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') >= str_to_date('$strtdt','%d/%m/%Y') ";
                $result = $this->model->SearchServiceid($val);
            }
            if ($serviceid != "" && $seluser != "" && $selsp == "" && $statusall != "" && $strtdt == "" && $enddt != "") {
                $val = "WHERE `servicerequest`.`ServiceRequestId` = $serviceid && `servicerequest`.`status` = '$statusall' && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') <= str_to_date('$enddt','%d/%m/%Y') ";
                $result = $this->model->SearchServiceid($val);
            }
            //4part(1)
            if ($serviceid != "" && $seluser != "" && $selsp == "" && $statusall != "" && $strtdt != "" && $enddt == "") {
                $val = "WHERE `servicerequest`.`ServiceRequestId` = $serviceid && CONCAT(user.FirstName , ' ',user.LastName) = '$seluser' && `servicerequest`.`status` = '$statusall' && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') <= str_to_date('$enddt','%d/%m/%Y') ";
                $result = $this->model->SearchServiceid($val);
            }

            if ($serviceid != "" && $seluser != "" && $selsp == "" && $statusall != "" && $strtdt == "" && $enddt != "") {
                $val = "WHERE `servicerequest`.`ServiceRequestId` = $serviceid && CONCAT(user.FirstName , ' ',user.LastName) = '$seluser' && `servicerequest`.`status` = '$statusall' && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') >= str_to_date('$strtdt','%d/%m/%Y') ";
                $result = $this->model->SearchServiceid($val);
            }

            if ($serviceid != "" && $seluser != "" && $selsp == "" && $statusall != "" && $strtdt != "" && $enddt != "") {
                $val = "WHERE `servicerequest`.`ServiceRequestId` = $serviceid && CONCAT(user.FirstName , ' ',user.LastName) = '$seluser' && `servicerequest`.`status` = '$statusall' && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') >= str_to_date('$strtdt','%d/%m/%Y')  && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') <= str_to_date('$enddt','%d/%m/%Y') ";
                $result = $this->model->SearchServiceid($val);
            }


            //with sp
            if ($serviceid != "" && $seluser == "" && $selsp != "" && $statusall == "" && $strtdt == "" && $enddt == "") {
                $val = "WHERE `servicerequest`.`ServiceRequestId` = $serviceid && CONCAT(user.FirstName , ' ',user.LastName) = '$selsp'";
                $result = $this->model->GetSearchSP($val);
            }
            if ($serviceid == "" && $seluser == "" && $selsp != "" && $statusall != "" && $strtdt == "" && $enddt == "") {
                $val = "WHERE `servicerequest`.`status` = '$statusall' && CONCAT(user.FirstName , ' ',user.LastName) = '$selsp'";
                $result = $this->model->GetSearchSP($val);
            }

            if ($serviceid == "" && $seluser == "" && $selsp != "" && $statusall == "" && $strtdt != "" && $enddt == "") {
                $val = "WHERE  CONCAT(user.FirstName , ' ',user.LastName) = '$selsp' && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') >= str_to_date('$strtdt','%d/%m/%Y') ";
                $result = $this->model->GetSearchSP($val);
            }

            if ($serviceid == "" && $seluser == "" && $selsp != "" && $statusall == "" && $strtdt == "" && $enddt != "") {
                $val = "WHERE  CONCAT(user.FirstName , ' ',user.LastName) = '$selsp' && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') <= str_to_date('$enddt','%d/%m/%Y') ";
                $result = $this->model->GetSearchSP($val);
            }

            if ($serviceid == "" && $seluser == "" && $selsp != "" && $statusall != "" && $strtdt == "" && $enddt != "") {
                $val = "WHERE  `servicerequest`.`status` = '$statusall' && CONCAT(user.FirstName , ' ',user.LastName) = '$selsp' && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') <= str_to_date('$enddt','%d/%m/%Y') ";
                $result = $this->model->GetSearchSP($val);
            }
            if ($serviceid != "" && $seluser == "" && $selsp != "" && $statusall == "" && $strtdt == "" && $enddt != "") {
                $val = "WHERE  `servicerequest`.`ServiceRequestId` = $serviceid  && CONCAT(user.FirstName , ' ',user.LastName) = '$selsp' && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') <= str_to_date('$enddt','%d/%m/%Y') ";
                $result = $this->model->GetSearchSP($val);
            }

            if ($serviceid != "" && $seluser == "" && $selsp != "" && $statusall == "" && $strtdt != "" && $enddt == "") {
                $val = "WHERE  `servicerequest`.`ServiceRequestId` = $serviceid  && CONCAT(user.FirstName , ' ',user.LastName) = '$selsp' && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') >= str_to_date('$strtdt','%d/%m/%Y') ";
                $result = $this->model->GetSearchSP($val);
            }

            if ($serviceid != "" && $seluser == "" && $selsp != "" && $statusall == "" && $strtdt != "" && $enddt != "") {
                $val = "WHERE  `servicerequest`.`ServiceRequestId` = $serviceid  && CONCAT(user.FirstName , ' ',user.LastName) = '$selsp' && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') >= str_to_date('$strtdt','%d/%m/%Y')  && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') <= str_to_date('$enddt','%d/%m/%Y') ";
                $result = $this->model->GetSearchSP($val);
            }


            if ($serviceid != "" && $seluser == "" && $selsp != "" && $statusall != "" && $strtdt != "" && $enddt != "") {
                $val = "WHERE  `servicerequest`.`ServiceRequestId` = $serviceid && `servicerequest`.`status` = '$statusall' && CONCAT(user.FirstName , ' ',user.LastName) = '$selsp' && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') >= str_to_date('$strtdt','%d/%m/%Y')  && str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') <= str_to_date('$enddt','%d/%m/%Y') ";
                $result = $this->model->GetSearchSP($val);
            }

            if ($seluser != "" && $serviceid == ""  && $selsp == "" && $statusall == "" && $strtdt == "" && $enddt == "") {
                $val = "WHERE CONCAT(user.FirstName , ' ',user.LastName) = '$seluser'";
                $result = $this->model->SearchServiceid($val);
            }
            if ($selsp != "" && $seluser == "" && $serviceid == ""  && $statusall == "" && $strtdt == "" && $enddt == "") {
                $val = "WHERE CONCAT(user.FirstName , ' ',user.LastName) = '$selsp'";
                $result = $this->model->GetSearchSP($val);
            }
            if ($statusall != "" && $seluser == "" && $serviceid == ""  && $selsp == "" && $strtdt == "" && $enddt == "") {
                $val = "WHERE `servicerequest`.`status` = '$statusall'";
                $result = $this->model->SearchServiceid($val);
            }
            if ($strtdt != "" && $enddt == "" && $seluser == "" && $serviceid == ""  && $selsp == "" && $statusall == "") {
                $val = "WHERE str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') >= str_to_date('$strtdt','%d/%m/%Y')";
                $result = $this->model->SearchServiceid($val);
            }
            if ($enddt != "" && $strtdt == "" && $seluser == "" && $serviceid == ""  && $selsp == "" && $statusall == "") {
                $val = "WHERE str_to_date(`servicerequest`.`ServiceStartDate`,'%d/%m/%Y') <= str_to_date('$enddt','%d/%m/%Y')";
                $result = $this->model->SearchServiceid($val);
            }
            if ($serviceid == "" && $seluser == "" && $selsp == "" && $statusall == "" && $strtdt == "" && $enddt == "") {
                $result = $this->model->GetAllServiceRequests();
            }
            $json['data'] = array();
            if (count($result)) {
                foreach ($result as $row) {
                    $serviceid = $row['ServiceRequestId'];
                    $servicedt = $row['ServiceStartDate'];
                    $starttime = $row['ServiceTime'];
                    $totaltime = $row['TotalHours'];
                    $street = $row['AddressLine1'];
                    $houseno = $row['AddressLine2'];

                    $postalcode = $row['PostalCode'];
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                    $city = $row['City'];
                    $userid = $row['UserId'];
                    $status = $row['Status'];

                    $serviceproviderid = $row['ServiceProviderId'];
                    $serviceprovider = "";
                    if ($serviceproviderid != '') {
                        $spalldetails = $this->model->GetUsers($serviceproviderid);
                        if (count($spalldetails)) {
                            foreach ($spalldetails as $sp) {
                                $spfirstname = $sp['FirstName'];
                                $splastname = $sp['LastName'];
                                $picture = $sp['UserProfilePicture'];
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
                                if (strlen($picture) != 0) {
                                    // $pictures = "http://localhost/helper/assets/image/car.png";
                                    $image = str_replace("http://localhost/helper/", "./", $picture);
                                    $imgs = '<img  src="' . $image . '" class="service-provider-img">';
                                } else {
                                    // $pictures = "./assets/image/car.png";

                                    $imgs = '<img src="./assets/image/avatar-hat.png" class="service-provider-img">';
                                }
                                $serviceprovider = '<td class="service_provider_names">
                           <div class="row serviceproviderblocks">
                                ' . $imgs . '
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

                    $dates = ' <div scope="row" >
                        <div class="col date specialmodtext" data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '" name="' . $serviceid . '" title="View Service Details"><img src="./assets/image/calendar2.png" class="calender mr-2">' . $servicedt . '</div>
                        <div class="col time specialmodtext" data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '" name="' . $serviceid . '" title="View Service Details"><img src="./assets/image/layer-712.png" class="clock mr-2">' . $starttime . ' - ' . $endtime . '</div>
                    </div>';

                    $userdetails = '     <div class="row addressp">
                    <div class="col-12 specialmodtext"data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '"  name="' . $serviceid . '" title="View Service Details">' . $firstname . ' ' . $lastname . ' </div>
                    <div class="col-12 address specialmodtext" data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '"  name="' . $serviceid . '" title="View Service Details"><img src="./assets/image/layer-719.png" class="home">' . $street . ' ' . $houseno . ',' . $postalcode . ' ' . $city . '</div>
                </div>';
                    $action = '';

                    $serviceids = '<p class="specialmodtext"data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '"  name="' . $serviceid . '" title="View Service Details">' . $serviceid . '</p>';
                    if ($status == 'Pending') {
                        $statues = '<button class="btn new">New</button>';
                    }
                    if ($status == 'Approoved') {
                        $statues = '<button class="btn pending">Pending</button>';
                    }
                    if ($status == 'Reschedule') {
                        $statues = '<button class="btn new">Reschedule</button>';
                    }
                    if ($status == 'Refunded') {
                        $statues = '<button class="btn cancelled">Refunded</button>';
                    }
                    if ($status == 'Completed') {
                        $statues = '<button class="btn completed">Completed</button>';
                    }
                    if ($status == 'Cancelled') {
                        $statues = '<button class="btn cancelled">Cancelled</button>';
                    }

                    if ($status == 'Completed' || $status == 'Cancelled' || $status == 'Refunded') {
                        $action = '     
                            <div class="action ">
        
                                  <a class="dropdown-toggle Actions " href="#" id="navbarDropdowns" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                              </a>
                              <div class="dropdown-menu tooltiptext" aria-labelledby="navbarDropdowns">
                                <a class="dropdown-item refundtool"id="' . $serviceid . '" data-toggle="modal" data-target="#refundmodal"  style="cursor:pointer;">Refund</a>
                                <a class="dropdown-item" href="#">Escalate </a>
                                <a class="dropdown-item" href="#">History Log</a>
                                <a class="dropdown-item" href="#">Download Invoice </a>
                                    </div>
                                    ';
                    }
                    if ($status == 'Pending' || $status == 'Approoved' || $status == 'Reschedule') {
                        $action = '     
                            <div class="action ">
        
                                  <a class="dropdown-toggle Actions " href="#" id="navbarDropdowns" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                              </a>
                              <div class="dropdown-menu tooltiptext" aria-labelledby="navbarDropdowns">
                              <a class="dropdown-item editsall" id="' . $serviceid . '" data-toggle="modal" data-target="#editmodal" style="cursor:pointer;">Edit & Reschedule</a>
                              <a class="dropdown-item refundtool" id="' . $serviceid . '" data-toggle="modal" data-target="#refundmodal"  style="cursor:pointer;">Refund</a>
                              <a class="dropdown-item" href="#">Cancel </a>
                              <a class="dropdown-item" href="#">Change SP</a>
                              <a class="dropdown-item" href="#">Escalate </a>
                              <a class="dropdown-item" href="#">History Log</a>
                              <a class="dropdown-item" href="#">Download Invoice </a>                             
                                     </div>
                                    ';
                    }

                    $cardview = '
                    <div class="card table-card mt-4">
                 <div class="serviceid pl-3">
                      <div class="card-title specialmodtext"data-toggle="modal" data-target="#bookingdetails" id="' . $userid . '"  name="' . $serviceid . '" title="View Service Details">' . $serviceid . ' </div>
                    </div>
                    <div class="servicedt card-title pl-3">
                        ' . $dates . '
                    </div>
                    <div class="service_address pl-3">
                            ' . $userdetails . '
                    </div>
                    <div class="card-title row servicepeoviders pl-5">
                       ' . $serviceprovider . '
                    </div>
                    <div class="user-status pl-3">
                            ' . $statues . '
                    </div>
                    <div class="user-action">
                        ' . $action . ' 
                    </div>
                    </div>';
                    $res = array();
                    $res['serviceid'] = $serviceids;
                    $res['date'] = $dates;
                    $res['serviceprovider'] = $serviceprovider;
                    $res['customer'] = $userdetails;
                    $res['status'] = $statues;
                    $res['action'] = $action;
                    $res['blocks'] = '';
                    $res['cardview'] = $cardview;


                    array_push($json['data'], $res);
                }
            }
        }
        echo json_encode($json);
    }

    public function AdminUserGet()
    {
        if (isset($_POST)) {
            $user =  $this->model->Allusers(0);

            if (count($user)) {
                foreach ($user as $us) {

                    $cname = $us['UserName'];
                    $userval = '<option >' . $cname . '</option>';
                    echo $userval;
                }
            }
            // echo json_encode($output);
        }
    }
    public function AdminSPGet()
    {
        if (isset($_POST)) {

            $sp =  $this->model->Allusers(1);
            if (count($sp)) {
                foreach ($sp as $sps) {
                    $sname = $sps['UserName'];
                    $spval = '<option >' . $sname . '</option>';
                    echo $spval;
                }
            }
            // echo json_encode($output);
        }
    }

    public function GetSearchServiceRequest()
    {
        if (isset($_POST)) {
            $serviceid = $_POST['serviceid'];
            if ($serviceid != "") {
                $this->model->SearchServiceid($serviceid);
            }
        }
    }

    public function GetEditAddress()
    {
        if (isset($_POST)) {
            $serviceid = $_POST['serviceid'];
            $result = $this->model->GetServiceHistoryUser($serviceid);
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
                    $userid = $row['UserId'];
                    $totalrequiredtime = $totaltime;
                    $serviceproviderid = $row['ServiceProviderId'];
                    // $addressid
                    $startimes = date("H:i", strtotime($starttime));
                    $strattime = str_replace(":", '.', $startimes);
                    // 8.30
                    // 8.0

                    $firstpart = '  <div class="form-row">
                    <div class="col-md-6 ">
                      <label for="dates">Date</label>
                      <input type="text" id="dates" class="form-control mb-2" placeholder="Enter Date" value="' . $date . '"  />

                    </div>

                    <div class="form-group col-md-6">
                      <label for="time">Time</label>
                      <select id="time" name="' . $totaltime . '"class="form-control times">
                    <option value="' . $strattime . '">' . $startimes . '</option>
                        <option value="8">08:00</option>
                        <option value="8.30">08:30</option>
                        <option value="9">09:00</option>
                        <option value="8.30">09:30</option>
                        <option value="10">10:00</option>
                        <option value="8.30">10:30</option>
                        <option value="11">11:00</option>
                        <option value="8.30">11:30</option>
                        <option value="12">12:00</option>
                        <option value="8.30">12:30</option>
                        <option value="13">13:00</option>
                        <option value="8.30">13:30</option>
                        <option value="14">14:00</option>
                        <option value="8.30">14:30</option>
                        <option value="15">15:00</option>
                        <option value="8.30">15:30</option>
                        <option value="16">16:00</option>
                        <option value="8.30">16:30</option>
                        <option value="17">17:00</option>
                        <option value="8.30">17:30</option>
                        <option value="18">18:00</option>
                        <option value="8.30">18:30</option>
                        <option value="19">19:00</option>
                        <option value="8.30">19:30</option>
                        <option value="20">20:00</option>
                        <option value="8.30">20:30</option>
                        <option value="21">21:00</option>
                        <option value="8.30">21:30</option>


                      </select>
                    </div>
                    <span class="timingerr text-danger"></span>
                  </div>
                  <h5 class="mt-2 mb-3 services" id="' . $addressid . '">Service Address</h5>';
                    $address = $this->model->GetSpecificAddress($addressid);
                    if (count($address)) {
                        foreach ($address as $adr) {
                            $street = $adr['AddressLine1'];
                            $houseno = $adr['AddressLine2'];
                            $city = $adr['City'];
                            $state = $adr['State'];
                            $pincode = $adr['PostalCode'];

                            $serviceaddress = '
                           <div class="serviceaddress">
                           <div class="form-row">
                             <div class="col-md-6">
                               <label for="street">Street name</label>
                               <input type="text" class="form-control mb-2" id="street" value="' . $street . '" placeholder="Street">
                                <span class="street-msg">
                               </div>
                             <div class="col-md-6">
                               <label for="houseno">House number</label>
                               <input type="number" class="form-control mb-2" id="houseno"value="' . $houseno . '" placeholder="House number">
                               <span class="house-msg">
                            
                               </div>
                           </div>
               
                           <div class="form-row">
                             <div class="col-md-6">
                               <label for="postal">Postal Code</label>
                               <input type="text" class="form-control mb-2" id="postal" value="' . $pincode . '" placeholder="Postal">
                               <span class="postal_number">
                             
                               </div>
                             <div class="form-group col-md-6">
                               <label class="location">Location</label>
                               <select id="location" class="located form-control">
                               <option value="' . $city . '">' . $city . '</option>
                               </select>

                             </div>

                           </div>
                         </div>';


                            $invoicingaddress = '
                                   <h5 class="mt-2 mb-3">Invoicing Address</h5>

                         <div class="invoicing">
                         <div class="form-row">
                           <div class="col-md-6">
                             <label for="streets">Street name</label>
                             <input type="text" class="form-control mb-2" id="streets" value="' . $street . '" placeholder="Street">
                             <span class="streets-msg">
                          
                             </div>
                           <div class="col-md-6">
                             <label for="housenos">House number</label>
                             <input type="number" class="form-control mb-2" id="housenos" value="' . $houseno . '" placeholder="House number">
                             <span class="housenos-msg">
                          
                             </div>
                         </div>
             
                         <div class="form-row">
                           <div class="col-md-6">
                             <label for="postals">Postal Code</label>
                             <input type="text" class="form-control mb-2" id="postals" value="' . $pincode . '" placeholder="PostalCode">
                             <span class="postals-msg">
                         
                             </div>
                           <div class="form-group col-md-6">
                             <label class="location">Location</label>
                             <select id="locations" class="located form-control">
                             <option value="' . $city . '">' . $city . '</option>
                             </select>
                           </div>
                         </div>
                       </div>';
                        }
                    }
                    $buttonaddress = '
                    
          <div class="form-group ">
          <label for="whyreschedule">Why do you want to reschedule service request?</label>
          <textarea class="form-control" id="whyreschedule" placeholder="Why do you want to reschedule service request?" rows="3" style="height: auto;"></textarea>
                    <span class="whyreschedule text-danger"></span>
          </div>
        <div class="form-group ">
          <label for="callcenteremp">Call Center EMP Notes</label>
          <textarea class="form-control" id="callcenteremp" placeholder="Enter Notes" rows="3" style="height: auto;"></textarea>
          <span class="empnotes text-danger"></span>
       
          </div>
        <div class="form-row">

          <button type="submit" class="btn btn-reschedule form-control" id="' . $serviceid . '" disabled="disabled" data-dismiss="modal">Update</button>
        </div>';


                    $output = $firstpart . '' . $serviceaddress . '' . $invoicingaddress . '' . $buttonaddress;
                    echo $output;
                }
            }
        }
    }

    public function Rescheduleadmin()
    {
        if (isset($_POST)) {
            $newdate = $_POST["newdate"];
            $newtime =  $_POST["newtime"];
            $street =  $_POST["street"];
            $postal =  $_POST["postal"];
            $houseno =  $_POST["houseno"];
            $location =  $_POST["locations"];
            $serviceid =  $_POST["serviceid"];
            $addressid =  $_POST["addressid"];
            $getstate = $this->model->CityLocation($postal);
            $state = $getstate[1];
            $result = $this->model->GetServiceHistoryUser($serviceid);
            if (count($result)) {
                foreach ($result as $row) {
                    $recordversion = $row['RecordVersion'];
                    $userid = intval($row['UserId']);
                    $spid = $row['ServiceProviderId'];
                }
            }
            $useremail = $this->model->GetUsers($userid);

            if (count($useremail)) {
                foreach ($useremail as $emails) {
                    $useremail  = $emails['Email'];
                }
            }
            $status = "Pending";
            if (!empty($spid)) {
                $status = "Reschedule";
            }
            $modifieddate = date('Y-m-d H:i:s');
            $modifiedby = "Admin";
            $recordversion = $recordversion + 1;

            $updateaddressarray = [

                'street' => $street,
                'houseno' => $houseno,
                'location' => $location,
                'state' => $state,
                'pincode' => $postal,
                'addressid' => $addressid,

            ];
            $array = [
                'newdate' => $newdate,
                'newtime' => $newtime,
                'modifieddate' => $modifieddate,
                'modifiedby' => $modifiedby,
                'recordversion' => $recordversion,
                'status' => $status,
                'serviceid' => $serviceid,

            ];
            // echo "work";
            $updateaddress = $this->model->UpdateAdminAddress($updateaddressarray);
            $counts = $updateaddress[0];
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
            if ($count == 1 || $counts == 1) {
                $clientemail =  $useremail;
                $subjectmsg = " Reschedule";

                $mailbody = "
            New Date And Time is : <span style='color:red;'>$newdate  $newtime </span>
            <br>
            More Reschedule Details You can show from Customer Dashboard Section.
           <br>
            When Service Provider Accept Your Reschedule Request Than You can show SP Details
            <br><div style='color:green;'>Service Request Reschedule By<span style='color:red;'> Admin  </span></div>
            ";
                $mailbodymsg = "
            New Date And Time is : <span style='color:red;'>$newdate  $newtime </span>
            <br>
            More Details you can show from ServiceHistory Section.
            <br>
            Please Check Service Details And Accept The Service Request for Service ID :" . $serviceid . "<br><div style='color:green;'>Service Request Reschedule By<span style='color:red;'> Admin  </span></div>";

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

    public function GetRefundDetails()
    {
        if (isset($_POST)) {
            $serviceid =  $_POST['serviceid'];
            $servicerequest =  $this->model->GetServiceDetails($serviceid);
            if (count($servicerequest)) {
                foreach ($servicerequest as $sr) {
                    $serviceid =   $sr['ServiceRequestId'];
                    $totalcost =  number_format($sr['TotalCost'], 2);
                    $refundedamount =   number_format($sr['RefundedAmount'], 2);

                    $balanceamount = number_format((floatval($totalcost) - floatval($refundedamount)), 2);

                    $output = ' <div class="form-row">
                                <div class="paymentblock">
                                <div class="mx-2">
                                    <p>Paid Amount</p>
                                    <p class="paidamount">' . $totalcost . ' €</p>
                    
                                </div>
                                <div class="mx-2">
                                    <p>Refunded Amount</p>
                                    <p class="refundedamount">' . $refundedamount . ' €</p>
                    
                                </div>
                                <div class="mx-2">
                                    <p>In Balance Amount</p>
                                    <p class="balanceamount">' . $balanceamount . ' €</p>
                    
                                </div>
                                </div>
                    
                            </div>
                            <div class="form-row ">
                                <div class="col-md-6">
                                <label>Amount</label>
                                <div style="display: flex;">
                                    <input type="number" class="form-control addprice tagnm pricesinput">
                                    <select class="form-control tagnm percentages">
                                    <option value="Percentage" selected>Percentage</option>
                                    <option value="Fixed">Fixed</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <label>Calculate</label>
                                <div style="display: flex;">
                                    <button type="button" class="btn calculatebtn tagnm">Calculate</button>
                                    <input type="text" class="form-control calculateval tagnm" disabled style="cursor: not-allowed;">
                                </div>
                                </div>
                    
                                <span class="priceerr text-danger"></span>
                                </div>
                            <div class="form-group mt-2">
                                <label for="whyrefund">Why do you want to reschedule service request?</label>
                                <textarea class="form-control" id="whyrefund" placeholder="Why do you want to reschedule service request?" rows="3" style="height: auto;"></textarea>
                            </div>
                            <div class="form-group ">
                                <label for="callcenteremps">Call Center EMP Notes</label>
                                <textarea class="form-control" id="callcenteremps" placeholder="Enter Notes" rows="3" style="height: auto;"></textarea>
                            </div>
                            <div class="form-row">
                    
                                <button type="submit" id="' . $serviceid . '" class="btn refundamount form-control" disabled="disabled" data-dismiss="modal">Refund</button>
                            </div>';
                    echo $output;
                }
            }
        }
    }

    public function GiveRefund(){
        if(isset($_POST)){
           $serviceid = $_POST['serviceid'];
          $whyrefund =  $_POST['whyrefund'];
          $callcenternote = $_POST['callcenternote'];
          $refundamount = $_POST['refundamount'];
            $status = "Refunded";
            $result = $this->model->GetServiceHistoryUser($serviceid);
            if (count($result)) {
                foreach ($result as $row) {
                    $recordversion = $row['RecordVersion'];
                    $userid = intval($row['UserId']);
                    $spid = $row['ServiceProviderId'];
                    $refundamounts =  $row['RefundedAmount'];
                }
            }
            $refundamount = number_format((floatval($refundamount) + floatval( $refundamounts)),2);
            $useremail = $this->model->GetUsers($userid);

            if (count($useremail)) {
                foreach ($useremail as $emails) {
                    $useremail  = $emails['Email'];
                }
            }
            
            $modifieddate = date('Y-m-d H:i:s');
            $modifiedby = "Admin";
            $recordversion = $recordversion + 1;
          $array = [
              "refundamount" => $refundamount,
              "callcenternote" => $callcenternote,
              "whyrefund" => $whyrefund,
              "status" => $status,
              "modifieddate" => $modifieddate,
              "modifiedby" => $modifiedby,
              "recordversion"=>$recordversion,
              "serviceid" => $serviceid,
              
          ];
          $refundconfirm = $this->model->GiveRefund($array);
          $count = $refundconfirm[0];
          if($count == 1){
            $clientemail =  $useremail;
            $subjectmsg = " Refunded";

            $mailbody = "
        Your Refund Amount is <span style='color:red;'>$refundamount</span> for servicerequest id <span style='color:red;'>$serviceid</span> 
        <br>
      
       <br>
        <br><div style='color:green;'>Service Request Refunded By<span style='color:red;'> Admin  </span></div>
        ";
         
       
            include("Views/ClientRescheduleCancelMail.php");

              echo 1;
          } else{
              echo 0;
          }
        }
    }


    public function GetSpDates($parameter){
       
            $email = $parameter;
            $result = $this->model->ResetKey($email);
            $userid = $result[3];
            $result =  $this->model->GetUpcomingServiceHistoryAll($userid);
            $json['data'] = array();
            if(count($result)){
                foreach($result as $row){
                    $serviceid = $row['ServiceRequestId'];
                    $servicestartdate = $row['ServiceStartDate'];
                    $servicestarttime = $row['ServiceTime'];
                    $status = $row['Status'];
                    $totaltime = $row['TotalHours'];
                    list($day, $month, $year) = explode("/", $servicestartdate);
                    $date = $year.'-'.$month.'-'.$day;
                    // $date = date("Y-m-d", $dates);
                    $starttime =  date("H:i", strtotime($servicestarttime));

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
                   
                    // $resultall = array();
                    // $resultall['starttime'] =  $starttime;
                    // $resultall['end'] =  $totalltimes;
                    // $resultall['title'] = $starttime .'-'.$totalltimes;
                    // $resultall['start'] = "2022-03-02";
                    $resultall[] = array(
                        'title' => $starttime.'-'.$totalltimes,
                        'start'=>$date,
                        'id'=>$serviceid,
                    );
                    // array_push($json['data'],$resultall);
                }

            }
            echo  json_encode($resultall);
                               
           
        }

}
