<?php 
require_once 'Connection.php';
class Login extends Connection 
{	
	public function probarUsuario($usuario, $pass){
		return $this->con->query("SELECT * FROM usuario WHERE matricula LIKE '$usuario' AND  contrasena LIKE '$pass'")->fetch(PDO::FETCH_ASSOC);
	}
}

?>