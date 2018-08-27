<div class="container-fuild" style="padding: 0px 20px 0px 20px;">
	<div id="contenido" class="row">
		<div class="col-md-12"><br>
			<div class="row">
			<div id="buttonP" class="col-sm-12">
				
					
			
				</div>
				<div class="col-sm-8">
					<h3>Registrar Alumnos en Entrada</h3>
				</div>
				<div class="col-sm-4">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				<i class="fa fa-calendar"></i> Registrados Hoy
				</button>
				</div>
				
			</div>						
			<br>
			<br>
			<div id="tb" class="table-responsive">
				<table data-order='[[ 0, "DESC" ]]' id="example" class="table table-bordered table-striped display dataTable no-footer" cellspacing="0" width="100%">
					<thead class="thead-inverse">
						<tr>
							<th>Matricula</th>
							<th>Nombre</th>
							<th>Grupo</th>
							<th>Dia</th>
							<th>Entrada</th>
							<th>Salida</th>
							<th></th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
<br>
<br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registros de Alumnos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <div id="tb" class="table-responsive">
				<table data-order='[[ 0, "DESC" ]]' id="registros" class="table table-bordered table-striped display dataTable no-footer" cellspacing="0" width="100%">
					<thead class="thead-inverse">
						<tr>
							<th>Matricula</th>
							<th>Nombre</th>
							<th>Grupo</th>
							<th>Dia</th>
							<th>Entrada</th>
							<th>Salida</th>
							<th>Hora</th>
						</tr>
					</thead>
				</table>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>




