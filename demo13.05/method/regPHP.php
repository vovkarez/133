<?php
require_once "connect.php";
$fio = $_POST["fio"];
$phone = $_POST["phone"];
$login = $_POST["login"];
$auto_number = $_POST["auto_number"];
$pass = $_POST["pass"];
$check_user = $mysqli->query("SELECT * FROM `user` WHERE `login` = '$login'")->fetch_assoc();

if ($check_user) { // проверка занятости пользователя
  echo json_encode(array('success' => false, 'message' => 'Логин уже занят'));
} else {
  $reg_user = $mysqli->query("INSERT INTO `user` (`id`, `fio`, `login`, `pass`, `auto_number`, `role`) VALUES 
  (NULL, '$fio', '$login', '$pass', '$auto_number', 'user')");
  if ($reg_user) {
    echo json_encode(array('success' => true, 'message' => 'Регистрация успешна'));
  } else {
    echo json_encode(array('success' => false, 'message' => 'Произошла ошибка в бд'));
  }
}
