<?php
require_once('../model/Alumno.php');
$obj = new Alumno();
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
	$escuelas = $obj->getEscuela();
	if($escuelas == false){
		$escuelas = "";
	}
	echo json_encode($escuelas);
}
if(isset($_GET['cursos'])){
	$cursos = $obj->getCursos();
	if($cursos == false){
		$cursos = "";
	}
	
	echo json_encode($cursos);
}
if(isset($_GET['lastId'])){
	$cursos = $obj->getLastId(1);
	if($cursos == false){
		$cursos = "";
	}
	
	echo json_encode($cursos);
}

if (isset($_POST['task'])) {
	switch ($_POST['task']) {
		case 'agregar':
			$matricula=$_POST['matricula'];
			$contraseña=$_POST['contraseña'];
			$nombre=$_POST['nombre'];
			$apPaterno=$_POST['ap1'];
			$apMaterno=$_POST['ap2'];
			$eMail=$_POST['email'];
			$fnac=$_POST['fnac'];
			$sexo=$_POST['sexo'];
			$dir=$_POST['dir'];
			$tel=$_POST['tel'];
			$cel=$_POST['cel'];
			$meta=$_POST['meta'];
			$evaluacion=$_POST['evaluacion'];
			$cursoInicio=$_POST['cursoInicio'];
			$fechaPago=$_POST['fechaPago'];
			$idEscuela=$_POST['idEscuela'];
			$fingreso=$_POST['fin'];
			//foto
			$foto=$_FILES['foto'];
		
			if (isset($_FILES['foto'])) {
				$rutaRandom = $obj->rutaRandom();
				$audio =$_FILES['foto'];
				if($_FILES['foto']['type'] == "image/jpeg" ){
					$rutax="../assets/img/fotos/".$rutaRandom.".jpeg";
					$ruta="assets/img/fotos/".$rutaRandom.".jpeg";
				}
				if($_FILES['foto']['type'] == "image/png" ){
					$rutax="../assets/img/fotos/".$rutaRandom.".png";
					$ruta="assets/img/fotos/".$rutaRandom.".png";
				}
				move_uploaded_file($foto['tmp_name'],$rutax);
			}else{
				$ruta="";
			}
									
			$control = $obj->alta($matricula,$contraseña,$nombre,$apPaterno,$apMaterno,$eMail,$fnac,$sexo,$ruta,$dir,$tel,$cel,$meta,$evaluacion,$cursoInicio,$fechaPago,$idEscuela,$fingreso);
			break;
		case 'editar':
			$id=$_POST['idAlumno'];
			$matricula=$_POST['matricula'];
			$contraseña=$_POST['contraseña'];
			$nombre=$_POST['nombre'];
			$apPaterno=$_POST['ap1'];
			$apMaterno=$_POST['ap2'];
			$eMail=$_POST['email'];
			$fnac=$_POST['fnac'];
			$sexo=$_POST['sexo'];
			$dir=$_POST['dir'];
			$tel=$_POST['tel'];
			$cel=$_POST['cel'];
			$meta=$_POST['meta'];
			$evaluacion=$_POST['evaluacion'];
			$cursoInicio=$_POST['cursoInicio'];
			$fechaPago=$_POST['fechaPago'];
			$idEscuela=$_POST['idEscuela'];
			//foto
			if (filesize($_FILES['foto']['tmp_name'])!=0) {
				$foto=$_FILES['foto'];
				if ($foto['type'] == "image/jpg" OR $foto['type'] == "image/jpeg"){
					$ruta="assets/img/fotos/".md5($foto['tmp_name']).".jpg";
					$rutax="../assets/img/fotos/".md5($foto['tmp_name']).".jpg";

					move_uploaded_file($foto['tmp_name'],$rutax);
					echo getcwd();
				}
				$control = $obj->editar($id,$matricula,$contraseña,$nombre,$apPaterno,$apMaterno,$eMail,$fnac,$sexo,$ruta,$dir,$tel,$cel,$meta,$evaluacion,$cursoInicio,$fechaPago,$idEscuela);
			}else{
				$control = $obj->editarsf($id,$matricula,$contraseña,$nombre,$apPaterno,$apMaterno,$eMail,$fnac,$sexo,$dir,$tel,$cel,$meta,$evaluacion,$cursoInicio,$fechaPago,$idEscuela);
			}
			break;	
		case 'eliminar':
			$id=$_POST['idAlumno'];
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



