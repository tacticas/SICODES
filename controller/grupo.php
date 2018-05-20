<?php
require_once('../model/Grupo.php');
$obj = new Grupo();
//genera el json para la tabla
if (isset($_GET['get'])) {
	$tabla = $obj->getAll();
	foreach ($tabla as $key) {
		$data["data"][] = $key;
	}
	echo json_encode($data);
}
//obtener datos para formulario
if(isset($_GET['carga'])){
	$cursos = $obj->getCurso();
	echo json_encode($cursos);
}

if (isset($_POST['task'])) {
	switch ($_POST['task']) {
		case 'agregar':
			$nombre=$_POST['nombre'];
			$curso=$_POST['idCurso'];
			$control = $obj->alta($nombre,$curso);
			break;
		case 'editar':
			$id=$_POST['idGrupo'];
			$nombre=$_POST['nombre'];
			$curso=$_POST['idCurso'];
			$control = $obj->editar($id,$nombre,$curso);
			break;	
		case 'eliminar':
			$id=$_POST['idGrupo'];
			$control = $obj->eliminar($id);
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



