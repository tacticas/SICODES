<?php 
require_once 'Connection.php';
class Login extends Connection 
{	
	public function probarAlumno($matri, $pass){
		return $this->con->query("SELECT alumno.*, escuela.nombre as eName FROM alumno JOIN escuela ON escuela.idEscuela = alumno.idEscuela WHERE matricula LIKE '$matri' AND  contraseña LIKE '$pass'")->fetch(PDO::FETCH_ASSOC);
	}

	
	public function array2Json($arreglo){
		foreach ($arreglo as $key) {
			$data["data"][] = $key;
		}
		echo json_encode($data);
	}
			
	
}
?>