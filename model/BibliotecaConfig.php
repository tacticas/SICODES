<?php
    require_once 'Connection.php';
    class BibliotecaConfig extends Connection
    {
        // Query para obtener todos los campos de la tabla 
        public function getAll() {
            return $this->con->query("SELECT * FROM catmultimedia")->fetchAll(PDO::FETCH_ASSOC);
        }

        public function alta($nombre,$ruta) {
            $query = $this->con->prepare("INSERT INTO catmultimedia (nombre, img) values (?,?)");
            $exc = $query->execute(array($nombre,$ruta));
            if ($exc) {
                return true;
            } else {
                return false;
            }
        }

        //query para editar categorias de la biblioteca
        public function editar($arry){
            $query = $this->con->prepare("UPDATE catmultimedia SET nombre=?, WHERE id=?");
            $exc = $query->execute(array($arry['nombre']));
            if ($exc) {
                return true;
            }else{
                return false;
            }
        }
            //query para editar sin foto
            public function editarsf($arry){
                $query = $this->con->prepare("UPDATE catmultimedia SET nombre=?,img=? WHERE id=?");
                $exc = $query->execute(array($arry['nombre'], $arry['img']));
                if ($exc) {
                    return true;
                }else{
                    return false;
                }
            }
        //query para dar de baja alumnos
        public function eliminar($id){
            $query = $this->con->prepare("DELETE FROM catmultimedia WHERE id=?");
            $exc = $query->execute(array($id));
            if ($exc) {
                return true;
            }else{
                return false;
            }
        }
    }