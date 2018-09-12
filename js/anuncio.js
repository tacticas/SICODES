$(document).ready(function () {
	preCarga();

    

});

$('#formGuardar').on('submit', function (e) {
    e.preventDefault();
    var frm = $(this).serialize();
    $.ajax({
        method: 'POST',
        url: 'controller/anuncio.php?cambiarM=1',
        data: frm,
    }).success(function (data) {
        toastr.success('Modificado Correctamente');
    });
 
});

function preCarga(){
	$.ajax({
        method: 'POST',
        url: 'controller/anuncio.php?get=1',
        dataType: 'json'
    }).success(function (data) {
        var array = data['data'];
        $("#msg").val(array[0]);
    });
}