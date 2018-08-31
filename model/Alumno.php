<?php 
require_once 'Connection.php';

class Alumno extends Connection 
{	
	//query para obtener todo los campos
	public function getAll(){
		return $this->con->query("SELECT alumno.*, escuela.nombre as eNombre FROM alumno  
		JOIN escuela ON alumno.idEscuela = escuela.idEscuela
		WHERE alumno.tipo = 1")->fetchAll(PDO::FETCH_ASSOC);
	}
	//query para dar de alta alumnos
	public function alta($matricula,$contraseña,$nombre,$apPaterno,$apMaterno,$eMail,$fnac,$sexo,$foto,$dir,$tel,$cel,$meta,$evaluacion,$cursoInicio,$fechaPago,$idEscuela,$fingreso){
		$query = $this->con->prepare("INSERT INTO alumno ( matricula, contraseña, nombre, ap1, ap2, email, fnac, sexo, foto, dir, tel,cel,meta,evaluacion,cursoInicio,fechaPago,idEscuela,fIngreso) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$exc = $query->execute(array($matricula,$contraseña,$nombre,$apPaterno,$apMaterno,$eMail,$fnac,$sexo,$foto,$dir,$tel,$cel,$meta,$evaluacion,$cursoInicio,$fechaPago,$idEscuela,$fingreso));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//query para editar alumnos
	public function editar($id,$matricula,$contraseña,$nombre,$apPaterno,$apMaterno,$eMail,$fnac,$sexo,$foto,$dir,$tel,$cel,$meta,$evaluacion,$cursoInicio,$fechaPago,$idEscuela){
		$query = $this->con->prepare("UPDATE alumno SET matricula=?, contraseña=?, nombre=?, ap1=?, ap2=?, email=?, fnac=?, sexo=?, foto=?, dir=?, tel=?,cel=?,meta=?,evaluacion=?,cursoInicio=?,fechaPago=?,idEscuela=? WHERE idAlumno=?");
		$exc = $query->execute(array($matricula,$contraseña,$nombre,$apPaterno,$apMaterno,$eMail,$fnac,$sexo,$foto,$dir,$tel,$cel,$meta,$evaluacion,$cursoInicio,$fechaPago,$idEscuela,$id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
		//query para editar sin foto
		public function editarsf($id,$matricula,$contraseña,$nombre,$apPaterno,$apMaterno,$eMail,$fnac,$sexo,$dir,$tel,$cel,$meta,$evaluacion,$cursoInicio,$fechaPago,$idEscuela){
			$query = $this->con->prepare("UPDATE alumno SET matricula=?, contraseña=?, nombre=?, ap1=?, ap2=?, email=?, fnac=?, sexo=?, dir=?, tel=?,cel=?,meta=?,evaluacion=?,cursoInicio=?,fechaPago=?,idEscuela=? WHERE idAlumno=?");
			$exc = $query->execute(array($matricula,$contraseña,$nombre,$apPaterno,$apMaterno,$eMail,$fnac,$sexo,$dir,$tel,$cel,$meta,$evaluacion,$cursoInicio,$fechaPago,$idEscuela,$id));
			if ($exc) {
				return true;
			}else{
				return false;
			}
		}
	//query para dar de baja alumnos
	public function eliminar($id){
		$query = $this->con->prepare("DELETE FROM alumno WHERE idAlumno=?");
		$exc = $query->execute(array($id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	public function getEscuela(){
		return $this->con->query("SELECT idEscuela, nombre, ciudad, estado FROM escuela")->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getCursos(){
		return $this->con->query("SELECT idCurso, nombre FROM curso")->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getLastId($id){
		return $this->con->query("SELECT escuela.*, alumno.idAlumno FROM escuela, alumno where escuela.idEscuela = '$id' order by alumno.idAlumno DESC LIMIT 1")->fetchAll(PDO::FETCH_ASSOC);
	}

	
}