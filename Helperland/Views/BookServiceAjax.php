<script>
    $(document).ready(function() {
        <?php if (isset($_SESSION['username'])) { ?>
            // Get UserId
            var username = "<?php echo $_SESSION['username']; ?>";

        <?php } ?>
        // btn-checkavailability
        $(".btn-checkavailability").on("click", function() {

            // alert('it work');
            if ($.trim($('#postalcode').val()).length == 0) {
                var postalerror = "Postal Code is Required";
                $('#postal_number').text(postalerror);
            }
            if ($.trim($('#postalcode').val()).length == 6) {
                var postalerror = "";
                $('#postal_number').text(postalerror);
                var postal = $("#postalcode").val();
                $("#iframeloading").show();

                $.ajax({
                    type: 'POST',
                    url: "http://localhost/helper/?controller=Helperland&function=CheckPostalCode",
                    data: {
                        "check_postal": 1,
                        "postal": postal,
                    },

                    success: function(data) {
                        $("#iframeloading").hide();
                        if (data == 1) {
                            $(".setup-service .firsttab  .nav-link").removeClass('active');
                            $(".tab-content .firsttabs").removeClass('active');
                            $(".tab-content .firsttabs ").removeClass('show');
                            $(".setup-service .firsttab  .nav-link").addClass('completed');

                            $(".setup-service .secondtab  .nav-link").addClass('show');
                            $(".setup-service .secondtab  .nav-link").addClass('active');
                            $(".tab-content .secondtabs").addClass('active');
                            $(".tab-content .secondtabs ").addClass('show');
                            // alert(data);
                            var pincode = $("#pincode").val(postal);

                            $.ajax({
                                type: 'POST',
                                url: "http://localhost/helper/?controller=Helperland&function=GetLocationCity",
                                data: {
                                    "get_postal": 1,
                                    "postalcode": postal,
                                },
                                dataType: 'json',
                                success: function(data) {
                                    optionText = data[0];
                                    optionValue = data[0];

                                    $('#location').append(`<option value="${optionValue}" selected>
                                                        ${optionText}
                                                    </option>`);
                                }
                            });
                        } else {
                            var response = "Postal Code Not Available";
                            $('#postal_number').text(response);
                            // alert(data);
                        }

                    }

                });

            } else {
                var postalerror = "Please Enter Valid Postal Code";
                $('#postal_number').text(postalerror);
            }
        })

        $(".scheduleandplan").on("click", function(e) {
            e.preventDefault();
            <?php if (!isset($_SESSION['username'])) { ?>
                $('#LoginModal').modal('show');
            <?php    } ?>

            <?php if (isset($_SESSION['username'])) { ?>


                var selectbed = $("#selectbed option:selected").text();
                var selectbath = $("#selectbath option:selected").text();
                var selecthour = $("#selecthour option:selected").text();
                var selectdate = $.trim($("#selectdate").val());
                var selectime = $("#selectime option:selected").text();
                var extrahour = 0;
                if ($(".extra1").css('display') == 'block') {
                    var firstservice = "0.5";
                    firstservice = parseFloat(firstservice);
                    extrahour = extrahour + 0.5;

                }
                if ($(".extra2").css('display') == 'block') {
                    var secondservice = "0.5";
                    secondservice = parseFloat(secondservice);
                    extrahour = extrahour + 0.5;
                }
                if ($(".extra3").css('display') == 'block') {
                    var thirdservice = "0.5";
                    thirdservice = parseFloat(thirdservice);
                    extrahour = extrahour + 0.5;

                }
                if ($(".extra4").css('display') == 'block') {
                    var fourthservice = "0.5";
                    fourthservice = parseFloat(fourthservice);
                    extrahour = extrahour + 0.5;

                }
                if ($(".extra5").css('display') == 'block') {
                    var fifthservice = "0.5";
                    fifthservice = parseFloat(fifthservice);
                    extrahour = extrahour + 0.5;

                }
                var servicehours = $('.basics span').text();
                servicehours = parseFloat(servicehours);
                // alert(servicehours);
                // alert(extrahour);
                var SubTotal = $('.subtotal span').text();
                SubTotal = SubTotal.slice(1);
                SubTotal = parseFloat(SubTotal);
                var Discount = $('.discount span').text();
                // alert(Discount);
                Discounts = Discount.slice(4);
                Discount = parseFloat(Discounts);

                var TotalCost = $('.total span').text();
                TotalCost = TotalCost.slice(1);
                TotalCost = parseFloat(TotalCost);

                var comments = $.trim($("#comments").val());

                if ($('#petsornot').is(":checked")) {
                    var pets = "yes";
                } else {
                    var pets = "no";
                }
                $(".setup-service .firsttab  .nav-link").removeClass('active');
                $(".tab-content .firsttabs").removeClass('active');
                $(".tab-content .firsttabs ").removeClass('show');
                $(".setup-service .firsttab  .nav-link").addClass('completed');
                $(".setup-service .secondtab  .nav-link").removeClass('active');
                $(".setup-service .secondtab  .nav-link").removeClass('disabled');
                $(".tab-content .secondtabs").removeClass('active');
                $(".tab-content .secondtabs ").removeClass('show');
                $(".setup-service .secondtab  .nav-link").addClass('completed');

                $(".setup-service .thirdtab  .nav-link").addClass('show');
                $(".setup-service .thirdtab  .nav-link").addClass('active');
                $(".tab-content .thirdtabs").addClass('active');
                $(".tab-content .thirdtabs ").addClass('show');

                GetFavouriteServiceProvider();
                //alert(pets);
                // alert(comments);
                // alert(Discount);
                // alert("SubTotal =" + SubTotal +"Discount ="+ Discount +"Total Cost ="+ TotalCost);
            <?php } ?>
        })

        $(".addresssave").on("click", function(e) {
            e.preventDefault();
            var street = $.trim($("#street").val());


            var houseno = $.trim($("#houseno").val());
            var pincode = $.trim($("#pincode").val());
            var location = $.trim($("#location").val());
            var mobilenum = $.trim($("#mobilenum").val());
            <?php if (isset($_SESSION['username'])) { ?>

                var username = "<?php echo $_SESSION['username']; ?>";
            <?php } ?>
            $("#iframeloading").show();

            $.ajax({
                type: 'POST',
                url: "http://localhost/helper/?controller=Helperland&function=InsertAddress",
                data: {
                    "addresssave": 1,
                    "street": street,
                    "houseno": houseno,
                    "pincode": pincode,
                    "location": location,
                    "mobilenum": mobilenum,
                    "username": username,
                },

                success: function(data) {
                    if (data == 1) {
                        $("#iframeloading").hide();

                        $('.add-address').show();
                        $('#add_address').hide();
                        GetAddress();

                    } else {
                        alert("it Enter valid Address");
                    }
                }
            });
            //   var Address =$('input[name="address_radio"]:checked').val();


        })

        $('.yourdetailsbtn').click(function() {
            $("#iframeloading").show();

            if ($("input[name='address_radio']:checked").length = 0) {
                $("#iframeloading").hide();

                var adresserror = "Please Select Address";
                $('.addresserror').text(adresserror);
                // alert('it work');
            } else {

                var Address = $('input[name="address_radio"]:checked').val();

                $(".setup-service .firsttab  .nav-link").removeClass('active');
                $(".tab-content .firsttabs").removeClass('active');
                $(".tab-content .firsttabs ").removeClass('show');
                $(".setup-service .firsttab  .nav-link").addClass('completed');
                $(".setup-service .secondtab  .nav-link").removeClass('active');
                $(".setup-service .secondtab  .nav-link").removeClass('disabled');
                $(".tab-content .secondtabs").removeClass('active');
                $(".tab-content .secondtabs ").removeClass('show');
                $(".setup-service .secondtab  .nav-link").addClass('completed');
                $(".setup-service .thirdtab  .nav-link").removeClass('active');
                $(".setup-service .thirdtab  .nav-link").removeClass('disabled');
                $(".tab-content .thirdtabs").removeClass('active');
                $(".tab-content .thirdtabs ").removeClass('show');
                $(".setup-service .thirdtab  .nav-link").addClass('completed');

                $(".setup-service .fourthtab  .nav-link").addClass('show');
                $(".setup-service .fourthtab  .nav-link").addClass('active');
                $(".tab-content .fourthtabs").addClass('active');
                $(".tab-content .fourthtabs ").addClass('show');
                $("#iframeloading").hide();

            }

        });
        $('.addpromocode').click(function() {
            var promoerr = "Promocode Doesn't Exists";
            $('.promoerr').text(promoerr);
        });
        $('.confirmpayment').click(function(e) {
            e.preventDefault();


            if ($('.payment-cardno').val().length == 0) {
                $('.validcardno').addClass('invalid-msg').text("* Card Number is Required");
                $('.cardpay').addClass('invalid-input').removeClass('valid-input');

                $('.invalid-msg').css({
                    "display": "block",
                    "margin-top": "11px",
                });
            } else if ($('#exp').val().length == 0) {
                $('.validcardate').addClass('invalid-msg').text("* Expiry Date is Required");
                $('.cardpay').addClass('invalid-input').removeClass('valid-input');

                $('.invalid-msg').css({
                    "display": "block",
                    "margin-top": "11px",
                })
            } else if ($('.cvv').val().length == 0) {
                $('.validcardcvv').addClass('invalid-msg').text("* CVV is Required");
                $('.cardpay').addClass('invalid-input').removeClass('valid-input');

                $('.invalid-msg').css({
                    "display": "block",
                    "margin-top": "11px",
                });
            } else if ($('.cvv').val().length != 3) {
                $('.validcardcvv').addClass('invalid-msg').text("* Please Enter Valid 3 Digit CVV");
                $('.cardpay').addClass('invalid-input').removeClass('valid-input');

                $('.invalid-msg').css({
                    "display": "block",
                    "margin-top": "11px",
                });
            } else if ($("#Termsandconditions").not(':checked')) {
                var checkboxerr = "* You Must Agree with Term and conditions";
                $('.checkboxerr').text(checkboxerr);
            } else {
                $('.validcardcvv').removeClass('invalid-msg');
                $('.validcardno').removeClass('invalid-msg');
                $('.validcardate').removeClass('invalid-msg');

            }

            if ($("#Termsandconditions").is(':checked')) {
                var checkboxerr = "";
                $('.checkboxerr').text(checkboxerr);
                if ($('.cvv').val().length == 3) {
                    $('.validcardcvv').addClass('invalid-msg').text("");

                    $('.validcardcvv').removeClass('invalid-msg');
                    $('.cardpay').addClass('valid-input').removeClass('invalid-input');
                }
            }
            if ($(".invalid-input").length == 0 && $("#Termsandconditions").is(':checked')) {
                card = $.trim($('.payment-cardno').val().slice(14));
                payment = "Payment";
                cardno = $.trim($('.payment-cardno').val().slice(14));
                expiry = $.trim($('#exp').val().slice(3));
                random = Math.floor((Math.random() * 900) + 1);
                randoms = Math.floor((Math.random() * 90000) + 1);

                paymentrefno = payment + cardno + expiry + random + randoms;
                pincode = $("#postalcode").val();
                servicehourate = "$18";

                selectbed = $("#selectbed option:selected").text();
                selectbath = $("#selectbath option:selected").text();
                selecthour = $("#selecthour option:selected").text();
                selectdate = $.trim($("#selectdate").val());
                selectime = $("#selectime option:selected").text();
                extrahour = 0;
                elements = '';

                if ($(".extra1").css('display') == 'block') {
                    var firstservice = "0.5";
                    firstservice = parseFloat(firstservice);
                    extrahour = extrahour + 0.5;
                    elements = elements + [' Inside cabinets ,'];

                }
                if ($(".extra2").css('display') == 'block') {
                    var secondservice = "0.5";
                    secondservice = parseFloat(secondservice);
                    extrahour = extrahour + 0.5;
                    elements = elements + [' Inside fridge ,'];

                }
                if ($(".extra3").css('display') == 'block') {
                    var thirdservice = "0.5";
                    thirdservice = parseFloat(thirdservice);
                    extrahour = extrahour + 0.5;
                    elements = elements + [' Inside oven ,'];


                }
                if ($(".extra4").css('display') == 'block') {
                    var fourthservice = "0.5";
                    fourthservice = parseFloat(fourthservice);
                    extrahour = extrahour + 0.5;
                    elements = elements + [' Laundry wash & dry ,'];


                }
                if ($(".extra5").css('display') == 'block') {
                    var fifthservice = "0.5";
                    fifthservice = parseFloat(fifthservice);
                    extrahour = extrahour + 0.5;
                    elements = elements + [' Interior windows'];

                }
                Extraservice = elements;
                extrahours = extrahour;

                selectedsp = "";
                if ($('.selectbtn').hasClass('selectedsp')) {
                    selectedsp = $('.selectedsp').val();
                }

                var servicehour = $('.basics span').text();
                servicehours = parseFloat(servicehour);
                // alert(servicehours);
                // alert(extrahour);
                var SubTotals = $('.subtotal span').text();
                SubTotals = SubTotals.slice(1);
                SubTotal = parseFloat(SubTotals);
                var Discounts = $('.discount span').text();
                // alert(Discount);
                Discounts = Discounts.slice(4);
                Discount = parseFloat(Discounts);

                var TotalCosts = $('.total span').text();
                TotalCosts = TotalCosts.slice(1);
                TotalCost = parseFloat(TotalCosts);
                var EffectiveCosts = $('.effective-price span').text();
                EffectiveCosts = EffectiveCosts.slice(1);
                EffectiveCost = parseFloat(EffectiveCosts);
                paymentdue = 0;
                comments = $.trim($("#comments").val());

                if ($('#petsornot').is(":checked")) {
                    pets = "yes";
                } else {
                    pets = "no";
                }
                Address = $('input[name="address_radio"]:checked').val();

                AddServieRequest();
            }

        });


        function GetAddress() {
            username = '';
            <?php if (isset($_SESSION['username'])) { ?>

                username = "<?php echo $_SESSION['username']; ?>";
            <?php } ?>
            $("#iframeloading").show();

            $.ajax({
                type: 'POST',
                url: "http://localhost/helper/?controller=Helperland&function=GetAddress",
                data: {
                    "getaddress": 5,
                    "username": username,
                },
                // dataType: 'json',
                success: function(data) {
                    $("#iframeloading").hide();
                    $("#alladdress").html(data);
                    // $("#alladdress").html(data);

                    // var street = data[0];
                    // var houseno = data[1];
                    // var location = data[2];
                    // var pincode = data[3];
                    // var mobile = data[4];
                    // var address = street + "  "+ houseno + ","+ location + "  "+pincode;
                    // alert(data);
                    // $(".addresse span").text(address);
                    // $(".phonenumber span").text(mobile);
                }
            });


        }
        GetAddress();

        function GetServiceProvider() {
            $("#iframeloading").show();

            $.ajax({
                type: 'POST',
                url: "http://localhost/helper/?controller=Helperland&function=GetServiceProvider",
                data: {
                    "getserviceprovider": 5,
                },
                // dataType: 'json',
                success: function(data) {
                    $("#iframeloading").hide();
                    // alert(data);
                    $('.favouriteserviceprovider').html(data);
                }
            });

        }
        // GetServiceProvider();


        function GetFavouriteServiceProvider() {
            <?php if (isset($_SESSION['username'])) { ?>

                var username = "<?php echo $_SESSION['username']; ?>";
            <?php } ?>
            $("#iframeloading").show();

            $.ajax({
                type: 'POST',
                url: "http://localhost/helper/?controller=Helperland&function=GetFavouriteServiceProvider",
                data: {
                    "getserviceproviders": 7,
                    "username": username,
                },
                // dataType: 'json',
                success: function(data) {
                    $("#iframeloading").hide();

                    // alert(data);
                    $('.favouriteserviceprovider').html(data);
                }
            });
        }


        function AddServieRequest() {
            <?php if (isset($_SESSION['username'])) { ?>

                username = "<?php echo $_SESSION['username']; ?>";

            <?php } ?>

            FinalSubmits = ({
                "addservicerequest": 11,
                "username": username,
                "selectdate": selectdate,
                "servicetime": selectime,
                "zipcode": pincode,
                "servicehourate": servicehourate,
                "servicehours": servicehours,
                "extrahour": extrahours,
                "totalhour": selecthour,
                "totalbed": selectbed,
                "totalbath": selectbath,
                "subtotal": SubTotal,
                "discount": Discount,
                "totalcost": TotalCost,
                "effectivecost": EffectiveCost,
                "extraservice": Extraservice,
                "comments": comments,
                "addressid": Address,
                "paymentrefno": paymentrefno,
                "paymentdue": paymentdue,
                "haspets": pets,
                "selectedsp": selectedsp,
            });
            $("#iframeloading").show();

            $.ajax({
                type: 'POST',
                url: "http://localhost/helper/?controller=Helperland&function=AddServiceRequest",
                data: FinalSubmits,
                // dataType: 'json',
                success: function(data) {
                    $("#iframeloading").hide();

                    if (data == 0) {
                        // alert('data not inserted');
                        Swal.fire({
                            title: 'Data not Inserted ',
                            text: 'Your id is ',
                            icon: 'error',
                            confirmButtonText: 'Done'
                        })
                    } else {
                        Swal.fire({
                            title: 'Booking has been successfully submitted',
                            text: 'Service Request Id: ' + data,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then(function() {
                            location.href = "Customer-Servicehistory.php";

                        });
                    }

                }
            });
        }


    });
</script>