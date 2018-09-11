<?php 
require_once 'Connection.php';
class Reportes extends Connection 
{	
	//query para obtener todo los campos
	public function getEscuelas(){
		return $this->con->query("SELECT * FROM escuela")->fetchAll(PDO::FETCH_ASSOC);
	}

	
	public function totalMatricula($a){
		
		$resultado = $this->con->query("SELECT alumno.matricula, alumno.nombre, alumno.ap1, alumno.ap2 FROM alumno WHERE alumno.tipo = 1  AND alumno.idEscuela =".$a)->fetchAll(PDO::FETCH_ASSOC);
		
		if ($resultado) {
			return $resultado;
		}else
		{
			return "0";
		}
	
	}
	public function pagos($a){
		
		$resultado = $this->con->query("SELECT alumno.matricula, alumno.nombre, alumno.ap1, alumno.ap2, alumno.fechaPago FROM alumno WHERE DAY(alumno.fechaPago) >= DAY(NOW()) and alumno.tipo = 1  AND alumno.idEscuela =".$a)->fetchAll(PDO::FETCH_ASSOC);
		
		if ($resultado) {
			return $resultado;
		}else
		{
			return "0";
		}
	
	}
	public function faltas($a){
		
		$resultado = $this->con->query("SELECT alumno.matricula, alumno.nombre, alumno.ap1, alumno.ap2, COUNT(*) as faltas FROM alumno
		JOIN lista ON alumno.idAlumno = lista.idAlumno
		WHERE lista.status = 0 AND alumno.tipo = 1  AND alumno.idEscuela =".$a." group by lista.idAlumno")->fetchAll(PDO::FETCH_ASSOC);
		
		if ($resultado) {
			return $resultado;
		}else
		{
			return "0";
		}
	
	}
}