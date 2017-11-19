<?php
  session_start();
  require_once("mysql_connection.php");
  $errores = [];
  if (!$_POST) {
    header("location: ../index.php");
    exit;
  }
  $data = $_POST;
  if (trim($data['nombre']) == '') $errores['nombre'] = '(no has ingresado tu nombre)';
  if (trim($data['apellido']) == '') $errores['apellido'] = '(no has ingresado tu apellido)';
  if (trim($data['mail']) == '') $errores['mail'] = '(no has ingresado tu email)';
  elseif (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) $errores['mail'] = '(el mail '.$data['mail'].' no es válido)';
  elseif (check_exists('mail', $data['mail'])) $errores['mail'] = '(el mail '.$data['mail'].' ya ha sido registrado)';
  if (trim($data['user']) == '') $errores['user'] = '(no has ingresado ningún nombre de usuario))';
  elseif (check_exists('user', $data['user'])) $errores['user'] = '(el usuario '.$data['user'].' ya existe)';
  if (trim($data['pwd']) == '') $errores['pwd'] = "(no has ingresado una contraseña)";
  elseif ($data['pwd'] != $data['pwd_rep']) $errores['pwd'] = "(las contraseñas no coinciden)";
  $file = $_FILES['imagen'];
  if (empty($file['name'])) $errores['imagen'] = "(no has elegido ninguna)";
  else {
    $filename = basename($_FILES['imagen']['name']);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    if($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif" ) {
      $errores['imagen']='(sólo jpg, jpeg, png, gif)';
    }
    $size = getimagesize($file['tmp_name']);
    if (!$size) {
      $errores['imagen']='(imagen inválida)';
    }
    if ($file['size']/1024/1024>2) {
      $errores['imagen']='(tamaño máximo 2MB)';
    }
  }

  if (empty($errores)) {
    $data['ext']=$extension;
    registrar_usuario($data);
    move_uploaded_file($file['tmp_name'], "../img/profiles/".$data['user'].".".$extension);
    header("location: ../login.php");
  } else {
    $_SESSION['persistence'] = $data;
    $_SESSION['errores'] = $errores;
    header("location: ../registro.php");
  }

  function comprobarEmail($email) {
    global $db;
    $stmt = $db->prepare("SELECT COUNT(id) cant FROM users WHERE email = :email");
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results[0]['cant']>0;
  }

  function registrar_usuario($data) {
    global $db;
    $stmt = $db->prepare("INSERT INTO users (nombre, apellido, user, mail, pwd, img) VALUES (:nombre, :apellido, :user, :mail, :pwd, :img)");
    $stmt->bindValue(':nombre', $data['nombre'], PDO::PARAM_STR);
    $stmt->bindValue(':apellido', $data['apellido'], PDO::PARAM_STR);
    $stmt->bindValue(':user', $data['user'], PDO::PARAM_STR);
    $stmt->bindValue(':mail', $data['mail'], PDO::PARAM_STR);
    $stmt->bindValue(':pwd', password_hash($data['pwd'], PASSWORD_DEFAULT), PDO::PARAM_STR);
    $stmt->bindValue(':img', $data['user'].'.'.$data['ext'], PDO::PARAM_STR);
    $stmt->execute();
  }


 ?>
