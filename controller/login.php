<?php 
require_once('../model/login.php');
$loginObj = new Login();

session_start();
$u = $_POST['user'];
$p = $_POST['pass'];
//variable control
$control=true;
//falta las sessiones
$consulta = $loginObj->probarAlumno($u,$p);
if($consulta['matricula']==$u AND $consulta['contraseña']==$p){
	$loginObj->array2Json($consulta);
	$_SESSION['permiso']="alumno";
	$_SESSION['idMaster']=$consulta['idAlumno'];
}else{
	$consulta = $loginObj->probarProfe($u,$p);
	if($consulta['usuario']==$u AND $consulta['contraseña']==$p){
		$loginObj->array2Json($consulta);
		$_SESSION['permiso']="profe";
		$_SESSION['idMaster']=$consulta['idProfesor'];
	}else{
		$consulta = $loginObj->probarPersonal($u,$p);
		if($consulta['usuario']==$u AND $consulta['contraseña']==$p){
			$loginObj->array2Json($consulta);
			$_SESSION['permiso']="personal";
			$_SESSION['idMaster']=$consulta['idPersonal'];
		}else{
			$consulta = $loginObj->probarPadre($u,$p);
			if($consulta['usuario']==$u AND $consulta['contraseña']==$p){
				$loginObj->array2Json($consulta);
				$_SESSION['permiso']="padre";
				$_SESSION['idMaster']=$consulta['idPadre'];
			}else{
				$consulta = $loginObj->probarSuperAdmin($u,$p);
				if($consulta['usuario']==$u AND $consulta['contraseña']==$p){
					$loginObj->array2Json($consulta);
					$_SESSION['permiso']="superAdmin";
					$_SESSION['idMaster']=$consulta['idUsuario'];
				}else{
					$data["data"]["msg"] = "error";
					echo json_encode($data);
					$control=false;
				}
			}
		}
	}
}//fin if de comprobar
/*if (isset($_SESSION['permiso'])) {
	header("Location: dashboard.php");
}*/

?>