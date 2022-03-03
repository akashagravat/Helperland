$(document).ready(function () {
    $('.vertical-nav .nav-item').removeClass('active');
    $('.newservice').addClass('active');
    $('.mobile-nav .nav-item').removeClass('active');
    $('.mobile-nav .navservicehistory').addClass('active');

    $("#SPdashboardtable").on("click", ".specialmodtext", function() {

        serviceid = $(this).attr('name');
        userid = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "http://localhost/helper/?controller=Helperland&function=GetSpecificServiceRequest",
            data: {
                'serviceid': serviceid,
                'userid': userid,
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
                $('.acceptbtn').html(data[22]);

            }
        });
        // console.log(name);
    });    
});