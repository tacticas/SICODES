<?php 
require_once 'Connection.php';
class Tarea extends Connection 
{	
	//query para obtener todo los campos
	public function getAll(){
		return $this->con->query("SELECT * FROM tarea")->fetchAll(PDO::FETCH_ASSOC);
	}
	//query para dar de alta alumnos
	public function alta($idGrupo,$idProfesor,$tema,$descripcion,$tipo,$archivo,$fechaEntrega){
		$query = $this->con->prepare("INSERT INTO tarea ( idGrupo,idProfesor,tema,descripcion,tipo,archivo,fechaEntrega ) values(?,?,?,?,?,?,?)");
		$exc = $query->execute(array($idGrupo,$idProfesor,$tema,$descripcion,$tipo,$archivo,$fechaEntrega));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	//query para editar alumnos
	public function editar($idTarea,$idGrupo,$idProfesor,$tema,$descripcion,$tipo,$archivo,$fechaEntrega){
		$query = $this->con->prepare("UPDATE tarea SET idGrupo=?,idProfesor=?,tema=?,descripcion=?,tipo=?,archivo=?,fechaEntrega=? WHERE idTarea=?");
		$exc = $query->execute(array($idGrupo,$idProfesor,$tema,$descripcion,$tipo,$archivo,$fechaEntrega,$idTarea));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
		//query para editar sin archivo
		public function editarsf($idTarea,$idGrupo,$idProfesor,$tema,$descripcion,$tipo,$fechaEntrega){
			$query = $this->con->prepare("UPDATE tarea SET idGrupo=?,idProfesor=?,tema=?,descripcion=?,tipo=?,fechaEntrega=? WHERE idTarea=?");
			$exc = $query->execute(array($idGrupo,$idProfesor,$tema,$descripcion,$tipo,$fechaEntrega,$idTarea));
			if ($exc) {
				return true;
			}else{
				return false;
			}
		}
	//query para dar de baja alumnos
	public function eliminar($id){
		$query = $this->con->prepare("DELETE FROM tarea WHERE idTarea=?");
		$exc = $query->execute(array($id));
		if ($exc) {
			return true;
		}else{
			return false;
		}
	}
	public function getGrupo(){
		return $this->con->query("SELECT idGrupo, nombre FROM grupo")->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getProfesor(){
		return $this->con->query("SELECT idProfesor, nombre, ap1 FROM profesor")->fetchAll(PDO::FETCH_ASSOC);
	}
}