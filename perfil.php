<?php
  require_once('./functions/remember.php');
  if (!isset($_SESSION['status'])) {
    header("location: login.php"); exit;
  }
 $tabName = "Perfil" ?>
 <?php require_once("includes/head.php") ?>
 <?php require_once("includes/navbar.php") ?>
 <section class="register-container">
   <br>
   <div class="usuario-perfil">
     <img src="img/profiles/<?=$_SESSION['img'];?>" align="left" width="150"alt="imagen-perfil">
     <h1>Hola <?=$_SESSION['nombre'];?> <?=$_SESSION['apellido'];?></h1>
     <h2>Alias "<?=$_SESSION['user'];?>"</h2>
     <h2>Tu mail: <?=$_SESSION['mail'];?></h2>
   </div>
   <br>
   <a href="historial.php"><button type="button" name="historial">HISTORIAL DE DUELOS</button></a>
   <a href="modifica.php"><button type="button" name="modificar-datos">MODIFICAR DATOS</button></a>
   <section class="register-container">
     <h1>LOGROS DESBLOQUEADOS</h1>
   </section>
 </section>
