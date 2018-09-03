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

        public function alta($arry,$ruta) {
            $query = $this->con->prepare("INSERT INTO multimedia (idCat, nombre, descrip, archivo, tipo) values (?,?,?,?,?)");
            $exc = $query->execute(array($arry['idCat'],$arry['nombre'],$arry['descrip'],$ruta,$arry['tipo']));
            if ($exc) {
                return true;
            } else {
                return false;
            }
        }

        //query para editar categorias de la biblioteca
        public function editar($arry,$ruta){
            $query = $this->con->prepare("UPDATE catmultimedia SET nombre=?, descrip=?,archivo=?  WHERE id=?");
            $exc = $query->execute(array($arry['nombre'],$arry['descrip'],$ruta,$arry['id']));
            if ($exc) {
                return true;
            }else{
                return false;
            }
        }
            //query para editar sin foto
            public function editarsf($arry){
                $query = $this->con->prepare("UPDATE multimedia SET nombre=?, idCat=?, descrip=?,archivo=?  WHERE id=?");
                $exc = $query->execute(array($arry['nombre'],$arry['idCat'],$arry['descrip'],$arry['url'],$arry['id']));
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

        public function precarga(){
            return $this->con->query("SELECT * FROM catmultimedia")->fetchAll(PDO::FETCH_ASSOC);
        }
    }