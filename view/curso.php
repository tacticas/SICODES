<div class="container">
	<div id="contenido" class="row">
		<div class="col-md-12"><br>
			<div class="row">
				<div class="col-sm-8">
					<h3>Lista de Cursos</h3>
				</div>
				<div class="col-sm-4">
					<button data-toggle="modal" data-target="#editar" type="button" class="agregar btn pull-right btn-primary sin-padding"><i class="fa fa-plus"></i> Agregar</button>
				</div>
			</div>						
			<br>
			<div id="tb" class="table-responsive">
					<table data-order='[[ 0, "DESC" ]]' id="example" class="table table-bordered table-striped display" cellspacing="0" width="100%">
				        <thead class="thead-inverse">
				            <tr>
											<th>id</th>
											<th>Nombre</th>
											<th>Descripción</th>
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
      		<form id="formGuardar">
      			<div class="modal-body">
			   		<input class="form-control" id="accion" type="hidden" name="task" value="">
			   		<input class="form-control" type="hidden" name="idCurso" value="" id="idCurso">
			   		<div class="form-group">
						<label for="nombre" >Nombre de Curso: </label>
						<input class="form-control" required="" type="text" name="nombre" value="" id="nombre">
					</div>
					<div class="form-group">
						<label for="ap1" >Descripción: </label>
						<textarea rows="4" cols="50" class="form-control" required="" name="descrip" value="" id="descrip"></textarea>
					</div>
			    </div>
			    <div class="modal-footer">
				   	<input data-dismiss="modal" type="reset" class="btn btn-secondary" value="Cancelar">
				   	<button type="submit" id="enviarUsuario" class="btn btn-primary">Enviar</button>
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
		<input class="form-control" type="hidden" name="idCurso" value="" id="idCurso">	
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

<!--- Horario modal----->
<!-- Modal -->
<div class="modal fade" id="md_horario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
   		<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" id="tituloModalh">Horario del Curso</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<form id="formGuardar">
      			<div class="modal-body col-sm-12">
					<div class="form-group">
						<input class="form-control" id="accionh" type="hidden" name="task" value="">
						<input class="form-control" type="hidden" name="idCurso" value="" id="idCurso">
					</div>	
					<div class="form-group">
						<label for="nombre" >Selecciona los Días: </label>
						<div class="table-responsive">
							<table class="table table-sm table-bordered">
								<thead>
									<th>Lunes</th>
									<th>Martes</th>
									<th>Miercoles</th>
									<th>Jueves</th>
									<th>Viernes</th>
									<th>Sabado</th>
									<th>Domingo</th>
								</thead>
								<tbody>
									<tr>
										<td><input class="position-static" type="checkbox" id="blankCheckbox" value="option1"></td>
										<td><input class="position-static" type="checkbox" id="blankCheckbox" value="option1"></td>
										<td><input class="position-static" type="checkbox" id="blankCheckbox" value="option1"></td>
										<td><input class="position-static" type="checkbox" id="blankCheckbox" value="option1"></td>
										<td><input class="position-static" type="checkbox" id="blankCheckbox" value="option1"></td>
										<td><input class="position-static" type="checkbox" id="blankCheckbox" value="option1"></td>
										<td><input class="position-static" type="checkbox" id="blankCheckbox" value="option1"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
			
					<div class="form-group row">
						<div class=col-sm-2>
							<label for="nombre" >Lunes: </label>
						</div>
						<div class="col-sm-5">
							<label for="nombre" >Inicio: </label>
							<select name="" id="">
								<option value="07:00:00">7:00 AM</option>
							</select>
						</div>
						<div class="col-sm-5">
							<label for="nombre" >Fin: </label>
							<select name="" id="">
								<option value="07:00:00">7:00 AM</option>
							</select>
						</div>
					</div>
			    </div>
			    <div class="modal-footer">
				   	<input data-dismiss="modal" type="reset" class="btn btn-secondary" value="Cancelar">
				   	<button type="submit" id="enviarUsuario" class="btn btn-primary">Enviar</button>
				</div>
			</form>
    	</div>
  	</div>
</div>
