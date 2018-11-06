  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo RUTABASE; ?>/views/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo strtoupper($_SESSION['usuario']); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu del Sistema</li>

        <?php
          if ($_SESSION['admin'] == true) {
        ?>
           <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Usuarios</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo RUTABASE; ?>/nuevousuario"><i class="fa fa-circle-o"></i> Nuevo Usuario</a></li>
            <li><a href="<?php echo RUTABASE; ?>/listausuario"><i class="fa fa-circle-o"></i> Listado de Usuarios</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Proyectos</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo RUTABASE; ?>/new_proyecto"><i class="fa fa-circle-o"></i> Nuevo Proyecto</a></li>
            <li><a href="<?php echo RUTABASE; ?>/lis_proyecto/1"><i class="fa fa-circle-o"></i> Proyectos en proceso</a></li>
            <li><a href="<?php echo RUTABASE; ?>/lis_proyecto/2"><i class="fa fa-circle-o"></i> Proyectos en Finalizados</a></li>
            <li><a href="<?php echo RUTABASE; ?>/lis_proyecto/3"><i class="fa fa-circle-o"></i> Proyectos en Caducados</a></li>
          </ul>
        </li>


                 <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Categoria</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo RUTABASE; ?>/new_cat"><i class="fa fa-circle-o"></i> Nueva Categoria</a></li>
            <li><a href="<?php echo RUTABASE; ?>/lis_cat"><i class="fa fa-circle-o"></i> consulta</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Sub Categoria</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo RUTABASE; ?>/new_subcat"><i class="fa fa-circle-o"></i> Nueva  Sub Categoria</a></li>
            <li><a href="<?php echo RUTABASE; ?>/lissub_cat"><i class="fa fa-circle-o"></i> consulta</a></li>
          </ul>
        </li>

      
          <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Proyectos Usuario</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo RUTABASE; ?>/lisuser_proyecto/1"><i class="fa fa-circle-o"></i> Proyectos en proceso</a></li>
            <li><a href="<?php echo RUTABASE; ?>/lisuser_proyecto/2"><i class="fa fa-circle-o"></i> Proyectos en Finalizados</a></li>
            <li><a href="<?php echo RUTABASE; ?>/lisuser_proyecto/3"><i class="fa fa-circle-o"></i> Proyectos en Caducados</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Reportes</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="<?php echo RUTABASE; ?>/reportegeneral"><i class="fa fa-circle-o"></i> General</a></li>
             <li><a href="<?php echo RUTABASE; ?>/userreporte"><i class="fa fa-circle-o"></i> Reporte por usuario</a></li>
          </ul>
        </li>


        <?php
          }else{
            ?>
              <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Proyectos usuario</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo RUTABASE; ?>/lisuser_proyecto/1"><i class="fa fa-circle-o"></i> Proyectos en proceso</a></li>
            <li><a href="<?php echo RUTABASE; ?>/lisuser_proyecto/2"><i class="fa fa-circle-o"></i> Proyectos en Finalizados</a></li>
            <li><a href="<?php echo RUTABASE; ?>/lisuser_proyecto/3"><i class="fa fa-circle-o"></i> Proyectos en Caducados</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Reporte Generale</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="<?php echo RUTABASE; ?>/reporteporusuario"><i class="fa fa-circle-o"></i> General</a></li>
        </li>
        <?php 

          }
        ?>   
        
       
          
      
        <?php
          if ($_SESSION['admin'] == true) {
        ?>        
                
        <?php
          }
        ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>