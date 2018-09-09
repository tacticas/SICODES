<?php
session_start();
require_once('../model/Dashboard.php');

$obj = new Dashboard();
//genera el json para la tabla
if (isset($_GET['get'])) {
	$tabla = $obj->registroHoy($_SESSION['idEscuela']);
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}
if (isset($_GET['schedule'])) {
	$tabla = $obj->horarioHoy($_SESSION['idMaster']);
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}
if (isset($_GET['homework'])) {
	$data["data"] = array();
	$tabla = $obj->getAllTareasGrupo($_SESSION['idMaster']);
	$tabla += $obj->getAllTareasIndi($_SESSION['idMaster']);
	
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}
if (isset($_GET['courseStatus'])) {
	$tabla = $obj->getCourseStatus($_SESSION['idMaster']);
	
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}
if (isset($_GET['courseProgress'])) {
	$tabla = $obj->getCourseProgress($_SESSION['idMaster']);
	
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}
if (isset($_GET['getMensajes'])) {
	$tabla = $obj->getMensajes($_SESSION['idMaster']);
	
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}
if (isset($_GET['getEventos'])) {
	$data["data"] = array();
	$tabla = $obj->getEventos();
	
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}



if (isset($_GET['precarga'])) {
	$idAlumno = $_GET['idAlumno'];
	$idGrupo = $_GET['idGrupo'];
	$tabla = $obj->precarga($idAlumno,$idGrupo);
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"][] = ['lesson' => "0"];
	}
	echo json_encode($data);
}

