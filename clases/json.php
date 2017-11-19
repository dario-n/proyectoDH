<?php

require_once("db.php");

class Json extends db {
  private $arch;

  public function __construct() {
    $this->arch = "usuarios.json";
  }

  public function traerPorUsuario($usuario) {

  }

  public function guardarUsuario(Usuario $usuario) {

  }
}

?>
