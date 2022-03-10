
    $('.scroll-down').on('click',function(e){
      e.preventDefault();
    window.scrollTo(0, 1000);});
    $('.banner form').on('input',function(e){
      e.preventDefault();
      if($('.invalid-input').length > 0){
        $('.sbmtbtns').attr('disabled','disabled');
      }
      if($('.invalid-msg').length > 0){
        $('.sbmtbtns').attr('disabled','disabled');
      }
      if($('input[type=checkbox]:checked').length == 1){
      if(($('.valid-input').length == 6) && ($('.invalid-input').length == 0) ){
        $('.sbmtbtns').removeAttr('disabled');

      
    }
  }else{
    $('.sbmtbtns').attr('disabled','disabled');

  }
    });
window.addEventListener('scroll', function () {
    let nav = document.querySelector('nav');
    let windowPosition = window.scrollY > 0;
    nav.classList.toggle('scrolling-active', windowPosition);

  })

