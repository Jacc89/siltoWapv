<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href=""><img width="150px" height="100px" class="main-logo" src="<?php echo constant('URL'); ?>public/img/logo.png" alt="" /></a><strong><img src="<?php echo constant('URL'); ?>public/img/logo.png" alt="" /></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li class="active">
                        <a class="has-arrow" href="index.php">
                            <i class="fa big-icon fa-home icon-wrap"></i>
                            <span class="mini-click-non" style=" text-transform: uppercase;"><?php echo $_SESSION['cargo']; ?></span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">

                            <?php if ($_SESSION['cargo'] == "administrador") : ?>

                                <!-- //crud usuario -->
                                <li><a title="Registro Usuario" href="<?php echo constant('URL'); ?>usuario/crear"><i class="fa fa-user" aria-hidden="true"></i> <span class="mini-sub-pro">Registrar Usuario</span></a></li>
                                <li><a title="Ver Usuarios" href="<?php echo constant('URL'); ?>usuario"><i class="fa fa-users nav-icon" aria-hidden="true"></i> <span class="mini-sub-pro">Lista Usuarios</span></a></li>
                            <?php endif; //FIN ADMINISTRADOR?>

                            <?php if ($_SESSION['cargo'] == "administrador" || $_SESSION['cargo'] == "supervisor") : ?>

                                <!-- crud centro -->
                                <li><a title="Registro Centro" href="<?php echo constant('URL'); ?>centro/crear"><i class="fa fa-edit" aria-hidden="true"></i> <span class="mini-sub-pro">Registrar Centros</span></a></li>
                                <li><a title="Lista Centros" href="<?php echo constant('URL'); ?>centro"><i class="fa fa-eye nav-icon" aria-hidden="true"></i> <span class="mini-sub-pro">Lista Centros</span></a></li>
                                <!-- crud vehiculo -->
                                <li><a title="Registro Vehìculo" href="<?php echo constant('URL'); ?>vehiculo/crear"><i class="fa fa-truck" aria-hidden="true"></i> <span class="mini-sub-pro">Registrar Vehìculo</span></a></li>
                                <li><a title="Lista Vehiculos" href="<?php echo constant('URL'); ?>vehiculo"><i class="fa fa-car nav-icon" aria-hidden="true"></i> <span class="mini-sub-pro">Lista Vehìculos</span></a></li>


                                <!-- crud producto -->
                                <li><a title="Registro Producto" href="<?php echo constant('URL'); ?>producto/crear"><i class="fa fa-edit" aria-hidden="true"></i> <span class="mini-sub-pro">Registrar Producto</span></a></li>
                                <li><a title="Lista productos" href="<?php echo constant('URL'); ?>producto"><i class="fa fa-shopping-cart nav-icon" aria-hidden="true"></i> <span class="mini-sub-pro">Lista Productos</span></a></li>

                                <!-- crud rutas -->
                                <li><a title="Registro Ruta" href="<?php echo constant('URL'); ?>ruta/crear"><i class="fa fa-map-marker" aria-hidden="true"></i> <span class="mini-sub-pro">Registrar Rutas</span></a></li>
                                <li><a title="Lista de rutas" href="<?php echo constant('URL'); ?>ruta"><i class="fa fa-map nav-icon" aria-hidden="true"></i> <span class="mini-sub-pro">Lista Rutas</span></a></li>
                            <?php endif; //FIN SUPERVISOR-ADMIN?>
                
                            <?php if ($_SESSION['cargo'] == "bodeguero" || $_SESSION['cargo'] == "supervisor" || $_SESSION['cargo'] == "administrador") : ?>
                                <!-- crud solicitud -->
                                <li><a title="Registro Solicitud " href="<?php echo constant('URL'); ?>solicitud/crear"><i class="fa fa-edit" aria-hidden="true"></i> <span class="mini-sub-pro">Registrar Solicitud</span></a></li>
                                <li><a title="Lista de solicitudes" href="<?php echo constant('URL'); ?>solicitud"><i class="fa fa-eye nav-icon" aria-hidden="true"></i> <span class="mini-sub-pro">Lista Solicitudes</span></a></li>
                            <?php endif; //FIN BODEGUERO ?>
                        </ul>
                    <li><a><i></i> <span> <br></span></a></li>
                </ul>
            </nav>
        </div>
    </nav>
</div>