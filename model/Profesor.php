<?php 
require_once 'Connection.php';
class Profesor extends Connection 
{	
	//query para obtener todo los campos
	public function getAll($id){
		return $this->con->query("SELECT alumno.*, escuela.nombre as eNombre FROM alumno  
		JOIN escuela ON alumno.idEscuela = escuela.idEscuela
		WHERE alumno.tipo <> 1 and alumno.idEscuela = '$id'")->fetchAll(PDO::FETCH_ASSOC);
	}
	//query para dar de alta 
	public function alta($nombre,$ap1,$ap2,$fnaci,$sexo,$dir,$tel,$cel,$usuario,$contra,$escu,$tipo){
		$query = $this->con->prepare("INSERT INTO alumno (nombre,ap1,ap2,fnac,sexo,dir,tel,cel,matricula,contraseña,tipo,idEscuela) values(?,?,?,?,?,?,?,?,?,?,?,?)");
		$exc = $query->execute(array($nombre,$ap1,$ap2,$fnaci,$sexo,$dir,$tel,$cel,$usuario,$contra,$tipo,$escu));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//query para editar 
	public function editar($id,$nombre,$ap1,$ap2,$fnaci,$sexo,$dir,$tel,$cel,$usuario,$contra,$escu){
		$query = $this->con->prepare("UPDATE alumno SET nombre=?,ap1=?,ap2=?,fnac=?,sexo=?,dir=?,tel=?,cel=?, matricula=?, contraseña=?, idEscuela=? WHERE idAlumno=?");
		$exc = $query->execute(array($nombre,$ap1,$ap2,$fnaci,$sexo,$dir,$tel,$cel,$usuario,$contra,$escu,$id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//query para dar de baja 
	public function eliminar($id){
		$query = $this->con->prepare("DELETE FROM alumno WHERE idAlumno=?");
		$exc = $query->execute(array($id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
}