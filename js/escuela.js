$(document).ready(function() {

});     
    var table = $('#example').DataTable( {
        ajax: 'controller/escuela.php?get=1',
        dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
        columns: [
            { data: 'idEscuela' },
            { data: 'nombre' },
			{ data: 'dir' },
			{ data: 'ciudad' },
			{ data: 'estado' },
			{ data: 'pais' },
			{ data: 'director' },
            { defaultContent: '<button data-toggle="modal" data-target="#editar" class="editar btn btn-warning btn-sm"><i class="fa fa-edit"></i></button> <button data-toggle="modal" data-target="#confirmar" class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>'},
        ],
        select: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
    
    $('#formGuardar').on('submit', function(e){
        e.preventDefault();
        var frm = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: 'controller/escuela.php',
            data: frm
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
            url: 'controller/escuela.php',
            data: frm
        }).done( function( info ){
            $('#confirmar').modal('hide');
            table.ajax.reload();
            toastr.success('Eliminado Correctamente');
        });
    });   
    
    $('button.agregar').click(function(){
            $('#formGuardar')[0].reset();
            $('#accion').val('agregar');
            $('#tituloModal').html('Agregar nuevo registro');
    });
    
    $('#example tbody').on('click','button.editar', function(){
        var data = table.row( $(this).parents('tr') ).data();
        $('#tituloModal').html('Editando Datos de '+data.nombre); //editando titulo
        $('#accion').val('editar');
        $('#escuela').val(data.idEscuela);
        $('#nombre').val(data.nombre);
		$('#dir').val(data.dir);
		$('#ciudad').val(data.ciudad);
		$('#estado').val(data.estado);
		$('#pais').val(data.pais);
		$('#director').val(data.director);
    });

    $('#example tbody').on('click','button.eliminar', function(){
		console.log('llegue aqui');
		var data = table.row( $(this).parents('tr') ).data();
        $('#accion').val('eliminar');
        $('#formEliminar #idEscuela').val(data.idEscuela);
    });
    