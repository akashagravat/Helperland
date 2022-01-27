<?php
class Helperland
{

    /* Creates database connection */
    public function __construct()
    {
        try {
            /* Properties */
            $dsn = 'mysql:dbname=Helperland;host=localhost';
            $user = 'root';
            $password = '';
            $this->conn = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "";
            die();
        }
    }

    public function InsertCustomer_SP($array)
    {
        $sql = "INSERT INTO user (FirstName,LastName, Email , Mobile , Password , UserTypeId , RoleId , ResetKey , CreatedDate , Status , IsActive , IsRegisteredUser)
        VALUES (:firstname , :lastname , :email , :mobile , :password , :usertypeid , :roleid , :resetkey , :creationdt , :status , :isactive , :isregistered )";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        // return $result;
        if ($result) {
            $_SESSION['msg'] = "Your Account has been Created Please Verify Your Email.";
        } else {
            $_SESSION['msg'] = "Your Account is not Created Please Try Again.";
        }
        return $_SESSION['msg'];
    }

    public function EmailExists($email)
    {
        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }

    public function ResetKey($email){
        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $username = $row['FirstName'];
        $resetkey = $row['ResetKey'];
        $count = $stmt->rowCount();
        return array($username,$resetkey,$count);
        

    }
    public function Activation($resetkey)
    {
        $update = "UPDATE user SET isActive = 'Yes' WHERE ResetKey='$resetkey'";
        $stmt =  $this->conn->prepare($update);
        $result = $stmt->execute();
        if ($result) {
            if (isset($_SESSION['msg'])) {
                $_SESSION['msg'] = "Congratulation,Your Account verification is successfull!! You Can Login Now";
            }
        } else {
            $_SESSION['msg'] = "You are Logged Out";
        }
    }
    public function CheckLogin($email,$password)
    {
        $base_url = "http://localhost/helper/#LoginModal";
        $customer = "http://localhost/helper/Customer-Servicehistory";
        $sp = "http://localhost/helper/ServiceProviderUpcomingService";

        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        $usertypeid = $row['UserTypeId'];
        if ($count == 1) {
            if (password_verify($password, $row['Password'])) {
                if($usertypeid = 0){
                $_SESSION['username'] = $email;
          
                header('Location:' . $customer);
                }else if($usertypeid = 1){
                    $_SESSION['username'] = $email;
                    header('Location:' . $sp);

                }
              } 
              else{
                $_SESSION['msg'] = "Password Invalid";  
                header('Location:' . $base_url);
      
              }
        } else {
            $_SESSION['msg'] = "User Not Available";
            header('Location:' . $base_url);
        }
    }

    public function Contactus($array)
    {
        $sql = "INSERT INTO contactus (Name , Email , Subject , PhoneNumber , Message , CreatedOn , Status , Priority )
        VALUES (:name ,  :email , :subject , :mobile , :message , :creationdt , :status , :priority )";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        // return $result;
        if ($result) {
            $_SESSION['message'] = "Message Has Been Sent Succesfully";
        } else {
            $_SESSION['message'] = "Your Account is not Created Please Try Again.";
        }
        return $_SESSION['message'];
    }

    public function ResetPass($array)
    {
        $sql = "UPDATE user SET Password = :password , ModifiedDate = :updatedate , ModifiedBy = :modifiedby WHERE ResetKey = :resetkey";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        if ($result) {
            $_SESSION['msg'] = "Password Updated Successfully";
        } else {
            $_SESSION['msg'] = "Password Not Updated.Please Try Again.";
        }
        return $_SESSION['msg'];
    }

}
