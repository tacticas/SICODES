<?php
    session_start();
    require_once('../model/ArchivosMulti.php');
    require_once ('generico.php');
    $obj = new ArchivosMulti();
    $gen = new Generico();

    //genera el json para la tabla
    if (isset($_GET['get'])) {
        $tabla = $obj->getAll();
        if($tabla != false){
            foreach ($tabla as $key) {
                $data["data"][] = $key;
            }
        }else{
            $data["data"] = array();
        }
        echo json_encode($data);
    }

    //precarga 
    if (isset($_GET['precarga'])) {
        $tabla = $obj->precarga();
        if($tabla != false){
            foreach ($tabla as $key) {
                $data["data"][] = $key;
            }
        }else{
            $data["data"] = array();
        }
        echo json_encode($data);
    }

    if (isset($_POST['task'])) {
        switch ($_POST['task']) {
            case 'agregar':
                 //foto
                 $ruta= $_POST['url'];
                
                if ($_FILES['img']['tmp_name']!="") {
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
                    if($_FILES['img']['type'] == "application/pdf"){
						$rutax="../assets/pdf/".$rutaRandom.".pdf";
						$ruta="assets/pdf/".$rutaRandom.".pdf";
					}
                    move_uploaded_file($img['tmp_name'],$rutax);
                }else{
                    $ruta= $_POST['url'];
                }
                                        
                $control = $obj->alta($_POST,$ruta);
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
                    if($_FILES['img']['type'] == "application/pdf"){
						$rutax="../assets/pdf/".$rutaRandom.".pdf";
						$ruta="assets/pdf/".$rutaRandom.".pdf";
					}
                    move_uploaded_file($img['tmp_name'],$rutax);
                    
                    $control = $obj->editar($_POST,$ruta);
                }else{
                    $control = $obj->editarsf($_POST);
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
            echo $control;
        }
    
    }