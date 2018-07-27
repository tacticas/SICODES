<?php 
require_once 'Connection.php';
class Tarea extends Connection 
{	
	//query para obtener todo los campos
	public function getAll(){
		return $this->con->query("Select tarea.*, grupo.nombre as grupoN,profesor.nombre as profesorN from tarea,grupo,profesor where tarea.idGrupo = grupo.idGrupo and tarea.idProfesor = profesor.idProfesor
		")->fetchAll(PDO::FETCH_ASSOC);
	}
	//query para dar de alta 
	public function alta($grupo,$alumno,$idProfesor,$alcance,$tema,$descrip,$tipo,$ruta,$textoDi){
		$query = $this->con->prepare("INSERT INTO tarea (idGrupo,idAlumno,idProfesor,alcance,tema,descripcion,tipo,archivo,textDi) values(?,?,?,?,?,?,?,?,?)");
		$exc = $query->execute(array($grupo,$alumno,$idProfesor,$alcance,$tema,$descrip,$tipo,$ruta,$textoDi));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//query para editar
	public function editar($grupo,$alumno,$alcance,$tema,$descrip,$tipo,$ruta,$textoDi,$idTarea){ //modificando aqui
		$query = $this->con->prepare("UPDATE tarea SET idGrupo=?,idAlumno=?,alcance=?,tema=?,descripcion=?,tipo=?,archivo=?,textDi=? WHERE idTarea=?");
		$exc = $query->execute(array($grupo,$alumno,$alcance,$tema,$descrip,$tipo,$ruta,$textoDi,$idTarea));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
		//query para editar sin archivo
		public function editarsf($grupo,$alumno,$alcance,$tema,$descrip,$tipo,$textoDi,$idTarea){
			$query = $this->con->prepare("UPDATE tarea SET idGrupo=?,idAlumno=?,alcance=?,tema=?,descripcion=?,tipo=?,textDi=? WHERE idTarea=?");
			$exc = $query->execute(array($grupo,$alumno,$alcance,$tema,$descrip,$tipo,$textoDi,$idTarea));
			if ($exc) {
				return true;
			}else{
				return false;
			}
		}
	//query para dar de baja Tarea
	public function eliminar($id){
		$query = $this->con->prepare("DELETE FROM tarea WHERE idTarea=?");
		$exc = $query->execute(array($id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	public function getGrupo(){
		return $this->con->query("SELECT idGrupo, nombre FROM grupo")->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getProfesor(){
		return $this->con->query("SELECT idProfesor, nombre, ap1 FROM profesor")->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getAlumno($id){
		return $this->con->query("SELECT * from alumno JOIN alumnogrupo WHERE alumno.idAlumno = alumnogrupo.idAlumno AND alumnogrupo.idGrupo =".$id)->fetchAll(PDO::FETCH_ASSOC);
	}
}