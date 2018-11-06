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
        Administrador de Usuarios
      </h1>
    </section>
  <div id="contennoticia" style="width: 100%"></div>

    <!-- Main content -->
    <section class="content">
      <div class="row">

         <div class="col-xs-12">

         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Usuarios del Sistema</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Nombres</th>
                  <th>Estado</th>
                  <th>Rol</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      $Lista  = new gestorUsuarios();
                      $Lista -> listaUsuariosController();
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

<div class="modal" id="modalUser">
   <form role="form" method="post" id="frmusuario2" enctype="multipart/form-data">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Editar Usuario</h4>
          </div>
          <div class="modal-body">
               
                  <div class="box-body">

                    <div class="col-xs-3" id="img1">
                        <img src="views/dist/img/avatar5.png" id="imagenUser" width="100%" height="100%">
                    </div>

                    <div class="col-xs-9">

                        <div class="form-group">
                          <div class="radio">
                            <label>
                              <input name="optionsRadiosUp" id="optionsRadios1" value="M" type="radio">
                              Hombre
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input name="optionsRadiosUp" id="optionsRadios2" value="F" type="radio">
                              Mujer
                            </label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="foto">Foto</label>
                          <input class="btn btn-primary" id="imagenUp" name="imagenUp" type="file">
                          <p class="help-block">La imagen debe ser tipo (.JPG 160px * 160px) y no pesar mas de 200kb.</p>
                          <div id="imagenuser"></div>
                        </div>

                    </div>

                    <br>

                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="Cedula">Cedula </label>
                        <input class="form-control" id="CedulaUp" name="CedulaUp" placeholder="Cedula" type="text" required maxlength="10" >
                      </div>
                    </div>

                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="Nombres">Nombres </label>
                        <input class="form-control" id="NombresUp" name="NombresUp" placeholder="Nombres" type="text" required >
                      </div>
                    </div>

                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="Apellidos">Apellidos </label>
                        <input class="form-control" id="ApellidosUp" name="ApellidosUp" placeholder="Apellidos" type="text" required maxlength="" >
                      </div>   
                    </div>

                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="Email">Email </label>
                        <input class="form-control" id="EmailUp" name="EmailUp" placeholder="Email" type="email" required maxlength="" >
                      </div>  
                    </div>

                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="Roll">Roll </label>
                        <select name="RollUp" id="RollUp" class="form-control"> 
                          <option value="" >Selecciona una...</option>
                          <option value="1" id="opt1">Administrador</option>
                          <option value="2" id="opt2">Editor</option>
                        </select>
                      </div>  
                    </div>

                    <input type="hidden" name="idUserUp" id="idUserUp" value="">
                    <input type="hidden" name="imgAnt" id="imgAnt" value="">
                  </div>
                  <!-- /.box-body -->
                
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
  <!-- /.modal-dialog -->
  </form>
</div>
    <?php
        // $Actualizar  = new gestorUsuarios();
        // $Actualizar -> actualizarUsuarioController();
    ?>

<?php
include 'views/modulos/footer.php';
?>  