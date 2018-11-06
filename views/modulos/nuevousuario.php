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
    Registro de Usuario.
  </h1>
</section>
<style type="text/css">
  .ced{
    display: inline-block;
    border: 2px solid red;
    box-sizing: border-box;
  }
</style>

<script type="text/javascript">
  function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial){
alert('Tecla no aceptada');
        return false;
      }
}
</script>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-2">
    </div>
    <div class="col-xs-8">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Formulario de Ingreso de Usuarios</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" id="frmusuario" enctype="multipart/form-data">
          <div class="box-body">

            <br>

            <div class="col-xs-12">
              <div class="form-group">
                <label for="Cedula">Cedula </label>
                <input class="form-control" id="Cedula" name="Cedula" placeholder="Cedula" type="number" required maxlength="10" >
              </div>
            </div>

            <div class="col-xs-12">
              <div class="form-group">
                <label for="Nombres">Nombres </label>
                <input class="form-control" id="Nombres" onkeypress="return soloLetras(event)"  name="Nombres" placeholder="Nombres" type="text" required >
              </div>
            </div>

            <div class="col-xs-12">
              <div class="form-group">
                <label for="Apellidos">Apellidos </label>
                <input class="form-control" id="Apellidos" name="Apellidos"  onkeypress="return soloLetras(event)" placeholder="Apellidos" type="text" required maxlength="" >
              </div>   
            </div>

            <div class="col-xs-12">
              <div class="form-group">
                <label for="Cedula">Correo </label>
                <input class="form-control" id="correo" name="correo" placeholder="Correo" type="email" required maxlength="" >
              </div>
            </div>

            <div class="col-xs-12">
              <div class="form-group">
                <label for="Roll">Roll </label>
                <select name="Roll" class="form-control"> 
                	<option value="">Selecciona una...</option>
                	<option value="1">Administrador</option>
                	<option value="2">User</option>
                </select>
              </div>  
            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary" id="nUsuario">Guardar</button>
          </div>
        </form>
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
  $modulos -> guardarUsuarioController();

?>
<?php
include 'views/modulos/footer.php';
?>