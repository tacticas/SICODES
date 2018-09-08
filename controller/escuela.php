<?php
require_once('../model/Escuela.php');
$obj = new Escuela();
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


//obtener datos para formulario

if (isset($_POST['task'])) {
	switch ($_POST['task']) {
		case 'agregar':
			$nombre=$_POST['nombre'];
			$dir=$_POST['dir'];
			$ciudad=$_POST['ciudad'];
			$estado=$_POST['estado'];
			$pais=$_POST['pais'];
			$director=$_POST['director'];
			$control = $obj->alta($nombre,$dir,$ciudad,$estado,$pais,$director);
			break;
		case 'editar':
			$id=$_POST['escuela'];
			$nombre=$_POST['nombre'];
			$dir=$_POST['dir'];
			$ciudad=$_POST['ciudad'];
			$estado=$_POST['estado'];
			$pais=$_POST['pais'];
			$director=$_POST['director'];
			$control = $obj->editar($id,$nombre,$dir,$ciudad,$estado,$pais,$director);
			break;	
		case 'eliminar':
			$id=$_POST['idEscuela'];
			$control = $obj->eliminar($id);
			break;
		case 'agregarAln':
			
			break;
		default:
			echo 'problema';
		break;
	}
	if ($control) {
		echo "correcto";
	}else{
		echo $control;
	}

}



