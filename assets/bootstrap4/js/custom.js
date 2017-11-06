 toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-left",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
$( document ).ready(function() {

 $(".confirmation").click(function () {
        var message = "Desea eliminar?";
        if($(this).attr("data-confmes")) message = $(this).data("confmes");
        return confirm(message);
    });


 
 $("#mimodal").click(function(){
    $("#formulario").show();
    $("#contenido").hide();
    $("#formRest")[0].reset();
    $(".form-control").val("");
    $("#accion").val("add");
    $("#focuz").focus();

  });

  $("#cancelModal").click(function(){
    $("#formulario").hide();
    $("#contenido").show();
    
    $("#accion").val("add");
    
  });

//toastr.success('Agregado Correctamente.');
     //imprimeTablaUsuarios();
     
 /* function imprimeBuscaUsuarios(){
       $.ajax({
                data:  $("#buscarUsuario").serialize(), 
                url:   'usuarios.php', 
                type:  'post', 
              }).done(function(data){
                $("#tabla").html(data);
                
                
              }).fail(function(){
                  $("#tabla").html('No se encontraron coincidencias...');
              });
   
   }
   $("#buscar").keyup(function(){
      imprimeBuscaUsuarios();
   });*/

  /*
    $( "#enviarUsuario" ).click(function() {
  		event.preventDefault();
       var camp1 = $("#matricula").val();
       var camp2 = $("#nombre").val();
       var camp3 = $("#ap1").val();
       var camp4 = $("#ap2").val();
       var camp5 = $("#mail").val();
       var camp6 = $("#tel").val();
       var camp7 = $("#").val();
       var camp8 = $("#").val();
       var camp9 = $("#").val();
       console.log(camp1);
       if (camp1 == ""){
          $("#dMatricula").addClass('has-danger');
          return false;
          
       }
       var data = $( "#fmUsuarios" ).serialize();
       console.log(data);

       $.ajax({
                data:  data, 
                url:   'controller/vista1.php?task=add', 
                type:  'post', 
              }).done(function(data){
                $("#ModalAdd").modal('toggle');
                
                imprimeTablaUsuarios();
              });
    });


    $(document).on('click', '.update', function(){ 
      var idUsuario = $(this).attr("id");
      console.log(idUsuario);

    });*/


});