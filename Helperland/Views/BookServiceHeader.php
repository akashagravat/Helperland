<?php
$base_url = "http://localhost/helper/";

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/validation.css">


    <?php
    if (!isset($_SESSION)) {

        session_start();
    }
    if (!isset($_SESSION['username'])) { ?>
        <link rel="stylesheet" href="./assets/css/navbar.css">
    <?php  } ?>
    <?php if (isset($_SESSION['username'])) { ?>
        <link rel="stylesheet" href="./assets/css/loginnav.css?v=24">
    <?php
    } ?>

    <link rel="stylesheet" href="./assets/css/Bookservices.css?v=15121">

    <title>Book Service</title>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>

    <script>
        function CheckSP() {


            $('.selectsp').click(function() {
                $('.selectsp').text("Selected");
                $('.selectsp').addClass('selectedsp');
                $('.selectedsp').css({
                    "background": "#1d7a8c",
                    "border": "none",
                    "color": "#fff",
                });
                $('.selectedsp').removeClass('selectsp');
            });
            $('.selectedsp').click(function() {
                $('.selectedsp').text("Select");
                $('.selectedsp').addClass('selectsp');
                $('.selectsp').css({
                    "color": "#4F4F4F",
                    "border": "1px solid #4F4F4F",
                    "background-color": "#FFFFFF",
                });
                $('.selectsp').removeClass('selectedsp');
            });
        }

        function AddRadio() {

            $('input:radio').change(function() { //Clicking input radio
                var radioClicked = $(this).attr('id');
                unclickRadio();
                removeActive();
                clickRadio(radioClicked);
                makeActive(radioClicked);
            });
            $(".addresses").click(function(e) { //Clicking the card
                e.preventDefault();
                var inputElement = $(this).find('input[type=radio]').attr('id');
                unclickRadio();
                removeActive();
                makeActive(inputElement);
                clickRadio(inputElement);
            });


        }


        function unclickRadio() {
            $("input:radio").prop("checked", false);
        }

        function clickRadio(inputElement) {
            $("#" + inputElement).prop("checked", true);
        }

        function removeActive() {
            $(".addresses").removeClass("active");
        }

        function makeActive(element) {
            $("#" + element + "-card").addClass("active");
        }
    </script>

</head>

<body>

    <header>

        <?php

        $base_url = "http://localhost/helper/";

        if (!isset($_SESSION['username'])) { ?>
            <nav class="navbar  navbar-expand-lg fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="./index.php"><img src="assets/Image/white-logo-transparent-background.png" class="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  w-100 justify-content-end">
                            <li class="nav-item  booknow">
                                <a class="nav-link book-now" title="Book Service" href="BookService.php">Book Now</a>
                            </li>
                            <li class="nav-item ps">
                                <a class="nav-link ps1" title="Price" href="./Price.php">Prices & services</a>
                            </li>
                            <li class="nav-item wbg">
                                <a class="nav-link warrenty" title="Warrenty" href="#">Warranty</a>
                                <a class="nav-link blog" title="Blog" href="#">Blog</a>
                                <a class="nav-link Contact" title="Contact" href="./Contact.php">Contact</a>
                            </li>
                            <li class="nav-item  login">
                                <a class="nav-link log-in" href='#' title="Login" data-toggle="modal" data-target="#LoginModal">Login</a>
                            </li>
                            <li class="nav-item  helper">
                                <a class="nav-link helper1" title="Become a Service Provider" href="./ServiceProvider-Become-a-pro.php">Become a Helper</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        <?php } ?>


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
                                    <a class="dropdown-item disabled">Welcome<div style="font-weight: bold;">
                                            <?php echo $_SESSION["firstname"]; ?>
                                        </div></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">My Dashboard</a>
                                    <a class="dropdown-item" href="#">My Settings</a>
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
                                <form method="POST" action=<?= $base_url . "./?controller=helperland&function=Logout" ?>>
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


        <img src="./assets/Image/book-service-banner.jpg" class="img-fluid book-service-banners" alt="Responsive image">

    </header>