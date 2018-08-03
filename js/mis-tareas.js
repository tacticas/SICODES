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
							r = "Hablar";
							break;
						case "2":
							r = "leer";
							break;
						case "3":
							r = "Escribir";
							break;
						case "4":
							r = "Escuchar";
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
							return '<button data-toggle="modal" data-target="#contestar" class="contestar btn btn-primary btn-sm"><i class="fa fa-check"> Grabar</i></button>';
							break;
							case "4":
							return '<button data-toggle="modal" data-target="#md_dictado" class="dictado btn btn-primary btn-sm"><i class="fa fa-check"> Dictado</i></button>';
							break;
							default:
							return '<button data-toggle="modal" data-target="#md_otros" class="otros btn btn-primary btn-sm"><i class="fa fa-check"> Contestar</i></button>';
					
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
							r = "Hablar";
							break;
						case "2":
							r = "leer";
							break;
						case "3":
							r = "Escribir";
							break;
						case "4":
							r = "Escuchar";
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
							return '<button data-toggle="modal" data-target="#contestar" class="contestar btn btn-primary btn-sm"><i class="fa fa-check"> Grabar</i></button>';
							break;
							case "4":
							return '<button data-toggle="modal" data-target="#md_dictado" class="dictado btn btn-primary btn-sm"><i class="fa fa-check"> Dictado</i></button>';
							break;
							default:
							return '<button data-toggle="modal" data-target="#md_otros" class="otros btn btn-primary btn-sm"><i class="fa fa-check"> Contestar</i></button>';
					
							break;
						}
					} else {
						return "Concluida";
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
							r = "Hablar";
							break;
						case "2":
							r = "leer";
							break;
						case "3":
							r = "Escribir";
							break;
						case "4":
							r = "Escuchar";
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
			{ data: 'status', 
				render: function(data, type, row){
					if (data == "1") {
						return 'Realizada';
					} else {
						return "Realizada";
					}
				}
			}
		]
	} );


	//interface
	
	
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
			toastr.success('Tarea Enviada');
		});
	});


	// ------------ GRABAR ---------------
	$('#example tbody').on('click','button.contestar', function(){
		var data = table.row( $(this).parents('tr') ).data();
		$('#md_hablar').modal('show');
		$('#idTarea').val(data.idTarea);
	
	});

	$('#indi tbody').on('click','button.contestar', function(){
		var data = tableIndi.row( $(this).parents('tr') ).data();
		$('#md_hablar').modal('show');
		$('#idTarea').val(data.idTarea);
	
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
		__log('Grabando...');
	  }
	
	  function stopRecording(button) {
		recorder && recorder.stop();
		button.disabled = true;
		button.previousElementSibling.disabled = false;
		__log('Se detuvo la grabación.');
		
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
		  alert('Tu navegador no soporta las grabaciones de Audio // recomendamos Chrome en su versión ams actual');
		}
		
		navigator.getUserMedia({audio: true}, startUserMedia, function(e) {
		  //__log('No live audio input: ' + e);
		});
	  };
	
	var stadoR = 0;

	//dictado
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
		console.log(texto);
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
			console.log("key up");
		  
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
					console.log(puntos);
					
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
			$.ajax({
				method: 'POST',
				url: 'controller/misTareas.php',
				data: frm
			}).done( function( info ){
				$('#md_dictado').modal('hide');
				$("#campos").empty();
				table.ajax.reload();
				tableIndi.ajax.reload();
				tableReal.ajax.reload();
				toastr.success('Tarea Enviada');
				stadoR = 0;

			});
		});
		
		
		//ciclo para crear los inputs 
			
	});

	//modal otros

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
		console.log(texto);
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
			console.log("key up");
		  
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
					console.log(puntos);
					
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
			$.ajax({
				method: 'POST',
				url: 'controller/misTareas.php',
				data: frm
			}).done( function( info ){
				$('#md_dictado').modal('hide');
				$("#campos").empty();
				table.ajax.reload();
				tableIndi.ajax.reload();
				tableReal.ajax.reload();
				toastr.success('Tarea Enviada');
				stadoR = 0;

			});
		});
		
		
		//ciclo para crear los inputs 
			
	});


	$('#example tbody').on('click','button.otros', function(){
		var data = table.row( $(this).parents('tr') ).data();
		console.log(data);
		$('#tituloModalO').html(data.tema);
		$('#idTareao').val(data.idTarea);
		$('#descargas').empty();
		if(data.archivo != ''){
			var myHtml = '<h5>Archivo Complemento</h5> <label ><a href="'+data.archivo +'" download="Material-'+data.tema+'" >Descargar Material - '+data.tema+'</a> </label>';
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
			
			var myHtml = '<h5>Archivo Complemento</h5> <label ><a href="'+data.archivo +'"download="Material-'+data.tema+'" >Descargar Material - '+data.tema+'</a> </label>';
			$('#descargas').html( myHtml);
		}
	});

	$('#FormOtro ').on('submit', function(e){
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
			table.ajax.reload();
			tableIndi.ajax.reload();
			tableReal.ajax.reload();
			toastr.success('Tarea Enviada'+ info );

		});
	});