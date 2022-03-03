<script>
    $(document).ready(function () {
        $('.vertical-nav .nav-item').removeClass('active');
$('.blockcustomer').addClass('active');
$('.mobile-nav .nav-item').removeClass('active');
            $('.mobile-nav .blockcust').addClass('active');
username = "<?php echo $_SESSION['username'] ?>";
        
        table = $("#tblblockcust").DataTable({
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
                'url': 'http://localhost/helper/?controller=Helperland&function=GetWorkedCustomer',
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

        }).ajax.reload();
        table.processing(true);

        $("#tblblockcust").on("click", '.btn-block-unblock', function() {
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
                        $("#tblblockcust").DataTable().ajax.reload();

                    }
                });
            }
    });
</script>