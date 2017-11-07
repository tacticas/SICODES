<?php
require_once('../model/Persona.php');
$personaObject = new Persona();

$personas = $personaObject->getAllPersona();


foreach ($personas as $key) {
	$data["data"][] = $key;
}

echo json_encode($data);




/*foreach ($personas as $key)
{
	$tabla .='<tr>
	<th>'.$key['idUsuario'].'</th>
	<td>'.$key['matricula'].'</td>
	<td>'.$key['nombre'].'</td>
	<td>'.$key['apPaterno'].'</td>
	<td>'.$key['apMaterno'].'</td>
	<td>'.$key['eMail'].'</td>
	<td>'.$key['telefono'].'</td>
	<td>'.$key['idEscuela'].'</td>
	<td>
		<a class="btn btn-warning btn-sm update" href=".php?task=edit&id='.$key['idUsuario'].'"><i class="fa fa-pencil"></i></a> 
		<a class="btn btn-danger btn-sm delete confirmation" data-confmes="¿Desea ELIMINAR este elemento?" href="usuarios.php?task=del&id='.$key['idUsuario'].'&task=del"><i class="fa fa-trash"></i></a></td>

	</tr>';
}
echo $tabla;*/
