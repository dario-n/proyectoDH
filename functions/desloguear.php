<?php
session_start();
$expira =  time() - 50;
if (isset($_COOKIE[$_SESSION['user']])) {
  setcookie ($_SESSION['user'], 1, $expira, '/');
}
session_destroy();
header('Location:../login.php');
