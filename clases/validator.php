<?php

require_once('db.php');

class Validator {
    public 	function validarLogin($post, db $db) {
  		$errores = [];

  		foreach ($post as $clave => $valor) {
  			$post[$clave] = trim($valor);
  		}


  		if ($post['user'] == "") {
  			$errores['user'] = "El nombre de usuario es requerido";
  		}
      else if ($db->traerPorUsuario($post['user']) == NULL) {
  			$errores['user'] = "Los datos ingresados no son correctos 1";
  		}

  		$usuario = $db->traerPorUsuario($post['user']);

  		if ($post["pwd"] == "") {
  			$errores['pwd'] = "Los datos ingresados no son correctos 2";
  		} else if ($usuario != NULL) {
  			if (password_verify($post['pwd'], $usuario->getPassword()) == false) {
  				$errores['pwd'] = "Los datos ingresados no son correctos 3";
  			}
  		}
  		return $errores;
  	}

    function validarInformacion($post, db $db) {
      $errores = [];

      $nombre=$_FILES["imagen"]["name"];

      $ext = pathinfo($nombre, PATHINFO_EXTENSION);

      if ($_FILES["imagen"]["error"] != 0) {
        $errores["imagen"] = "Error al cargar la foto";
      } else if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif") {
        $errores["imagen"] = "La extension de la foto no es válida";
      }

      foreach ($post as $clave => $valor) {
        $post[$clave] = trim($valor);
      }


      if (strlen($post['nombre']) < 1) {
        $errores['nombre'] = 'El campo "Nombre" debe completarse';
      }

      if (strlen($post['apellido']) < 1) {
        $errores['apellido'] = 'El campo "Apellido" debe completarse';
      }

      if (strlen($post['user']) < 4) {
        $errores['user'] = 'El nombre de usuario debe tener mas de 4 caracteres';
      } else if ($db->checkExist('user' ,$post['user']) != NULL) {
        $errores['user'] = "El nombre de usuario ya esta en uso";
      }


      if ($post['email'] == "") {
        $errores['email'] = "El email no puede estar vacio";
      }
      else if (filter_var($post["email"], FILTER_VALIDATE_EMAIL) == false) {
        $errores["email"] = "El email es invalido";
      } else if ($db->checkExist('email' ,$post["email"]) != NULL) {
        $errores["email"] = "El email ya esta en uso";
      }

      if ($post["pwd"] == "") {
        $errores["pwd"] = "La contraseña no puede estar vacia";
      }

      if ($post["pwd_rep"] == "") {
        $errores["pwd_rep"] = "Las contraseñas no coinciden";
      }

      if ($post["pwd"] != "" && $post["pwd_rep"] != "" && $post["pwd"] != $post["pwd_rep"]) {
        $errores["pwd"] = "Las contraseñas no coinciden";
      }
      return $errores;
    }

}

?>
