<?php 
require_once 'Connection.php';
class Profesor extends Connection 
{	
	//query para obtener todo los campos
	public function getAll(){
		return $this->con->query("SELECT * FROM profesor")->fetchAll(PDO::FETCH_ASSOC);
	}
	//query para dar de alta 
	public function alta($nombre,$ap1,$ap2,$fnaci,$sexo,$dir,$tel,$cel,$usuario,$contra){
		$query = $this->con->prepare("INSERT INTO profesor (nombre,ap1,ap2,fnaci,sexo,dir,tel,cel,usuario,contraseña) values(?,?,?,?,?,?,?,?,?,?)");
		$exc = $query->execute(array($nombre,$ap1,$ap2,$fnaci,$sexo,$dir,$tel,$cel,$usuario,$contra));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//query para editar 
	public function editar($id,$nombre,$ap1,$ap2,$fnaci,$sexo,$dir,$tel,$cel,$usuario,$contra){
		$query = $this->con->prepare("UPDATE profesor SET nombre=?,ap1=?,ap2=?,fnaci=?,sexo=?,dir=?,tel=?,cel=?, usuario=?, contraseña=? WHERE idProfesor=?");
		$exc = $query->execute(array($nombre,$ap1,$ap2,$fnaci,$sexo,$dir,$tel,$cel,$usuario,$contra,$id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//query para dar de baja 
	public function eliminar($id){
		$query = $this->con->prepare("DELETE FROM profesor WHERE idProfesor=?");
		$exc = $query->execute(array($id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
}