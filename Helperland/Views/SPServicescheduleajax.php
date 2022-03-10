<script>
    username = "<?php echo $_SESSION['username']; ?>";
    $(".vertical-nav .nav-item").removeClass('active');
    $(".vertical-nav .schedule").addClass('active');
    $(".mobile-nav .nav-item").removeClass('active')
    $(".mobile-nav .navserviceschedule").addClass('active')


    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {

            eventClick: function(calEvent) {
                var eventObj = calEvent.event;
                $("#preloader").show();
                $.ajax({
                    type: "POST",
                    url: "http://localhost/helper/?controller=Helperland&function=GetSpecificServiceRequest",
                    data: {
                        'serviceid': eventObj.id,
                        // 'userid':userid,
                    },
                    dataType: "json",
                    success: function(data) {

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
                        $('.buttonall').html(data[25]);
                        $('.customername span').html(data[21]);
                $("#preloader").hide();

                        $('.launch').click();
                    }
                });


            },
            customButtons: {
                completed: {
                    text: 'Completed',

                },
                upcoming: {
                    text: 'Upcoming',

                },

            },
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'completed,upcoming',
            },


            eventSources: [{


                    url: "http://localhost/helper/?controller=Helperland&function=GetSpDates&parameter=" + username,
                    color: '#1d7a8c',   

                },
                {


                    url: "http://localhost/helper/?controller=Helperland&function=GetSpDatesall&parameter=" + username,
                    color: '#efefef',   
                    textColor: 'black'

                },
            ],

        });
        calendar.render();


    });
</script>