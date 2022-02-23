$(document).ready(function () {
    $(".mobile-nav .nav-item").removeClass("active");
    $(".navsetting").addClass("active");
    $('.firstName').on('input', function () {
        var firstName = $(this).val();
        var validName = /^[a-zA-Z]*$/;
        if (firstName.length == 0) {
            $('.first-name-msg').addClass('invalid-msg').text("First Name is required");
            $(this).addClass('invalid-input').removeClass('valid-input');

        } else if (!validName.test(firstName)) {
            $('.first-name-msg').addClass('invalid-msg').text('only characters are allowed');
            $(this).addClass('invalid-input').removeClass('valid-input');

        } else {
            $('.first-name-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }
    });

    $('.lastname').on('input', function () {
        var lastName = $(this).val();
        var validName = /^[a-zA-Z]*$/;
        if (lastName.length == 0) {
            $('.last-name-msg').addClass('invalid-msg').text("Last Name is required");
            $(this).addClass('invalid-input').removeClass('valid-input');

        } else if (!validName.test(lastName)) {
            $('.last-name-msg').addClass('invalid-msg').text('only characters are allowed');
            $(this).addClass('invalid-input').removeClass('valid-input');

        } else {
            $('.last-name-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }

    });

    //   Phone Number validation
    $('#mobilenumber').on('input', function () {
        var mobileNum = $(this).val();
        var validNumber = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
        if (mobileNum.length == 0) {
            $('.mobile-msg').addClass('invalid-msg').text('Mobile Number is required');
            $(this).addClass('invalid-input').removeClass('valid-input');
        } else if (!validNumber.test(mobileNum)) {
            $('.mobile-msg').addClass('invalid-msg').text('Invalid Mobile Number');
            $(this).addClass('invalid-input').removeClass('valid-input');
        } else if (mobileNum.length != 10) {
            $('.mobile-msg').addClass('invalid-msg').text('Mobile Number Must be only 10 Digit');
            $(this).addClass('invalid-input').removeClass('valid-input');
        } else {
            $('.mobile-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }

    });


    $('.birthdates').on("click", function () {
        if (($('#dateofbirth').val() == "Day" || $('#dateofmonth').val() == "Month" || $(
            '#birthyear').val() == "Year")) {
            $('.date-error').addClass('invalid-msg').text("Enter Valid Birthdate");
            $('.save-details').addClass('disabled');

        } else {
            $('.date-error').empty();
            $('.save-details').removeClass('disabled');


        }
    });

    $('.selectlanguage').on("click", function () {
        if ($('#language').val() == "") {
            $('.language-error').addClass('invalid-msg').text("Enter Valid Language");
            $('.save-details').addClass('disabled');

        } else {
            $('.language-error').empty();
            $('.save-details').removeClass('disabled');


        }
    });

    $('#details').on('input', function (e) {
        e.preventDefault();
        if ($('#details').find('.invalid-input').length > 0) {
            $('.save-details').addClass('disabled');
        } else {
            $('.save-details').removeClass('disabled');
        }

    });


    // Password Validation
    $('#newpassword').on('input', function () {
        var password = $(this).val();
        var cpassword = $('#confirmpassword').val();
        var uppercasePassword = /(?=.*?[A-Z])/;
        var lowercasePassword = /(?=.*?[a-z])/;
        var digitPassword = /(?=.*?[0-9])/;
        var spacesPassword = /^$|\s+/;
        var symbolPassword = /(?=.*?[#?!@$%^&*-])/;
        var minEightPassword = /.{8,}/;
        if (password.length == 0) {
            $('.password-msg').addClass('invalid-msg').text('Password is required');
            $(this).addClass('invalid-input').removeClass('valid-input');
        } else if (!uppercasePassword.test(password)) {
            $('.password-msg').addClass('invalid-msg').text('At least one Uppercase');
            $(this).addClass('invalid-input').removeClass('valid-input');
        } else if (!lowercasePassword.test(password)) {
            $('.password-msg').addClass('invalid-msg').text('At least one Lowercase');
            $(this).addClass('invalid-input').removeClass('valid-input');
        } else if (!digitPassword.test(password)) {
            $('.password-msg').addClass('invalid-msg').text('At least one digit');
            $(this).addClass('invalid-input').removeClass('valid-input');
        } else if (!symbolPassword.test(password)) {
            $('.password-msg').addClass('invalid-msg').text('At least one special character');
            $(this).addClass('invalid-input').removeClass('valid-input');
        } else if (spacesPassword.test(password)) {
            $('.password-msg').addClass('invalid-msg').text('Whitespaces are not allowed');
            $(this).addClass('invalid-input').removeClass('valid-input');
        } else if (!minEightPassword.test(password)) {
            $('.password-msg').addClass('invalid-msg').text('Minimum length 8');
            $(this).addClass('invalid-input').removeClass('valid-input');
        } else if (cpassword.length > 0) {
            if (password != cpassword) {
                $('.cpassword-msg').addClass('invalid-msg').text('must be matched');
                $('#confirmpassword').addClass('invalid-input').removeClass('valid-input');
            } else {
                $('.cpassword-msg').empty();
                $('#confirmpassword').addClass('valid-input').removeClass('invalid-input');
            }
            $('#newpassword').addClass('valid-input').removeClass('invalid-input');
            $('.password-msg').empty();
        } else {
            $('.password-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }
    });
    // valiadtion for Confirm Password
    $('#confirmpassword').on('input', function () {
        var password = $('#newpassword').val();
        var cpassword = $(this).val();
        if (cpassword.length == 0) {
            $('.cpassword-msg').addClass('invalid-msg').text('Confirm password is required');
            $(this).addClass('invalid-input').removeClass('valid-input');
        } else if (cpassword != password) {
            $('.cpassword-msg').addClass('invalid-msg').text('must be matched');
            $(this).addClass('invalid-input').removeClass('valid-input');
        } else {
            $('.cpassword-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }
    });
    $('#passwordchange').on('input', function (e) {
        e.preventDefault();
        if ($('#passwordchange').find('.invalid-input').length > 0) {
            $('.changepassword').addClass('disabled');
        } else {
            $('.changepassword').removeClass('disabled');
        }

    });
});

// Add address Validation
$(document).ready(function () {
    $('.vertical-nav .nav-item').removeClass('active');

    // Street Validation
    $('#street').on('input', function () {
        var lastName = $(this).val();
        var validName = /^[a-zA-Z]*$/;;
        if (lastName.length == 0) {
            $('.street-msg').addClass('invalid-msg').text("Street is required");
            $(this).addClass('invalid-input').removeClass('valid-input');

        }
        else if (!validName.test(lastName)) {
            $('.street-msg').addClass('invalid-msg').text('White Space and Number Are not Allowed');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else {
            $('.street-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }
    });

    //   Phone Number validation
    $('#mobilenum').on('input', function () {
        var mobileNum = $(this).val();
        var validNumber = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
        if (mobileNum.length == 0) {
            $('.mobile-msg').addClass('invalid-msg').text('Mobile Number is required');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else if (!validNumber.test(mobileNum)) {
            $('.mobile-msg').addClass('invalid-msg').text('Invalid Mobile Number');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else {
            $('.mobile-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }
    });
    // Postal Code Validation
    $('#pincode').on('input', function () {

        if ($.trim($('#pincode').val()).length == 0) {
            $(this).addClass('invalid-input').removeClass('valid-input');
            $('.postal_number').addClass('invalid-msg').text("Postal Code is Required");
        } else if ($.trim($('#pincode').val()).length != 6) {
            $(this).addClass('invalid-input').removeClass('valid-input');
            $('.postal_number').addClass('invalid-msg').text("Enter Valid Postal Code");
        } else {
            $('.postal_number').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }
    });
    //   Phone Number validation
    $('#houseno').on('input', function () {
        var houseNum = $(this).val();
        var validNumber = /^\d*$/;
        if (houseNum.length == 0) {
            $('.house-msg').addClass('invalid-msg').text('House Number is required');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else if (!validNumber.test(houseNum)) {
            $('.house-msg').addClass('invalid-msg').text('Enter Valid House Number');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else {
            $('.house-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }
    });

    // validation to submit the form
    $('input').on('input', function (e) {

        if ($('#addaddress').find('.valid-input').length > 3) {
            $('.addresssave').removeAttr('disabled');
            $('.addresssave').css('cursor', 'pointer');
        }
        else {
            $('.addresssave').attr('disabled','disabled');
            $('.addresssave').css('cursor', 'not-allowed');
        }

    });

});


$(document).ready(function () {
    $('.save-details').on("click", function(e) {
        e.preventDefault();

        if (($('#dateofbirth').val() == "Day" || $('#dateofmonth').val() == "Month" || $(
                '#birthyear').val() == "Year" || $('#language').val() == "") || $('#details').find('.invalid-input').length > 0) {
            $('.errors').show();
            $('.errors').text('Please Enter All Details');
            setTimeout(function() {
                $(".errors").hide();
            }, 5000);
        } else {


            $('#iframeloading').show();
            firstname = $('#firstname').val();
            lastname = $('#lastname').val();
            email = $('#emailaddress').val();
            mobile = $('#mobilenumber').val();
            date = $('#dateofbirth').val();
            month = $('#dateofmonth').val();
            year = $('#birthyear').val();
            language = $('#language').val();
            birthdate = year + "-" + month + "-" + date;
            $(".lastname").removeClass('valid-input');
            $(".firstName").removeClass('valid-input');
            $("#mobilenumber").removeClass('valid-input');


            $.ajax({
                type: "POST",
                url: "http://localhost/helper/?controller=Helperland&function=AddCustomerDetails",
                data: {
                    'firstname': firstname,
                    'lastname': lastname,
                    'email': email,
                    'mobile': mobile,
                    'birthdate': birthdate,
                    'language': language,
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
                            icon: 'alert',
                            confirmButtonText: 'Done'
                        })
                    }
                    GetUserDetails();



                }
            });
        }
    });
    $('#addresstable').on("click", "input[name=addressradio]", function() {
        checkedradio = $('input[name=addressradio]:checked').val();
        $("#iframeloading").show();
        $.ajax({
            type: "POST",
            url: "http://localhost/helper/?controller=Helperland&function=ChangeDefaultAddress",
            data: {
                'checkedradio': checkedradio,
            },
            // dataType: "dataType",
            success: function(data) {
                if (data == 1) {
                    $('.addressmsg').show().text("Default invoicing address updated successfully");
                    setTimeout(function() {
                        $(".addressmsg").hide();
                    }, 5000);
                }
                if (data == 0) {
                    $('.addresserr').show().text("Default invoicing address Not Updated");
                    setTimeout(function() {
                        $(".addresserr").hide();
                    }, 5000);

                }
                $("#iframeloading").hide();

                $('#addresstable').DataTable().ajax.reload();

            }
        });
    });

    $(".addnewaddress").on("click", function() {

        // e.preventDefault();
        // alert('it work');
        //    alert(data);
        $("#street").val("");
        $("#houseno").val("");
        $('#location').html("");
        $("#pincode").val("");
        $("#mobilenum").val("");
        $("#AddAddress").text("\n                        Add New Address\n                    ");
        $(".UpdateAddress").css("display","none");
        $(".addresssave").css("display","block");
        removeclass();


    });
    $("#addresstable").on("click", ".editaddress", function() {

        addressid = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "http://localhost/helper/?controller=Helperland&function=EditAddressPopup",
            data: {
                'addressid': addressid,

            },
            dataType: "json",
            success: function(data) {
                //    alert(data);
                $(".UpdateAddress").css("display","block");
                $("#street").val(data[0]);
                $("#houseno").val(data[1]);
                $('#location').html(data[2]);
                $("#pincode").val(data[3]);
                $("#mobilenum").val(data[4]);
                $(".UpdateAddress").attr("id", data[5]);
                $("#AddAddress").text("\n                        Edit Address\n                    ");
                $(".addresssave").css("display","none");
                $(".UpdateAddress").removeAttr("disabled");
                removeclass();
            }
        });


    });
    $("#addresstable").on("click", ".deleteaddress", function() {

            addressid = $(this).attr('id');
            $.ajax({
                type: "POST",
                url: "http://localhost/helper/?controller=Helperland&function=EditAddressPopup",
                data: {
                    'addressid': addressid,

                },
                dataType: "json",
                success: function(data) {
                    
                    $(".deleteaddress").attr("id", data[5]);

                }
            });


        });

    function removeclass() {
        $("#houseno").removeClass('invalid-input');
        $("#houseno").removeClass('valid-input');

        $("#street").removeClass('invalid-input');
        $("#street").removeClass('valid-input');
        $("#mobilenum").removeClass('invalid-input');
        $("#mobilenum").removeClass('valid-input');
        $("#pincode").removeClass('invalid-input');
        $("#pincode").removeClass('valid-input');
        $('.house-msg').empty();
        $('.postal_number').empty();
        $('.mobile-msg').empty();
        $('.street-msg').empty();

    }

    $('input').on('input', function(e) {

        if ($('#addaddress').find('.valid-input').length > 0 && $('#addaddress').find('.invalid-input').length == 0) {
            $('.UpdateAddress').removeAttr('disabled');
            $('.UpdateAddress').css('cursor', 'pointer');
        } else {
            $('.UpdateAddress').attr('disabled', 'disabled');
            $('.UpdateAddress').css('cursor', 'not-allowed');
        }

    });
    $("#addaddress").on("click", ".UpdateAddress", function() {
        // e.preventDefault();
        $("#iframeloading").show();

        // alert('it work');
        addressid = $(this).attr('id');
        var street = $.trim($("#street").val());
        var houseno = $.trim($("#houseno").val());
        var pincode = $.trim($("#pincode").val());
        var location = $.trim($("#location").val());
        var mobilenum = $.trim($("#mobilenum").val());
        $.ajax({
            type: 'POST',
            url: "http://localhost/helper/?controller=Helperland&function=UpdateCustomerAddress",
            data: {
                "street": street,
                "houseno": houseno,
                "pincode": pincode,
                "location": location,
                "mobilenum": mobilenum,
                "addressid": addressid,
            },

            success: function(data) {
                if (data == 1) {
                    $("#iframeloading").hide();

                    Swal.fire({
                        title: 'Your Address Has Been Updated Successfully',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'Done'
                    });
                    // GetAddress();
                }
                if (data == 0) {
                    $("#iframeloading").hide();
                    Swal.fire({
                        title: 'Address has been not Updated',
                        text: 'Please Provide at least one new detail',
                        icon: 'warning',
                        confirmButtonText: 'Done'
                    });

                }
                $('#addresstable').DataTable().ajax.reload();
            }
        });
    });
    $("#deleteaddress").on("click", ".deleteaddress", function(e) {
        e.preventDefault();
        $("#iframeloading").show();
        // alert('it work');
        // alert('it work');
        addressid = $(this).attr('id');
         $.ajax({
            type: 'POST',
            url: "http://localhost/helper/?controller=Helperland&function=DeleteCustomerAddress",
            data: {
                "addressid": addressid,
            },

            success: function(data) {
                if (data == 1) {
                    $("#iframeloading").hide();

                    Swal.fire({
                        title: 'Your Address Has Been Deleted Successfully',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'Done'
                    });
                    // GetAddress();
                }
                if (data == 0) {
                    $("#iframeloading").hide();
                    Swal.fire({
                        title: 'Address has been not Deleted',
                        text: 'Please Try Again',
                        icon: 'error',
                        confirmButtonText: 'Done'
                    });

                }
                $('#addresstable').DataTable().ajax.reload();
            }
        });
    });

    $("#pincode").on("input", function() {
        pincode = $(this).val();
        //    PinCodeCity

        if ($("#pincode").val().length == 6) {
            $.ajax({
                type: "POST",
                url: "http://localhost/helper/?controller=Helperland&function=PinCodeCity",
                data: {
                    "postalcode": pincode,
                },
                //    dataType: "json",
                success: function(data) {

                    $('#location').html(data);
                }
            });
        }
    });
});