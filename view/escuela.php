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
											<th>Dirección</th>
											<th>Ciudad</th>
											<th>Estado</th>
											<th>País</th>
											<th>Director</th>
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
      <form id="formGuardar" autocomplete="off">
      				<div class="modal-body">
			        		<input class="form-control" id="accion" type="hidden" name="task" value="">
			        		<input class="form-control" type="hidden" name="escuela" value="" id="escuela">
			        		<div class="form-group">
								<label for="nombre" >Nombre de Escuela: </label>
								<input class="form-control" required="" type="text" name="nombre" value="" id="nombre">
							</div>
							<div class="form-group">
								<label for="ap1" >Dirección: </label>
								<input  class="form-control" required="" type="text" name="dir" value="" id="dir">
							</div>
							<div class="form-group">
								<label for="ap1" >Ciudad: </label>
								<input  class="form-control" required="" type="text" name="ciudad" value="" id="ciudad">
							</div>
							<div class="form-group">
								<label for="ap1" >Estado: </label>
								<input  class="form-control" required="" type="text" name="estado" value="" id="estado">
							</div>
							<div class="form-group">
								<label for="ap1" >País: </label>
								<input  class="form-control" required="" type="text" name="pais" value="" id="pais">
							</div>
			     		 <div class="form-group">
								<label for="ap1" >Director: </label>
								<input  class="form-control" required="" type="text" name="director" value="" id="director">
							</div>
			      	<div class="modal-footer">
				      	<input data-dismiss="modal" type="reset" class="btn btn-secondary" value="Cancelar">
				      	<button type="submit" id="enviarUsuario" class="btn btn-primary">Enviar</button>
				    </div>
			 </form>
    </div>
  </div>
</div>
</div>
</div>


<!-- Eliminar -->

<div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="formEliminar">  
    	<input class="form-control" id="accion" type="hidden" name="task" value="eliminar">
		<input class="form-control" type="hidden" name="idEscuela" value="" id="idEscuela">	
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