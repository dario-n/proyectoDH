<?php
session_start();

$archivo = fopen('../json/usuarios.json', 'r');
$usuarios = [];

if ($archivo) {
  while (($linea = fgets($archivo)) !== false) {
    $linea = json_decode($linea, true);
    if ($linea['user'] == $_POST['user']) {
      $_SESSION['error'] = '';
      $_SESSION['user'] = $linea['user'];
      break;
    }
    else {
      $_SESSION['error'] = 'Los datos ingresados son incorrectos';
      $_SESSION['user'] = $_POST['user'];
      header('Location:../login.php');
    }
  }
}
fclose($archivo);

$expira = time() + 36000;

if (password_verify($_POST['pwd'], $linea['pwd'])) {
  $_SESSION['error'] = '';
  $_SESSION['status'] = 1;
  if ($_POST['recordar']) {
    setcookie('recordar',1, $expira);
  }
  header('Location:../index.php');
}
else {
  $_SESSION['error'] = 'Los datos ingresados son incorrectos';
  header('Location:../login.php');
}
