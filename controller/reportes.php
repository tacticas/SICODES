<?php
session_start();
require_once('../model/Reportes.php');

$obj = new Reportes();
//genera el json para la tabla
if (isset($_GET['get'])) {
	$tabla = $obj->getEscuelas();
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}
if (isset($_GET['matri'])) {
	$id = $_GET['matri'];
	$tabla = $obj->totalMatricula($id);
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}

if (isset($_GET['pagos'])) {
	$id = $_GET['pagos'];
	$tabla = $obj->pagos($id);
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}

if (isset($_GET['faltas'])) {
	$id = $_GET['faltas'];
	$tabla = $obj->faltas($id);
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}


