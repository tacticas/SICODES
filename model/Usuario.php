<?php 

class Usuario extends Connection 
{
	public function contarUsuario(){
		return $this->con->query("SELECT COUNT(*) AS total FROM usuario")->fetch(PDO::FETCH_ASSOC);
	}
	public function contarUsuarioFiltro($clave,$limInf,$sizePage){
		return $this->con->query("SELECT COUNT(*) AS total FROM usuario WHERE matricula LIKE '%".$clave."%' or apPaterno like '%".$clave."%' or apMaterno Like '%".$clave."%' or nombre LIKE '%".$clave."%' ORDER BY idUsuario DESC LIMIT ".$limInf.",".$sizePage."")->fetch(PDO::FETCH_ASSOC);
	}
	public function insertUsuario($matricula,$nombre,$ap1,$ap2,$mail,$tel,$contra,$escuela){
		$query = $this->con->prepare("INSERT INTO usuario (matricula, nombre, apPaterno, apMaterno, eMail, telefono, contrasena, idEscuela) VALUES (?,?,?,?,?,?,?,?)");
		$exc = $query->execute(array($matricula,$nombre,$ap1,$ap2,$mail,$tel,$contra,$escuela));

		if ($exc) {
			return true;
		}else{
			return false;
		}

	}

	public function getAllUsuario($limInf,$sizePage){
		return $this->con->query("SELECT * FROM usuario ORDER BY idUsuario DESC LIMIT ".$limInf.",".$sizePage."")->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getFilterUsuario($clave,$limInf,$sizePage){
		return $this->con->query("SELECT * FROM usuario WHERE matricula LIKE '%".$clave."%' or apPaterno like '%".$clave."%' or apMaterno Like '%".$clave."%' or nombre LIKE '%".$clave."%' ORDER BY idUsuario DESC LIMIT ".$limInf.",".$sizePage."")->fetchAll(PDO::FETCH_ASSOC);
	}
	public function delUsuario($id){
		$control = $this->con->exec("DELETE FROM usuario WHERE idUsuario = '$id' ");
		if ($control) {
			return true;
		}else{
			return false;
		}
	}

	public function getUsuarioById($id){
		return $this->con->query("SELECT * FROM usuario WHERE idUsuario = '$id'")->fetch(PDO::FETCH_ASSOC);
		if ($control) {
		
		}else{
			return false;
		}
	}

	public function editUsuario($id,$matricula,$nombre,$ap1,$ap2,$mail,$tel,$contra,$escuela){
		$query = $this->con->prepare("UPDATE usuario SET matricula=?, nombre=?, apPaterno=?, apMaterno=?, eMail=?, telefono=?, contrasena=?, idEscuela=? WHERE idUsuario = ? ");
		$exc = $query->execute(array($matricula,$nombre,$ap1,$ap2,$mail,$tel,$contra,$escuela,$id));

		if ($exc) {
			return true;
		}else{
			return false;
		}
	}				

}

?>
