<?php
require_once('../model/Profesor.php');
$obj = new Profesor();
//genera el json para la tabla
if (isset($_GET['get'])) {
	$tabla = $obj->getAll();
	if($tabla != false){
		foreach ($tabla as $key) {
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
			$nombre=$_POST['nombre'];
			$ap1=$_POST['ap1'];
			$ap2=$_POST['ap2'];
			$fnaci=$_POST['fnaci'];
			$sexo=$_POST['sexo'];
			$dir=$_POST['dir'];
			$tel=$_POST['tel'];
			$cel=$_POST['cel'];
			$user=$_POST['user'];
			$pwd=$_POST['pwd'];
			$escu=$_POST['idEscuela'];
			$control = $obj->alta($nombre,$ap1,$ap2,$fnaci,$sexo,$dir,$tel,$cel,$user,$pwd,$escu);
			break;
		case 'editar':
			$id=$_POST['idProfesor'];
			$nombre=$_POST['nombre'];
			$ap1=$_POST['ap1'];
			$ap2=$_POST['ap2'];
			$fnaci=$_POST['fnaci'];
			$sexo=$_POST['sexo'];
			$dir=$_POST['dir'];
			$tel=$_POST['tel'];
			$cel=$_POST['cel'];
			$user=$_POST['user'];
			$pwd=$_POST['pwd'];
			$escu=$_POST['idEscuela'];
			$control = $obj->editar($id,$nombre,$ap1,$ap2,$fnaci,$sexo,$dir,$tel,$cel,$user,$pwd,$escu);
			break;	
		case 'eliminar':
			$id=$_POST['profesor'];
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



