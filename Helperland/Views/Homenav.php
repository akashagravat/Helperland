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
        <div class="header-navigationbar">
            <nav class="navbar navbar-expand-lg fixed-top">
                <a class="navbar-brand"><img src="assets/image/white-logo-transparent-background.png"></a>
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
                                <a class="dropdown-item" href="#">User Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Setting</a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action=<?= $base_url."./?controller=helperland&function=Logout"?>>
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
                <a class="navbar-brand"><img src="assets/image/white-logo-transparent-background.png"></a>
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


                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link ">
                                Service History </a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link ">
                                Service Schedule
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                Favourite Pros </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                Invoices </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                My Ratings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                Notifications </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                My Setting </a>
                        </li>
                        <li class="nav-item">
                        <form method="POST" action=<?= $base_url."./?controller=helperland&function=Logout"?>>
                                    <button class="dropdown-item" name="logout" type="submit">Logout</button>
                        </form>
                        </li>
                        <li class="nav-item newnav">
                            <a href="#" class="nav-link ">
                                Book now
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                Prices & services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                Warranty </a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link ">
                                Blog </a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link ">
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
</header>