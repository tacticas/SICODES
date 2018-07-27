$(document).ready(function() {
});
   
$('#frmLogin').on('submit', function(e){
    e.preventDefault();
    var frm = $(this).serialize();
    $.ajax({
        method: 'POST',
        url: "controller/login.php",
        data: frm,
        success: function(data){
            var obj = jQuery.parseJSON(data);
            if( obj.data['msg'] == "error" ){
                toastr.error('Usuario o contraseña incorrectos');
            }else{
                toastr.success('Iniciando Sessión');
                window.location = "dashboard.php";
            }
            
        }
    });
});
