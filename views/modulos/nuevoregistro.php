<?php
session_start();
if(!$_SESSION['validar']){
  header("location: login");
  exit();
}
include 'views/modulos/header.php';
include 'views/modulos/menu.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Registro Cursos.
  </h1>
</section>
<style type="text/css">
  .ced{
    display: inline-block;
    border: 2px solid red;
    box-sizing: border-box;
  }
</style>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-2">
    </div>
    <div class="col-xs-8">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Formulario de Registro Cursos</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
          <div class="box-body">

      <form role="form" method="POST" >

        <div id="aviso">
          
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-feedback">
              <label class="control-label">Cedula de Identidad </label>
              <input class="form-control" name="cedula" id="cedula" type="number" placeholder="Cedula" required>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group has-feedback">
              <label class="control-label">Email </label>
              <input class="form-control" name="email" id="email" type="email" placeholder="Email" required>
            </div>
          </div>          

          <div class="col-md-6">
            <div class="form-group has-feedback">
              <label class="control-label">Nombres </label>
              <input class="form-control" name="nombres" id="nombres" type="text" placeholder="Nombres" required>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group has-feedback">
              <label class="control-label">Apellidos </label>
              <input class="form-control" name="apellidos" id="apellidos" type="text" placeholder="Apellidos"  required>
            </div>
          </div>



          <div class="col-md-6">
            <div class="form-group has-feedback">
              <label class="control-label">Edad </label>
              <input class="form-control" name="edad" id="edad" type="number" placeholder="Edad"  required>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group has-feedback">
              <label class="control-label">Celular </label>
              <input class="form-control" name="celular" id="celular" type="number" placeholder="Celular"  required>
            </div>
          </div>                            

          <input type="hidden" id="verific" name="verific">
          
          <div class="col-md-4">
            <div class="checkbox">
              <label>
                <input name="optionsRadios[]" id="optionsRadios1" value="1" type="checkbox" >
                Fútbol
              </label>
            </div>
          </div>

          <div class="col-md-4">
            <div class="checkbox">
              <label>
                <input name="optionsRadios[]" id="optionsRadios2" value="2" type="checkbox" >
                Básquet
              </label>
            </div>
          </div>

          <div class="col-md-4">
            <div class="checkbox">
              <label>
                <input name="optionsRadios[]" id="optionsRadios3" value="3" type="checkbox" >
                Teatro
              </label>
            </div>
          </div>

          <div class="col-md-4">
            <div class="checkbox">
              <label>
                <input name="optionsRadios[]" id="optionsRadios4" value="4" type="checkbox" >
                Danza
              </label>
            </div>
          </div>

          <div class="col-md-4">
            <div class="checkbox">
              <label>
                <input name="optionsRadios[]" id="optionsRadios5" value="5" type="checkbox" >
                Lectura y Ortografia
              </label>
            </div>
          </div>                                                
        </div>
          
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <input type="submit" class="btn btn-success" id="registrar" name="Registrar" value="Registrar">
          </div>

      </form>
          </div>
          <!-- /.box-body -->

<!--           <div class="box-footer">
            <button type="submit" class="btn btn-primary" id="nUsuario">Guardar</button>
          </div>
        </form> -->
      </div>

      <!-- /.box -->
    </div>
    <div class="col-xs-2">
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<?php

  $modulos = new gestorUsuarios();
  $modulos -> RegistroController();

?>
<?php
include 'views/modulos/footer.php';
?>