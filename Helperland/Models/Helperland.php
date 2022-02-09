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
            $_SESSION['status_msg'] = "Your Account has been Created Please Verify Your Email.";
            $_SESSION['status_txt'] = "";
            $_SESSION['status'] = "success";
        } else {
            $_SESSION['status_msg'] = "Your Account is not Created Please Try Again.";
            $_SESSION['status_txt'] = "";
            $_SESSION['status'] = "alert";
        }
        return array($_SESSION['status_msg'], $_SESSION['status_txt'], $_SESSION['status']);
    }

    public function EmailExists($email)
    {
        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }

    public function ResetKey($email)
    {
        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $firstname = $row['FirstName'];
        $lastname = $row['LastName'];
        $username = $firstname . ' ' . $lastname;
        $userid = $row['UserId'];
        $resetkey = $row['ResetKey'];
        $count = $stmt->rowCount();
        return array($username, $resetkey, $count, $userid);
    }
    public function Activation($resetkey)
    {
        $update = "UPDATE user SET isActive = 'Yes' WHERE ResetKey='$resetkey'";
        $stmt =  $this->conn->prepare($update);
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['status_msg'] = "Congratulation, Your Account verification is successfull!! ";
            $_SESSION['status_txt'] = "You Can Login Now";
            $_SESSION['status'] = "success";
        } else {
            $_SESSION['status_msg'] = "You Are Logged Out";
            $_SESSION['status_txt'] = "";
            $_SESSION['status'] = "success";
        }
        return array($_SESSION['status_msg'], $_SESSION['status_txt'], $_SESSION['status']);
    }
    public function CheckLogin($email, $password)
    {
        $base_url = "http://localhost/helper/#LoginModal";
        $customer = "http://localhost/helper/Customer-Servicehistory";
        $sp = "http://localhost/helper/ServiceProviderUpcomingService";
        $admin = "http://localhost/helper/Admin-UserManagement";
        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        $usertypeid = $row['UserTypeId'];
        $isActive = $row['IsActive'];
        if ($count == 1) {
            if ($isActive == 'Yes') {
                if (password_verify($password, $row['Password'])) {

                    if ($usertypeid == 0) {
                        $_SESSION['username'] = $email;
                        $update = "UPDATE user SET Status = 'Active' WHERE Email= '$email'";
                        $update =  $this->conn->prepare($update);
                        $update->execute();
                        header('Location:' . $customer);
                    }
                    if ($usertypeid == 1) {
                        $_SESSION['username'] = $email;
                        header('Location:' . $sp);
                    }
                    if ($usertypeid == 3) {
                        $_SESSION['username'] = $email;
                        header('Location:' . $admin);
                    }
                } else {
                    $_SESSION['status_msg'] = "Password Invalid";
                    $_SESSION['status_txt'] = "Please Enter Valid Password";
                    $_SESSION['status'] = "warning";
                    header('Location:' . $base_url);
                }
            } else {
                $_SESSION['status_msg'] = "Your Account is not Activated";
                $_SESSION['status_txt'] = "";
                $_SESSION['status'] = "warning";
                header('Location:' . $base_url);
            }
        } else {
            $_SESSION['status_msg'] = "User does not exists";
            $_SESSION['status_txt'] = "Please Enter Valid User";
            $_SESSION['status'] = "error";
            //$_SESSION['msg'] = "User Not Available";
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
            $_SESSION['status_msg'] = "Message Has Been Sent Succesfully";
            $_SESSION['status_txt'] = "";
            $_SESSION['status'] = "success";
            // $_SESSION['msg'] = "Your Account has been Created Please Verify Your Email.";
        } else {
            $_SESSION['status_msg'] = "Your Message is not Sent Please Try Again.";
            $_SESSION['status_txt'] = "";
            $_SESSION['status'] = "alert";
        }
        return array($_SESSION['status_msg'], $_SESSION['status_txt'], $_SESSION['status']);
    }

    public function ResetPass($array)
    {
        $sql = "UPDATE user SET Password = :password , ModifiedDate = :updatedate , ModifiedBy = :modifiedby WHERE ResetKey = :resetkey";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        if ($result) {
            $_SESSION['status_msg'] = "Password Updated Successfully";
            $_SESSION['status_txt'] = "";
            $_SESSION['status'] = "success";
        } else {
            $_SESSION['status_msg'] = "Password Not Updated. Please Try Again. ";
            $_SESSION['status_txt'] = "";
            $_SESSION['status'] = "warning";
        }
        return array($_SESSION['status_msg'], $_SESSION['status_txt'], $_SESSION['status']);
    }

    public function PostalExists($postal)
    {
        $sql = "SELECT * FROM zipcode WHERE ZipcodeValue = $postal";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }

    public function InsertAddress($array)
    {
        $sql = "INSERT INTO useraddress (UserId , AddressLine1	 , AddressLine2 , City ,State,  PostalCode , Mobile , Email ,Type)
        VALUES (:userid , :street ,  :houseno  , :location ,:state , :pincode , :mobilenum , :email , :type)";
        $stmt =  $this->conn->prepare($sql);
        $result = $stmt->execute($array);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function CheckLoginCustomer($email, $password)
    {
        $base_url = "http://localhost/helper/BookService";
        $customer = "http://localhost/helper/BookService";

        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        $usertypeid = $row['UserTypeId'];
        $isActive = $row['IsActive'];
        if ($count == 1) {
            if ($isActive == 'Yes') {
                if (password_verify($password, $row['Password'])) {

                    if ($usertypeid == 0) {
                        $_SESSION['username'] = $email;
                        $update = "UPDATE user SET Status = 'Active' WHERE Email= '$email'";
                        $update =  $this->conn->prepare($update);
                        $update->execute();
                        header('Location:' . $customer);
                    } else {
                        $_SESSION['status_msg'] = "Only Customer can Access This Part";
                        $_SESSION['status_txt'] = "";
                        $_SESSION['status'] = "warning";
                        header('Location:' . $customer);
                    }
                } else {
                    $_SESSION['status_msg'] = "Password Invalid";
                    $_SESSION['status_txt'] = "Please Enter Valid Password";
                    $_SESSION['status'] = "warning";
                    header('Location:' . $base_url);
                }
            } else {
                $_SESSION['status_msg'] = "Your Account is not Activated";
                $_SESSION['status_txt'] = "";
                $_SESSION['status'] = "warning";
                header('Location:' . $base_url);
            }
        } else {
            $_SESSION['status_msg'] = "User does not exists";
            $_SESSION['status_txt'] = "Please Enter Valid User";
            $_SESSION['status'] = "error";
            //$_SESSION['msg'] = "User Not Available";
            header('Location:' . $base_url);
        }
    }


    public function CityLocation($pincode)
    {

        $sql  = " SELECT
        zipcode.ZipcodeValue,
        city.CityName, state.StateName  FROM zipcode 
      JOIN city
        ON zipcode.CityId = city.Id  AND ZipcodeValue = $pincode
		JOIN state 
        ON state.Id = city.StateId";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();

        $row  = $stmt->fetch(PDO::FETCH_ASSOC);

        $zipcode = $row['ZipcodeValue'];
        $city = $row['CityName'];
        $state = $row['StateName'];

        return array($city, $state);
    }


    public function GetAddress($email)
    {
        $sql =  "SELECT * FROM useraddress WHERE Email = '$email'  ORDER BY AddressId DESC";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public function GetServiceProvider()
    {
        $sql = "SELECT * FROM user WHERE UserTypeId = 1;";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function Favourite($email)
    {
        $sql = "SELECT * FROM `favoriteandblocked` WHERE UserId = $email";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function GetUsers($id)
    {
        $sql = "SELECT * FROM `user` WHERE UserId = $id";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function AddService($array)
    {
        $sql = "INSERT INTO servicerequest ( `UserId`, `ServiceStartDate`, `ServiceTime`, `ZipCode`,  `ServiceHourlyRate`, `ServiceHours`, `ExtraHours`, `TotalHours`, `TotalBed`, `TotalBath`, `SubTotal`, `Discount`, `TotalCost`, `EffectiveCost`, `ExtraServices`, `Comments`, `AddressId`, `PaymentTransactionRefNo`, `PaymentDue`, `HasPets`, `Status`, `CreatedDate`,  `PaymentDone`, `RecordVersion`)
     VALUES (:userid ,:servicedate ,:servicetime, :zipcode,:servicehourlyrate ,:servicehours, :extrahours , :totalhours, :totalbed , :totalbath, :subtotal, :discount, :totalcost , :effectivecost, :extraservices, :comments, :addressid, :paymentrefno, :paymentdue, :pets,:status ,:createddate , :paymentdone, :recordversion)
     ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $addressid = $this->conn->lastInsertId();

        return $addressid;
    }
    public function GetActiveServiceProvider()
    {
        $sql = 'SELECT * FROM `user` WHERE UserTypeId = 1 AND `IsActive`="Yes"';
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function GetSelectedAddress($addressid)
    {
        $sql =   "SELECT * FROM `useraddress` WHERE `AddressId` = $addressid";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
