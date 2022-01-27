<?php

include('header.php');
$emails = $_SESSION['username'];
$base_url ="http://localhost/helper/" ;
$url = "http://localhost/helper/";
// Session destroy and back button clicked
if (!isset($_SESSION['username'])) {
    header('Location:' . $url);
}

?>

<link rel="stylesheet" href="./assets/css/Customer-ServiceHistory.css">
<title>Service History</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <?php include("navbar.php"); ?>
        </header>
        <main>
            <div class="container welcome">
                <h1 class="wlcm">Welcome, <span class="wlcm-nm"><?php echo  $_SESSION["firstname"]; ?></span></h1>
            </div>
        </main>

        <section class="usertable ">
            <!-- Vertical navbar -->
            <div class="contains">
                <nav class="vertical-nav  " id="sidebar">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContents" aria-controls="navbarSupportedContents" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContents">
                        <ul class=" nav flex-column  mb-0">
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
                                    Service Schedule </a>
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
                                    Notifications
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>

                <!-- Dummy Values(Service Hiistory) -->
                <table class="table table-hover" id="tblservicehistory">
                    <div class="table-caption mb-4">
                        <h2 class="col heading2">Service History
                            <button class="btn export-btn" id="btnExport">Export</button>
                        </h2>
                    </div>
                    <thead id="headings">
                        <tr>
                            <th scope="col">Service Details <img src="./assets/image/sort.png" class="sort"></th>
                            <th scope="col">Service Provider <img src="./assets/image/sort.png" class="sort"></th>
                            <th scope="col">Payment <img src="./assets/image/sort.png" class="sort"></th>
                            <th scope="col">Status <img src="./assets/image/sort.png" class="sort"></th>
                            <th scope="col">Rate SP </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">31/03/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">15/03/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">10/03/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">28/02/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">15/02/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">11/02/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">31/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">19/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">05/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">01/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">31/03/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">15/03/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">10/03/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">28/02/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">15/02/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">11/02/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">31/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">19/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">05/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">01/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">31/03/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">15/03/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">10/03/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">28/02/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">15/02/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">11/02/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">31/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">19/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">05/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">01/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">31/03/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">15/03/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">10/03/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">28/02/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">15/02/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">11/02/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">31/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">19/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">05/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">01/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">31/03/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">15/03/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">10/03/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">28/02/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">15/02/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">11/02/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">31/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">19/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn completed">Completed</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">05/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">01/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">01/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">01/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">01/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">01/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div scope="row">
                                    <div class="col calenders"><img src="./assets/image/calendar.png" class="calender">01/01/2018
                                    </div>
                                    <div class="col time">12:00 - 18:00</div>
                                </div>
                            </td>
                            <td>
                                <div class="row ">
                                    <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                    <div class="col ml-3">
                                        <div class="row service-provider">Lyum Watson</div>
                                        <div class="row star">


                                            <i class="fa fa-star s1"></i>
                                            <i class="fa fa-star s2"></i>
                                            <i class="fa fa-star s3"></i>
                                            <i class="fa fa-star s4"></i>
                                            <i class="fa fa-star s5"></i>
                                        </div>
                                        <span class="info"></span>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <span class="euro">€</span>63
                                </div>
                            </td>
                            <td>
                                <button class="btn cancelled">Cancelled</button>
                            </td>
                            <td>
                                <button class="btn ratesp">Rate Sp</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </section>
        <!-- Dummy Values(Service Hiistory) -->
        <section class="table-view-card table-card">
            <div class="card table-card mt-4">
                <div class="card-body">
                    <table class="cardview" id="cardview">

                        <tbody>

                            <tr class="calender-time">
                                <td class="card-title row calenders"><img src="./assets/image/calendar.png" class="calender">31/03/2018 </td>
                                <td class="card-title row time">12:00 - 18:00</td>
                            </tr>
                            <tr class="card-title row servicepeovider">

                                <td class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></td>
                                <td class="col ml-3">
                                    <div class="row service-provider">Lyum Watson</div>
                                    <div class="row star">


                                        <i class="fa fa-star s1"></i>
                                        <i class="fa fa-star s2"></i>
                                        <i class="fa fa-star s3"></i>
                                        <i class="fa fa-star s4"></i>
                                        <i class="fa fa-star s5"></i>
                                    </div>
                                    <span class="info"></span>


                                </td>
                            </tr>
                            <tr class="card-title row payments">
                                <td class="card-title col payment">
                                    <span class="euro">€</span>63
                                </td>
                            </tr>
                            <tr>
                                <td class="card-title row statuss">
                                    <button class="btn completed">Completed</button>

                                </td>
                            </tr>
                            <tr>
                                <td class="card-title rateserviceprovider"> <button class="btn ratesp">Rate Sp</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card table-card mt-4">
                <div class="card-body">
                    <table class="cardview" id="cardview">

                        <tbody>

                            <tr class="calender-time">
                                <td class="card-title row calenders"><img src="./assets/image/calendar.png" class="calender">15/03/2018 </td>
                                <td class="card-title row time">12:00 - 18:00</td>
                            </tr>
                            <tr class="card-title row servicepeovider">

                                <td class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></td>
                                <td class="col ml-3">
                                    <div class="row service-provider">Lyum Watson</div>
                                    <div class="row star">


                                        <i class="fa fa-star s1"></i>
                                        <i class="fa fa-star s2"></i>
                                        <i class="fa fa-star s3"></i>
                                        <i class="fa fa-star s4"></i>
                                        <i class="fa fa-star s5"></i>
                                    </div>
                                    <span class="info"></span>


                                </td>
                            </tr>
                            <tr class="card-title row payments">
                                <td class="card-title col payment">
                                    <span class="euro">€</span>63
                                </td>
                            </tr>
                            <tr>
                                <td class="card-title row statuss">
                                    <button class="btn completed">Completed</button>

                                </td>
                            </tr>
                            <tr>
                                <td class="card-title rateserviceprovider"> <button class="btn ratesp">Rate Sp</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="card table-card mt-4">
                <div class="card-body">
                    <table class="cardview" id="cardview">

                        <tbody>

                            <tr class="calender-time">
                                <td class="card-title row calenders"><img src="./assets/image/calendar.png" class="calender">10/03/2018 </td>
                                <td class="card-title row time">12:00 - 18:00</td>
                            </tr>
                            <tr class="card-title row servicepeovider">

                                <td class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></td>
                                <td class="col ml-3">
                                    <div class="row service-provider">Lyum Watson</div>
                                    <div class="row star">


                                        <i class="fa fa-star s1"></i>
                                        <i class="fa fa-star s2"></i>
                                        <i class="fa fa-star s3"></i>
                                        <i class="fa fa-star s4"></i>
                                        <i class="fa fa-star s5"></i>
                                    </div>
                                    <span class="info"></span>


                                </td>
                            </tr>
                            <tr class="card-title row payments">
                                <td class="card-title col payment">
                                    <span class="euro">€</span>63
                                </td>
                            </tr>
                            <tr>
                                <td class="card-title row statuss">
                                    <button class="btn completed">Completed</button>


                                </td>
                            </tr>
                            <tr>
                                <td class="card-title rateserviceprovider"> <button class="btn ratesp">Rate Sp</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card table-card mt-4">
                <div class="card-body">
                    <table class="cardview" id="cardview">

                        <tbody>

                            <tr class="calender-time">
                                <td class="card-title row calenders"><img src="./assets/image/calendar.png" class="calender">28/02/2018 </td>
                                <td class="card-title row time">12:00 - 18:00</td>
                            </tr>
                            <tr class="card-title row servicepeovider">

                                <td class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></td>
                                <td class="col ml-3">
                                    <div class="row service-provider">Lyum Watson</div>
                                    <div class="row star">


                                        <i class="fa fa-star s1"></i>
                                        <i class="fa fa-star s2"></i>
                                        <i class="fa fa-star s3"></i>
                                        <i class="fa fa-star s4"></i>
                                        <i class="fa fa-star s5"></i>
                                    </div>
                                    <span class="info"></span>


                                </td>
                            </tr>
                            <tr class="card-title row payments">
                                <td class="card-title col payment">
                                    <span class="euro">€</span>63
                                </td>
                            </tr>
                            <tr>
                                <td class="card-title row statuss"> <button class="btn cancelled">Cancelled</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="card-title rateserviceprovider"> <button class="btn ratesp">Rate Sp</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card table-card mt-4">
                <div class="card-body">
                    <table class="cardview" id="cardview">

                        <tbody>

                            <tr class="calender-time">
                                <td class="card-title row calenders"><img src="./assets/image/calendar.png" class="calender">15/02/2018 </td>
                                <td class="card-title row time">12:00 - 18:00</td>
                            </tr>
                            <tr class="card-title row servicepeovider">

                                <td class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></td>
                                <td class="col ml-3">
                                    <div class="row service-provider">Lyum Watson</div>
                                    <div class="row star">


                                        <i class="fa fa-star s1"></i>
                                        <i class="fa fa-star s2"></i>
                                        <i class="fa fa-star s3"></i>
                                        <i class="fa fa-star s4"></i>
                                        <i class="fa fa-star s5"></i>
                                    </div>
                                    <span class="info"></span>


                                </td>
                            </tr>
                            <tr class="card-title row payments">
                                <td class="card-title col payment">
                                    <span class="euro">€</span>63
                                </td>
                            </tr>
                            <tr>
                                <td class="card-title row statuss">
                                    <button class="btn completed">Completed</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="card-title rateserviceprovider"> <button class="btn ratesp">Rate Sp</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card table-card mt-4">
                <div class="card-body">
                    <table class="cardview" id="cardview">

                        <tbody>

                            <tr class="calender-time">
                                <td class="card-title row calenders"><img src="./assets/image/calendar.png" class="calender">11/02/2018 </td>
                                <td class="card-title row time">12:00 - 18:00</td>
                            </tr>
                            <tr class="card-title row servicepeovider">

                                <td class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></td>
                                <td class="col ml-3">
                                    <div class="row service-provider">Lyum Watson</div>
                                    <div class="row star">


                                        <i class="fa fa-star s1"></i>
                                        <i class="fa fa-star s2"></i>
                                        <i class="fa fa-star s3"></i>
                                        <i class="fa fa-star s4"></i>
                                        <i class="fa fa-star s5"></i>
                                    </div>
                                    <span class="info"></span>


                                </td>
                            </tr>
                            <tr class="card-title row payments">
                                <td class="card-title col payment">
                                    <span class="euro">€</span>63
                                </td>
                            </tr>
                            <tr>
                                <td class="card-title row statuss"> <button class="btn cancelled">Cancelled</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="card-title rateserviceprovider"> <button class="btn ratesp">Rate Sp</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card table-card mt-4">
                <div class="card-body">
                    <table class="cardview" id="cardview">

                        <tbody>

                            <tr class="calender-time">
                                <td class="card-title row calenders"><img src="./assets/image/calendar.png" class="calender">31/01/2018 </td>
                                <td class="card-title row time">12:00 - 18:00</td>
                            </tr>
                            <tr class="card-title row servicepeovider">

                                <td class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></td>
                                <td class="col ml-3">
                                    <div class="row service-provider">Lyum Watson</div>
                                    <div class="row star">


                                        <i class="fa fa-star s1"></i>
                                        <i class="fa fa-star s2"></i>
                                        <i class="fa fa-star s3"></i>
                                        <i class="fa fa-star s4"></i>
                                        <i class="fa fa-star s5"></i>
                                    </div>
                                    <span class="info"></span>


                                </td>
                            </tr>
                            <tr class="card-title row payments">
                                <td class="card-title col payment">
                                    <span class="euro">€</span>63
                                </td>
                            </tr>
                            <tr>
                                <td class="card-title row statuss">
                                    <button class="btn completed">Completed</button>

                                </td>
                            </tr>
                            <tr>
                                <td class="card-title rateserviceprovider"> <button class="btn ratesp">Rate Sp</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card table-card mt-4">
                <div class="card-body">
                    <table class="cardview" id="cardview">

                        <tbody>

                            <tr class="calender-time">
                                <td class="card-title row calenders"><img src="./assets/image/calendar.png" class="calender">19/01/2018 </td>
                                <td class="card-title row time">12:00 - 18:00</td>
                            </tr>
                            <tr class="card-title row servicepeovider">

                                <td class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></td>
                                <td class="col ml-3">
                                    <div class="row service-provider">Lyum Watson</div>
                                    <div class="row star">


                                        <i class="fa fa-star s1"></i>
                                        <i class="fa fa-star s2"></i>
                                        <i class="fa fa-star s3"></i>
                                        <i class="fa fa-star s4"></i>
                                        <i class="fa fa-star s5"></i>
                                    </div>
                                    <span class="info"></span>


                                </td>
                            </tr>
                            <tr class="card-title row payments">
                                <td class="card-title col payment">
                                    <span class="euro">€</span>63
                                </td>
                            </tr>
                            <tr>
                                <td class="card-title row statuss">
                                    <button class="btn completed">Completed</button>

                                </td>
                            </tr>
                            <tr>
                                <td class="card-title rateserviceprovider"> <button class="btn ratesp">Rate Sp</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card table-card mt-4">
                <div class="card-body">
                    <table class="cardview " id="cardview">

                        <tbody>

                            <tr class="calender-time">
                                <td class="card-title row calenders"><img src="./assets/image/calendar.png" class="calender">05/01/2018 </td>
                                <td class="card-title row time">12:00 - 18:00</td>
                            </tr>
                            <tr class="card-title row servicepeovider">

                                <td class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></td>
                                <td class="col ml-3">
                                    <div class="row service-provider">Lyum Watson</div>
                                    <div class="row star">


                                        <i class="fa fa-star s1"></i>
                                        <i class="fa fa-star s2"></i>
                                        <i class="fa fa-star s3"></i>
                                        <i class="fa fa-star s4"></i>
                                        <i class="fa fa-star s5"></i>
                                    </div>
                                    <span class="info"></span>


                                </td>
                            </tr>
                            <tr class="card-title row payments">
                                <td class="card-title col payment">
                                    <span class="euro">€</span>63
                                </td>
                            </tr>
                            <tr>
                                <td class="card-title row statuss"> <button class="btn cancelled">Cancelled</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="card-title rateserviceprovider"> <button class="btn ratesp">Rate Sp</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card table-card mt-4">
                <div class="card-body">
                    <table class="cardview" id="cardview">

                        <tbody>

                            <tr class="calender-time">
                                <td class="card-title row calenders"><img src="./assets/image/calendar.png" class="calender">01/01/2018 </td>
                                <td class="card-title row time">12:00 - 18:00</td>
                            </tr>
                            <tr class="card-title row servicepeovider">

                                <td class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></td>
                                <td class="col ml-3">
                                    <div class="row service-provider">Lyum Watson</div>
                                    <div class="row star">


                                        <i class="fa fa-star s1"></i>
                                        <i class="fa fa-star s2"></i>
                                        <i class="fa fa-star s3"></i>
                                        <i class="fa fa-star s4"></i>
                                        <i class="fa fa-star s5"></i>
                                    </div>
                                    <span class="info"></span>


                                </td>
                            </tr>
                            <tr class="card-title row payments">
                                <td class="card-title col payment">
                                    <span class="euro">€</span>63
                                </td>
                            </tr>
                            <tr>
                                <td class="card-title row statuss"> <button class="btn cancelled">Cancelled</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="card-title rateserviceprovider"> <button class="btn ratesp">Rate Sp</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="selects">
                <p>shows
                    <select>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>

                    </select>
                    entries
                    <span>Total Records:55</span>
                </p>
            </div>
            <ul id="pagination-demo" class="pagination-sm"></ul>
        </section>
    </div>

    <?php
    include('footer.php');
    ?>
    <script src="./assets/js/Customer-ServiceHistory.js"></script>


</body>

</html>