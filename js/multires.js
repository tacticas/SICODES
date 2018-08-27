$(document).ready(function() {

	render();
});    

	function render(){
		$.ajax({
			method: "POST",
			url: "controller/multimedia.php?getAll=1",
		  })
			.success(function( data ) {
				res =  JSON.parse(data);
				myhtml='';
				for (let i = 0; i < res.data.length; i++) {
					const element = res.data[i];
					myhtml= myhtml + ` 
					<div class="col-sm-12 col-md-4 col-lg-3">
						<div class="card  bg-dark redondito-top ">
							<img class="img-fluid redondito-top " src="${element.img}" alt="Card image cap">
							<div class="card-body">
								<h4 class="card-title">${element.nombre}</h4>
								<a href="${element.id}" class="btn btn-primary btn-block">Go!</a>
							</div>
						</div>
					</div>
					
					`;
				}
				$('#cats').html(myhtml);
			}
		);
	}
