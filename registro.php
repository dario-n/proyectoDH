<?php $tabName="Registro" ?>
<?php require_once("includes/head.php") ?>
<?php require_once("includes/navbar.php") ?>

    <section class="register-container">
      <h2>COMPLETA EL FORMULARIO</h2>
      <form class="register-form" action="index.html" method="post">
        <input type="text" id="nombr " name="nombre" placeholder="NAME">
        <input type="text" id="nombre" name="nombre" placeholder="LASTNAME">
        <input type="text" id="nombre" name="nombre" placeholder="NICKNAME">
        <input type="email" id="mail" name="mail" placeholder="EMAIL">
        <input type="password" id="contraseña" name="contraseña" placeholder="PASSWORD">
        <input type="password" id="contraseña" name="contraseña" placeholder="CONFIRM PASSWORD">
        <button type="submit" name="registrar">Registrarse</button>
        <button type="reset" name="reset">Reset</button>
        <h4>¿Ya tienes una cuenta? <a href="login.php">ingresa aquí</a></h4>
      </form>
    </section>

<?php require_once("./includes/footer.php") ?>
