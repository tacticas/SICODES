<?php 
require_once 'Connection.php';
class Anuncio extends Connection 
{	
	//query para obtener todo los campos
	public function getMsg($id){
		return $this->con->query("SELECT conf.msg FROM conf WHERE conf.idEscuela  = '$id'")->fetch(PDO::FETCH_ASSOC);

	}

	
	public function cambiarMsg($msg,$a){
		
		$resultado = $this->con->query("UPDATE conf SET msg ='$msg' WHERE  conf.idEscuela =".$a);
		
		if ($resultado) {
			return $resultado;
		}else
		{
			return "0";
		}
	
	}

}