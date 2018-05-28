$(document).ready(function() {
	preCarga();
   

	var table = $('#example').DataTable( {
		ajax: 'controller/grupo.php?get=1',
		dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
		columns: [
			{ data: 'idGrupo' },
			{ data: 'ngrupo' },
			{ data: 'idCurso' },
			{
				data : 'ncurso',
				render: function(data, type, row) {
					return data;
				}
			},
			{ defaultContent: '<button data-toggle="modal" data-target="#editar" class="editar btn btn-warning btn-sm"><i class="fa fa-edit"></i></button> <button data-toggle="modal" data-target="#confirmar" class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> <button data-toggle="modal" data-target="#add" class="agregarAl btn btn-success btn-sm"><i class="fa fa-plus"></i> <i class="fa fa-users"></i></button> <button data-toggle="modal" data-target="#del" class="getGrupo btn btn-danger btn-sm"><i class="fa fa-list"></i></button> '}
		],
		select: true,
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		],
		"columnDefs": [
			{
				"targets": [ 2 ],
				"visible": false
			},
			
		]
	} );

	function preCarga(){
		$.ajax({
			method: 'POST',
			url: "controller/grupo.php?carga=1",
			dataType: "json",
			success: function(data){
				$.each( data, function( key, registro ) {
					$("#idCurso").append('<option value='+registro.idCurso+'>'+registro.nombre+'</option>');
				});
			}

		});
	}


	$('button.agregar').click(function(){
		$('#formGuardar')[0].reset();
		$('#accion').val('agregar');
		$('#tituloModal').html('Agregar nuevo registro');
	});

	$('#example tbody').on('click','button.editar', function(){
		var data = table.row( $(this).parents('tr') ).data();
		$('#tituloModal').html('Editando Datos de '+data.ngrupo);
		$('#accion').val('editar');
		$('#idGrupo').val(data.idGrupo);
		$('#nombre').val(data.ngrupo);
		$('#idCurso').val(data.idCurso);
	});

    $('#example tbody').on('click','button.getGrupo', function(){
		
		var data = table.row( $(this).parents('tr') ).data();
        var dir = data.idGrupo;
        $('#dtList').dataTable().fnDestroy();
        var altable2 = $('#dtList').DataTable( {
            ajax : 'controller/grupo.php?grupo='+dir,
            columns: [
                {data: 'idAlumno'},
                {data: 'matricula'},
                { data: 'nombre' },
                { data: 'ap1' },
                { data: 'ap2' },
                { defaultContent: '<button class="lieditar btn btn-danger btn-sm"><i class="fa fa-minus"></i></button>'}
            ]
		} );
		altable2.ajax.reload();
        $('#dtList').on ('click','button.lieditar', function( event ){
			event.preventDefault();
			event.stopImmediatePropagation();
			var data = altable2.row( $(this).parents('tr') ).data();
            console.log(data.idR);
            $.ajax({
                method: "POST",
                url: "controller/grupo.php?acc=del&reg="+data.idR,
                data: data
              })
                .done(function( msg ) {
					
                    toastr.success('Eliminado Correctamente');
                });
            this.disabled= true;
    
        });

    });
    


    $('#example tbody').on('click','button.agregarAl', function(){
		
		var data = table.row( $(this).parents('tr') ).data();
        var dir = data.idGrupo;
        $('#dtAlumnos').dataTable().fnDestroy();
        var altable = $('#dtAlumnos').DataTable( {
            ajax : 'controller/grupo.php?grupo2='+dir,
            columns: [
                {data: 'idAlumno'},
                {data: 'matricula'},
                { data: 'nombre' },
                { data: 'ap1' },
                { data: 'ap2' },
                { defaultContent: '<button class="addAln btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>'}
            ]
		} );
		altable.ajax.reload();
        $('#dtAlumnos').on('click','button.addAln', function( event ){
			event.preventDefault();
			event.stopImmediatePropagation();
            var data = altable.row( $(this).parents('tr') ).data();
            console.log(data);
            $.ajax({
                method: "POST",
                url: "controller/grupo.php?acc=add&grupo="+dir,
                data: data
              })
                .done(function( msg ) {
					
                    toastr.success('Guardado Correctamente');
                });
            this.disabled= true;
    
        });
        
    });



	//------------
	$('#example tbody').on('click','button.eliminar', function(){
		var data = table.row( $(this).parents('tr') ).data();
		$('#accion').val('eliminar');
		$('#formEliminar #id').val(data.idGrupo);
	});

	$('#formGuardar').on('submit', function(e){
			e.preventDefault();
			var frm = new FormData($(this)[0]);
			$.ajax({
				method: 'POST',
				url: 'controller/grupo.php',
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
				url: 'controller/grupo.php',
				data: frm
			}).done( function( info ){
				$('#confirmar').modal('hide');
				table.ajax.reload();
				toastr.success('Eliminado Correctamente');
			});
	});   
});  