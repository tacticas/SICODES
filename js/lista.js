$(document).ready(function() {
	$("#example_filter").css("font-size","25px")
	$("#example_filter").css("color","blue")

	botonSi();
	
});    

	var table = $('#example').DataTable( {
		ajax: 'controller/lista.php?get=1',
		dom: '<"col-xs-12 text-center"><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
		columns: [
			{data:'matricula'},
			{ data: null, 
				render: function(data, type, row){
					return `${data.nombre} ${data.ap1} ${data.ap2}`;
				}
			},
			{data: 'Gnombre'},
			{data: 'dia',
			render: function(data, type, row){
				switch (data) {
					case "Monday":
						diaEs = "Lunes"
						break;
					case "Tuesday":
						diaEs = "Martes"
						break;
					case "Wednesday":
						diaEs = "Miercoles"
						break;
					case "Thursday":
						diaEs = "Jueves"
						break;
					case "Friday":
						diaEs = "Viernes"
						break;
					case "Saturday":
						diaEs = "Sábado"
						break;
					case "Sunday":
						diaEs = "Domingo"
						break;
				
					default:
						break;
				}

				return diaEs
			}
		},
			{data: 'ini'},
			{data: 'fin'},
			{ data: null, 
				render: function(data, type, row){
					return '<button onclick="registrar(this)" class="btn btn-primary ocultar"><i class="fa fa-check"></i> Registrar</button>';
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
	
	var table2 = $('#registros').DataTable( {
		ajax: 'controller/lista.php?getRegistros=1',
		dom: '<"col-xs-12 text-center"B><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
		columns: [
			{data:'matricula'},
			{ data: null, 
				render: function(data, type, row){
					return `${data.nombre} ${data.ap1} ${data.ap2}`;
				}
			},
			{data: 'Gnombre'},
			{data: 'dia',
				render: function(data, type, row){
					switch (data) {
						case "Monday":
							diaEs = "Lunes"
							break;
						case "Tuesday":
							diaEs = "Martes"
							break;
						case "Wednesday":
							diaEs = "Miercoles"
							break;
						case "Thursday":
							diaEs = "Jueves"
							break;
						case "Friday":
							diaEs = "Viernes"
							break;
						case "Saturday":
							diaEs = "Sábado"
							break;
						case "Sunday":
							diaEs = "Domingo"
							break;
					
						default:
							break;
					}

					return diaEs
				}
			},
			{data: 'ini'},
			{data: 'fin'},
			{ data: 'hora' }
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

	function botonSi(){
		$.ajax({
			method: "POST",
			url: "controller/lista.php?botonSi=1",
			type: "json",
		  })
			.success(function( data ) {
				console.log(data[0].length)
				res =  JSON.parse(data);
				console.log(res)
				if (res == "") {
					 myhtml = '<button id="btn_pre" onclick="precarga()" class="btn btn-primary">Empezar Pase de Lista</button>'
				}else{
					myhtml = '<button class="btn btn-primary disabled">Empezar Pase de Lista</button>'
				}
				$('#buttonP').html(myhtml);
			}
		);
	}

	function registrar(btn){
		var data = table.row( $(btn).parents('tr') ).data();
		frm = "id="+data.id;
		
		console.log(frm);
		$.ajax({
			method: "POST",
			url: "controller/lista.php?registrar=1",
			data: frm
		  })
			.done(function( msg ) {
				
				table2.ajax.reload();
				toastr.success('Sent correctly');
				
				
			});
			table.ajax.reload();
			$(btn).parents('tr').hide();
	}
 
	function precarga( ){
		$('#btn_pre').prop('disabled', true);
		 $.ajax({
			method: "POST",
			url: "controller/lista.php?clases=1",
		  })
			.success(function( data ) {
				res =  JSON.parse(data)
				for (let i = 0; i < res.data.length; i++) {
					const element = res.data[i];
					console.log(element.dia);
					frm = "idAlumno="+element.idAlumno+"&idGrupo="+element.idGrupo;
					$.ajax({
						method: "POST",
						url: "controller/lista.php?inicioPase=1",
						data: frm
					  })
						.done(function( msg ) {
							
							
							
							
						});

				}
				table.ajax.reload();
			});
			toastr.success('Listo para Registrar');
		
	}