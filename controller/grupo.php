<?php
require_once('../model/Grupo.php');
$obj = new Grupo();
//genera el json para la tabla
if (isset($_GET['grupo'])) {
	$id = $_GET['grupo'];
	$tabla = $obj->getAllRelacion($id);
	if($tabla != false){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data = "";
	}
	
	echo json_encode($data);
}

if (isset($_GET['grupo2'])) {
	$id = $_GET['grupo2'];
	$tabla = $obj->getAlumno($id);
	if($tabla != false){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data = "";
	}
	
	echo json_encode($data);
}
if (isset($_GET['get'])) {
	if ($_GET['get']==1) {
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
	if ($_GET['get']==2) {
		$tabla = $obj->getAllAlumnos();
		if($tabla != false){
			foreach ($tabla as $key) {
				$data["data"][] = $key;
			}
		}else{
			$data = "";
		}
		echo json_encode($data);
	}
}
//agregar alumnos
if(isset($_GET['acc'])){
	if($_GET['acc']='add'){
		$grupo=$_GET['grupo'];
		$idAlumno=$_POST['idAlumno'];
		$obj->addAlumnoToGrupo($idAlumno,$grupo);
	}
	if($_GET['acc']='del'){
		$id=$_GET['reg'];
		$obj->delAlumnoToGrupo($id);
	}

}
//elimianr alumnos de grupo



//obtener datos para formulario
if(isset($_GET['carga'])){
	$cursos = $obj->getCurso();
	if($cursos == false){
		$cursos = "";
	}
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



