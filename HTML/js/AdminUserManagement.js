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
      $("#selUser").trigger("change");
      // $("#selUserRole").val("user").trigger("change");
      // $("#selUserRole").trigger("change");
      $('#selUserRole').select2({
          placeholder: "User Role",
          allowClear: true // This is for clear get the clear button if wanted 
      });
  
  });
  
  $(document).ready(function () {
      var table = $("#tblusermanagement").DataTable({
  "dom": '<"top">rt<"bottom"flpi><"clear">',
  // "bPaginate": false,
  "bFilter": false,  
  // "ordering": false,    
  lengthMenu: [10, 5, 20, 50, 100, 200, 500],
  "info": false,
  
  "bPaginate":{
    
  }, "pagingType": "simple_numbers",
  "language": {
  "paginate": {
  "previous": '<i class="fa fa-caret-left"></i>',
  "next":'<i class="fa fa-caret-right"></i>',
  
  },
   "lengthMenu":     "Show _MENU_ Entries",   
  }
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
    
   