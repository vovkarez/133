<?php
require_once 'connect.php';
session_start();
$id_user = $_SESSION['user']['id'];
$id_master = $_POST['master'];
$date = $_POST['date'];
$time = $_POST['time'];
//echo $id_master .   " " .  $date . " " . $time . "<br>";
$check = $mysqli->query("SELECT * FROM `orders` WHERE `id_master` = $id_master AND `date` = '$date' AND `time` = '$time'");

if ($check->fetch_assoc()) {
  //echo "такой уже есть";
  echo json_encode(array('success' => false, 'message' => 'на это время и дату уже есть запись'), JSON_UNESCAPED_UNICODE);
} else {

  if ($mysqli->query("INSERT INTO `orders` (`id`, `id_master`, `id_client`, `date`, `time`) VALUES (NULL, '$id_master', '$id_user', '$date', '$time')")) {
    echo json_encode(array('success' => true, 'message' => 'все отлично записалоась'), JSON_UNESCAPED_UNICODE);
  } else {
    //echo "ошибка в бд";
  }
}
