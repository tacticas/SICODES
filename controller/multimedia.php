<?php
session_start();
require_once('../model/Multimedia.php');

$obj = new Multimedia();

if (isset($_GET['getAll2'])) {
	$tabla = $obj->getAll();
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}


if (isset($_GET['getAll'])) {
	$tabla = $obj->getAll();
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
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
