<?php

class Usuario {
  private $id;
  private $user;
  private $email;
  private $pwd;
  private $nombre;
  private $apellido;
  private $img;

  public function __construct($user, $email, $pwd, $nombre, $apellido, $img, $id = null) {
    if ($id == null) {
      $this->pwd = password_hash($pwd, PASSWORD_DEFAULT);
    }
    else {
      $this->pwd = $pwd;
    }
    $this->user = $user;
    $this->email = $email;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->img = $img;
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getPassword() {
    return $this->pwd;
  }

  public function getUsername() {
    return $this->user;
  }

  public function setUsername($username) {
    $this->user = $username;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function getApellido() {
    return $this->apellido;
  }

  public function setApellido($apellido){
    $this->apellido = $apellido;
  }

  public function getImg(){
    return $this->img;
  }

  public function guardarImagen() {

		if ($_FILES["imagen"]["error"] == UPLOAD_ERR_OK)
		{

			$nombre=$_FILES["imagen"]["name"];
			$archivo=$_FILES["imagen"]["tmp_name"];

			$ext = $this->img;

			$miArchivo = dirname(__FILE__);
			$miArchivo = $miArchivo . "../../img/profiles/";
			$miArchivo = $miArchivo . $this->img;
			move_uploaded_file($archivo, $miArchivo);
		}
	}
}

?>
