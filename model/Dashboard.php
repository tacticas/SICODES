<?php 
require_once 'Connection.php';
class Dashboard extends Connection 
{	


	public function registroHoy($idEscuela){
		
		$resultado = $this->con->query("SELECT  lista.status,alumno.matricula, alumno.nombre, alumno.ap1, alumno.ap2 , alumno.idAlumno, horario.*,  grupo.nombre AS Gnombre, time(lista.registro) as hora, lista.id as idLista
        FROM alumno 
       JOIN alumnogrupo ON alumno.idAlumno = alumnogrupo.idAlumno 
        JOIN horario ON alumnogrupo.idGrupo = horario.idGrupo
        JOIN grupo ON alumnogrupo.idGrupo = grupo.idGrupo
        JOIN lista ON alumno.idAlumno = lista.idAlumno AND horario.idGrupo = lista.idGrupo AND date(lista.registro) = date(now())
		WHERE horario.dia = Date_format(now(),'%W') AND lista.status > 0 AND grupo.idEscuela = '$idEscuela'")->fetchAll(PDO::FETCH_ASSOC);
		
		//$número_filas =  $resultado->rowCount();
		
		if ($resultado) {
			return $resultado;
		}else
		{
			return "0";
		}
	
	}

	public function horarioHoy($id){
		
		$resultado = $this->con->query("SELECT grupo.nombre, curso.nombre as cursoN, horario.dia, horario.ini, horario.fin  FROM alumnogrupo 
		JOIN grupo ON alumnogrupo.idGrupo = grupo.idGrupo
		JOIN curso ON grupo.idCurso = curso.idCurso
		JOIN horario ON grupo.idGrupo = horario.idGrupo AND  Date_format(now(),'%W') = horario.dia
		WHERE alumnogrupo.idAlumno = '$id'")->fetchAll(PDO::FETCH_ASSOC);
		
		if ($resultado) {
			return $resultado;
		}else
		{
			return "0";
		}
	
	}

	//tareas
	public function getAllTareasGrupo($id){
		return  $this->con->query("Select tarea.*,grupo.nombre from tarea,alumnogrupo,grupo where alcance = 'n' and alumnogrupo.idAlumno = '$id' and alumnogrupo.idGrupo <> '' and tarea.idGrupo = alumnogrupo.idGrupo AND grupo.idGrupo = tarea.idGrupo AND tarea.idTarea NOT IN (Select tarea.idTarea from tarea,alumnogrupo,alumnotarea where alcance = 'n' and alumnogrupo.idAlumno = '$id' and alumnogrupo.idGrupo <> '' and tarea.idGrupo = alumnogrupo.idGrupo AND tarea.idTarea = alumnotarea.idTarea and alumnotarea.status <> 4 )")->fetchAll(PDO::FETCH_ASSOC);
	
	}
	public function getAllTareasIndi($id){
		return $this->con->query("Select tarea.*,grupo.nombre from tarea,alumnogrupo,grupo where alcance = '1' and alumnogrupo.idAlumno = '$id' and alumnogrupo.idGrupo <> '' and tarea.idGrupo = alumnogrupo.idGrupo AND grupo.idGrupo = tarea.idGrupo AND tarea.idTarea NOT IN (Select tarea.idTarea from tarea,alumnogrupo,alumnotarea where alcance = '1' and alumnogrupo.idAlumno = '$id' and alumnogrupo.idGrupo <> '' and tarea.idGrupo = alumnogrupo.idGrupo AND tarea.idTarea = alumnotarea.idTarea and alumnotarea.status <> 4 )")->fetchAll(PDO::FETCH_ASSOC);

	}
	public function getCourseStatus($id){
		$resultado = $this->con->query("SELECT grupo.nombre, ROUND(avg(a.homework),2) as hm, ROUND(avg(a.reading),2) as rd, ROUND(avg(a.writing),2) as wr, ROUND(avg(a.speaking),2) as sp, ROUND(avg(a.listening),2) as li from avancediario a
		JOIN lista on a.idLista = lista.id
		JOIN grupo ON lista.idGrupo = grupo.idGrupo
		WHERE lista.idAlumno = '$id'")->fetchAll(PDO::FETCH_ASSOC);
		if ($resultado) {
			return $resultado;
		}else
		{
			return "0";
		}
	}
	public function getCourseProgress($id){
		$resultado = $this->con->query("SELECT avance.*, grupo.nombre FROM avance
		JOIN lista ON avance.idLista = lista.id
		JOIN grupo ON lista.idGrupo = grupo.idGrupo
		WHERE lista.idAlumno= '$id'  order by grupo.nombre")->fetchAll(PDO::FETCH_ASSOC);
		if ($resultado) {
			return $resultado;
		}else
		{
			return "0";
		}
	}
	public function getMensajes($id){
		
		$resultado = $this->con->query("SELECT mensaje.*, t.nombre as tx_name, t.ap1 as tx_ap1, r.nombre as rx_name, r.ap1 as rx_ap1 
		FROM mensaje 
		JOIN alumno t ON mensaje.tx = t.idAlumno
		JOIN alumno r ON mensaje.rx = r.idAlumno
		WHERE mensaje.rx = '$id' AND mensaje.status = 0")->fetchAll(PDO::FETCH_ASSOC);
		if ($resultado) {
			return $resultado;
		}else
		{
			return "0";
		}
	}
	public function getEventos(){
		
		$resultado = $this->con->query("SELECT e.title, e.descrip, e.start FROM evento e order by e.start DESC limit 2")->fetchAll(PDO::FETCH_ASSOC);
		if ($resultado) {
			return $resultado;
		}else
		{
			return "0";
		}
	}
	public function getInfo($id){
		
		$resultado = $this->con->query("SELECT alumno.*, date(now()) as fActual from alumno WHERE alumno.idAlumno = '$id'")->fetchAll(PDO::FETCH_ASSOC);
		if ($resultado) {
			return $resultado;
		}else
		{
			return "0";
		}
	}



	public function precarga($idAlumno,$idGrupo){
		$resultado = $this->con->query("SELECT avance.*, avance.id as idAvance FROM avance 
        JOIN lista ON avance.idLista = lista.id 
        WHERE lista.idAlumno = '$idAlumno'  and lista.idGrupo = '$idGrupo' ORDER BY avance.id DESC LIMIT 1")->fetchAll(PDO::FETCH_ASSOC);
		
		if ($resultado) {
			return $resultado;
		}else
		{
			return "0";
		}
	}
	

}

