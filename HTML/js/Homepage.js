      window.addEventListener('scroll', function () {
      let nav = document.querySelector('nav');
      let windowPosition = window.scrollY > 0;
      nav.classList.toggle('scrolling-active', windowPosition);

    });

     $(document).ready(function(){
        $('.ok').click(function(){
            $(".privacy-policy").css({"display" : "none","transition-delay":"2s"});
        })
    });
