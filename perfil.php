<?php
require_once('./includes/clases.php');

if (!isset($_SESSION['status'])) {
$auth->cookieLogin();
}
if (!$auth->estaLogueado()) {
  header("Location:index.php");
  exit;
}

$usuario = $auth->usuarioLogueado($db);

?>
<?php $tabName = "Perfil" ?>
 <?php require_once("includes/head.php") ?>
 <?php require_once("includes/navbar.php") ?>
 <section class="perfil-container">
   <br>
   <div class="usuario-perfil">
     <img src="img/profiles/<?=$usuario->getImg()?>" align="left" width="150"alt="imagen-perfil">
     <h1>Hola <?=$usuario->getNombre();?> <?=$usuario->getApellido();?></h1>
     <h2>Alias "<?=$usuario->getUsername();?>"</h2>
     <h2>Tu mail: <?=$usuario->getEmail();?></h2>
   </div>
   <br>
   <a href="historial.php"><button class="perfpicto" type="button" name="historial">HISTORIAL DE DUELOS</button></a>
   <a href="modifica.php"><button class="perftype" type="button" name="modificar-datos">MODIFICAR DATOS</button></a>
   <section class="logros">
     <h1>LOGROS DESBLOQUEADOS</h1>
   </section>
 </section>
