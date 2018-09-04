<input type="number" id="session" value="<?=$_SESSION['idMaster']?>" hidden>
<div class="container">
    <div id="contenido" class="row">
        <div class="col-md-12"><br>
            <div class="row">
                <div class="col-sm-8">
                    <h3>Mensajes</h3>
                </div>
                <div class="col-sm-4">
                    <button data-toggle="modal" onclick="add(this)" data-target="#md_add" type="button" class="agregar btn pull-right btn-primary sin-padding"><i
                            class="fa fa-envelope"></i> New</button>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table data-order='[[ 0, "DESC" ]]' id="mensaje" class="table table-bordered table-striped display" cellspacing="0" width="100%">
                    <thead class="thead-inverse">
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Title</th>
                            <th>Date</th>
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
                    <h5 class="modal-title" id="tituloModal"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="form_v" class="modal-body">
                    <form id="formGuardar">
                        <input class="form-control" type="hidden" name="tx" value="<?=$_SESSION['idMaster']?>" id="id">
                        <input class="form-control" type="hidden" name="task" value="agregar" id="accion">
                        <div class="form-group">
                            <label for="tipo">Type:</label>
                            <select class="form-control" id="tipo" name="tipo" value="">
                                <option value="2">Teacher</option>
                                <option value="1">Student</option>
                                <option value="4">Admin</option>
                                <option value="6">Super Admin</option>
                            </select>
                        </div>
                        <div id="d_user" class="form-group">
                            <label for="">User:</label>
                            <select class="form-control" id="idAlumno" name="rx" value="">

                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="nombre">Title: </label>
                            <input class="form-control" required="" type="text" name="titulo" value="" id="titulo">
                        </div>
                        <div class="form-group">
                            <label for="ap1">Text: </label>
                            <textarea rows="4" cols="50" class="form-control" required="" name="msg" value="" id="msg"></textarea>
                        </div>
                </div>
                
                <div id="msg_v" class="modal-body">
                        <h5>From:</h5>
                        <div id="m_from"></div><br>
                        <h5>Title:</h5>
                        <div id="m_title"></div><br>
                        <h5>Message:</h5>
                        <div id="m_msg"></div>
                </div>
                <div class="modal-footer">
                        <input data-dismiss="modal" type="reset" class="btn btn-secondary" value="Cancelar">
                        <button type="submit" id="enviarUsuario" class="btn btn-primary">Send</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>

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
                        <p>Do you want to Delete this item?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>