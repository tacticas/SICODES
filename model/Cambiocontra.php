<?php 
require_once 'Connection.php';
class Cambiocontra extends Connection 
{	
	//query para obtener todo los campos
	public function getInfo($id){
		return $this->con->query("SELECT alumno.contraseña as contra FROM alumno WHERE alumno.idAlumno = '$id'")->fetchAll(PDO::FETCH_ASSOC);
	}

	public function changePass($id,$a) {
		$query = $this->con->prepare("UPDATE alumno SET contraseña=?  WHERE alumno.idAlumno = ?");
		$exc = $query->execute(array($a['newPass'], $id));
		if ($exc) {
			return true;
		}else
		{
			return false;
		}
	}
}