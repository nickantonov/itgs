<?php
// CERM from Nick Antonov
// "RADCOMSPACE" V 1.0
// Ukraine, Kyiv   2015.
// Все права защищены\All rights reserved.
//----------------------------------------------------------------------------------------------------------------------
//Делаю дерево с выборкой из файла БД
?>



<!----Поехали !!!---->

<html>
<title>Склад</title>
<head>
 </head>

 <h1><font color="green" > "RADCOMSPACE" V 1.0</font></h1>
<body>
  
</body>

</html>
<?php
//Подключаем модули системы
include   "../menu.php";
include  "../search.php";
include '../dog.php';
//include "/content.php";
//ДБ

/*/ определяем начальные данные
    $db_host = 'mysql.hostinger.com.ua';
    $db_name = 'u300149993_itns';
    $db_username = 'u300149993_itns';
    $db_password = 'sewer1243';
    $db_table_to_show = 'customers';

    // соединяемся с сервером базы данных
    $connect_to_db = mysql_connect($db_host, $db_username, $db_password)
    or die("Could not connect: " . mysql_error());

    // подключаемся к базе данных
    mysql_select_db($db_name, $connect_to_db)
    or die("Could not select DB: " . mysql_error());

    // выбираем все значения из таблицы "student"
    $qr_result = mysql_query("select * from " . $db_table_to_show)
    or die(mysql_error());

    // выводим на страницу сайта заголовки HTML-таблицы
    echo '<table border="1" align="center">';
  echo '<thead>';
  echo '<tr>';
  echo '<th>№ П\П &nbsp; &nbsp; &nbsp;  </th>';
  echo '<th>Название  &nbsp; &nbsp; &nbsp;  </th>';
  echo '<th>Тип &nbsp; &nbsp; &nbsp; </th>';
  echo '<th>Описание &nbsp; &nbsp; &nbsp; </th>';
  echo '<th>Характеристики &nbsp; &nbsp; &nbsp; </th>';
  echo '<th>Корпус &nbsp; &nbsp; &nbsp;  </th>';
  echo '<th>Наличие &nbsp; &nbsp; &nbsp;  </th>';
  echo '<th>Колличество &nbsp; &nbsp; &nbsp;  </th>';
  echo '<th>Номер ячейки &nbsp; &nbsp; &nbsp;  </th>';
 // echo '<th></th>';
 // echo '<th></th>';
 // echo '<th></th>';
 // echo '<th></th>';
 // echo '<th></th>';

  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  
   // выводим в HTML-таблицу все данные клиентов из таблицы MySQL 
  while($data = mysql_fetch_array($qr_result)){ 
    echo '<tr>';
    echo '<td>' . $data['id'] . '</td>';
    echo '<td>' . $data['naz'] . '</td>';
    echo '<td>' . $data['type'] . '</td>';
    echo '<td>' . $data['opis'] . '</td>';
    echo '<td>' . $data['har'] . '</td>';
    echo '<td>' . $data['corp'] . '</td>';
    echo '<td>' . $data['nal'] . '</td>';
    echo '<td>' . $data['col'] . '</td>';
    echo '<td>' . $data['yach'] . '</td>';

    echo '</tr>';
  }
  
    echo '</tbody>';
  echo '</table>';

    // закрываем соединение с сервером  базы данных
    mysql_close($connect_to_db);

//Конец ДБ */
  echo '<center><font color="green" size="10px">Склад по прежнему в разработке</font></center>'  ;  
 
  echo '<center><img src="../images/1.gif"></center>';
 
  echo '<center><font color="green" size="5px">Не веришь?</font></center>'  ;
  echo '<center><img src="../images/2.gif"></center>';
//include "../system/tb/index.php";    
include "../footer.php";

?>

