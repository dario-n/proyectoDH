<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
  header('Location: index.php');
  exit();
  }
$tabName="Registro" ?>
<?php require_once("includes/head.php") ?>
<?php require_once("includes/navbar.php") ?>

    <section class="register-container">
      <h2>COMPLETA EL FORMULARIO</h2>
      <form class="register-form" action="functions/login_controller.php" method="post">
        <input type="text" id="nombre" name="nombre" placeholder="NAME">
        <input type="text" id="nombre" name="last_name" placeholder="LASTNAME">
        <input type="text" id="nombre" name="user" placeholder="NICKNAME">
        <input type="email" id="mail" name="mail" placeholder="EMAIL">
        <input type="password" id="contraseña" name="pwd" placeholder="PASSWORD">
        <input type="password" id="contraseña" name="pwd_rep" placeholder="CONFIRM PASSWORD">
        <button type="submit" name="registrar">Registrarse</button>
        <button type="reset" name="reset">Reset</button>
        <h4>¿Ya tienes una cuenta? <a href="login.php">ingresa aquí</a></h4>
      </form>
    </section>

<?php require_once("./includes/footer.php") ?>
