<?php
require_once "connect.php";
$login = $_POST["login"];
$pass = $_POST["pass"];
$check_user = $mysqli->query("SELECT * FROM `user` WHERE `login` = '$login' and `pass` = '$pass' ")->fetch_assoc();

if ($check_user) { // проверка занятости пользователя
  session_start();
  $_SESSION['user'] = [
    'id' => $check_user['id'],
    'role' => $check_user['role']
  ];
  echo json_encode(array('success' => true, 'message' => 'Авторизация успешно прошла'), JSON_UNESCAPED_UNICODE);
} else {
  echo json_encode(array('success' => false, 'message' => 'Пользователь или пароль неккоректны'), JSON_UNESCAPED_UNICODE);
}
