<?php
  require_once('./functions/remember.php');
  if (!isset($_SESSION['status'])) {
    header("location: login.php"); exit;
  }
  $archivo = fopen('./json/usuarios.json', 'r');

  if ($archivo) {
    while (($linea = fgets($archivo)) !== false) {
      $linea = json_decode($linea, true);
      if ($linea['user'] == $_SESSION['user']) {
        $_SESSION['user'] = $linea['user'];
        $_SESSION['nombre'] = $linea['nombre'];
        $_SESSION['last_name'] = $linea['last_name'];
        $_SESSION['mail'] = $linea['mail'];
        $_SESSION['img'] = $linea['img'];
        break;
      }
    }
  }
  fclose($archivo);
 ?>
 <?php $tabName = "Perfil" ?>
 <?php require_once("includes/head.php") ?>
 <?php require_once("includes/navbar.php") ?>
 <section class="register-container">
   <br>
   <div class="usuario-perfil">
     <img src="img/profiles/<?=$linea['img'];?>" align="left" width="150"alt="imagen-perfil">
     <h1>Hola <?=$linea['nombre'];?> <?=$linea['last_name'];?></h1>
     <h2>Alias "<?=$linea['user'];?>"</h2>
     <h2>Tu mail: <?=$linea['mail'];?></h2>
   </div>
   <br>
   <a href="historial.php"><button type="button" name="historial">HISTORIAL DE DUELOS</button></a>
   <a href="modifica.php"><button type="button" name="modificar-datos">MODIFICAR DATOS</button></a>
   <section class="register-container">
     <h1>LOGROS DESBLOQUEADOS</h1>
   </section>
 </section>
