<div class="container" style="padding: 0px 20px 0px 20px;">
	<div id="contenido" class="row">
		<div class="col-md-12"><br>
			<div class="row">
				<div class="col-sm-12">
					<h3>Reportes</h3>
				</div>
			</div>
			<br>
			<div class="col-md-12" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Parametros</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</div>
					<div class="modal-body">
						<form id="formGuardar">
							<div class="form-group">
								<label for="">Escuela</label>
								<select name="idEscuela" id="escuelas" class="form-control">

								</select>
							</div>
							<div class="form-group">
								<label for="">Tipo de Reporte</label>
								<select name="tipo" id="tipo" class="form-control">
									<option value="matriculas">Matriculados Por Escuela</option>
									<option value="pagos">Alumnos con pagos Proximos</option>
									<option value="faltas">Inasistencias de Alumnos</option>
								</select>
							</div>
					</div>
					<div class="modal-footer">
						<input type="submit" value="Generar" class="btn btn-primary">
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-sm-12">
			<h3>Área de Reportes</h3>
		</div>
		<div id="div1" class="col-sm-12" style="display: none">
			<h4>Numero de Matriculados: <span id="num"></span></h4>
			<div id="" class="table-responsive">
				<table data-order='[[ 0, "DESC" ]]' id="tb1" class="table table-bordered table-striped display" cellspacing="0" width="100%">
					<thead class="thead-inverse">
						<tr>
							<th>Matricula</th>
							<th>Nombre</th>
							<th>Paterno</th>
							<th>Materno</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
		
			<div id="div2" class="table-responsive"  style="display: none">
				<table data-order='[[ 0, "DESC" ]]' id="tb2" class="table table-bordered table-striped display" cellspacing="0" width="100%">
					<thead class="thead-inverse">
						<tr>
							<th>Matricula</th>
							<th>Nombre</th>
							<th>Paterno</th>
							<th>Materno</th>
							<th>Fehca de Pago</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			
			<div id="div3" class="table-responsive"  style="display: none">
				<table data-order='[[ 0, "DESC" ]]' id="tb3" class="table table-bordered table-striped display" cellspacing="0" width="100%">
					<thead class="thead-inverse">
						<tr>
							<th>Matricula</th>
							<th>Nombre</th>
							<th>Paterno</th>
							<th>Materno</th>
							<th>Faltas</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>