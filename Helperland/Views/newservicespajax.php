<script>
$(document).ready(function() {
                username = "<?php echo $_SESSION['username'] ?>";
                check = 0;
                $('input#pets').on('click', function() {

                    if ($('input#pets').is(':checked')) {
                        check = 1;
                    } else {
                        check = 0;
                    }
                    $("#SPdashboardtable").DataTable().ajax.reload();
                });
              

                table = $("#SPdashboardtable").DataTable({
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
                        'url': 'http://localhost/helper/?controller=Helperland&function=GetPendingBookedService',
                        'data': function (d) {
                            d.username = username;
                            d.pets = check;
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

                        "data": 'dates'
                    }, {

                        "data": 'customerdetails'
                    }, {

                        "data": 'payment'
                    }, {

                        "data": 'timeconflict'
                    }, {

                        "data": 'action'
                    }, ],

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
                        }, {
                            orderable: false,
                            targets: -2
                        }

                    ],




                }).ajax.reload();
                table.processing(true);

                $('#bookingdetails').on('click', '.btn-accept-green', function(e) {
                    e.preventDefault();
                    $("#iframeloading").show();

                    serviceid = $('.btn-accept-green').attr('id');
                    $.ajax({
                        type: "POST",
                        url: 'http://localhost/helper/?controller=Helperland&function=AcceptClientRequest',
                        data: {
                            'username': username,
                            'serviceid': serviceid,
                        },
                        // dataType: "dataType",
                        success: function(data) {
                            $("#iframeloading").hide();
                            // alert(data);
                            if (data == 1) {
                                $("#SPdashboardtable").DataTable().ajax.reload();

                            }
                            if (data == 0) {
                                Swal.fire({
                                    title: 'Service Request Not Accepted',
                                    text: 'Service Request Id: ' + serviceid,
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                                $("#SPdashboardtable").DataTable().ajax.reload();
                            }
                            if (data == 2) {
                                Swal.fire({
                                    title: 'Service Request Already Accepted By Someone.',
                                    text: 'Service Request Id: ' + serviceid,
                                    icon: 'info',
                                    confirmButtonText: 'Ok'
                                });
                                $("#SPdashboardtable").DataTable().ajax.reload();

                            }
                        }
                    });
                });
            });

            </script>