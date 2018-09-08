<?php
session_start();
require_once('../model/Avance.php');

$obj = new Avance();
//genera el json para la tabla
if (isset($_GET['get'])) {
	$tabla = $obj->registroHoy($_SESSION['idEscuela']);
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"] = array();
	}
	echo json_encode($data);
}

if (isset($_GET['precarga'])) {
	$idAlumno = $_GET['idAlumno'];
	$idGrupo = $_GET['idGrupo'];
	$tabla = $obj->precarga($idAlumno,$idGrupo);
	if($tabla != "0"){
		foreach ($tabla as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data["data"][] = ['lesson' => "0"];
	}
	echo json_encode($data);
}

if(isset($_POST['task'])){
	if($_POST['task']== 'diario'){
	  $control = $obj->addDiario($_POST);
		

	}elseif($_POST['task']== 'general'){
		switch ($_POST['lesson']) {
			case '0':
				$control = $obj->editGeneral($_POST);
				break;
			
			case '1':
			 	$newLesson = $_POST['num_lesson']+1;
				$control = $obj->addNewLesson($_POST,$newLesson);
				break;
			
			case '2':
				$control = $obj->addGeneralNew($_POST);
				break;
			
			default:
				# code...
				break;
		}
		
	}

	if($control){
		echo 'todo bien';
	}else{
		echo 'algo salió mal';
	}

}

