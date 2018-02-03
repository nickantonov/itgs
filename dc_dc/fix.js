$(function(){
  $(window).scroll(function() { 
   var top = $(document).scrollTop();
   if (top > 550) $('.floating').addClass('fixed'); //200 - это значение высоты прокрутки страницы для добавления класс
   else $('.floating').removeClass('fixed');
  });
 });	