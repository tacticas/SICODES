<?php 
require_once 'Connection.php';
class Curso extends Connection 
{	
	//query para obtener todo los campos
	public function getAll(){
		return $this->con->query("SELECT * FROM curso")->fetchAll(PDO::FETCH_ASSOC);
	}
	//query para dar de alta 
	public function alta($nombre,$descrip){
		$query = $this->con->prepare("INSERT INTO curso (nombre, descrip) values(?,?)");
		$exc = $query->execute(array($nombre,$descrip));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//query para editar 
	public function editar($id,$nombre,$descrip){
		$query = $this->con->prepare("UPDATE curso SET nombre=?, descrip=? WHERE idCurso=?");
		$exc = $query->execute(array($nombre,$descrip,$id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//query para dar de baja 
	public function eliminar($id){
		$query = $this->con->prepare("DELETE FROM curso WHERE idCurso=?");
		$exc = $query->execute(array($id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
}