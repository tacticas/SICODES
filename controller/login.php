<?php 
require_once('../model/login.php');
$loginObj = new Login();

$matri = $_POST['matri'];
$pass = $_POST['pass'];
$consulta = $loginObj->probarUsuario($matri	,$pass);
if(isset($consulta['idUsuario'])){
	header('Location: ../alumno.php');
}else{
	header('Location: ../index.php?error=1');
}

?>