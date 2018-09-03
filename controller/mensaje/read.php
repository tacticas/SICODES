<?php
    // headers

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../model/Database.php';
    include_once '../../model/Mensaje.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate mensaje object
    $element  = new Mensaje($db);

    // mensaje query
    $result = $element->read();
    // get row count
    $num = $result->rowCount();

    //check if any mensaje
    if($num > 0) {
        //mensaje arry
        $elements_arr  = array();
        $elements_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $item = array(
                'id' => $id,
                'tx' => $tx,
                'rx' => $rx,
                'titulo' => $titulo,
                'msg' => html_entity_decode($msg),
                'status' => $status,
                'created_at' => $created_at,
                'tx_name' =>$tx_name,
                'rx:name' =>$rx_name
            );

            //push array to "data"
            array_push($elements_arr['data'], $item);
        }

        //turn PHP array to JSON
        echo json_encode($elements_arr);
    }else {
        // no Mensajes
        echo json_decode(
            array('message' => 'No Mensages Found')
        );
    }