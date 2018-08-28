<?php
session_start();
require_once('../model/Multires.php');

$obj = new Multires();

if (isset($_GET['getAll2'])) {
	$tabla = $obj->getAll();
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data = "";
	}
	echo json_encode($data);
}


if (isset($_GET['getAll'])) {
	$id= $_GET['getAll'];
	$tabla = $obj->getAll($id);
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
