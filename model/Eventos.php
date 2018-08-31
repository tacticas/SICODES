<?php
    require_once 'Connection.php';
    class Eventos extends Connection
    {
     
        public function alta($arry) {
            $query = $this->con->prepare("INSERT INTO evento (title,descrip,color,textColor,start,end) values (?,?,?,?,?,?)");
            $exc = $query->execute(array($arry['title'],$arry['descrip'],$arry['color'],$arry['textColor'],$arry['inicio'],$arry['fin']));
            if ($exc) {
                return true;
            } else {
                return false;
            }
        }

        //query para editar 
        public function editar($arry){
            $query = $this->con->prepare("UPDATE evento SET title=?,descrip=?,color=?,textColor=?,start=?,end=?  WHERE id=?");
            $exc = $query->execute(array($arry['title'],$arry['descrip'],$arry['color'],$arry['textColor'],$arry['inicio'],$arry['fin'],$arry['id']));
            if ($exc) {
                return true;
            }else{
                return false;
            }
        }
      
        //query para dar de baja
        public function eliminar($id){
            $query = $this->con->prepare("DELETE FROM evento WHERE id=?");
            $exc = $query->execute(array($id));
            if ($exc) {
                return true;
            }else{
                return false;
            }
        }

        public function precarga(){
            return $this->con->query("SELECT * FROM evento")->fetchAll(PDO::FETCH_ASSOC);
        }
    }