<script>
$(document).ready(function () {
    
            username = "<?php echo $_SESSION['username'] ?>";

            table = $("#tblservicehistory").DataTable({
                "dom": '<"top">rt<"bottom"flpi><"clear">',
                // responsive: true,
                "processing": true,

                // "bPaginate": false,
                "bFilter": false,
                "bPaginate": {

                },
                "pagingType": "full_numbers",
                "language": {
                    "paginate": {
                        "previous": '<i class="fa fa-angle-left"></i>',
                        "next": '<i class="fa fa-angle-right"></i>',
                        "sFirst": '<i class="fa fa-angle-double-left"></i>',
                        "sLast": '<i class="fa fa-angle-double-right"></i>',

                    },
                    "zeroRecords": "No Data Found",
                    "info": "Total Records : _TOTAL_ ",

                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)",

                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                

                "ajax": {
                    'type': 'POST',
                    'url': 'http://localhost/helper/?controller=Helperland&function=GetCustomerHistory',
                    'data': {
                        'username': username,
                    },
                    // 'datasrc': 'data',
                    // contentType: 'application/json',
                    // "dataType": "json",
                },
                'columns': [{
                        "data": 'blocks'
                    }, {

                        "data": 'serviceid'
                    }, {

                        "data": 'date'
                    }, {

                        "data": 'serviceprovider'
                    }, {

                        "data": 'payment'
                    },
                    {

                        "data": 'status'
                    },
                    {

                        "data": 'ratesp'
                    },

                ],


                responsive: true,
                columnDefs: [{
                        targets: 0,
                        className: 'control',
                    },
                    // { responsivePriority: 1, targets: 4},

                    // { responsivePriority: 10001, targets:4 },
                    // { responsivePriority: 2, targets: 3 },
                    {
                        responsivePriority: 3,
                        targets: 1
                    }, {
                        orderable: false,
                        targets: -1
                    }

                ],




            }).ajax.reload();
            table.processing( true );

});

$(document).ready(function() {



            username = "<?php echo $_SESSION['username'] ?>";
            // username = json_encode(username);

            CustomerDashboard();


            // Customer Dashboard Datatable
            function CustomerDashboard() {


                table = $("#dashboardtable").DataTable({
                    "dom": '<"top">rt<"bottom"flpi><"clear">',
                    // responsive: true,
                    "processing": true,

                    // "bPaginate": false,
                    "bFilter": false,
                    "bPaginate": {

                    },
                    "pagingType": "full_numbers",
                    "language": {
                        "paginate": {
                            "previous": '<i class="fa fa-angle-left"></i>',
                            "next": '<i class="fa fa-angle-right"></i>',
                            "sFirst": '<i class="fa fa-angle-double-left"></i>',
                            "sLast": '<i class="fa fa-angle-double-right"></i>',

                        },
                        "zeroRecords": "No Data Found",
                        "info": "Total Records : _TOTAL_ ",

                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtered from _MAX_ total records)",
                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '

                    },
                    "ajax": {
                        'type': 'POST',
                        'url': 'http://localhost/helper/?controller=Helperland&function=CustomerHistory',
                        'data': {
                            'username': username,
                        },


                        // 'datasrc': 'data',
                        // contentType: 'application/json',
                        // "dataType": "json",
                    },
                    'columns': [{
                            "data": 'blocks'
                        }, {

                            "data": 'serviceid'
                        }, {

                            "data": 'date'
                        }, {

                            "data": 'serviceprovider'
                        }, {

                            "data": 'payment'
                        },
                        {

                            "data": 'action'
                        },

                    ],


                    responsive: true,
                    columnDefs: [{
                            targets: 0,
                            className: 'control',
                        },
                        // { responsivePriority: 1, targets: 4},

                        // { responsivePriority: 10001, targets:4 },
                        // { responsivePriority: 2, targets: 3 },
                        {
                            responsivePriority: 3,
                            targets: 1
                        }, {
                            orderable: false,
                            targets: -1
                        }

                    ],




                }).ajax.reload();

            }
            table.processing( true );


});

$(document).ready(function () {
    // giveratting
        $('#RateSP .giveratting').on("click", function (e) {
            // alert('it work');
            e.preventDefault();
            timearrival = $('.infomsg').text();
            friendlyval = $('.friendlymsg').text();
            qualityval = $('.qualitymsg').text();
            spid = $('#RateSP .service-provider').attr('id');
            serviceid = $('#RateSP .service-provider').attr('name');
            username = "<?php echo $_SESSION['username'] ?>";
            comment = $('#feedbackcomment').val();
            $.ajax({
            type: "POST",
            url: "http://localhost/helper/?controller=Helperland&function=InsertRating",
            data: {
                'timearrival': timearrival,
                'friendly': friendlyval,
                'quality': qualityval,
                'spid': spid,
                'serviceid': serviceid,
                'ratingsfrom': username,
                'comment': comment,

            },
            // dataType: "dataType",
            success: function (data) {
                if (data == 2) {
                Swal.fire({
                    title: 'You Are Already Provided Ratings For This Service',
                    text: 'Service Request Id : ' + serviceid,
                    icon: 'info',
                    confirmButtonText: 'Done'
                });
                }
                if (data == 1) {
                Swal.fire({
                    title: 'Rating Provided Successfully',
                    text: 'Service Request Id : ' + serviceid,
                    icon: 'success',
                    confirmButtonText: 'Done'
                });
                }
                if (data == 0) {

                Swal.fire({
                    title: 'Rating Is Not Submitted',
                    text: 'Service Request Id : ' + serviceid,
                    icon: 'error',
                    confirmButtonText: 'Done'
                });
                }
                $("#tblservicehistory").DataTable().ajax.reload();
                // alert(data);
            }
            });
        });

});
 
$(document).ready(function() {
            username = "<?php echo $_SESSION['username'] ?>";
        
            table = $("#tblfavouritesp").DataTable({
                "dom": '<"top">rt<"bottom"flpi><"clear">',
                // responsive: true,
                "processing": true,

                // "bPaginate": false,
                "bFilter": false,
                "bPaginate": {

                },
                "pagingType": "full_numbers",
                "language": {
                    "paginate": {
                        "previous": '<i class="fa fa-angle-left"></i>',
                        "next": '<i class="fa fa-angle-right"></i>',
                        "sFirst": '<i class="fa fa-angle-double-left"></i>',
                        "sLast": '<i class="fa fa-angle-double-right"></i>',
                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '

                    },
                    "zeroRecords": "No Data Found",
                    "info": "Total Records : _TOTAL_ ",

                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)",

                },
                "ajax": {
                    'type': 'POST',
                    'url': 'http://localhost/helper/?controller=Helperland&function=GetWorkedSP',
                    'data': {
                        'username': username,
                    },
                    // 'datasrc': 'data',
                    // contentType: 'application/json',
                    // "dataType": "json",
                },
                'columns': [{
                        "data": "serviceprovider",

                    },

                ],
                // "stripeClasses": [],

                // responsive: true,
                // columnDefs: [{
                //         targets: 0,
                //         className: 'control',
                //     },
                //     // { responsivePriority: 1, targets: 4},

                //     // { responsivePriority: 10001, targets:4 },
                //     // { responsivePriority: 2, targets: 3 },
                //     {
                //         responsivePriority: 3,
                //         targets: 1
                //     }, {
                //         orderable: false,
                //         targets: -1
                //     }

                // ],




            }).ajax.reload();
            table.processing(true);

            $("#tblfavouritesp").on("click", '.btn-favourite-unfavourite', function() {
                spid = $(this).attr('id');

                if ($(this).text() == "Favourite") {
                    favtext = 1;
                    $(this).text("UnFavourite");
                    //    console.log('it work');
                } else {
                    // console.log('it noy work');
                    favtext = 0;

                    $(this).text("Favourite");
                }
                Favourite();
            });

            $("#tblfavouritesp").on("click", '.btn-block-unblock', function() {
                spid = $(this).attr('id');
                if ($(this).text() == "Block") {
                    blocktext = 1;
                    $(this).text("UnBlock");
                    //    console.log('it work');
                } else {
                    blocktext = 0;
                    // console.log('it noy work');

                    $(this).text("Block");
                }
                Blocked();
            });


            function Favourite() {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/helper/?controller=Helperland&function=FavUnFav",
                    data: {
                        'username': username,
                        'spid': spid,
                        'favtext': favtext,
                    },
                    // dataType: "json",
                    success: function(data) {
                        $("#tblfavouritesp").DataTable().ajax.reload();
                        // alert(data);
                    }
                });
            }

            function Blocked() {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/helper/?controller=Helperland&function=BlockUnblock",
                    data: {
                        'username': username,
                        'spid': spid,
                        'blocktext': blocktext,
                    },
                    // dataType: "json",
                    success: function(data) {
                        // alert(data);
                        $("#tblfavouritesp").DataTable().ajax.reload();

                    }
                });
            }
});


</script>
