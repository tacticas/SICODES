$(document).ready(function() {
	


	

});    



(function($) {  
	$.get = function(key)   {  
		key = key.replace(/[\[]/, '\\[');  
		key = key.replace(/[\]]/, '\\]');  
		var pattern = "[\\?&]" + key + "=([^&#]*)";  
		var regex = new RegExp(pattern);  
		var url = unescape(window.location.href);  
		var results = regex.exec(url);  
		if (results === null) {  
			return null;  
		} else {  
			return results[1];  
		}  
	}  
})(jQuery);  
var a = $.get("id");

function invertir(cadena) {
	var x = cadena.length;
	var cadenaInvertida = "";
   
	while (x>=0) {
	  cadenaInvertida = cadenaInvertida + cadena.charAt(x);
	  x--;
	}
	flag = true;
	i = 0;
	extencion = '';
	while(flag == true){
		if( cadenaInvertida.charAt(i) == '.'){
			flag = false;
		}else{
			extencion = extencion + cadenaInvertida.charAt(i);
		}
		i++;
	}
	x = extencion.length;
	cadenaInvertida = '';
	while (x>=0) {
		cadenaInvertida = cadenaInvertida + extencion.charAt(x);
		x--;
	  }


	return cadenaInvertida;
  }


	var table = $('#example').DataTable( {
		ajax: 'controller/revisar.php?get='+a,
		dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
		columns: [
			{ data: 'matricula' },
			{ data: null, 
				render : function(data){
					return data.nombre+" "+data.ap1+" "+data.ap2;
				} 
			},
			{ data: 'texto' },
			{ data: 'archivo', 
				render : function(data){
					if(data != ''){
					tipo = invertir(data);
					if(tipo == 'wav' || tipo == 'mp3'){
						return '<audio id="audio" class="" src="'+data+'" controls="controls" type="audio/*" preload="preload"></audio><br><a href="'+data+'" download="Aud-'+data+'">Download Audio</a>';
					}
					if(tipo == 'jpg' || tipo == 'jpeg' || tipo == 'png'){
						return '<img class="img-fluid vizor"  src="'+data+'" ></img><br><a href="'+data+'" download="img-'+data+'">Download Image</a>';
					}
					if(tipo == 'doc' || tipo == 'docx'){
						return '<a href="'+data+'" download="doc-'+data+'">Download DOC</a>';
					}
					if(tipo == 'doc' || tipo == 'pdf'){
						return '<a href="'+data+'" download="pdf-'+data+'">Download PDF</a>';
					}
					}else{
						return 'empty';
					}
				} 
			},
			{ data: null, 
				render : function(data){
					if(data.status == '3'){
						return '<h5><span class="badge badge-primary">Done</span></h5>'
					}else{
						return '<button onclick="modal(2,this)" class="btn btn-warning" data-toggle="modal" data-target="#md_revisar"><i class="fa fa-comment"></i></button> <button onclick="modal(3,this)" class="btn btn-primary" data-toggle="modal" data-target="#md_revisar"><i class="fa fa-check"></i></button>';
					}
				} 
			},
		],
		select: true,
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		],
		"columnDefs": [
			{
				"targets": [ ],
				"visible": false
			},
		]
	} );



	function modal(num,btn){
		
		var data = table.row( $(btn).parents('tr') ).data();
		$("#idAlumnoTarea").val(data.idAlumnoTarea);
		$("#msg").val(data.msg);
		if(num==2){
			//mandar a revisar
			$("#tituloModal").html("Check homework");
			$("#accion").val("revisar");
		}else{
			//mandar tarea completada
			$("#tituloModal").html("Completed?");
			$("#accion").val("completar");
		}
		$("#formGuardar").on("submit", function(event){
			event.preventDefault();
			frm = $(this).serialize();
			$.ajax({
				method: "POST",
				url: "controller/revisar.php",
				data: frm
			  })
				.done(function( msg ) {
					table.ajax.reload();
					toastr.success('Sent correctly');
					$("#md_revisar").modal('hide');
				});
		});
	}

 
	