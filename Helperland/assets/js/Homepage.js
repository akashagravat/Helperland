// Email exists or not
$(document).ready(function () {
  $(".forgot_email").keyup(function () {
    var emails = $(".forgot_email").val();
    // alert(email)

    $.ajax({
      type: 'POST',
      url: "http://localhost/helper/?controller=helperland&function=ForgotCheckEmail",
      data: {
        "check_emails": 1,
        "email_id": emails,
      },
      success: function (responses) {
        $(".error-emails").text(responses);
        // alert(responses);
      }
    });


  });
});




window.addEventListener('scroll', function () {
  let nav = document.querySelector('nav');
  let windowPosition = window.scrollY > 0;
  nav.classList.toggle('scrolling-active', windowPosition);

});

$(document).ready(function () {
  $('.ok').click(function () {
    $(".privacy-policy").css({ "display": "none", "transition-delay": ".2s" });
  })
});



$(document).ready(function () {

  if (window.location.href.indexOf('#LoginModal') != -1) {

    $('#LoginModal').modal('show');

    $('#LoginModal .close').click(function () {
      window.location.href = "";
    });

  }
  if (window.location.href.indexOf('#ResetModal') != -1) {
    $('#ResetModal').modal('show');
  }



});



$(document).ready(function () {
  //   Login email
  $('#loginemail').on('input', function () {
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
});



$(document).ready(function () {
  // Forgot email verification
  $('#forgotemail').on('input', function () {
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
});