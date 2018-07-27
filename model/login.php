<?php 
require_once 'Connection.php';
class Login extends Connection 
{	
	public function probarAlumno($matri, $pass){
		return $this->con->query("SELECT * FROM alumno WHERE matricula LIKE '$matri' AND  contraseña LIKE '$pass'")->fetch(PDO::FETCH_ASSOC);
	}

	//funcion para maestros
	public function probarProfe($u,$p){
		return $this->con->query("SELECT * FROM profesor WHERE usuario LIKE '$u' AND  contraseña LIKE '$p'")->fetch(PDO::FETCH_ASSOC);
	}
	
	public function probarPersonal($u,$p){
		return $this->con->query("SELECT * FROM personal WHERE usuario LIKE '$u' AND  contraseña LIKE '$p'")->fetch(PDO::FETCH_ASSOC);
	}

	public function probarPadre($u,$p){
		return $this->con->query("SELECT * FROM padres WHERE usuario LIKE '$u' AND  contraseña LIKE '$p'")->fetch(PDO::FETCH_ASSOC);
	}

	public function probarSuperAdmin($u,$p){
		return $this->con->query("SELECT * FROM usuario WHERE usuario LIKE '$u' AND  contraseña LIKE '$p'")->fetch(PDO::FETCH_ASSOC);
	}
	
	public function array2Json($arreglo){
		foreach ($arreglo as $key) {
			$data["data"][] = $key;
		}
		echo json_encode($data);
	}
			
	
}
?>