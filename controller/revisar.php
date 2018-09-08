<?php
session_start();
require_once('../model/Revisar.php');

$obj = new Revisar();
//genera el json para la tabla
if (isset($_GET['get'])) {
	$id =  $_GET['get'];
	$tabla = $obj->getAll($id);
	if($tabla != false){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}

if(isset($_POST['accion']) && !empty($_POST['accion'])) {
	$accion = $_POST['accion'];
	switch ($accion) {
		case 'revisar':
			$_POST['status'] = 2;
			break;
		
		case 'completar':
			$_POST['status'] = 3;
			break;
		
		default:
			# code...
			break;
	}
	$flag = $obj->UpdRevisar($_POST);
	if($flag){
		echo 'Correcto';
	}
}
