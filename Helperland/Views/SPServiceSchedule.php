<?php

include('header.php');
$emails = $_SESSION['username'];
$base_url = "http://localhost/helper/";
$url = "http://localhost/helper/";
if (!isset($_SESSION['username'])) {
    header('Location:' . $url);
}
?>
<link rel="stylesheet" href="./assets/css/Customer-ServiceHistory.css?v=321">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css">
<link rel="stylesheet" href="./assets/css/Customer-Dashboard.css?v=21">
<link rel="stylesheet" href="./assets/css/ServiceProivderUpcomingService.css?v=99">
<link rel="stylesheet" href="./assets/css/SPServiceHistory.css">
<link rel="stylesheet" href="./assets/css/ServiceSchedule.css">

<title>Service Schdeule</title>
</head>


<?php
include('SPVerticalnav.php');
?>
<div class="servicechedule" id="calendar">

</div>
<button class="launch" data-toggle="modal" data-target="#bookingdetails" style="display:none"></button>
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
                    <p class="title-text phonenumber"><b>Distance: </b> <span>12.0 km</span></p>
                    <hr class="reschedulehr">

                    <p class="title-text commentsall"><b>Comments : </b> <span></span></p>

                    <div class="mt-2 mb-2 petornot">
                        <span><img src="./assets/Image/included.png"></span>I have pets at home
                        <span><img src="./assets/Image/not-included.png"></span> I have pets at home

                    </div>
                    <hr class="reschedulehr">
                    <div class="buttonall"></div>
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
</section>

<?php
include('footer.php');

include('./SPServicescheduleajax.php');
?>

</body>