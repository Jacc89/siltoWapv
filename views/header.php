<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php require 'views/head.php'; ?>
</head>

<body>
    <?php require 'views/menuadmin.php'; ?>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href=""><img class="main-logo" src="<?php echo constant('URL'); ?>img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="fa fa-bars"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- MENU LISTA  -->
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li>
                                                    <a href="<?php echo constant('URL'); ?>perfil">
                                                    <span class="fa fa-user author-log-ic"> Perfil</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- ICONO MENSAJES BARRA NAVEGACION -->
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <!-- ICONO USUARIO BARRA NAVEGACION -->
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <i class="fa  adminpro-user-rounded header-riht-inf" aria-hidden="true">
                                                            <img id="fotousuario" src="
                                                                <?php 
                                                                    if (isset($_SESSION['upd_foto'])) {
                                                                        echo constant('URL') . $_SESSION['upd_foto'];
                                                                    }else{
                                                                        echo constant('URL') . $_SESSION['foto'];
                                                                    }
                                                                ?>
                                                            " alt="Foto">
                                                        </i>
                                                        <span class="admin-name">
                                                            <?php
                                                                if (isset($_SESSION['upd_nomb'])) {
                                                                    echo $_SESSION['upd_nomb'];
                                                                }else{
                                                                    echo $_SESSION['nombre'];
                                                                }
                                                            ?>
                                                        </span>

                                                    </a>

                                                </li>

                                                <li class="nav-item nav-setting-open">
                                                <a href="<?php echo constant('URL'); ?>index/logout"><span ></span> <i class="fa fa-power-off" aria-hidden="true"></i></a>
                                                <div role="menu" ></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- RESPONSIVE -->
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Administrador<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <!-- crud usuarios -->
                                                <li><a title="Registro Usuario" href="<?php echo constant('URL'); ?>usuario/crear"><i class="fa fa-user" aria-hidden="true"></i> <span class="mini-sub-pro">Registrar Usuario</span></a></li>
                                                <li><a title="Ver Usuarios" href="<?php echo constant('URL'); ?>usuario"><i class="fa fa-users nav-icon" aria-hidden="true"></i> <span class="mini-sub-pro">Lista Usuarios</span></a></li>
                                                <!-- crud centro -->
                                                <li><a title="Registro Centro" href="<?php echo constant('URL'); ?>centro/crear"><i class="fa fa-edit" aria-hidden="true"></i> <span class="mini-sub-pro">Registrar Centros</span></a></li>
                                                <li><a title="Lista Centros" href="<?php echo constant('URL'); ?>centro"><i class="fa fa-eye nav-icon" aria-hidden="true"></i> <span class="mini-sub-pro">Lista Centros</span></a></li>
                                                <!-- crud vehiculo -->
                                                <li><a title="Registro Vehiculo" href="<?php echo constant('URL'); ?>vehiculo/crear"><i class="fa fa-truck" aria-hidden="true"></i> <span class="mini-sub-pro">Registrar Vehiculo</span></a></li>
                                                <li><a title="Lista Vehiculos" href="<?php echo constant('URL'); ?>vehiculo"><i class="fa fa-car nav-icon" aria-hidden="true"></i> <span class="mini-sub-pro">Lista Vehiculos</span></a></li>
                                                <!-- crud producto -->
                                                <li><a title="Registro Producto" href="<?php echo constant('URL'); ?>producto/crear"><i class="fa fa-edit" aria-hidden="true"></i> <span class="mini-sub-pro">Registrar Producto</span></a></li>
                                                <li><a title="Lista productos" href="<?php echo constant('URL'); ?>producto"><i class="fa fa-shopping-cart nav-icon" aria-hidden="true"></i> <span class="mini-sub-pro">Lista Productos</span></a></li>
                                                <!-- crud solicitud -->
                                                <li><a title="Registro Solicitud " href="<?php echo constant('URL'); ?>solicitud/crear"><i class="fa fa-edit" aria-hidden="true"></i> <span class="mini-sub-pro">Registrar Solicitud</span></a></li>
                                                <li><a title="Lista de solicitudes" href="<?php echo constant('URL'); ?>solicitud"><i class="fa fa-eye nav-icon" aria-hidden="true"></i> <span class="mini-sub-pro">Lista Solicitudes</span></a></li>
                                                <!-- crud rutas -->
                                                <li><a title="Registro Ruta" href="<?php echo constant('URL'); ?>ruta/crear"><i class="fa fa-map-marker" aria-hidden="true"></i> <span class="mini-sub-pro">Registrar Rutas</span></a></li>
                                                <li><a title="Lista de rutas" href="<?php echo constant('URL'); ?>ruta"><i class="fa fa-map nav-icon" aria-hidden="true"></i> <span class="mini-sub-pro">Lista Rutas</span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <!-- Mobile Menu end -->
            <!-- AREA DE BUSQUEDA -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
                                                <!-- <input type="text" placeholder="Search..." class="form-control">
                                                <a href=""><i class="fa fa-search"></i></a> -->
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu">
                                            <!-- <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li> -->
                                            <li><span class="bread-blod">SILTO</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="color-line"></div>
        <div class="color-line"></div><br>