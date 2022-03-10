$(document).ready(function() {

    $("#drop1").click(function () {
      
      $("#drop1").toggleClass('active');
     $(this).css(  "background","#F9F9F9");
    
      $("#drops1").toggleClass('active');
    
    });
    $("#drop2").click(function () {
      
      $("#drop2").toggleClass('active');
     $(this).css(  "background","#F9F9F9");
    
      $("#drops2").toggleClass('active');
    
    
    });
    $("#drop3").click(function () {
      
      $("#drop3").toggleClass('active');
     $(this).css(  "background","#F9F9F9");
    
      $("#drops3").toggleClass('active');
    
    
    });
  
   
    });
  
  
  
  
    $(document).ready(function(){
   
      // Initialize select2
      $("#selUser").select2();
      $("#selUserRole").select2();
  
      // $('#selUser').select2({
      //     placeholder: "User name",
      //     allowClear: true // This is for clear get the clear button if wanted 
      // });
    });
    $("#reset").on("click", function () {
      $("#selUser").val("User name").trigger("change");
      $("#selUserRole").val("User role").trigger("change");

      $("#selUser").trigger("change");
      // $("#selUserRole").val("user").trigger("change");
      // $("#selUserRole").trigger("change");
      $('#selUserRole').select2({
          placeholder: "User Role",
          allowClear: true // This is for clear get the clear button if wanted 
      });
  
  });
  
  $(document).ready(function () {
    $('input').on('input', function(e) {
      if ($(' #addnewuser').find('.valid-input').length == 6) {
        $('#submit-btn').removeAttr('disabled');

      }
    });
    $('input[name="mobile"]').on('input', function() {
      var mobileNum = $(this).val();
      var validNumber = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
      if (mobileNum.length == 0) {
        $('.mobile-msg').addClass('invalid-msg').text('Mobile Number is required');
        $(this).addClass('invalid-input').removeClass('valid-input');
      } else if (!validNumber.test(mobileNum)) {
        $('.mobile-msg').addClass('invalid-msg').text('Invalid Mobile Number');
        $(this).addClass('invalid-input').removeClass('valid-input');
      } else {
        $('.mobile-msg').empty();
        $(this).addClass('valid-input').removeClass('invalid-input');
      }

    });
    $("#submit-btn").on('click', function() {
      firstname = $("#firstName").val();
      lastname = $("#lastname").val();
      email = $("#useremail").val();
      mobile = $('input[name="mobile"]').val();
      password = $("#password").val();
      $("#preloader").show();
      $.ajax({
        type: "POST",
        url: "http://localhost/helper/?controller=Helperland&function=InsertUserAdmin",
        data: {
          'firstname': firstname,
          'lastname': lastname,
          'email': email,
          'mobile': mobile,
          'password': password,
        },
        // dataType: "dataType",
        success: function(response) {
          if (response == 1) {
            Swal.fire({
              title: 'Account Has Been Created successfully',
              text: '',
              icon: 'success',
              confirmButtonText: 'Done'
            });
          }
          if (response == 0) {
            Swal.fire({
              title: 'User Account not created',
              text: '',
              icon: 'error',
              confirmButtonText: 'Done'
            });
          }
      $("#preloader").hide();

          $("#tblusermanagement").DataTable().ajax.reload();
          $("#cardview").DataTable().ajax.reload();

          Getuser();
        }
      });
    });



    Getuser();
  
    urls = 'http://localhost/helper/?controller=Helperland&function=AdminUser';
    seluser = "";
    selectrole = '';
    phone = '';
    zipcode = '';

    function dt() {

      table = $("#tblusermanagement").DataTable({
        "dom": '<"top">Brt<"bottom"flpi><"clear">',
        // "bPaginate": false,
        "bFilter": false,
        "processing": true,

        // "ordering": false,    
        lengthMenu: [10, 05, 20, 50, 100, 200, 500],
        "info": "Total Records : _TOTAL_ ",

        "bPaginate": {

        },
        "pagingType": "simple_numbers",
        "language": {
          "paginate": {
            "previous": '<i class="fa fa-caret-left"></i>',
            "next": '<i class="fa fa-caret-right"></i>',

          },
          processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
          "lengthMenu": "Show _MENU_ Entries",
          "zeroRecords": "No Data Found",
                  "info": "Total Records : _TOTAL_ ",

                  "infoEmpty": "No records available",
                  "infoFiltered": "(filtered from _MAX_ total records)",
        },
        "ajax": {
          'type': 'POST',
          'url': urls,
          'data': {
            'seluser': seluser,
            'role': selectrole,
            'phone': phone,
            'zipcode': zipcode,

          },
          // 'datasrc': 'data',
          // contentType: 'application/json',
          // "dataType": "json",
        },
        'columns': [{
            "data": "blocks",

          }, {
            "data": "username",

          }, {
            "data": "role",

          }, {
            "data": "dtregister",

          }, {
            "data": "usertype",

          }, {
            "data": "phone",

          }, {
            "data": "pincode",

          }, {
            "data": "status",

          }, {
            "data": "action",

          },

        ],
        "buttons": [{
          extend: 'csv',
          text: 'Export',
        }],
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
    dt();
    cardviews();
    function cardviews(){
    tables = $("#cardview").DataTable({
      "dom": '<"top">Brt<"bottom"flpi><"clear">',
      // "bPaginate": false,
      "bFilter": false,
      // "ordering": false,    
      lengthMenu: [10, 05, 20, 50, 100, 200, 500],
      "info": "Total Records : _TOTAL_ ",

      "bPaginate": {

      },
      "pagingType": "simple_numbers",
      "language": {
        "paginate": {
          "previous": '<i class="fa fa-caret-left"></i>',
          "next": '<i class="fa fa-caret-right"></i>',

        },
        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
        "lengthMenu": "Show _MENU_ Entries",
        "zeroRecords": "No Data Found",
                  "info": "Total Records : _TOTAL_ ",

                  "infoEmpty": "No records available",
                  "infoFiltered": "(filtered from _MAX_ total records)",
      },
      "ajax": {
        'type': 'POST',
        'url': urls,
        'data': {
            'seluser': seluser,
            'role': selectrole,
            'phone': phone,
            'zipcode': zipcode,

          },
        // 'datasrc': 'data',
        // contentType: 'application/json',
        // "dataType": "json",
      },
      'columns': [{
          "data": "cardview",

        },

      ],
      "processing": true,

      "buttons": [{
        extend: 'csv',
        text: 'Export',
      }],
    }).ajax.reload();}
    table.processing(true);
    tables.processing(true);
    $("#addnewuser").on("input",function(e){
      e.preventDefault();
      if($(".valid-input").length == 6){
        $("#submit-btn").removeAttr("disabled");
        $('.registration ').removeAttr("disabled");
      }
        });

    function Getuser() {
      $.ajax({
        type: "POST",
        url: "http://localhost/helper/?controller=Helperland&function=GetRoleAndUser",
        // dataType: "json",
        success: function(data) {
          $("#selUser").append(data);
        }
      });
    }

    $(".search").on("click", function(e) {
      e.preventDefault();
      urls = "http://localhost/helper/?controller=Helperland&function=searchAdmin";
      if ($('#selUser option:selected').text() != "User name"|| $("#selUserRole option:selected").text() != "User role" || $("#phone").val() != "" || $("#zipcode").val() != "") {
        selecteduser = $('#selUser').val();
        if($('#selUser option:selected').text() != "User name"){
        seluser = $('#selUser option:selected').text();}else{
          seluser = '';
        }
        if($("#selUserRole option:selected").text() != "User role" ){
        selectrole = $("#selUserRole option:selected").text();}else{
          selectrole = '';
        }
        phone = $("#phone").val();
        zipcode = $("#zipcode").val();

        $('#tblusermanagement').dataTable().fnClearTable();
        $('#tblusermanagement').dataTable().fnDestroy();
        dt();

        $('#cardview').dataTable().fnClearTable();
        $('#cardview').dataTable().fnDestroy();
        cardviews();
      }
    });


    $("#reset").on("click", function(e) {
      $("#phone").val("");
      $("#zipcode").val("");
      e.preventDefault();
      urls = 'http://localhost/helper/?controller=Helperland&function=AdminUser';
      seluser = "";

      $('#tblusermanagement').dataTable().fnClearTable();
      $('#tblusermanagement').dataTable().fnDestroy();
      $('#cardview').dataTable().fnClearTable();
        $('#cardview').dataTable().fnDestroy();
      dt();
      cardviews();
    });

  });
 

  
    
   