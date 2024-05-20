<?php
require_once 'connect.php';
session_start();
$id_order = $_POST['id'];
$status = $_POST['status'];
//echo $id_master .   " " .  $date . " " . $time . "<br>";
$check = $mysqli->query("UPDATE `orders` SET `status` = '$status' WHERE `orders`.`id` = '$id_order'");

if ($mysqli->affected_rows > 0) {
  //echo "такой уже есть";
  echo json_encode(array('success' => true, 'message' => 'все отлично записалоась'), JSON_UNESCAPED_UNICODE);
} else {
  echo json_encode(array('success' => false, 'message' => 'Ошиька'), JSON_UNESCAPED_UNICODE);
}
