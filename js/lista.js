$(document).ready(function() {
	$("#example_filter").css("font-size","25px")
	$("#example_filter").css("color","blue")
	
});    

	var table = $('#example').DataTable( {
		ajax: 'controller/lista.php?get=1',
		dom: '<"col-xs-12 text-center"><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
		columns: [
			{data:'matricula'},
			{data: 'aName'},
			{data: 'nombre'},
			{data: 'dia'},
			{data: 'ini'},
			{data: 'fin'},
			{ data: null, 
				render: function(data, type, row){
					return '<button onclick="registrar(this)" class="btn btn-primary"><i class="fa fa-check"></i> Registrar</button>';
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


	function registrar(btn){
		var data = table.row( $(btn).parents('tr') ).data();
		frm = "idAlumno="+data.idAlumno+"&idGrupo="+data.idGrupo
		console.log(frm);
		$.ajax({
			method: "POST",
			url: "controller/lista.php?registrar=1",
			data: frm
		  })
			.done(function( msg ) {
				table.ajax.reload();
				toastr.success('Sent correctly');
				$("#md_revisar").modal('hide');
			});
		
	}
 
	