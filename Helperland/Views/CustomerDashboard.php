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
<script>
    username = "<?php echo $_SESSION['username'] ?>";
</script>

<link rel="stylesheet" href="./assets/css/Customer-ServiceHistory.css?v=31">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

<link rel="stylesheet" href="./assets/css/Customer-Dashboard.css?v=2820">
<title>Customer Dashboard</title>

</head>

<body>

    <div class="wrapper">
        <?php
        include('CustomerVerticalnav.php');
        ?>

    </div>

    <table class="table table-hover responsive " id="dashboardtable" class="dashboard">
        <div class="table-caption row mb-4">
            <div class="col-sm-6">
                <h2 class=" heading2">Current Service Requests
                </h2>
            </div>
            <div class="col-sm-6">
                <a href="BookService.php">
                    <button class="btn   add-servicerequest" id="addservicerequest" title="Add New Service Request">Add New Service Request</button>
            </div>
            </a>
        </div>
        <thead id="headings">
            <tr>
                <th></th>
                <th scope="col" title="Service Id" class="serviceidcol">Service Id</th>
                <th scope="col" title="Service Date" class="servicedtcol">Service Date</th>
                <th scope="col" title="Service Provider" class="serviceprovidercol">Service Provider</th>
                <th scope="col" title="Payment" class="paymentcol">Payment</th>
                <th scope="col" title="Actions">Actions</th>

            </tr>
        </thead>

        <tbody>
            <tr>
                <td></td>
                <td class="serviceids"></td>
                <td scope="row" class="dtime">
                </td>
                <td class="service_provider_names" >
                </td>
                <td class="paymentblock">
                </td>
                <td class="actionblock">
                </td>
            </tr>



        </tbody>
    </table>
    <!-- <table id="dashboardcardview">
        <thead>
            <th></th>
        </thead>
        <tbody>

        </tbody>
    </table> -->
    </section>
    <!-- Reschedule Modal -->
    <div class="modal fade" id="rescheduletime" tabindex="-1" role="dialog" aria-labelledby="rescheduletime" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Reschedule Service Request
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="selectnewdates"></div>

                    <div class="form-row">

                        <div class="form-group selectdate col-md-6">
                            <span class="date_img"><img src="./assets/Image/admin-calendar-blue.png" class="datimg"></span> <input type="text" id="selectdate" class="form-control" value="" disabled /> <span class="street-msg"></span>
                        </div>
                        <div class="form-group col-md-6 selectyourtime">
                            <select id="selectime" class="selectime">
                                <option value="8">8:00 </option>
                                <option value="8.5">8:30 </option>
                                <option value="9">9:00 </option>
                                <option value="9.5">9:30 </option>
                                <option value="10">10:00</option>
                                <option value="10.5">10:30</option>
                                <option value="11">11:00</option>
                                <option value="11.5">11:30</option>
                                <option value="12">12:00</option>
                                <option value="12.5">12:30</option>
                                <option value="13">13:00</option>
                                <option value="13.5">13:30</option>
                                <option value="14">14:00</option>
                                <option value="14.5">14:30</option>
                                <option value="15">15:00</option>
                                <option value="15.5">15:30</option>
                                <option value="16">16:00</option>
                                <option value="16.5">16:30</option>
                                <option value="17">17:00</option>
                                <option value="17.5">17:30</option>
                                <option value="18">18:00</option>

                            </select>
                            <span class="timingerr text-danger"></span>

                        </div>


                    </div>

                    <span class="reschedulemodalbutton">
                        <button type="submit" title="Reschedule" class="btn save rescheduleconfirm" data-dismiss="modal">Update</button>
                    </span>

                </div>

            </div>
        </div>
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

                    <span class="reschedulebuttons">
                        <button type="submit" class="btn  rescheduleconfirms" title="Reschedule" data-toggle="modal" data-target="#rescheduletime" data-dismiss="modal"><img src="./assets/Image/reschedule-icon-small.png" class="mr-2">Reschedule</button>
                    </span>
                    <span class="cancelbuttons">
                        <button type="submit" class="btn  cancelconfirm" title="Cancel" data-toggle="modal" data-target="#cancelmodal" data-dismiss="modal"><img src="./assets/Image/close-white.png" style="    width: 15px;
                height: 15px;" class="mr-2">Cancel</button>

                    </span>


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
                        <textarea class="form-control mb-3" id="exampleFormControlTextarea1" rows="3"></textarea>
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
    <script src="./assets/js/Customer-ServiceHistory.js"></script>
    <script src="./assets/js/CustomerDashboard.js?v=993932"></script>
    <?php include('CustomerPageAjax.php');?>  
 

</body>