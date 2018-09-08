<?php 
require_once 'Connection.php';
class Avance extends Connection 
{	
	//query para obtener todo los campos
	public function getAll($id){
		return $this->con->query("SELECT alumnotarea.*,alumno.* FROM alumnotarea,alumno WHERE alumnotarea.idTarea = '$id' and alumnotarea.idAlumno = alumno.idAlumno")->fetchAll(PDO::FETCH_ASSOC);
	}

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

	
	public function addDiario($array) {
		$query = $this->con->prepare("INSERT INTO avancediario (idLista,homework,reading,writing,speaking,listening,notes) values (?,?,?,?,?,?,?)");
		$exc = $query->execute(array($array['id'],$array['homework'],$array['reading'],$array['writing'],$array['speaking'],$array['listening'],$array['notes']));
		if ($exc) {
			return true;
		}else
		{
			return false;
		}
	}
	public function addGeneralNew($a) {
		$query = $this->con->prepare("INSERT INTO avance (idLista, date, lesson, book, dictation, quiz, test, oral_quiz, oral_test) values (?,?,?,?,?,?,?,?,?)");
		$exc = $query->execute(array($a['id'],$a['date'],1,$a['book'],$a['dictation'],$a['quiz'],$a['test'],$a['oral_quiz'],$a['oral_test']));
		if ($exc) {
			return true;
		}else
		{
			return false;
		}
	}
	public function addNewLesson($a,$newLesson) {
		$query = $this->con->prepare("INSERT INTO avance (idLista, date, lesson, book, dictation, quiz, test, oral_quiz, oral_test) values (?,?,?,?,?,?,?,?,?)");
		$exc = $query->execute(array($a['id'],$a['date'],$newLesson,$a['book'],$a['dictation'],$a['quiz'],$a['test'],$a['oral_quiz'],$a['oral_test']));
		if ($exc) {
			return true;
		}else
		{
			return false;
		}
	}
	public function editGeneral($a) {
		$query = $this->con->prepare("UPDATE avance SET book=? , dictation = ?, quiz =?, test =?,oral_quiz =?, oral_test=?  WHERE avance.id= ? ");
		$exc = $query->execute(array($a['book'],$a['dictation'],$a['quiz'],$a['test'],$a['oral_quiz'],$a['oral_test'],$a['idAvance'],));
		if ($exc) {
			return true;
		}else
		{
			return false;
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

