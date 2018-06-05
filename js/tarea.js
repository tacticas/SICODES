$(document).ready(function() {

	preCarga();
});     

	var table = $('#example').DataTable( {
		ajax: 'controller/tarea.php?get=1',
		dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
		columns: [
			{ data: 'idTarea' },
			{ data: 'idGrupo' },
			{ data: 'grupoN' },
			{ data: 'idProfesor' },
			{ data: 'profesorN' },
			{ data: 'tema' },
			{ data: 'descripcion' },
			{
				data : 'tipo',
				render: function(data, type, row) {
					var r = "";
					switch(data) {
						case 1:
							r = "Documento";
							break;
						case 2:
							r = "Imagen";
							break;
						case 3:
							r = "Audio";
							break;
						case 4:
							r = "Escrito";
							break;	
						default:
							r = "No especificado";
					}
					return r;
				}
			},
			{ data: 'archivo' },
			{ data: 'fechaEntrega' },
			{ data: 'status' },
			{ defaultContent: '<button data-toggle="modal" data-target="#editar" class="editar btn btn-warning btn-sm"><i class="fa fa-edit"></i></button> <button data-toggle="modal" data-target="#confirmar" class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>'}
		],
		select: true,
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		],
		"columnDefs": [
			{
				"targets": [ 0,1,3,6,8],
				"visible": false
			},
		]
	} );
 
	function preCarga(){
		$.ajax({
			method: 'POST',
			url: "controller/alumno.php?carga=1",
			dataType: "json",
			success: function(data){
				$.each( data, function( key, registro ) {
					$("#escuela").append('<option value='+registro.idEscuela+'>'+registro.nombre+' - '+registro.ciudad+'</option>');
				});
			}
		});
	}

	$('button.agregar').click(function(){
		$('#formGuardar')[0].reset();
		$('#accion').val('agregar');
		$('#tituloModal').html('Agregar nuevo registro');
		$('#foto').prop('required',true);
	});

	$('#example tbody').on('click','button.editar', function(){
		var data = table.row( $(this).parents('tr') ).data();
		console.log(data);
		$('#tituloModal').html('Editando Datos de '+data.matricula);
		$('#accion').val('editar');
		$('#foto').prop('required',false);
		$('#foto').val(null);
		$('#idAlumno').val(data.idAlumno);
		$('#matricula').val(data.matricula);
		$('#contraseña').val(data.contraseña);
		$('#nombre').val(data.nombre);
		$('#ap1').val(data.ap1);
		$('#ap2').val(data.ap2);
		$('#email').val(data.email);
		$('#fnac').val(data.fnac);
		$('#sexo').val(data.sexo);
		if ($('#foto').get(0).files.length === 0) {
			console.log("No files selected.");
		}
		$('#dir').val(data.dir);
		$('#tel').val(data.tel);
		$('#cel').val(data.cel);
		$('#meta').val(data.meta);
		$('#evaluacion').val(data.evaluacion);
		$('#cursoInicio').val(data.cursoInicio);
		$('#fechaPago').val(data.fechaPago);
		$('#escuela').val(data.idEscuela);
	});
	
	$('#example tbody').on('click','button.eliminar', function(){
		var data = table.row( $(this).parents('tr') ).data();
		$('#accion').val('eliminar');
		$('#formEliminar #id').val(data.idAlumno);
	});
	
	$('#editar').on('shown.bs.modal', function () {
		$('#matricula').focus()
	});

	$('#formGuardar').on('submit', function(e){
			e.preventDefault();
			var frm = new FormData($(this)[0]);
			$.ajax({
				method: 'POST',
				url: 'controller/alumno.php',
				data: frm,
				contentType: false,
				processData: false,
			}).done( function( info ){
				$('#editar').modal('hide');
				table.ajax.reload();
				toastr.success('Guardado Correctamente');
			});
	});

	$('#formEliminar').on('submit', function(e){
			e.preventDefault();
			var frm = $(this).serialize();
			$.ajax({
				method: 'POST',
				url: 'controller/alumno.php',
				data: frm
			}).done( function( info ){
				$('#confirmar').modal('hide');
				table.ajax.reload();
				toastr.success('Eliminado Correctamente');
			});
	});   

	/*var fecha = new Date();	
	alert("Día: "+fecha.getDate()+"\nMes: "+(fecha.getMonth()+1)+"\nAño: "+fecha.getFullYear());
	alert("Hora: "+fecha.getHours()+"\nMinuto: "+fecha.getMinutes()+"\nSegundo: "+fecha.getSeconds()+"\nMilisegundo: "+fecha.getMilliseconds());
	*/