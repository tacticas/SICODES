<?php
require_once('../model/Curso.php');
$obj = new Curso();
//genera el json para la tabla
if (isset($_GET['get'])) {
	$tabla = $obj->getAll();
	if($tabla != false){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data = "";
	}
	echo json_encode($data);
}


if (isset($_POST['task'])) {
	switch ($_POST['task']) {
		case 'agregar':
			$nombre=$_POST['nombre'];
			$descrip=$_POST['descrip'];
			$control = $obj->alta($nombre,$descrip);
			break;
		case 'editar':
			$id=$_POST['idCurso'];
			$nombre=$_POST['nombre'];
			$descrip=$_POST['descrip'];
			$control = $obj->editar($id,$nombre,$descrip);
			break;	
		case 'eliminar':
			$id=$_POST['idCurso'];
			$control = $obj->eliminar($id);
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



