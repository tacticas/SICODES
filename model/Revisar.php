<?php 
require_once 'Connection.php';
class Revisar extends Connection 
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

}

