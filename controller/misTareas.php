<?php
session_start();
require_once('../model/MisTareas.php');
$obj = new MisTareas();
//genera el json para la tabla
if (isset($_GET['get'])) {
	$idAlumno=$_SESSION['idMaster'];
	$tabla = $obj->getAllTareasGrupo($idAlumno);

	if($tabla != false){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data = "";
	}
	echo json_encode($data);
}
//obtener datos para formulario

if (isset($_POST['task'])) {
	switch ($_POST['task']) {
		case 'agregar':
			$idAlumno=$_SESSION['idMaster'];
			$texto = $_POST['respuesta'];
			$idTarea =$_POST['idTarea'];
			if (isset($_FILES['data'])) {
				$rutaRandom = $obj->rutaRandom();
				$audio =$_FILES['data'];

				$rutax="../assets/audio/".$rutaRandom.".wav";
				$ruta="assets/audio/".$rutaRandom.".wav";
				move_uploaded_file($audio['tmp_name'],$rutax);
				$control = true;
			}else {
				$ruta = "";
			}
						
			$control = $obj->alta($idAlumno,$idTarea,$texto,$ruta);
			break;
		
		default:
			echo 'problema';
		break;
	}
	if ($control) {
		echo "correcto";
	}else{
		echo $control."algo";
	}

}



