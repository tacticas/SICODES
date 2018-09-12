<?php
session_start();
require_once('../model/Anuncio.php');

$obj = new Anuncio();
//genera el json para la tabla
if (isset($_GET['get'])) {
	$tabla = $obj->getMsg($_SESSION['idEscuela']);
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}
if (isset($_GET['cambiarM'])) {

	$tabla = $obj->cambiarMsg($_POST['msg'],$_SESSION['idEscuela']);
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}


