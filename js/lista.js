$(document).ready(function() {

});    

	var table = $('#example').DataTable( {
		ajax: 'controller/lista.php?get=1',
		dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
		columns: [
			{data:'matricula'},
			{data: 'aName'},
			{data: 'nombre'},
			{data: 'dia'},
			{data: 'ini'},
			{data: 'fin'},
			{ data: null, 
				render: function(data, type, row){
					return '<button>X</button>';
				}
			}
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

 
	