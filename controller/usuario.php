<?php

$usrObject = new Usuario();
$_SESSION['curpage'] = 1; //pagina 1 por defecto

if (isset($_GET['page'])) {
    $_SESSION['curpage'] = $_GET['page']; //cambiar de pagina
}

$totalrow = $usrObject->contarUsuario(); //contar las filas
$sizePage = 10; //tamaño de la paginación
$totalPages = ceil($totalrow['total'] / $sizePage) ; //calcular las paginas

$limInf = ($_SESSION['curpage']-1)*$sizePage; // limite inferior 

/* ===== Imprime paginador ======*/
$atras = $_SESSION['curpage']-1;
$siguiente = $_SESSION['curpage']+1;
$paginador="";
if ($_SESSION['curpage'] == 1) {
	$paginador .='<li class="page-item disabled">
				<a class="page-link" href="'.$sitePath.'usuarios.php?page='.$atras.'" tabindex="-1">Anterior</a>
    		</li>';
}else{
	$paginador .='<li class="page-item">
				<a class="page-link" href="'.$sitePath.'usuarios.php?page='.$atras.'" tabindex="-1">Anterior</a>
    		</li>';
}
for ($i=1; $i<=$totalPages ; $i++) { 
	if ($i== $_SESSION['curpage']) {
		$paginador .='<li class="page-item active"><span class="page-link">'.$i.'<span class="sr-only">(current)</span>
      </span></li>';
	}else{
	$paginador .='<li class="page-item"><a class="page-link" href="'.$sitePath.'usuarios.php?page='.$i.'">'.$i.'</a></li>';
		
	}
}
if ($_SESSION['curpage'] == $totalPages) {
	$paginador .='<li class="page-item disabled">
				<a class="page-link" href="'.$sitePath.'usuarios.php?page='.$siguiente.'">Siguiente</a>
    		</li>';
}else{
	$paginador .='<li class="page-item">
				<a class="page-link" href="'.$sitePath.'usuarios.php?page='.$siguiente.'">Siguiente</a>
    		</li>';
}

/* ===== Imprime Tabla ======*/
$usuarios = $usrObject->getAllUsuario($limInf,$sizePage);
$tabla="";
foreach ($usuarios as $key)
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
		<a class="btn btn-warning btn-sm update" href="'.$sitePath.'usuarios.php?task=edit&id='.$key['idUsuario'].'"><i class="fa fa-pencil"></i></a> 
		<a class="btn btn-danger btn-sm delete confirmation" data-confmes="¿Desea ELIMINAR este elemento?" href="'.$sitePath.'usuarios.php?task=del&id='.$key['idUsuario'].'&task=del"><i class="fa fa-trash"></i></a></td>

	</tr>';
}



$visibleF= 'none';
$visibleC = '';

$input = "";
$campo1 = "";
$campo2 = "";
$campo3 = "";
$campo4 = "";
$campo5 = "";
$campo6 = "";
$campo7 = "";
$campo8 = "";

$accion = "add";

//ELIMINAR REGISTRO


if (isset($_POST['task'])) {
	if ($_POST['task'] == "add") {
		$matricula = $_POST['matricula'];
		$nombre = $_POST['nombre'];
		$ap1 = $_POST['ap1'];
		$ap2 = $_POST['ap2'];
		$mail = $_POST['mail'];
		$tel = $_POST['tel'];
		$contra = $_POST['contra'];
		$escuela = $_POST['escuela'];
		$control = $usrObject->insertUsuario($matricula,$nombre,$ap1,$ap2,$mail,$tel,$contra,$escuela);
		if ($control) {
				header("Location: usuarios.php?alerta=1");
			}
	}
	if ($_POST['task']=="edit") {
		$id= $_POST['id'];
		$matricula = $_POST['matricula'];
		$nombre = $_POST['nombre'];
		$ap1 = $_POST['ap1'];
		$ap2 = $_POST['ap2'];
		$mail = $_POST['mail'];
		$tel = $_POST['tel'];
		$contra = $_POST['contra'];
		$escuela = $_POST['escuela'];
		$control = $usrObject->editUsuario($id,$matricula,$nombre,$ap1,$ap2,$mail,$tel,$contra,$escuela);
		if ($control) {
				header("Location: usuarios.php?alerta=2");
			}
	}
	if ($_POST['task']=="buscar") {
		$clave = $_POST['clave'];
		$usuarios = $usrObject->getFilterUsuario($clave,$limInf,$sizePage);
		$tabla="";
			foreach ($usuarios as $key)
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
					<a class="btn btn-warning btn-sm update" href="'.$sitePath.'usuarios.php?task=edit&id='.$key['idUsuario'].'"><i class="fa fa-pencil"></i></a> 
					<a class="btn btn-danger btn-sm delete confirmation" data-confmes="¿Desea ELIMINAR este elemento?" href="'.$sitePath.'usuarios.php?task=del&id='.$key['idUsuario'].'&task=del"><i class="fa fa-trash"></i></a></td>

				</tr>';
			}
		}

		$totalrow = $usrObject->contarUsuarioFiltro($clave,$limInf,$sizePage); //contar las filas
		$sizePage = 10; //tamaño de la paginación
		$totalPages = ceil($totalrow['total'] / $sizePage) ; //calcular las paginas

		$limInf = ($_SESSION['curpage']-1)*$sizePage; // limite inferior 

		/* ===== Imprime paginador ======*/
		$atras = $_SESSION['curpage']-1;
		$siguiente = $_SESSION['curpage']+1;
		$paginador="";
		if ($_SESSION['curpage'] == 1) {
			$paginador .='<li class="page-item disabled">
						<a class="page-link" href="'.$sitePath.'usuarios.php?page='.$atras.'" tabindex="-1">Anterior</a>
		    		</li>';
		}else{
			$paginador .='<li class="page-item">
						<a class="page-link" href="'.$sitePath.'usuarios.php?page='.$atras.'" tabindex="-1">Anterior</a>
		    		</li>';
		}
		for ($i=1; $i<=$totalPages ; $i++) { 
			if ($i== $_SESSION['curpage']) {
				$paginador .='<li class="page-item active"><span class="page-link">'.$i.'<span class="sr-only">(current)</span>
		      </span></li>';
			}else{
			$paginador .='<li class="page-item"><a class="page-link" href="'.$sitePath.'usuarios.php?page='.$i.'">'.$i.'</a></li>';
				
			}
		}
		if ($_SESSION['curpage'] == $totalPages) {
			$paginador .='<li class="page-item disabled">
						<a class="page-link" href="'.$sitePath.'usuarios.php?page='.$siguiente.'">Siguiente</a>
		    		</li>';
		}else{
			$paginador .='<li class="page-item">
						<a class="page-link" href="'.$sitePath.'usuarios.php?page='.$siguiente.'">Siguiente</a>
		    		</li>';
		}

	
}
if (isset($_GET['task'])) {
	if ($_GET['task'] == "edit") {
			$control = $usrObject->getUsuarioById($_GET['id']);
			$visibleF= '';
			$visibleC= 'none';
			$accion = "edit";
			$input = '<input class="form-control" type="hidden" name="id" value="'.$control['idUsuario'].'">';
			$campo1 = $control['matricula'];
			$campo2 = $control['nombre'];
			$campo3 = $control['apPaterno'];
			$campo4 = $control['apMaterno'];
			$campo5 = $control['eMail'];
			$campo6 = $control['telefono'];
			$campo7 = $control['contrasena'];
			$campo8 = $control['idEscuela'];
	}
	if ($_GET['task']=="del") {
			$control = $usrObject->delUsuario($_GET['id']);
			if ($control) {
				header("Location: usuarios.php?alerta=3");
			}
	}
}


