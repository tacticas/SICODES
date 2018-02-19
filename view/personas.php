<div class="container">
	<div id="contenido" class="row">
		<div class="col-md-12"><br>
			<div class="row">
				<div class="col-sm-8">
					<h3>Lista de Usuarios</h3>
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
										<th>Matricula</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Apellido</th>
										<th>Correo</th>
										<th>Teléfono</th>
										<th>Escuela</th>
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
			        		<input class="form-control" type="hidden" name="idUsuario" value="" id="idusuario">
			        		<div class="form-group">
								<label for="nombre" >Matricula: </label>
								<input class="form-control" required="" type="text" name="matricula" value="" id="matricula">
							</div>
							<div class="form-group ">
								<label for="nombre" >Nombre: </label>
								<input class="form-control" required=""  type="text" name="nombre" value="" id="nombre">
							</div>
							<div class="form-group">
								<label for="ap1" >Pimer Apellido: </label>
								<input class="form-control" required="" type="text" name="apPaterno" value="" id="ap1">
							</div>
							<div class="form-group">
								<label for="ap2" >Segundo Apellido: </label>
								<input class="form-control" required="" type="text" name="apMaterno" value="" id="ap2">
							</div>
							<div class="form-group">
								<label for="mail" >Correo Electrónico: </label>
								<input class="form-control" required="" type="email" name="eMail" value="" id="mail">
							</div>
							<div class="form-group">
								<label for="tel" >Teléfono: </label>
								<input class="form-control" required="" type="number" name="telefono" value="" id="tel">
							</div>
							<div class="form-group">
								<label for="contra" >Contraseña: </label>
								<input class="form-control" required="" type="text" name="contrasena" value="" id="contra">
							</div>
							<div class="form-group">
							    <label for="escuela">Escuela:</label>
							    <select class="form-control" id="escuela" name="idEscuela" value="">
							      <option value="1">1</option>
							      <option value="2">2</option>
							      <option value="3">3</option>
							    </select>
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
		<input class="form-control" type="hidden" name="idUsuario" value="" id="idusuario">	
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