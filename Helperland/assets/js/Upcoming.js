$(document).ready(function () {
  $('.mobile-nav .nav-item').removeClass('active');
  $('.mobile-nav .upcoming').addClass('active');

$("#servicetables").on('click', '.btn-cancel', function () {
    serviceid = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "http://localhost/helper/?controller=Helperland&function=GetSpecificServiceRequest",
        data: {
            'serviceid': serviceid,

        },
        dataType: "json",
        success: function (data) {
            $('.cancelmodalbutton').html(data[16]);
            $('.form-textarea').html(data[18]);

        }
    });
  
});

$("#servicetables").on("click", ".specialmodtext", function() {

    serviceid = $(this).attr('name');
    userid = $(this).attr('id');
    $.ajax({
      type: "POST",
      url: "http://localhost/helper/?controller=Helperland&function=GetSpecificServiceRequest",
      data: {
        'serviceid': serviceid,
        // 'userid':userid,
      },
      dataType: "json",
      success: function(data) {
        // var ms = data[2];
        // endtime = (ms * 3600) * 1000;
        // var date = new Date(endtime).toISOString();
        // endtime = date.slice(11, 16);
        $('.bookdate').html(data[0]);
        $('.bookstarttime').html(data[1]);
        $('.bookendtime').html(data[2]);
        $('.totalduration ').html(data[3]);
        $('.clientserviceid span').html(data[4]);
        $('.extraservices span').html(data[5]);
        $('.paids span').html(data[6]);
        $('.serviceaddress span').html(data[7]);
        $('.mobilenumber').html(data[9]);
        $('.commentsall span').html(data[11]);
        $('.petornot').html(data[12]);
        $('.spdetails1').html(data[24]);
        $('.spdetails2').html(data[24]);
        $('.customername span').html(data[21]);
        $('.acceptbtn').html(data[23]);

      }
    });
    // console.log(name);
});

$('#bookingdetails ').on('click', ".btn-completed", function() {
    serviceid = $(this).attr('id');
    // console.log(serviceid);
    $.ajax({
      type: "POST",
      url: "http://localhost/helper/?controller=Helperland&function=CompleteRequest",
      data: {
        'serviceid': serviceid,
      },
      dataType: "json",
      success: function(data) {
        if (data == 1) {

          Swal.fire({
            title: 'Service Request Has Been Completed Succesfully',
            text: 'Service Request Id: ' + serviceid,
            icon: 'success',
            confirmButtonText: 'Done'
          });

        }
        if (data == 0) {

          Swal.fire({
            title: 'Service Request Not Completed ',
            text: 'Service Request Id: ' + serviceid,
            icon: 'error',
            confirmButtonText: 'Ok'
          });
        }
        $("#servicetables").DataTable().ajax.reload();
      }
    });


  });

  $("#cancelmodal").on("click", ".finalcancel", function(e) {
    e.preventDefault();
    serviceid = $(this).attr('id');
    cancelreason = $('.cancelreason').val();
    $("#iframeloading").show();
    $.ajax({
      type: "POST",
      url: "http://localhost/helper/?controller=Helperland&function=CancelServiceRequestSP",
      data: {
        'serviceid': serviceid,
        'hasissue': cancelreason,
      },
      success: function(data) {
        if (data == 1) {
          Swal.fire({
            title: 'Your service request canceled successfully',
            text: 'Cancelled Request Id : ' + serviceid,
            icon: 'success',
            confirmButtonText: 'Done'
          });


        }
        if (data == 0) {
          Swal.fire({
            title: 'Your Service Request Has Been not Cancelled',
            text: 'Please Try Again',
            icon: 'error',
            confirmButtonText: 'Done'
          });

        }
        $("#iframeloading").hide();

        $("#servicetables").DataTable().ajax.reload();
      }
    });
  });

  $('#cancelmodal').on("input",".cancelreason", function() {
    regexp = '^\S.*$';

    if ($('.cancelreason').val().length < 4) {
        $(".finalcancel").attr("disabled", "disabled");
        $(".finalcancel").css("cursor", "not-allowed");


    }
    // else if (regexp.test($('.cancelreason').val())) {
    //     $(".finalcancel").attr("disabled", "disabled");
    //     $(".finalcancel").css("cursor", "not-allowed");

    // }
    if ($('.cancelreason').val().length >= 4) {
        $(".finalcancel").removeAttr("disabled");
        $(".finalcancel").css("cursor", "pointer");


    }

});

});