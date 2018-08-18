<div class="container-fuild" style="padding: 0px 20px 0px 20px;">
	<div id="contenido" class="row">
		<div class="col-md-12"><br>
			<div class="row">
				<div class="col-sm-8">
					<h3>My Homework</h3>
				</div>
				

			</div>						
			<br>
			
			<div class="col-sm-12 b-azul">
				<h3>Pending Homeworks</h3>
				<hr>
				<h4>Group</h4>
				<div id="tb" class="table-responsive">
					<table data-order='[[ 0, "DESC" ]]' id="example" class="table table-bordered table-striped display dataTable no-footer" cellspacing="0" width="100%">
						<thead class="thead-inverse">
							<tr>
								<th>Group</th>
								<th>Topic</th>
								<th>Description</th>
								<th>Skill</th>
								<th>Date</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
					</table>
				</div>
				<br><br>
				<h4>Individual</h4>
				<div id="tb" class="table-responsive">
					<table data-order='[[ 0, "DESC" ]]' id="indi" class="table table-bordered table-striped display dataTable no-footer" cellspacing="0" width="100%">
						<thead class="thead-inverse">
							<tr>
								<th>Group</th>
								<th>Topic</th>
								<th>Description</th>
								<th>Skill</th>
								<th>Date</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
					</table>
				</div>
			</div>	
			<br><br>
			<div class="col-sm-12 b-azul">
				<h3>Completed Homework</h3>
				<hr>
				<div id="tb" class="table-responsive">
					<table data-order='[[ 5, "DESC" ]]' id="real" class="table table-bordered table-striped display dataTable no-footer" cellspacing="0" width="100%">
						<thead class="thead-inverse">
							<tr>
								<th>Group</th>
								<th>Topic</th>
								<th>Description</th>
								<th>Skill</th>
								<th>Date</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
					</table>
				</div>
				
			</div>
		</div>
	</div>
<br>
<br>
<!-- Modal -->
<div class="modal fade" id="md_hablar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tituloModal">Record</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<form id="formGuardar" enctype="multipart/form-data">
				<div class="modal-body">
					<input class="form-control" id="accion1" type="hidden" name="task" value="agregar">
					<input class="form-control" type="hidden" name="idTarea" value="" id="idTarea">
					<input class="form-control" required=""  type="hidden" name="idAlumno" value="<?=$_SESSION['idMaster']?>" id="idAlumno">
					<div class="form-group">
						<label for="">Recorder:</label>
						<button class="btn btn-primary form-control" onclick="startRecording(this);"><i class="fa fa-microphone"></i> Grabar</button>
						<button class="btn btn-danger form-control" onclick="stopRecording(this);" disabled><i class="fa fa-pause"></i> Detener</button>
						<br><br>
						<label for="ap1" >Recording: </label>
						<ul class="" id="recordingslist"></ul>
						<pre id="log"></pre>
					</div>
					<div class="form-group">
						<label for="ap1" >Answer: </label>
						<textarea id="textoDi" rows="4" cols="100" class="form-control" name="respuesta" value="" ></textarea>
					</div>
				</div>
					<!--
					<div class="form-group">
						<label for="" >Subir Archivo( Si es necesario): </label>
						<input class="form-control"  type="file" name="audio" value="" id="audio" accept="audio/wav">
					</div>
					-->
				 	<div class="modal-footer">
						<input data-dismiss="modal" type="reset" class="btn btn-secondary" value="Cancelar">
						<button type="submit" id="enviar" class="btn btn-primary">Enviar</button>
					</div>
			 </form>
		</div>
	</div>
</div>

<!--- Modal para Dictado ---->

<div class="modal fade bd-example-modal-lg" id="md_dictado" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Listen and Fill</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form id="formDictado" class="form-row" >
	  		<input class="form-control" id="accion2" type="hidden" name="task" value="dictado">
			<!--<input class="form-control" type="hidden" name="idTarea" value="" id="idTarea">-->
			<input class="form-control" required=""  type="hidden" name="idAlumno" value="<?=$_SESSION['idMaster']?>" id="idAlumno">
			<div class="form-group">
				<label for="">Audio</label>
				<audio id="audio" class="" src="" controls="controls" type="audio/*" preload="preload">
				</audio>
			</div>
			<hr>
			<h5>Full, if you do not know the answer, put a "?"</h5>
			<br>
			<progress id="barra" max="10" value="0" ></progress>
			<br>
			<br>
			<div id="campos" class="">
			
			</div>
			<input id="texto" name="respuesta" type="hidden">
			
      </div>
      <div class="modal-footer">
	  		<input data-dismiss="modal" type="reset" class="btn btn-secondary" value="Cancelar">
			<button type="submit" id="enviar" class="btn btn-primary">Submit</button>
	  </div>
	  </form>
    </div>
  </div>
</div>

<!-- Modal las 2 tareas  -->
<div class="modal fade" id="md_otros" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tituloModalO">Answer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="FormOtro" enctype="multipart/form-data">
			<div class="modal-body">
				<input class="form-control" id="accion3" type="hidden" name="task" value="agregar">
				<input class="form-control" type="hidden" name="idTarea" value="" id="idTareao">
				<input class="form-control" required=""  type="hidden" name="idAlumno" value="<?=$_SESSION['idMaster']?>" id="idAlumno">
				<div class="form-group" id="descargas">
					
				</div>
				<div class="form-group">
					<label for="ap1" >Answer: </label>
					<textarea id="textoDi" rows="4" cols="100" class="form-control" name="respuesta" value="" ></textarea>
				</div>
				<div class="form-group">
					<label for="" >Upload File (If necessary): </label>
					<input class="form-control"  type="file" name="data" value="" id="audio" accept="image/png, image/jpeg, application/pdf, application/msword, audio/*">
				</div>
				<div class="modal-footer">
					<input data-dismiss="modal" type="reset" class="btn btn-secondary" value="Cancelar">
					<button type="submit" id="enviar" class="btn btn-primary">Submit</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>

<!--editar  xxxxxxxxxxxxxxxxxx--> 
<div class="modal fade" id="md_otrosE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tituloModalO">Edit Answer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="FormOtroE" enctype="multipart/form-data">
			<div class="modal-body">
				<input class="form-control" id="accion3" type="hidden" name="task" value="editar">
				<input class="form-control" id="respTexto" type="hidden" name="idAlumnoTarea" value="">
				<input class="form-control" type="hidden" name="idTarea" value="" id="idTareao">
				<input class="form-control"  required=""  type="hidden" name="idAlumno" value="<?=$_SESSION['idMaster']?>" id="idAlumno">
				<div class="form-group" id="descargas">
					
				</div>
				<div class="form-group">
					<label for="ap1" >Answer: </label>
					<textarea id="texto1" rows="4" cols="100" class="form-control" name="respuesta" value="" ></textarea>
				</div>
				<div class="form-group">
					<label for="" >Upload File (If necessary): </label>
					<input class="form-control"  type="file" name="data" value="" id="audio" accept="image/png, image/jpeg, application/pdf, application/msword, audio/*">
				</div>
				<div class="modal-footer">
					<input data-dismiss="modal" type="reset" class="btn btn-secondary" value="Cancelar">
					<button type="submit" id="enviar" class="btn btn-primary">Submit</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>

<!--- Modal para Dictado ---->

<div class="modal fade bd-example-modal-lg" id="md_dictadoE" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Listen and Fill</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form id="formDictadoE" class="form-row" >
	  		<input class="form-control" id="accion2" type="hidden" name="task" value="dictadoE">
			<input class="form-control" type="hidden" name="idTarea" value="" id="idTarea">
			<input class="form-control" id="respDictado" type="hidden" name="idAlumnoTarea" value="">
			<input class="form-control" required=""  type="hidden" name="idAlumno" value="<?=$_SESSION['idMaster']?>" id="idAlumno">
			<div class="form-group">
				<label for="">Audio</label>
				<audio id="audio" class="" src="" controls="controls" type="audio/*" preload="preload">
				</audio>
			</div>
			<hr>
			<h5>Full, if you do not know the answer, put a "?"</h5>
			<br>
			<progress id="barraE" max="10" value="0" ></progress>
			<br>
			<br>
			<div id="camposE" class="">
			
			</div>
			<input id="texto" name="respuesta" type="hidden">
			
      </div>
      <div class="modal-footer">
	  		<input data-dismiss="modal" type="reset" class="btn btn-secondary" value="Cancelar">
			<button type="submit" id="enviar" class="btn btn-primary">Submit</button>
	  </div>
	  </form>
    </div>
  </div>
</div>

<!-- Modal record -->
<div class="modal fade" id="md_hablarE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tituloModal">Edit Record</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<form id="formGuardarE" enctype="multipart/form-data">
				<div class="modal-body">
					<input class="form-control" id="accion1" type="hidden" name="task" value="Editar">
					<input class="form-control" type="hidden" name="idTarea" value="" id="idTarea">
					<input class="form-control" id="respGrabar" type="hidden" name="idAlumnoTarea" value="">
					<input class="form-control" required=""  type="hidden" name="idAlumno" value="<?=$_SESSION['idMaster']?>" id="idAlumno">
					<div class="form-group">
						<label for="">Recorder:</label>
						<button class="btn btn-primary form-control" onclick="startRecording(this);"><i class="fa fa-microphone"></i> Grabar</button>
						<button class="btn btn-danger form-control" onclick="stopRecording(this);" disabled><i class="fa fa-pause"></i> Detener</button>
						<br><br>
						<label for="ap1" >Recording: </label>
						<ul class="" id="recordingslist"></ul>
						<pre id="log"></pre>
					</div>
					<div class="form-group">
						<label for="ap1" >Answer: </label>
						<textarea id="texto2" rows="4" cols="100" class="form-control" name="respuesta" value="" ></textarea>
					</div>
				</div>
					<!--
					<div class="form-group">
						<label for="" >Subir Archivo( Si es necesario): </label>
						<input class="form-control"  type="file" name="audio" value="" id="audio" accept="audio/wav">
					</div>
					-->
				 	<div class="modal-footer">
						<input data-dismiss="modal" type="reset" class="btn btn-secondary" value="Cancelar">
						<button type="submit" id="enviar" class="btn btn-primary">Submit</button>
					</div>
			 </form>
		</div>
	</div>
</div>