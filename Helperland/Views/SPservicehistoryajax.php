<script>
        $(document).ready(function() {
            username = "<?php echo $_SESSION['username'] ?>";
          
            $("#pyst").on("change",function () {
                $("#servicehisorytables").DataTable().ajax.reload();
              });
              data();
            function data(){
              table = $("#servicehisorytables").DataTable({
                "dom": '<"top">Brt<"bottom"flpi><"clear">',
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
                    "<top>sLengthMenu": "Status _MENU_ ",

                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                },


                "ajax": {
                    'type': 'POST',
                    'url': 'http://localhost/helper/?controller=Helperland&function=GetSPHistory',
                    'data': function(d){
                        d.username = username;
                        d.pyst = $('#pyst option:selected').val();
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

                        "data": 'details'
                    }, {

                        "data": 'status'
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
                "buttons": [
                    {
                        extend: 'csv',
                    text: 'Export',
                    }
                 ],

            }).ajax.reload();
        }
            table.processing(true);

         
         
        });
    </script>