<?php 
require_once 'Connection.php';
class Multires extends Connection 
{	
	//query para obtener todo los campos
	public function getAll($id){
		return $this->con->query("SELECT * FROM multimedia WHERE idCat = '$id' ")->fetchAll(PDO::FETCH_ASSOC);
	}
	
	

}

