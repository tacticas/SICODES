$(document).ready(function() {
    listar();
    guardar();
    eliminar();
    preCarga();
});     

    function listar() {
       
       var table = $('#example').DataTable( {

        ajax: 'controller/alumno.php?get=1',
        dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
        
        columns: [
            { data: 'idAlumno' },
            {
                data : 'foto',
                width: '15%',
                render: function(data, type, row) {
                    return '<img class="img-thumbnail" alt="No encontrada" src="'+data+'" />';
                }
            },
            { data: 'matricula' },
            { data: 'contraseña' }, 
            { data: 'nombre' },
            { data: 'ap1' },
            { data: 'ap2' },
            { data: 'email' },
            { data: 'fnac' },
            { data: 'sexo' },
            { data: 'dir' },
            { data: 'tel' },
            { data: 'cel' },
            { data: 'meta' },
            { data: 'evaluacion' },
            { data: 'cursoInicio' },
            { data: 'fechaPago' },
            { data: 'idEscuela' },
            { defaultContent: '<button data-toggle="modal" data-target="#editar" class="editar btn btn-warning btn-sm"><i class="fa fa-edit"></i></button> <button data-toggle="modal" data-target="#confirmar" class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>'}
        ],
        select: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "columnDefs": [
            {
                "targets": [ 0,3,8,9,10,11,14,15,16 ],
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
            url: "controller/alumno.php?carga=1",
            dataType: "json",
            success: function(data){
                console.log(data);
                $.each( data, function( key, registro ) {
                    $("#escuela").append('<option value='+registro.idEscuela+'>'+registro.nombre+' - '+registro.ciudad+'</option>');
                    console.log(registro);
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
            $('#foto').prop('required',true);
        });
    }

    function obtener_data_editar(tbody, table){
        $(tbody).on('click','button.editar', function(){
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
    }

    function obtener_id_eliminar(tbody, table){
        $(tbody).on('click','button.eliminar', function(){
        var data = table.row( $(this).parents('tr') ).data();
        console.log(data);
        $('#accion').val('eliminar');
        $('#formEliminar #id').val(data.idAlumno);
        
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
                url: 'controller/alumno.php',
                data: frm,
                contentType: false,
                processData: false,
            }).done( function( info ){
                $('#editar').modal('hide');
                console.log('Se quiere listar',e);
                $('#example').dataTable().fnDestroy();
                listar();
                table.
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
                url: 'controller/alumno.php',
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