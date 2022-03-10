<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./assets/css/Service Provider-Become a Pro.css?v=21">
  <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/validation.css">
  <title>Service</title>
 
  <?php
  $base_url = "http://localhost/helper/";
  session_start();
  if (!isset($_SESSION['username'])) { ?>
    <link rel="stylesheet" href="./assets/css/Homenav.css">
  <?php } ?>
  <?php
  if (isset($_SESSION['username'])) { ?>
    <link rel="stylesheet" href="./assets/css/HomeLogin.css">
  <?php } ?>

</head>

<body>
   <!-- Preloader Start-->
   <div id="preloader">
    <div id="pre-status">
      <div class="preload-placeholder"></div>
    </div>
  </div>
  <!-- Preloader End-->
 
  <div class="wrapper">
    <header>
      <?php if (!isset($_SESSION['username'])) { ?>

        <nav class="navbar navbar-expand-lg fixed-top navbar-light">
          <a class="navbar-brand" href="./index.php"><img src="./assets/image/white-logo-transparent-background.png"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars " style="color:white;padding: 5px;"></i></span>
          </button>
          <div class="collapse navbar-collapse float-right" id="navbarNavDropdown">
            <ul class="navbar-nav ">
              <li class="nav-item link1">
                <a class="nav-link box-5" title="Book a Service" id="box-1" href="./BookService.php">Book a Cleaner </a>
                <a class="nav-link box-5" title="Prices" href="./Price.php">Prices</a>
                <a class="nav-link box-5" title="Our Guaruntee" href="#">Our Guaruntee</a>
                <a class="nav-link box-5" title="Blog" href="#">Blog</a>
                <a class="nav-link box5" title="Contact Us" href="./Contact.php">Contact Us</a>

              </li>

              <li class="nav-item ">
                <a class="nav-link " title="Login" id="box-2" href="<?= './#LoginModal' ?>">Login </a>

              </li>
              <li class="nav-item ">
                <a class="nav-link" title="Service Provider Become a Pro" id="box-3" href="./ServiceProvider-Become-a-pro.php">Become a Helper </a>

              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="./assets/image/flag.png">
                </a>
                <div class="dropdown-menu img" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">India</a>
                  <a class="dropdown-item" href="#">US</a>
                  <a class="dropdown-item" href="#">UK</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>

      <?php } ?>

      <?php if (isset($_SESSION['username'])) {
        include('navbar.php');
      } ?>


    </header>
    <menu>
      <section class="banner" style=" background-image: url('./assets/image/become-a-pro-banner.png'); background-size: cover; ">
        <div class="card register">
          <h1>Register Now!</h1>
     
          <form method="POST" action=<?= $base_url . "./?controller=helperland&function=InsertServiceProvider" ?>>
            <div class="form-group">
              <input type="text" class="form-control" id="firstName" placeholder="First name" name="firstname">
            </div>
            <div class="first-name-msg text-center mb-2"></div>  

            <div class="form-group">
              <input type="text" class="form-control" id="lastname" placeholder="Last name" name="lastname">
            </div>
            <div class="last-name-msg text-center mb-2"></div>  

            <div class="form-group">
              <input type="email" class="form-control check_email" name="email" id="useremail" placeholder="Email Address" autocomplete="off">
            </div>
            <div class="mb-3">
            <div class="email-msg float-left" style="padding-left: 8%;"></div>
              <div class="error-email float-right" style="padding-right: 8%;"></div> 
            </div>
            <div class="form-group phonenum">
              <div class="input-group ">
                <div class="input-group-prepend">
                  <div class="input-group-text">+49</div>
                </div>
                <input type="tel" class="form-control" name="mobile" id="mobilenum" placeholder="Phone Number" maxlength="10" size="10">
              </div>
              <div class="mobile-msg text-center mb-2"></div>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="password-msg text-center mb-2"></div>

            <div class="form-group">
              <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
            </div>
            <div class="cpassword-msg text-center mb-2"></div>

            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="check">
              <label class="form-check-label " for="check">Send me newsletters from Helperland</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="inlineFormCheck" name="privacy" checked>
              <label class="form-check-label " for="inlineFormCheck">I accept <a href="#">terms and conditions</a> & <a href="#">privacy policy</a></label>
              <div class="checbox-msg text-center mb-2"></div>
            </div>
            <div class="form-group recaptcha">
              <div class="g-recaptcha" data-sitekey="6LfZFLAdAAAAALdjt9qtcojiy2xEMk7gY4gXAeUS"></div>

            </div>
            <div class="form-group sbmtbtn">
              <button type="submit" name="submit" class="btn sbmtbtns" disabled="disabled">Get Started<i class="fa fa-long-arrow-right fa-lg right-arrow"></i></button>
            </div>
          </form>

        </div>
        <a class="scroll-down">
          <div class="dwn">

            <img src="./assets/image/ellipse-525.svg" class="eclipce">
            <div class="download">
              <img src="./assets/Image/shape-1.svg" alt="" class="download1">
            </div>
          </div>
        </a>

      </section>
      <section class="blog-section" id="blog-section">
        <div class="blogs ">
          <h2>How it works</h2>
          <div class="blog1 d-flex">
            <div class="content1 align-self-center">

              <h3 class="title">
                Register yourself </h3>
              <p class="paragraph">
                Provide your basic information to register
                yourself as a service provider.
              </p>
              <p>Read More <i class="fa fa-long-arrow-right fa-lg"></i></p>
            </div>
            <img src="./assets/Image/blog-1.png" class="image1 ml-auto" />

          </div>
          <div class="blog2 d-flex">
            <img src="./assets/Image/blog-2.png" class="image2" />

            <div class="content2 ml-auto align-self-center">

              <h3 class="title">
                Get service requests </h3>
              <p class="paragraph">
                You will get service requests from
                customes depend on service area and profile.
              </p>
              <p>Read More <i class="fa fa-long-arrow-right fa-lg"></i></p>
            </div>

          </div>
          <div class="blog3 d-flex">

            <div class="content3 align-self-center ">

              <h3 class="title">
                Complete service </h3>
              <p class="paragraph">
                Accept service requests from your customers
                and complete your work.
              </p>
              <p>Read More <i class="fa fa-long-arrow-right fa-lg"></i></p>
            </div>
            <img src="./assets/Image/blog-3.png" class="image3 ml-auto" />

          </div>
        </div>
        <div class="newsletter">
          <div class="container">
            <h3 class="ournews ">GET OUR NEWSLETTER</h3>
            <form action="#" method="Post" class="newsform">
              <input type="text" name="text" placeholder="YOUR EMAIL">
              <button type="button" class="btn btn5">
                <p>Subscribe</p>
              </button>
            </form>
          </div>
        </div>
      </section>
    </menu>
  </div>
  <?php
  include('./footer.php');
  ?>
  <script src="./assets/js/Service Provider - Become a Pro.js?v=212"></script>
  <script src="./assets/js/CustomerSignUp.js?v=212"></script>
  
  <script>
    $(document).ready(function(){
      <?php if (isset($_SESSION['status'])) { ?>

      Swal.fire({
                title: '<?php echo $_SESSION['status_msg']; ?>',
                text: '<?php echo $_SESSION['status_txt']; ?>',
                icon: '<?php echo $_SESSION['status']; ?>',
                confirmButtonText: 'Done'
            })
        
      <?php }    ?>
  
    });
  </script>
</body>

</html>