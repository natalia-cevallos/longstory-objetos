<?php

require_once("db.php");
require_once("usuario.php");

class dbMySQL extends db {
  private $conn;

  public function __construct() {
    $dsn = 'mysql:host=localhost;dbname=reglog2;
    charset=utf8mb4;port=3306';
    $user ="root";
    $pass = "root";

    try {
      $this->conn = new PDO($dsn, $user, $pass);
    } catch (Exception $e) {
      echo "La conexion a la base de datos falló: " . $e->getMessage();
    }

  }

  public 	function traerPorMail($email) {
  		$query = $this->conn->prepare("Select * from usuarios where email = :email");
  		$query->bindValue(":email", $email);

  		$query->execute();

      //return $query->fetchObject("Usuario");

      $resultado = $query->fetch();

      if (!$resultado) {
        return NULL;
      }

  		return new Usuario($resultado["email"], $resultado["name"], $resultado["apellido"], $resultado["password"], $resultado["edad"], $resultado["username"], $resultado["pais"], $resultado["id"]);
  	}

    public function traerTodos() {
    		$query = $this->conn->prepare("Select * from usuarios");
    		$query->execute();

    		$arrayDeArrays = $query->fetchAll();

        $arrayDeObjetos = [];

        foreach ($arrayDeArrays as $resultado) {
          $arrayDeObjetos[] = new Usuario($resultado["email"], $resultado["name"], $resultado["apellido"], $resultado["password"], $resultado["edad"], $resultado["username"], $resultado["pais"], $resultado["id"]);
        }

        return $arrayDeObjetos;
    	}

    public	function guardarUsuario(Usuario $usuario) {
    		$query = $this->conn->prepare("Insert into usuarios values(default, :email, :name, :apellido, :password,:edad,:username,:pais)");

    		$query->bindValue(":email", $usuario->getEmail());
        $query->bindValue(":name", $usuario->getName());
        $query->bindValue(":apellido", $usuario->getApellido());
    		$query->bindValue(":password", $usuario->getPassword());
    		$query->bindValue(":edad", $usuario->getEdad());
    		$query->bindValue(":username", $usuario->getUsername());
    		$query->bindValue(":pais", $usuario->getPais());

    		$id = $this->conn->lastInsertId();
    		$usuario->setId($id);

    		$query->execute();

    		return $usuario;

    	}
}

?>
