<?php
require_once('./includes/clases.php');

if (!$auth->estaLogueado()) {
$auth->cookieLogin();
}

$usuario = $auth->usuarioLogueado($db);

?>
<?php $tabName = "Home" ?>
<?php require_once("includes/head.php") ?>
<?php require_once("includes/navbar.php") ?>
      <section class="index-container">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </section>
<?php require_once("./includes/footer.php") ?>
