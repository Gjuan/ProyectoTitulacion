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
        var words = myBookId.split('/');
        //console.log(words[3]);
        document.getElementById('id_sub').value=(words[0]) ;
        document.getElementById('subcat').value=(words[1]) ;
        
     
      });
    </script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       
      </h1>
    </section>
  <div id="contennoticia" style="width: 100%"></div>

    <!-- Main content -->
    <section class="content">
      <div class="row">

         <div class="col-xs-12">

         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Categoria</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Categoria</th>
                   <th>Sub Categoria</th>
                  <th>Estado</th>
                
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                      $Lista  = new proyectocontroller();
                      $Lista -> lis_subcategoria_controller();
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
<div class="modal" id="modalCuestionario">
   <form role="form" method="post" id="frmusuario2" enctype="multipart/form-data">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Editar Sub Categoria</h4>
          </div>
          <div class="modal-body">
               
                  <div class="box-body">
                      <div class="col-xs-12">
              <div class="form-group">
                <label for="Roll">Sub Categoria </label>
                <select name="cat" class="form-control" required="  "> 
                   <?php
                      $Lista  = new proyectocontroller();
                      $Lista -> combo_categoria();
                  ?>  
                </select>
              </div>  
            </div>
                    <div class="col-xs-12">
                      <div class="form-group">

                        <label for="Nombres">Sub Categoria</label>
                        <input class="form-control"  name="subcat" id="subcat" value="" placeholder="Categoria" type="text" required=""  >
                         <input class="form-control"  name="id_sub" id="id_sub" value="" placeholder="Categoria" type="hidden" required=""  >
                      </div>
                    </div>
                    <div class="col-xs-12">
              <div class="form-group">
                <label for="Roll">Estado </label>
                <select name="estado" class="form-control" required=" "> 
                   <option value=""> Seleccione</option>
                    <option value="A"> Activo</option>
                     <option value="I"> Inactivo</option>
                  
                </select>
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
         $Actualizar  = new proyectocontroller();
         $Actualizar -> ActualizarSubCatController();
    ?>

   

<?php
include 'views/modulos/footer.php';
?>  