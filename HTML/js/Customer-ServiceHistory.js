$(document).ready(function () {
   

    $(".fa-star").before(function(){
        $(".s1,.s2,.s3,.s4").css("color", "#ECB91C");
        $(".info").text("4");
    
    
    });
                $(".s1").click(function () {
                    // alert("button clicked");
                    $(".fa-star").css("color", "silver");
                    $(".s1").css("color", "#ECB91C");
                    $(".info").text("1");
                });
                $(".s2").click(function () {
                    $(".fa-star").css("color", "silver");
    
                    $(".s1,.s2").css("color", "#ECB91C");
                    $(".info").text("2");
    
                });
                $(".s3").click(function () {
                    $(".fa-star").css("color", "silver");
    
                    $(".s1,.s2,.s3").css("color", "#ECB91C");
                    $(".info").text("3");
    
                });
                $(".s4").click(function () {
                    $(".fa-star").css("color", "silver");
    
                    $(".s1,.s2,.s3,.s4").css("color", "#ECB91C");
                    $(".info").text("4");
    
                });
                $(".s5").click(function () {
                    // $(".fa-star").css("color", "silver");
    
                    $(".s1,.s2,.s3,.s4,.s5").css("color", "#ECB91C");
                    $(".info").text("5");
    
                });
    
                $(".s1").hover(function () {
                    $(".fa-star").css("color", "silver");
    
                    $(".s1").css("color", "#ECB91C");
    
                    $(".info").text("1");
    
    
                });
                $(".s2").hover(function () {
                    $(".fa-star").css("color", "silver");
    
                    $(".s1,.s2").css("color", "#ECB91C");
                    $(".info").text("2");
    
                });
                $(".s3").hover(function () {
                    $(".fa-star").css("color", "silver");
                    $(".s1,.s2,.s3").css("color", "#ECB91C");
                    $(".info").text("3");
                });
                $(".s4").hover(function () {
                    $(".fa-star").css("color", "silver");
                    $(".s1,.s2,.s3,.s4").css("color", "#ECB91C");
                    $(".info").text("4");
                });
                $(".s5").hover(function () {
                    $(".s1,.s2,.s3,.s4,.s5").css("color", "#ECB91C");
                    $(".info").text("5");
    
                });
         
    
            });



            
$(document).ready(function () {
    // $( ".cardview" ).each(function(){
    //     var table = $(".cardview").DataTable();
    // });
   var table = $("#tblservicehistory").DataTable({
"dom": '<"top">rt<"bottom"flpi><"clear">',
// "bPaginate": false,
"bFilter": false,

"bPaginate":{
  
}, "pagingType": "full_numbers",
"language": {
"paginate": {
"previous": '<i class="fa fa-angle-left"></i>',
"next":'<i class="fa fa-angle-right"></i>',
"sFirst":'<i class="fa fa-angle-double-left"></i>',
"sLast":'<i class="fa fa-angle-double-right"></i>',

}, 
    "zeroRecords": "No Data Found",
	"info": "Total Records : _TOTAL_ ",

    "infoEmpty": "No records available",
    "infoFiltered": "(filtered from _MAX_ total records)",
  
}

});

    
   $('.shows select').selectpicker();
});

$(document).ready(function(){
    $('#pagination-demo').twbsPagination({
        totalPages: 6,
        visiblePages: 6,
        first:'<i class="fa fa-angle-double-left"></i>',
        last:'<i class="fa fa-angle-double-right"></i>',
        next: '<i class="fa fa-angle-right"></i>',
        prev: '<i class="fa fa-angle-left"></i>',
        onPageClick: function (event, page) {
            //fetch content and render here
        }
    });
 
});

$(document).ready(function(){
    var options={
        "separator":",",
        "filename":"Customer-ServiceHistory.csv",
    }
    $("#btnExport").on('click',function() {
        $('#tblservicehistory').table2csv(options);
    });
})