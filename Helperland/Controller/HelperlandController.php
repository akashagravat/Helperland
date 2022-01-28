<?php
class HelperlandController
{
    function __construct()
    {
        include('Models/Connection.php');
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
            $mobile =  $_POST['mobile'];
            $email = $_POST['email'];
            $subject = $_POST['sub'];
            $message = $_POST['message'];
            $name = $_POST['firstname'] . " " . $_POST['lastname'];
            $array = [
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'mobile' => $_POST['mobile'],
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
            header('Location:' . $base_url);
        }
    }


    public function Logout(){
        if(isset($_POST)){
            $base_url = "http://localhost/helper/#LoginModal";
            unset($_SESSION['username']);
            $_SESSION['status_msg'] = "You are Logged Out";
            $_SESSION['status_txt'] = "";
            $_SESSION['status'] = "success";
            // $_SESSION['msg'] = "You are Logged Out"; 
            header('Location:'.$base_url);
        }
    }

    public function InsertServiceProvider(){
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
}
