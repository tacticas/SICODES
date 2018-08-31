<div class="container-fuild" style="padding: 0px 20px 0px 20px;">
	<div id="contenido" class="row">
		<div class="col-md-12"><br>
			<div class="row">
				<div class="col-sm-8">
					<h3>Calendario</h3>
				</div>
				
			</div>
			<div class="row mt-3">

				<div class="col-sm-12">
					<div id="calendar">

					</div>

				</div>
			</div>


		</div>
	</div>
</div>

<div class="modal fade" id="md_add_event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="add_titulo"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formGuardar">
					<input type="text" name="id" id="idEvent" hidden>
					<input type="text" name="task" id="accion" hidden>
					<div class="row">
						<div class="form-group col-md-8">
							<label for="">Fecha Inicio:</label>
							<input type="date" name="start" id="start" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="">Hora Inicio:</label>
							<div class="input-group clockpicker" data-autoclose="true">
								<input type="text" name="startH" id="startH" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
							<div class="form-group col-md-8">
								<label for="">Fecha Fin:</label>
								<input type="date" name="end" id="end" class="form-control">
							</div>
							<div class="form-group col-md-4">
								<label for="">Hora Fin:</label>
								<div class="input-group clockpicker" data-autoclose="true">
									<input type="text" name="endH" id="endH" class="form-control">
								</div>
							</div>
						</div>

				
					<div class="form-group">
						<label for="">Titulo:</label>
						<input type="text" name="title" id="title" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Descripción:</label>
						<textarea rows="4" name="descrip" id="descrip" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="">Color de Etiqueta:</label>
						<input type="color" name="color" id="color" value="#428bca">
					</div>
					<div class="form-group">
						<label for="">Color de Texto:</label>
						<input type="color" name="textColor" id="textColor" value="#f9f9f9">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button"  onclick="confirm(event)" id="btm_del" class="btn btn-danger">Borar</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button onclick="add(event)" type="submit" class="btn btn-primary">Agregar</button>
			</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="md_del" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="add_titulo"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="formDel">
						<input type="text" name="id" id="idDelt" hidden>
						<input type="text" name="task" value="eliminar" hidden>
						<h3>¿Desea Eliminar este Evento?</h3>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit"  onclick="del(event)" class="btn btn-danger">Borar</button>
				</div>
				</form>
			</div>
		</div>
	</div>