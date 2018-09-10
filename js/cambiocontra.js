$(document).ready(function () {
	preCarga();

});

$('#formGuardar').on('submit', function (e) {
    e.preventDefault();
    var frm = $(this).serialize();

	$.ajax({
        method: 'POST',
        url: 'controller/cambiocontra.php',
        data: frm
    }).success(function (info) {
		console.log(info);
		if(info == 'fallo' ){
			toastr.error('Old password does not match');
		}else{
			toastr.success('Password changed');
		}
		$("#i1").val('');
		$("#i2").val('');
    });
});

function preCarga(){
	$.ajax({
        method: 'POST',
        url: 'controller/cambiocontra.php?get=1',
        dataType: 'json'
    }).success(function (data) {
		$("#contraseña").val(data.data[0].contra);
    });
}