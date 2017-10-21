<?php
session_start();
function renovarRemember ($posicion,$rnd) {
  $archivo = file_get_contents('../json/remember.json');

  $explode = explode(PHP_EOL, $archivo);

  $cambio = json_decode($explode[$posicion], true);

  $cambio['token'] = $rnd;
  $cambio['user'] = $_SESSION['user'];
  $cambio['ip'] = $_SERVER['REMOTE_ADDR'];

  $explode[$posicion] = json_encode($cambio);

  $explode = implode(PHP_EOL, $explode);

  file_put_contents('../json/remember.json', $explode);

  setcookie ($_SESSION['user'], password_hash($rnd, PASSWORD_DEFAULT), (time()+(60*60*24*360)), '/');
}
// setcookie ($_SESSION['user'], password_hash($rnd, PASSWORD_DEFAULT), (time()+(60*60*24*360)), '/');

function crearRemember ($rnd) {
  $nuevalinea = [];
  $nuevalinea['token'] = $rnd;
  $nuevalinea['user'] = $_SESSION['user'];
  $nuevalinea['ip'] = $_SERVER['REMOTE_ADDR'];
  $nuevalinea = json_encode($nuevalinea);
  file_put_contents('../json/remember.json', $nuevalinea . PHP_EOL, FILE_APPEND);
  setcookie ($_SESSION['user'], password_hash($rnd, PASSWORD_DEFAULT), (time()+(60*60*24*360)), '/');
}

function comprobarRemember(){
  $archivo = fopen('../json/remember.json', 'r');
  $random = $_SERVER['REMOTE_ADDR'] .'.' .rand(1000,9999);
  $cont = 0;
  $band = 0;
  if ($archivo) {
    while (($linea = fgets($archivo)) !== false) {
      $linea = json_decode($linea, true);
      if ($_SERVER['REMOTE_ADDR'] == $linea['ip']) {
        renovarRemember($cont, $random);
        $band = 1;
        break;
      }
      else {
        $cont++;
      }
    }
    if ($band != 1) {
      crearRemember($random);
    }
  }
  fclose($archivo);
}
function cookieLogin() {
  $archivo = fopen('./json/remember.json', 'r');
  if ($archivo) {
    while (($linea = fgets($archivo)) !== false) {
      $linea = json_decode($linea, true);
      if ($_SERVER['REMOTE_ADDR'] == $linea['ip']) {
        if (isset($_COOKIE[$linea['user']])) {
          if (password_verify($linea['token'], $_COOKIE[$linea['user']])) {
            $_SESSION['status'] = 1;
            $_SESSION['user'] = $linea['user'];
          }
        }
      }
    }
  }
  fclose($archivo);
}
