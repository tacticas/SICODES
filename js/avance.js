$(document).ready(function () {


});

var table = $('#tb1').DataTable({
	ajax: 'controller/avance.php?get=1',
	dom: '<"col-xs-12 text-center"><"row"<"col-sm-6"l><"col-sm-6"fr>>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-"i>>',
	columns: [
		{ data: 'matricula' },
		{
			data: null,
			render: function (data, type, row) {
				return `${data.nombre} ${data.ap1} ${data.ap2}`;
			}
		},
		{ data: 'Gnombre' },
		{
			data: 'dia',
			render: function (data, type, row) {
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
		{ data: 'hora' },
		{
			data: null,
			render: function (data) {
				switch (data.status) {
					case '1':
						return '<button onclick="diario(this)" class="btn btn-success ocultar"><i class="fa fa-check"></i> Diario</button>';
						break;
					case '2':
						return '<button onclick="general(this)" class="btn btn-primary ocultar"><i class="fa fa-check"></i> General</button>';
						break;
					default:
					return '';
						break;
				}
				
			}
		}
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

function getLeccion() {

}

function diario(btn){
	$('#formDiario')[0].reset();
	$("#diario").modal("show");
	var data = table.row($(btn).parents('tr')).data();
	$("#idListaD").val(data.idLista);

}
function general(btn){
	$("#general").modal("show");
	var data = table.row($(btn).parents('tr')).data();
	$("#idListaG").val(data.idLista);
	
	$.ajax({
        method: 'POST',
        url: 'controller/avance.php?precarga=1&idAlumno='+data.idAlumno+'&idGrupo='+data.idGrupo,
        dataType: 'json',
        success: function (data) {
			let obj = data['data'];
	
			if(obj[0].lesson == 0){
				$("#leccionActual").html("Aun no se Inician Lecciones");
				$("#actual").hide();
				$("#lecNew").hide();
				$("#lecIni").show();
				$("#sel_lec").val('2');

				limpiar();
			} else{
				$("#leccionActual").html(obj[0].lesson);
				$("#actual").show();
				$("#lecNew").show();
				$("#lecIni").hide();
				$("#sel_lec").val('0');
				$("#num_lesson").val(obj[0].lesson);
				$("#idAvance").val(obj[0].idAvance);

				$("#date").val(obj[0].date);
				$("#quiz").prop({ disabled: false  });
				$("#in_quiz").val(obj[0].quiz);
				$("#in_test").val(obj[0].test);
				$("#in_oral").val(obj[0].oral_quiz);
				$("#in_oralt").val(obj[0].oral_test);

				switch (obj[0].book) {
					case '0':
						$("#rl0").prop("checked", true);
						break;
					case '1':
						$("#rl1").prop("checked", true);	
						break;
					case '2':
						$("#rl2").prop("checked", true);
						break;
				
					default:
						break;
				}
				switch (obj[0].dictation) {
					case '0':
						$("#rd0").prop("checked", true);
						break;
					case '1':
						$("#rd1").prop("checked", true);	
						break;
					case '2':
						$("#rd2").prop("checked", true);
						break;
				
					default:
						break;
				}


			}
			
        }
    });
}

function limpiar(){
	
	$("#in_quiz").val('');
	$("#in_test").val('');
	$("#in_oral").val('');
	$("#in_oralt").val('');

	$("#date").val('');
	
	$("#rl0").prop("checked", false);
	$("#rl1").prop("checked", false);
	$("#rl2").prop("checked", false);

	$("#rd0").prop("checked", false);
	$("#rd1").prop("checked", false);
	$("#rd2").prop("checked", false);
}

$("#sel_lec" ).on("change", function() {
	let text = $(this).val();
	if(text == 1 ){
		limpiar();
	}
  });

$('#formDiario').on('submit', function (e) {
    e.preventDefault();
    var frm = $(this).serialize();
    $.ajax({
        method: 'POST',
        url: 'controller/avance.php',
        data: frm
    }).done(function (info) {
		$('#diario').modal('hide');

		table.ajax.reload();
		toastr.success('Agregado Correctamente');
    });
});

$('#formGeneral').on('submit', function (e) {
    e.preventDefault();
    var frm = $(this).serialize();
    $.ajax({
        method: 'POST',
        url: 'controller/avance.php',
        data: frm
    }).done(function (info) {
		$('#general').modal('hide');

		table.ajax.reload();
		toastr.success('Agregado Correctamente');
    });
});


$("#ch_home").on("change", function(){
	if($(this).is(":checked")){
		$("#homework").prop({ disabled: false  });
	}else{
		$("#homework").prop({ disabled: true  });
	}
});
$("#ch_read").on("change", function(){
	if($(this).is(":checked")){
		$("#reading").prop({ disabled: false  });
	}else{
		$("#reading").prop({ disabled: true  });
	}
});
$("#ch_writ").on("change", function(){
	if($(this).is(":checked")){
		$("#writing").prop({ disabled: false  });
	}else{
		$("#writing").prop({ disabled: true  });
	}
});
$("#ch_spea").on("change", function(){
	if($(this).is(":checked")){
		$("#speaking").prop({ disabled: false  });
	}else{
		$("#speaking").prop({ disabled: true  });
	}
});
$("#ch_list").on("change", function(){
	if($(this).is(":checked")){
		$("#listening").prop({ disabled: false  });
	}else{
		$("#listening").prop({ disabled: true  });
	}
});
//general
$("#ch_quiz").on("change", function(){
	if($(this).is(":checked")){
		$("#in_quiz").prop({ disabled: false  });
	}else{
		$("#in_quiz").prop({ disabled: true  });
	}
});
$("#ch_test").on("change", function(){
	if($(this).is(":checked")){
		$("#in_test").prop({ disabled: false  });
	}else{
		$("#in_test").prop({ disabled: true  });
	}
});

$("#ch_oral").on("change", function(){
	if($(this).is(":checked")){
		$("#in_oral").prop({ disabled: false  });
	}else{
		$("#in_oral").prop({ disabled: true  });
	}
});

$("#ch_oralt").on("change", function(){
	if($(this).is(":checked")){
		$("#in_oralt").prop({ disabled: false  });
	}else{
		$("#in_oralt").prop({ disabled: true  });
	}
});

