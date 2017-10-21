<?php
  require_once('./functions/remember.php');
  if (!isset($_SESSION['status'])) {
    header("location: login.php"); exit;
  }
 ?>
