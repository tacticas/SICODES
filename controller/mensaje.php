<?php
require_once('../model/Mensaje.php');
$Object = new Mensaje();
//genera el json para la tabla
if (isset($_GET['get'])) {
	$id  = $_GET['get'];

	$datos = $Object->getAll($id);
	
	if($datos != false){
		foreach ($datos as $key) {
			$data["data"][] = $key;
		}
	}else{
		$data = '';
	}
	
	echo json_encode($data);
}

if (isset($_POST['task'])) {
	switch ($_POST['task']) {
		case 'agregar':
			$matricula=$_POST['matricula'];
			$nombre=$_POST['nombre'];
			$apPaterno=$_POST['apPaterno'];
			$apMaterno=$_POST['apMaterno'];
			$eMail=$_POST['eMail'];
			$telefono=$_POST['telefono'];
			$contrasena=$_POST['contrasena'];
			$idEscuela=$_POST['idEscuela'];
			$nombre=$_POST['nombre'];
			$control = $personaObject->altaPersona($matricula,$nombre,$apPaterno,$apMaterno,$eMail,$telefono,$contrasena,$idEscuela);
			break;
		case 'editar':
			$idUsuario=$_POST['idUsuario'];
			$matricula=$_POST['matricula'];
			$nombre=$_POST['nombre'];
			$apPaterno=$_POST['apPaterno'];
			$apMaterno=$_POST['apMaterno'];
			$eMail=$_POST['eMail'];
			$telefono=$_POST['telefono'];
			$contrasena=$_POST['contrasena'];
			$idEscuela=$_POST['idEscuela'];
			$nombre=$_POST['nombre'];
			$control = $personaObject->editarPersona($idUsuario,$matricula,$nombre,$apPaterno,$apMaterno,$eMail,$telefono,$contrasena,$idEscuela);
				break;	
		case 'eliminar':
			$idUsuario=$_POST['idUsuario'];
			$control = $personaObject->eliminarPersona($idUsuario);
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



