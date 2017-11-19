<?php
require_once('./includes/clases.php');
if (!$auth->estaLogueado()) {
$auth->cookieLogin();
}
if ($auth->estaLogueado()) {
  header("Location:index.php");
  exit;
}
$errores = [];
if ($_POST) {
  $errores = $validator->validarLogin($_POST, $db);
  if (count($errores) == 0) {
    $auth->loguear($_POST['user']);
    if (isset($_POST['recordar'])) {
      $auth->comprobarRemember();
    }
    header("Location:index.php");
  }
}
$tabName = "Login"
?>
<?php require_once("./includes/head.php") ?>
<?php require_once("./includes/navbar.php") ?>
    <section class="login-container">
      <div class="login-error">
        <?php if (count($errores) > 0): ?>
          <?php foreach ($errores as $error) : ?>
            <li>
              <?=$error?>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <form class="login-form" method="post">
        <label for="user">Nombre de Usuario: </label>
        <input type="text" name="user" placeholder="User" id="user" value="<?php if (isset($_SESSION['user'])) :?><?=$_SESSION['user']?><?php endif; ?>">
        <br>
        <label for="pwd">Contraseña: </label>
        <input type="password" name="pwd" placeholder="Password" id="pwd">
        <br>
        <label for="recordar" id="chbx">Recordarme</label><input type="checkbox" name="recordar" id="recordar">

        <br>
        <button type="submit" name="login">Login</button>
        <br>
        <div class="login-footer">
          <ul>
            <li><a class="picto" href="registro.php">Registrarme</a></li>
            <li><a class="type" href="recupero.php">Olvidé mi contraseña</a></li>
          </ul>
        </div>
      </form>

    </section>
<?php require_once("./includes/footer.php") ?>
