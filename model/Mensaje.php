<?php 
require_once 'Connection.php';
class Mensaje extends Connection 
{	
	//query para obtener todo los campos
	public function getAllMensajes(){
		return $this->con->query("SELECT idMensaje, idDe, idPara, titulo, CONCAT (LEFT(contenido, 30),'... ' ) as contenido, fechaHora FROM mensaje group by idDe")->fetchAll(PDO::FETCH_ASSOC);
	}
	//query para dar de alta usuarios
	public function altaPersona($matricula,$nombre,$apPaterno,$apMaterno,$eMail,$telefono,$contrasena,$idEscuela){
		$query = $this->con->prepare("INSERT INTO usuario (matricula, nombre, apPaterno, apmaterno, eMail, telefono, contrasena, idEscuela) values(?,?,?,?,?,?,?,?)");
		$exc = $query->execute(array($matricula,$nombre,$apPaterno,$apMaterno,$eMail,$telefono,$contrasena,$idEscuela));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//query para editar usuarios
	public function editarPersona($idUsuario,$matricula,$nombre,$apPaterno,$apMaterno,$eMail,$telefono,$contrasena,$idEscuela){
		$query = $this->con->prepare("UPDATE usuario SET matricula=?, nombre=?, apPaterno=?, apMaterno=?, eMail=?, telefono=?, contrasena=?, idEscuela=? WHERE idUsuario=?");
		$exc = $query->execute(array($matricula,$nombre,$apPaterno,$apMaterno,$eMail,$telefono,$contrasena,$idEscuela,$idUsuario));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//query para dar de baja usuarios
	public function eliminarPersona($idUsuario){
		$query = $this->con->prepare("DELETE FROM usuario WHERE idUsuario=?");
		$exc = $query->execute(array($idUsuario));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
}