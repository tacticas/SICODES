<?php 
require_once 'Connection.php';
class Lista extends Connection 
{	
	//query para obtener todo los campos
	public function getAll($id){
		return $this->con->query("SELECT alumnotarea.*,alumno.* FROM alumnotarea,alumno WHERE alumnotarea.idTarea = '$id' and alumnotarea.idAlumno = alumno.idAlumno")->fetchAll(PDO::FETCH_ASSOC);
	}
	

	public function getListaByAlumno(){
		
		$resultado = $this->con->query("SELECT alumno.matricula,alumno.idAlumno,alumno.nombre as aName,grupo.nombre,grupo.idGrupo,horario.* from alumno,alumnogrupo,horario,grupo WHERE  grupo.idGrupo = alumnogrupo.idGrupo and horario.idGrupo = grupo.idGrupo and horario.dia = Date_format(now(),'%W')");
		$número_filas =  $resultado->rowCount();
		if ($número_filas > 0) {
			return $resultado;
		}else
		{
			return "0";
		}
	}

	public function registrarUser($arry){
		$query = $this->con->prepare("INSERT INTO lista (idAlumno,idGrupo,status ) values(?,?,?)");
		$exc = $query->execute(array($arry['idAlumno'],$arry['idGrupo'],1));
		$rows =  $exc->rowCount();
		if ($rows > 0) {
			return true;
		}else
		{
			return false;
		}
	}
	
	

}

