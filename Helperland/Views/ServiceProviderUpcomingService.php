<?php
include('header.php');
$emails = $_SESSION['username'];
$url = "http://localhost/helper/";
$base_url = "http://localhost/helper/";
// Session destroy and back button clicked  
if (!isset($_SESSION['username'])) {
  header('Location:' . $url);
}
?>
<link rel="stylesheet" href="./assets/css/ServiceProivderUpcomingService.css?v=101">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="./assets/css/Customer-Dashboard.css">
<title>Upcoming Service</title>
</head>

<?php
include('SPVerticalnav.php');
?>
<table class="table servicetable table-hover" id="servicetables">
  <thead id="headings">
    <tr>
      <th></th>
      <th scope="col" title="Service Id">Service ID </th>
      <th scope="col" title="Service date">Service date </th>
      <th scope="col" title="Customer details">Customer details </th>
      <th scope="col" title="Distance">Distance </th>
      <th scope="col" title="Actions">Actions </th>
    </tr>
  </thead>
  <tbody>
 
  </tbody>
</table>


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

<!-- Cancel Service Request -->
<div class="modal fade" id="cancelmodal" tabindex="-1" role="dialog" aria-labelledby="cancelmodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Cancel Service Request
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p>Why you want to cancel the service request?
        </p>
        <div class="form-textarea">
          <textarea class="form-control mb-3" id="cancelrequest" rows="3"></textarea>
        </div>
        <span class="cancelmodalbutton">

          <button type="submit" title="Cancel" class="btn  finalcancel">Cancel Now</button>
        </span>


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
<script src="./assets/js/Upcoming.js?v=21"></script>
<?php 
  include('./upcomingajax.php');
?>

</body>

</html>