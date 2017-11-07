<?php
require_once('../model/Persona.php');
$personaObject = new Persona();

$personas = $personaObject->getAllPersona();


foreach ($personas as $key) {
	$data["data"][] = $key;
}

echo json_encode($data);



