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

if (isset($_GET['getTareaIndi'])) {
	$idAlumno=$_SESSION['idMaster'];
	$tabla = $obj->getAllTareasIndi($idAlumno);

	if($tabla != false){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data = "";
	}
	echo json_encode($data);
}

if (isset($_GET['getTareaReal'])) {
	$idAlumno=$_SESSION['idMaster'];
	$tabla = $obj->getAllTareasCompleta($idAlumno);

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
			if ($_FILES['data']['tmp_name']!="") {
				$rutaRandom = $obj->rutaRandom();
				$audio =$_FILES['data'];
				if($_FILES['data']['type'] == "image/jpeg" ){
					$rutax="../assets/img/tareas/".$rutaRandom.".jpeg";
					$ruta="assets/img/tareas/".$rutaRandom.".jpeg";
				}
				if($_FILES['data']['type'] == "image/png" ){
					$rutax="../assets/img/tareas/".$rutaRandom.".png";
					$ruta="assets/img/tareas/".$rutaRandom.".png";
				}
				if($_FILES['data']['type'] == "application/pdf"){
					$rutax="../assets/pdf/".$rutaRandom.".pdf";
					$ruta="assets/pdf/".$rutaRandom.".pdf";
				}
				if($_FILES['data']['type'] == "application/msword"){
					$rutax="../assets/word/".$rutaRandom.".doc";
					$ruta="assets/word/".$rutaRandom.".doc";
				}
				if($_FILES['data']['type'] == "audio/mp3" || $_FILES['data']['type'] == "audio/wav"){
					$rutax="../assets/audio/dictados/".$rutaRandom.".wav";
					$ruta="assets/audio/dictados/".$rutaRandom.".wav";
				}
				move_uploaded_file($audio['tmp_name'],$rutax);
				
			}else{
				$ruta="";
			}
						
			$control = $obj->alta($idAlumno,$idTarea,$texto,$ruta);
			break;

		case 'editar':
		//el formulario de editar osea vamos sobre el mismo id recivir idAlumnoTarea
		$idAlumno=$_SESSION['idMaster'];
			$texto = $_POST['respuesta'];
			$idAlumnoTarea = $_POST['idAlumnoTarea'];
			$idTarea =$_POST['idTarea'];
			if ($_FILES['data']['tmp_name']!="") {
				$rutaRandom = $obj->rutaRandom();
				$audio =$_FILES['data'];
				if($_FILES['data']['type'] == "image/jpeg" ){
					$rutax="../assets/img/tareas/".$rutaRandom.".jpeg";
					$ruta="assets/img/tareas/".$rutaRandom.".jpeg";
				}
				if($_FILES['data']['type'] == "image/png" ){
					$rutax="../assets/img/tareas/".$rutaRandom.".png";
					$ruta="assets/img/tareas/".$rutaRandom.".png";
				}
				if($_FILES['data']['type'] == "application/pdf"){
					$rutax="../assets/pdf/".$rutaRandom.".pdf";
					$ruta="assets/pdf/".$rutaRandom.".pdf";
				}
				if($_FILES['data']['type'] == "application/msword"){
					$rutax="../assets/word/".$rutaRandom.".doc";
					$ruta="assets/word/".$rutaRandom.".doc";
				}
				if($_FILES['data']['type'] == "audio/mp3" || $_FILES['data']['type'] == "audio/wav"){
					$rutax="../assets/audio/dictados/".$rutaRandom.".wav";
					$ruta="assets/audio/dictados/".$rutaRandom.".wav";
				}
				move_uploaded_file($audio['tmp_name'],$rutax);
				$control = $obj->editarR($texto,$ruta,$idAlumnoTarea);
			}else{
							
				$control = $obj->editarRSin($texto,$idAlumnoTarea);
			}
			

			break;
		case 'dictado':
			$idAlumno=$_SESSION['idMaster'];
			$texto = $_POST['respuesta'];
			$idTarea =$_POST['idTarea'];
			$archivo ='';

			$control = $obj->alta($idAlumno,$idTarea,$texto,$archivo);
			break;
		case 'dictadoE':
			$idAlumnoTarea = $_POST['idAlumnoTarea'];
			
			$texto = $_POST['respuesta'];
		

			$control = $obj->editarRSin($texto,$idAlumnoTarea);
		
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



