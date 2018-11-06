<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>System</title>
  <!-- Font Awesome -->
  <!-- daterange picker -->

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo RUTABASE; ?>/views/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo RUTABASE; ?>/views/bootstrap/css/slyte.css">
  <link rel="stylesheet" href="<?php echo RUTABASE; ?>/views/bootstrap/css/sweetalert.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo RUTABASE; ?>/views/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo RUTABASE; ?>/views/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?php echo RUTABASE; ?>/views/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo RUTABASE; ?>/views/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo RUTABASE; ?>/views/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo RUTABASE; ?>/views/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo RUTABASE; ?>/views/plugins/select2/select2.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo RUTABASE; ?>/views/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo RUTABASE; ?>/views/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <script src="<?php echo RUTABASE; ?>/views/ckeditor/ckeditor.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="<?php echo RUTABASE; ?>/views/js/sweetalert.min.js"></script>


    

  <style type="text/css">
      #map {
        width: 100%;
        height: 1000px;
      }

  </style>

</head>
<body class="sidebar-mini skin-blue-light wysihtml5-supported fixed">
<div class="wrapper">

<?php

	$modulos = new Enlaces();
	$modulos -> enlacesController();

?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo RUTABASE; ?>/views/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo RUTABASE; ?>/views/bootstrap/js/bootstrap.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo RUTABASE; ?>/views/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<!-- DataTables -->
<script src="<?php echo RUTABASE; ?>/views/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo RUTABASE; ?>/views/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo RUTABASE; ?>/views/plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo RUTABASE; ?>/views/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo RUTABASE; ?>/views/plugins/datepicker/bootstrap-datepicker.js"></script>

<!-- SlimScroll 1.3.0 -->
<script src="<?php echo RUTABASE; ?>/views/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo RUTABASE; ?>/views/plugins/iCheck/icheck.min.js"></script>

<!-- FastClick -->
<script src="<?php echo RUTABASE; ?>/views/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo RUTABASE; ?>/views/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo RUTABASE; ?>/views/dist/js/demo.js"></script>

<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>


<!-- AdminLTE for demo purposes -->







<script src="<?php echo RUTABASE; ?>/views/js/validarIngreso.js"></script>
<script src="<?php echo RUTABASE; ?>/views/js/gestorslide.js"></script>
<script src="<?php echo RUTABASE; ?>/views/js/gestornoticia.js"></script>
<script src="<?php echo RUTABASE; ?>/views/js/gestorusuarios.js"></script>
<script src="<?php echo RUTABASE; ?>/views/js/gestoreventos.js"></script>
<script src="<?php echo RUTABASE; ?>/views/js/gestorobras.js"></script>
<script src="<?php echo RUTABASE; ?>/views/js/gestorradio.js"></script>
<script src="<?php echo RUTABASE; ?>/views/js/gestorbanner.js"></script>
<script src="<?php echo RUTABASE; ?>/views/js/gestorredes.js"></script>
<script src="<?php echo RUTABASE; ?>/views/js/gestorapariencia.js"></script>
<script src="<?php echo RUTABASE; ?>/views/js/gestorlotaip.js"></script>
<script src="<?php echo RUTABASE; ?>/views/js/gestormenu.js"></script>
<script src="<?php echo RUTABASE; ?>/views/js/gestorrendicion.js"></script>

<script src="<?php echo RUTABASE; ?>/views/js/gestorComboLocalidad.js"></script>

<!-- page script -->
<script>


  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

</script>

<script>
  $(function () {

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

   //Date picker2
    $('#datepicker2').datepicker({
      autoclose: true
    });

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
    
  });
</script>


</body>
</html>
