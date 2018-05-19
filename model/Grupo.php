<?php 
require_once 'Connection.php';
class Grupo extends Connection 
{	
	//query para obtener todo los campos
	public function getAll(){
		return $this->con->query("SELECT * FROM grupo")->fetchAll(PDO::FETCH_ASSOC);
	}
	//query para dar de alta
	public function alta($nombre,$idCurso){
		$query = $this->con->prepare("INSERT INTO grupo (nombre,idCurso) values(?,?)");
		$exc = $query->execute(array($nombre,$idCurso));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//query para editar 
	public function editar(){
		$query = $this->con->prepare("UPDATE grupo SET  WHERE id=?");
		$exc = $query->execute(array());
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
	
}