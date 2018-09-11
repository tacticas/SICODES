$(document).ready(function () {
	preCarga();

    

});

var table = $('#tb1').DataTable({
    ajax: '',
    dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
    columns: [
        { data: 'matricula' },
        { data: 'nombre' },
        { data: 'ap1' },
        { data: 'ap2' },
        
    ],
    select: true,
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    "columnDefs": [
        {
            "targets": [],
            "visible": false
        },
    ]
});
var table2 = $('#tb2').DataTable({
    ajax: '',
    dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
    columns: [
        { data: 'matricula' },
        { data: 'nombre' },
        { data: 'ap1' },
        { data: 'ap2' },
        { data: 'fechaPago' },
        
    ],
    select: true,
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    "columnDefs": [
        {
            "targets": [],
            "visible": false
        },
    ]
});
var table3 = $('#tb3').DataTable({
    ajax: '',
    dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
    columns: [
        { data: 'matricula' },
        { data: 'nombre' },
        { data: 'ap1' },
        { data: 'ap2' },
        { data: 'faltas' },
        
    ],
    select: true,
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    "columnDefs": [
        {
            "targets": [],
            "visible": false
        },
    ]
});


$('#formGuardar').on('submit', function (e) {
    e.preventDefault();
    var frm = $(this).serialize();
    let escu = $("#escuelas").val();
    let tipo = $("#tipo").val();
    $("#div1").hide();
    $("#div2").hide();
    $("#div3").hide();
    switch (tipo) {
        case 'matriculas':
            table.ajax.url( 'controller/reportes.php?matri='+escu).load();
            $("#div1").show();
            break;
        case 'pagos':
            table2.ajax.url( 'controller/reportes.php?pagos='+escu).load();
            $("#div2").show();
            break;
        case 'faltas':
            table3.ajax.url( 'controller/reportes.php?faltas='+escu).load();
            $("#div3").show();
            break;
    
        default:
            break;
    }

    toastr.success('Reporte Generado');
 
});

function preCarga(){
	$.ajax({
        method: 'POST',
        url: 'controller/reportes.php?get=1',
        dataType: 'json'
    }).success(function (data) {
        var array = data['data'];
		$.each( array, function( key, registro ) {
            $("#escuelas").append('<option value='+registro.idEscuela+'>'+registro.nombre+' - '+registro.ciudad+'</option>');
        });
    });
}