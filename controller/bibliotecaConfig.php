<?php
    session_start();
    require_once('../model/BibliotecaConfig.php');
    require_once ('generico.php');
    $obj = new BibliotecaConfig();
    $gen = new Generico();

    //genera el json para la tabla
    if (isset($_GET['get'])) {
        $tabla = $obj->getAll();
        if($tabla != false){
            foreach ($tabla as $key) {
                $data["data"][] = $key;
            }
        }else{
            $data = "";
        }
        echo json_encode($data);
    }

    if (isset($_POST['task'])) {
        switch ($_POST['task']) {
            case 'agregar':
                $nombre=$_POST['nombre'];
                //foto
                $img=$_FILES['img'];
                
                if ($_FILES['img']['tmp_name']!="") {
                    $rutaRandom = $gen->rutaRandom();
                    if($_FILES['img']['type'] == "image/jpeg" ){
                        $rutax="../assets/img/fotos/".$rutaRandom.".jpeg";
                        $ruta="assets/img/fotos/".$rutaRandom.".jpeg";
                    }
                    if($_FILES['img']['type'] == "image/png" ){
                        $rutax="../assets/img/fotos/".$rutaRandom.".png";
                        $ruta="assets/img/fotos/".$rutaRandom.".png";
                    }
                    move_uploaded_file($img['tmp_name'],$rutax);
                }else{
                    $ruta="";
                }
                                        
                $control = $obj->alta($nombre,$ruta);
                break;
            case 'editar':
                $id=$_POST['id'];
                $nombre=$_POST['nombre'];
                //foto
                if (filesize($_FILES['img']['tmp_name'])!=0) {
                    $img=$_FILES['img'];
                    $rutaRandom = $gen->rutaRandom();
                    if($_FILES['img']['type'] == "image/jpeg" ){
                        $rutax="../assets/img/fotos/".$rutaRandom.".jpeg";
                        $ruta="assets/img/fotos/".$rutaRandom.".jpeg";
                    }
                    if($_FILES['img']['type'] == "image/png" ){
                        $rutax="../assets/img/fotos/".$rutaRandom.".png";
                        $ruta="assets/img/fotos/".$rutaRandom.".png";
                    }
                    move_uploaded_file($img['tmp_name'],$rutax);
                    $control = $obj->editar($id,$nombre,$ruta);
                }else{
                    $control = $obj->editarsf($id,$nombre);
                }
                break;	
            case 'eliminar':
                $id=$_POST['id'];
                $control = $obj->eliminar($id);
                break;
            default:
                echo 'problema';
            break;
        }
        if ($control) {
            echo "correcto";
        }else{
            echo "control es falso";
        }
    
    }