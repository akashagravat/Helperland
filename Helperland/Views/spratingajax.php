<script>
        $(document).ready(function() {
            username = "<?php echo $_SESSION['username'] ?>";
            $('.vertical-nav .nav-item').removeClass('active');
            $('.ratings').addClass('active');
            $('.mobile-nav .nav-item').removeClass('active');
            $('.mobile-nav .navrating').addClass('active');

            selects = $('#selectbtn option:selected').val();
            $('#selectbtn ').on('change', function() {
                $('#ratingspall').DataTable().ajax.reload();
            });
            spallratings();

            function spallratings() {
                $('#ratingspall').DataTable({
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
                        type: "POST",
                        url: "http://localhost/helper/?controller=Helperland&function=GetSPratings",
                        data: function(d) {
                            d.username = username;
                            d.selects = $('#selectbtn option:selected').val();
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