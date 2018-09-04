<?php
    require_once 'Connection.php';
    class Mensaje extends Connection
    {
        // Query para obtener todos los campos de la tabla 
        public function getAll($id) {
            return $this->con->query("SELECT mensaje.*, t.nombre as tx_name, t.ap1 as tx_ap1, r.nombre as rx_name, r.ap1 as rx_ap1 
			FROM mensaje 
			JOIN alumno t ON mensaje.tx = t.idAlumno
			JOIN alumno r ON mensaje.rx = r.idAlumno
			WHERE mensaje.tx = ".$id." OR mensaje.rx = ".$id)->fetchAll(PDO::FETCH_ASSOC);

        }

        public function alta($arry) {
            $query = $this->con->prepare("INSERT INTO mensaje (tx, rx, titulo, msg) values (?,?,?,?)");
            $exc = $query->execute(array($arry['tx'],$arry['rx'],$arry['titulo'],$arry['msg']));
            if ($exc) {
                return true;
            } else {
                return false;
            }
        }

        //query para editar categorias de la biblioteca
        public function editar($arry){
            $query = $this->con->prepare("UPDATE catmultimedia SET nombre=?, descrip=?,archivo=?  WHERE id=?");
            $exc = $query->execute(array($arry['nombre'],$arry['descrip'],$ruta,$arry['id']));
            if ($exc) {
                return true;
            }else{
                return false;
            }
        }

        //query para dar de baja
        public function eliminar($id){
            $query = $this->con->prepare("DELETE FROM catmultimedia WHERE id=?");
            $exc = $query->execute(array($id));
            if ($exc) {
                return true;
            }else{
                return false;
            }
        }

        public function precarga($tipo){
            return $this->con->query("SELECT idAlumno,nombre,ap1,ap2 FROM alumno WHERE tipo = ".$tipo)->fetchAll(PDO::FETCH_ASSOC);
		}

    }