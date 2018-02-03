<?php
// CERM from Nick Antonov
// "RADCOMSPACE" V 1.0
// Ukraine, Kyiv   2015.
// Все права защищены\All rights reserved.

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
  "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body>
  <!----------Стиль меню--------------->
  <style>
#nav5, #nav5 li {
  margin: 0;
  padding: 0;
}
#nav5 {
  background: rgb(46,95,122);
}
#nav5 li {
  display: inline-block;
  width: 25%; /* 7 пунктов меню, то есть 100%/7 */
  text-align: center;
}
#nav5 a {
  display: block;
  padding: 3px 0;
  color: #fff;
  text-decoration: none;
}
#nav5 a:hover {
  background: rgb(96,145,172);
}
</style>
<!--------Конец стиля------------->

<!-----------Меню------------------>
<ul id="nav5">
  <li><a href="/start.php">Главная</a>
  <li><a href="/system/sklad.php">Склад</a>
  <li><a href="/wiki">WIKI</a>
  <li><a href="/files/">Скачать</a>
  <li><a href="/dc_dc/index.html">Ноги</a>
  <li><a href="/system/needs.php">Нужно заказать</a>
  <li><a href="/system/about.php">О разработчике</a>
  <li><a href="exit.php">Выход</a>
</ul>
<!-----------Конец Меню------------>
 </body>
</html>