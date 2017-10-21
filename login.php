<?php
require_once('./functions/remember.php');
if (!isset($_SESSION['status'])) {
cookieLogin();
}
if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
  header('Location: index.php');
  exit();
  }
$tabName = "Login"
?>
<?php require_once("./includes/head.php") ?>
<?php require_once("./includes/navbar.php") ?>

    <section class="login-container">
      <div class="login-error">
        <?php if (isset($_SESSION['error'])): ?>
        <?=$_SESSION['error']?>
       <?php endif; ?>
      </div>
      <form class="login-form" action="functions/login_controller.php" method="post">
        <label for="user">Nombre de Usuario: </label>
        <input type="text" name="user" placeholder="User" id="user" value="<?php if (isset($_SESSION['user'])):?><?=$_SESSION['user']?><?php endif; ?>">
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
            <li><a href="registro.php">Registrarme</a></li>
            <li><a href="recupero.php">Olvidé mi contraseña</a></li>
          </ul>
        </div>
      </form>

    </section>
<?php require_once("./includes/footer.php") ?>
