<?php

require_once("usuario.php");

abstract class db {
  public abstract function guardarUsuario(Usuario $usuario);
  public abstract function traerPorUsuario($usuario);
}

?>
