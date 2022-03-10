<script>
    $(document).ready(function () {

        $('.changepassword').on("click", function(e) {
            e.preventDefault();

            if ($("#confirmpassword").val() == "" || $("#newpassword").val() == "" || $("#currentpassword").val() == "") {
                $('.passworderror').text("Please Enter All Fields");
                $('.passworderror').show();
                setTimeout(function() {
                    $(".passworderror").hide();
                }, 5000);
            } else {
                $("#iframeloading").show();
                currentpassword = $("#currentpassword").val();
                newpassword = $("#newpassword").val();
                newconfirmpassword = $("#confirmpassword").val();
                firstname = $("#firstname").val();
                lastname = $("#lastname").val();
                modifiedby = firstname + " " + lastname;
                $.ajax({
                    type: "POST",
                    url: "http://localhost/helper/?controller=Helperland&function=UpdatePassword",
                    data: {
                        'username': username,
                        'currentpassword': currentpassword,
                        'newpassword': newpassword,
                        'newconfirmpassword': newconfirmpassword,
                        'modifiedby': modifiedby,
                    },
                    success: function(data) {
                        $("#iframeloading").hide();
                        if (data == 1) {
                            $("#newpassword").val("");
                            $("#newpassword").removeClass('valid-input');
                            $("#currentpassword").removeClass('valid-input');

                            $("#currentpassword").val("");
                            $("#confirmpassword").val("");

                            $("#confirmpassword").removeClass('valid-input');

                            Swal.fire({
                                title: 'Your Password Has Been Updated Successfully',
                                text: '',
                                icon: 'success',
                                confirmButtonText: 'Done'
                            });
                        }
                        if (data == 0) {
                            $('.passworderror').text("Current Password is Invalid");
                            $('.passworderror').show();
                            setTimeout(function() {
                                $(".passworderror").hide();
                            }, 5000);
                        }
                        if (data == 2) {
                            $('.passworderror').text("Password Not Updated");
                            $('.passworderror').show();
                            setTimeout(function() {
                                $(".passworderror").hide();
                            }, 5000);
                        }
                    }
                });

            }


        });

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