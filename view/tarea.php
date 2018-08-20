<div class="container-fuild" style="padding: 0px 20px 0px 20px;">
	<div id="contenido" class="row">
		<div class="col-md-12"><br>
			<div class="row">
				<div class="col-sm-8">
					<h3>Homework</h3>
				</div>
				<div class="col-sm-4">
					<button data-toggle="modal" data-target="#editar" type="button" class="agregar btn pull-right btn-primary sin-padding"><i class="fa fa-plus"></i> Add</button>
				</div>
			</div>						
			<br>
			<div id="tb" class="table-responsive">
				<table data-order='[[ 0, "DESC" ]]' id="example" class="table table-bordered table-striped display dataTable no-footer" cellspacing="0" width="100%">
					<thead class="thead-inverse">
						<tr>
							<th>id</th>
							<th>idGrupo</th>
							<th>Group</th>
							<th>idProfesor</th>
							<th>Scope</th>
							<th>Topic</th>
							<th>Description</th>
							<th>Skill</th>
							<th>archivo</th>
							<th>Date</th>
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
				<h5 class="modal-title" id="tituloModal">Edit</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="formGuardar" enctype="multipart/form-data">
				<div class="modal-body">
					<input class="form-control" id="accion" type="hidden" name="task" value="">
					<input class="form-control" type="hidden" name="idTarea" value="" id="idTarea">
					<input class="form-control" required=""  type="hidden" name="idProfesor" value="<?=$_SESSION['idMaster'];?>" id="idProfesor">
					<div class="form-group">
						<label for="escuela">Scope:</label>
						<select class="form-control" id="alcance" name="alcance" value="">
							<option value="n">Group</option>
							<option value="1">Indivudual</option>
						</select>
					</div>
					<div class="form-group">
						<label for="escuela">Grupo:</label>
						<select class="form-control" id="grupo" name="idGrupo" value="">
						<option selected value="">Select a group</option>
						</select>
					</div>
					<div class="form-group" id="divAlumno" >
						<label for="nombre" >Student: </label>
						<select class="form-control" id="idAlumno" name="idAlumno" value="">
						<option selected value="">Select a student</option>
						</select>
					</div>
							<div class="form-group ">
								<label for="nombre" >Topic: </label>
								<input class="form-control" required=""  type="text" name="tema" value="" id="tema">
							</div>
							<div class="form-group">
								<label for="ap1" >Description: </label>
								<textarea rows="4" cols="50" class="form-control" required="" name="descrip" value="" id="descrip"></textarea>
							</div>
							<label class="form-group" for="">Skill</label>
							<fieldset class="form-group" id="radios">
								<div class="row">
									<legend class="col-form-label col-sm-2 pt-0"></legend>
									<div class="col-sm-10">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="tipo" id="rb1" value="1" checked>
											<label class="form-check-label" for="rb1">
												Speaking
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="tipo" id="rb2" value="2">
											<label class="form-check-label" for="rb2">
											Reading
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="tipo" id="rb3" value="3">
											<label class="form-check-label" for="rb3">
												Writing
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="tipo" id="rb4" value="4">
											<label class="form-check-label" for="rb4">
												Listening(dictation)
											</label>
										</div>
									</div>
								</div>
							</fieldset>
							<div class="form-group">
								<label for="" > Support files: </label>
								<input class="form-control"  type="file" name="foto" value="" id="foto" accept="image/png, image/jpeg, application/pdf, application/msword, audio/*">
							</div>
							<div class="form-group"id="divtextoDi" >
								<label for="ap1" >Text for dictation: </label>
								<textarea id="textoDi" rows="4" cols="50" class="form-control" name="textoDi" value="" ></textarea>
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
				<p>¿Do you want to delete this item?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
		</div>
	</div>
</div>