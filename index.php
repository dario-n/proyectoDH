<?php
require_once('functions/mysql_connection.php');
require_once('./functions/remember.php');
if (!isset($_SESSION['status'])) {
cookieLogin();
}
 ?>
<?php $tabName = "Home" ?>
<?php require_once("includes/head.php") ?>
<?php require_once("includes/navbar.php") ?>
      <section class="index-container">
      </section>
<?php require_once("./includes/footer.php") ?>
