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

<link rel="stylesheet" href="./assets/css/CustomerSetting.css?v=129">
<link rel="stylesheet" href="./assets/css/Customer-ServiceHistory.css?v=321">
<title>Setting</title>
</head>

<body>
    <div class="wrapper">
        <?php
        include('CustomerVerticalnav.php');
        ?>

    </div>
    <div class="customerdashboard">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link dashboard tabone active" id="nav-details-tab" data-toggle="tab" href="#nav-details" role="tab" aria-controls="nav-home" aria-selected="true" title="My Details">
                    <img src="./assets/Image/my-account-details(1).png" class="navimg detailswhite">
                    <img src="./assets/Image/my-account-details-green.png" class="navimg navimggreen detailsgreen">
                    <span> My Details</span></a>
                <a class="nav-item dashboard tabtwo nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" title="My Addresses">
                    <img src="./assets/Image/my-account-address (2).png" class="navimg addresswhite">
                    <img src="./assets/Image/my-account-address-green.png" class="navimg navimggreen addressgreen">
                    <span>
                        My Addresses</span></a>
                <a class="nav-item nav-link tabthree dashboard" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false" title="Change Password">
                    <img src="./assets/Image/my-account-password (1).png" class="navimg passwordwhite">
                    <img src="./assets/Image/my-account-password-green.png" class="navimg navimggreen passwordgreen">
                    <span>Change Password
                    </span>
                </a>

                <a class="nav-item nav-link tabfour dashboard" id="nav-subscribe-tab" data-toggle="tab" href="#nav-subscribe" role="tab" aria-controls="nav-subscribe" aria-selected="false" title="Subscribe Notification">
                    <img src="./assets/Image/my-account-alert (1).png" class="navimg alertwhite">
                    <img src="./assets/Image/my-account-alert-green.png" class="navimg navimggreen alertgreen">
                    <span>
                        Subscribe Notifications
                    </span>
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
                <form class="form-details" id="details">
                    <p class="errors bg-danger text-white  px-3 py-3 text-center" style="display:none">

                    </p>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="firstname">First name</label>
                            <input type="text" class="form-control firstName" id="firstname" value="FirstName">
                            <span class="first-name-msg"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lastname">Last name</label>
                            <input type="text" class="form-control lastname" id="lastname" value="LastName">
                            <span class="last-name-msg"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="emailaddress">E-mail address</label>
                            <input type="email" class="form-control" id="emailaddress" value="Email" readonly>
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 30px;">
                        <div class="col-md-4 col-12 ">
                            <label for="mobilenumber">Mobile number
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+49</div>
                                </div>
                                <input type="tel" class="form-control" id="mobilenumber" value="9999999999" maxlength="10" size="10">
                            </div>
                            <span class="mobile-msg"></span>
                        </div>
                        <div class="form-group col-md-4 birthdates">
                            <label for="dateofbirth">Date of Birth
                            </label>

                            <select class="form-control  " id="dateofbirth">
                                <option value="Day">Day</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>


                            </select>
                            <select class="form-control  " id="dateofmonth">
                                <option value="Month">Month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <select class="form-control  " id="birthyear">
                                <option value="Year">Year</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>

                            </select>

                            <span class="date-error"></span>
                        </div>
                    </div>
                    <div class="preferredlanguage form-row pt-3">
                        <div class="form-group col-md-4 selectlanguage">
                            <label for="language">My Preferred Language</label>
                            <select class="form-control" id="language">
                                <option value="">Select Language</option>
                                <option value='1'>English</option>
                            </select>
                            <span class="language-error"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-details save-details">Save</button>
                </form>

            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <p class="px-3 py-3 bg-success text-white addressmsg" style="display: none;"></p>
                <p class="px-3 py-3 bg-danger text-white addresserr" style="display: none;"></p>
                <table class="table  addresstable" id="addresstable" style="overflow: scroll;">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center" title="Invoicing">Invoicing</th>
                            <th scope="col" class="addressth" title="Addresses">Addresses</th>
                            <th scope="col" class="text-center" title="Action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="addressradio">
                                <input type="radio" id="" value="" name="addressradio">
                            </th>
                            <td scope="row">
                                <div class="form-row control"><b>Address:</b> abcd 123, 53844 Troisdorf</div>
                                <div class="form-row control"><b>Phone number:</b>21312313123123</div>
                            </td>
                            <td class="edit_delete_address">
                                <a href="#" class="edit_delete">
                                    <img src="./assets/Image/edit-icon.png">
                                </a>
                                <a href="#" class="edit_delete">
                                    <img src="./assets/Image/delete-icon.png">
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row" class="addressradio">
                                <input type="radio" id="" value="" name="addressradio">
                            </th>
                            <td scope="row">
                                <div class="form-row control"><b>Address:</b> abcd 123, 53844 Troisdorf</div>
                                <div class="form-row control"><b>Phone number:</b>21312313123123</div>
                            </td>
                            <td class="edit_delete_address">
                                <a href="#" class="edit_delete">
                                    <img src="./assets/Image/edit-icon.png">
                                </a>
                                <a href="#" class="edit_delete">
                                    <img src="./assets/Image/delete-icon.png">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="addressradio">
                                <input type="radio" id="" value="" name="addressradio">
                            </th>
                            <td scope="row">
                                <div class="form-row control"><b>Address:</b> abcd 123, 53844 Troisdorf</div>
                                <div class="form-row control"><b>Phone number:</b>21312313123123</div>
                            </td>
                            <td class="edit_delete_address">
                                <a href="#" class="edit_delete">
                                    <img src="./assets/Image/edit-icon.png">
                                </a>
                                <a href="#" class="edit_delete">
                                    <img src="./assets/Image/delete-icon.png">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn addnewaddress" data-toggle="modal" data-target="#addaddress">Add New
                    Address</button>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <form id="passwordchange">
                    <p class="passworderror text-white text-center bg-danger px-3 py-3" style="display:none;"></p>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="currentpassword">Current Password</label>
                            <input type="password" class="form-control" id="currentpassword" placeholder="Current Password">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="newpassword">New Password</label>
                            <input type="password" class="form-control" id="newpassword" placeholder="New Password">
                            <span class="password-msg"></span>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="confirmpassword">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password">
                            <span class="cpassword-msg"></span>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-details changepassword">Save</button>

                </form>

            </div>
            <div class="tab-pane fade" id="nav-subscribe" role="tabpanel" aria-labelledby="nav-subscribe-tab">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="subscribecheckbox">
                    <label class="form-check-label" for="subscribecheckbox" style="font-weight: normal;padding-left: 1%;">
                        Yes, I would like to subscribe to the newsletter of Helperland GmbH with vouchers, trends,
                        promotions and
                        individualized offers. I can unsubscribe from the newsletter at any time in the newsletter and
                        in the
                        customer account itself. If you no longer wish to receive our newsletter, remove the tick.
                    </label>
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


    <!-- Add Address Modal -->
    <div class="modal fade" id="addaddress" tabindex="-1" role="dialog" aria-labelledby="addaddress" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="AddAddress">
                        Add New Address
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="addnewerror text-center text-white bg-danger px-3 py-3" style="display: none;"></p>
                    <div class="form-row">
                        <div class="form-group col-md-6 streetname">
                            <label class="street">Street</label>
                            <input type="text" class="form-control" id="street" placeholder="Street">
                            <span class="street-msg"></span>
                        </div>
                        <div class="form-group col-md-6 housenumbers">
                            <label for="houseno">House number</label>
                            <input type="number" class="form-control" id="houseno" placeholder="House number">
                            <span class="house-msg"></span>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group pin col-md-6 postalcodenumber">
                            <label class="pincode">Postal Code</label>
                            <input type="number" class="form-control" id="pincode" placeholder="Postal Code">
                            <span class="postal_number"></span>
                        </div>
                        <div class="form-group col-md-6 citylocation">
                            <label class="location">Location</label>
                            <select id="location" class="located form-control">
                            </select>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 addressmobile">
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

                        <button type="submit" class="btn save addresssave addonenewaddress" disabled="disabled" title="save" data-dismiss="modal">Save</button>
                        <button type="submit" class="btn save UpdateAddress" disabled="disabled" title="Edit" data-dismiss="modal">Edit</button>

                </div>

            </div>
        </div>
    </div>


    <!-- Delete Modal -->
    <div class="modal fade" id="deleteaddress" tabindex="-1" role="dialog" aria-labelledby="deleteaddress" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="AddAddress">
                    Delete Address
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                 <p class="deletes">Are you sure you want to delete this address?</p>
                        <button type="submit" class="btn save deleteaddress" title="Delete" data-dismiss="modal">Delete</button>
                </div>

            </div>
        </div>
    </div>
    </section>

    <?php
    include('footer.php');
    ?>
    <script src="./assets/js/CustomerSetting.js?v=8213"></script>
    <script src="./assets/js/Customer-ServiceHistory.js?v=9213"></script>
   <?php 
        include('CustomerSettingAjax.php');
   ?>

</body>