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
    Registro de Sub Categoria.
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
          <h3 class="box-title">Formulario de Ingreso de Sub Catregoria</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" id="frmcat" enctype="multipart/form-data">
          <div class="box-body">

            <br>
<div class="col-xs-12">
              <div class="form-group">
                <label for="Roll">Sub Categoria </label>
                <select name="cat" class="form-control"> 
                  <option value="">Selecciona una...</option>
                   <?php
                      $Lista  = new proyectocontroller();
                      $Lista -> combo_categoria();
                  ?>  
                </select>
              </div>  
            </div>
            <div class="col-xs-12">
              <div class="form-group">
                <label for="Cedula">Categoria </label>
                <input class="form-control" id="Categoria" name="subcat" placeholder="Categoria" type="text" required" >
              </div>
            </div>


          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary" id="ncat">Guardar</button>
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
  $guardar = new proyectocontroller();
  $guardar -> guardarsubcatController();

?>
<?php
include 'views/modulos/footer.php';
?>