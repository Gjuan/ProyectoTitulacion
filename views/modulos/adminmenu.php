  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel Administrador
        <small>Administrador de Menu.</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <div class="row">
        <div class="col-sm-12 col-md-3">
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nuevos Menus</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">

                <div class="form-group">
                  <label for="claseMenu">Email address</label>
                  <select class="form-control" id="claseMenu" name="claseMenu">
                    <option value="">Seleccione una...</option>
                    <option value="1">Menu Principal</option>
                    <option value="2">Menu Dependiente</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="tituloMenu">Titulo Menu</label>
                  <input class="form-control" id="tituloMenu" name="tituloMenu" placeholder="Titulo Menu" type="text" required>
                </div>

                <div class="form-group">
                  <label for="Url">Url</label>
                  <input class="form-control" id="Url" placeholder="Url Menu" name="Url" type="text" required>
                </div>

                <div class="form-group">
                  <label for="imagenMenu">Imagen Menu</label>
                  <input id="imagenMenu" name="imagenMenu" class="btn btn-primary" type="file">
                  <p class="help-block">Example block-level help text here.</p>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Marque para menus con imagen
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

        </div>
        <div class="col-sm-12 col-md-9">
          <div class="row"  id="sortable">

            <div class="col-md-3">
              <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                  <i class="fa fa-arrows"></i>
                  <h3 class="box-title">Expandable</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                  <div class="box-footer no-padding">
                    <ul class="nav nav-stacked sortable3">
                      <li id="id1"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Projects <i class=" fa fa-times pull-right rev"></i></a></li>
                      <li id="id2"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Tasks <i class=" fa fa-times pull-right rev"></i></a></li>
                      <li id="id3"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Completed Projects <i class=" fa fa-times pull-right rev"></i></a></li>
                      <li id="id4"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Followers <i class=" fa fa-times pull-right rev"></i></a></li>
                    </ul>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>

            <div class="col-md-3">
              <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                  <i class="fa fa-arrows"></i>
                  <h3 class="box-title">Expandable</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                  <div class="box-footer no-padding">
                    <ul class="nav nav-stacked sortable3">
                      <li id="id1"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Projects <i class=" fa fa-times pull-right rev"></i></a></li>
                      <li id="id2"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Tasks <i class=" fa fa-times pull-right rev"></i></a></li>
                      <li id="id3"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Completed Projects <i class=" fa fa-times pull-right rev"></i></a></li>
                      <li id="id4"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Followers <i class=" fa fa-times pull-right rev"></i></a></li>
                    </ul>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>

            <div class="col-md-3">
              <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                  <i class="fa fa-arrows"></i>
                  <h3 class="box-title">Expandable</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                  <div class="box-footer no-padding">
                    <ul class="nav nav-stacked sortable3">
                      <li id="id1"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Projects <i class=" fa fa-times pull-right rev"></i></a></li>
                      <li id="id2"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Tasks <i class=" fa fa-times pull-right rev"></i></a></li>
                      <li id="id3"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Completed Projects <i class=" fa fa-times pull-right rev"></i></a></li>
                      <li id="id4"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Followers <i class=" fa fa-times pull-right rev"></i></a></li>
                    </ul>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>

            <div class="col-md-3">
              <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Expandable</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                  <div class="box-footer no-padding">
                    <ul class="nav nav-stacked sortable3" id="ull1">
                      <li id="id1"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Projects <i class=" fa fa-times pull-right rev"></i></a></li>
                      <li id="id2"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Tasks <i class=" fa fa-times pull-right rev"></i></a></li>
                      <li id="id3"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Completed Projects <i class=" fa fa-times pull-right rev"></i></a></li>
                      <li id="id4"><a class="hand1" href="#"><i class="fa fa-angle-right"></i> Followers <i class=" fa fa-times pull-right rev"></i></a></li>
                    </ul>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
                                    
          </div>
        </div>
      </div>

      <!-- Small boxes (Stat box) -->
    </section>
    <!-- /.content -->
  </div>