<?php 
require_once 'Connection.php';
class Grupo extends Connection 
{	
	//query para obtener todo los campos
	public function getAll($idEscuela){
		return $this->con->query("SELECT idGrupo,grupo.nombre as ngrupo,curso.idCurso,curso.nombre as ncurso FROM grupo JOIN curso on grupo.idCurso=curso.idCurso WHERE grupo.idEscuela = '$idEscuela' ")->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getAllAlumnos(){
		return $this->con->query("SELECT * FROM alumno")->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAllRelacion($id){
		return $this->con->query("SELECT * from alumno JOIN alumnogrupo WHERE alumno.idAlumno = alumnogrupo.idAlumno AND alumnogrupo.idGrupo =".$id)->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAlumno($id,$idEscuela){
		return $this->con->query("SELECT * FROM alumno WHERE alumno.idAlumno NOT IN (SELECT alumno.idAlumno FROM alumno JOIN alumnogrupo ON alumno.idAlumno = alumnogrupo.idAlumno JOIN grupo on alumnogrupo.idGrupo = grupo.idGrupo WHERE grupo.idEscuela = '$idEscuela' AND alumnogrupo.idGrupo = '$id') AND alumno.tipo = 1")->fetchAll(PDO::FETCH_ASSOC);
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
	public function alta($nombre,$idCurso,$idEscuela){
		$query = $this->con->prepare("INSERT INTO grupo (nombre,idCurso,idEscuela) values(?,?,?)");
		$exc = $query->execute(array($nombre,$idCurso,$idEscuela));
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

	public function getHorarioByGrupo($id){
		return $this->con->query("SELECT * FROM horario WHERE idGrupo = '$id'")->fetchAll(PDO::FETCH_ASSOC);
	}

	public function eliminarHorario($id){
		$query = $this->con->prepare("DELETE FROM horario WHERE idHorario=?");
		$exc = $query->execute(array($id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	public function addHorario($idGrupo,$dia,$ini,$fin){
		$query = $this->con->prepare("INSERT INTO horario (idGrupo,dia,ini,fin) values(?,?,?,?)");
		$exc = $query->execute(array($idGrupo,$dia,$ini,$fin));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	
}

