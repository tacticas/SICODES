<div class="container" style="padding: 0px 20px 0px 20px;">
	<div id="contenido" class="row">
		<div class="col-md-12"><br>
			<div class="row">
				<div class="col-sm-8">
					<h3>Avance Diario</h3>
				</div>
				<div class="col-sm-4">
				</div>
			</div>
			<br>
			<br>
			<div id="tb" class="table-responsive">
				<table data-order='[[ 0, "DESC" ]]' id="tb1" class="table table-bordered table-striped display dataTable no-footer" cellspacing="0"
				 width="100%">
					<thead class="thead-inverse">
						<tr>
							<th>Matricula</th>
							<th>Nombre</th>
							<th>Grupo</th>
							<th>Dia</th>
							<th>Registro</th>
							<th></th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
	<br>
	<br>
	<!-- Modal General -->
	<div class="modal fade" id="general" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form id="formGeneral">
					<input class="form-control" id="accion" type="hidden" name="task" value="general">
					<input class="form-control" type="hidden" name="id" value="" id="idListaG">
					<input class="form-control" type="hidden" name="num_lesson" value="" id="num_lesson">
					<input class="form-control" type="hidden" name="idAvance" value="" id="idAvance">
					
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Llenado de Avance General</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div>
							<label for="">Lección Actual</label>
							<div id="leccionActual"></div>
						</div>
						<div class="form-group">
							<label for="">Lección:</label>
							<Select id="sel_lec" class="form-control" name="lesson">
								<option id="actual" value="0">Lección Actual</option>
								<option id="lecNew" value="1">Nueva Lección</option>
								<option id="lecIni" value="2">Lección Inicial</option>
							</Select>
						</div>
						<div class="form-group">
							<label for="">Fecha: </label>
							<input type="date" id="date"  name="date" class="form-control">
						</div>
						<label for="">Libro: </label><br>
						<div class="form-check-inline">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" value="0" id="rl0" name="book"> No entregado
							</label>
						</div>
						<div class="form-check-inline">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" value="1" id="rl1" name="book"> Entregado
							</label>
						</div>
						<div class="form-check-inline disabled">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" value="2" id="rl0" name="book"> Terminado
							</label>
						</div>
						<br><br>
						<label for="">Dictado: </label><br>
						<div class="form-check-inline">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" value="0" id="rd0" name="dictation"> No entregado
							</label>
						</div>
						<div class="form-check-inline">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" value="1" id="rd1" name="dictation"> Entregado
							</label>
						</div>
						<div class="form-check-inline disabled">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" value="2" id="rd2" name="dictation"> Terminado
							</label>
						</div>
						<br><br>
						<div class="form-group">
							<input type="checkbox" id="ch_quiz"><label for="">Quiz: </label>
							<input type="number" id="in_quiz" disabled name="quiz" class="form-control">
						</div>
						<div class="form-group">
							<input type="checkbox" id="ch_test"><label for="">Test: </label>
							<input type="number" id="in_test" disabled name="test"  class="form-control">
						</div>
						<div class="form-group">
							<input type="checkbox" id="ch_oral"><label for="">Oral Quiz: </label>
							<input type="number" id="in_oral" disabled name="oral_quiz" class="form-control">
						</div>
						<div class="form-group">
							<input type="checkbox" id="ch_oralt"><label for="">Oral Test: </label>
							<input type="number" id="in_oralt" disabled name="oral_test"  class="form-control">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Registrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal Diario -->
	<div class="modal fade" id="diario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form id="formDiario">
					
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Lenado de Avance Diario</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<input class="form-control" id="accion" type="hidden" name="task" value="diario">
					<input class="form-control" type="hidden" name="id" value="" id="idListaD">
					<div class="modal-body">
						<div class="form-group">
							<input type="checkbox" id="ch_home"><label for=""> Homework:</label>
							<input class="form-control" disabled  type="number" name="homework" id="homework">
						</div>
						<div class="form-group">
							<input type="checkbox" id="ch_read"><label for=""> Reading:</label>
							<input class="form-control" disabled type="number" name="reading" id="reading">
						</div>
						<div class="form-group">
							<input type="checkbox" id="ch_writ"><label for=""> Writing:</label>
							<input class="form-control" disabled type="number" name="writing" id="writing">
						</div>
						<div class="form-group">
							<input type="checkbox" id="ch_spea"><label for=""> Speaking:</label>
							<input class="form-control" disabled type="number" name="speaking" id="speaking">
						</div>
						<div class="form-group">
							<input type="checkbox" id="ch_list"><label for="">  Listening:</label>
							<input  class="form-control" disabled type="number" name="listening" id="listening">
						</div>
						<div class="form-group">
							<label for="">Notas:</label>
							<textarea class="form-control" name="notes" id="" cols="30" rows="4"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Registrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>