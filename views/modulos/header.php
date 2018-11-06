<header class="main-header">
  <!-- Logo -->
  <a href="inicio" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>E</b>s</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Manejador</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Menu de Navegación</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo RUTABASE;?>/views/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo strtoupper($_SESSION['usuario']); ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo RUTABASE;?>/views/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

              <p>
                <?php
                echo strtoupper($_SESSION['usuario']);
                ?>
                <small>Usuario</small>
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                
              </div>
              <div class="pull-right">
                <a href="<?php echo RUTABASE;?>/salir" class="btn btn-default btn-flat">Salir</a>
              </div>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </nav>
</header>