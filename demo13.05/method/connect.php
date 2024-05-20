<?php
mysqli_report(MYSQLI_REPORT_OFF);
// подключение к бд
$mysqli = @new mysqli('localhost', 'root', '', 'dem1305');
if ($mysqli->connect_error) {
  /* проверка подключения */
  die('Connection error: ' . $mysqli->connect_error);
}
