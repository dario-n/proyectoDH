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
  'mail' => '',
  'pwd' => '',
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
  if (!empty($errores['pwd'])) $data['pwd']='';
}

if (!isset($errores['nombre'])) $errores['nombre']='';
if (!isset($errores['apellido'])) $errores['apellido']='';
if (!isset($errores['user'])) $errores['user']='';
if (!isset($errores['mail'])) $errores['mail']='';
if (!isset($errores['pwd'])) $errores['pwd']='';
if (!isset($errores['imagen'])) $errores['imagen']='';


$tabName="Registro" ?>
<?php require_once("includes/head.php") ?>
<?php require_once("includes/navbar.php") ?>

    <section class="register-container">
      <h2>COMPLETA EL FORMULARIO</h2>
      <form class="register-form" action="functions/register_controller.php" method="post" enctype="multipart/form-data">
        <input type="text" id="nombre" name="nombre" placeholder="NOMBRE  <?=$errores['nombre']?>" value="<?=$data['nombre']?>">
        <input type="text" id="nombre" name="apellido" placeholder="APELLIDO  <?=$errores['apellido']?>" value="<?=$data['apellido']?>">
        <input type="text" id="nombre" name="user" placeholder="NICK  <?=$errores['user']?>" value="<?=$data['user']?>">
        <input type="email" id="mail" name="mail" placeholder="EMAIL  <?=$errores['mail']?>" value="<?=$data['mail']?>">
        <input type="password" id="contraseña" name="pwd" value="<?=$data['pwd']?>" placeholder="CONTRASEÑA  <?=$errores['pwd']?>">
        <input type="password" id="contraseña" name="pwd_rep" value="<?=$data['pwd']?>" placeholder="CONFIRMAR CONTRASEÑA">
        <label for="imagen" id="image_label">Elegir imagen de perfil <?=$errores['imagen']?></label>
        <input type="file" name="imagen" id="imagen" style="display: none;" accept="image/*" value="<?=$data['file']?>">
        <script type="text/javascript">
          document.getElementById("imagen").onchange = function() {
            var label = document.getElementById("image_label");
            var file = document.getElementById('imagen').value;
            file = file.split("/").pop();
            file = file.split("\\").pop();
            if (file!="") label.innerHTML = "Imagen: " + file;
            else label.innerHTML = "Elegir imagen de perfil";
          }
        </script>
        <button type="submit" name="registrar">Registrarse</button>
        <button type="reset" name="reset">Reset</button>
        <h4>¿Ya tienes una cuenta? <a href="login.php">ingresa aquí</a></h4>
      </form>
    </section>

<?php require_once("./includes/footer.php") ?>
