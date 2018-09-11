<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

  if (!isset($_SESSION['permiso'])) {
    header("location: index.php");
  }
?>

<nav class="navbar navbar-inverse bg-primary navbar-toggleable-md sticky-top  bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span></button>
  <a class="navbar-brand" href="dashboard.php">Mi Escuela</a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="nav navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" id="nav_dash" href="dashboard.php"><i class="fa fa-th-large"></i> DashBoard</a>
      </li>
      <?php
      switch ($_SESSION['permiso']) {
        case '6':
            echo('
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user"></i> Alumnos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="lista.php">Pase de Lista</a>
                <a class="dropdown-item" href="avance.php">Avance Diario</a>
                <a class="dropdown-item" href="alumno.php">Alumnos</a>
              </div>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="curso.php"><i class="fa fa-book"></i> Cursos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="grupo.php"><i class="fa fa-users"></i> Grupos</a>
              </li>
              
              
              <li class="nav-item">
                <a class="nav-link" href="tarea.php"><i class="fa fa-pencil"></i> Tarea</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mensaje.php"><i class="fa fa-comment"></i> Mensajes</a>
              </li> 
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-calendar"></i> Calendario
              </a> 
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="calendar.php">Calendario General</a>
                <a class="dropdown-item" href="eventos.php">Agregar Eventos</a>
              </div>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-image"></i> Media Center
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="multimedia.php">Media Center</a>
                <a class="dropdown-item" href="biblioteca-config.php">Categorias Multimedia</a>
                <a class="dropdown-item" href="archivos-multi.php">Archivos Multimedia</a>
              </div>
              <li class="nav-item">
              <a class="nav-link" href="reportes.php"><i class="fa fa-bar-chart"></i> Reportes</a>
            </li> 
              </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-cog"></i> Configuración
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="escuela.php">Escuelas</a>
                    <a class="dropdown-item" href="profesor.php">Profesores</a>
                    <a class="dropdown-item" href="cambio-contra.php">Change Password</a>
                  </div>
                </li>
              ');
        break;

        case '1':
            echo('
              <li class="nav-item">
                <a class="nav-link" href="mis-tareas.php"><i class="fa fa-pencil"></i> My Homework</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mensaje.php"><i class="fa fa-comment"></i> Messages</a>
              </li> 
              <li class="nav-item">
                  <a class="nav-link" href="calendar.php"><i class="fa fa-calendar"></i> Calendar</a>
                </li>
              <li class="nav-item">
                  <a class="nav-link" href="multimedia.php"><i class="fa fa-image"></i> Media Center</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-cog"></i> Config
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="cambio-contra.php">Change Password</a>
                  </div>
                </li>
              ');
        break;

        //profe
        case '2':
        echo('
          <li class="nav-item">
            <a class="nav-link" href="tarea.php"><i class="fa fa-pencil"></i> Homework</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mensaje.php"><i class="fa fa-comment"></i> Messages</a>
          </li> 
          <li class="nav-item">
              <a class="nav-link" href="calendar.php"><i class="fa fa-calendar"></i> Calendar</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-cog"></i> Config
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="cambio-contra.php">Change Password</a>
              </div>
            </li>
          ');
    break;

        default:
          break;
      }
            
      ?>

    </ul>


    <a class="btn btn-primary" href="index.php">Exit</a>

  </div>
</nav>