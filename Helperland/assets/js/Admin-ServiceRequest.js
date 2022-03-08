
 
   $(document).ready(function(){
    $("#reset").on("click", function () {
  
    $('#selCustomer').select2({
        placeholder: "Customer",
        allowClear: false
       });
       $('#status').select2({
        placeholder: "Service Provider",
        allowClear: false
       });
    $('#serviceProvider').select2({
        placeholder: "Status",
        allowClear: false
       });
  });
    $('#startdate,#endtdate').datepicker({
    format:'dd/mm/yyyy'
  });



   $("#selCustomer").select2();
   $("#serviceProvider").select2();
   $("#status").select2();
   $("#reset").on("click", function () {
    $("#selCustomer").val("username").trigger("change");
    $("#selCustomer").trigger("change");
    // $("#serviceProvider").val("User name").trigger("change");
    // $("#serviceProvider").trigger("change");
    // $("#status").val("User name").trigger("change");
    // $("#status").trigger("change");
    // $("#selUserRole").val("user").trigger("change");
    // $("#selUserRole").trigger("change");
    $('#selUserRole').select2({
        placeholder: "User Role",
        allowClear: true // This is for clear get the clear button if wanted 
    });
  });
  


  });

  $(".fa-star").before(function(){
      $(".s1,.s2,.s3,.s4").css("color", "#ECB91C");
      $(".info").text("4");
    });

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
        $('#pagination-demo').twbsPagination({
            totalPages: 5,
            visiblePages: 5,
            first:'',
            last:'',
            next: '<i class="fa fa fa-caret-right"></i>',
            prev: '<i class="fa fa fa-caret-left"></i>',
            onPageClick: function (event, page) {
                //fetch content and render here
            }
        });
     
    });


  $(document).ready(function () {
    $("#refundmodal").on("input", ".pricesinput", function(e) {
      e.preventDefault();
      priceval = $(this).val();
      if (priceval.length == 0) {
        $(".priceerr").text("Please Enter Amount");
      } else {
        $(".priceerr").text("");
      }
    });
    $("#refundmodal").on("click", ".calculatebtn ", function(e) {
      e.preventDefault();
      price = $(".pricesinput").val();
      paidamount = parseFloat($(".paidamount").text());
      balanceamount = parseFloat($(".balanceamount").text());
      if ($(".percentages option:selected").val() == "Percentage") {
        if (price == 0) {
          $(".refundamount ").attr("disabled");
          $(".refundamount ").css("cursor", "not-allowed");

        }
        calculation = (paidamount * price) / 100;
        calculationval = calculation + " €";
        $(".calculateval").val(calculationval);
        if (calculation > balanceamount) {
          $(".priceerr").text("Enter Less Than Balance Account Percentage");

          $(".refundamount ").attr("disabled");
          $(".refundamount ").css("cursor", "not-allowed");

        } else if ($("#whyrefund").val() == "" || $("#callcenteremps").val() == "" ){
           $(".refundamount ").attr("disabled");
            $(".refundamount ").css("cursor","not-allowed");
            
        }else {
          $(".refundamount ").removeAttr("disabled");
          $(".refundamount ").css("cursor", "pointer");
        }

      }
      if ($(".percentages option:selected").val() == "Fixed") {
        calculation = price;

        calculationval = calculation + " €";
        $(".calculateval").val(calculationval);
        if (calculation > balanceamount) {
          $(".priceerr").text("Please Enter Less Than Balance account Amount");

          $(".refundamount ").attr("disabled");
          $(".refundamount ").css("cursor", "not-allowed");

        } else if ($("#whyrefund").val() == "" || $("#callcenteremps").val() == "") {
          $(".refundamount ").attr("disabled");
          $(".refundamount ").css("cursor", "not-allowed");

        } else {

          $(".refundamount ").removeAttr("disabled");
          $(".refundamount ").css("cursor", "pointer");
        }

      }
    });

    $("#refundmodal").on("input", "#whyrefund ", function(e) {
      e.preventDefault();
     whyrefund = $(this).val();
     if(whyrefund.length <=4){
      $(".refundamount ").attr("disabled");
          $(".refundamount ").css("cursor", "not-allowed");

     }else if ($("#callcenteremps").val().length<=4){
      $(".refundamount ").attr("disabled");
          $(".refundamount ").css("cursor", "not-allowed");

     }else{

      $(".refundamount ").removeAttr("disabled");
          $(".refundamount ").css("cursor", "pointer");
     }
    });
    $("#refundmodal").on("click", ".refundamount ", function(e) {
      e.preventDefault();
      serviceid = $(this).attr('id');
      refundamount = parseFloat($(".calculateval ").val());
      whyrefund = $("#whyrefund").val();
      callcenternote = $("#callcenteremps").val();
      $("#iframeloading").show();

      $.ajax({
        type: "POST",
        url: 'http://localhost/helper/?controller=Helperland&function=GiveRefund',
        data: {
          "serviceid": serviceid,
          "whyrefund": whyrefund,
          "callcenternote": callcenternote,
          "refundamount": refundamount,
        },
        // dataType: "dataType",
        success: function(data) {
          if (data == 1) {

            Swal.fire({
              title: 'Refund Has Been Updated Successfully Completed',
              text: 'Service id : ' + serviceid,
              icon: 'success',
              confirmButtonText: 'Done'
            });
          }
          if (data == 0) {
            Swal.fire({
              title: 'Reschedule Not Given',
              text: 'Service id : ' + serviceid,
              icon: 'error',
              confirmButtonText: 'Done'
            });
          }
          $("#cardview").DataTable().ajax.reload();
          $("#tblusermanagement").DataTable().ajax.reload();
          $("#iframeloading").hide();
          // alert(data);
        }
      });
    });
    $("#refundmodal").on("input", "#callcenteremps ", function(e) {
      e.preventDefault();
     notes = $(this).val();
     if(notes.length <=4){
      $(".refundamount ").attr("disabled");
          $(".refundamount ").css("cursor", "not-allowed");

     }else if ($("#whyrefund").val().length<=4){
      $(".refundamount ").attr("disabled");
          $(".refundamount ").css("cursor", "not-allowed");

     }else{

      $(".refundamount ").removeAttr("disabled");
          $(".refundamount ").css("cursor", "pointer");
     }
    });

    $("#editmodal").on("change", ".times", function(e) {
      e.preventDefault();
      selectedtimes = parseFloat($('#time option:selected').val())
      totltime = parseFloat($(this).attr("name"));
      totaltimesh = selectedtimes + totltime;

      if (totaltimesh >= 21) {
        // alert('it work');
        $('.timingerr').text("Please Select less than 21 hour time to Complete Service");
        $(".btn-reschedule").attr("disabled", "disabled");
        $(".btn-reschedule").css({
          "cursor": "not-allowed",
          "background-color": "#1FB6FF",
          "color": "#ffffff"
        });
      } else {
        $('.timingerr').text("");
        $(".btn-reschedule").removeAttr("disabled");
        $(".btn-reschedule").css({
          "cursor": "pointer"
        });

      }
      // alert(totltime);
    });

    $("#editmodal").on('input', "#postal", function(e) {

      pincode = $(this).val();
      //    PinCodeCity  
      $.ajax({
        type: "POST",
        url: "http://localhost/helper/?controller=Helperland&function=PinCodeCity",
        data: {
          "postalcode": pincode,
        },
        //    dataType: "json",
        success: function(data) {
          $('#location').html(data);
        }
      });

    });

    $("#editmodal").on('input', "#postals", function(e) {

      pincode = $(this).val();
      //    PinCodeCity  
      $.ajax({
        type: "POST",
        url: "http://localhost/helper/?controller=Helperland&function=PinCodeCity",
        data: {
          "postalcode": pincode,
        },
        //    dataType: "json",
        success: function(data) {
          $('#locations').html(data);
        }
      });

    });
    $("#editmodal").on("input","#whyreschedule",function (e) {
      e.preventDefault();
     whyreschedule = $("#whyreschedule").val();
     if(whyreschedule.length <= 4){
      $(".whyreschedule").text("Please Give Valid Reason for Reschedule");

      disabled();
       
     }else{
      $(".whyreschedule").text("");

      enabled();

     }
      });
      
    $("#editmodal").on("input","#callcenteremp",function (e) {
      e.preventDefault();
     whyreschedule = $("#callcenteremp").val();
     if(whyreschedule.length <= 4){
      $(".empnotes").text("Please Give Valid Call Center Emp Notes");

      disabled();
       
     }else{
      $(".empnotes").text("");

      enabled();

     }
      });
    $("#editmodal").on('input', "#street", function(e) {

      street = $(this).val();
      //    PinCodeCity  

      var lastName = $(this).val();
      var validName = /^[a-zA-Z ]*$/;;
      if (lastName.length == 0) {
        $('.street-msg').addClass('invalid-msg').text("Street is required");
        $(this).addClass('invalid-input').removeClass('valid-input');
        disabled();
      } else if (!validName.test(lastName)) {
        $('.street-msg').addClass('invalid-msg').text('Number Are not Allowed');
        $(this).addClass('invalid-input').removeClass('valid-input');
        disabled();
      } else {
        $('.street-msg').empty();
        $(this).addClass('valid-input').removeClass('invalid-input');
        enabled();
      }
    });
    $("#editmodal").on("click", ".btn-reschedule", function(e) {
      e.preventDefault();

      $(".whyreschedule").text("");
      $(".empnotes").text("");
      date = $("#dates").val();
      time = $("#time option:selected").text();
      street = $("#street").val();
      postal = $("#postal").val();
      houseno = $("#houseno").val();
      locations = $("#location").val();
      serviceid = $('.btn-reschedule').attr("id");
      addressid = $(".services").attr('id');
      $("#iframeloading").show();
      $.ajax({
        type: "POST",
        url: "http://localhost/helper/?controller=Helperland&function=Rescheduleadmin",
        data: {
          "newdate": date,
          "newtime": time,
          "street": street,
          "postal": postal,
          "houseno": houseno,
          "locations": locations,
          "serviceid": serviceid,
          "addressid": addressid,
        },
        success: function(data) {
          // alert(data);
          if (data == 1) {
            Swal.fire({
              title: 'Reschedule  Has Been Updated Successfully',
              text: 'Service id : ' + serviceid,
              icon: 'success',
              confirmButtonText: 'Done'
            });

          }
          if (data == 0) {
            Swal.fire({
              title: 'Booking has been not reschedule',
              text: 'Service id : ' + serviceid,
              icon: 'error',
              confirmButtonText: 'Done'
            });
          }
          $("#cardview").DataTable().ajax.reload();
          $("#tblusermanagement").DataTable().ajax.reload();
          $("#iframeloading").hide();
        }
      });


    });
    $("#editmodal").on('input', "#streets", function(e) {

      street = $(this).val();
      //    PinCodeCity  

      var lastName = $(this).val();
      var validName = /^[a-zA-Z ]*$/;;
      if (lastName.length == 0) {
        $('.streets-msg').addClass('invalid-msg').text("Street is required");
        $(this).addClass('invalid-input').removeClass('valid-input');
        disabled();
      } else if (!validName.test(lastName)) {
        $('.streets-msg').addClass('invalid-msg').text('Number Are not Allowed');
        $(this).addClass('invalid-input').removeClass('valid-input');
        disabled();
      } else {
        $('.streets-msg').empty();
        $(this).addClass('valid-input').removeClass('invalid-input');
        enabled();
      }
    });

    $("#editmodal").on("input", '#houseno', function(e) {
      e.preventDefault();
      //   house Number validation

      var houseNum = $(this).val();
      var validNumber = /^\d*$/;
      if (houseNum.length == 0) {
        $('.house-msg').addClass('invalid-msg').text('House Number is required');
        $(this).addClass('invalid-input').removeClass('valid-input');
        disabled();
      } else if (!validNumber.test(houseNum)) {
        $('.house-msg').addClass('invalid-msg').text('Enter Valid House Number');
        $(this).addClass('invalid-input').removeClass('valid-input');
        disabled();
      } else {
        $('.house-msg').empty();
        $(this).addClass('valid-input').removeClass('invalid-input');
        enabled();
      }
    });

    $("#editmodal").on("input", '#housenos', function(e) {
      e.preventDefault();
      //   house Number validation

      var houseNum = $(this).val();
      var validNumber = /^\d*$/;
      if (houseNum.length == 0) {
        $('.house-msg').addClass('invalid-msg').text('House Number is required');
        $(this).addClass('invalid-input').removeClass('valid-input');
        disabled();
      } else if (!validNumber.test(houseNum)) {
        $('.house-msg').addClass('invalid-msg').text('Enter Valid House Number');
        $(this).addClass('invalid-input').removeClass('valid-input');
        disabled();
      } else {
        $('.house-msg').empty();
        $(this).addClass('valid-input').removeClass('invalid-input');
        enabled();
      }
    });

    $("#editmodal").on("input", '#postal', function(e) {
      e.preventDefault();
      //   house Number validation

      if ($.trim($('#postal').val()).length == 0) {
        $(this).addClass('invalid-input').removeClass('valid-input');
        $('.postal_number').addClass('invalid-msg').text("Postal Code is Required");
        disabled();
      } else if ($.trim($('#postal').val()).length != 6) {
        $(this).addClass('invalid-input').removeClass('valid-input');
        $('.postal_number').addClass('invalid-msg').text("Enter Valid Postal Code");
        disabled();
      } else {
        $('.postal_number').empty();
        $(this).addClass('valid-input').removeClass('invalid-input');
        enabled();
      }
    });

    $("#editmodal").on("input", '#postals', function(e) {
      e.preventDefault();
      //   house Number validation

      if ($.trim($('#postals').val()).length == 0) {
        $(this).addClass('invalid-input').removeClass('valid-input');
        $('.postals_msg').addClass('invalid-msg').text("Postal Code is Required");
        disabled();
      } else if ($.trim($('#postals').val()).length != 6) {
        $(this).addClass('invalid-input').removeClass('valid-input');
        $('.postals_msg').addClass('invalid-msg').text("Enter Valid Postal Code");
        disabled();
      } else {
        $('.postals_msg').empty();
        $(this).addClass('valid-input').removeClass('invalid-input');
        enabled();
      }
    });
    function disabled() {
      $(".btn-reschedule").attr("disabled", "disabled");
      $(".btn-reschedule").css({
        "cursor": "not-allowed",
        "background-color": "#1FB6FF",
        "color": "#ffffff"
      });
    }

    function enabled() {
      $(".btn-reschedule").removeAttr("disabled");
      $(".btn-reschedule").css({
        "cursor": "pointer"
      });
    }

    $('.vertical-nav .nav-item').removeClass('active');
    $('.adminservicerequest').addClass('active');

  



  

    $("#tblusermanagement").on("click", ".refundtool", function() {
      serviceid = $(this).attr("id");
      GetRefundDetails()

    });
    $("#tblusermanagement").on("click", ".refundtool", function() {
      serviceid = $(this).attr("id");
      GetRefundDetails()

    });
    $("#cardview").on("click", ".editsall", function() {
      serviceid = $(this).attr("id");
      GetEditDetails();

    });

    $("#cardview").on("click", ".editsall", function() {
      serviceid = $(this).attr("id");
      GetEditDetails();

    });


    urls = 'http://localhost/helper/?controller=Helperland&function=GetAllServiceRequest';
    seluser = "";
    serviceid = "";
    selectsp = "";
    selectrole = '';
    phone = '';
    zipcode = '';
    statues = '';
    startdate = '';
    enddate = '';
    servicetable();
    servicecard();

    function servicetable() {
      table = $("#tblusermanagement").DataTable({
        "dom": '<"top">Brt<"bottom"flpi><"clear">',
        // "bPaginate": false,
        "bFilter": false,
        "processing": true,
        "buttons": [{
          extend: 'csv',
          text: 'Export',
        }],
        // "ordering": false,    
        lengthMenu: [10, 5, 20, 50, 100, 200, 500],

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
            'serviceid': serviceid,
            'seluser': seluser,
            'selsp': selectsp,
            'statusall': statues,
            'enddate': enddate,
            'startdate': startdate,
            'phone': phone,
            'zipcode': zipcode,
          },
        },
        'columns': [{
            "data": "blocks",

          }, {
            "data": "serviceid",

          }, {
            "data": "date",

          }, {
            "data": "customer",

          }, {
            "data": "serviceprovider",

          }, {
            "data": "status",

          }, {
            "data": "action",

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

    function GetEditDetails() {
      $.ajax({
        type: "POST",
        url: "http://localhost/helper/?controller=Helperland&function=GetEditAddress",
        data: {
          'serviceid': serviceid,
        },
        // dataType: "dataType",
        success: function(data) {
          $('.editservice').html(data);
          $("#dates").datepicker({
            format: 'dd/mm/yyyy',

            // autoclose: true,
            startDate: '+1d'

          });
        }
      });
    }

    function servicecard() {
      tables = $("#cardview").DataTable({
        "dom": '<"top">Brt<"bottom"flpi><"clear">',
        // "bPaginate": false,
        "bFilter": false,
        "processing": true,
        "buttons": [{
          extend: 'csv',
          text: 'Export',
        }],
        // "ordering": false,    
        lengthMenu: [10, 5, 20, 50, 100, 200, 500],

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
            'serviceid': serviceid,
            'seluser': seluser,
            'selsp': selectsp,
            'statusall': statues,
            'startdate': startdate,
            'enddate': enddate,
            'phone': phone,
            'zipcode': zipcode,
          },
        },
        'columns': [{
          "data": "cardview",

        }, ],


      }).ajax.reload();
    }

    function GetRefundDetails() {
      $.ajax({
        type: "POST",
        url: "http://localhost/helper/?controller=Helperland&function=GetRefundDetails",
        data: {
          'serviceid': serviceid,

        },
        // dataType: "json",
        success: function(data) {

          $(".refundblocks").html(data);
        }
      });
    }
    tables.processing(true);

    table.processing(true);

    GetuserDetails();

    GetspDetails();

    $("#tblusermanagement").on("click", ".specialmodtext", function(e) {
      // alert('it work');
      e.preventDefault();
      // alert('it wrok');
      serviceid = $(this).attr('name');
      specialtext();


    });

    $("#cardview").on("click", ".specialmodtext", function(e) {
      // alert('it work');
      e.preventDefault();
      // alert('it wrok');
      serviceid = $(this).attr('name');
      specialtext();


    });

    $(".search").on("click", function(e) {
      e.preventDefault();

      if ($("#serviceid").val() != "" || $("#selCustomer option:selected").text() != "Customer" || $("#serviceProvider option:selected").text() != "Service Provider" || $("#startdate").val() != "" || $("#endtdate").val() != "" || $("#status option:selected").text() != "Status") {

        startdate = $("#startdate").val();
        enddate = $("#endtdate").val();
        serviceid = $("#serviceid").val();
        if ($("#selCustomer option:selected").text() != "Customer") {
          seluser = $("#selCustomer option:selected").text();
        } else {
          seluser = '';
        }
        if ($("#serviceProvider option:selected").text() != "Service Provider") {
          selectsp = $("#serviceProvider option:selected").text();
        } else {
          selectsp = '';
        }
        if ($("#status option:selected").text() != "Status") {
          statues = $("#status option:selected").text();
        } else {
          statues = '';

        }
        if ($("#selCustomer option:selected").text() != "Customer" && $("#serviceProvider option:selected").text() != "Service Provider") {
          seluser = '';
          selectsp = '';


        }
        tabledestorycreate();

      }


    });

    $("#reset").on("click", function(e) {
      e.preventDefault();
      startdate = $("#startdate").val("");
      enddate = $("#endtdate").val("");
      serviceid = $("#serviceid").val("");

      seluser = "";
      serviceid = "";
      selectsp = "";
      selectrole = '';
      phone = '';
      zipcode = '';
      statues = '';
      startdate = '';
      enddate = '';
      $("#status").val("Status").trigger("change");

      tabledestorycreate();
    });

    function specialtext() {
      $.ajax({
        type: "POST",
        url: "http://localhost/helper/?controller=Helperland&function=GetSpecificServiceRequest",
        data: {
          'serviceid': serviceid,

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
          $('.billingaddress span').html(data[8]);
          $('.mobilenumber').html(data[9]);
          $('.clientemail span').html(data[10]);
          $('.commentsall span').html(data[11]);
          $('.petornot').html(data[12]);

          $('.spdetails1').html(data[20]);
          $('.spdetails2').html(data[20]);

          // var obj = jQuery.parseJSON(data);
          // alert(data[0]);
          // console.log(data[0]);
          // alert(data['pets']);
          // $("#tblservicehistory").DataTable().ajax.reload();
        }
      });
    }

    function tabledestorycreate() {
      $('#tblusermanagement').dataTable().fnClearTable();
      $('#tblusermanagement').dataTable().fnDestroy();
      servicetable();


      $('#cardview').dataTable().fnClearTable();
      $('#cardview').dataTable().fnDestroy();
      servicecard();
    }

    function GetuserDetails() {
      $.ajax({
        type: "POST",
        url: "http://localhost/helper/?controller=Helperland&function=AdminUserGet",

        // dataType: "json",
        success: function(data) {
          $("#selCustomer").append(data);
          // $("#serviceProvider").append(data[1]);

        }
      });
    }

    function GetspDetails() {
      $.ajax({
        type: "POST",
        url: "http://localhost/helper/?controller=Helperland&function=AdminSPGet",

        // dataType: "json",
        success: function(data) {
          $("#serviceProvider").append(data);

        }
      });
    }
  });


    