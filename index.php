<!DOCTYPE HTML>
<title>
</title>
<head>
</head>
<body>

</body>
</html>
<?php
 include      'footer.php';
 include_once 'handler.php'; // проверяем авторизирован ли пользователь

// если да, перенаправляем его на главную страницу
if($user) {
header ('Location: start.php');
exit();
}

if(!empty($_POST['login']) AND !empty($_POST['password']))
{
 // фильтрируем логин и пароль
 $login = mysql_real_escape_string(htmlspecialchars($_POST['login']));
 $password = mysql_real_escape_string(htmlspecialchars($_POST['password']));
 
	$search_user = mysql_result(mysql_query("SELECT COUNT(*) FROM `users_profiles` WHERE `username` = '".$login."' AND `password` = '".md5($password)."'"), 0);
	if($search_user == 0)
	{
		echo 'Введенные данные неправильные или пользователь не найден.';
		exit();
	}
	else
	{
	    // заносим логин и пароль в куки
		$time = 60*60*24; // сколько времени хранить данные в куках
		setcookie('username', $login, time()+$time, '/');
		setcookie('password', md5($password), time()+$time, '/');
		//echo 'Вы успешно авторизировались на сайте!';
		//print  'index.php'();
		header ('Location: start.php');
		exit();
	}
}
echo '
<body background="/images/robot.jpg">
<br></br>
<br></br>
<center>
<font color="2e5f7a" size="7px">Вход</font>
<br></br>
<form action="index.php" method="POST">
Логин:<br />
<input name="login" type="text" /><br />
Пароль:<br />
<input name="password" type="password" /><br />
</br></br>
<input type="submit" value="Авторизироваться" />
</form></center>';
?>
