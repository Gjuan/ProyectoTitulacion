<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Control</b>Proyect</a>
  </div>
  <!-- /.login-logo -->
  
  <div class="login-box-body">
  
    <p class="login-box-msg">inicio de session</p>

 
    <form action="" method="post" onsubmit="return validarIngreso()">
    
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="usuarioIngreso" id="usuarioIngreso" placeholder="Usuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="claveIngreso" id="claveIngreso" placeholder="clave" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
      <div class="row">
        <div class="col-xs-8">

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Inicio</button>
        </div>
        <!-- /.col -->
      </div>
      <?php

        $ingreso  = new Ingreso();
        $ingreso -> ingresoController();

      ?>
    </form>
<center> <img  width="200px" height="200px" src="views/images/Logo.jpg"></center>
  </div>
  <!-- /.login-box-body -->
</div>

