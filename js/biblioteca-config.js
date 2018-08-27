$(document).ready(function() {

});

    var table = $('#tb').DataTable( {
        ajax: 'controller/bibliotecaConfig.php?get=1',
        dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
        columns: [
            { data: 'id' },
            { data: 'nombre' },
            { data: 'img' },
            { data:null,
                render(data){
                return '<button data-toggle="modal" data-target="#md_add_categorias" class="editar btn btn-warning btn-sm"><i class="fa fa-edit"></i></button> <button data-toggle="modal" data-target="#confirmar" class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                }
            },
        ],
        select: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );

    $('#formGuardar').on('submit', function(e){
        e.preventDefault();
        var frm = new FormData($(this)[0]);
        $.ajax({
            method: 'POST',
            url: 'controller/bibliotecaConfig.php',
            data: frm,
            contentType: false,
            processData: false,
        }).done( function( info ){
            $('#md_add_categorias').modal('hide');
            table.ajax.reload();
            toastr.success('Guardado Correctamente');
        });
    });