$(document).ready(function() {

	
	
	
});     

	var table = $('#example').DataTable( {
		ajax: 'controller/misTareas.php?get=1',
		dom: '<"col-xs-12 text-center"><"row"<"col-sm-6"><"col-sm-6">>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-">>',
		columns: [
			
			{ data: 'nombre' },

			{ data: 'tema' },
			{ data: 'descripcion' },
			{
				data : 'tipo',
				render: function(data, type, row) {
					var r = "";
					switch(data) {
						case "1":
							r = "Speaking";
							break;
						case "2":
							r = "Reading";
							break;
						case "3":
							r = "Writing";
							break;
						case "4":
							r = "Listening";
							break;	
						default:
							r = "No especificado";
							break;
					}
					return r;
				}
			},
			{ data: 'fechaAlta' },
			{ data: 'status', 
				render: function(data, type, row){
					if (data == "1") {
						return "Activa";
					} else {
						return "Concluida";
					}
				}
			},
			{ data: null, 
				render: function(data, type, row){
					if (data.status == "1") {
						switch (data.tipo) {
							case "1":
							return '<button data-toggle="modal" data-target="#md_hablar" class="contestar btn btn-primary btn-sm"><i class="fa fa-check"> Record</i></button>';
							break;
							case "4":
							return '<button data-toggle="modal" data-target="#md_dictado" class="dictado btn btn-primary btn-sm"><i class="fa fa-check"> Dictation</i></button>';
							break;
							default:
							return '<button data-toggle="modal" data-target="#md_otros" class="otros btn btn-primary btn-sm"><i class="fa fa-check"> Answer</i></button>';
					
							break;
						}
					} else {
						return "Concluida";
					}
				}
			}
		]
	} );
 
	
	//----- tabla 2 indivuduales ---
	 
	var tableIndi = $('#indi').DataTable( {
		
		ajax: 'controller/misTareas.php?getTareaIndi=1',
		dom: '<"col-xs-12 text-center"><"row"<"col-sm-6"><"col-sm-6">>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-">>',
		columns: [
			
			{ data: 'nombre' },

			{ data: 'tema' },
			{ data: 'descripcion' },
			{
				data : 'tipo',
				render: function(data, type, row) {
					var r = "";
					switch(data) {
						case "1":
							r = "Speaking";
							break;
						case "2":
							r = "Reading";
							break;
						case "3":
							r = "Writing";
							break;
						case "4":
							r = "Listening";
							break;	
						default:
							r = "No especificado";
							break;
					}
					return r;
				}
			},
			{ data: 'fechaAlta' },
			{ data: 'status', 
				render: function(data, type, row){
					if (data == "1") {
						return "Activa";
					} else {
						return "Concluida";
					}
				}
			},
			{ data: null, 
				render: function(data, type, row){
					if (data.status == "1") {
						switch (data.tipo) {
							case "1":
							return '<button data-toggle="modal" data-target="#md_hablar" class="contestar btn btn-primary btn-sm"><i class="fa fa-check"> Record</i></button>';
							break;
							case "4":
							return '<button data-toggle="modal" data-target="#md_dictado" class="dictado btn btn-primary btn-sm"><i class="fa fa-check"> Dictation</i></button>';
							break;
							default:
							return '<button data-toggle="modal" data-target="#md_otros" class="otros btn btn-primary btn-sm"><i class="fa fa-check"> Answer </i></button>';
					
							break;
						}
					} else {
						return "concluded";
					}
				}
			}
		]
	} );


	//---- Tareas Realizadas

	var tableReal = $('#real').DataTable( {
		ajax: 'controller/misTareas.php?getTareaReal=1',
		dom: '<"col-xs-12 text-center"><"row"<"col-sm-6"><"col-sm-6">>t<"row"<"col-xs-12 text-center"p>><"row"<"col-xs-12 pull-">>',
		columns: [
			
			{ data: 'nombre' },

			{ data: 'tema' },
			{ data: 'descripcion' },
			{
				data : 'tipo',
				render: function(data, type, row) {
					var r = "";
					switch(data) {
						case "1":
							r = "Speaking";
							break;
						case "2":
							r = "Reading";
							break;
						case "3":
							r = "Writing";
							break;
						case "4":
							r = "Listening";
							break;	
						default:
							r = "No especificado";
							break;
					}
					return r;
				}
			},
			{ data: 'fechaAlta' },
			{ data: null, 
				render: function(data, type, row){
					switch (data.estado) {
						case "1":
						return '<h5><span class="badge badge-warning">To check</span></h5>';
							break;
						
						case "2":
						return '<h5><span class="badge badge-warning">Reviewed</span></h5>'+ data.msg;
						break;
						
						case "3":
						return '<h5><span class="badge badge-primary">Done</span></h5>'+ data.msg;

						break;
						default:
						return "Concluded";
							break;
					}

			
				}
			},
			{ data: null, 
				render: function(data, type, row){
					switch (data.estado) {
						case "1":
						return '<h5><span class="badge badge-info">Sent</span></h5>';
							break;
						case "2":
							
								switch (data.tipo) {
									case "1":
									return '<button id="editContestar" data-toggle="modal" data-target="#md_hablar" class="contestar  btn btn-primary btn-sm"><i class="fa fa-check"> Record</i></button>';
									break;
									case "4":
									return '<button id="editDictado" data-toggle="modal" data-target="#md_dictadoE" class="dictado  btn btn-primary btn-sm"><i class="fa fa-check"> Dictation</i></button>';
									break;
									default:
									return '<button id="editOtro" data-toggle="modal" data-target="#md_otrosE" class="otros  btn btn-primary btn-sm"><i class="fa fa-check"> Answer </i></button>';
							
									break;
								}
							
						
							break;

						case "3":
						return '<h5><span class="badge badge-primary">Done</span></h5>';
							break;
					
						default:
							break;
					}
										
				}
			}
		]
	} );


	//Editar - Weas


	// back-js

	
	$('#formGuardar').on('submit', function(e){
		e.preventDefault();
		var frm = new FormData($(this)[0]);
		//frm.append('audio', 'test.wab');
		frm.append('data',audioREC);;
		
		$.ajax({
			method: 'POST',
			url: 'controller/misTareas.php',
			data: frm, 
			contentType: false,
			processData: false,
		}).done( function( info ){
			$('#md_hablar').modal('hide');
			table.ajax.reload();
			tableIndi.ajax.reload();
			tableReal.ajax.reload();
			toastr.success('Submitted successfully');
			location.reload();
		});
	});
	$('#formGuardarE').on('submit', function(e){
		e.preventDefault();
		var frm = new FormData($(this)[0]);
		//frm.append('audio', 'test.wab');
		frm.append('data',audioREC);;
		
		$.ajax({
			method: 'POST',
			url: 'controller/misTareas.php',
			data: frm, 
			contentType: false,
			processData: false,
		}).done( function( info ){
			$('#md_hablarE').modal('hide');
			table.ajax.reload();
			tableIndi.ajax.reload();
			tableReal.ajax.reload();
			toastr.success('Submitted successfully');
			
		});
	});


	// ------------ GRABAR ---------------
	$('#example tbody').on('click','button.contestar', function(){
		var data = table.row( $(this).parents('tr') ).data();
		
		$('#idTarea').val(data.idTarea);
	
	});

	$('#indi tbody').on('click','button.contestar', function(){
		var data = tableIndi.row( $(this).parents('tr') ).data();
		
		$('#idTarea').val(data.idTarea);
	
	});

	$('#real tbody').on('click','button.contestar', function(){
		var data = tableReal.row( $(this).parents('tr') ).data();
		$('#respGrabar').val(data.idAlumnoTarea);
		$('#idTarea').val(data.idTarea);
		console.log(data);
		$('#textoDi').val(data.texto);
		$('#texto1').val(data.texto);
		$('#accion1').val('editar');
		$('#idAlumnoTareaEs').val(data.idAlumnoTarea);
		
	
	});
	// ------------ GRABAR ---------------
	var audioREC;

	function __log(e, data) {
		log.innerHTML += "\n" + e + " " + (data || '');
	  }
	
	  var audio_context;
	  var recorder;
	
	  function startUserMedia(stream) {
		var input = audio_context.createMediaStreamSource(stream);
		//__log('Media stream created.');
	
		// Uncomment if you want the audio to feedback directly
		//input.connect(audio_context.destination);
		//__log('Input connected to audio context destination.');
		
		recorder = new Recorder(input);
		//__log('Recorder initialised.');
	  }
	
	  function startRecording(button) {
		recorder && recorder.record();
		button.disabled = true;
		button.nextElementSibling.disabled = false;
		__log('Recording...');
	  }
	
	  function stopRecording(button) {
		recorder && recorder.stop();
		button.disabled = true;
		button.previousElementSibling.disabled = false;
		__log('Recording stopped.');
		
		// create WAV download link using audio data blob
		createDownloadLink();
		
		recorder.clear();
	  }
	
	  function createDownloadLink() {
		recorder && recorder.exportWAV(function(blob) {
		  
			var url = URL.createObjectURL(blob);
		  var li = document.createElement('div');
		  var au = document.createElement('audio');
		  var hf = document.createElement('a');
		  

		  audioREC = blob;
		  au.controls = true;
		  au.src = url;
		  hf.href = url;
		  hf.download = new Date().toISOString() + '.wav';
		  hf.innerHTML = hf.download;
		  li.appendChild(au);
		  li.appendChild(hf);
		  recordingslist.appendChild(li);
		});
	  }
	
	  window.onload = function init() {
		try {
		  // webkit shim
		  window.AudioContext = window.AudioContext || window.webkitAudioContext;
		  navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia;
		  window.URL = window.URL || window.webkitURL;
		  
		  audio_context = new AudioContext;
		  //__log('Audio context set up.');
		  //__log('navigator.getUserMedia ' + (navigator.getUserMedia ? 'available.' : 'not present!'));
		} catch (e) {
		  alert('Tu navegador no soporta las grabaciones de Audio // recomendamos Chrome en su versión mas actual');
		}
		
		navigator.getUserMedia({audio: true}, startUserMedia, function(e) {
		  //__log('No live audio input: ' + e);
		});
	  };
	
	var stadoR = 0;

	//Dictado para talba GRUPAL
	$('#example tbody').on('click','button.dictado', function(){
		
		
		var data = table.row( $(this).parents('tr') ).data();
		
		var texto = data.textDi;
		$("#audio").attr("src", data.archivo);
		var aux = '';
		var aux2 = '';
		var separador = " ";
		var arreglo = texto.split(separador);
		var terminado = [];
		var letras = 0;
		var signos = 0;
		var tamaño = [];
		var clave= [];
	
		for(let i=0; i<arreglo.length; i++){
			var temp = arreglo[i].split("");
			for(let j=0; j<temp.length; j++){
				
				if(temp[j] != "," && temp[j] != "?" && temp[j] != "." && temp[j] != "’" && temp[j] != "’" ){
					aux += temp[j];
					letras++;
					
				}else{
					aux2 += temp[j]
					signos++;
				}
			}
			clave.push(aux);
			terminado.push(aux);
			tamaño.push(letras);
			if(aux2 != ""){
				terminado.push(aux2);
			}
			if(signos !=0){
				tamaño.push(signos);
			}
			aux = '';
			aux2 = '';
			letras = 0;
			signos = 0;
			
		}
		
		var contador = 0;
		var campo  = '';
		//imprime los input y los label
		if(stadoR == 0){
			var puntos = 0; 
			for(let l=0; l<terminado.length; l++){
				if(terminado[l] != "," && terminado[l] != "?" && terminado[l] != "." && terminado[l] != "’" && terminado[l] != "!"){
					campo = '<input title="Si no la sabes pon un signo (?)" required="" placeholder="'+tamaño[l]+'" name="'+l+'" class="respuesta" maxlength="'+tamaño[l]+'" type="text" id="campo' + contador + '"/>  ';
					contador++;
				}else{
					campo = '<label class=""><strong>'+terminado[l]+'</strong></label> ' ;
				}
				$("#campos").append(campo);
			
			}
			stadoR++;
		}
		$('#barra').prop( "max", arreglo.length);
		var res = [];
		$( "#campos input" ).keyup(function() {
		  
			res = [];
			$('#campos input').each(
				function(index){  
					var input = $(this);
					res.push(input.val());
				}
			);
			puntos = 0;
			for (let index = 0; index < clave.length; index++) {
				
				if(clave[index].toUpperCase() == res[index].toUpperCase() || res[index] == "?"  ){
				
					
					$('#campo' + index).prop( "disabled", true );
					puntos++;
					$('#barra').prop( "value", puntos );
					
				}
				
			}
			
		});	

		//dictado bot

		
		
		$('#formDictado').on('submit', function(e){
			e.preventDefault();
			res = [];
			$('#formDictado input').each(
				function(index){  
					var input = $(this);
					res.push(input.val());
					res.push(" ");
				}
			);
			var x = '';
			res.forEach(function (element) {
				x = x + element;
			});
			$("#texto").val(x);
			var frm = $(this).serialize();
			frm+= '&idTarea='+data.idTarea;
			$.ajax({
				method: 'POST',
				url: 'controller/misTareas.php',
				data: frm
			}).done( function( info ){
				$('#md_dictado').modal('hide');
				$("#campos").empty();
				table.ajax.reload( null, false );
				tableIndi.ajax.reload( null, false );
				tableReal.ajax.reload( null, false );
				toastr.success('Submitted successfully'+frm);
				stadoR = 0;
				
				location.reload();

			});
		});
		
		
		//ciclo para crear los inputs 
			
	});

	//Dictado para talba individual

	$('#indi tbody').on('click','button.dictado', function(){
		
		
		var data = tableIndi.row( $(this).parents('tr') ).data();
		var texto = data.textDi;
		$("#audio").attr("src", data.archivo);
		var aux = '';
		var aux2 = '';
		var separador = " ";
		var arreglo = texto.split(separador);
		var terminado = [];
		var letras = 0;
		var signos = 0;
		var tamaño = [];
		var clave= [];
		
		for(let i=0; i<arreglo.length; i++){
			var temp = arreglo[i].split("");
			for(let j=0; j<temp.length; j++){
				
				if(temp[j] != "," && temp[j] != "?" && temp[j] != "." && temp[j] != "’" && temp[j] != "’" ){
					aux += temp[j];
					letras++;
					
				}else{
					aux2 += temp[j]
					signos++;
				}
			}
			clave.push(aux);
			terminado.push(aux);
			tamaño.push(letras);
			if(aux2 != ""){
				terminado.push(aux2);
			}
			if(signos !=0){
				tamaño.push(signos);
			}
			aux = '';
			aux2 = '';
			letras = 0;
			signos = 0;
			
		}
		
		var contador = 0;
		var campo  = '';
		//imprime los input y los label
		if(stadoR == 0){
			var puntos = 0; 
			for(let l=0; l<terminado.length; l++){
				if(terminado[l] != "," && terminado[l] != "?" && terminado[l] != "." && terminado[l] != "’" && terminado[l] != "!"){
					campo = '<input title="Si no la sabes pon un signo (?)" required="" placeholder="'+tamaño[l]+'" name="'+l+'" class="respuesta" maxlength="'+tamaño[l]+'" type="text" id="campo' + contador + '"/>  ';
					contador++;
				}else{
					campo = '<label class=""><strong>'+terminado[l]+'</strong></label> ' ;
				}
				$("#campos").append(campo);
			
			}
			stadoR++;
		}
		$('#barra').prop( "max", arreglo.length);
		var res = [];
		$( "#campos input" ).keyup(function() {
			
		  
			res = [];
			$('#campos input').each(
				function(index){  
					var input = $(this);
					res.push(input.val());
				}
			);
			puntos = 0;
			for (let index = 0; index < clave.length; index++) {
				
				if(clave[index].toUpperCase() == res[index].toUpperCase() || res[index] == "?"  ){
					
					
					$('#campo' + index).prop( "disabled", true );
					puntos++;
					$('#barra').prop( "value", puntos );
					
				}
				
			}
			
		});	

		//dictado bot

		
		
		$('#formDictado').on('submit', function(e){
			e.preventDefault();
			res = [];
			$('#formDictado input').each(
				function(index){  
					var input = $(this);
					res.push(input.val());
					res.push(" ");
				}
			);
			var x = '';
			res.forEach(function (element) {
				x = x + element;
			});
			$("#texto").val(x);
			var frm = $(this).serialize();
			
			frm+= '&idTarea='+data.idTarea;
			
			$.ajax({
				method: 'POST',
				url: 'controller/misTareas.php',
				data: frm
			}).done( function( info ){
				$('#md_dictado').modal('hide');
				$("#campos").empty();
				table.ajax.reload( null, false );
				tableIndi.ajax.reload( null, false );
				tableReal.ajax.reload( null, false );
				toastr.success('Submitted successfully');
				stadoR = 0;
				location.reload();

			});
		});
		
		
		//ciclo para crear los inputs 
			
	});

	//Dictado para talba REALIZADOS

	$('#real tbody').on('click','button.dictado', function(){
		
		var data = tableReal.row( $(this).parents('tr') ).data();
		console.log(data);
		$('#respDictado').val(data.idAlumnoTarea);
		var texto = data.textDi;
		$("#audio").attr("src", data.archivo);
		var aux = '';
		var aux2 = '';
		var separador = " ";
		var arreglo = texto.split(separador);
		var terminado = [];
		var letras = 0;
		var signos = 0;
		var tamaño = [];
		var clave= [];
		
		for(let i=0; i<arreglo.length; i++){
			var temp = arreglo[i].split("");
			for(let j=0; j<temp.length; j++){
				
				if(temp[j] != "," && temp[j] != "?" && temp[j] != "." && temp[j] != "’" && temp[j] != "’" ){
					aux += temp[j];
					letras++;
					
				}else{
					aux2 += temp[j]
					signos++;
				}
			}
			clave.push(aux);
			terminado.push(aux);
			tamaño.push(letras);
			if(aux2 != ""){
				terminado.push(aux2);
			}
			if(signos !=0){
				tamaño.push(signos);
			}
			aux = '';
			aux2 = '';
			letras = 0;
			signos = 0;
			
		}
		
		var contador = 0;
		var campo  = '';
		//imprime los input y los label
		if(stadoR == 0){
			var puntos = 0; 
			for(let l=0; l<terminado.length; l++){
				if(terminado[l] != "," && terminado[l] != "?" && terminado[l] != "." && terminado[l] != "’" && terminado[l] != "!"){
					campo = '<input title="Si no la sabes pon un signo (?)" required="" placeholder="'+tamaño[l]+'" name="'+l+'" class="respuesta" maxlength="'+tamaño[l]+'" type="text" id="campoE' + contador + '"/>  ';
					contador++;
				}else{
					campo = '<label class=""><strong>'+terminado[l]+'</strong></label> ' ;
				}
				$("#camposE").append(campo);
			
			}
			stadoR++;
		}
		$('#barra').prop( "max", arreglo.length);
		var res = [];
		$( "#camposE input" ).keyup(function() {
			
		  
			res = [];
			$('#camposE input').each(
				function(index){  
					var input = $(this);
					res.push(input.val());
				}
			);
			puntos = 0;
			for (let index = 0; index < clave.length; index++) {
				
				if(clave[index].toUpperCase() == res[index].toUpperCase() || res[index] == "?"  ){
					
					
					$('#campoE' + index).prop( "disabled", true );
					puntos++;
					$('#barraE').prop( "value", puntos );
					
				}
				
			}
			
		});	

		//dictado bot

	
		$('#formDictadoE').on('submit', function(e){
			e.preventDefault();
			res = [];
			$('#formDictadoE input').each(
				function(index){  
					var input = $(this);
					res.push(input.val());
					res.push(" ");
				}
			);
			var x = '';
			res.forEach(function (element) {
				x = x + element;
			});
			$("#texto").val(x);
			var frm = $(this).serialize();
			$.ajax({
				method: 'POST',
				url: 'controller/misTareas.php',
				data: frm
			}).done( function( info ){
				$('#md_dictadoE').modal('hide');
				$("#camposE").empty();
				table.ajax.reload();
				tableIndi.ajax.reload();
				tableReal.ajax.reload();
				toastr.success('Submitted successfully');
				stadoR = 0;
				
				

			});
		});
		
		
		//ciclo para crear los inputs 
			
	});

//otras respuestas
	$('#example tbody').on('click','button.otros', function(){
		var data = table.row( $(this).parents('tr') ).data();
		console.log(data);
		$('#tituloModalO').html(data.tema);
		$('#idTareao').val(data.idTarea);
		$('#descargas').empty();
		if(data.archivo != ''){
			var myHtml = '<h5>Complement material</h5> <label ><a href="'+data.archivo +'" download="Material-'+data.tema+'" >Download Material - '+data.tema+'</a> </label>';
			$('#descargas').html( myHtml);
		}
	
	});
	
	$('#indi tbody').on('click','button.otros', function(){
		var data = tableIndi.row( $(this).parents('tr') ).data();
		console.log(data);
		$('#tituloModalO').html(data.tema);
		$('#idTareao').val(data.idTarea);
		$('#descargas').empty();
		if(data.archivo != ''){
			
			var myHtml = '<h5>Complement material</h5> <label ><a href="'+data.archivo +'"download="Material-'+data.tema+'" >Download Material - '+data.tema+'</a> </label>';
			$('#descargas').html( myHtml);
		}
	});


	$('#real tbody').on('click','button.otros', function(){
		var data = tableReal.row( $(this).parents('tr') ).data();
		console.log(data);
		$('#respTexto').val(data.idAlumnoTarea);
		$('#tituloModalO').html(data.tema);
		$('#idTareao').val(data.idTarea);
		$('#descargas').empty();
		if(data.archivo != ''){
			
			var myHtml = '<h5>Archivo Complemento</h5> <label ><a href="'+data.archivo +'"download="Material-'+data.tema+'" >Descargar Material - '+data.tema+'</a> </label>';
			$('#descargas').html( myHtml);
		}
		
		$('#texto1').val(data.texto);
	});

	$('#FormOtro').on('submit', function(e){
		e.preventDefault();
		var frm = new FormData($(this)[0]);
		$.ajax({
			method: 'POST',
			url: 'controller/misTareas.php',
			data: frm,
			contentType: false,
			processData: false,
		}).done( function( info ){
			$('#md_otros').modal('hide');
			/*table.ajax.reload();
			tableIndi.ajax.reload();
			tableReal.ajax.reload();*/
			toastr.success('Submitted successfully');
			location.reload();
			

		});
	});

	$('#FormOtroE').on('submit', function(e){
		e.preventDefault();
		var frm = new FormData($(this)[0]);
		$.ajax({
			method: 'POST',
			url: 'controller/misTareas.php',
			data: frm,
			contentType: false,
			processData: false,
		}).done( function( info ){
			$('#md_otrosE').modal('hide');
			/*table.ajax.reload();
			tableIndi.ajax.reload();
			tableReal.ajax.reload();*/
			toastr.success('Submitted successfully');
			location.reload();
			

		});
	});