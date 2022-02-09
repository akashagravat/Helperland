<?php
include('BookServiceHeader.php');
?>


<form method="POST">

    <section class="all-contents">
        <h1 class="h1 text-center">Set up your cleaning service</h1>
        <div class="container">
            <div class="sepimg">
                <img src="./assets/Image/separator.png" class="sepretor">

            </div>
        </div>

        <!-- All Services -->
        <div class="setup-paymemt-service">
            <div class="setup-service">
                <ul class="nav nav-tabs" id="bookTab" role="tablist">
                    <li class="nav-item setup-services firsttab">
                        <a class="nav-link  " id="Setup-Serviceq" data-toggle="tab" title="Setup Service" href="#Setup-Service" role="tab" aria-controls="Setup-Service" aria-selected="true">
                            <img class="mr-2 setupimgs" src="./assets/image/setup-service.png">
                            <img class="actives setupimg mr-2" src="./assets/image/setup-service-white.png"><span>Setup
                                Service</span></a>
                    </li>
                    <li class="nav-item schedule secondtab">
                        <a class="nav-link scheduleplan " title="Schedule & Plan" id="Schedule-Plans" data-toggle="tab" href="#Schedule-Plan" role="tab" aria-controls="Schedule-Plan" aria-selected="false"><img class="mr-2 schedules" src="./assets/image/schedule.png">
                            <img class="actives schedule mr-2" src="./assets/image/schedule-white.png"><span>Schedule &
                                Plan</span></a>

                    </li>
                    <li class="nav-item servicedetails thirdtab">
                        <a class="nav-link  " id="Your-Detailse" data-toggle="tab" title="Your Details" href="#Your-Details" role="tab" aria-controls="Your-Details" aria-selected="false">
                            <img class="mr-2 detailq" src="./assets/image/details.png">
                            <img class="actives detailqs mr-2" src="./assets/image/details-white.png"><span>Your
                                Details</span></a>
                    </li>
                    <li class="nav-item paymentdetails fourthtab">
                        <a class="nav-link " id="Make-Paymentq" data-toggle="tab" title="Make Payment" href="#Make-Payment" role="tab" aria-controls="Make-Payment" aria-selected="false"><img class="mr-2 payments-card" src="./assets/image/payment.png">
                            <img class="actives payment-card mr-2" src="./assets/image/payment-white.png"><span>Make
                                Payment</span></a>
                    </li>
                </ul>
                <div class="tab-content" id="bookTabContent">
                    <div class="tab-pane fade firsttabs" id="Setup-Service" role="tabpanel" aria-labelledby="Setup-Serviceq">
                        <label class="selects">Enter Your Postal Code</label>
                        <div class="checkpostal">
                            <input type="number" class="form-control postalcode" id="postalcode" placeholder="Postal Code" maxlength="6" min="0" max="6">

                            <button type="button" class="btn btn-checkavailability">Check Availability</button>
                            <span id="postal_number" class="text-danger"></span>
                        </div>

                    </div>
                    <div class="tab-pane fade  secondtabs" id="Schedule-Plan" role="tabpanel" aria-labelledby="Schedule-Plans">
                        <div class="scheduledetail">
                            <div class="select-bad-bath">
                                <label class="selects">Select number of rooms and bath</label>
                                <select id='selectbed' class="selectbed form-control">
                                    <option value='1'>1 bed</option>
                                    <option value='2'>2 bed</option>
                                    <option value='3'>3 bed</option>
                                    <option value='4'>4 bed</option>
                                    <option value='5'>5 bed</option>
                                    <option value='6'>6 bed</option>
                                    <option value='7'>7 bed</option>
                                </select>
                                <select id='selectbath' class="selectbath form-control">
                                    <option value='1'>1 bath</option>
                                    <option value='2'>2 bath</option>
                                    <option value='3'>3 bath</option>
                                    <option value='4'>4 bath</option>
                                    <option value='5'>5 bath</option>
                                    <option value='6'>6 bath</option>
                                    <option value='7'>7 bath</option>
                                </select>
                            </div>
                            <div class="selectsalldatetime">
                                <div class="select-time">
                                    <label class="when-need">When do you need the cleaner?</label>
                                    <div class="form-group selectdate">
                                        <span class="date_img"><img src="./assets/Image/admin-calendar-blue.png" class="datimg"></span> <input type="text" id="selectdate" class="form-control" disabled />
                                        <select id='selectime' class="selectime">
                                            <option value='8'>8:00 </option>
                                            <option value='8.5'>8:30 </option>
                                            <option value='9'>9:00 </option>
                                            <option value='9.5'>9:30 </option>
                                            <option value='10'>10:00</option>
                                            <option value='10.5'>10:30</option>
                                            <option value='11'>11:00</option>
                                            <option value='11.5'>11:30</option>
                                            <option value='12'>12:00</option>
                                            <option value='12.5'>12:30</option>
                                            <option value='13'>13:00</option>
                                            <option value='13.5'>13:30</option>
                                            <option value='14'>14:00</option>
                                            <option value='14.5'>14:30</option>
                                            <option value='15'>15:00</option>
                                            <option value='15.5'>15:30</option>
                                            <option value='16'>16:00</option>
                                            <option value='16.5'>16:30</option>
                                            <option value='17'>17:00</option>
                                            <option value='17.5'>17:30</option>
                                            <option value='18'>18:00</option>

                                        </select>

                                    </div>
                                    <span class="timingerr text-danger"></span>

                                </div>
                                <div class="select-hour">
                                    <label class="when-need">How long do you need your cleaner to stay?</label>
                                    <select id='selecthour' class="selecthour " name="selecthour">
                                        <option value='3'>3.0 Hrs</option>
                                        <option value='3.5'>3.5 Hrs</option>
                                        <option value='4'>4.0 Hrs</option>
                                        <option value='4.5'>4.5 Hrs</option>
                                        <option value='5'>5.0 Hrs</option>
                                        <option value='5.5'>5.5 Hrs</option>
                                        <option value='6'>6.0 Hrs</option>
                                        <option value='6.5'>6.5 Hrs</option>
                                        <option value='5'>7.0 Hrs</option>
                                        <option value='7.5'>7.5 Hrs</option>
                                        <option value='8'>8.0 Hrs</option>
                                        <option value='8.5'>8.5 Hrs</option>
                                        <option value='9'>9.0 Hrs</option>
                                        <option value='9.5'>9.5 Hrs</option>
                                        <option value='10'>10.0 Hrs</option>
                                        <option value='10.5'>10.5 Hrs</option>
                                        <option value='11'>11.0 Hrs</option>

                                    </select>
                                </div>
                                <div id="log"></div>

                            </div>
                            <div class="extra-service">
                                <label class="label-extra">Extra Services</label>
                                <div class="extra-all-service">
                                    <div class="row ">
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                            <div class="all-services first">

                                                <img class="firsstservice serviceimages" id="firstservice" src="./assets/image/3.png">

                                            </div>
                                            <p class="heading-service firsttext">Inside cabinets</p>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                            <div class="all-services second">

                                                <img class="secondservice serviceimages" id="secondimg" src="./assets/image/5.png">
                                            </div>
                                            <p class="heading-service">Inside fridge</p>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                            <div class="all-services third">

                                                <img class="thirdservice serviceimages" id="thirdimg" src="./assets/image/4.png">
                                            </div>
                                            <p class="heading-service">Inside oven</p>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                            <div class="all-services fourth">

                                                <img class="fourthservice serviceimages" id="fourthimg" src="./assets/image/2.png">
                                            </div>
                                            <p class="heading-service laundry">Laundry wash & dry</p>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                            <div class="all-services fifth">

                                                <img class="fifthservice serviceimages" id="fifthimg" src="./assets/image/1.png">
                                            </div>
                                            <p class="heading-service">Interior windows</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comments">
                                <label class="comment-label">Comments</label>
                                <textarea class="form-control comment" id="comments"></textarea>
                                <div class="form-check comment-check">
                                    <input class="form-check-input checked" type="checkbox" value="" id="petsornot">
                                    <label class="form-check-label comment_label" for="petsornot">
                                        I have pets at home
                                    </label>
                                </div>

                            </div>

                            <button type="button" class="btn continuebtn scheduleandplan">Continue</button>
                        </div>

                    </div>
                    <div class="tab-pane fade thirdtabs" id="Your-Details" role="tabpanel" aria-labelledby="Your-Detailse">
                        <label class="row selects">Please enter your contact so we can serve you in better way!
                        </label>
                        <p class="text-danger addresserror" style="font-size:20px"></p>
                        <div id="alladdress">

                        </div>
                        <div class="row">
                            <button type="button" id="add-addresses" class="btn add-address"> + Add New
                                Address</button>
                        </div>
                        <!-- Add Address -->
                        <div class="add_address" id="add_address">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="street">Street</label>
                                    <input type="text" class="form-control" id="street" placeholder="Street">
                                    <span class="street-msg"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="houseno">House number</label>
                                    <input type="number" class="form-control" id="houseno" placeholder="House number">
                                    <span class="house-msg"></span>

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group pin col-md-6">
                                    <label class="pincode">Pincode</label>
                                    <input type="number" class="form-control" id="pincode" value="532225" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="location">Location</label>
                                    <select id="location" class="located form-control">
                                    </select>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone Number</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+49</div>
                                        </div>
                                        <input type="tel" class="form-control" id="mobilenum" placeholder="Mobile number" maxlength="10" size="10">
                                    </div>
                                    <span class="mobile-msg"></span>
                                </div>
                            </div>


                            <button type="submit" class="btn save addresssave">Save</button>
                            <button type="button" id="discard" class="btn discard">Discard</button>

                        </div>
                        <div class="service-provider">
                            <label class="row selects your-favourite-service-ptovider">Your Favourite Service
                                Provider</label>
                            <p class="row choose-service-provider">You can choose your favourite service
                                provider
                                from the below list</p>

                            <div class="row favouriteserviceprovider">

                            </div>
                        </div>
                        <button class="btn continuebtn yourdetailsbtn" type="button">Continue</button>


                    </div>
                    <div class="tab-pane fade fourthtabs" id="Make-Payment" role="tabpanel" aria-labelledby="Make-Paymentq">
                        <label class="selects">Pay Securely With Helperland Payment gateway!</label>
                        <label>Promo code (optional)</label>
                        <div class="row promocodes">
                            <div class="col-md-6">
                                <input type="text" class="form-control promocode" placeholder="Promo code (optional)">
                                <span class="promoerr text-danger"></span>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn apply addpromocode">Apply</button>
                            </div>
                        </div>
                        <div class="border-card">
                            <div class="row cardpay">
                                <div class="col-md-6">
                                    <input type="text" name="creditcardno" class="form-control payment-cardno" placeholder="Card number" required size="19" id="cr_no" maxlength="19">
                                    <i class="fa fa-credit-card credit-card"></i>
                                    <img src="./assets/image/Visa.png " class="visa_card credit-card" style="width: 30px;height: 30px;display:none">
                                    <img src="./assets/image/mastercard.png " class="master_card credit-card" style="width: 30px;height: 30px;display:none">
                                    <img src="./assets/image/american -express.png" class="american_card credit-card" style="width: 30px;height: 30px;display:none">
                                    <span class="validcardno"></span>
                                </div>
                                <div class="col-md-3 col-sm-6 col-6">
                                    <input type="text" id="exp" name="expirydt" class="form-control dates" size="6" maxlength="5" placeholder="MM/YY" required />
                                    <span class="validcardate"></span>
                                </div>
                                <div class="col-md-3 col-sm-6 col-6">
                                    <input type="password" name="cvv" class="form-control cvv" placeholder="CVC" max="3" maxlength="3" required>
                                    <span class="validcardcvv"></span>
                                </div>
                            </div>
                            <div class="row float-right accepted-cards">
                                <div class="col-sm-12 col-12 accepted-card">
                                    <p class="col text-center">Accepted Cards</p>
                                    <div class="row cards-all">
                                        <div class="col-3">
                                            <img src="./assets/image/Visa.png" class="credit-cards-visa">
                                        </div>
                                        <div class="col-3">
                                            <img src="./assets/image/mastercard.png" class="credit-cards-master">

                                        </div>
                                        <div class="col-3">
                                            <img src="./assets/image/american -express.png " class="credit-cards-ae">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="final-submits">
                            <span class="checkboxerr text-danger"></span>
                            <div class="form-check accept-aggrement">
                                <input class="form-check-input checkboxs" type="checkbox" value="" id="Termsandconditions" id="checkbox">
                                <p class="form-check-label " for="Termsandconditions">
                                    I accepted <span><a href="#">term and conditions</a>,</span>the <span><a href="#">cancellation policy</a></span> and the <span><a href="#">privacy policy.</a></span>
                                    I confirm that Helperland will start executing the contract before the end
                                    of
                                    the cancellation period and that I will lose my right of cancellation as a
                                    consumer once the contract has been fully performed.
                                </p>
                            </div>
                        </div>
                        <button class="btn final-submit confirmpayment mt-4 float-right" type="submit">Complete
                            Booking</button>

                    </div>

                </div>
            </div>

            <!-- Sidebar -->
            <div class="sidebar-menu">

                <div class="card payment">
                    <div class="card-body">
                        <h5 class="card-title">Payment Summary</h5>
                        <div class="date-time-bed-bath">
                            <p class="date-time"><span class="date_time">01/01/2018</span> @ <span class="times_date">2:00 PM </span> </p>
                            <p class="bed-bath"><span class="bed_num"> 1 bed </span> , <span class="bath_num">1
                                    bath.</span></p>
                        </div>
                        <div class="total-summmary">
                            <div class="time-duration">
                                <p class="durations">Duration</p>
                                <div class="summary">
                                    <div class="basic-summary">
                                        <p class="basics">Basic <span class="basicshr"> 3 Hrs</span></p>
                                        <div class="basics extra_services">
                                            <p class="extra_parts" style="color:black;display: none;">Extras</p>
                                            <p class="extraparts extra1" id="extra1" style="display: none;">Inside
                                                cabinets <span> 30 Min.</span></p>
                                            <p class="extraparts extra2" style="display: none;">Inside fridge<span>
                                                    30
                                                    Min.</span></p>
                                            <p class="extraparts extra3" style="display: none;">Inside oven <span>
                                                    30
                                                    Min.</span></p>
                                            <p class="extraparts extra4" style="display: none;">Laundry wash &
                                                dry<span>
                                                    30 Min.</span></p>
                                            <p class="extraparts extra5" style="display: none;">Interior windows
                                                <span>
                                                    30 Min.</span>
                                            </p>


                                        </div>

                                    </div>
                                    <div class="total-servicetime">
                                        <p class="totaltime">Total Service Time<span class="total_requried_time">3
                                                Hrs</span></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="money">
                            <div class="basic-payment">
                                <p class="payments subtotal">Per cleaning <span class="total_price">$54</span></p>
                                <p class="payments discount">Discount<span> - $0</span></p>

                            </div>
                            <div class="total-payment">
                                <p class="total">Total Payment<span class="total_prices">$54</span></p>
                            </div>
                            <p class="effective-price">Effective Price <span class="effective_price">$43.2</span>
                            </p>
                            <p class="saving"><span>*</span>You will save 20% according to §35a EStG.</p>
                        </div>
                        <div class="smily">
                            <img src="./assets/image/smiley.png">
                            <span data-toggle="modal" data-target="#whatIncludes">See what is always included</span>
                        </div>
                    </div>
                </div>

                <div class="question">
                    <h4 class="question-title">Questions?</h4>
                    <div class="questions">
                        <p class="questions-titles btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <span class="let-arrow-direction"><i class="fa fa-angle-right arrowright"></i></span>
                            Which
                            Helperland professional will come to my place?
                        </p>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, minima vero ea
                                fuga
                                obcaecati maxime incidunt facere dolorum aspernatur labore dolor aperiam commodi,
                                optio
                                quis
                                sapiente libero voluptate est molestias.
                            </div>
                        </div>
                        <p class="questions-titles btn" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="false" aria-controls="collapsetwo">
                            <span class="let-arrow-direction"><i class="fa fa-angle-right arrowright"></i></span>
                            Which
                            Helperland professional will come to my place?
                        </p>
                        <div id="collapsetwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, minima vero ea
                                fuga
                                obcaecati maxime incidunt facere dolorum aspernatur labore dolor aperiam commodi,
                                optio
                                quis
                                sapiente libero voluptate est molestias.
                            </div>
                        </div>
                        <p class="questions-titles btn" data-toggle="collapse" data-target="#collapsethree" aria-expanded="false" aria-controls="collapsethree">
                            <span class="let-arrow-direction"><i class="fa fa-angle-right arrowright"></i></span>
                            Which
                            Helperland professional will come to my place?
                        </p>
                        <div id="collapsethree" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, minima vero ea
                                fuga
                                obcaecati maxime incidunt facere dolorum aspernatur labore dolor aperiam commodi,
                                optio
                                quis
                                sapiente libero voluptate est molestias.
                            </div>
                        </div>
                        <p class="questions-titles btn" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                            <span class="let-arrow-direction"><i class="fa fa-angle-right arrowright"></i></span>
                            Which
                            Helperland professional will come to my place?
                        </p>
                        <div id="collapsefour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, minima vero ea
                                fuga
                                obcaecati maxime incidunt facere dolorum aspernatur labore dolor aperiam commodi,
                                optio
                                quis
                                sapiente libero voluptate est molestias.
                            </div>
                        </div>
                        <p class="questions-titles btn" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                            <span class="let-arrow-direction"><i class="fa fa-angle-right arrowright"></i></span>
                            Which
                            Helperland professional will come to my place?
                        </p>
                        <div id="collapsefive" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, minima vero ea
                                fuga
                                obcaecati maxime incidunt facere dolorum aspernatur labore dolor aperiam commodi,
                                optio
                                quis
                                sapiente libero voluptate est molestias.
                            </div>
                        </div>
                        <p class="questions-titles btn" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                            <span class="let-arrow-direction"><i class="fa fa-angle-right arrowright"></i></span>
                            Which
                            Helperland professional will come to my place?
                        </p>
                        <div id="collapsesix" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, minima vero ea
                                fuga
                                obcaecati maxime incidunt facere dolorum aspernatur labore dolor aperiam commodi,
                                optio
                                quis
                                sapiente libero voluptate est molestias.
                            </div>
                        </div>
                        <p class="questions-titles btn" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                            <span class="let-arrow-direction"><i class="fa fa-angle-right arrowright"></i></span>
                            Which
                            Helperland professional will come to my place?
                        </p>

                        <div id="collapseseven" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, minima vero ea
                                fuga
                                obcaecati maxime incidunt facere dolorum aspernatur labore dolor aperiam commodi,
                                optio
                                quis
                                sapiente libero voluptate est molestias.
                            </div>
                        </div>

                        <a class="morehelp" href="#">
                            For more help
                        </a>
                    </div>
                </div>
            </div>
        </div>



        <button class="btn payment-check fixed-bottom" data-toggle="modal" data-target="#PaymentModal">Payment
            Overview
            <span class="total_prices_modals_p">$54</span></button>

        <!-- Payment Modal -->
        <div class="modal fade" id="PaymentModal" tabindex="-1" role="dialog" aria-labelledby="PaymentDetails" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Payment Summary</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"> </i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="sidebar-menu payment" style="display: block;">

                            <div class="date-time-bed-bath">
                                <p class="date-time"><span class="date_time_modal">01/01/2018</span> @ <span class="times_date_modal">2:00 PM </span> </p>
                                <p class="bed-bath"><span class="bed_num_modal"> 1 bed </span> , <span class="bath_num_modal">1
                                        bath.</span></p>
                            </div>
                            <div class="total-summmary">
                                <div class="time-duration">
                                    <p class="durations">Duration</p>
                                    <div class="summary">
                                        <div class="summary">
                                            <div class="basic-summary">
                                                <p class="basics">Basic <span class="basicshr_modal"> 3 Hrs</span>
                                                </p>
                                                <div class="basics extra_services">
                                                    <p class="extra_parts" style="color:black;display: none;">Extras
                                                    </p>
                                                    <p class="extraparts extra1" id="extra1" style="display: none;">
                                                        Inside
                                                        cabinets <span> 30 Min.</span></p>
                                                    <p class="extraparts extra2" style="display: none;">Inside
                                                        fridge<span> 30
                                                            Min.</span></p>
                                                    <p class="extraparts extra3" style="display: none;">Inside oven
                                                        <span> 30
                                                            Min.</span>
                                                    </p>
                                                    <p class="extraparts extra4" style="display: none;">Laundry wash
                                                        & dry<span>
                                                            30 Min.</span></p>
                                                    <p class="extraparts extra5" style="display: none;">Interior
                                                        windows <span>
                                                            30 Min.</span></p>


                                                </div>

                                            </div>
                                            <div class="total-servicetime">
                                                <p class="totaltime">Total Service Time<span class="total_requried_time_modal">3 Hrs</span></span></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="money">
                                <div class="basic-payment">
                                    <p class="payments subtotal">Per cleaning <span class="total_price_modal">$54</span></p>
                                    <p class="payments discount">Discount<span> - $0</span></p>

                                </div>
                                <div class="total-payment">
                                    <p class="total">Total Payment<span class="total_prices_modal">$54</span></p>
                                </div>
                                <p class="effective-price">Effective Price <span class="effective_price_modal">$43.2</span></p>
                                <p class="saving"><span>*</span>You will save 20% according to §35a EStG.</p>
                            </div>
                            <div class="smily">
                                <img src="./assets/image/smiley.png">
                                <span data-toggle="modal" data-target="#whatIncludes" data-dismiss="modal">See what
                                    is always included</span>
                            </div>

                            <div class="question mt-4">
                                <h4 class="question-title">Questions?</h4>
                                <div class="questions">
                                    <p class="questions-titles btn" data-toggle="collapse" data-target="#questionOne" aria-expanded="false" aria-controls="questionOne">
                                        <span class="let-arrow-direction"><i class="fa fa-angle-right arrowright"></i></span> Which
                                        Helperland professional will come to my place?
                                    </p>
                                    <div id="questionOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
                                            minima
                                            vero ea fuga
                                            obcaecati maxime incidunt facere dolorum aspernatur labore dolor aperiam
                                            commodi, optio quis
                                            sapiente libero voluptate est molestias.
                                        </div>
                                    </div>
                                    <p class="questions-titles btn" data-toggle="collapse" data-target="#questiontwo" aria-expanded="false" aria-controlsquestionsetwo">
                                        <span class="let-arrow-direction"><i class="fa fa-angle-right arrowright"></i></span> Which
                                        Helperland professional will come to my place?
                                    </p>
                                    <div id="questiontwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
                                            minima
                                            vero ea fuga
                                            obcaecati maxime incidunt facere dolorum aspernatur labore dolor aperiam
                                            commodi, optio quis
                                            sapiente libero voluptate est molestias.
                                        </div>
                                    </div>
                                    <p class="questions-titles btn" data-toggle="collapse" data-target="#questionthree" aria-expanded="false" aria-controls="questionthree">
                                        <span class="let-arrow-direction"><i class="fa fa-angle-right arrowright"></i></span> Which
                                        Helperland professional will come to my place?
                                    </p>
                                    <div id="questionthree" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
                                            minima
                                            vero ea fuga
                                            obcaecati maxime incidunt facere dolorum aspernatur labore dolor aperiam
                                            commodi, optio quis
                                            sapiente libero voluptate est molestias.
                                        </div>
                                    </div>
                                    <p class="questions-titles btn" data-toggle="collapse" data-target="#questionfour" aria-expanded="false" aria-controls="questionfour">
                                        <span class="let-arrow-direction"><i class="fa fa-angle-right arrowright"></i></span> Which
                                        Helperland professional will come to my place?
                                    </p>
                                    <div id="questionfour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
                                            minima
                                            vero ea fuga
                                            obcaecati maxime incidunt facere dolorum aspernatur labore dolor aperiam
                                            commodi, optio quis
                                            sapiente libero voluptate est molestias.
                                        </div>
                                    </div>
                                    <p class="questions-titles btn" data-toggle="collapse" data-target="#questionfive" aria-expanded="false" aria-controls="questionfive">
                                        <span class="let-arrow-direction"><i class="fa fa-angle-right arrowright"></i></span> Which
                                        Helperland professional will come to my place?
                                    </p>
                                    <div id="questionfive" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
                                            minima
                                            vero ea fuga
                                            obcaecati maxime incidunt facere dolorum aspernatur labore dolor aperiam
                                            commodi, optio quis
                                            sapiente libero voluptate est molestias.
                                        </div>
                                    </div>
                                    <p class="questions-titles btn" data-toggle="collapse" data-target="#questionsix" aria-expanded="false" aria-controls="questionsix">
                                        <span class="let-arrow-direction"><i class="fa fa-angle-right arrowright"></i></span> Which
                                        Helperland professional will come to my place?
                                    </p>
                                    <div id="questionsix" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
                                            minima
                                            vero ea fuga
                                            obcaecati maxime incidunt facere dolorum aspernatur labore dolor aperiam
                                            commodi, optio quis
                                            sapiente libero voluptate est molestias.
                                        </div>
                                    </div>
                                    <p class="questions-titles btn" data-toggle="collapse" data-target="#questionseven" aria-expanded="false" aria-controls="questionseven">
                                        <span class="let-arrow-direction"><i class="fa fa-angle-right arrowright"></i></span> Which
                                        Helperland professional will come to my place?
                                    </p>

                                    <div id="questionseven" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
                                            minima
                                            vero ea fuga
                                            obcaecati maxime incidunt facere dolorum aspernatur labore dolor aperiam
                                            commodi, optio quis
                                            sapiente libero voluptate est molestias.
                                        </div>
                                    </div>

                                    <a class="morehelp" href="#">
                                        For more help
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- What Include Modal -->
        <div class="modal fade" id="whatIncludes" tabindex="-1" role="dialog" aria-labelledby="whatIncludesModal" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header titles">
                        <h4 class="modal-title">What we include in cleaning </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bodyinclude">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 includes">
                                <h4>Bedroom and Living Room </h4>
                                <ul class="includedcleaning">
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">

                                            Included Dust all accessible surfaces
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">


                                            Included Wipe down all mirrors and glass fixtures </div>
                                    </li>
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">


                                            Not Included Clean all floor surfaces </div>
                                    </li>
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">


                                            Included Take out garbage and recycling </div>
                                    </li>
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">

                                            To clean up </div>
                                    </li>
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">

                                            Make beds </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-6 includes">
                                <h4>Bathrooms
                                </h4>
                                <ul class="includedcleaning">
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">


                                            Included Wash and sanitize the toilet, shower, tub, sink
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">



                                            Included Wipe down all mirrors and glass fixtures </div>
                                    </li>
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">



                                            Included Wipe down all mirrors and glass fixtures </div>
                                    </li>
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">



                                            Not Included Clean all floor surfaces</div>
                                    </li>
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">


                                            Included Take out garbage and recycling </div>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-6 includes">
                                <h4>Kitchen
                                </h4>
                                <ul class="includedcleaning">
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">


                                            Included Dust all accessible surfaces
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">


                                            Included Empty sink and load up dishwasher </div>
                                    </li>
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">

                                            Included Clean all floor surfaces</div>
                                    </li>
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">

                                            Included Take out garbage and recycling</div>
                                    </li>
                                    <li>
                                        <div class="sucessimg">
                                            <img src="./assets/Image/success.png">
                                        </div>
                                        <div class="text">

                                            Cleaning the sink and the oven (outside) </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--Warning Modal -->
        <div class="modal fade warning" id="WarningModal" tabindex="-1" role="dialog" aria-labelledby="WarningModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title ">Confirm Service Time</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body confirms">

                        Booking time is less than recommended, we may not be able to finish the job.Please confirm
                        if you
                        wish to proceed with your booking? </div>

                    <div class="modal-footer">
                        <button type="button" class="btn yesbtn" data-dismiss="modal">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</form>
<!--Login Modal -->

<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginForm" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login to your account</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mb-5">
                <div class="form-group">


                </div>
                <form method="POST" action=<?= $base_url . "./?controller=Helperland&function=CustomerLogin" ?>>

                    <div class="form-group email">
                        <input type="email" class="form-control" id="loginemail" name="loginemail" value="<?php if (isset($_COOKIE['emailcookie'])) {
                                                                                                                echo $_COOKIE['emailcookie'];
                                                                                                            } ?>" placeholder="Email">
                    </div>
                    <div class="email-msg mails mb-2"></div>
                    <div class="form-group password">
                        <input type="password" class="form-control" id="loginpassword" name="password" value="<?php if (isset($_COOKIE['passwordcookie'])) {
                                                                                                                    echo $_COOKIE['passwordcookie'];
                                                                                                                } ?>" placeholder="Password">

                    </div>
                    <div class="form-check mb-2 my-sm-2">
                        <?php if (isset($_COOKIE)) { ?>
                            <input class="form-check-input" name="remember" type="checkbox" checked id="inlineFormCheck" />
                        <?php }
                        if (!isset($_COOKIE['emailcookie'])) { ?>
                            <input class="form-check-input" name="remember" type="checkbox" id="inlineFormCheck" />
                        <?php } ?>
                        <label class="form-check-label" for="inlineFormCheck">
                            Remember me
                        </label>
                    </div>
                    <div class="form-group mt-3">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" name="login" class="btn btn-login form-control">Login</button>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <a class="forgot-password" href="#" data-toggle="modal" data-target="#ForgotModal" data-dismiss="modal">Forgot Password</a>
                <p>Don't Have an account? <a href="Customer-Signup.php" class="create-account">Create an
                        account</a></p>

            </div>
        </div>
    </div>
</div>


<!-- Forgot Password Modal -->

<div class="modal fade" id="ForgotModal" tabindex="-1" role="dialog" aria-labelledby="ForgotPassword" aria-hidden=" true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Forgot Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action=<?= $base_url . "./?controller=Helperland&function=ForgotMail" ?>>
                    <div class="form-group email">
                        <span class="email-msg float-left"></span>
                        <span class="error-emails float-right" style="color:green;"></span>
                        <input type="email" class="form-control forgot_email" id="forgotemail" name="forgot_email" placeholder="Email">
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" name="forgot_send" class="btn btn-login form-control">Send</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a class="login-now" href="#" data-toggle="modal" data-target="#LoginModal" data-dismiss="modal">Login now</a>
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
include('BookServicefooter.php');
include('BookServiceAjax.php');
?>


</body>

</html>