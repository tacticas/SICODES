<?php
session_start();
require_once('../model/Tarea.php');
$obj = new Tarea();
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
			if($_FILES['foto']['tmp_name']!=""){
				$foto=$_FILES['foto'];
				if($foto['type'] == "image/jpg" OR $foto['type'] == "image/jpeg"){
					$ruta="assets/img/tareas/".md5($foto['tmp_name']).".jpg";
					$rutax="../assets/img/tareas/".md5($foto['tmp_name']).".jpg";
	
					move_uploaded_file($foto['tmp_name'],$rutax);
					echo getcwd();
				}
				if($foto['type'] == "audio/*"){
					$ruta="assets/audio/".md5($foto['tmp_name']).".wav";
					$rutax="../assets/audio/".md5($foto['tmp_name']).".wav";
	
					move_uploaded_file($foto['tmp_name'],$rutax);
					echo getcwd();
				}
				if($foto['type'] == "application/pdf"){
					$ruta="assets/pdf/".md5($foto['tmp_name']).".pdf";
					$rutax="../assets/pdf/".md5($foto['tmp_name']).".pdf";
	
					move_uploaded_file($foto['tmp_name'],$rutax);
					echo getcwd();
				}
				if($foto['type'] == "application/msword"){
					$ruta="assets/pdf/".md5($foto['tmp_name']).".doc";
					$rutax="../assets/pdf/".md5($foto['tmp_name']).".doc";
	
					move_uploaded_file($foto['tmp_name'],$rutax);
					echo getcwd();
				}
				
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
			if (filesize($_FILES['foto']['tmp_name'])!=0) {
				$foto=$_FILES['foto'];
				if($foto['type'] == "image/jpg" OR $foto['type'] == "image/jpeg"){
					$ruta="assets/img/tareas/".md5($foto['tmp_name']).".jpg";
					$rutax="../assets/img/tareas/".md5($foto['tmp_name']).".jpg";
	
					move_uploaded_file($foto['tmp_name'],$rutax);
					echo getcwd();
				}
				if($foto['type'] == "audio/*"){
					$ruta="assets/audio/".md5($foto['tmp_name']).".wav";
					$rutax="../assets/audio/".md5($foto['tmp_name']).".wav";
	
					move_uploaded_file($foto['tmp_name'],$rutax);
					echo getcwd();
				}
				if($foto['type'] == "application/pdf"){
					$ruta="assets/pdf/".md5($foto['tmp_name']).".pdf";
					$rutax="../assets/pdf/".md5($foto['tmp_name']).".pdf";
	
					move_uploaded_file($foto['tmp_name'],$rutax);
					echo getcwd();
				}
				if($foto['type'] == "application/msword"){
					$ruta="assets/pdf/".md5($foto['tmp_name']).".doc";
					$rutax="../assets/pdf/".md5($foto['tmp_name']).".doc";
	
					move_uploaded_file($foto['tmp_name'],$rutax);
					echo getcwd();
				}
				$control = $obj->editar($grupo,$alumno,$alcance,$tema,$descrip,$tipo,$ruta,$textoDi,$idTarea);
			}else{
				$control = $obj->editarsf($grupo,$alumno,$alcance,$tema,$descrip,$tipo,$textoDi,$idTarea);
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



