$(document).ready(function () {
    $('.mobile-nav .nav-item').removeClass('active');
    $('.mobile-nav .navsetting').addClass('active');
    $('.avatarimgs').on('click', function () {
        src = $(this).attr('src');
        $('.changedimg').attr('src', src);
        $('.avtarimage .avatarimgs').removeClass('active');
        $(this).addClass('active');

    });
    });
