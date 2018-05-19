<div class="container-fuild" style="padding: 0px 20px 0px 20px;">
	<div id="contenido" class="row">
		<div class="col-md-12"><br>
			<div class="row">
				<div class="col-sm-8">
					<h3>Lista de Alumnos</h3>
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
											<th>Foto</th>
											<th>Matricula</th>
											<th>Contraseña</th>
											<th>Nombre</th>
											<th>Paterno</th>
											<th>Materno</th>
											<th>Correo</th>
											<th>Nacimiento</th>
											<th>Sexo</th>
											<th>Dirección</th>
											<th>Teléfono</th>
											<th>Celular</th>
											<th>Meta</th>
											<th>Evaluación</th>
											<th>Curso Inicial</th>
											<th>FechaPago</th>
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
      <form id="formGuardar" enctype="multipart/form-data">
      				<div class="modal-body">
			        		<input class="form-control" id="accion" type="hidden" name="task" value="">
			        		<input class="form-control" type="hidden" name="idAlumno" value="" id="idAlumno">
			        		<div class="form-group">
								<label for="nombre" >Matricula: </label>
								<input class="form-control" required="" type="text" name="matricula" value="" id="matricula">
							</div>
							<div class="form-group ">
								<label for="nombre" >Contraseña: </label>
								<input class="form-control" required=""  type="password" name="contraseña" value="" id="contraseña">
							</div>
							<div class="form-group ">
								<label for="nombre" >Nombre: </label>
								<input class="form-control" required=""  type="text" name="nombre" value="" id="nombre">
							</div>
							<div class="form-group">
								<label for="ap1" >Pimer Apellido: </label>
								<input class="form-control" required="" type="text" name="ap1" value="" id="ap1">
							</div>
							<div class="form-group">
								<label for="ap2" >Segundo Apellido: </label>
								<input class="form-control" required="" type="text" name="ap2" value="" id="ap2">
							</div>
							<div class="form-group">
								<label for="mail" >Correo Electrónico: </label>
								<input class="form-control" required="" type="email" name="email" value="" id="email">
							</div>
							<div class="form-group">
								<label for="tel" >Fecha de Nacimiento: </label>
								<input class="form-control" required="" type="date" name="fnac" value="" id="fnac">
							</div>
							<div class="form-group">
							    <label for="escuela">Sexo:</label>
							    <select class="form-control" id="sexo" name="sexo" value="">
							      <option value="Masculino">Masculino</option>
							      <option value="Femenino">Femenino</option>
										<option value="Otro">Otro</option>
							    </select>
							</div>
							<div class="form-group">
								<label  >Foto: </label>
								<input class="form-control" required="" type="file" name="foto" value="" id="foto">
							</div>
							<div class="form-group">
								<label >Dirección: </label>
								<input class="form-control" required="" type="text" name="dir" value="" id="dir">
							</div>
							<div class="form-group">
								<label for="tel" >Teléfono: </label>
								<input class="form-control" required="" type="number" name="tel" value="" id="tel">
							</div>
							<div class="form-group">
								<label for="tel" >Celular: </label>
								<input class="form-control" required="" type="number" name="cel" value="" id="cel">
							</div>
							<div class="form-group">
								<label for="tel" >Meta: </label>
								<input class="form-control" required="" type="text" name="meta" value="" id="meta">
							</div>
							<div class="form-group">
								<label for="tel" >Evaluación: </label>
								<input class="form-control" required="" type="text" name="evaluacion" value="" id="evaluacion">
							</div>
							<div class="form-group">
								<label for="tel" >Curso Inicial: </label>
								<input class="form-control" required="" type="text" name="cursoInicio" value="" id="cursoInicio">
							</div>
							<div class="form-group">
								<label for="contra" >Fecha de Pago: </label>
								<input class="form-control" required="" type="date" name="fechaPago" value="" id="fechaPago">
							</div>
							<div class="form-group">
							    <label for="escuela">Escuela:</label>
							    <select class="form-control" id="escuela" name="idEscuela" value="">
							    </select>
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
		<input class="form-control" type="hidden" name="idAlumno" value="" id="id">	
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