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
<style>
    .vertical-nav {
        margin-left: 1%;
        /* height: 840px; */
    }

    .customerdashboard .nav-tabs a {
        width: 50%;
        text-align: center;
        padding: 15px 0;
    }

    #account_status {
        font-size: 20px;
        line-height: 24px;
        font-weight: 700;
        margin: 0 0 25px;
    }

    #account_status span {
        color: #67b644;
        font-weight: 400;
    }

    .customerdashboard {
        overflow: auto;
        padding-left: 15px;
        margin-right: 1%;
    }

    label {
        display: block;
        font-weight: 400;
        margin-bottom: 5px;
    }

    .basictitle {
        font-size: 18px;
        line-height: 22px;
        padding-bottom: 10px;
        border-bottom: 1px solid #dcdcdc;
        font-weight: 700;
        margin: 0 0 15px;
        max-width: 100%;
        overflow: hidden;
        white-space: nowrap;
        -ms-text-overflow: ellipsis;
        text-overflow: ellipsis;
    }

    #nationallity {
        display: inline-block;
        padding: 12px 4px;
        height: 46px;
        padding-top: 10px;
        padding-left: 2px;
        /* width: 25%; */
    }

    .radiovalues {
        display: inline-block;
        margin-right: 15px;
    }

    input[name="Gender"] {
        width: 17px;
        height: 14px;
    }

    .avtarimg {
        margin-top: 10px;
    }

    .avatarimgs {
        height: 85px;
        border-radius: 85px;
        margin-right: 20px;
        margin-bottom: 10px;
    }

    .avtarimg .active {
        border: 3px solid #1D7A8c;
        transition: 0.3s all;
    }

    .avtarimage {
        display: inline-block;
    }

    .avtarimage img:hover {
        cursor: pointer;
    }
</style>

</head>


<?php
include('SPVerticalnav.php');
?>
<div class="customerdashboard">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link dashboard tabone active" id="nav-details-tab" data-toggle="tab" href="#nav-details" role="tab" aria-controls="nav-home" aria-selected="true" title="My Details">
                <img src="./assets/Image/my-account-details(1).png" class="navimg detailswhite">
                <img src="./assets/Image/my-account-details-green.png" class="navimg navimggreen detailsgreen">
                <span> My Details</span></a>

            <a class="nav-item nav-link tabthree dashboard" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false" title="Change Password">
                <img src="./assets/Image/my-account-password (1).png" class="navimg passwordwhite">
                <img src="./assets/Image/my-account-password-green.png" class="navimg navimggreen passwordgreen">
                <span>Change Password
                </span>
            </a>

        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
            <form class="form-details" id="details">
                <p class="errors bg-danger text-white  px-3 py-3 text-center" style="display:none">
                </p>
                <h3 id="account_status" for="accountstatus">Account Status : <span class="activesp" style="display: none;">Active</span>
                    <span class="inactivesp text-danger" style="display: none;">InActive</span>
                    <img src="./assets/Image/avatar-hat.png" class="changedimg" style="float: right;">
                </h3>
                <h3 class="basictitle">Basic Details</h3>
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
                    <div class="form-group col-md-4 nationallity">
                        <label for="nationallity">Nationality
                        </label>
                        <select class="form-control " id="nationallity">

                            <option value="">Nationality</option>
                            <!---->
                            <option value="176625">German</option>
                            <option value="176685">Indian</option>
                            <option value="176626">Afghan</option>
                            <option value="176627">Egyptian</option>
                            <option value="176628">Albanian</option>
                            <option value="176629">Algerian</option>
                            <option value="176630">American</option>
                            <option value="176631">andorranisch</option>
                            <option value="176632">angolan</option>
                            <option value="176633">Antiguan</option>
                            <option value="176634">äquatorialguineisch</option>
                            <option value="176635">Argentinean</option>
                            <option value="176636">Armenian</option>
                            <option value="176637">Azerbaijani</option>
                            <option value="176638">Ethiopian</option>
                            <option value="176639">Australian</option>
                            <option value="176640">bahamaisch</option>
                            <option value="176641">bahrainisch</option>
                            <option value="176642">bangladesh</option>
                            <option value="176643">Belgian</option>
                            <option value="176644">belizean</option>
                            <option value="176645">Beninese</option>
                            <option value="176646">Dzongkha</option>
                            <option value="176647">Bolivian</option>
                            <option value="176648">Bosnian herzegowinisch</option>
                            <option value="176649">botsuanisch</option>
                            <option value="176650">Brazilian</option>
                            <option value="176651">British</option>
                            <option value="176652">bruneiisch</option>
                            <option value="176653">Bulgarian</option>
                            <option value="176654">burkinisch</option>
                            <option value="176655">burundisch</option>
                            <option value="176656">cabo-verdisch</option>
                            <option value="176657">Chilean</option>
                            <option value="176658">Chinese</option>
                            <option value="176659">Costa Rican</option>
                            <option value="176660">Danish</option>
                            <option value="176661">the north Mariana Islands</option>
                            <option value="176662">the Ver. Arab. Emirates</option>
                            <option value="176664">dominicanisch</option>
                            <option value="176665">Dominican</option>
                            <option value="176666">dschibutisch</option>
                            <option value="176667">Ecuadorian</option>
                            <option value="176668">Eritrean</option>
                            <option value="176669">Estonian</option>
                            <option value="176670">Fijian</option>
                            <option value="176671">Finnish</option>
                            <option value="176672">French</option>
                            <option value="176673">gabonese</option>
                            <option value="176674">gambian</option>
                            <option value="176675">Georgian</option>
                            <option value="176676">Ghanaian</option>
                            <option value="176677">grenadian</option>
                            <option value="176678">Greek</option>
                            <option value="176679">Guatemalan</option>
                            <option value="176680">Guinea-bissauisch</option>
                            <option value="176681">guineisch</option>
                            <option value="176682">guyanese</option>
                            <option value="176683">Haitian</option>
                            <option value="176684">Honduran</option>
                            <option value="176686">Indonesian</option>
                            <option value="176687">Iraqi</option>
                            <option value="176688">Iranian</option>
                            <option value="176689">Irish</option>
                            <option value="176690">Icelandic</option>
                            <option value="176691">Israeli</option>
                            <option value="176692">Italian</option>
                            <option value="176693">Ivorian</option>
                            <option value="176694">Jamaican</option>
                            <option value="176695">Japanese</option>
                            <option value="176696">Yemeni</option>
                            <option value="176697">Jordanian</option>
                            <option value="176698">Cambodian</option>
                            <option value="176699">cameroonian</option>
                            <option value="176700">Canadian</option>
                            <option value="176701">Kazakh</option>
                            <option value="176702">Qatari</option>
                            <option value="176703">Kenyan</option>
                            <option value="176704">Kyrgyz</option>
                            <option value="176705">Kiribati</option>
                            <option value="176706">Colombian</option>
                            <option value="176707">comorian</option>
                            <option value="176708">Congolese</option>
                            <option value="176709">Korean</option>
                            <option value="176710">Croatian</option>
                            <option value="176711">Cuban</option>
                            <option value="176712">kuwaitisch</option>
                            <option value="176713">Laotian</option>
                            <option value="176714">lesothisch</option>
                            <option value="176715">Latvian</option>
                            <option value="176716">Lebanese</option>
                            <option value="176717">Liberian</option>
                            <option value="176718">libyan</option>
                            <option value="176719">liechtensteinisch</option>
                            <option value="176720">Lithuanian</option>
                            <option value="176721">lucianisch</option>
                            <option value="176722">Luxembourgish</option>
                            <option value="176723">Madagascan</option>
                            <option value="176724">Macedonian / Macedonian</option>
                            <option value="176725">malawian</option>
                            <option value="176726">Malaysian</option>
                            <option value="176727">maldivian</option>
                            <option value="176728">malisch</option>
                            <option value="176729">Maltese</option>
                            <option value="176730">Moroccan</option>
                            <option value="176731">Marshallese</option>
                            <option value="176732">mauritanian</option>
                            <option value="176733">Mauritian</option>
                            <option value="176734">Mexican</option>
                            <option value="176735">micronesian</option>
                            <option value="176736">Moldavian</option>
                            <option value="176737">Monegasque</option>
                            <option value="176738">Mongolian</option>
                            <option value="176739">montenegrin</option>
                            <option value="176740">Mozambican</option>
                            <option value="176741">Myanmarian</option>
                            <option value="176742">Namibian</option>
                            <option value="176743">Nauruan</option>
                            <option value="176744">Nepalese</option>
                            <option value="176745">New Zealand</option>
                            <option value="176746">Nicaraguan</option>
                            <option value="176747">Dutch</option>
                            <option value="176748">Nigerian</option>
                            <option value="176749">nigrisch</option>
                            <option value="176750">Norwegian</option>
                            <option value="176751">Omani</option>
                            <option value="176752">Austrian</option>
                            <option value="176754">Pakistani</option>
                            <option value="176755">Palauan</option>
                            <option value="176756">Panamanian</option>
                            <option value="176757">Papua-neuguineisch</option>
                            <option value="176758">Paraguayan</option>
                            <option value="176759">Peruvian</option>
                            <option value="176760">Filipino</option>
                            <option value="176761">Polish</option>
                            <option value="176762">Portuguese</option>
                            <option value="176763">Rwandan</option>
                            <option value="176764">Romanian</option>
                            <option value="176765">Russian</option>
                            <option value="176766">salomonisch</option>
                            <option value="176767">Salvadorian</option>
                            <option value="176768">Zambian</option>
                            <option value="176769">Samoan</option>
                            <option value="176770">sanmarinesisch</option>
                            <option value="176771">santomeisch</option>
                            <option value="176772">Saudi-arabian</option>
                            <option value="176773">Swedish</option>
                            <option value="176774">Swiss</option>
                            <option value="176775">Senegalese</option>
                            <option value="176776">Serbian</option>
                            <option value="176777">seychellisch</option>
                            <option value="176778">sierraleonisch</option>
                            <option value="176779">Zimbabwean</option>
                            <option value="176780">Singaporean</option>
                            <option value="176781">Slovak</option>
                            <option value="176782">Slovenian</option>
                            <option value="176783">somali</option>
                            <option value="176784">Spanish</option>
                            <option value="176785">Sri Lankan</option>
                            <option value="176786">South African</option>
                            <option value="176787">Sudanese</option>
                            <option value="176788">südsudanesisch</option>
                            <option value="176789">surinamese</option>
                            <option value="176790">swasiländisch</option>
                            <option value="176791">Syrian</option>
                            <option value="176792">Tajik</option>
                            <option value="176793">Taiwanese</option>
                            <option value="176794">Tanzanian</option>
                            <option value="176795">Thai</option>
                            <option value="176796">togolese</option>
                            <option value="176797">tongan</option>
                            <option value="176798">Chadian</option>
                            <option value="176799">Czech</option>
                            <option value="176800">Tunisian</option>
                            <option value="176801">Turkish</option>
                            <option value="176802">Turkmen</option>
                            <option value="176803">Tuvaluan</option>
                            <option value="176804">Ugandan</option>
                            <option value="176805">Ukrainian</option>
                            <option value="176806">Hungarian</option>
                            <option value="176807">Uruguayan</option>
                            <option value="176808">Uzbek</option>
                            <option value="176809">vanuatuisch</option>
                            <option value="176810">Venezuelan</option>
                            <option value="176811">Vietnamese</option>
                            <option value="176812">vince table</option>
                            <option value="176813">from Niue</option>
                            <option value="176814">from St. Kitts and Nevis</option>
                            <option value="176815">from Timor-Leste</option>
                            <option value="176816">from Trinidad and Tobago</option>
                            <option value="176817">belarusian</option>
                            <option value="176818">zentralafrikanisch</option>
                            <option value="176819">zyprisch</option>

                        </select>
                        <span class="nation-error"></span>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Gender</label>
                        <div class="radiovalues">
                            <label>
                                <input name="Gender" type="radio" value="1">
                                Male
                            </label>
                        </div>

                        <div class="radiovalues">

                            <label>
                                <input name="Gender" type="radio" value="2">
                                Female
                            </label>
                        </div>
                        <div class="radiovalues">

                            <label>
                                <input name="Gender" type="radio" value="0">

                                Rather not to say
                            </label>
                        </div>
                    </div>
                    <span class="gender-error"></span>
                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label>Select Avatar</label>
                        <div class="avtarimg form-group">
                            <div class="avtarimage">
                                <img src="./assets/Image/avatar-car.png" class="avatarimgs avatar-car">
                            </div>
                            <div class="avtarimage">

                                <img src="./assets/Image/avatar-female.png" class="avatarimgs avatar-female">
                            </div>
                            <div class="avtarimage">

                                <img src="./assets/Image/avatar-hat.png" class="avatarimgs active avatar-hat">
                            </div>
                            <div class="avtarimage">

                                <img src="./assets/Image/avatar-iron.png" class="avatarimgs avatar-iron">
                            </div>
                            <div class="avtarimage">

                                <img src="./assets/Image/avatar-male.png" class="avatarimgs avatar-male">
                            </div>
                            <div class="avtarimage">

                                <img src="./assets/Image/avatar-ship.png" class="avatarimgs avatar-ship">
                            </div>
                        </div>
                    </div>
                    <span class="avtar-err"></span>
                </div>
                <div class="myaddress pt-3">
                    <div class="form-group ">
                        <label for="language"><b>My Address</b></label>
                        <hr class="addresshr">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="street">Street name</label>
                                <input type="text" class="form-control" id="street" placeholder="Street">
                                <span class="street-msg"></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="houseno">House number</label>
                                <input type="number" class="form-control" id="houseno" placeholder="House number">
                                <span class="house-msg"></span>

                            </div>
                            <div class="form-group pin col-md-4">
                                <label class="pincode">Postal code</label>
                                <input type="number" class="form-control" id="pincode" placeholder="Postal Code">
                                <span class="pincode-msg"></span>
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label class="location">City</label>
                                <select id="location" class="located form-control">
                                </select>
                            </div>

                        </div>

                    </div>
                </div>
                <hr class="addresshr">
                <button type="submit" class="btn btn-details spdetails">Save</button>
            </form>

        </div>

        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <form id="passwordchange">
                <p class="passworderror text-white text-center bg-danger px-3 py-3" style="display:none;"></p>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="currentpassword">Current Password</label>
                        <input type="password" class="form-control" id="currentpassword" placeholder="Current Password">
                        <span class="current-password-msg"></span>
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
?>
<script src="./assets/js/CustomerSetting.js?v=231"></script>
<script src="./assets/js/SPSetting.js?v=231"></script>

<?php
include('SPSettingAjax.php');
?>
<script>
    $(document).ready(function() {
        // validation to submit the form
        $('input').on('input', function(e) {

            if ($('.form-details').find('.invalid-input').length > 0) {
                $('.spdetails').attr('disabled', 'disabled');
                $('.spdetails').css('cursor', 'not-allowed');
            } 
           else {
                $('.spdetails').removeAttr('disabled');
                $('.spdetails').css('cursor', 'pointer');

            }

        });
        $('input[name=Gender]').on("click",function(){

            if($(('input[name=Gender]:checked').length == 1)){
            $(".gender-error").removeClass('invalid-msg').text("");

        }
        });
        $('#pincode').on('input', function () {
        var pincode = $(this).val();
     
        if (pincode.length == 0) {
            $('.pincode-msg').addClass('invalid-msg').text('Pincode Is Required');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else if (pincode.length != 6) {
            $('.pincode-msg').addClass('invalid-msg').text('Enter Valid Pincode');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else {
            $('.pincode-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }
    });
        $('.spdetails').on('click', function(e) {
            e.preventDefault();
            if ($("#nationallity").val() == "" || $('input[name=Gender]:checked').length == 0 || $('.avatarimgs').hasClass('active') == false  || $('#street').val() == "" || $("#houseno").val() == "" || $("#pincode").val() == "") {
                if ($("#nationallity").val() == "") {
                    $(".nation-error").addClass('invalid-msg').text("Enter Valid Nationallity");
                }
                if ($('input[name=Gender]:checked').length == 0) {
                    $(".gender-error").addClass('invalid-msg').text("Gender Is Required");

                }
                if ($('.avatarimgs').hasClass('active') == false) {
                    $(".avtar-err").addClass('invalid-msg').text("Profile Image Is Required");

                }
                if ($('#street').val() == "") {
                    $('.street-msg').addClass('invalid-msg').text("Street is required");

                }
                if ($("#houseno").val() == "") {
                    $('.house-msg').addClass('invalid-msg').text("House Number is required");

                }
                if ($("#pincode").val() == "") {
                    $('.pincode-msg').addClass('invalid-msg').text("Pincode is required");

                }
            } else {
                $('#iframeloading').show();

                UpdateSPDetails();
            }
        });
        username = "<?php echo $_SESSION['username']; ?>";
        GetSPDetails();

        function GetSPDetails() {
            $.ajax({
                type: "POST",
                url: "http://localhost/helper/?controller=Helperland&function=CustomerDetails",
                data: {
                    username: username,
                },
                dataType: "json",
                success: function(data) {
                    firstname = data[0] + " " + data[1];
                    $('.wlcm-nm').text(data[0] + " " + data[1]);
                    $('#firstname').val(data[0]);
                    $('#lastname').val(data[1]);
                    $('#emailaddress').val(data[2]);
                    $('#mobilenumber').val(data[3]);
                    $('#dateofbirth').val(data[4]);
                    $('#dateofmonth').val(data[5]);
                    $('#birthyear').val(data[6]);
                    // $('#birthyear').val(data[6]);
                    $('.changedimg').attr('src',data[9])
                    $("#nationallity").val(data[10]);
                    // $("#nationallity").val(data[11]);
                    $("input[name=Gender]").val([data[11]]);
                    $("#street").val(data[12]);
                    $("#houseno").val(data[13]);
                    $("#pincode").val(data[14]);
                    $("#location").html(data[15]);
                    $('.avatarimgs').removeClass('active');
                    for(i=0;i<6;i++){
            if(document.querySelectorAll('.avatarimgs')[i].src == data[9]) {
            document.querySelectorAll('.avatarimgs')[i].setAttribute("class","active avatarimgs ");
    
                } 
            } 

                    if (data[8] == 1) {
                        $('#account_status .activesp').show();
                    }
                    if (data[8] == 0) {
                        $('#account_status .inactivesp').show();
                    }

                }
            });
        }


        function UpdateSPDetails(){
            firstname = $('#firstname').val();
           lastname = $('#lastname').val();
            email = $('#emailaddress').val();
            mobile = $('#mobilenumber').val();
            date = $('#dateofbirth').val();
            month = $('#dateofmonth').val();
            year = $('#birthyear').val();
            var street = $.trim($("#street").val());
            var houseno = $.trim($("#houseno").val());
            var pincode = $.trim($("#pincode").val());
            var location = $.trim($("#location").val());
            mobilenum = $('#mobilenumber').val();
            img = $('.avtarimage .active').attr('src');
            img = img.slice(2)
            avtarimg = "http://localhost/helper/"+img;
            // avtarimg = $('.avtarimage .active').attr('src');
            birthdate = year + "-" + month + "-" + date;
            gender = $('input[name=Gender]:checked').val();
            nationallity = $("#nationallity").val();
             pincode = $.trim($("#pincode").val());
       
            $(".lastname").removeClass('valid-input');
            $(".firstName").removeClass('valid-input');
            $("#mobilenumber").removeClass('valid-input');
            $("#street").removeClass('valid-input');
            $("#houseno").removeClass('valid-input');
            $("#pincode").removeClass('valid-input');

        
            $.ajax({
                type: "POST",
                url: "http://localhost/helper/?controller=Helperland&function=AddSPDetails",
                data: {
                    'firstname': firstname,
                    'lastname': lastname,
                    'email': email,
                    'mobile': mobile,
                    'birthdate': birthdate,
                    'avtarimg': avtarimg,
                    'gender':gender,
                    'pincode':pincode,
                    'nationallity':nationallity,
                    "street": street,
                    "houseno": houseno,
                    "pincode": pincode,
                    "location": location,
                    "mobilenum":mobilenum,

                },

                dataType: "json",
                success: function(data) {
                    $('#iframeloading').hide();
                    if (data == 1) {
                        Swal.fire({
                            title: 'Your Details Has Been Updated Successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'Done'
                        })
                    }
                    if (data == 0) {
                        Swal.fire({
                            title: 'Your Details Not Updated',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'Done'
                        })
                    }
                    GetSPDetails();



                }
            });
        }

    });
</script>

</body>