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
			{ data: 'status', 
				render: function(data, type, row){
					if (data == "1") {
						return '<button data-toggle="modal" data-target="#contestar" class="contestar btn btn-warning btn-sm"><i class="fa fa-check"> Contestar</i></button>';
					} else {
						return "Concluida";
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
		frm.append('audio', 'test.wab');
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
			toastr.success('Tarea Enviada');
		});
	});

	$('#example tbody').on('click','button.contestar', function(){
		var data = table.row( $(this).parents('tr') ).data();
		$('#md_hablar').modal('show');
		$('#idTarea').val(data.idTarea);
	
	});
	
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
	