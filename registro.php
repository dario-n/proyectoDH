<?php $tabName = "Registro" ?>
<?php require_once("includes/head.php") ?>
<?php require_once("./includes/navbar.php") ?>


    <section class="register-container">
      <h2>Complete el Formulario:</h2>
      <form class="register-form" action="micuenta.php" method="post">
      <label for="name">Ingrese su Nombre: </label>
      <input type="text" name="name" placeholder="Nombre" id="name">
      <br>
      <label for="lastname">Ingrese su Apellido: </label>
      <input type="text" name="lastname" placeholder="Apellido" id="lastname">
      <br>
      <label for="email">Ingrese su Email: </label>
      <input type="email" name="email" placeholder="tuemail@email.com" id="email">
      <br>
      <label for="user">Ingrese su Usuario: </label>
      <input type="text" name="user" placeholder="Nombre de Usuario">
      <br>
      <label for="pwd">Contrasena: </label>
      <input type="password" name="pwd" placeholder="mas de 6 caracteres" id="pwd">
      <br>
      <label for="equals">Repita su Contrasena: </label>
      <input type="password" name="equals" id="equals">
      <br><br>
      <button type="submit" name="register">Registrarse</button><button type="button" name="reset">Reset</button>
      </form>
    </section>
<?php require_once("./includes/footer.php") ?>
