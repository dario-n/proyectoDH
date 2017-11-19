<?php
$host="127.0.0.1";
try {
  $db = new PDO("mysql:host=$host;dbname=proyectodh_db", "dario", "1234", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
  header("location: db_error.php?host=$host");
  exit;
}


 ?>
