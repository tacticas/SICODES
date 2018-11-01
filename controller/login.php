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
	$_SESSION['permiso']=$consulta['tipo'];
	$_SESSION['idMaster']=$consulta['idAlumno'];
	$_SESSION['Escuela']=$consulta['eName'];
	$_SESSION['idEscuela']=$consulta['idEscuela'];
	$_SESSION['matricula']=$consulta['matricula'];
	$_SESSION['foto']=$consulta['foto'];
	$_SESSION['email']=$consulta['email'];
	$_SESSION['cel']=$consulta['cel'];
	if($_SESSION['foto'] == ""){
		$_SESSION['foto']="assets/img/guest.png";
	}
	$_SESSION['nombre']=$consulta['nombre']." ".$consulta['ap1']." ".$consulta['ap2'];
	
	

}else{
	echo "error";
}

//fin if de comprobar
/*if (isset($_SESSION['permiso'])) {
	header("Location: dashboard.php");
}*/

?>