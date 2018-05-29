<?php 
require_once 'Connection.php';
class Escuela extends Connection 
{	
	//query para obtener todo los campos
	public function getAll(){
		return $this->con->query("SELECT * from escuela")->fetchAll(PDO::FETCH_ASSOC);
	}

	//query para dar de alta
	public function alta($nombre,$dir,$ciudad,$estado,$pais,$director){
		$query = $this->con->prepare("INSERT INTO escuela (nombre, dir, ciudad, estado, pais, director) values(?,?,?,?,?,?)");
		$exc = $query->execute(array($nombre,$dir,$ciudad,$estado,$pais,$director));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//query para editar 
	public function editar($id,$nombre,$dir,$ciudad,$estado,$pais,$director){
		$query = $this->con->prepare("UPDATE escuela SET nombre=?, dir=?, ciudad=?, estado=?, pais=?, director=?  WHERE idEscuela=?");
		$exc = $query->execute(array($nombre,$dir,$ciudad,$estado,$pais,$director,$id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	
	//query para dar de baja 
	public function eliminar($id){
		$query = $this->con->prepare("DELETE FROM escuela WHERE idEscuela=?");
		$exc = $query->execute(array($id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//obtener datos extra

	
}