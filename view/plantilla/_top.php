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
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span></button>
  <a class="navbar-brand" href="dashboard.php">Mi Escuela</a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="nav navbar-nav">
      <li class="nav-item">
          <a class="nav-link" href="dashboard.php">DashBoard</a>
        </li>
      <?php
      switch ($_SESSION['permiso']) {
        case 'alumno':
            echo('
              <li class="nav-item">
               <a class="nav-link" href="mis-tareas.php">Mis Tarea</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Mensajes</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="#">eventos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">biblioteca</a>
              </li> 
            ');
        break;
        
        case 'profe':
            echo('
              <li class="nav-item">
               <a class="nav-link" href="tarea.php">Tarea</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Mensajes</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="#">eventos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">biblioteca</a>
              </li>
            ');
        break;

        case 'personal':
            echo('
              <li class="nav-item">
                <a class="nav-link" href="alumno.php">Alumnos</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  + Cursos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="curso.php">Cursos</a>
                  <a class="dropdown-item" href="#">Lecciones</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  + Grupos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="grupo.php">Grupos</a>
                  <a class="dropdown-item" href="#">Horarios</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tarea.php">Tarea</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Mensajes</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="#">Horarios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">eventos</a>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                + Biblioteca
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="escuela.php">Bilblioteca</a>
                <a class="dropdown-item" href="profesor.php">Biblioteca Configuración</a>
              </div>
              </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Configuración
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="escuela.php">Escuelas</a>
                    <a class="dropdown-item" href="profesor.php">Profesores</a>
                  </div>
                </li>
            ');
        break;

        case 'padre':
            echo('
              <li class="nav-item">
               <a class="nav-link" href="tarea.php">Mensajes</a>
              </li> 
            ');
        break;

        case 'superAdmin':
            echo('
              <li class="nav-item">
                <a class="nav-link" href="alumno.php">Alumnos</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  + Cursos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="curso.php">Cursos</a>
                  <a class="dropdown-item" href="#">Lecciones</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  + Grupos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="grupo.php">Grupos</a>
                  <a class="dropdown-item" href="#">Horarios</a>
                </div>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tarea.php">Tarea</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Mensajes</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="#">Horarios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">eventos</a>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                + Biblioteca
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="escuela.php">Bilblioteca</a>
                <a class="dropdown-item" href="profesor.php">Biblioteca Configuración</a>
              </div>
              </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Configuración
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="escuela.php">Escuelas</a>
                    <a class="dropdown-item" href="profesor.php">Profesores</a>
                  </div>
                </li>
              ');
        break;

        default:
          break;
      }
            
      ?>
           
    </ul>
    <div class"nav-item">
      <a class="btn btn-primary boton-menu" href="index.php">Salir</a>
    </div>
        
    
  </div>  
</nav>