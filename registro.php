<?php
require_once('./includes/clases.php');
if (!$auth->estaLogueado()) {
$auth->cookieLogin();
}
if ($auth->estaLogueado()) {
  header("Location:index.php");
  exit;
}

$nombreDefault = "";
$apellidoDefault = "";
$userDefault = "";
$emailDefault = "";
$imagenDefault = "";

$errores = [];

if ($_POST) {
  $errores = $validator->validarInformacion($_POST, $db);

  if (!isset($errores['nombre'])) {
    $nombreDefault = $_POST['nombre'];
  }
  if (!isset($errores['apellido'])) {
    $apellidoDefault = $_POST['apellido'];
  }
  if (!isset($errores['user'])) {
    $userDefault = $_POST['user'];
  }
  if (!isset($errores['email'])) {
    $emailDefault = $_POST['email'];
  }
  if (!isset($error['imagen'])) {
    $imagenDefault = $_FILES['imagen'];
  }

  if (count($errores) == 0) {
    $usuario = new Usuario($_POST["user"], $_POST["email"], $_POST["pwd"], $_POST["nombre"], $_POST["apellido"], ($_POST["user"] .'.' .pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION)));

    $usuario->guardarImagen();
    $usuario = $db->guardarUsuario($usuario);
    $auth->loguear($usuario->getUsername());
    header("Location:perfil.php");
    exit;
  }
}


$tabName="Registro" ?>
<?php require_once("includes/head.php") ?>
<?php require_once("includes/navbar.php") ?>

    <section class="register-container">
      <h2>COMPLETA EL FORMULARIO</h2>
      <div class="login-error">
        <ul>
        <?php if (count($errores) > 0): ?>
          <?php foreach ($errores as $error) : ?>
            <li>
              <?=$error?>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
      </div>
      <form class="register-form" method="post" enctype="multipart/form-data">
        <input type="text" id="nombre" name="nombre" placeholder="NOMBRE" value="<?=$nombreDefault?>">
        <input type="text" id="apellido" name="apellido" placeholder="APELLIDO" value="<?=$apellidoDefault?>">
        <input type="text" id="user" name="user" placeholder="NICK" value="<?=$userDefault?>">
        <input type="email" id="mail" name="email" placeholder="EMAIL" value="<?=$emailDefault?>">
        <input type="password" id="contraseña" name="pwd" placeholder="CONTRASEÑA">
        <input type="password" id="contraseña" name="pwd_rep" placeholder="CONFIRMAR CONTRASEÑA">
        <label class="regpicto" for="imagen" id="image_label">Elegir imagen de perfil</label>
        <input type="file" name="imagen" id="imagen" style="display: none;" accept="image/*" value="<?=$imagenDefault?>">
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
        <button class="regtype" type="submit" name="registrar">Registrarse</button>
        <button class="regpicto" type="reset" name="reset">Reset</button>
        <h4 class="picto">¿Ya tienes una cuenta? <a href="login.php">ingresa aquí</a></h4>
      </form>
    </section>

<?php require_once("./includes/footer.php") ?>
