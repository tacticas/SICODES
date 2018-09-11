<div class="container-1">
    <div class="banner">
        <h1 class="" id="welcome">Good Day!</h1>
    </div>
</div>
<div id="divFechaPago" style="display: none;" class="container-1">
    <div class="banner">
        <h1 class="banner-mini" id="fechaPago"></h1>
    </div>
</div>
<div class="container-1">
    <div class="fondo-blanco box-1">
        <img class=" img-fluid" src="<?=$_SESSION['foto']?>" alt="">
        <div class="fondo-gris">
            <h4 id="matricula" class="matricula p-2">ID: XAVE12</h4>
            <p><strong>Studen: </strong><label for="" id="nombre"><?=$_SESSION['nombre']?></label></p>
            <p><strong>School: </strong><label for="" id="escuela"><?=$_SESSION['Escuela']?></label></p>
            <p><strong>Email: </strong><label for="" id="email"><?=$_SESSION['email']?></label></p>
            <p><strong>Phone: </strong><label for="" id="cel"><?=$_SESSION['cel']?></label></p>
            <button onclick="myInfo()" class="btn btn-primary btn-block mb-2">More about me!</button>
        </div>
    </div>
    <div class="fondo-blanco box-1">
        <h2 class="mini-banner dash-horario">SCHEDULE</h2>
        <div class="sinEspacio table-responsive">
            <table id="tb_horario" class="table table-striped full">
                <thead>
                    <tr>
                        <th>Group</th>
                        <th>Type</th>
                        <th>Start</th>
                        <th>End</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="fondo-blanco box-1">
        <h2 class="mini-banner tareas">HOMEWORK</h2>
        <div class="sinEspacio table-responsive">
            <table id="tb_homework" class="table table-striped full">
                <thead>
                    <tr>
                        <th>Group</th>
                        <th>Scope</th>
                        <th>Topic</th>
                        <th>Skill</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <a class="boton-grande" href="mis-tareas.php"><button class="btn btn-primary btn-block mb-2 ">All homeworks List!
            </button></a>
    </div>

</div>
<div class="container-1">
    <div class="fondo-blanco box-1">
        <h2 class="mini-banner curso">COURSE STATUS</h2>
        <div class="sinEspacio table-responsive">
            <table id="tb_cstatus" class="table">
                <thead>
                    <tr>
                        <th>Group</th>
                        <th>Homework</th>
                        <th>Speaking</th>
                        <th>Reading</th>
                        <th>Writing</th>
                        <th>Listening</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <div class="fondo-blanco box-1">
        <h2 class="mini-banner progres">COURSE PROGRESS</h2>
        <div class="sinEspacio table-responsive">
            <table id="tb_cprogress" class="table">
                <thead>
                    <tr>
                        <th>Group</th>
                        <th>Date</th>
                        <th>Lesson</th>
                        <th>Book</th>
                        <th>Dictation</th>
                        <th>Quiz</th>
                        <th>Test</th>
                        <th>Oral Quiz</th>
                        <th>Oral Test</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>
    <div class="fondo-blanco box-1">
        <h2 class="mini-banner msg">MESSAGES</h2>
        <div class="sinEspacio table-responsive">
            <table id="tb_messages" class="table">
                <thead>
                    <tr>
                        <th>From</th>
                        <th>Subjet</th>
                        <th>Date</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <a class="boton-grande" href="mensaje.php"><button class="btn btn-primary btn-block mb-2 ">All Messages! </button></a>
    </div>
</div>
<div class="container-1">
    <div class="fondo-blanco box-1">
        <h2 class="mini-banner links">QUICK LINKS</h2>
        <div class="container-2">
            <div class="flex-item-c">
                <a href="multimedia.php" class="btn btn-primary flex-item">Go!</a><div class="flex-item-1">Media Center</div>
            </div>
            <div class="flex-item-c">
                <a href="calendar.php" class="btn btn-primary flex-item">Go!</a><div class="flex-item-1">Calendar</div>
            </div>
            <div class="flex-item-c">
                <a href="mensaje.php" class="btn btn-primary flex-item">Go!</a><div class="flex-item-1">Messages</div>
            </div>
            <div class="flex-item-c">
                <a href="cambio-contra.php" class="btn btn-primary flex-item">Go!</a><div class="flex-item-1">Change Password</div>
            </div>


        </div>

    </div>
    <div class="fondo-blanco box-3">
        <h2 class="mini-banner eventos">NEWS & EVENTS</h2>
        <div id="eventos2" class="container-2">

        </div>
    </div>

    <div class="fondo-blanco box-3">
        <h2 class="mini-banner calendar">CALENDAR</h2>
        <div id="calendar" class="sinEspacio">

        </div>
    </div>

</div>

<div class="modal" id="md_info" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">My information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="divInfo" class="modal-body">
         
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>