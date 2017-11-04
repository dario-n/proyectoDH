<?php
require_once('remember.php');
require_once('mysql_connection.php');

function error() {
  $_SESSION['error'] = 'Los datos ingresados son incorrectos';
  $_SESSION['user'] = $_POST['user'];
  header('Location:../login.php');
}

$stmt = $db->prepare('SELECT * FROM users WHERE user = ?');
$stmt->bindValue(1, $_POST['user'], PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch();


if ($user) {
  if (password_verify($_POST['pwd'], $user['pwd'])) {
    $_SESSION['error'] = '';
    $_SESSION['status'] = 1;
    $_SESSION['user'] = $user['user'];
    $_SESSION['nombre'] = $user['nombre'];
    $_SESSION['apellido'] = $user['apellido'];
    $_SESSION['mail'] = $user['mail'];
    $_SESSION['img'] = $user['img'];
    if ($_POST['recordar']) {
      comprobarRemember();
    }
    header('Location:../index.php');
  } else error();
} else error();
