<?php
require_once('../model/Mensaje.php');
$Object = new Mensaje();
//genera el json para la tabla
if (isset($_GET['get'])) {
	$id  = $_GET['get'];

	$datos = $Object->getAll($id);
	
	if($datos != false){
		foreach ($datos as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	
	echo json_encode($data);
}

if (isset($_GET['precarga'])) {
	$id  = $_GET['precarga'];

	$datos = $Object->precarga($id);
	
	if($datos != false){
		foreach ($datos as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	
	echo json_encode($data);
}


if (isset($_POST['task'])) {
	switch ($_POST['task']) {
		case 'agregar':

			$control = $Object->alta($_POST);
			break;
		case 'editar':
		
				break;	
		case 'eliminar':
			$idUsuario=$_POST['idUsuario'];
			$control = $Object->eliminar($idUsuario);
			break;
		default:
			echo 'problema';
		break;
	}
	if ($control) {
		echo "correcto";
	}else{
		echo "error";
	}

}



