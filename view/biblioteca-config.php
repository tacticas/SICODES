<div class="container-fuild" style="padding: 0px 20px 0px 20px;">
	<div id="contenido" class="row">
		<div class="col-md-12"><br>
			<div class="row">
				<div class="col-sm-8">
					<h3>Categoría de biblioteca</h3>
				</div>
				<div class="col-sm-4">
					<button data-toggle="modal" data-target="#md_add_categorias" type="button" class="agregar btn pull-right btn-primary sin-padding"><i class="fa fa-plus"></i> Agregar</button>
				</div>
			</div>						
			<br>
			<div id="tb" class="table-responsive">
				<table data-order='[[ 0, "DESC" ]]' id="example" class="table table-bordered table-striped display dataTable no-footer" cellspacing="0" width="100%">
					<thead class="thead-inverse">
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Archivo</th>
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
<div class="modal fade" id="md_add_categorias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tituloModal">Formulario categoría</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="formGuardar" enctype="multipart/form-data">
			<div class="modal-body">
                <input class="form-control" id="accion" type="hidden" name="accion" value="">
                <input class="form-control" id="id" type="hidden" name="id" value="">
                <div class="form-group">
                    <label >Nombre: </label>
                    <input class="form-control" required="" type="text" name="nombre" value="" id="nombre">
                </div>
                <div class="form-group">
                    <label>Foto: </label>
                    <input class="form-control" required="" type="file" name="img" value="" id="img">
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



