$(document).ready(function(){
    $("#selectbed").select2();
   $("#selectbath").select2();
   $("#selectime").select2();
   $("#selecthour").select2();


   $('#selectdate').datepicker({
format:'dd-mm-yyyy'
});

$('.first').click(function(e){
e.preventDefault();
$("#firstservice").attr('src',"image/3-green.png");
$(".first").css({
"border": "3px solid #1D7A8C"
});
$(".first").dblclick(function(){
$("#firstservice").attr('src',"image/3.png");
$(".first").css({
"border": "1px solid #C8C8C8"
});
});
});

$('.second').click(function(e){
e.preventDefault();
$("#secondimg").attr('src',"image/5-green.png");
$(".second").css({
"border": "3px solid #1D7A8C"
});
$(".second").dblclick(function(){
$("#secondimg").attr('src',"image/5.png");
$(".second").css({
"border": "1px solid #C8C8C8"
});
});
});

$('.third').click(function(e){
e.preventDefault();
$("#thirdimg").attr('src',"image/4-green.png");
$(".third").css({
"border": "3px solid #1D7A8C"
});
$(".third").dblclick(function(){
$("#thirdimg").attr('src',"image/4.png");
$(".third").css({
"border": "1px solid #C8C8C8"
});
});
});

$('.fourth').click(function(e){
e.preventDefault();
$("#fourthimg").attr('src',"image/2-green.png");
$(".fourth").css({
"border": "3px solid #1D7A8C"
});
$(".fourth").dblclick(function(){
$("#fourthimg").attr('src',"image/2.png");
$(".fourth").css({
"border": "1px solid #C8C8C8"
});
});
});

$('.fifth').click(function(e){
e.preventDefault();
$("#fifthimg").attr('src',"image/1-green.png");
$(".fifth").css({
"border": "3px solid #1D7A8C"
});
$(".fifth").dblclick(function(){
$("#fifthimg").attr('src',"image/1.png");
$(".fifth").css({
"border": "1px solid #C8C8C8"
});
});
});

});
