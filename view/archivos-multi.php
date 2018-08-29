<div class="container-fuild" style="padding: 0px 20px 0px 20px;">
	<div id="contenido" class="row">
		<div class="col-md-12"><br>
			<div class="row">
				<div class="col-sm-8">
					<h3>Archivos Multimedia</h3>
				</div>
				<div class="col-sm-4">
					<button onclick="add()" data-toggle="modal" data-target="#md_add" type="button" class="agregar btn pull-right btn-primary sin-padding"><i
						 class="fa fa-plus"></i> Agregar</button>
				</div>
			</div>
			<br>
			<div id="tb1" class="table-responsive">
				<table data-order='[[ 0, "DESC" ]]' id="tb" class="table table-bordered table-striped display dataTable no-footer" cellspacing="0"
				 width="100%">
					<thead class="thead-inverse">
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Categoria</th>
							<th>Tipo</th>
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
	<div class="modal fade" id="md_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tituloModal">Formulario Archivos Multimedia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="formGuardar" enctype="multipart/form-data">
					<div class="modal-body">
						<input class="form-control" id="accion" type="hidden" name="task" value="agregar">
						<input class="form-control" id="id" type="hidden" name="id" value="">
						<div class="form-group">
							<label>Nombre: </label>
							<input class="form-control" required="" type="text" name="nombre" value="" id="nombre">
						</div>
						<div class="form-group">
							<label for="ap1">Descripción: </label>
							<textarea rows="4" cols="50" class="form-control" required="" name="descrip" value="" id="descrip"></textarea>
						</div>
						<div class="form-group" id="cat">
							<label for="nombre">Categoria: </label>
							<select class="form-control" name="idCat" value="" id="cats">

							</select>
						</div>
						<div class="form-group">
							<label for="nombre">Tipo: </label>
							<select class="form-control" name="tipo" id="tipo" >
								<option value="pdf">PDF</option>
								<option value="video">Video</option>
								<option value="imagen">Imagen</option>
							</select>
						</div>
						<div class="form-group" id="url">
							<label>URL de YouTube: </label>
							<label for="">( Ej: https://www.youtube.com/watch?v=fmI_Ndrxy14 )</label>
							<input class="form-control" required="" type="text" name="url" value="" id="urlin">
						</div>
						<div class="form-group" id="archivo">
							<label>Archivo: </label>
							<input class="form-control" type="file" name="img" value="">
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

	
<!-- Eliminar -->

<div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
	  <form id="formEliminar">  
		  <input class="form-control" id="accion" type="hidden" name="task" value="eliminar">
		  <input class="form-control" type="hidden" name="id" value="" id="idDel">	
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