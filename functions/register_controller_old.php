<?php
  session_start();
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
  elseif (check_exists('mail', $data['mail'])) $errores['mail'] = '(el mail '.$data['mail'].' ya ha sido registrado';
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


  // funciones

  function check_exists($campo, $data) {
    $gestor = fopen('../json/usuarios.json', "r");
    $found = false;
    while ($linea = fgets($gestor)) {
      $usuario = json_decode($linea, true);
      if ($usuario[$campo] == $data) {
        $found = true;
        break;
      }
    }
    fclose($gestor);
    return $found;
  }

  function get_new_id() {
    $file="../json/usuarios.json";
    $linecount = 0;
    $handle = fopen($file, "r");
    while(!feof($handle)){
      $line = fgets($handle);
      $linecount++;
    }
    fclose($handle);
    return $linecount;
  }

  function registrar_usuario($data) {
    $nuevo_usuario = [];
    $nuevo_usuario['id'] = get_new_id();
    $nuevo_usuario['nombre'] = $data['nombre'];
    $nuevo_usuario['last_name'] = $data['apellido'];
    $nuevo_usuario['user'] = $data['user'];
    $nuevo_usuario['mail'] = $data['mail'];
    $nuevo_usuario['pwd'] = password_hash($data['pwd'], PASSWORD_DEFAULT);
    $nuevo_usuario['img'] = $data['user'].'.'.$data['ext'];
    $json = json_encode($nuevo_usuario);
    file_put_contents('../json/usuarios.json', $json.PHP_EOL, FILE_APPEND);
  }

 ?>
