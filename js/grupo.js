$(document).ready(function() {
    listar();
    guardar();
    eliminar();
    preCarga();
});     

    function listar() {
       
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
            { defaultContent: '<button data-toggle="modal" data-target="#editar" class="editar btn btn-warning btn-sm"><i class="fa fa-edit"></i></button> <button data-toggle="modal" data-target="#confirmar" class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>'}
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
        obtener_data_editar('#example tbody',table);
        obtener_id_eliminar('#example tbody',table);
        nuevo_registro();
    } 
 
    function preCarga(){
        $.ajax({
            method: 'POST',
            url: "controller/grupo.php?carga=1",
            dataType: "json",
            success: function(data){
                //console.log(data);
                $.each( data, function( key, registro ) {
                    $("#idCurso").append('<option value='+registro.idCurso+'>'+registro.nombre+'</option>');
                });
            }

        });
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
        $('#tituloModal').html('Editando Datos de '+data.ngrupo);
        $('#accion').val('editar');
        $('#idGrupo').val(data.idGrupo);
        $('#nombre').val(data.ngrupo);
        $('#idCurso').val(data.idCurso);
        });
    }

    function obtener_id_eliminar(tbody, table){
        $(tbody).on('click','button.eliminar', function(){
        var data = table.row( $(this).parents('tr') ).data();
        console.log(data);
        $('#accion').val('eliminar');
        $('#formEliminar #id').val(data.idGrupo);
        
        });
    }

    $('#editar').on('shown.bs.modal', function () {
        $('#matricula').focus()
    });

    function guardar(){
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
                console.log('Se quiere listar',e);
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
                url: 'controller/grupo.php',
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