<?php $tabName = "Login" ?>
<?php require_once("./includes/head.php") ?>
<?php require_once("./includes/navbar.php") ?>

    <section class="login-container">
      <form class="login-form" action="micuenta.php" method="post">
        <label for="user">Nombre de Usuario: </label>
        <input type="text" name="user" placeholder="User" id="user">
        <br>
        <label for="pwd">Contraseña: </label>
        <input type="password" name="password" placeholder="Password" id="pwd">
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
