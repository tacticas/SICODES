<div class="container-fuild" style="padding: 0px 20px 0px 20px;">
	<div id="contenido" class="row">
		<div class="col-md-12"><br>
			<div class="row">
				<div class="col-sm-8">
					<h3>Alta de Tareas</h3>
				</div>
				<div class="col-sm-4">
					<button data-toggle="modal" data-target="#editar" type="button" class="agregar btn pull-right btn-primary sin-padding"><i class="fa fa-plus"></i> Agregar</button>
				</div>
			</div>						
			<br>
			<div class="table-responsive">
				<table data-order='[[ 0, "DESC" ]]' id="example" class="table table-bordered table-striped display" cellspacing="0" width="100%">
								<thead class="thead-inverse">
										<tr>
											<th>id</th>
											<th>idGrupo</th>
											<th>Grupo</th>
											<th>idProfesor</th>
											<th>Profesor</th>
											<th>Tema</th>
											<th>Descripción</th>
											<th>Tipo</th>
											<th>archivo</th>
											<th>Fecha de Entrega</th>
											<th>Status</th>
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
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tituloModal">Editar registro</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="formGuardar" enctype="multipart/form-data">
				<div class="modal-body">
					<input class="form-control" id="accion" type="hidden" name="task" value="">
					<input class="form-control" type="hidden" name="idTarea" value="" id="idTarea">
					<input class="form-control" required=""  type="hidden" name="idProfesor" value="" id="idProfesor">
					<div class="form-group">
						<label for="escuela">Grupo:</label>
						<select class="form-control" id="grupo" name="idGrupo" value="">
						</select>
					</div>
							<div class="form-group ">
								<label for="nombre" >Tema: </label>
								<input class="form-control" required=""  type="text" name="tema" value="" id="tema">
							</div>
							<div class="form-group">
								<label for="ap1" >Descripción: </label>
								<textarea rows="4" cols="50" class="form-control" required="" name="descrip" value="" id="descrip"></textarea>
							</div>
							<label class="form-group" for="">Tipo de Tarea</label>
							<fieldset class="form-group">
								<div class="row">
									<legend class="col-form-label col-sm-2 pt-0"></legend>
									<div class="col-sm-10">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="tipo" id="rb1" value="1" checked>
											<label class="form-check-label" for="rb1">
												Archivo (PDF,Word)
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="tipo" id="rb2" value="2">
											<label class="form-check-label" for="rb2">
												Imagen
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="tipo" id="rb3" value="3">
											<label class="form-check-label" for="rb3">
												Audio
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="tipo" id="rb4" value="4">
											<label class="form-check-label" for="rb4">
												Texto
											</label>
										</div>
									</div>
								</div>
							</fieldset>
							<div class="form-group">
								<label for="" >Material de Apoyo: </label>
								<input class="form-control"  type="file" name="archivo" value="" id="archivo">
							</div>
							<label class="form-group" for="">Fecha y Hora de Entrega</label>
							<div class="form-group">
								<label for="" >Fecha: </label>
								<input class="form-control" required=""  type="date" name="fecha" value="" id="fecha">
							</div>
							<div class="form-group">
								<label for="" >Hora: </label>
								<input class="form-control" required=""  type="time" name="hora" value="" id="hora">
							</div>

					 	</div>
							<div class="modal-footer">
								<input data-dismiss="modal" type="reset" class="btn btn-secondary" value="Cancelar">
								<button type="submit" id="enviar" class="btn btn-primary">Enviar</button>
						</div>
			 </form>
		</div>
	</div>
</div>


<!-- Eliminar -->

<div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<form id="formEliminar">  
			<input class="form-control" id="accion" type="hidden" name="task" value="eliminar">
		<input class="form-control" type="hidden" name="idTarea" value="" id="id">	
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>¿Desea Eliminar este elemento?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Eliminar</button>
			</div>
		</form>
		</div>
	</div>
</div>