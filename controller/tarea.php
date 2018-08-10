<?php
session_start();
require_once('../model/Tarea.php');

$obj = new Tarea();
//genera el json para la tabla
if (isset($_GET['get'])) {
	$idProf=$_SESSION['idMaster'];
	$tabla = $obj->getAllByProf($idProf);
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

if(isset($_GET['carga'])){
	if($_GET['carga']==1){
		$grupo = $obj->getGrupo();
		if($grupo == false){
			$grupo = "";
		}
		echo json_encode($grupo);
	}
	if($_GET['carga']==2){
		$idGrupo = $_GET['grupo'];
		$res = $obj->getAlumno($idGrupo);
		if($res == false){
			$res = "";
		}
		echo json_encode($res);
	}
	
	
}

if (isset($_POST['task'])) {
	switch ($_POST['task']) {
		case 'agregar':
			$idProfesor=$_SESSION['idMaster'];
			$alcance=$_POST['alcance'];
			$grupo=$_POST['idGrupo'];
			$tema=$_POST['tema'];
			$descrip=$_POST['descrip'];
			if ($alcance == 1) {
				$alumno=$_POST['idAlumno'];
			}else{
				$alumno=0;
			}
			$tipo=$_POST['tipo'];
			if ($tipo == 4) {
				$textoDi=$_POST['textoDi'];
			}else{
				$textoDi="";
			}
			//foto
			echo($_FILES['foto']['tmp_name']);
			if (isset($_FILES['foto'])) {
				if($_FILES['foto']['tmp_name']){
					$rutaRandom = $obj->rutaRandom();
					$audio =$_FILES['foto'];
					if($_FILES['foto']['type'] == "image/jpeg" ){
						$rutax="../assets/audio/dictados/".$rutaRandom.".jpeg";
						$ruta="assets/audio/dictados/".$rutaRandom.".jpeg";
					}
					if($_FILES['foto']['type'] == "image/png" ){
						$rutax="../assets/audio/dictados/".$rutaRandom.".png";
						$ruta="assets/audio/dictados/".$rutaRandom.".png";
					}
					if($_FILES['foto']['type'] == "application/pdf"){
						$rutax="../assets/audio/dictados/".$rutaRandom.".pdf";
						$ruta="assets/audio/dictados/".$rutaRandom.".pdf";
					}
					if($_FILES['foto']['type'] == "application/msword"){
						$rutax="../assets/audio/dictados/".$rutaRandom.".doc";
						$ruta="assets/audio/dictados/".$rutaRandom.".doc";
					}
					if($_FILES['foto']['type'] == "audio/mp3" || $_FILES['foto']['type'] == "audio/wav"){
						$rutax="../assets/audio/dictados/".$rutaRandom.".wav";
						$ruta="assets/audio/dictados/".$rutaRandom.".wav";
					}
					move_uploaded_file($audio['tmp_name'],$rutax);
				}
				$ruta="";
				
			}else{
				$ruta="";
			}
						
			$control = $obj->alta($grupo,$alumno,$idProfesor,$alcance,$tema,$descrip,$tipo,$ruta,$textoDi);
			break;
		case 'editar':
			$idTarea=$_POST['idTarea'];
			$alcance=$_POST['alcance'];
			$grupo=$_POST['idGrupo'];
			$tema=$_POST['tema'];
			$descrip=$_POST['descrip'];
			$tipo=$_POST['tipo'];
			if ($tipo == 4) {
				$textoDi=$_POST['textoDi'];
			}else{
				$textoDi="";
			}
			//foto
			if (isset($_FILES['foto'])) {
				$rutaRandom = $obj->rutaRandom();
				$audio =$_FILES['foto'];
				if($_FILES['foto']['type'] == "image/jpeg" ){
					$rutax="../assets/audio/dictados/".$rutaRandom.".jpeg";
					$ruta="assets/audio/dictados/".$rutaRandom.".jpeg";
				}
				if($_FILES['foto']['type'] == "image/png" ){
					$rutax="../assets/audio/dictados/".$rutaRandom.".png";
					$ruta="assets/audio/dictados/".$rutaRandom.".png";
				}
				if($_FILES['foto']['type'] == "application/pdf"){
					$rutax="../assets/audio/dictados/".$rutaRandom.".pdf";
					$ruta="assets/audio/dictados/".$rutaRandom.".pdf";
				}
				if($_FILES['foto']['type'] == "application/msword"){
					$rutax="../assets/audio/dictados/".$rutaRandom.".doc";
					$ruta="assets/audio/dictados/".$rutaRandom.".doc";
				}
				if($_FILES['foto']['type'] == "audio/mp3" || $_FILES['foto']['type'] == "audio/wav"){
					$rutax="../assets/audio/dictados/".$rutaRandom.".wav";
					$ruta="assets/audio/dictados/".$rutaRandom.".wav";
				}
				move_uploaded_file($audio['tmp_name'],$rutax);
				$control = $obj->editar($tema,$descrip,$ruta,$idTarea);
			}else{
				$control = $obj->editarsf($tema,$descrip,$idTarea);
			}
			break;	
		case 'eliminar':
			$id=$_POST['idTarea'];
			$control = $obj->eliminar($id);
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



