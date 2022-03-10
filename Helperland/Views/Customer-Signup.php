<?php 
include('header.php');

$base_url="http://localhost/helper/";
?>
    <title>Customer SignUp</title>
    <link rel="stylesheet" href="./assets/css/Customer-Signup.css">
</head>

<body>

  <?php include("navbar.php");?>
   <section class="customer-signup-form">
    <h1 class="Customer-Signup text-center">Create an account</h1>
    <div class="container">
        <div class="sepimg">
            <img src="./assets/Image/separator.png" class="sepretor">

        </div>
    </div>
  <div class="container mt-5 customerform ">
  <div class="userregistration validation-form" >

    <form  method="post" id="signup" action=<?= $base_url."./?controller=helperland&function=InsertUser"?>>
        <div class="form-row">
          <div class="form-group col-md-6">
            <input type="text" class="form-control" id="firstName" name="firstname" placeholder="First Name">
            <div class="first-name-msg"></div>

          </div>
          <div class="form-group col-md-6">
            <input type="text" class="form-control" id="lastname"name="lastname" placeholder="Last Name">
            <div class="last-name-msg"></div>  
          </div>
        </div>
  
        <div class="form-row">
            <div class="form-group col-md-6">
              <input type="email" class="form-control check_email" id="useremail" name="email" placeholder="E-mail address"  autocomplete="off">
              <div class="email-msg float-left"></div>
              <div class="error-email float-right"></div> 

            </div>
            <div class="form-group col-md-6">
                <label class="sr-only" for="inlineFormInputGroup">Username</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">+49</div>
                  </div>
                  <input type="tel" class="form-control" id="mobilenum" name="mobile" placeholder="Mobile number" maxlength="10" size="10">
                </div>
                <div class="mobile-msg"></div>
              </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password"  autocomplete="off">
       <div class="password-msg"></div>
        </div>
        <div class="form-group col-md-6">
          <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
          <div class="cpassword-msg"></div>

        </div>
      </div>
      <div class="form-row form-check mb-2">
            <input
              class="form-check-input"
              type="checkbox"
              id="inlineFormCheck"
              name="privacy"
              checked
            />
            <label class="form-check-label" for="inlineFormCheck">
              I have read the <a href="#" class="privacy-policy">privacy policy</a>
            </label>
           
            <div class="checbox-msg"></div>
      </div>
   
     <div class="form-row register-submit mt-3">
        <button type="submit" id="submit-btn" name="CustomerSignup" class="btn registration " disabled>Register</button>
       </div>

    </form>
  </div>
    <div class="already-registered mt-3">
        <p>Already registered?  <a href="index.php#LoginModal" id="login-btn" class="login-btn">Login Now</a></p>
    </div>
  </div>
</section>


      

<?php include("footer.php"); ?>

<script src="./assets/js/CustomerSignUp.js"></script>

</script>
</body>

</html>