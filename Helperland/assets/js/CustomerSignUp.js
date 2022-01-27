// Email exists or not
$(document).ready(function () {
    $(".check_email").keyup(function () {
        var email = $(".check_email").val();
        // alert(email)

        $.ajax({
            type: 'POST',
            url: "http://localhost/helper/?controller=Helperland&function=CheckEmail",
            data: {
                "check_emails": 1,
                "email_id": email,
            },
            success: function (response) {
                // alert(response);
                // alert(email);
                   $(".error-email").text(response);
            }
        });


    });
});


// Form Validation


$(document).ready(function () {

    $('#firstName').on('input', function () {
        var firstName = $(this).val();
        var validName = /^[a-zA-Z ]*$/;
        if (firstName.length == 0) {
            $('.first-name-msg').addClass('invalid-msg').text("First Name is required");
            $(this).addClass('invalid-input').removeClass('valid-input');

        }
        else if (!validName.test(firstName)) {
            $('.first-name-msg').addClass('invalid-msg').text('only characters & Whitespace are allowed');
            $(this).addClass('invalid-input').removeClass('valid-input');

        }
        else {
            $('.first-name-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }
    });

    $('#lastname').on('input', function () {
        var lastName = $(this).val();
        var validName = /^[a-zA-Z ]*$/;
        if (lastName.length == 0) {
            $('.last-name-msg').addClass('invalid-msg').text("Last Name is required");
            $(this).addClass('invalid-input').removeClass('valid-input');

        }
        else if (!validName.test(lastName)) {
            $('.last-name-msg').addClass('invalid-msg').text('only characters & Whitespace are allowed');
            $(this).addClass('invalid-input').removeClass('valid-input');

        }
        else {
            $('.last-name-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }
    });
    //   useremail
    $('#useremail').on('input', function () {
        var emailAddress = $(this).val();
        var validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (emailAddress.length == 0) {
            $('.email-msg').addClass('invalid-msg').text('Email is required');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else if (!validEmail.test(emailAddress)) {
            $('.email-msg').addClass('invalid-msg').text('Invalid Email Address');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else {
            $('.email-msg').empty();
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

    // Password Validation
    $('#password').on('input', function () {
        var password = $(this).val();
        var cpassword = $('#cpassword').val();
        var uppercasePassword = /(?=.*?[A-Z])/;
        var lowercasePassword = /(?=.*?[a-z])/;
        var digitPassword = /(?=.*?[0-9])/;
        var spacesPassword = /^$|\s+/;
        var symbolPassword = /(?=.*?[#?!@$%^&*-])/;
        var minEightPassword = /.{8,}/;
        if (password.length == 0) {
            $('.password-msg').addClass('invalid-msg').text('Password is required');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else if (!uppercasePassword.test(password)) {
            $('.password-msg').addClass('invalid-msg').text('At least one Uppercase');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else if (!lowercasePassword.test(password)) {
            $('.password-msg').addClass('invalid-msg').text('At least one Lowercase');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else if (!digitPassword.test(password)) {
            $('.password-msg').addClass('invalid-msg').text('At least one digit');
            $(this).addClass('invalid-input').removeClass('valid-input');
        } else if (!symbolPassword.test(password)) {
            $('.password-msg').addClass('invalid-msg').text('At least one special character');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else if (spacesPassword.test(password)) {
            $('.password-msg').addClass('invalid-msg').text('Whitespaces are not allowed');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else if (!minEightPassword.test(password)) {
            $('.password-msg').addClass('invalid-msg').text('Minimum length 8');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else if (cpassword.length > 0) {
            if (password != cpassword) {
                $('.cpassword-msg').addClass('invalid-msg').text('must be matched');
                $('#cpassword').addClass('invalid-input').removeClass('valid-input');
            }
            else {
                $('.cpassword-msg').empty();
                $('#cpassword').addClass('valid-input').removeClass('invalid-input');
            }
            $('#password').addClass('valid-input').removeClass('invalid-input');
            $('.password-msg').empty();
        }
        else {
            $('.password-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }
    });
    // valiadtion for Confirm Password
    $('#cpassword').on('input', function () {
        var password = $('#password').val();
        var cpassword = $(this).val();
        if (cpassword.length == 0) {
            $('.cpassword-msg').addClass('invalid-msg').text('Confirm password is required');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else if (cpassword != password) {
            $('.cpassword-msg').addClass('invalid-msg').text('must be matched');
            $(this).addClass('invalid-input').removeClass('valid-input');
        }
        else {
            $('.cpassword-msg').empty();
            $(this).addClass('valid-input').removeClass('invalid-input');
        }
    });

    $("#inlineFormCheck").on('input', function () {
        if ($('input[type=checkbox]:checked').length != 1) {
            $('.checbox-msg').addClass('invalid-msg').text("You Must agree with Privacy");
        }
        else {
            $('.checbox-msg').addClass('valid-msg').text("");
        }
    });
    // validation to submit the form
    $('input').on('input', function (e) {
        if ($('input[type=checkbox]:checked').length == 1) {
            if ($('#signup').find('.valid-input').length == 6) {
                $('#submit-btn').removeAttr('disabled');

            }
        }
        else {
            e.preventDefault();
            $('#submit-btn').attr('disabled', 'disabled')

        }

    });

});


