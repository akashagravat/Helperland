$(document).ready(function () {
        var path = window.location.pathname.split("/").pop();
        
        if(path == ''){
            path = 'index.php';
        }
        
        var target = $('.navbar-nav .nav-item a[href="./'+path+'"]');
        if(target.addClass('active')){
            $(".navbar-nav .nav-item .active").css("color", "yellow");
        }
});

