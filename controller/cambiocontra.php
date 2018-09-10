<?php
session_start();
require_once('../model/Cambiocontra.php');

$obj = new Cambiocontra();
//genera el json para la tabla
if (isset($_GET['get'])) {
	$tabla = $obj->getInfo($_SESSION['idMaster']);
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}


if(isset($_POST['task'])){
	$old = $_POST['oldPass'];
	$old2 = $_POST['contraseña'];
	
	if($old == $old2){
		$control = $obj->changePass($_SESSION['idMaster'],$_POST);
		if($control){
			echo 'todo bien';
		}else{
			echo 'algo salió mal';
		}
	}else{
		echo 'fallo';
	}


	

}

