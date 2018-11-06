<?php
if(!$_SESSION['validar']){
  header("location: login");
  exit();
}
include 'views/modulos/header.php';
include 'views/modulos/menu.php';

 //$banner = new GestorBannerController();

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Apariencia
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    <div class="row">

      <div class="col-sm-12 col-md-6"> 
        <div class="box box-default color-palette-box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i> Banner Rendicion de Cuentas</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div id="imgSlide1"  class="col-md-12">
                <p><span class="fa fa-arrow-down"></span>  Arrastra aquí una imagen, (<b>tipo .JPG</b>| tamaño recomendado: 1920px * 315px | peso recomendado <b>350kb</b>)</p>
                <ul id="rendicioncuentas" class="bannerapariencia">
                  <li class="bloqueSlide" id="parallax-bg.jpg"><span class="fa fa-times eliminar_item"></span><img src="../views/images/banners-seccion/parallax-bg.jpg" class="handleImg"></li>
                </ul>           
              </div>
            </div>
          </div>
         <!-- /.box-body -->
        </div>
      </div>

      <div class="col-sm-12 col-md-6"> 
        <div class="box box-default color-palette-box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i> Banner Actividades Culturales</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div id="imgSlide1"  class="col-md-12">
                <p><span class="fa fa-arrow-down"></span>  Arrastra aquí una imagen, (<b>tipo .JPG</b>|  tamaño recomendado: 1920px * 315px | peso recomendado <b>350kb</b>)</p>
                <ul id="actividadesculturales" class="bannerapariencia">
                 <li class="bloqueSlide" id="parallax-bg-2.jpg"><span class="fa fa-times eliminar_item"></span><img src="../views/images/banners-seccion/parallax-bg-2.jpg" class="handleImg"></li>
                </ul>           
              </div>
            </div>
          </div>
         <!-- /.box-body -->
        </div>
      </div>                        

      <div class="col-sm-12 col-md-4"> 
        <div class="box box-default color-palette-box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i> Logo de la Pagina</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div id="imgSlide1"  class="col-md-12">
                <p><span class="fa fa-arrow-down"></span>  Arrastra aquí una imagen, (<b>tipo .PNG</b>| tamaño recomendado: 242px * 92px | peso recomendado <b>30kb</b>)</p>
                <ul id="logopagina" class="bannerapariencia">
                  <li class="bloqueSlide" id="logo.png"><span class="fa fa-times eliminar_item"></span><img src="../views/images/logo/logo.png" class="handleImg"></li>
                </ul>           
              </div>
            </div>
          </div>
         <!-- /.box-body -->
        </div>
      </div>
    </div>
      <!-- Small boxes (Stat box) -->
    </section>
    <!-- /.content -->
  </div>

<?php
include 'views/modulos/footer.php';
?>