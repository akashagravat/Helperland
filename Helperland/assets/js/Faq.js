$('.btn-toggle').click(function() {
    $(this).find('.btn').toggleClass('active');  
    
    if ($(this).find('.btn1').length>0) {
      $(this).find('.btn').toggleClass('btn1');
    }
    
    $(this).find('.btn').toggleClass('btn2');
       
});