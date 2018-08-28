$(document).ready(function() {

	render();

	
});    

	function render(){
		let id = getParameterByName('id');
		console.log(id);
		$.ajax({
			method: "POST",
			url: "controller/multires.php?getAll="+id,
		  })
			.success(function( data ) {
				res =  JSON.parse(data);
				myhtml='';
				for (let i = 0; i < res.data.length; i++) {
					const element = res.data[i];
					switch (element.tipo) {
						case "video":
							let vid = getParameterByName("v", element.archivo);

							myhtml= myhtml + ` 
							<div class="col-sm-12 col-md-6 col-lg-4">
								<div class="card  bg-dark redondito-top ">
								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/${vid}" allowfullscreen></iframe>
									
							  	</div>
									<div class="card-body">
										<h4 class="card-title">${element.nombre}</h4>
										<p>${element.descrip}</p>
										<button onClick="fullscreen('${element.tipo}','${element.nombre}' ,'${element.descrip}','${vid}')" class="btn btn-primary btn-block"> <i class="fa fa-search"></i>  Zoom!</button>
									</div>
								</div>
							</div>
							
							`;
							break;
						
						case "pdf":
								myhtml= myhtml + ` 
								<div class="col-sm-12 col-md-4 col-lg-3">
									<div class="card  bg-dark redondito-top ">
										<embed src="${element.archivo}" type="application/pdf"></embed>
										
										<div class="card-body">
											<h4 class="card-title">${element.nombre}</h4>
											<p>${element.descrip}</p>
											<button onClick="fullscreen('${element.tipo}','${element.nombre}' ,'${element.descrip}','${element.archivo}')" class="btn btn-primary btn-block"> <i class="fa fa-search"></i>  Zoom!</button>
										</div>
									</div>
								</div>
								
								`;
							break;
						
						case "imagen":
							myhtml= myhtml + ` 
							<div class="col-sm-12 col-md-4 col-lg-3">
								<div class="card  bg-dark redondito-top ">
									<img class="img-fluid redondito-top " src="${element.archivo}" alt="Card image cap">
									<div class="card-body">
										<h4 class="card-title">${element.nombre}</h4>
										<p>${element.descrip}</p>
										<button onClick="fullscreen('${element.tipo}','${element.nombre}' ,'${element.descrip}','${element.archivo}')" class="btn btn-primary btn-block"> <i class="fa fa-search"></i>  Zoom!</button>
									</div>
								</div>
							</div>
							
							`;
							break;
						default:
							break;
					}

			
				}
				$('#cats').html(myhtml);
			}
		);
	}

	function getParameterByName(name, url) {
		if (!url) url = window.location.href;
		name = name.replace(/[\[\]]/g, '\\$&');
		var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
			results = regex.exec(url);
		if (!results) return null;
		if (!results[2]) return '';
		return decodeURIComponent(results[2].replace(/\+/g, ' '));
	}

	function fullscreen(...e){
		console.log(e);
		let myhtml = '';
		switch (e[0]) {
			case 'video':
					myhtml = `<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/${e[3]}" allowfullscreen></iframe>
							  </div>`;
				break;
			case 'pdf':
					myhtml = `
					<embed src="${e[3]}" type="application/pdf"></embed>
					`;
				break;
			case 'imagen':
					myhtml = `
					<img class="img-fluid redondito-top " src="${e[3]}" alt="Card image cap">	
					`;
				break;
		
			default:
				break;
		}
		$("#archivo").html(myhtml);
		$("#titulo").html(e[1]);
		$("#descrip").html(e[2]);


		$("#md_zoom").modal('show');
	}