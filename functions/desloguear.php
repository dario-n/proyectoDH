<?php
session_start();
$expira =  time() - 50;
if (isset($_COOKIE['recordar'])) {
  setcookie('recordar',1, $expira);
}
session_destroy();
header('Location:../login.php');
