<?php 
    $base_url = "http://localhost/helper/";
?>
<header>
    <?php if (!isset($_SESSION['username'])) { ?>
        <nav class="navbar navbar-expand-lg fixed-top navbar-light">
            <a class="navbar-brand" href="index.php"><img src="./assets/image/white-logo-transparent-background.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars " style="color:white;padding: 5px;"></i></span>
            </button>
            <div class="collapse navbar-collapse float-right" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item link1">
                        <a class="nav-link box-5" id="box-1" href="BookService.php" title="Book a Cleaner">Book a
                            Cleaner </a>
                        <a class="nav-link box-5" href="Price.php" title="Prices">Prices</a>
                        <a class="nav-link box-5" href="OurGuaruntee.php" title="Our Guranteee">Our Guaruntee</a>
                        <a class="nav-link box-5" href="Blog.php" title="Blog">Blog</a>
                        <a class="nav-link box5" href="Contact.php" title="Contact Us">Contact Us</a>

                    </li>

                    <li class="nav-item ">
                        <a class="nav-link " href="#login" id="box-2" title="Login" data-toggle="modal" data-target="#LoginModal">Login </a>

                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" id="box-3" title="Become a Helper" href="ServiceProvider-Become-a-pro.php">Become a Helper </a>

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

    <?php   } ?>
    <?php if (isset($_SESSION['username'])) { ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
   
<script>
    $(document).ready(function(e){
        window.addEventListener('scroll', function (){ 
      if(($('.header-navigationbar .navbar').offset().top) >= 2){
    $('.header-navigationbar .navbar').removeClass('defnav');
    $('.mobile-nav .navbar').removeClass('defnav');
  }

  if(($('.header-navigationbar .navbar').offset().top) <= 2){
    $('.header-navigationbar .navbar').addClass('defnav');
    $('.mobile-nav .navbar').addClass('defnav');
  }
 else if(($('.mobile-nav .navbar').offset().top) <= 2){
    $('.header-navigationbar .navbar').addClass('defnav');
    $('.mobile-nav .navbar').addClass('defnav');
  }else{
    $('.header-navigationbar .navbar').removeClass('defnav');
    $('.mobile-nav .navbar').removeClass('defnav');

  }
  // navs.classList.addClass('scrolling-active');
       
  if(window.scrollY > 0){
    $('.header-navigationbar .navbar').removeClass('defnav');
    $('.mobile-nav .navbar').removeClass('defnav');

  }
});
    });
</script>
<?php if ($_SESSION['usertype'] == 0) { ?>
<style>
    .banner {
    padding-top: 180px;
  
}
.mobile-nav .navbar {
    height: 100px;
}
.defnav {
    z-index: 1;
    height: auto;
    background: none;
}
.header-navigationbar .navbar .navbar-nav .nav-item .nav-link:hover {
 
    background: none !important;
}
</style>
    <div class="header-navigationbar">
        <nav class="navbar navbar-expand-lg defnav fixed-top">
            <a class="navbar-brand" href="./index.php"><img src="assets/image/white-logo-transparent-background.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item booked">
                        <a class="nav-link booknow" href="BookService.php">Book now</a>
                    </li>
                    <li class="nav-item prices">
                        <a class="nav-link item1" href="./Price.php">Prices & services</a>
                    </li>
                    <li class="nav-item wbg">
                        <a class="nav-link warrenty" href="#">Warranty</a>
                        <a class="nav-link blog" href="#">Blog</a>
                        <a class="nav-link Contact" href="./Contact.php">Contact</a>
                    </li>
                    <li class="nav-item dropdown notification">
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

    <div class="mobile-nav ">

        <nav class="navbar navbar-expand-lg defnav fixed-top">
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
                    <li class="nav-item navrating">
                        <a href="#" class="nav-link ">
                            My Ratings
                        </a>
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

                    <li class="nav-item">
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
    <style>
    .banner {
    padding-top: 224px;
  
}
.mobile-nav .navbar {
    height: 100px;

}

.header-navigationbar .navbar .navbar-nav .nav-item .nav-link:hover {
 
 background: none !important;
}
.defnav {
    z-index: 1;
    height: 187px;
    background: none;
}
</style>
    <div class="header-navigationbar">
        <nav class="navbar navbar-expand-lg defnav fixed-top">
            <a class="navbar-brand" href="./index.php"><img src="assets/image/white-logo-transparent-background.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item prices">
                        <a class="nav-link item1" href="./Price.php">Prices & services</a>
                    </li>
                    <li class="nav-item wbg">
                        <a class="nav-link warrenty" href="#">Warranty</a>
                        <a class="nav-link blog" href="#">Blog</a>
                        <a class="nav-link Contact" href="./Contact.php">Contact</a>
                    </li>
                    <li class="nav-item dropdown notification">
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

    <div class="mobile-nav ">

        <nav class="navbar navbar-expand-lg defnav fixed-top">
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
                        <a href="./ServiceHistorySP.php" class="nav-link ">
                            Service History </a>
                    </li>
                    <li class="nav-item navserviceschedule">
                        <a href="./SPServiceSchedule.php" class="nav-link ">
                            Service Schedule
                        </a>
                    </li>
                    <li class="nav-item navfavourite">
                        <a href="./BlockCustomer.php" class="nav-link ">
                            Block Customer </a>
                    </li>
                    <li class="nav-item navinvoice">
                        <a href="#" class="nav-link ">
                            Invoices </a>
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
  
    
</header>