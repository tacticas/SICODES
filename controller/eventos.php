<?php
    session_start();
    require_once('../model/Eventos.php');
    require_once ('generico.php');
    $obj = new Eventos();
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

    //precarga 
    if (isset($_GET['eventos'])) {
        $tabla = $obj->precarga();
        
        echo json_encode($tabla);
    }

    if (isset($_POST['task'])) {
        switch ($_POST['task']) {
            case 'agregar':
              
                $_POST['inicio']= $_POST['start']." ".$_POST['startH']; 
                $_POST['fin']= $_POST['end']." ".$_POST['endH']; 
                  
                $control = $obj->alta($_POST);
                break;
            case 'editar':
                $_POST['inicio']= $_POST['start']." ".$_POST['startH']; 
                $_POST['fin']= $_POST['end']." ".$_POST['endH'];
                $control = $obj->editar($_POST);
                
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