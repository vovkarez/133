<?php
session_start();
$_SESSION['user'] = [];
header("Location: ../auth.php");
