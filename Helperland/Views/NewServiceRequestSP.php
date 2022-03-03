<?php

include('header.php');
$emails = $_SESSION['username'];
$base_url = "http://localhost/helper/";
$url = "http://localhost/helper/";
// Session destroy and back button clicked
if (!isset($_SESSION['username'])) {
    header('Location:' . $url);
}


?>


<link rel="stylesheet" href="./assets/css/Customer-ServiceHistory.css?v=29">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="./assets/css/Customer-Dashboard.css?v=2220">
<link rel="stylesheet" href="./assets/css/SPnewservice.css">
<title>New Service Request</title>
</head>

<body>

    <div class="wrapper">
        <?php
        include('SPVerticalnav.php');
        ?>



        <table class="table table-hover responsive " id="SPdashboardtable" class="SPdashboard">
            <div class="table-caption row mb-4">
                Service Area <select>
                    <option>25 km</option>
                </select>

                <div class="form-check ml-3">
                    <input class="form-check-input " type="checkbox" value="" id="pets" >
                    <label class="form-check-label" for="pets">
                        Include Pet at Home
                    </label>
                </div>
            </div>
            <thead id="headings">
                <tr>
                    <th></th>
                    <th scope="col" title="Service Id" class="spserviceid">Service Id</th>
                    <th scope="col" title="Service Date" class="spdatecolm">Service Date</th>
                    <th scope="col" title="Customer Details" class="colname">Customer Details</th>
                    <th scope="col" title="Payment" class="colname">Payment</th>
                    <th scope="col" title="Time conflict" class="time-conflict">Time conflict</th>
                    <th scope="col" title="Actions">Actions</th>

                </tr>
            </thead>

            <tbody>
                <tr>
                    <td></td>
                    <td>3213123</td>
                    <td scope="row">
                        <div class="col date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</div>
                        <div class="col time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</div>
                    </td>
                    <td>
                        <div class="row addressp">
                            <div clas="col">David Bough </div>
                            <div class="col address"><img src="./assets/image/layer-719.png" class="home">Musterstrabe 5,12345 Bonn</div>
                        </div>
                    </td>
                    <td>
                        <div class="paymentbooked">
                            <span class="euro">€</span>63
                        </div>
                    </td>
                    <td>

                    </td>
                    <td>
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-6">
                                <button class="btn btn-primary">Accept</button>
                            </div>
                    </td>
                </tr>



            </tbody>
        </table>
        </section>

        <!-- Booking Details Modal -->
        <div class="modal fade" id="bookingdetails" tabindex="-1" role="dialog" aria-labelledby="bookingdetails" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">Service Details
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="float-right spdetails1 ">
                        </div>
                        <div class="custalldetails ">
                            <p class="datesandtimes"><span class="bookdate">25/11/2021</span> <span class="bookstarttime">08:00 </span> - <span class="bookendtime">11:00</span></p>
                            <p class="title-text totalrequiredtime"><b>Duration: </b> <span class="totalduration"> 3 </span> Hrs</p>
                            <hr class="reschedulehr">
                            <p class="title-text clientserviceid"><b>Service Id: </b> <span>12312</span></p>
                            <p class="title-text extraservices"><b>Extras: </b> <span>2312</span></p>
                            <div class="title-text paids"><b>Net Amount: </b>
                                <div class="payment bookpayment ml-2"> <span>12312</span> €</div>
                            </div>
                            <hr class="reschedulehr">

                            <p class="title-text customername"><b>Customer Name: </b> <span> Tatvasoft</span></p>
                            <p class="title-text serviceaddress"><b>Service Address: </b> <span>12312</span></p>
                            <p class="title-text phonenumber"><b>Distance: </b> <span>21.0 km</span></p>
                            <hr class="reschedulehr">

                            <p class="title-text commentsall"><b>Comments : </b> <span></span></p>

                            <div class="mt-2 mb-2 petornot">
                                <span><img src="./assets/Image/included.png"></span>I have pets at home
                                <span><img src="./assets/Image/not-included.png"></span> I have pets at home

                            </div>
                            <hr class="reschedulehr">
                            <div class="acceptbtn">
                                <button class="btn btn-accept" title="Accept Service Request">Accept</button>
                            </div>
                            <div class="float-right spdetails2 ">
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>


        <div id="iframeloading" style="    top: -8%;
    display: none;
    position: fixed;
    left: 0%;
    height: 100%;">
            <img src="./assets/Image/preloader.gif" alt="loading" />
        </div>

        <?php
        include('footer.php');
        ?>
      <script src="./assets/js/newservicespajax.js"></script>
      <?php
      include('./newservicespajax.php');?>


</body>