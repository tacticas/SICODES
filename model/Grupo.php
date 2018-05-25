<?php 
require_once 'Connection.php';
class Grupo extends Connection 
{	
	//query para obtener todo los campos
	public function getAll(){
		return $this->con->query("SELECT idGrupo,grupo.nombre as ngrupo,curso.idCurso,curso.nombre as ncurso FROM grupo JOIN curso where grupo.idCurso=curso.idCurso")->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getAllAlumnos(){
		return $this->con->query("SELECT * FROM alumno")->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getAllRelacion($id){
		return $this->con->query("SELECT * from alumno JOIN alumnogrupo WHERE alumno.idAlumno = alumnogrupo.idAlumno AND alumnogrupo.idGrupo =".$id)->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAlumno($id){
		return $this->con->query("SELECT * FROM alumno WHERE alumno.idAlumno NOT IN (SELECT alumno.idAlumno FROM alumno JOIN alumnogrupo ON alumno.idAlumno = alumnogrupo.idAlumno WHERE alumnogrupo.idGrupo = '$id')")->fetchAll(PDO::FETCH_ASSOC);
	}
//Agregar alumno a grupo
	public function addAlumnoToGrupo($alumno,$grupo){
		$query = $this->con->prepare("INSERT INTO alumnogrupo (idAlumno,idGrupo) values(?,?)");
		$exc = $query->execute(array($alumno,$grupo));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	public function delAlumnoToGrupo($id){
		$query = $this->con->prepare("DELETE FROM alumnogrupo WHERE idR = ?");
		$exc = $query->execute(array($id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}

	//query para dar de alta
	public function alta($nombre,$idCurso){
		$query = $this->con->prepare("INSERT INTO grupo (nombre,idCurso) values(?,?)");
		$exc = $query->execute(array($nombre,$idCurso));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//query para editar 
	public function editar($id,$nombre,$idCurso){
		$query = $this->con->prepare("UPDATE grupo SET nombre=?, idCurso=?  WHERE idGrupo=?");
		$exc = $query->execute(array($nombre,$idCurso,$id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	
	//query para dar de baja 
	public function eliminar($id){
		$query = $this->con->prepare("DELETE FROM grupo WHERE idGrupo=?");
		$exc = $query->execute(array($id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//obtener datos extra
	public function getCurso(){
		return $this->con->query("SELECT * FROM curso")->fetchAll(PDO::FETCH_ASSOC);
	}
	
}