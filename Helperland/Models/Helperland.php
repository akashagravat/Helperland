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
        $usertypeid = $row['UserTypeId'];
        $count = $stmt->rowCount();
        return array($username, $resetkey, $count, $userid, $usertypeid);
    }
    public function Activation($resetkey)
    {
        $sql = "select * from user where ResetKey = '$resetkey'";
        $stmts =  $this->conn->prepare($sql);
        $result = $stmts->execute();
        $row  = $stmts->fetch(PDO::FETCH_ASSOC);
        $usertype = $row['UserTypeId'];
        if($usertype == 1){
           $update = "UPDATE user SET isActive = 'No', `Status` = 'Active' WHERE ResetKey='$resetkey'";
           $stmt =  $this->conn->prepare($update);
           $result = $stmt->execute();
           }else{
        $update = "UPDATE user SET isActive = 'Yes' WHERE ResetKey='$resetkey'";
        $stmt =  $this->conn->prepare($update);
        $result = $stmt->execute();
    }
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
                        $_SESSION['usertype'] = $usertypeid;
                        $update = "UPDATE user SET Status = 'Active' WHERE Email= '$email'";
                        $update =  $this->conn->prepare($update);
                        $update->execute();
                        header('Location:' . $customer);
                    }
                    if ($usertypeid == 1) {
                        $_SESSION['usertype'] = $usertypeid;
                        $_SESSION['username'] = $email;

                        header('Location:' . $sp);
                    }
                    if ($usertypeid == 2) {
                        $_SESSION['usertype'] = $usertypeid;
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
        $count = $stmt->rowCount();
        if ($result) {
            $_SESSION['status_msg'] = "Password Updated Successfully";
            $_SESSION['status_txt'] = "";
            $_SESSION['status'] = "success";
        } else {
            $_SESSION['status_msg'] = "Password Not Updated. Please Try Again. ";
            $_SESSION['status_txt'] = "";
            $_SESSION['status'] = "warning";
        }
        return array($_SESSION['status_msg'], $_SESSION['status_txt'], $_SESSION['status'], $count);
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

    public function InsertSPAddress($array)
    {
        $sql = "INSERT INTO useraddress (UserId , AddressLine1	 , AddressLine2 , City ,State,  PostalCode , Mobile , Email ,Type)
        VALUES (:userid , :street ,  :houseno  , :location ,:state , :pincode , :mobilenum , :email , :type)";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return array($count);
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
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function GetUsersServiceprovider($id)
    {
        $idresult = array();
        foreach ($id as $array) {
            $sql = "SELECT Email FROM `user` WHERE UserId = {$array}";
            $stmt =  $this->conn->prepare($sql);
            $stmt->execute();
            $result  = $stmt->fetch(PDO::FETCH_ASSOC);
            array_push($idresult, $result);
        }
        return $idresult;
    }
    public function AddService($array)
    {
        $sql = "INSERT INTO servicerequest ( `UserId`, `ServiceStartDate`, `ServiceTime`, `ZipCode`,  `ServiceHourlyRate`, `ServiceHours`, `ExtraHours`, `TotalHours`, `TotalBed`, `TotalBath`, `SubTotal`, `Discount`, `TotalCost`, `EffectiveCost`, `ExtraServices`, `Comments`, `AddressId`, `PaymentTransactionRefNo`, `PaymentDue`, `HasPets`, `Status`, `CreatedDate`,  `PaymentDone`, `RecordVersion`)
     VALUES (:userid ,:servicedate ,:servicetime, :zipcode,:servicehourlyrate ,:servicehours, :extrahours , :totalhours, :totalbed , :totalbath, :subtotal, :discount, :totalcost , :effectivecost, :extraservices, :comments, :addressid, :paymentrefno, :paymentdue, :pets, :status ,:createddate , :paymentdone, :recordversion)
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

    public function RescheduleServiceRequest($array)
    {
        $sql = "UPDATE `servicerequest` SET `ServiceStartDate`= :newdate,`ServiceTime`= :newtime ,`ModifiedDate`= :modifieddate ,`ModifiedBy`= :modifiedby , `RecordVersion`= :recordversion,`Status`= :status WHERE `ServiceRequestId` = :serviceid";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return array($count);
    }

    public function CancelServiceRequest($array)
    {
        $sql = "UPDATE `servicerequest` SET `HasIssue` = :hasissue ,`ModifiedDate`= :modifieddate ,`ModifiedBy`= :modifiedby , `RecordVersion`= :recordversion , `Status` = :status WHERE `ServiceRequestId` = :serviceid";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return array($count);
    }
    public function GetServiceHistory($userid)
    {
        $sql = "SELECT * FROM `servicerequest` WHERE `UserId` = $userid ORDER BY `ServiceRequestId` DESC";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function GetUserAllDetails($email)
    {
        $sql = "select * from user where Email = '$email'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function UpdateCustomer($array)
    {
        $sql = "UPDATE `user` SET `FirstName`= :fistname,`LastName`=:lastname,`Mobile`=:mobile,`DateOfBirth`= :birthdate,`LanguageId`=:language,`ModifiedDate`=:modifieddate,`ModifiedBy`=:modifiedby WHERE `Email`=:email";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return array($count);
    }
    public function GetServiceHistoryUser($serviceid)
    {
        $sql = "SELECT * FROM `servicerequest` WHERE `ServiceRequestId` = $serviceid  ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function ChangeDefaultAddress($checkedradio)
    {
        $sql = "UPDATE `useraddress` SET `IsDefault`= 0 WHERE  `AddressId` != $checkedradio";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $changeradio = "UPDATE `useraddress` SET `IsDefault`= 1 WHERE  `AddressId` = $checkedradio";
        $stmts =  $this->conn->prepare($changeradio);
        $stmts->execute();
        $count = $stmts->rowCount();
        return array($count);
    }


    public function GetSpecificAddress($addressid)
    {
        $sql =  "SELECT * FROM useraddress WHERE AddressId = $addressid ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public function UpdateCustomerAddress($array)
    {
        $sql = "UPDATE `useraddress` SET `AddressLine1`= :street ,`AddressLine2`= :houseno,`City`=:location,`State`= :state ,`PostalCode`= :pincode ,`Mobile`=:mobilenum WHERE `AddressId` = :addressid ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return array($count);
    }

    public function UpdateSPAddress($array)
    {
        $sql = "UPDATE `useraddress` SET `AddressLine1`= :street ,`AddressLine2`= :houseno,`City`=:location,`State`= :state ,`PostalCode`= :pincode ,`Mobile`=:mobilenum WHERE `Email` = :email ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return array($count);
    }

    public function DeleteCustomerAddress($addressid)
    {
        $sql = "UPDATE `useraddress` SET `IsDeleted`= 1 WHERE `AddressId` = $addressid ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        return array($count);
    }


    public function GetSPRattings($id)
    {
        $sql = "SELECT * FROM `rating` WHERE `RatingTo` = $id";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array($result, $count);
    }

    public function CountRating($id)
    {
        $sql = "SELECT * FROM `rating` WHERE `ServiceRequestId` = $id";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array($result, $count);
    }

    public function InsertRating($array)
    {

        $sql = "INSERT INTO `rating`( `ServiceRequestId`, `RatingFrom`, `RatingTo`, `Ratings`, `Comments`, `RatingDate`, `IsApproved`, `VisibleOnHomeScreen`, `OnTimeArrival`, `Friendly`, `QualityOfService`) 
                VALUES (:serviceid,:ratingfrom,:ratingto,:averagerating,:comments,:ratingdt,:isapproved,:visiblehome,:ontimearrival,:friendly,:quality)";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return $count;
    }


    public function GetSPCompleted($userid)
    {
        $sql = "SELECT DISTINCT servicerequest.`ServiceProviderId`,user.FirstName,user.LastName FROM `servicerequest`  JOIN user
        ON servicerequest.`ServiceProviderId` = user.UserId  WHERE servicerequest.Status = 'Completed' AND servicerequest.UserId = $userid";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        return array($result, $count);
    }

    public function GetSPAllCount($userid, $serviceproviderid)
    {
        $sql = "SELECT ServiceProviderId,COUNT(`ServiceProviderId`) FROM `servicerequest` WHERE UserId = $userid AND `ServiceProviderId` = $serviceproviderid AND `Status` = 'Completed'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function CheckFavouriteOrNot($userid, $targetuserid)
    {
        $sql = "SELECT * FROM `favoriteandblocked` WHERE `UserId`= $userid AND `TargetUserId` = $targetuserid";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $count = $stmt->rowCount();

        return array($count, $result);
    }

    public function CheckValueInFavourite($userid, $targetuserid)
    {
        $sql = "SELECT * FROM `favoriteandblocked` WHERE `UserId` = $userid AND `TargetUserId`=$targetuserid;
            ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        $block = "";
        $fav = "";
        if ($count == 1) {
            $result  = $stmt->fetch(PDO::FETCH_ASSOC);
            $block = $result['IsBlocked'];
            $fav = $result['IsFavorite'];
        }

        return array($count, $block, $fav);
    }

    public function InsertFavBlockSp($array)
    {
        $sql = "INSERT INTO `favoriteandblocked`( `UserId`, `TargetUserId`, `IsFavorite`, `IsBlocked`) 
            VALUES (:userid,:targetuser,:isfav,:isblock)";

        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return array($count);
    }
    public function UpdateFavBlockSp($array)
    {

        $sql = "
         UPDATE `favoriteandblocked` SET `IsFavorite`=:isfav,`IsBlocked`=:isblock  WHERE `UserId` = :userid AND `TargetUserId`=:targetuser";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return array($count);
    }
    public function UpdateSP($array)
    {
        $sql = "UPDATE `user` SET `FirstName`= :fistname,`LastName`=:lastname,`Mobile`=:mobile,`UserProfilePicture`= :avtarimg,`Gender`= :gender,`ZipCode`= :pincode,`NationalityId` = :nationallity,`DateOfBirth`= :birthdate,`ModifiedDate`=:modifieddate,`ModifiedBy`=:modifiedby WHERE `Email`=:email";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return array($count);
    }


    public function GetPendingService()
    {
        $sql = "SELECT * FROM `servicerequest`  JOIN user ON servicerequest.`UserId`= user.UserId JOIN useraddress ON useraddress.AddressId = servicerequest.`AddressId`  WHERE `servicerequest`.`Status` = 'Pending' ORDER BY `servicerequest`.`ServiceRequestId` DESC";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function ApprooveServiceRequest($array)
    {
        $sql = "UPDATE `servicerequest` SET `ModifiedDate`= :modifieddate,`ModifiedBy`= :modifiedby,`RecordVersion`=:recordversion,`Status`=:status, `ServiceProviderId`=:serviceproviderid ,`SPAcceptedDate`=:spaccept WHERE `ServiceRequestId`=:serviceid";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return array($count);
    }

    public function GetSPall($usertype, $spid)
    {
        $sql = "SELECT * FROM `user` WHERE `UserTypeId` = $usertype && `UserId` != $spid";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function ConflictSP($serviceproviderid, $servicestartdate, $totalltimes)
    {
        $endtimes = substr($totalltimes, 2);
        $endtime = substr($endtimes, 0, -2);
                                                                                                                                                                // 16:00 >= 16:01                        
        $sql = "SELECT *,COUNT(*) FROM `servicerequest` WHERE `ServiceProviderId` = $serviceproviderid AND `ServiceStartDate` = '$servicestartdate' AND `ServiceTime` <=  '$endtime'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $count = $stmt->rowCount();
        if (count($result)) {
            foreach ($result as $row) {
                $serviceid = $row['ServiceRequestId'];
                $count = $row['COUNT(*)'];
                // $serviceid = $result['ServiceRequestId'];   
            }
        }
        return array($count, $serviceid);
    }

    public function  GetUpcomingServiceHistory($userid){
        $sql = "SELECT * FROM `servicerequest`  JOIN user ON servicerequest.`UserId`= user.UserId JOIN useraddress ON useraddress.AddressId = servicerequest.`AddressId`  WHERE `servicerequest`.`ServiceProviderId` = $userid && `servicerequest`.`Status`='Approoved'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;        
    }

    public function CompleteServiceRequest($array)
    {
        $sql = "UPDATE `servicerequest` SET `ModifiedDate`= :modifieddate ,`ModifiedBy`= :modifiedby , `RecordVersion`= :recordversion , `Status` = :status WHERE `ServiceRequestId` = :serviceid";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
        return array($count);
    }

    public function GetServiceSPHistory($userid)
    {
        $sql = "SELECT * FROM `servicerequest` WHERE `ServiceProviderId` = $userid ORDER BY `ServiceRequestId` DESC";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function CustComplteDetails($serviceid){
        $sql = "SELECT * FROM `servicerequest` JOIN user ON user.UserId = servicerequest.UserId JOIN useraddress ON useraddress.AddressId = servicerequest.AddressId WHERE `ServiceRequestId` = $serviceid";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function GetRating($targetid){
        $sql = "SELECT * FROM `rating` WHERE `RatingTo` = $targetid";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $results  = $stmt->rowCount();

        return array($result,$results);
    }

    public function WorkedCust($spid){
        $sql = 'SELECT DISTINCT  servicerequest.`UserId`,user.FirstName,user.LastName FROM `servicerequest` JOIN user ON user.UserId = servicerequest.UserId WHERE servicerequest.`ServiceProviderId` = '.$spid.' && servicerequest.`Status` = "Completed"';
                $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $results  = $stmt->rowCount();

        return $result;
    }

    public function Alluser(){
        $sql = "SELECT * FROM `user`";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $results  = $stmt->rowCount();

        return $result;
    }

    public function Allusers($usertypeid){
        $sql = "SELECT DISTINCT CONCAT(`FirstName`,' ',`LastName`) AS UserName FROM `user` WHERE UserTypeId = $usertypeid";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $results  = $stmt->rowCount();

        return $result;
    }

    public function ActivateDeactivate($array){
        $sql = 'UPDATE `user` SET `IsActive`= :isactive,`ModifiedDate`= :modifieddate , `ModifiedBy`= :modifiedby WHERE `UserId` = :userid';
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $count = $stmt->rowCount();
            return array($count);
    
    }

    public function selectdistinctuser(){
        $sql = "SELECT DISTINCT CONCAT(`FirstName`,' ',`LastName`) AS UserName FROM `user` ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // $sqls = "SELECT DISTINCT `RoleId` FROM `user`";
        // $stmts =  $this->conn->prepare($sqls);
        // $stmts->execute();
        // $results  = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array($result);
    }


    public function Selectuser($username){
        $sql = "SELECT * FROM `user` WHERE CONCAT(`FirstName`,' ',`LastName`) = '$username'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selrole($role){
        $sql = "SELECT * FROM `user` WHERE `RoleId` = '$role' ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

     public function selmobile($mobile)
    {
        $sql = "SELECT * FROM `user` WHERE `Mobile` = $mobile";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function selzip($zipcode)
    {
        $sql = "SELECT * FROM `user` WHERE `ZipCode` = $zipcode";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function seluserrole($selecteduser, $role){
        $sql = "SELECT * FROM `user` WHERE `RoleId` = '$role' && CONCAT(`FirstName`,' ',`LastName`) = '$selecteduser' ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function seluserphone($selecteduser, $phone){
        $sql = "SELECT * FROM `user` WHERE `Mobile` = $phone && CONCAT(`FirstName`,' ',`LastName`) = '$selecteduser' ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function seluserzip($selecteduser, $zipcode){
        $sql = "SELECT * FROM `user` WHERE `ZipCode` = $zipcode && CONCAT(`FirstName`,' ',`LastName`) = '$selecteduser' ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function selrolephone($role, $phone){
        $sql = "SELECT * FROM `user` WHERE `Mobile` = $phone && `RoleId` = '$role' ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selrolezip($role, $zipcode){
        $sql = "SELECT * FROM `user` WHERE `ZipCode` = $zipcode && `RoleId` = '$role' ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
  
    public function seluserrolezip($selecteduser,$role, $zipcode){
        $sql = "SELECT * FROM `user` WHERE `ZipCode` = $zipcode && CONCAT(`FirstName`,' ',`LastName`) = '$selecteduser' && `RoleId` = '$role' ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
   
    }

    public function seluserrolephone($selecteduser,$role, $phone){
        $sql = "SELECT * FROM `user` WHERE `Mobile` = $phone && CONCAT(`FirstName`,' ',`LastName`) = '$selecteduser' && `RoleId` = '$role' ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function seluserphonezip($selecteduser,$phone, $zipcode){
        $sql = "SELECT * FROM `user` WHERE `Mobile` = $phone && CONCAT(`FirstName`,' ',`LastName`) = '$selecteduser' &&`ZipCode` = $zipcode ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selrolephonezip($role,$phone, $zipcode){
        $sql = "SELECT * FROM `user` WHERE `Mobile` = $phone &&  `RoleId` = '$role' &&`ZipCode` = $zipcode ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 
    }
    
    public function selzipphone($phone, $zipcode){
        $sql = "SELECT * FROM `user` WHERE `Mobile` = $phone  &&`ZipCode` = $zipcode ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 
    }
    public function seluserrolephonezip($selecteduser,$role,$phone, $zipcode){
        $sql = "SELECT * FROM `user` WHERE `Mobile` = $phone && CONCAT(`FirstName`,' ',`LastName`) = '$selecteduser' &&`ZipCode` = $zipcode && `RoleId` = '$role'";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function GetAllServiceRequests(){
        $sql = "SELECT servicerequest.`UserId`,servicerequest.`ServiceRequestId`,servicerequest.`ServiceStartDate`,servicerequest.Status,servicerequest.ServiceTime,servicerequest.ServiceProviderId,servicerequest.TotalHours,useraddress.AddressLine1,useraddress.AddressLine2,useraddress.City,useraddress.City,useraddress.State,useraddress.PostalCode,user.FirstName,user.LastName,user.UserProfilePicture FROM `servicerequest` LEFT JOIN user ON servicerequest.`UserId` = user.UserId JOIN useraddress ON servicerequest.AddressId = useraddress.AddressId ORDER BY servicerequest.`ServiceRequestId` DESC";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 
    }
    public function SearchServiceid($val){
        $sql = "SELECT servicerequest.`UserId`,servicerequest.`ServiceRequestId`,servicerequest.`ServiceStartDate`,servicerequest.Status,servicerequest.ServiceTime,servicerequest.ServiceProviderId,servicerequest.TotalHours,useraddress.AddressLine1,useraddress.AddressLine2,useraddress.City,useraddress.City,useraddress.State,useraddress.PostalCode,user.FirstName,user.LastName,user.UserProfilePicture FROM `servicerequest` LEFT JOIN user ON servicerequest.`UserId` = user.UserId JOIN useraddress ON servicerequest.AddressId = useraddress.AddressId $val  ORDER BY servicerequest.`ServiceRequestId` DESC";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 
    }

    public function GetSearchSP($val){
        $sql = "SELECT servicerequest.`UserId`,servicerequest.`ServiceRequestId`,servicerequest.`ServiceStartDate`,servicerequest.Status,servicerequest.ServiceTime,servicerequest.ServiceProviderId,servicerequest.TotalHours,useraddress.AddressLine1,useraddress.AddressLine2,useraddress.City,useraddress.City,useraddress.State,useraddress.PostalCode,user.FirstName,user.LastName,user.UserProfilePicture FROM `servicerequest` LEFT JOIN user ON servicerequest.`ServiceProviderId` = user.UserId JOIN useraddress ON servicerequest.AddressId = useraddress.AddressId $val ORDER BY servicerequest.`ServiceRequestId` DESC";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 
    }

    public function UpdateAdminAddress($array){
        $sql = "UPDATE `useraddress` SET `AddressLine1`= :street ,`AddressLine2`= :houseno,`City`= :location,`State`=:state,`PostalCode`= :pincode WHERE `AddressId`= :addressid";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $result  = $stmt->rowCount();
        return array($result); 
    }

    public function GetServiceDetails($serviceid){
        $sql = "SELECT * FROM `servicerequest` WHERE  `ServiceRequestId` = $serviceid";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 
    }

    public function GiveRefund($array){
        $sql = "UPDATE `servicerequest` SET `RefundedAmount`= :refundamount,`Callcenternote`=:callcenternote,`Adminreschedulenote`=:whyrefund,`Status`=:status,`ModifiedDate`=:modifieddate,`ModifiedBy`=:modifiedby,`RecordVersion`=:recordversion WHERE `ServiceRequestId` = :serviceid ";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute($array);
        $result  = $stmt->rowCount();
        return array($result); 
    }

    public function  GetUpcomingServiceHistoryAll($userid){
        $sql = "SELECT * FROM `servicerequest`   WHERE `servicerequest`.`ServiceProviderId` = $userid  && (`servicerequest`.`Status`='Approoved' || `servicerequest`.`Status`='Completed')";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;        
    }
}
