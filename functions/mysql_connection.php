<?php
$host="192.168.64.1";
//$host="127.0.0.1";
try {
  $db = new PDO("mysql:host=$host;dbname=proyectoDH", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
  header("location: ./db_error.php?host=$host");
  exit;
}


 ?>
