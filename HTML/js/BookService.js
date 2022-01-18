$(document).ready(function () {
    $("#selectbed").select2();
    $("#selectbath").select2();
    $("#selectime").select2();
    $("#selecthour").select2();


    $('#selectdate').datepicker({
        format: 'dd-mm-yyyy'
    });


});

// Change Image On click
$(document).ready(function(){
    $(".first").click(function() {
        chngimg1();
    });
    $(".second").click(function(){
        chngimg2()
    });
    $(".third").click(function(){
        chngimg3()
    });
    $(".fourth").click(function(){
        chngimg4()
    });
    $(".fifth").click(function(){
        chngimg5()
    });
    var toggle = false;
    
    function chngimg1() {
        if (toggle == true) {
            $(".first").css({
                "border": "3px solid #1D7A8C"
            });
            document.getElementById('firstservice').src  = 'image/3-green.png';
        } else {
           document.getElementById('firstservice').src = 'image/3.png';
           $(".first").css({
            "border": "1px solid #C8C8C8"
                });
        }
        toggle = !toggle; 
    }
    function chngimg2() {
        if (toggle == true) {
            $(".second").css({
                "border": "3px solid #1D7A8C"
            });
            document.getElementById('secondimg').src  = 'image/5-green.png';
        } else {
           document.getElementById('secondimg').src = 'image/5.png';
           $(".second").css({
            "border": "1px solid #C8C8C8"
                });
        }
        toggle = !toggle; 
    }
    function chngimg3() {
        if (toggle == true) {
            $(".third").css({
                "border": "3px solid #1D7A8C"
            });
            document.getElementById('thirdimg').src  = 'image/4-green.png';
        } else {
           document.getElementById('thirdimg').src = 'image/4.png';
           $(".third").css({
            "border": "1px solid #C8C8C8"
                });
        }
        toggle = !toggle; 
    }
    function chngimg4() {
        if (toggle == true) {
            $(".fourth").css({
                "border": "3px solid #1D7A8C"
            });
            document.getElementById('fourthimg').src  = 'image/2-green.png';
        } else {
           document.getElementById('fourthimg').src = 'image/2.png';
           $(".fourth").css({
            "border": "1px solid #C8C8C8"
                });
        }
        toggle = !toggle; 
    }
    function chngimg5() {
        if (toggle == true) {
            $(".fifth").css({
                "border": "3px solid #1D7A8C"
            });
            document.getElementById('fifthimg').src  = 'image/1-green.png';
        } else {
           document.getElementById('fifthimg').src = 'image/1.png';
           $(".fifth").css({
            "border": "1px solid #C8C8C8"
                });
        }
        toggle = !toggle; 
    }
})

// Radio Button

$(document).ready(function () {
    $('input:radio').change(function () {//Clicking input radio
        var radioClicked = $(this).attr('id');
        unclickRadio();
        removeActive();
        clickRadio(radioClicked);
        makeActive(radioClicked);
    });
    $(".addresses").click(function () {//Clicking the card
        var inputElement = $(this).find('input[type=radio]').attr('id');
        unclickRadio();
        removeActive();
        makeActive(inputElement);
        clickRadio(inputElement);
    });
});


function unclickRadio() {
    $("input:radio").prop("checked", false);
}

function clickRadio(inputElement) {
    $("#" + inputElement).prop("checked", true);
}

function removeActive() {
    $(".addresses").removeClass("active");
}

function makeActive(element) {
    $("#" + element + "-card").addClass("active");
}

// Card Format
$(document).ready(function () {

    //For Card Number formatted input
    
    $('#cr_no').keyup(function() {
        var crno = $(this).val().split(" ").join(""); // remove hyphens
        if (crno.length > 0) {
            crno = crno.match(new RegExp('.{1,4}', 'g')).join(" ");
        }
        $(this).val(crno);
      });

    //For Date formatted input
    $('#exp').keyup(function() {
        var crnos = $(this).val().split("/").join(""); // remove hyphens
        if (crnos.length > 0) {
            crnos = crnos.match(new RegExp('.{1,2}', 'g')).join("/");
        }
        $(this).val(crnos);
      });
});

// Checkbox checked-unchecked when click paragraph

$('.final-submits').bind('click',function(){
    var input = $(this).find('input');  
    if(input.prop('checked')){
      input.prop('checked',false);
    }else{
      input.prop('checked',true);
    }
  });
  