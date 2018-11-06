  <?php
session_start();
if(!$_SESSION['validar']){
  header("location: login");
  exit();
}
include 'views/modulos/header.php';
include 'views/modulos/menu.php';
?>


 <script language="javascript" src="<?php echo RUTABASE; ?>/views/src/js/jquery-1.11.3.min.js"></script>
<script language="JavaScript" type="t<?php echo RUTABASE; ?>/ext/javascript" src="views/src/js/ajax.js"></script>
    <script type="text/javascript">

        $(document).on("click", "a.btnn", function () {
        var myBookId = $(this).data('id');
        //var str = 'The quick brown fox jumped over the lazy dog.';
        var words = myBookId.split('-');
        //console.log(words[3]);
        document.getElementById('evi').value=(words[0]) ;
        document.getElementById('proy').value=(words[1]) ;
       document.getElementById('per').value=(words[2]) ;
       document.getElementById('pro').value=(words[3]) ;
        
      });
</script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Proyectos Asignados
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
                  <th>Observacion</th>
                   <th>Creado Por</th>
                   <th>Encargado</th>
                   <th>Fecha Creacion</th>
                  <th>Fecha Entrega</th>
                 <th>Evidencias</th>
                 <th>Porcentaje de Cumplimiento</th>
                  <th>Subir Evidencia</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      $Lista  = new proyectocontroller();
                      $Lista -> lisuser_proyecto_controller();
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



<div class="modal" id="modalCuestionario">
   <form role="form" method="post" id="frmusuario2" enctype="multipart/form-data">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Evidencia</h4>
          </div>
          <div class="modal-body">
               
                  <div class="box-body">

                    <div class="col-xs-12">
                      <div class="form-group">

                        <label for="Nombres">Detalle</label>
                        <input class="form-control"  name="detalle" id="detalle" value="" placeholder="Detalle" type="text" required=""  >
                      </div>
                    </div>
                    <div class="col-xs-12">
                      <div class="form-group">
                        <input class="form-control"  name="evi" id="evi" value="" type="hidden"  >
                         <input class="form-control"  name="proy" id="proy" value="" type="hidden"  >
                         <input class="form-control"  name="pro" id="pro" value="" type="hidden"  >
                         <input class="form-control"  name="per" id="per" value="" type="hidden"  >

                        <label for="Nombres">Nuevo Porcentaje de Avance </label>
                        <input class="form-control"  name="por" id=""  placeholder="Porcentaje de Avance" type="number" required="" maxlength="3"  >
                      </div>
                    </div>
                      <div class="col-xs-12">
                      <div class="form-group">
                        <label for="Nombres">Evidencia </label>
                        <input class="form"  name="archivo" id="archivo" value=""  type="file" required=""  >
                      </div>
                    </div>
                                      
              
                  </div>
                  <!-- /.box-body -->
                
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="enviar" value="1">Guardar Cambios</button>
          </div>
        </div>
        </div>
          </form>
      </div>

                  <?php
                  
                      $Lista -> guardarEvidenciaController();
               
                  ?>  





<?php
include 'views/modulos/footer.php';
?>  