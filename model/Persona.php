<?php 
require_once 'Connection.php';
class Persona extends Connection 
{
	public function getAllPersona(){
		return $this->con->query("SELECT * FROM usuario")->fetchAll(PDO::FETCH_ASSOC);
	}
}