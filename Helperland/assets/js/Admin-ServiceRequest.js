
 
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


  


    