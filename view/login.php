<?php session_start(); 
  
           
  
?>
<div class="container form-padding">

 
    <form method="POST" action="controller/login.php" class="form-signin">
      <?php
          if (isset($_GET['error'])) {
                  
          echo '<div class="col-md-12">Usuario o Contraseña Incorrectos</div>'; 
              }    
      ?>
      <img class="img-responsive col-md-12" src="assets/img/logo.png" alt="No se encontró" class="img-rounded">
        <h2 class="form-signin-heading">Porfavor inicia sesión</h2>
        <label for="inputEmail" class="sr-only">Matricula</label>
        <input name="matri" type="text" id="inputEmail" class="form-control" placeholder="Matrícula" required autofocus>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Recordame
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
      </form>

</div> <!-- /container -->