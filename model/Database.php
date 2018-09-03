<?php

class Database
{
	//datos de la base de datos
	private $conn;
	private $host = "localhost";
	private $dbname = "escuela";
	private $username = "root";
	private $password = "";

	public function connect(){
		$this->conn = null;

		try{
			$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=UTF8;",$this->username, $this->password);
			$this->conn->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		}catch(PDOException $e){
			echo 'No se realizó la Connexion: '.$e->getMessage();
		}

	return $this->conn;
	}
}