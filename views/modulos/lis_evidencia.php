  <?php
session_start();
if(!$_SESSION['validar']){
  header("location: login");
  exit();
}
include 'views/modulos/header.php';
include 'views/modulos/menu.php';
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Evidencia 
      </h1>
    </section>
  <div id="contennoticia" style="width: 100%"></div>

    <!-- Main content -->
    <section class="content">
      <div class="row">

         <div class="col-xs-12">

         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Proyectos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Proyecto</th>
                  <th>Detalle</th>
                  <th>Encargado</th>
                  <th>Fecha Creacion</th>
                  <th>Fecha Entrega</th>
                  <th>Porcentaje de cumplimiento</th>
                   <th>Fecha Evidencia</th>
                  <th>Detalle Evidencias</th>
                  <th>Archivo</th>
                 
                </tr>
                </thead>
                <tbody>
                  <?php
                      $Lista  = new proyectocontroller();
                      $Lista -> lis_evidencia_controller();
                  ?>  
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

    <?php
        // $Actualizar  = new gestorUsuarios();
        // $Actualizar -> actualizarUsuarioController();
    ?>

<?php
include 'views/modulos/footer.php';
?>  