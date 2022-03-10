 <!-- Preloader Start-->
 <div id="preloader">
    <div id="pre-status">
      <div class="preload-placeholder"></div>
    </div>
  </div>
  <!-- Preloader End-->
 
<link rel="stylesheet" href="./assets/css/navcss.css?v=236">

<?php

$base_url = "http://localhost/helper/";
if (!isset($_SESSION['username'])) { ?>
  <style>
      @media screen and (max-width:992px){
        .mainnav .nav-link {
    text-align: center;
    color: #646464 !important;
}
.mainnav .nav-link:hover {
    color: blueviolet !important;
    transition: 0.3s all;
    /* text-align: center; */
}
.pricelink .nav-link{
    margin-bottom: 27px;
}
}
  </style>
    <nav class="navbar  navbar-expand-lg fixed-top mainnav">
        <div class="container">
            <a class="navbar-brand" href="./index.php"><img src="assets/Image/white-logo-transparent-background.png" class="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  w-100 justify-content-end">
                    <li class="nav-item  booknow">
                        <a class="nav-link book-now" title="Book Service" href="./BookService.php">Book Now</a>
                    </li>
                    <li class="nav-item pricelink">
                        <a class="nav-link ps1" title="Price" href="./Price.php">Prices & services</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link warrenty" title="Warrenty" href="#" >Warranty</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link blog" title="Blog" href="#">Blog</a>
                    </li>  <li class="nav-item ">
                        <a class="nav-link Contact mr-2" title="Contact" href="./Contact.php">Contact</a>
                    </li>
                    <li class="nav-item  login">
                        <a class="nav-link log-in" title="Login" href=".#LoginModal' ">Login</a>
                    </li>
                    <li class="nav-item  helper">
                        <a class="nav-link helper1" title="Become a Service Provider" href="./ServiceProvider-Become-a-pro.php">Become a Helper</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   <!-- Mobile Navbar -->

<?php } ?>


<?php if (isset($_SESSION['username'])) { ?>

    <?php if ($_SESSION['usertype'] == 0) { ?>

        <div class="header-navigationbar">
            <nav class="navbar navbar-expand-lg fixed-top mainnav">
                <a class="navbar-brand" href="./index.php"><img src="assets/image/white-logo-transparent-background.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars bars"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item booked">
                            <a class="nav-link booknow" href="BookService.php">Book now</a>
                        </li>
                        <li class="nav-item pricelink">
                            <a class="nav-link " href="./Price.php">Prices & services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link warrenty " href="#">Warranty</a>
                       </li>
                        <li class="nav-item">
                            <a class="nav-link blog " href="#">Blog</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link Contact " href="./Contact.php">Contact</a>
                        </li>     <li class="nav-item dropdown notification">
                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell ntf"></i><span class="badge badge-danger">2</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Notification1</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Notification2</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Notification3</a>
                            </div>
                        </li>


                        <li class="nav-item dropdown users">
                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/image/admin-user.png">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item disabled">Welcome<div style="font-weight: bold;">
                                        <?php echo $_SESSION["firstname"]; ?>
                                    </div></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./CustomerDashboard.php">My Dashboard</a>
                                <a class="dropdown-item" href="CustomerSetting.php">My Settings</a>
                                <form method="POST" action=<?= $base_url . "./?controller=helperland&function=Logout" ?>>
                                    <button class="dropdown-item" name="logout" type="submit">Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Mobile Navbar -->

        <div class="mobile-nav">

            <nav class="navbar navbar-expand-lg fixed-top">
                <a class="navbar-brand" href="./index.php"><img src="assets/image/white-logo-transparent-background.png"></a>
                <div class="nav-brand dropdown notifications">
                    <a class="dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell ntf"></i><span class="badge badge-danger">2</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Notification1</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Notification2</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Notification3</a>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContents" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars bars"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContents">

                    <ul class=" nav ">
                        <li class="nav-item">
                            <h1 class="wlcm">Welcome,
                        <li class="nav-item"><span class="wlcm-nm"><?php echo $_SESSION["firstname"]; ?></span></li>
                        </h1>

                        </li>


                        <li class="nav-item navdashboard">
                            <a href="./CustomerDashboard.php" class="nav-link">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item active navservicehistory">
                            <a href="./Customer-ServiceHistory.php" class="nav-link ">
                                Service History </a>
                        </li>
                        <li class="nav-item navserviceschedule">
                            <a href="#" class="nav-link ">
                                Service Schedule
                            </a>
                        </li>
                        <li class="nav-item navfavourite">
                            <a href="./CustomerFavouriteSP.php" class="nav-link ">
                                Favourite Pros </a>
                        </li>
                        <li class="nav-item navinvoice">
                            <a href="#" class="nav-link ">
                                Invoices </a>
                        </li>
                   
                        <li class="nav-item navnotification">
                            <a href="#" class="nav-link ">
                                Notifications </a>
                        </li>
                        <li class="nav-item navsetting">
                            <a href="CustomerSetting.php" class="nav-link ">
                                My Setting </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action=<?= $base_url . "./?controller=helperland&function=Logout" ?>>
                                <button class="dropdown-item" name="logout" type="submit">Logout</button>
                            </form>
                        </li>

                        <li class="nav-item books">
                        <a href="./BookService.php" class="nav-link ">
                            Book now
                        </a>
                        </li>

                        <li class="nav-item navprice">
                            <a href="./Price.php" class="nav-link ">
                                Prices & services
                            </a>
                        </li>
                        <li class="nav-item navwarranty">
                            <a href="#" class="nav-link ">
                                Warranty </a>
                        </li>
                        <li class="nav-item navblog">
                            <a href="#" class="nav-link ">
                                Blog </a>
                        </li>
                        <li class="nav-item navcontact">
                            <a href="./Contact.php" class="nav-link ">
                                Contact </a>
                        </li>

                        <li class="nav-item fb-insta">
                            <a href="#" class="nav-link"><i class="fa fa-facebook"></i><span><i class="fa fa-instagram"></i></span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    <?php } ?>

    <?php if ($_SESSION['usertype'] == 1) { ?>

        <div class="header-navigationbar">
            <nav class="navbar navbar-expand-lg fixed-top mainnav">
                <a class="navbar-brand" href="./index.php"><img src="assets/image/white-logo-transparent-background.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars bars"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                    <li class="nav-item pricelink">
                            <a class="nav-link item1" href="./Price.php">Prices & services</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link warrenty" href="#">Warranty</a>
                       </li>
                        <li class="nav-item ">
                            <a class="nav-link blog" href="#">Blog</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link Contact" href="./Contact.php">Contact</a>
                        </li>          <li class="nav-item dropdown notification">
                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell ntf"></i><span class="badge badge-danger">2</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Notification1</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Notification2</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Notification3</a>
                            </div>
                        </li>


                        <li class="nav-item dropdown users">
                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/image/admin-user.png">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item disabled">Welcome<div style="font-weight: bold;">
                                        <?php echo $_SESSION["firstname"]; ?>
                                    </div></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./NewServiceRequestSP.php">My Dashboard</a>
                                <a class="dropdown-item" href="./SPSetting.php">My Settings</a>
                                <form method="POST" action=<?= $base_url . "./?controller=helperland&function=Logout" ?>>
                                    <button class="dropdown-item" name="logout" type="submit">Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Mobile Navbar -->

        <div class="mobile-nav">

            <nav class="navbar navbar-expand-lg fixed-top">
                <a class="navbar-brand" href="./index.php"><img src="assets/image/white-logo-transparent-background.png"></a>
                <div class="nav-brand dropdown notifications">
                    <a class="dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell ntf"></i><span class="badge badge-danger">2</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Notification1</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Notification2</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Notification3</a>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContents" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars bars"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContents">

                    <ul class=" nav ">
                        <li class="nav-item">
                            <h1 class="wlcm">Welcome,
                        <li class="nav-item"><span class="wlcm-nm"><?php echo $_SESSION["firstname"]; ?></span></li>
                        </h1>

                        </li>


                        <li class="nav-item navdashboard">
                            <a href="#" class="nav-link">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item active navservicehistory">
                            <a href="./NewServiceRequestSP.php" class="nav-link ">
                                
                New Service Requests
               </a>
                        </li>
                        <li class="nav-item upcoming">
                            <a href="./ServiceProviderUpcomingService.php" class="nav-link ">

                Upcoming Services
                                          </a>
                        </li>
                        <li class="nav-item navserviceschedule">
                            <a href="./SPServiceSchedule.php" class="nav-link ">

                Service Schedule
              								</a>
                        </li>
                        <li class="nav-item servicehistory">
                            <a href="./ServiceHistorySP.php" class="nav-link ">

                Service History
              								</a>
                        </li>
                        <li class="nav-item navrating">
                            <a href="./SPRating.php" class="nav-link ">
                                My Ratings
                            </a>
                        </li>
                        <li class="nav-item navnotification">
                            <a href="#" class="nav-link ">
                                Notifications </a>
                        </li>
                        <li class="nav-item blockcust">
                            <a href="./BlockCustomer.php" class="nav-link ">
                               Block Customer </a>
                        </li>
                        <li class="nav-item navsetting">
                            <a href="./SPSetting.php" class="nav-link ">
                                My Setting </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action=<?= $base_url . "./?controller=helperland&function=Logout" ?>>
                                <button class="dropdown-item" name="logout" type="submit">Logout</button>
                            </form>
                        </li>


                        <li class="nav-item navprice">
                            <a href="./Price.php" class="nav-link ">
                                Prices & services
                            </a>
                        </li>
                        <li class="nav-item navwarranty">
                            <a href="#" class="nav-link ">
                                Warranty </a>
                        </li>
                        <li class="nav-item navblog">
                            <a href="#" class="nav-link ">
                                Blog </a>
                        </li>
                        <li class="nav-item navcontact">
                            <a href="./Contact.php" class="nav-link ">
                                Contact </a>
                        </li>

                        <li class="nav-item fb-insta">
                            <a href="#" class="nav-link"><i class="fa fa-facebook"></i><span><i class="fa fa-instagram"></i></span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    <?php } ?>
    <?php if ($_SESSION['usertype'] == 2) { ?>
    <?php
   
    $emails = $_SESSION['username'];
    $url = "http://localhost/helper/";
    $base_url = "http://localhost/helper/";
    $urls = "http://localhost/helper/Admin-UserManagement";
    // Session destroy and back button clicked  
    if (!isset($_SESSION['username'])) {
        header('Location:' . $url);
    }
   if(isset($_SESSION['username'])){
        header('Location:' . $urls); 
    }

    ?>
   <?php }?>
<?php } ?>