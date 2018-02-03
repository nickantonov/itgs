<?php
include      'footer.php';  //Вставляем верстку
include_once 'handler.php'; // проверяем авторизирован ли пользователь

if($user) {
// выводим информацию для пользователя
echo 'Привет, <b>'.$user['username'].'</b>!<br />
- <a href="exit.php">Выйти</a><br />
';
} else {
// выводим информацию для гостя
echo '
<center>
- <a href="login.php"><button>Авторизация</button></a><br />
- <a href="register.php"><button>Регистрация</button></a><br />
</center>
';
}
?>