$(document).ready(function() {
    listar();
    guardar();
    eliminar();
});     

    function listar() {
       
       var table = $('#example').DataTable( {

        ajax: 'controller/persona.php?get=1',
        dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
        columns: [
            { data: 'idUsuario' },
            { data: 'matricula' },
            { data: 'nombre' },
            { data: 'apPaterno' },
            { data: 'apMaterno' },
            { data: 'eMail' },
            { data: 'telefono' },
            { data: 'idEscuela' },
            { defaultContent: '<button data-toggle="modal" data-target="#editar" class="editar btn btn-warning btn-sm"><i class="fa fa-edit"></i></button> <button data-toggle="modal" data-target="#confirmar" class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>'},
        ],
        select: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
                      
        } );
        obtener_data_editar('#example tbody',table);
        obtener_id_eliminar('#example tbody',table);
        nuevo_registro();
    } 
 

    function nuevo_registro(){
        $('button.agregar').click(function(){
            $('#formGuardar')[0].reset();
            console.log('Estoy agregando');
            $('#accion').val('agregar');
            $('#tituloModal').html('Agregar nuevo registro');
        });
    }

    function obtener_data_editar(tbody, table){
        $(tbody).on('click','button.editar', function(){
        var data = table.row( $(this).parents('tr') ).data();
        console.log(data);
        $('#tituloModal').html('Editando Datos de '+data.matricula);
        $('#accion').val('editar');
        $('#idusuario').val(data.idUsuario);
        $('#matricula').val(data.matricula);
        $('#nombre').val(data.nombre);
        $('#ap1').val(data.apPaterno);
        $('#ap2').val(data.apMaterno);
        $('#mail').val(data.eMail);
        $('#tel').val(data.telefono);
        $('#contra').val(data.contrasena);
        $('#escuela').val(data.idEscuela);
        });
    }

    function obtener_id_eliminar(tbody, table){
        $(tbody).on('click','button.eliminar', function(){
        var data = table.row( $(this).parents('tr') ).data();
        console.log(data);
        $('#accion').val('eliminar');
        $('#formEliminar #idusuario').val(data.idUsuario);
        
        });
    }

    $('#editar').on('shown.bs.modal', function () {
        $('#matricula').focus()
    });

    function guardar(){
        $('#formGuardar').on('submit', function(e){
            e.preventDefault();
            var frm = $(this).serialize();
            $.ajax({
                method: 'POST',
                url: 'controller/persona.php',
                data: frm
            }).done( function( info ){
                $('#editar').modal('hide');
                console.log('Se quiere listar');
                $('#example').dataTable().fnDestroy();
                listar();
                toastr.success('Guardado Correctamente');
            });
        });
    }
    function eliminar(){
         $('#formEliminar').on('submit', function(e){
            e.preventDefault();
            var frm = $(this).serialize();
            console.log(frm);
            $.ajax({
                method: 'POST',
                url: 'controller/persona.php',
                data: frm
            }).done( function( info ){
                $('#confirmar').modal('hide');
                console.log('Se quiere listar al eliminar');
                $('#example').dataTable().fnDestroy();
                listar();
                toastr.success('Eliminado Correctamente');
            });
        });   
    }