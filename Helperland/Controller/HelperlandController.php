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
            $email = $result[3];
            // echo $userid;
            $results = $this->model->Favourite($email);
            // TargetUserId
            if (count($results)) {
                foreach ($results as $row) {
                    $id = $row['TargetUserId'];
                    $favourite = $row['IsFavorite'];
                    $blocked = $row['IsBlocked'];

                    $targetresult = $this->model->GetUsers($id);
                    $serviceproviderid = $targetresult['UserId'];
                    $firstname = $targetresult['FirstName'];
                    $lastname = $targetresult['LastName'];
                    if ($favourite == 1) {
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
            $id = array_slice($ids,1);
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
                if (sizeof($id)>0) {
                    $sp = $this->model->GetUsersServiceprovider($id);
                    if(count($sp)){
                    // $email = $sp['Email'];
                    $addressid = $result;
                    
                    foreach($sp as $emails){
                        $email = $emails['Email'];
                        include('BookingMail.php');
                    }
                }
                    echo $addressid;
                    // print_r($sp);
                }
                 else {
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
                    $control = '';
                    $serviceidcolumn = ' <td class="serviceids" ><p class="specialmodaltext" title="View Service Details" data-toggle="modal" data-target="#bookingdetails" >' . $serviceid . '</p></td>';
                    $datecolumn = '<td scope="row" class="dtime">
                
                                    <div class="col date specialmodaltext" title="View Service Details" data-toggle="modal" data-target="#bookingdetails"><img src="./assets/image/calendar2.png" class="calender">' . $date . '</div>

                                    <div class="col time specialmodaltext" title="View Service Details" data-toggle="modal" data-target="#bookingdetails"><img src="./assets/image/layer-712.png" class="clock">' . $starttime . '</div>
                    
                                    </td>';
                                        $serviceprovider = '<td class="service_provider_names">
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">' . $serviceid . '</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>';
                                        $paymentcolumn = '<td>
                            <div class="payment">
                                <span class="euro">€</span>' . $payment . '
                            </div>
                        </td>';

                                        $actioncolumn =  ' <td class="actionblock">
                        <div class="row actionblocks">
                            <div class="col-lg-6 col-md-6 col-6">
                                <button class="btn reschedule" title="Reschedule" data-toggle="modal" data-target="#rescheduletime">Reschedule</button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <button class="btn cancel" title="Cancel" data-toggle="modal" data-target="#cancelmodal">Cancel</button>
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
                echo json_encode($json);
                // $return = json_encode($output);

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
                            <a href="#" class="edit_delete">
                                <img src="./assets/Image/edit-icon.png">
                            </a>
                            <a href="#" class="edit_delete">
                                <img src="./assets/Image/delete-icon.png">
                            </a>
                        </div>';

                    $results = array();
                    $results['radiobutton'] = $radiooutput;
                    $results['addressoutput']= $addressline;
                    $results['editordelete'] = $editdelete;
                    array_push($json['data'], $results);
                }
                }
            }
            echo json_encode($json);

        }
    }

    public function test()
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
                    $control = '';
                    $serviceidcolumn = ' <td class="serviceids" ><p class="specialmodaltext" title="View Service Details" data-toggle="modal" data-target="#bookingdetails" id="'.$serviceid.'" >' . $serviceid . '</p></td>';
                    $datecolumn = '<td scope="row" class="dtime">
                
                <div class="col date specialmodaltext" title="View Service Details" data-toggle="modal" data-target="#bookingdetails"><img src="./assets/image/calendar2.png" class="calender">' . $date . '</div>

                <div class="col time specialmodaltext" title="View Service Details" data-toggle="modal" data-target="#bookingdetails"><img src="./assets/image/layer-712.png" class="clock">' . $starttime . '</div>
 
                </td>';
                    $serviceprovider = '<td class="service_provider_names">
            <div class="row ">
                <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                <div class="col ml-3">
                    <div class="row service-provider">' . $serviceid . '</div>
                    <div class="row star">


                        <i class="fa fa-star s1"></i>
                        <i class="fa fa-star s2"></i>
                        <i class="fa fa-star s3"></i>
                        <i class="fa fa-star s4"></i>
                        <i class="fa fa-star s5"></i>
                    </div>
                    <span class="info"></span>

                </div>
            </div>
        </td>';
                    $paymentcolumn = '<td>
        <div class="payment">
            <span class="euro">€</span>' . $payment . '
        </div>
    </td>';

                    $actioncolumn =  ' <td class="actionblock">
    <div class="row actionblocks">
        <div class="col-lg-6 col-md-6 col-6">
            <button class="btn reschedule" title="Reschedule" data-toggle="modal" data-target="#rescheduletime">Reschedule</button>
        </div>
        <div class="col-lg-6 col-md-6 col-6">
            <button class="btn cancel" title="Cancel" data-toggle="modal" data-target="#cancelmodal">Cancel</button>
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
}
