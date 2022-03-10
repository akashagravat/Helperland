$(document).ready(function () {
    $('.booknow').addClass('active');
    $('.mobile-nav .nav-item').removeClass('active');
    $('.mobile-nav .newnav').addClass('active');
    $('input:radio').change(function () {//Clicking input radio
        var radioClicked = $(this).attr('id');
        unclickRadio();
        removeActive();
        clickRadio(radioClicked);
        makeActive(radioClicked);
    });
    $(".addresses").click(function () {//Clicking the card
        var inputElement = $(this).find('input[type=radio]').attr('id');
        unclickRadio();
        removeActive();
        makeActive(inputElement);
        clickRadio(inputElement);
    });
});


function unclickRadio() {
    $("input:radio").prop("checked", false);
}

function clickRadio(inputElement) {
    $("#" + inputElement).prop("checked", true);
}

function removeActive() {
    $(".addresses").removeClass("active");
}

function makeActive(element) {
    $("#" + element + "-card").addClass("active");
}

$(document).ready(function () {
    $("#selectbed").select2();
    $("#selectbath").select2();
    $("#selectime").select2();
    // $("#selecthour").select2();


    // $('#selectdate').datepicker({
    //     format: 'dd-mm-yyyy'
    // });


});

$(document).ready(function () {
    $("#add-addresses").click(function () {
        $('.add-address').hide();
        $('#add_address').show();
    })
    $("#discard").on("click", function () {
        $('.add-address').show();
        $('#add_address').hide();

    })
});

// Change Image On click and payment details
$(document).ready(function () {

    $('#selectdate').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        startDate: '+1d'

    });


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
    document.querySelector('.date_time').innerHTML = tomorrow;
    document.querySelector('.date_time_modal').innerHTML = tomorrow;

    $("#selectdate").attr("value", tomorrow);


    $("#selectdate").on("change", function () {
        var selected = $(this).val();
        // alert(selected);
        document.querySelector('.date_time').innerHTML = selected;
        document.querySelector('.date_time_modal').innerHTML = selected;


    });


    $("#selectbed").on("change", function () {
        changeBed();
    });

    $("#selectime").on("change", function () {
        changeTimes();
    });

    $("#selectbath").on("change", function () {
        changeBath();
    });


    $("#selecthour").on("change", function () {
        changetime();
    });

    $(".first").click(function () {
        chngimg1();
    });

    $(".second").click(function () {
        chngimg2();
    });

    $(".third").click(function () {
        chngimg3();
    });

    $(".fourth").click(function () {
        chngimg4();
    });

    $(".fifth").click(function () {
        chngimg5();
    });

    function selecttimes() {

        var selectedtimes = parseFloat($('#selectime').val());
        var selectedhours = parseFloat($("#selecthour").val());

        totaltimesh = selectedtimes + selectedhours

        if (totaltimesh >= 21) {
            $('.timingerr').text("Please Select less than 21 hour time");
            $('.scheduleandplan').attr("disabled","disabled");
        } else {
            $('.scheduleandplan').removeAttr("disabled");

            $('.timingerr').text("");

        }
    }
    var toggle = true;

    function chngimg1() {

        var datas = $(".total_requried_time_modal").text();
        var datas = parseFloat(datas);
        var times = datas;
        var data = $(".total_requried_time").text();
        var data = parseFloat(data);
        var time = data;
        selecttimes();
        if (toggle == true) {
            $(".first").css({
                "border": "3px solid #1D7A8C"
            });
            document.getElementById('firstservice').src = './assets/Image/3-green.png';
            $(".extra_services .extra_parts").css("display", "block");
            $(".extra_services .extra1").css("display", "block");
            var selecthr = document.querySelector('#selecthour').selectedIndex + 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            time = time + 0.5;
            times = times + 0.5;

            document.querySelector('.total_requried_time').innerHTML = time + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = times + ' Hrs';


        } else {
            document.getElementById('firstservice').src = './assets/Image/3.png';
            $(".first").css({
                "border": "1px solid #C8C8C8"
            });

            $(".extra_services .extra1").css("display", "none");
            var selecthr = document.querySelector('#selecthour').selectedIndex - 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            // time = time - 0.5;
            var totaltime = $('.total_requried_time').text();
            var totaltime = parseFloat(totaltime);
            totaltime = totaltime - 0.5;
            var totaltimes = $('.total_requried_time_modal').text();
            var totaltimes = parseFloat(totaltimes);
            totaltimes = totaltimes - 0.5;

            document.querySelector('.total_requried_time').innerHTML = totaltime + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = totaltimes + ' Hrs';

        }

        toggle = !toggle;
    }
    var toggles = true;

    function chngimg2() {

        selecttimes();
        var datas = $(".total_requried_time_modal").text();

        var data = $(".total_requried_time").text();
        var data = parseFloat(data);
        var time = data;
        var datas = $(".total_requried_time_modal").text();
        var datas = parseFloat(datas);
        var times = datas;
        if (toggles == true) {
            $(".second").css({
                "border": "3px solid #1D7A8C"
            });
            document.getElementById('secondimg').src = './assets/Image/5-green.png';
            $(".extra_services .extra_parts").css("display", "block");
            $(".extra_services .extra2").css("display", "block");

            var selecthr = document.querySelector('#selecthour').selectedIndex + 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            time = time + 0.5;
            times = times + 0.5;
            document.querySelector('.total_requried_time').innerHTML = time + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = times + ' Hrs';


        } else {
            document.getElementById('secondimg').src = './assets/Image/5.png';
            $(".second").css({
                "border": "1px solid #C8C8C8"
            });
            $(".extra_services .extra2").css("display", "none");

            var selecthr = document.querySelector('#selecthour').selectedIndex - 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            // time = time - 0.5;
            var totaltime = $('.total_requried_time').text();
            var totaltime = parseFloat(totaltime);
            totaltime = totaltime - 0.5;
            var totaltimes = $('.total_requried_time_modal').text();
            var totaltimes = parseFloat(totaltimes);
            totaltimes = totaltimes - 0.5;
            document.querySelector('.total_requried_time').innerHTML = totaltime + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = totaltimes + ' Hrs';

        }
        toggles = !toggles;
    }
    var toggle3 = true;

    function chngimg3() {
        selecttimes();
        var data = $(".total_requried_time").text();
        var data = parseFloat(data);
        var time = data;
        var datas = $(".total_requried_time_modal").text();
        var datas = parseFloat(datas);
        var times = datas;
        if (toggle3 == true) {
            $(".third").css({
                "border": "3px solid #1D7A8C"
            });
            document.getElementById('thirdimg').src = './assets/Image/4-green.png';
            $(".extra_services .extra_parts").css("display", "block");
            $(".extra_services .extra3").css("display", "block");

            var selecthr = document.querySelector('#selecthour').selectedIndex + 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            time = time + 0.5;
            times = times + 0.5;
            document.querySelector('.total_requried_time').innerHTML = time + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = times + ' Hrs';

        } else {
            document.getElementById('thirdimg').src = './assets/Image/4.png';
            $(".third").css({
                "border": "1px solid #C8C8C8"
            });
            // time = time - 0.5;
            $(".extra_services .extra3").css("display", "none");
            var selecthr = document.querySelector('#selecthour').selectedIndex - 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            // time = time - 0.5;
            var totaltime = $('.total_requried_time').text();
            var totaltime = parseFloat(totaltime);
            totaltime = totaltime - 0.5;
            var totaltimes = $('.total_requried_time_modal').text();
            var totaltimes = parseFloat(totaltimes);
            totaltimes = totaltimes - 0.5;
            document.querySelector('.total_requried_time').innerHTML = totaltime + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = totaltimes + ' Hrs';

            // document.querySelector('.total_requried_time').innerHTML = time + ' Hrs';
        }

        toggle3 = !toggle3;
    }
    var toggle4 = true;

    function chngimg4() {
        selecttimes();
        var data = $(".total_requried_time").text();
        var data = parseFloat(data);
        var time = data;
        var datas = $(".total_requried_time_modal").text();
        var datas = parseFloat(datas);
        var times = datas;
        if (toggle4 == true) {
            $(".fourth").css({
                "border": "3px solid #1D7A8C"
            });
            document.getElementById('fourthimg').src = './assets/Image/2-green.png';
            $(".extra_services .extra_parts").css("display", "block");
            $(".extra_services .extra4").css("display", "block");

            var selecthr = document.querySelector('#selecthour').selectedIndex + 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            time = time + 0.5;
            times = times + 0.5;

            document.querySelector('.total_requried_time').innerHTML = time + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = times + ' Hrs';


        } else {
            document.getElementById('fourthimg').src = './assets/Image/2.png';
            $(".fourth").css({
                "border": "1px solid #C8C8C8"
            });
            $(".extra_services .extra4").css("display", "none");
            var selecthr = document.querySelector('#selecthour').selectedIndex - 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            // time = time - 0.5;
            var totaltime = $('.total_requried_time').text();
            var totaltime = parseFloat(totaltime);
            totaltime = totaltime - 0.5;
            var totaltimes = $('.total_requried_time_modal').text();
            var totaltimes = parseFloat(totaltimes);
            totaltimes = totaltimes - 0.5;
            document.querySelector('.total_requried_time').innerHTML = totaltime + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = totaltimes + ' Hrs';

        }
        toggle4 = !toggle4;
    }
    var toggle5 = true;

    function chngimg5() {
        selecttimes();
        var data = $(".total_requried_time").text();
        var data = parseFloat(data);
        var time = data;
        var datas = $(".total_requried_time_modal").text();
        var datas = parseFloat(datas);
        var times = datas;
        if (toggle5 == true) {
            $(".fifth").css({
                "border": "3px solid #1D7A8C"
            });
            document.getElementById('fifthimg').src = './assets/Image/1-green.png';
            $(".extra_services .extra_parts").css("display", "block");
            $(".extra_services .extra5").css("display", "block");
            var selecthr = document.querySelector('#selecthour').selectedIndex + 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            time = time + 0.5;
            times = times + 0.5;

            document.querySelector('.total_requried_time').innerHTML = time + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = times + ' Hrs';

        } else {
            document.getElementById('fifthimg').src = './assets/Image/1.png';
            $(".fifth").css({
                "border": "1px solid #C8C8C8"
            });
            $(".extra_services .extra5").css("display", "none");
            var selecthr = document.querySelector('#selecthour').selectedIndex - 1;
            document.querySelector('#selecthour').options.selectedIndex = selecthr;
            // time = time - 0.5;
            var totaltime = $('.total_requried_time').text();
            var totaltime = parseFloat(totaltime);
            totaltime = totaltime - 0.5;
            var totaltimes = $('.total_requried_time_modal').text();
            var totaltimes = parseFloat(totaltimes);
            totaltimes = totaltimes - 0.5;
            document.querySelector('.total_requried_time').innerHTML = totaltime + ' Hrs';
            document.querySelector('.total_requried_time_modal').innerHTML = totaltimes + ' Hrs';

        }
        toggle5 = !toggle5;
    }

    function changeBed() {
        var data = $("#selectbed option:selected").text();
        document.querySelector('.bed_num').innerHTML = data;
        document.querySelector('.bed_num_modal').innerHTML = data;


    }

    function changeBath() {
        var data = $("#selectbath option:selected").text();
        document.querySelector('.bath_num').innerHTML = data;
        document.querySelector('.bath_num_modal').innerHTML = data;

    }

    function changeTimes() {
        selecttimes();
        var data = $("#selectime option:selected").text();
        document.querySelector('.times_date').innerHTML = data;
        document.querySelector('.times_date_modal').innerHTML = data;

    }

    function changetime(time) {
        selecttimes();
        var totalhrs = document.querySelector('.total_requried_time').innerHTML;
        var totalhr = parseFloat(totalhrs);
        var datas = document.querySelector('#selecthour').selectedIndex;
        var selecthours = document.querySelector("#selecthour").options[datas].innerHTML;
        var data = parseFloat(document.querySelector("#selecthour").options[datas].innerHTML);

        var totalhrsq = document.querySelector('.total_requried_time_modal').innerHTML;
        var totalhrq = parseFloat(totalhrsq);
        var datasq = document.querySelector('#selecthour').selectedIndex;
        var selecthoursq = document.querySelector("#selecthour").options[datas].innerHTML;
        var dataq = parseFloat(document.querySelector("#selecthour").options[datas].innerHTML);

        if ((data < totalhr) && ($('.extra1').css("display") == "block" || $('.extra2').css("display") == "block" || $('.extra3').css("display") == "block" || $('.extra4').css("display") == "block" || $('.extra5').css("display") == "block")) {
            document.querySelector('#selecthour').value = totalhr;
            // alert('it not work');
            $('#WarningModal').modal('show');

        } else if ((datasq < totalhrsq) && ($('.extra1').css("display") == "block" || $('.extra2').css("display") == "block" || $('.extra3').css("display") == "block" || $('.extra4').css("display") == "block" || $('.extra5').css("display") == "block")) {
            document.querySelector('#selecthour').value = totalhrq;
            // alert('it not work');
            $('#WarningModal').modal('show');
        }
        //$('.extra1').css("display")=="block" || $('.extra2').css("display")=="block" || $('.extra3').css("display")=="block"  || $('.extra4').css("display")=="block" || $('.extra5').css("display")=="block"

        else {

            var data = $("#selecthour option:selected").text();
            document.querySelector('.total_requried_time').innerHTML = data;
            document.querySelector('.basicshr').innerHTML = data;

            document.querySelector('.total_requried_time_modal').innerHTML = data;
            document.querySelector('.basicshr_modal').innerHTML = data;


            // // alert(data);
            if ($('.extra1').css('display') == 'block') {
                var data = parseFloat(data);
                var data = data - 0.5;
                document.querySelector('.basicshr').innerHTML = data + " Hrs";

                document.querySelector('.basicshr_modal').innerHTML = data + " Hrs";
            }

            if ($('.extra2').css('display') == 'block') {
                var data = parseFloat(data);
                var data = data - 0.5;
                document.querySelector('.basicshr').innerHTML = data + " Hrs";
                document.querySelector('.basicshr_modal').innerHTML = data + " Hrs";

            }
            if ($('.extra3').css('display') == 'block') {
                var data = parseFloat(data);
                var data = data - 0.5;
                document.querySelector('.basicshr').innerHTML = data + " Hrs";
                document.querySelector('.basicshr_modal').innerHTML = data + " Hrs";

            }
            if ($('.extra4').css('display') == 'block') {
                var data = parseFloat(data);
                var data = data - 0.5;
                document.querySelector('.basicshr').innerHTML = data + " Hrs";
                document.querySelector('.basicshr_modal').innerHTML = data + " Hrs";

            }
            if ($('.extra5').css('display') == 'block') {
                var data = parseFloat(data);
                var data = data - 0.5;
                document.querySelector('.basicshr').innerHTML = data + " Hrs";
                document.querySelector('.basicshr_modal').innerHTML = data + " Hrs";

            }
        }

    }


    $('.total_requried_time').on('DOMSubtreeModified', function () {
        selecttimes();
        // alert('it work');
        var datas = $(".total_requried_time").text();
        var datas = parseFloat(datas);
        var price = datas * 18;
        document.querySelector('.total_price').innerHTML = '$' + price;
        document.querySelector('.total_prices').innerHTML = '$' + price;
        var prices = (20 * price) / 100;
        var pricepart = price - prices;
        document.querySelector('.effective_price').innerHTML = '$' + pricepart;

    })
    $('.total_requried_time_modal').on('DOMSubtreeModified', function () {
        // alert('it work');
        selecttimes();
        var datas = $(".total_requried_time_modal").text();
        var datas = parseFloat(datas);
        var price = datas * 18;
        document.querySelector('.total_price_modal').innerHTML = '$' + price;
        document.querySelector('.total_prices_modal').innerHTML = '$' + price;

        document.querySelector('.total_prices_modals_p').innerHTML = '$' + price;

        var prices = (20 * price) / 100;
        var pricepart = price - prices;
        document.querySelector('.effective_price_modal').innerHTML = '$' + pricepart;

    })

});

// Radio Button


// Card Format
$(document).ready(function () {

    //For Card Number formatted input

    $('#cr_no').keyup(function () {
        var crno = $(this).val().split(" ").join(""); // remove hyphens
        if (crno.length > 0) {
            crno = crno.match(new RegExp('.{1,4}', 'g')).join(" ");
        }
        $(this).val(crno);
    });

    //For Date formatted input
    $('#exp').keyup(function () {
        var crnos = $(this).val().split("/").join(""); // remove hyphens
        if (crnos.length > 0) {
            crnos = crnos.match(new RegExp('.{1,2}', 'g')).join("/");
        }
        $(this).val(crnos);
    });
});

// Checkbox checked-unchecked when click paragraph

$('.final-submits').bind('click', function () {
    var input = $(this).find('input');
    if (input.prop('checked')) {
        input.prop('checked', false);
    } else {
        input.prop('checked', true);
    }
});


//disable and completed

$(document).ready(function () {

    if (window.location.href.indexOf('BookService') != -1) {

        if ('.firsttab  .active') {
            $(".setup-service .firsttab  .nav-link").addClass('show');
            $(".setup-service .firsttab  .nav-link").addClass('active');
            $(".tab-content .firsttabs").addClass('active');
            $(".tab-content .firsttabs ").addClass('show');

            $(".setup-service .secondtab  .nav-link").removeClass('completed');
            $(".setup-service .thirdtab  .nav-link").removeClass('completed');
            $(".setup-service .fourthtab  .nav-link").removeClass('completed');


            $(".setup-service .secondtab .nav-link").addClass('disabled');

            $(".setup-service .thirdtab .nav-link").addClass('disabled');
            $(".setup-service .fourthtab .nav-link").addClass('disabled');
        }
    }


    if (window.location.href.indexOf('BookService#Schedule-Plan') != -1) {
        $('.firsttab .nav-link').click(function () {
            // window.location.href= 'BookService';
            window.history.pushState('', '', 'BookService');
            $(".setup-service .secondtab  .nav-link").addClass('disabled');
            $(".setup-service .secondtab  .nav-link").removeClass('completed');

        })
        if ('.secondtab  .active') {
            $(".setup-service .firsttab  .nav-link").removeClass('show');
            $(".setup-service .firsttab  .nav-link").removeClass('active');
            $(".tab-content .firsttabs").removeClass('active');
            $(".tab-content .firsttabs ").removeClass('show');
            $(".setup-service .secondtab  .nav-link").addClass('show');
            $(".setup-service .secondtab  .nav-link").addClass('active');
            $(".tab-content .secondtabs").addClass('active');
            $(".tab-content .secondtabs ").addClass('show');
            $(".setup-service .firsttab  .nav-link").addClass('completed');
            $(".setup-service .thirdtab .nav-link").addClass('disabled');
            $(".setup-service .fourthtab .nav-link").addClass('disabled');
            $(".setup-service .secondtab  .nav-link").removeClass('disabled');
            $(".setup-service .secondtab  .nav-link").addClass('completed');


        }
    }

    if (window.location.href.indexOf('BookService#Your-Details') != -1) {
        $('.firsttab .nav-link').click(function () {
            // window.location.href= 'BookService';
            window.history.pushState('', '', 'BookService');
            $(".setup-service .secondtab  .nav-link").addClass('disabled');
            $(".setup-service .secondtab  .nav-link").removeClass('completed');
            $(".setup-service .thirdtab  .nav-link").addClass('disabled');
            $(".setup-service .thirdtab  .nav-link").removeClass('completed');

        }
        )
        $('.secondtab .nav-link').click(function () {
            window.history.pushState('', '', 'BookService#Schedule-Plan');
            // window.location.href= 'BookService#Schedule-Plan';
            $(".setup-service .thirdtab  .nav-link").addClass('disabled');
            $(".setup-service .thirdtab  .nav-link").removeClass('completed');

        }
        )
        if ('.thirdtab  .active') {
            $(".setup-service .secondtab  .nav-link").removeClass('disabled');
            $(".setup-service .firsttab  .nav-link").removeClass('show');
            $(".setup-service .firsttab  .nav-link").removeClass('active');
            $(".tab-content .firsttabs").removeClass('active');
            $(".tab-content .firsttabs ").removeClass('show');
            $(".setup-service .secondtab  .nav-link").removeClass('show');
            $(".setup-service .secondtab  .nav-link").removeClass('active');
            $(".tab-content .secondtabs").removeClass('active');
            $(".tab-content .secondtabs ").removeClass('show');

            $(".setup-service .thirdtab  .nav-link").addClass('show');
            $(".setup-service .thirdtab  .nav-link").addClass('active');
            $(".tab-content .thirdtabs").addClass('active');
            $(".tab-content .thirdtabs ").addClass('show');
            $(".setup-service .firsttab  .nav-link").addClass('completed');
            $(".setup-service .secondtab  .nav-link").addClass('completed');
            $(".setup-service .thirdtab  .nav-link").addClass('completed');
            $(".setup-service .fourthtab .nav-link").addClass('disabled');
            $(".setup-service .thirdtab .nav-link").removeClass('disabled');

        }
    }
    if (window.location.href.indexOf('BookService#Make-Payment') != -1) {
        $('.firsttab .nav-link').click(function () {
            window.history.pushState('', '', 'BookService');
            //     window.location.href= 'BookService';
            $(".setup-service .secondtab  .nav-link").addClass('disabled');
            $(".setup-service .secondtab  .nav-link").removeClass('completed');
            $(".setup-service .thirdtab  .nav-link").addClass('disabled');
            $(".setup-service .thirdtab  .nav-link").removeClass('completed');
            $(".setup-service .fourthtab  .nav-link").addClass('disabled');
            $(".setup-service .fourthtab  .nav-link").removeClass('completed');
        }
        )
        $('.secondtab .nav-link').click(function () {
            window.history.pushState('', '', 'BookService#Schedule-Plan');
            // window.location.href= 'BookService#Schedule-Plan';
            $(".setup-service .thirdtab  .nav-link").addClass('disabled');
            $(".setup-service .thirdtab  .nav-link").removeClass('completed');
            $(".setup-service .fourthtab  .nav-link").addClass('disabled');
            $(".setup-service .fourthtab  .nav-link").removeClass('completed');
        }
        )
        $('.thirdtab .nav-link').click(function () {
            // window.location.href= 'BookService#Your-Details';
            window.history.pushState('', '', 'BookService#Your-Details');
            $(".setup-service .fourthtab  .nav-link").addClass('disabled');
            $(".setup-service .fourthtab  .nav-link").removeClass('completed');
        }
        )
        if ('.fourth .active') {
            $(".setup-service .firsttab  .nav-link").removeClass('show');
            $(".setup-service .firsttab  .nav-link").removeClass('active');
            $(".tab-content .firsttabs").removeClass('active');
            $(".tab-content .firsttabs ").removeClass('show');
            $(".setup-service .fourthtab .nav-link").removeClass('disabled');
            $(".setup-service .thirdtab .nav-link").removeClass('disabled');
            $(".setup-service .secondtab .nav-link").removeClass('disabled');

            $(".setup-service .secondtab  .nav-link").removeClass('show');
            $(".setup-service .secondtab  .nav-link").removeClass('active');
            $(".tab-content .secondtabs").removeClass('active');
            $(".tab-content .secondtabs ").removeClass('show');
            $(".setup-service .thirdtab  .nav-link").removeClass('show');
            $(".setup-service .thirdtab  .nav-link").removeClass('active');
            $(".tab-content .thirdtabs").removeClass('active');
            $(".tab-content .thirdtabs ").removeClass('show');
            $(".setup-service .fourthtab  .nav-link").addClass('show');
            $(".setup-service .fourthtab  .nav-link").addClass('active');
            $(".tab-content .fourthtabs").addClass('active');
            $(".tab-content .fourthtabs ").addClass('show');

            $(".setup-service .firsttab  .nav-link").addClass('completed');
            $(".setup-service .secondtab  .nav-link").addClass('completed');
            $(".setup-service .thirdtab  .nav-link").addClass('completed');
            $(".setup-service .fourthtab  .nav-link").addClass('completed');


        }
    }



});


// Add address Validation
$(document).ready(function () {
    // Street Validation
    $('#street').on('input', function () {
        var lastName = $(this).val();
        var validName = /^[a-zA-Z ]*$/;;
        if (lastName.length == 0) {
            $('.street-msg').addClass('invalid-msg').text("Street is required");
            $(this).addClass('invalid-input').removeClass('valid-input');

        }
        else if (!validName.test(lastName)) {
            $('.street-msg').addClass('invalid-msg').text('White Space Are not Allowed');
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

        if ($('#add_address').find('.valid-input').length == 3) {
            $('.addresssave').removeAttr('disabled');
            $('.addresssave').css('cursor', 'pointer');
        }
        else {
            $('.addresssave').attr('disabled', 'disabled');
            $('.addresssave').css('cursor', 'not-allowed');
        }

    });

});

$(document).ready(function () {
    // CardNumber Validation
    $('.payment-cardno').keyup(function () {
        var ccNum = $(this).val();
        var visaReg = /^4[0-9][0-9][0-9\s]*$/;
        var masterReg = /^5[1-5][0-9][0-9\s]*$/;
        var amexpReg = /^3[47][0-9][0-9\s]*$/;
        var visaRegEx = /^(?:4[0-9]{3}(\s){1}[0-9]{4}(\s){1}[0-9]{4}(\s){1}[0-9]{4}?)$/;
        var mastercardRegEx = /^(?:5[1-5][0-9]{2}(\s)[0-9]{4}(\s){1}[0-9]{4}(\s){1}[0-9]{4}?)$/;
        var amexpRegEx = /^(?:3[47][0-9](\s)[0-9]{4}(\s){1}[0-9]{4}(\s){1}[0-9]{4}?)$/;

        if (visaReg.test(ccNum)) {
            $('.fa-credit-card').css("display", "none");
            $('.visa_card').css("display", "block");
            $('.master_card').css("display", "none");
            $('.american_card').css("display", "none");
            $('.validcardate').addClass('invalid-msg').text("");
            $('.cardpay').addClass('valid-input').removeClass('invalid-input');

        } else if (masterReg.test(ccNum)) {
            $('.fa-credit-card').css("display", "none");
            $('.master_card').css("display", "block");
            $('.visa_card').css("display", "none");
            $('.american_card').css("display", "none");
            $('.validcardate').addClass('invalid-msg').text("");
            $('.cardpay').addClass('valid-input').removeClass('invalid-input');

        } else if (amexpReg.test(ccNum)) {
            $('.fa-credit-card').css("display", "none");
            $('.visa_card').css("display", "none");
            $('.master_card').css("display", "none");
            $('.american_card').css("display", "block");
            $('.validcardate').addClass('invalid-msg').text("");
            $('.cardpay').addClass('valid-input').removeClass('invalid-input');

        } else {
            $('.validcardno').addClass('invalid-msg').text("Enter ValidCardNumber");
            $('.fa-credit-card').css("display", "block");
            $('.visa_card').css("display", "none");
            $('.master_card').css("display", "none");
            $('.american_card').css("display", "none");
            $('.cardpay').addClass('invalid-input').removeClass('valid-input');

        }
        if (visaRegEx.test(ccNum)) {
            $('.validcardno').addClass('valid-msg').text("");
            $('.validcardate').addClass('invalid-msg').text("");
            $('.cardpay').addClass('valid-input').removeClass('invalid-input');

        } else if (mastercardRegEx.test(ccNum)) {
            $('.validcardno').addClass('valid-msg').text("");
            $('.validcardate').addClass('invalid-msg').text("");
            $('.cardpay').addClass('valid-input').removeClass('invalid-input');

        } else if (amexpRegEx.test(ccNum)) {
            $('.validcardno').addClass('valid-msg').text("");
            $('.validcardate').addClass('invalid-msg').text("");
            $('.cardpay').addClass('valid-input').removeClass('invalid-input');

        } else {
            $('.validcardno').addClass('invalid-msg').text("Enter ValidCardNumber");
            $('.cardpay').addClass('invalid-input').removeClass('valid-input');

        }

        $('.invalid-msg').css({
            "display": "block",
            "margin-top": "11px",
        })


    })
    // CardDate Validation
    $('#exp').keyup(function () {
        var date = $(this).val();
        var RegExp = /^[0-9][0-9][/][2-9][0-9]$/;
        if (!RegExp.test(date)) {
            $('.validcardate').addClass('invalid-msg').text("Enter Valid Date");
            $('.cardpay').addClass('invalid-input').removeClass('valid-input');
        } else {
            $('.validcardate').removeClass('invalid-msg').text("");
            $('.cardpay').addClass('valid-input').removeClass('invalid-input');
        }
        $('.invalid-msg').css({
            "display": "block",
            "margin-top": "11px",
        })
    })

});

