$(document).ready(function () {


    $('.shows select').select2();
    $('.nav-item').removeClass('active');
    $('#customerdashboard').addClass('active');
    // Tommorow Date
    var tomorrow = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
    var tomday = tomorrow.getDate();
    var tommonth = tomorrow.getMonth() + 1;
    var tomyear = tomorrow.getFullYear();
    if (tomday < 10) {
        tomday = '0' + tomday
    }
    if (tommonth < 10) {
        tommonth = '0' + tommonth
    }
    tomorrow = tomday + '/' + tommonth + '/' + tomyear;
    $("#selectdate").attr("value", tomorrow);
    $("#selectime").select2();
    $("#dashboardtable").on("click", ".specialmodaltext", function () {

        serviceid = $(this).attr('name');
        $.ajax({
            type: "POST",
            url: "http://localhost/helper/?controller=Helperland&function=GetSpecificServiceRequest",
            data: {
                'serviceid': serviceid,

            },
            dataType: "json",
            success: function (data) {
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
                $('.billingaddress span').html(data[8]);
                $('.mobilenumber').html(data[9]);
                $('.clientemail span').html(data[10]);
                $('.commentsall span').html(data[11]);
                $('.petornot').html(data[12]);
                $('.reschedulebuttons').html(data[13]);
                $('.cancelbuttons').html(data[14]);
                $('.spdetails1').html(data[20]);
                $('.spdetails2').html(data[20]);

                // var obj = jQuery.parseJSON(data);
                // alert(data[0]);
                // console.log(data[0]);
                // alert(data['pets']);
            }
        });
        // console.log(name);
    });

    $("#dashboardtable").on("click", ".reschedule", function () {

        serviceid = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "http://localhost/helper/?controller=Helperland&function=GetSpecificServiceRequest",
            data: {
                'serviceid': serviceid,

            },
            dataType: "json",
            success: function (data) {
                $('.reschedulemodalbutton').html(data[15]);
                $('.selectyourtime').html(data[17]);
                $('.selectnewdates').html(data[19]);


            }
        });


    });

    $("#bookingdetails").on('click', '.rescheduleconfirms', function () {
        serviceid = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "http://localhost/helper/?controller=Helperland&function=GetSpecificServiceRequest",
            data: {
                'serviceid': serviceid,

            },
            dataType: "json",
            success: function (data) {
                $('.reschedulemodalbutton').html(data[15]);
                $('.selectyourtime').html(data[17]);
                $('.selectnewdates').html(data[19]);
            //    var totalscheduletime =  parseFloat(data[3]);
            }
        });
    });

  

    $("#bookingdetails").on('click', '.cancelconfirm', function () {
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
    $("#dashboardtable").on('click', '.cancel', function () {
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


    $("#cancelmodal").on("click", function() {

        $('.cancelreason').on("input", function() {
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

        })
      
        // $('.cancelreason')
    });
    $("#rescheduletime").on("click", function() {
        var selectedtimes = parseFloat($('#selectime').val());
        // alert(selectedtimes);
        totalscheduletime = $(".selectnewdates p").attr("id");
        totalscheduletime = parseFloat(totalscheduletime);
        // alert(totalscheduletime);
        totaltimesh = selectedtimes + totalscheduletime;

        if (totaltimesh >= 21) {
            // alert('it work');
            $('.timingerr').text("Please Select less than 21 hour time to Complete Service");
        } else {
            $('.timingerr').text("");

        }
        // alert('it work');
        // selecttimes();

        if ($('.timingerr').text() != "") {
            $('.rescheduleconfirm').attr("disabled", "disabled");
            $('.rescheduleconfirm').css("cursor", "not-allowed");
            // alert('it work');
        }
        if ($('.timingerr').text() == "") {
            $('.rescheduleconfirm').removeAttr("disabled");
            $('.rescheduleconfirm').css("cursor", "pointer");
            // alert('it work');
        }

      

    });
    $("#rescheduletime ").on("click",".rescheduleconfirm",  function(e) {
        e.preventDefault();
        // alert('it work');
        serviceid = $(this).attr('id');
        newtime = $('#selectime option:selected').text();
        newdate = $("#selectdate").val();
        $("#iframeloading").show();

        $.ajax({
            type: "POST",
            url: "http://localhost/helper/?controller=Helperland&function=UpdateUserBookingDate",
            data: {
                'serviceid': serviceid,
                'newtime': newtime,
                'newdate': newdate,
            },
            // dataType: "dataType",
            success: function(data) {
                if (data == 1) {
                    Swal.fire({
                        title: 'Your Booking Has Been Reschedule Successfully',
                        text: 'Reschedule Request Id : ' + serviceid,
                        icon: 'success',
                        confirmButtonText: 'Done'
                    });

                }
                if (data == 0) {
                    Swal.fire({
                        title: 'Your Booking Has Been Not Reschedule ',
                        text: 'Please Try Again',
                        icon: 'error',
                        confirmButtonText: 'Done'
                    });

                }
                $("#iframeloading").hide();
                
                $("#dashboardtable").DataTable().ajax.reload();
                // CustomerDashboard();

            }
        });
    });
    $("#cancelmodal").on("click",".finalcancel", function(e) {
        e.preventDefault();
        serviceid = $(this).attr('id');
        cancelreason = $('.cancelreason').val();
        $("#iframeloading").show();
        $.ajax({
            type: "POST",
            url: "http://localhost/helper/?controller=Helperland&function=CancelServiceRequest",
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
                
                $("#dashboardtable").DataTable().ajax.reload();
            }
        });
    });
    function selecttimes() {

        var selectedtimes = parseFloat($('#selectime').val());
        totalscheduletime = $(".selectnewdateandtime p").attr("id");
        totalscheduletime = parseFloat( totalscheduletime);
        totaltimesh = selectedtimes + totalscheduletime;

        if (totaltimesh >= 21) {
            // alert('it work');
            $('.timingerr').text("Please Select less than 21 hour time to Complete Service");
        } else {
            $('.timingerr').text("");

        }
    }

});

