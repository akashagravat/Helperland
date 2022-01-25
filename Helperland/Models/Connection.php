<?php

class Helperland {

    /* Creates database connection */
    public function __construct() {
        try {            
             /* Properties */
             $dsn = 'mysql:dbname=Helperland;host=localhost';
            $user = 'root';
            $password = '';
            $this-> conn = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "";
            die();
        }
    }

    public function EmailExists($email){
        $sql= "select * from customer_details where Email = $email";
        $stmt=  $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count = 1 ){
          echo "Email Available";
        }
        else{
           echo 'Email Already Exists Please Try Another Email';
        }
        // $res= $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return $res;
    }    
}   
