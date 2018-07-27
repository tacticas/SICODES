<div class="container">
	<div id="contenido" class="row">
		<div class="col-md-12"><br>
			<div class="row">
				<div class="col-sm-8">
					<h3>DashBoard</h3>
                    <h4>Bienvenido <?=$_SESSION['idMaster'];?></h4>
                    <h4>Bienvenido <?=$_SESSION['permiso'];?></h4>
                    <table class="table table-bordered table-striped display dataTable no-footer">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Módulos</th>
                                <th>Proceso</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="warning">
                                <td>Alumnos</td>
                                <td>Agregar Alumno</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Editar Información</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Eliminar Alumnos</td>
                            </tr>
                            <tr>
                                <td>Cursos</td>
                                <td>Agregar Cursos</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Editar Información</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Eliminar Cursos</td>
                            </tr>
                            <tr>
                                <td>Grupos</td>
                                <td>Agregar Grupos</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Editar Grupos</td>
                            </tr>   
                            <tr>
                                <td></td>
                                <td>Eliminar Grupos</td>
                            </tr>  
                            <tr>
                                <td>Grupos -> Alumnos</td>
                                <td>Ver Lista de Alumnos por Grupo</td>
                            </tr> 
                            <tr>
                                <td>Grupos -> Alumnos</td>
                                <td>Agreagr Alumnos a Grupo</td>
                            </tr>    
                            <tr>
                                <td>Grupos -> Alumnos</td>
                                <td>Eliminar alumnos de Grupo</td>
                            </tr>                                                   
                        </tbody>
                    </table>
                
                </div>
				
				
			</div>						
		</div>
	</div>
</div>