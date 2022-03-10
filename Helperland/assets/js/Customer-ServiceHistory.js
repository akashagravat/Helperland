$(document).ready(function () {
  $(".fa-star").css("color", "silver");

  $("#RateSP").hover(function () {
    $("#ratings1").hover(function () {
      $("#ratings2,#ratings3,#ratings4,#ratings5").css("color", "silver");
      $("#ratings1").css("color", "#ECB91C");
      $(".infomsg").text("1");
    });
    $("#ratings2").hover(function () {
      $("#ratings3,#ratings4,#ratings5").css("color", "silver");
      $("#ratings1,#ratings2").css("color", "#ECB91C");
      $(".infomsg").text("2");
    });
    $("#ratings3").hover(function () {
      $("#ratings4,#ratings5").css("color", "silver");
      $("#ratings1,#ratings2,#ratings3").css("color", "#ECB91C");
      $(".infomsg").text("3");
    });

    $("#ratings4").hover(function () {
      $("#ratings5").css("color", "silver");
      $("#ratings1,#ratings2,#ratings3,#ratings4").css("color", "#ECB91C");
      $(".infomsg").text("4");
    });

    $("#ratings5").hover(function () {
      $("#ratings1,#ratings2,#ratings3,#ratings4,#ratings5").css("color", "#ECB91C");
      $(".infomsg").text("5");
    });

    $("#friendly1").hover(function () {
      $("#friendly2,#friendly3,#friendly4,#friendly5").css("color", "silver");
      $("#friendly1").css("color", "#ECB91C");
      $(".friendlymsg").text("1");
    });
    $("#friendly2").hover(function () {
      $("#friendly3,#friendly4,#friendly5").css("color", "silver");
      $("#friendly1,#friendly2").css("color", "#ECB91C");
      $(".friendlymsg").text("2");
    });
    $("#friendly3").hover(function () {
      $("#friendly4,#friendly5").css("color", "silver");
      $("#friendly1,#friendly2,#friendly3").css("color", "#ECB91C");
      $(".friendlymsg").text("3");
    });

    $("#friendly4").hover(function () {
      $("#friendly5").css("color", "silver");
      $("#friendly1,#friendly2,#friendly3,#friendly4").css("color", "#ECB91C");
      $(".friendlymsg").text("4");
    });

    $("#friendly5").hover(function () {
      //    $(".fa-star").css("color", "silver");
      $("#friendly1,#friendly2,#friendly3,#friendly4,#friendly5").css("color", "#ECB91C");
      $(".friendlymsg").text("5");
    });

    $("#quality1").hover(function () {
      $("#quality2,#quality3,#quality4,#quality5").css("color", "silver");
      $("#quality1").css("color", "#ECB91C");
      $(".qualitymsg").text("1");
    });
    $("#quality2").hover(function () {
      $("#quality3,#quality4,#quality5").css("color", "silver");
      $("#quality1,#quality2").css("color", "#ECB91C");
      $(".qualitymsg").text("2");
    });
    $("#quality3").hover(function () {
      $("#quality4,#quality5").css("color", "silver");
      $("#quality1,#quality2,#quality3").css("color", "#ECB91C");
      $(".qualitymsg").text("3");
    });

    $("#quality4").hover(function () {
      $("#quality5").css("color", "silver");
      $("#quality1,#quality2,#quality3,#quality4").css("color", "#ECB91C");
      $(".qualitymsg").text("4");
    });

    $("#quality5").hover(function () {
      //    $(".fa-star").css("color", "silver");
      $("#quality1,#quality2,#quality3,#quality4,#quality5").css("color", "#ECB91C");
      $(".qualitymsg").text("5");
    });



  });
  $("#RateSP").on("click", function () {
    $(".ratingfortimearrival").on("click", function () {

      $("#ratings1").click(function () {
        $("#ratings2,#ratings3,#ratings4,#ratings5").css("color", "silver");
        $("#ratings1").css("color", "#ECB91C");
        $(".infomsg").text("1");
      });
      $("#ratings2").click(function () {
        $("#ratings3,#ratings4,#ratings5").css("color", "silver");
        $("#ratings1,#ratings2").css("color", "#ECB91C");
        $(".infomsg").text("2");
      });
      $("#ratings3").click(function () {
        $("#ratings4,#ratings5").css("color", "silver");
        $("#ratings1,#ratings2,#ratings3").css("color", "#ECB91C");
        $(".infomsg").text("3");
      });

      $("#ratings4").click(function () {
        $("#ratings5").css("color", "silver");
        $("#ratings1,#ratings2,#ratings3,#ratings4").css("color", "#ECB91C");
        $(".infomsg").text("4");
      });

      $("#ratings5").click(function () {
        $("#ratings1,#ratings2,#ratings3,#ratings4,#ratings5").css("color", "#ECB91C");
        $(".infomsg").text("5");
      });

    });

    $(".ratingforfriendly").on("click", function () {

      $("#friendly1").click(function () {
        $("#friendly2,#friendly3,#friendly4,#friendly5").css("color", "silver");
        $("#friendly1").css("color", "#ECB91C");
        $(".friendlymsg").text("1");
      });
      $("#friendly2").click(function () {
        $("#friendly3,#friendly4,#friendly5").css("color", "silver");
        $("#friendly1,#friendly2").css("color", "#ECB91C");
        $(".friendlymsg").text("2");
      });
      $("#friendly3").click(function () {
        $("#friendly4,#friendly5").css("color", "silver");
        $("#friendly1,#friendly2,#friendly3").css("color", "#ECB91C");
        $(".friendlymsg").text("3");
      });

      $("#friendly4").click(function () {
        $("#friendly5").css("color", "silver");
        $("#friendly1,#friendly2,#friendly3,#friendly4").css("color", "#ECB91C");
        $(".friendlymsg").text("4");
      });

      $("#friendly5").click(function () {
        //    $(".fa-star").css("color", "silver");
        $("#friendly1,#friendly2,#friendly3,#friendly4,#friendly5").css("color", "#ECB91C");
        $(".friendlymsg").text("5");
      });
    });
    $(".ratingforquality").on("click", function () {

      $("#quality1").click(function () {
        $("#quality2,#quality3,#quality4,#quality5").css("color", "silver");
        $("#quality1").css("color", "#ECB91C");
        $(".qualitymsg").text("1");
      });
      $("#quality2").click(function () {
        $("#quality3,#quality4,#quality5").css("color", "silver");
        $("#quality1,#quality2").css("color", "#ECB91C");
        $(".qualitymsg").text("2");
      });
      $("#quality3").click(function () {
        $("#quality4,#quality5").css("color", "silver");
        $("#quality1,#quality2,#quality3").css("color", "#ECB91C");
        $(".qualitymsg").text("3");
      });

      $("#quality4").click(function () {
        $("#quality5").css("color", "silver");
        $("#quality1,#quality2,#quality3,#quality4").css("color", "#ECB91C");
        $(".qualitymsg").text("4");
      });

      $("#quality5").click(function () {
        //    $(".fa-star").css("color", "silver");
        $("#quality1,#quality2,#quality3,#quality4,#quality5").css("color", "#ECB91C");
        $(".qualitymsg").text("5");
      });


    });
  });


});


$(document).ready(function () {
  // $( ".cardview" ).each(function(){
  //     var table = $(".cardview").DataTable();
  // });


  $('.shows select').select2();
});


$(document).ready(function () {
  var options = {
    "separator": ",",
    "filename": "Customer-ServiceHistory.csv",
  }
  $("#btnExport").on('click', function () {
    $('#tblservicehistory').table2csv(options);
  });
});


$(document).ready(function () {
  $("#tblservicehistory").on("click", ".specialmodaltext", function (e) {
    // alert('it work');
    e.preventDefault();
    serviceid = $(this).attr('name');
    $.ajax({
      type: "POST",
      url: "http://localhost/helper/?controller=Helperland&function=GetSpecificServiceRequest",
      data: {
        'serviceid': serviceid,

      },
      dataType: "json",
      success: function (data) {

        $('.bookdate').html(data[0]);
        $('.bookstarttime').html(data[1]);
        $('.bookendtime').html(data[2]);
        $('.totalduration ').html(data[3]);
        $('.clientserviceid span').html(data[4]);
        $('.extraservices span').html(data[5]);
        $('.paids span').html(data[6]);
        $('.serviceaddress span').html(data[7]);
        $('.billingaddress span').html(data[8]);
        $('.mobilenumber').html(data[9]);
        $('.clientemail span').html(data[10]);
        $('.commentsall span').html(data[11]);
        $('.petornot').html(data[12]);

        $('.spdetails1').html(data[20]);
        $('.spdetails2').html(data[20]);

        // var obj = jQuery.parseJSON(data);
        // alert(data[0]);
        // console.log(data[0]);
        // alert(data['pets']);
        // $("#tblservicehistory").DataTable().ajax.reload();
      }
    });


  });
  $("#tblservicehistory").on("click", function () {
    $("#tblservicehistory").on("click", ".ratesp", function () {
      serviceid = $(this).attr('id');

      $.ajax({
        type: "POST",
        url: "http://localhost/helper/?controller=Helperland&function=GetSPDetails",
        data: {
          'serviceid': serviceid,
        },
        dataType: "json",
        success: function (data) {
          // alert(data[0]);
          $(".spalldetails").html(data[0]);
          $(".ratings1s").html(data[1]);
          $(".ratings2").html(data[2]);
          $(".ratings3").html(data[3]);
          $(".starratings .fa-star").css({ "color": "silver" });
          $(".spalldetails .fa-star").css({ "margin-right": "2px" });

          $('.rateservicepro').attr('id', data[4]);
          $('.givefeedback').html(data[5]);
        }
      });

    });
  });
 
});