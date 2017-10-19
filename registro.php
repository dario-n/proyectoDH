<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
  header('Location: index.php');
  exit();
  }

$data = [
  'nombre' => '',
  'apellido' => '',
  'user' => '',
  'mail' => ''
];

if (isset($_SESSION['persistence'])) {
  $data = $_SESSION['persistence'];
  unset($_SESSION['persistence']);
}

if (isset($_SESSION['errores'])) {
  $errores = $_SESSION['errores'];
  unset($_SESSION['errores']);
  if (!empty($errores['user'])) $data['user']='';
  if (!empty($errores['mail'])) $data['mail']='';
}

if (!isset($errores['nombre'])) $errores['nombre']='';
if (!isset($errores['apellido'])) $errores['apellido']='';
if (!isset($errores['user'])) $errores['user']='';
if (!isset($errores['mail'])) $errores['mail']='';
if (!isset($errores['pwd'])) $errores['pwd']='';


$tabName="Registro" ?>
<?php require_once("includes/head.php") ?>
<?php require_once("includes/navbar.php") ?>

    <section class="register-container">
      <h2>COMPLETA EL FORMULARIO</h2>
      <form class="register-form" action="functions/register_controller.php" method="post">
        <input type="text" id="nombre" name="nombre" placeholder="NOMBRE  <?=$errores['nombre']?>" value="<?=$data['nombre']?>">
        <input type="text" id="nombre" name="apellido" placeholder="APELLIDO  <?=$errores['apellido']?>" value="<?=$data['apellido']?>">
        <input type="text" id="nombre" name="user" placeholder="NICK  <?=$errores['user']?>" value="<?=$data['user']?>">
        <input type="email" id="mail" name="mail" placeholder="EMAIL  <?=$errores['mail']?>" value="<?=$data['mail']?>">
        <input type="password" id="contraseña" name="pwd" placeholder="CONTRASEÑA  <?=$errores['pwd']?>">
        <input type="password" id="contraseña" name="pwd_rep" placeholder="CONFIRMAR CONTRASEÑA">
        <button type="submit" name="registrar">Registrarse</button>
        <button type="reset" name="reset">Reset</button>
        <h4>¿Ya tienes una cuenta? <a href="login.php">ingresa aquí</a></h4>
      </form>
    </section>

<?php require_once("./includes/footer.php") ?>
