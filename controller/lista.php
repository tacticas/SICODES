<?php
session_start();
require_once('../model/Lista.php');

$obj = new Lista();
//genera el json para la tabla
if (isset($_GET['get'])) {
	$id =  $_GET['get'];
	$tabla = $obj->getListaByAlumno();
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data = "";
	}
	echo json_encode($data);
}

if (isset($_GET['getRegistros'])) {
	$id =  $_GET['getRegistros'];
	$tabla = $obj->registroHoy();
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data = "";
	}
	echo json_encode($data);
}

if (isset($_GET['clases'])) {
	$id =  $_GET['clases'];
	$tabla = $obj->alumosLesToca();
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data = "";
	}
	echo json_encode($data);
}
if (isset($_GET['inicioPase'])) {
	$id =  $_GET['inicioPase'];
	$tabla = $obj->inicioPase($_POST);
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data = "";
	}
	echo json_encode($data);
}


if(isset($_GET['registrar']) && !empty($_GET['registrar'])) {
	$flag = $obj->registrarUser($_POST);
	if($flag){
		echo 'Correcto';
		
	}else{
		echo 'algo mal';
	}
}
