<div class="container-fuild" style="padding: 0px 20px 0px 20px;">
	<div id="contenido" class="row">
		<div class="col-md-12"><br>
			<div class="row">
				<div class="col-sm-8">
					<h3>Pase de Lista</h3>
				</div>
				<div class="col-sm-4">
				</div>
			</div>						
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
<div class="modal fade" id="md_revisar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tituloModal"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="formGuardar" enctype="multipart/form-data">
			<div class="modal-body">
					<input class="form-control" id="accion" type="hidden" name="accion" value="">
					<input class="form-control" id="idAlumnoTarea" type="hidden" name="idAlumnoTarea" value="">
					<div class="form-group"id="divtextoDi" >
						<label for="ap1" >Feedback: </label>
						<textarea id="msg" rows="4" cols="50" class="form-control" name="msg" value="" ></textarea>
					</div>
			</div>
			<div class="modal-footer">
				<input data-dismiss="modal" type="reset" class="btn btn-secondary" value="Cancelar">
				<button type="submit" class="btn btn-primary">Enviar</button>
			</div>
			 </form>
		</div>
	</div>
</div>



