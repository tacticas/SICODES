$(document).ready(function () {
    $("#msg_v").hide();
    preCarga(2);
});
 let idSession  = $("#session").val();

var table = $('#mensaje').DataTable({
    ajax: 'controller/mensaje.php?get='+idSession,
    dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
    columns: [
        { data: 'tx_name' },
        { data: 'rx_name' },
        { data: 'titulo' },
        { data: 'created_at' },
        {
            data: null,
            render(data) {
                return '<button onClick="revisar(this)" data-toggle="modal" data-target="#md_add" class="editar btn btn-primary btn-sm"><i class="fa fa-eye"></i></button> ';
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
        url: 'controller/mensaje.php',
        data: frm,
        contentType: false,
        processData: false,
    }).done(function (info) {
        $('#md_add').modal('hide');
        table.ajax.reload();
        toastr.success('Submitted Successfully');
    });
});

$('#formEliminar').on('submit', function (e) {
    e.preventDefault();
    var frm = new FormData($(this)[0]);
    $.ajax({
        method: 'POST',
        url: 'controller/mensaje.php',
        data: frm
    }).done(function (info) {
        $('#confirmar').modal('hide');
        table.ajax.reload();
        toastr.success('Properly removed');
    });
});

//cambios en vista
$('#tipo').on('change', function () {
    let type = this.value; 
    preCarga(type);
  
});


//carga  select >options 
function preCarga(type) {
    $.ajax({
        method: 'POST',
        url: 'controller/mensaje.php?precarga='+type,
        dataType: 'json',
        success: function (data) {
            $("#idAlumno").html('');
            array = data['data'];
            $.each(array, function (index, value) {
                $("#idAlumno").append('<option value=' + value.idAlumno + '>' + value.nombre +' '+value.ap1+' '+value.ap2+'</option>');
            });
        }
    });
}


function add() {
    $('#formGuardar')[0].reset();
    $('#tituloModal').html('Sending Message');

    $("#form_v").show();
    $("#msg_v").hide();
    $("#enviarUsuario").show();
}

function del(btn) {
    //saca los valores de la tabla
    var data = table.row($(btn).parents('tr')).data();
    $("#idDel").val(data.id);
}

function revisar(btn) {
    //saca los valores de la tabla
    var data = table.row($(btn).parents('tr')).data();
  
    $('#tituloModal').html('Checking  Message');
    $("#form_v").hide();
    $("#enviarUsuario").hide();
    $("#msg_v").show();

    $("#m_from").html(data.tx_name+' '+data.tx_ap1);  
    $("#m_title").html(data.titulo);  
    $("#m_msg").html(data.msg);  
    
}

