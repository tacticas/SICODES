$(document).ready(function() {
	$('#divAlumno').hide();
	$('#divtextoDi').hide();
	preCarga();
	
});     

	var table = $('#example').DataTable( {
		ajax: 'controller/tarea.php?get=1',
		dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
		columns: [
			{ data: 'idTarea' },
			{ data: 'idGrupo' },
			{ data: 'grupoN' },
			{ data: null,
				render: function(data){
					if(data.alcance == 'n'){
						return 'Grupal';
					}else{
						return 'Individual';
					}
				}
			},
			{ data: 'tema' },
			
			{
				data : 'tipo',
				render: function(data, type, row) {
					var r = "";
					switch(data) {
						case "1":
							r = "Speaking";
							break;
						case "2":
							r = "Reading";
							break;
						case "3":
							r = "Writing";
							break;
						case "4":
							r = "Listening";
							break;	
						default:
							r = "No especificado";
							break;
					}
					return r;
				}
			},
			
			{ data: 'fechaAlta' },
			{ data: 'status', 
				render: function(data, type, row){
					if (data == "1") {
						return "Active";
					} else {
						return "Concluded";
					}
				}
			},
			{ 	data: 'idTarea',
				render: function(data, type, row){
					return '<button data-toggle="modal" data-target="#editar" class="editar btn btn-warning btn-sm"><i class="fa fa-edit"></i></button> <button data-toggle="modal" data-target="#confirmar" class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> <a href="revisar.php?id='+data+'" target="_blank"><button class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button></a> ';
				}
			}	
		],
		select: true,
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		],
		"columnDefs": [
			{
				"targets": [ 0,1],
				"visible": false
			},
		]
	} );
 
	function preCarga(){
		$.ajax({
			method: 'POST',
			url: "controller/tarea.php?carga=1",
			dataType: "json",
			success: function(data){
				$.each( data, function( key, registro ) {
					$("#grupo").append('<option value='+registro.idGrupo+'>'+registro.nombre+'</option>');
				});
			}
		});
		
	}
	$('#editar').on('shown.bs.modal', function () {
		$('#tema').focus()
	});
 
	//interface
	
	$( "#alcance" ).change(function() {
			$( "#alcance option:selected" ).each(function() {
				  if( $( this ).val() == 1 ){
					$('#divAlumno').show();
				  }
				  if($( this ).val() == "n" ){
					$('#divAlumno').hide();
				  }	
			});
		});

	$( "#grupo" ).change(function() {
		$( "#grupo option:selected" ).each(function() {
			var grupo =  $( this ).val();
			$.ajax({
				method: 'POST',
				url: "controller/tarea.php?carga=2&grupo="+grupo,
				dataType: "json",
				success: function(data){
					$('#idAlumno').empty();
					$.each( data, function( key, registro ) {
						$("#idAlumno").append('<option value='+registro.idAlumno+'>'+registro.nombre+' '+registro.ap1 +' ('+registro.matricula+')'+'</option>');
					});
				}
			});
		});
	});

	$('#radios input[type=radio]').on('change', function() {
		if($(this).val()== 4){
			$('#divtextoDi').show();
		}else{
			$('#divtextoDi').hide();
		} 
	});
	
	// back-js

	$('button.agregar').click(function(){
		$('#formGuardar')[0].reset();
		$('#accion').val('agregar');
		$('#tituloModal').html('Add new task');
		$('#divAlumno').hide();
		$('#divtextoDi').hide();
		$("#alcance").prop('disabled', false);
		$("#grupo").prop('disabled', false);
		$("#idAlumno").prop('disabled', false);
		$('#rb1').prop('disabled', false);
		$('#rb2').prop('disabled', false);
		$('#rb3').prop('disabled', false);
		$('#rb4').prop('disabled', false);
	});
	
	$('#formGuardar').on('submit', function(e){
		e.preventDefault();
		$("#alcance").prop('disabled', false);
		$("#grupo").prop('disabled', false);
		$("#idAlumno").prop('disabled', false);
		$('#rb1').prop('disabled', false);
		$('#rb2').prop('disabled', false);
		$('#rb3').prop('disabled', false);
		$('#rb4').prop('disabled', false);
		var frm = new FormData($(this)[0]);
		$.ajax({
			method: 'POST',
			url: 'controller/tarea.php',
			data: frm,
			contentType: false,
			processData: false,
		}).done( function( info ){
			$('#editar').modal('hide');
			table.ajax.reload();
			toastr.success(' Saved Correctly');
		});
	});

	$('#example tbody').on('click','button.editar', function(){
		var data = table.row( $(this).parents('tr') ).data();
		console.log(data);
		$('#tituloModal').html('Editing data of  '+data.tema);
		$('#accion').val('editar');
		$('#idTarea').val(data.idTarea);
		$('#alcance').val(data.alcance);
		$('#grupo').val(data.idGrupo);
		$('#idAlumno').val(data.idAlumno);
		$('#tema').val(data.tema);
		$('#descrip').val(data.descripcion);
		switch (data.tipo) {
			case "1":
			$("#rb1").prop("checked", true);
			$('#divtextoDi').hide();
				break;
			case "2":
			$("#rb2").prop("checked", true);
			$('#divtextoDi').hide();	
				break;
			case "3":
			$("#rb3").prop("checked", true);
			$('#divtextoDi').hide();	
				break;
			case "4":
			$("#rb4").prop("checked", true);
			$('#divtextoDi').show();	
				break;
			default:
			break;
		}
		$('#textoDi').val(data.textDi);
		$('#foto').prop('required',false);
		$('#foto').val(null);
		$('#idAlumno').val(data.idAlumno);
		if ($('#foto').get(0).files.length === 0) {
			console.log("No files selected.");
		}
		$('#alcance').prop('disabled', true);
		$('#grupo').prop('disabled', true);
		$('#idalunno').prop('disabled', true);
		$('#rb1').prop('disabled', true);
		$('#rb2').prop('disabled', true);
		$('#rb3').prop('disabled', true);
		$('#rb4').prop('disabled', true);
		
		
	});
	
	$('#example tbody').on('click','button.eliminar', function(){
		var data = table.row( $(this).parents('tr') ).data();
		$('#accion').val('eliminar');
		$('#formEliminar #id').val(data.idTarea);
	});

	$('#formEliminar').on('submit', function(e){
			e.preventDefault();
			var frm = $(this).serialize();
			$.ajax({
				method: 'POST',
				url: 'controller/tarea.php',
				data: frm
			}).done( function( info ){
				$('#confirmar').modal('hide');
				table.ajax.reload();
				toastr.success('Eliminated Correctly');
			});
	});   

	/*var fecha = new Date();	
	alert("Día: "+fecha.getDate()+"\nMes: "+(fecha.getMonth()+1)+"\nAño: "+fecha.getFullYear());
	alert("Hora: "+fecha.getHours()+"\nMinuto: "+fecha.getMinutes()+"\nSegundo: "+fecha.getSeconds()+"\nMilisegundo: "+fecha.getMilliseconds());
	*/