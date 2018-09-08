<?php 
require_once 'Connection.php';
class Lista extends Connection 
{	
	//query para obtener todo los campos
	public function getAll($id){
		return $this->con->query("SELECT alumnotarea.*,alumno.* FROM alumnotarea,alumno WHERE alumnotarea.idTarea = '$id' and alumnotarea.idAlumno = alumno.idAlumno")->fetchAll(PDO::FETCH_ASSOC);
	}
	

	public function getListaByAlumno(){
		
		$resultado = $this->con->query("SELECT lista.id,alumno.matricula, alumno.nombre, alumno.ap1, alumno.ap2 , alumno.idAlumno, horario.*,  grupo.nombre AS Gnombre, time(lista.registro) as hora
        FROM alumno 
       JOIN alumnogrupo ON alumno.idAlumno = alumnogrupo.idAlumno 
        JOIN horario ON alumnogrupo.idGrupo = horario.idGrupo
        JOIN grupo ON alumnogrupo.idGrupo = grupo.idGrupo
        JOIN lista ON alumno.idAlumno = lista.idAlumno AND horario.idGrupo = lista.idGrupo AND date(lista.registro) = date(now())
        WHERE horario.dia = Date_format(now(),'%W') and lista.status = 0");
		$número_filas =  $resultado->rowCount();
		if ($número_filas > 0) {
			return $resultado;
		}else
		{
			return "0";
		}
	}
	public function registroHoy($idEscuela){
		
		$resultado = $this->con->query("SELECT alumno.matricula, alumno.nombre, alumno.ap1, alumno.ap2 , alumno.idAlumno, horario.*,  grupo.nombre AS Gnombre, time(lista.registro) as hora
        FROM alumno 
       JOIN alumnogrupo ON alumno.idAlumno = alumnogrupo.idAlumno 
        JOIN horario ON alumnogrupo.idGrupo = horario.idGrupo
        JOIN grupo ON alumnogrupo.idGrupo = grupo.idGrupo
        JOIN lista ON alumno.idAlumno = lista.idAlumno AND horario.idGrupo = lista.idGrupo AND date(lista.registro) = date(now())
        WHERE horario.dia = Date_format(now(),'%W') AND lista.status > 0 AND grupo.idEscuela = '$idEscuela'");
		$número_filas =  $resultado->rowCount();
		if ($número_filas > 0) {
			return $resultado;
		}else
		{
			return "0";
		}
	}


	public function alumosLesToca($idEscuela){
		
		$resultado = $this->con->query("SELECT alumno.idAlumno, grupo.idGrupo, horario.dia
		FROM alumno
		JOIN alumnogrupo on alumno.idAlumno = alumnogrupo.idGrupo
		JOIN grupo on grupo.idGrupo =alumnogrupo.idAlumno 
		JOIN horario on grupo.idGrupo = horario.idGrupo and horario.dia = Date_format(now(),'%W')
		WHERE grupo.idEscuela = '$idEscuela'");
		$número_filas =  $resultado->rowCount();
		if ($número_filas > 0) {
			return $resultado;
		}else
		{
			return "0";
		}
	}
	public function botonSi($idEscuela){
		
		$resultado = $this->con->query("SELECT * FROM lista 
		JOIN grupo ON lista.idGrupo = grupo.idGrupo
		WHERE date(lista.registro) = date(now()) 
		and grupo.idEscuela = '$idEscuela'");
		$número_filas =  $resultado->rowCount();
		if ($número_filas > 0) {
			return $resultado;
		}else
		{
			return "0";
		}
	}

	public function registrarUser($arry){
		$query = $this->con->prepare("UPDATE lista SET registro=NOW() , status= ? WHERE lista.id = ?");
		$exc = $query->execute(array(1,$arry['id']));
		$rows =  $exc->rowCount();
		if ($rows > 0) {
			return true;
		}else
		{
			return false;
		}
	}

	public function inicioPase($arry){
		$query = $this->con->prepare("INSERT INTO lista (idAlumno,idGrupo,status ) values(?,?,?)");
		$exc = $query->execute(array($arry['idAlumno'],$arry['idGrupo'],0));
		if ($exc ) {
			return true;
		}else
		{
			return false;
		}
	}
	
	

}

