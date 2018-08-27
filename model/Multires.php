<?php 
require_once 'Connection.php';
class Multires extends Connection 
{	
	//query para obtener todo los campos
	public function getAll(){
		return $this->con->query("SELECT * FROM catmultimedia")->fetchAll(PDO::FETCH_ASSOC);
	}
	
	

}

