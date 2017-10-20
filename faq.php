<?php
session_start();
require_once('./functions/remember.php');
if (!isset($_SESSION['status'])) {
cookieLogin();
}
$tabName = "FAQ" ?>
<?php require_once("includes/head.php") ?>
<?php require_once("includes/navbar.php") ?>
    <section class="faq-container">
      <article class="qa">
        <strong>El juego no se muestra</strong>
        <br><br>
        <em>Comprueba tus versiones de Flash o X. De seguir fallando prueba otro navegador, te recomendamos Firefox</em>
        <br><br>
      </article>
      <article class="qa">
        <strong>Cómo guardar mi progreso?</strong>
        <br><br>
        <em>Los progresos se guardaran solamente si estas registrado. Para crear una cuenta haz click en la opcion "Registrarse"</em>
        <br><br>
      </article>
      <article class="qa">
        <strong>El juego no me carga</strong>
        <br><br>
        <em>Presiona Ctrl+F5, de no funcionar cierra el navegador y vuelve a abrirlo</em>
        <br><br>
      </article>
      <article class="qa">
        <strong>No se acreditaron mis puntos</strong>
        <br><br>
        <em>No te preocupes los puntos pueden tardar hasta 4min en acreditarse</em>
        <br><br>
      </article>
      <article class="qa">
        <strong>Cómo hago para jugar desde un dispositivo movil?</strong>
        <br><br>
        <em>Accede al sitio desde tu dispositivo movil y seras redirigido a la version compatible con tu movil o tablet</em>
        <br><br>
      </article>
      <article class="qa">
        <strong>Cómo comparo mis puntos con los de mis amigos?</strong>
        <br><br>
        <em>De momento no es posible pero el juego esta en constante progreso y pronto podra ser visible</em>
        <br><br>
      </article>
      <article class="qa">
        <strong>El juego esta lento</strong>
        <br><br>
        <em>Esto puede ocurrir por diferentes razones te recomendamos que verifiques tu ordenador y tu conexión a internet si el problema persiste, borra tu memoria cache: Ctrl+Shift+Delete (Seleciona todo menos las password)</em>
        <br><br>
      </article>
      <article class="qa">
        <strong>No encuentro mi problema</strong>
        <br><br>
        <em>Ponte en contacto con nosotro haciendo click <a href="mailto:otromail@mail.com">AQUÍ</a></em>
        <br><br>
      </article>
</section>
<?php require_once("./includes/footer.php") ?>
