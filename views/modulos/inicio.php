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
      Dashboard
      <small>Control panel</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->


    <!-- Small boxes (Stat box) -->
  </section>
  <!-- /.content -->
</div>
<?php
include 'views/modulos/footer.php';
?>