<?php

mysql_connect('localhost', 'root', 'sewer1243') or die('Ошибка соеденения с MySQL!');
mysql_select_db('sklad') or die ('Ошибка соеденения с базой данных MySQL!');
mysql_query('SET NAMES `utf8`'); // выставляем кодировку базы данных

?>