$(document).ready(function () {
    $("#url").hide();
    preCarga();
});

var table = $('#tb').DataTable({
    ajax: 'controller/archivosMulti.php?get=1',
    dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
    columns: [
        { data: 'id' },
        { data: 'nombre' },
        { data: 'descrip' },
        { data: 'categoria' },
        { data: 'tipo' },
        {
            data: null,
            render(data) {
                return '<button onClick="edit(this)" data-toggle="modal" data-target="#md_add" class="editar btn btn-warning btn-sm"><i class="fa fa-edit"></i></button> <button onClick="del(this)" data-toggle="modal" data-target="#confirmar" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
            }
        },
    ],
    select: true,
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
});

$('#formGuardar').on('submit', function (e) {
    e.preventDefault();
    var frm = new FormData($(this)[0]);
    $.ajax({
        method: 'POST',
        url: 'controller/archivosMulti.php',
        data: frm,
        contentType: false,
        processData: false,
    }).done(function (info) {
        $('#md_add').modal('hide');
        table.ajax.reload();
        toastr.success('Guardado Correctamente');
    });
});

$('#formEliminar').on('submit', function (e) {
    e.preventDefault();
    var frm = new FormData($(this)[0]);
    $.ajax({
        method: 'POST',
        url: 'controller/archivosMulti.php',
        data: frm
    }).done(function (info) {
        $('#confirmar').modal('hide');
        table.ajax.reload();
        toastr.success('Eliminado Correctamente');
    });
});

//cambios en vista
$('#tipo').on('change', function () {
    if (this.value == "video") {
        $("#url").show();
        $("#archivo").hide();
    } else {
        $("#archivo").show();
        $("#url").hide();
    }
});

//carga  select >options 
function preCarga() {
    $.ajax({
        method: 'POST',
        url: 'controller/archivosMulti.php?precarga=1',
        dataType: 'json',
        success: function (data) {
            array = data['data'];
            $.each(array, function (index, value) {
                $("#cats").append('<option value=' + value.id + '>' + value.nombre + '</option>');
            });
        }
    });
}

function add() {
    $('#formGuardar')[0].reset();
    $("#accion").val("agregar");
    $("#tipo").prop('disabled', false);
    $("#archivo").show();
    $("#url").hide();
}

function del(btn) {
    //saca los valores de la tabla
    var data = table.row($(btn).parents('tr')).data();
    $("#idDel").val(data.id);
}

function edit(btn) {
    //saca los valores de la tabla
    var data = table.row($(btn).parents('tr')).data();
    $("#accion").val("editar");
    $("#id").val(data.id);
    $("#nombre").val(data.nombre);
    $("#descrip").val(data.descrip);
    $("#cats").val(data.idCat);
   
    $("#tipo").val(data.tipo);
    $("#tipo").prop('disabled', true);
    if (data.tipo == "video") {
        $("#url").show();
        $("#archivo").hide();
    } else {
        $("#archivo").show();
        $("#url").hide();
    }
    $("#urlin").val(data.archivo);
}
