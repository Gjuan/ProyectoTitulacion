
  <link rel="stylesheet" href="<?php echo RUTABASE; ?>/views/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo RUTABASE; ?>/views/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo RUTABASE; ?>/views/plugins/iCheck/all.css">

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
    Registro de Proyectos.
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
          <h3 class="box-title">Formulario de Ingreso de Proyecto</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" id="frmproyecto" enctype="multipart/form-data">
          <div class="box-body">

            <br>

            <div class="col-xs-12">
              <div class="form-group">
                <label for="Cedula">Proyecto </label>
                <input class="form-control" id="proyecto" name="proyecto" placeholder="proyecto" type="text" required" >
              </div>
            </div>

            <div class="col-xs-12">
              <div class="form-group">
                <label for="Nombres">Detalle </label>
                <input class="form-control" id="detalle" name="detalle" placeholder="detalle" type="text" required >
              </div>
            </div>

            <div class="col-xs-12">
              <div class="form-group">
                <label for="Apellidos">Observacion </label>
                <input class="form-control" id="observacion" name="observacion" placeholder="observacion" type="text" required maxlength="" >
              </div>   
            </div>
           
          <div class="col-xs-12">
             <div class="form-group">
                <label>Fecha Entrega</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="f1">
                </div>
                <!-- /.input group -->
              </div>
            </div>

            <div class="col-xs-12">
              <div class="form-group">
                <label for="Roll">Sub Categoria </label>
                <select name="cat" class="form-control"> 
                	<option value="">Selecciona una...</option>
                	 <?php
                      $Lista  = new proyectocontroller();
                      $Lista -> combo_cat();
                  ?>  
                </select>
              </div>  
            </div>
             <div class="col-xs-12">
              <div class="form-group">
                <label for="Roll">Encargado de proyecto </label>
                <select name="Encargado" class="form-control"> 
                  <option value="">Selecciona una...</option>
                  <?php
                     
                      $Lista -> combo_per();
                  ?> 
                </select>
              </div>  
            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary" id="nproyecto">Guardar</button>
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
  $guardar -> guardarproyectoController();

?>
<?php
include 'views/modulos/footer.php';
?>



<script src="<?php echo RUTABASE; ?>/views/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<!-- Select2 -->
<script src="<?php echo RUTABASE; ?>/views/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo RUTABASE; ?>/views/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo RUTABASE; ?>/views/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo RUTABASE; ?>/views/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script src="<?php echo RUTABASE; ?>/views/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo RUTABASE; ?>/views/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

<script src="<?php echo RUTABASE; ?>/views/dist/js/adminlte.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>