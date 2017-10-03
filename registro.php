<?php $tabName="Registro" ?>
<?php require_once("includes/head.php") ?>
<?php require_once("includes/navbar.php") ?>
    <section class="formulario_registro">
      <p class="mensaje_registro"><strong>COMPLETA EL FORMULARIO</strong></p>
      <form class="todos_input"action="index.html" method="post">
        <input type="text" id="nombre" name="nombre" placeholder="NAME">
        <input type="text" id="nombre" name="nombre" placeholder="LASTNAME">
        <input type="text" id="nombre" name="nombre" placeholder="NICKNAME">
        <input type="email" id="mail" name="mail" placeholder="EMAIL">
        <input type="password" id="contraseña" name="contraseña" placeholder="PASSWORD">
        <input type="password" id="contraseña" name="contraseña" placeholder="CONFIRM PASSWORD">
        <input type="submit" value="REGISTRARSE">
        <input type="submit" value="RESET">
        <h4 class="ingreso_login">¿Ya tienes una cuenta? <a href="#">ingresa aquí</a></h4>
      </form>
    </section>
<?php require_once("./includes/footer.php") ?>
