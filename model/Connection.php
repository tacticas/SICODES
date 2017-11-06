<?php

class Connection
{
	//datos de la base de datos
	protected $con;
	private $host = "localhost";
	private $dbname = "eminus2";
	private $username = "root";
	private $password = "";

	function __construct(){
		try{
			$this->con = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=UTF8;",$this->username, $this->password);

		}catch(PDOException $e){
			die("No se realizó la Connexion: ".$e->getMessage());
		}

	}

}

