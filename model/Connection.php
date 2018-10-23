<?php

class Connection
{
	//datos de la base de datos
	protected $con;
	private $host = "localhost";
	private $dbname = "tpe";
	private $username = "root";
	private $password = "";

	function __construct(){
		try{
			$this->con = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=UTF8;",$this->username, $this->password);
			$this->con->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo ("No se realizó la Connexion: ".$e->getMessage());
		}

	}

}

