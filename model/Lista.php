<?php 
require_once 'Connection.php';
class Lista extends Connection 
{	
	//query para obtener todo los campos
	public function getAll($id){
		return $this->con->query("SELECT alumnotarea.*,alumno.* FROM alumnotarea,alumno WHERE alumnotarea.idTarea = '$id' and alumnotarea.idAlumno = alumno.idAlumno")->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function UpdRevisar($array){
		$sentencia = $this->con->prepare("UPDATE alumnotarea SET msg=?, status=? WHERE idAlumnoTarea=?");
		$sentencia->execute(array($array['msg'],$array['status'],$array['idAlumnoTarea']));
		return true;	
	}
	public function getListaByAlumno($id){
		return $this->con->query("SELECT alumno.matricula,alumno.nombre as aName,grupo.nombre,horario.* from alumno,alumnogrupo,horario,grupo WHERE alumnogrupo.idAlumno = '$id' and grupo.idGrupo = alumnogrupo.idGrupo and horario.idGrupo = grupo.idGrupo and horario.dia = Date_format(now(),'%W')");
	}

}

