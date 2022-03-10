<script>
    $(document).ready(function() {
        selects = $('#selectbtn option:selected').val();
        orders = $('input[name="sorts"]:checked').val();

        username = "<?php echo $_SESSION['username'] ?>";
        $('.vertical-nav .nav-item').removeClass('active');
        $('.ratings').addClass('active');
        $('.mobile-nav .nav-item').removeClass('active');
        $('.mobile-nav .navrating').addClass('active');

        selects = $('#selectbtn option:selected').val();
        $('#selectbtn ').on('change', function() {
            selects = $('#selectbtn option:selected').val();
            $('#ratingspall').dataTable().fnClearTable();
            $('#ratingspall').dataTable().fnDestroy();
            spallratings();
            // $('#ratingspall').DataTable().ajax.reload();
        });



        $('input[name="sorts"]').on("click", function() {

            $('#ratingspall').dataTable().fnClearTable();
            $('#ratingspall').dataTable().fnDestroy();
            orders = $('input[name="sorts"]:checked').val();
            spallratings();
        });

        spallratings();

        function spallratings() {
            $('#ratingspall').DataTable({
                "dom": '<"top">rt<"bottom"flpi><"clear">',
                // responsive: true,
                "processing": true,
                "order" : false,
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
                    type: "POST",
                    url: "http://localhost/helper/?controller=Helperland&function=GetSPratings",
                    data: {
                        "username": username,
                        "selects": selects,
                        "order": orders,
                    },
                },

                'columns': [{
                        "data": "ratings",

                    },

                ],
            }).ajax.reload();
        }
    });
</script>