<?php
if (isset($_GET["host"])) $host=$_GET["host"]; else $host="127.0.0.1";
$error = 0;
$message = "";

try {
  $db = new PDO("mysql:host=$host;dbname=mysql;charset=UTF8", "root", "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
  $error = 1;
  $message = $e->getMessage();
}

if (isset($_POST["crearBase"])) {
  $db->exec("CREATE DATABASE IF NOT EXISTS proyectoDH;");
}

if (isset($_POST["crearTabla"])) {
  $db->exec("USE proyectoDH");
  $db->exec("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(30) NOT NULL,
    mail VARCHAR(50) NOT NULL,
    pwd VARCHAR(100) NOT NULL,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    img VARCHAR(30) NOT NULL
  );");
}

if (isset($_POST["importar"])) {
  $gestor = fopen('json/usuarios.json', "r");
  $db->exec("USE proyectoDH");
  $stmt = $db->prepare("INSERT INTO users VALUES (0,?,?,?,?,?,?);");
  while ($linea = fgets($gestor)) {
    $usuario = json_decode($linea, true);
    $stmt->bindValue(1, $usuario['user'], PDO::PARAM_STR);
    $stmt->bindValue(2, $usuario['mail'], PDO::PARAM_STR);
    $stmt->bindValue(3, $usuario['pwd'], PDO::PARAM_STR);
    $stmt->bindValue(4, $usuario['nombre'], PDO::PARAM_STR);
    $stmt->bindValue(5, $usuario['last_name'], PDO::PARAM_STR);
    $stmt->bindValue(6, $usuario['img'], PDO::PARAM_STR);
    $stmt->execute();
  }
  fclose($gestor);
}

if (isset($db)) {
  try {
    $db->exec("USE proyectoDH;");
    try {
      $stmt = $db->query("SELECT COUNT(ID) cant FROM users");
      $cant = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if ($cant[0]['cant']==0) $error = 4;
    } catch (PDOException $e) {
      $error = 3;
    }

  } catch (PDOException $e) {
    $error = 2;
  }
}

if ($error == 0) {
  header("location: index.php");
  exit;
}

 ?>

 <?php $tabName = "Home" ?>
 <?php require_once("includes/head.php") ?>
      <div class="db-error-container">
         <div class="db-error">
           Error de conexión a la base de datos:
           <div><?php if ($error==1) echo $message ?></div>
           <div><?php if ($error==2) echo "No existe la base de datos" ?></div>
           <div><?php if ($error==3) echo "No existe la tabla de usuarios" ?></div>
           <div><?php if ($error==4) echo "La tabla de usuarios está vacía" ?></div>
          <?php if ($error>1) : ?>
          <form method="post">
              <?php if ($error==2) : ?>
                <input type="submit" class="" name="crearBase" value="Crear base de datos">
              <?php elseif ($error==3) : ?>
                <input type="submit" class="" name="crearTabla" value="Crear tabla de usuarios">
              <?php elseif ($error==4) : ?>
                <input type="submit" class="" name="importar" value="Importar datos de usuarios">
              <?php endif; ?>
          </form>
          <?php endif ?>
         </div>
      </div>
 <?php require_once("./includes/footer.php") ?>
