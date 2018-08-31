<div class="container-fuild" style="padding: 0px 20px 0px 20px;">
	<div id="contenido" class="row">
		<div class="col-md-12"><br>
			<div class="row">
				<div class="col-sm-8">
					<h3>Calendar</h3>
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
				
					<div class="row">
						<div class="form-group col-md-8">
							<label for="">Start:</label>
							<input type="date" name="start" id="start" class="form-control" disabled>
						</div>
						<div class="form-group col-md-4">
							<label for="">.</label>
							<div class="input-group clockpicker" data-autoclose="true">
								<input type="text" name="startH" id="startH" class="form-control" disabled>
							</div>
						</div>
					</div>
					<div class="row">
							<div class="form-group col-md-8">
								<label for="">End:</label>
								<input type="date" name="end" id="end" class="form-control" disabled>
							</div>
							<div class="form-group col-md-4">
								<label for="">.</label>
								<div class="input-group clockpicker" data-autoclose="true">
									<input type="text" name="endH" id="endH" class="form-control" disabled>
								</div>
							</div>
						</div>

				
				
					<div id="descrip">
					
					</div>
					
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>

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