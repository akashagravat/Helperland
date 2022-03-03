<script>
  $(document).ready(function() {
    username = "<?php echo $_SESSION['username'] ?>";

    table = $("#servicetables").DataTable({
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
        'url': 'http://localhost/helper/?controller=Helperland&function=GetSPUpcomingService',
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

          "data": 'dates'
        }, {

          "data": 'details'
        }, {

          "data": 'distance'
        }, {

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

    table.processing(true);

  


    
  });


 
</script>