<?php

require_once('db.php');
require_once('usuario.php');

class Mysql extends db {
  private $conn;

  public function __construct() {
    $host="127.0.0.1";
    try {
      $this->conn = new PDO("mysql:host=$host;dbname=proyectodh_db", "dario", "1234", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
      header("location: db_error.php?host=$host");
      exit;
    }
  }

  public 	function traerPorUsuario($usuario) {
      $stmt = $this->conn->prepare('SELECT * FROM users WHERE user = ?');
      $stmt->bindValue(1, $usuario, PDO::PARAM_STR);
      $stmt->execute();
      $user = $stmt->fetch();


      if (!$user) {
        return NULL;
      }
  		return new Usuario($user['user'], $user['email'],$user['pwd'], $user['nombre'], $user['apellido'], $user['img'], $user['id']);
  	}

    public	function guardarUsuario(Usuario $usuario) {

        $stmt = $this->conn->prepare("INSERT INTO users (nombre, apellido, user, email, pwd, img) VALUES (:nombre, :apellido, :user, :email, :pwd, :img)");
        $stmt->bindValue(':nombre', $usuario->getNombre(), PDO::PARAM_STR);
        $stmt->bindValue(':apellido', $usuario->getApellido(), PDO::PARAM_STR);
        $stmt->bindValue(':user', $usuario->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $usuario->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':pwd', password_hash($usuario->getPassword(), PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->bindValue(':img', $usuario->getImg(), PDO::PARAM_STR);
        $stmt->execute();

        $id = $this->conn->lastInsertId();
        $usuario->setId($id);

    		return $usuario;
    	}

      public function checkExist($columna, $buscar) {
        $stmt = $this->conn->prepare("SELECT COUNT(id) cant FROM users WHERE $columna = :buscar");
        $stmt->bindValue(":buscar", $buscar, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results[0]['cant']>0;
      }
}

?>
