<?php 
require_once 'Connection.php';
class MisTareas extends Connection 
{	
	//query para obtener todo los campos
	public function getAll(){
		return $this->con->query("Select tarea.*, grupo.nombre as grupoN,profesor.nombre as profesorN from tarea,grupo,profesor where tarea.idGrupo = grupo.idGrupo and tarea.idProfesor = profesor.idProfesor
		")->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getAllTareasGrupo($id){
		return $this->con->query("Select tarea.*,grupo.nombre from tarea,alumnogrupo,grupo where alcance = 'n' and alumnogrupo.idAlumno = '$id' and alumnogrupo.idGrupo <> '' and tarea.idGrupo = alumnogrupo.idGrupo AND grupo.idGrupo = tarea.idGrupo AND tarea.idTarea NOT IN (Select tarea.idTarea from tarea,alumnogrupo,alumnotarea where alcance = 'n' and alumnogrupo.idAlumno = '$id' and alumnogrupo.idGrupo <> '' and tarea.idGrupo = alumnogrupo.idGrupo AND tarea.idTarea = alumnotarea.idTarea )")->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getAllTareasIndi($id){
		return $this->con->query("Select tarea.*, grupo.nombre as grupoN,profesor.nombre as profesorN from tarea,grupo,profesor where tarea.idGrupo = grupo.idGrupo and tarea.idProfesor = profesor.idProfesor and alcance like 1 and tarea.idAlumno = ".$id)->fetchAll(PDO::FETCH_ASSOC);
	}
	
	//query para dar de alta 
	public function alta($idAlumno,$idTarea,$texto,$ruta){
		$query = $this->con->prepare("INSERT INTO alumnotarea (idAlumno,idTarea,texto,archivo) values(?,?,?,?)");
		$exc = $query->execute(array($idAlumno,$idTarea,$texto,$ruta));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//query para determianr el grupo del alumno
	
	public function getAlumnoGrupo($id){
		return $this->con->query("SELECT alumnogrupo.idgrupo FROM alumnogrupo where idAlumno = '$id'")->fetchAll(PDO::FETCH_ASSOC);
		
	}
	//funciones propias
	public function rutaRandom(){
		$fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );
			$random = rand(1, 9999);
			$fecha .= $random;
			return $fecha;
	}
}