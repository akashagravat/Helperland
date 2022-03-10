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

<link rel="stylesheet" href="./assets/css/Customer-ServiceHistory.css?v=2182">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

<link rel="stylesheet" href="./assets/css/Customer-Dashboard.css?v=91">

<title>Service History</title>

</head>

<body>
    <div class="wrapper">
        <?php
        include('CustomerVerticalnav.php');
        ?>
        <table class="table table-hover" id="tblservicehistory">
            <div class="table-caption row mb-4">
                <div class="col-sm-6">
                    <h2 class=" heading2">Service History
                    </h2>
                </div>
                <div class="col-sm-6">
                    <button class="btn export-btn" id="btnExport" title="Export">Export</button>
                </div>
            </div>
            <thead id="headings">
                <tr>
                    <th></th>
                    <th scope="col" class="serviceid">Service Id </th>
                    <th scope="col" class="dtimecol">Service Details </th>
                    <th scope="col" class="service_provider_namescol">Service Provider </th>
                    <th scope="col" class="paymentparts">Payment </th>
                    <th scope="col" class="statuscol">Status </th>
                    <th scope="col" class="ratesps">Rate SP </th>
                </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>

    </div>

    </section>

    </div>
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

                    <p class="title-text serviceaddress"><b>Service Address: </b> <span>12312</span></p>
                    <p class="title-text billingaddress"><b>Billing Address: </b> <span> 12312</span></p>
                    <p class="title-text phonenumber"><b>Phone: </b> +49 <span class="mobilenumber"> 9988556644 </span></p>
                    <p class="title-text clientemail"><b>Email: </b> <span> 12312</span></p>
                    <hr class="reschedulehr">

                    <p class="title-text commentsall"><b>Comments : </b> <span></span></p>

                    <div class="mt-2 mb-2 petornot">
                        <span><img src="./assets/Image/included.png"></span>I have pets at home
                        <span><img src="./assets/Image/not-included.png"></span> I have pets at home

                    </div>

                    <hr class="reschedulehr">
                    <div class="float-right spdetails2 ">
                        </div>

                </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Rate SP Modal -->
    <div class="modal fade" id="RateSP" tabindex="-1" role="dialog" aria-labelledby="RateSP" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title" id="models">
                        <div class="spalldetails">
                            <div class="row ml-1">
                                <div class="col service-provider-imgs"><img src="./assets/image/forma-1-copy-19.png" class="service-provider-img"></div>
                                <div class="col ml-3">
                                    <div class="row service-provider" style="width: 200px;">Tatvasoft Customer</div>
                                    <div class="row star">


                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span class="info"></span>


                                </div>

                            </div>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <h4 class="rateservicepro">
                            Rate Your Service Provider
                        </h4>
                        <hr class="reschedulehr">

                        <div class="ontimearrival starratings ratingfortimearrival row ml-1">
                            <p class="mr-2 ratingtxt">On Time Arrival</p>

                            <span class="ratings1s ">
                                <i class="fa fa-star" id="ratings1"></i>
                                <i class="fa fa-star " id="ratings2"></i>
                                <i class="fa fa-star " id="ratings3"></i>
                                <i class="fa fa-star " id="ratings4"></i>
                                <i class="fa fa-star " id="ratings5"></i>
                                <span class="infomsg"></span>
                            </span>
                        </div>

                        <div class="ontimearrival starratings ratingforfriendly row ml-1">
                            <p class="mr-2 ratingtxt">Friendly</p>

                            <span class="ratings2 ">
                                <i class="fa fa-star " id="friendly1"></i>
                                <i class="fa fa-star " id="friendly2"></i>
                                <i class="fa fa-star " id="friendly3"></i>
                                <i class="fa fa-star " id="friendly4"></i>
                                <i class="fa fa-star " id="friendly5"></i>
                                <span class="friendlymsg"></span>
                            </span>
                        </div>

                        <div class="ontimearrival starratings ratingforquality row ml-1">
                            <p class="mr-2 ratingtxt">Quality Of Service</p>

                            <span class="ratings3 ">
                                <i class="fa fa-star " id="quality1"></i>
                                <i class="fa fa-star " id="quality2"></i>
                                <i class="fa fa-star " id="quality3"></i>
                                <i class="fa fa-star " id="quality4"></i>
                                <i class="fa fa-star " id="quality5"></i>
                                <span class="qualitymsg"></span>

                            </span>
                        </div>

                        <div class="form-group givefeedback">
                            <label for="feedbackcomment">Comments</label>
                            <textarea class="form-control" id="feedbackcomment" rows="2"></textarea>
                        </div>

                        <button type="submit" class="btn giveratting" data-dismiss="modal">Submit</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php
    include('footer.php');
    ?>
    <script src="./assets/js/Customer-ServiceHistory.js?v=123211"></script>
    <?php include('CustomerPageAjax.php');?>  
</body>

</html>