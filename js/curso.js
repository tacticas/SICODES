$(document).ready(function() {
    listar();
    guardar();
    eliminar();
});     

    function listar() {
       
       var table = $('#example').DataTable( {

        ajax: 'controller/curso.php?get=1',
        dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
        columns: [
            { data: 'idCurso' },
            { data: 'nombre' },
            { data: 'descrip' },
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
        $('#tituloModal').html('Editando Datos de '+data.nombre); //editando titulo
        $('#accion').val('editar');
        $('#idCurso').val(data.idCurso);
        $('#nombre').val(data.nombre);
        $('#descrip').val(data.descrip);
        });
    }

    function obtener_id_eliminar(tbody, table){
        $(tbody).on('click','button.eliminar', function(){
        var data = table.row( $(this).parents('tr') ).data();
        console.log(data);
        $('#accion').val('eliminar');
        $('#formEliminar #idCurso').val(data.idCurso);
        
        });
    }

    $('#editar').on('shown.bs.modal', function () {
        $('#nombre').focus()
    });

    function guardar(){
        $('#formGuardar').on('submit', function(e){
            e.preventDefault();
            var frm = $(this).serialize();
            $.ajax({
                method: 'POST',
                url: 'controller/curso.php',
                data: frm
            }).done( function( info ){
                $('#editar').modal('hide');
                console.log('Se quiere listar');
                $('#example').dataTable().fnDestroy();
                listar();
                toastr.success('Guardado Correctamente');
                location.reload();
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
                url: 'controller/curso.php',
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