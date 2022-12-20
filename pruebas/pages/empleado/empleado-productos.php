<?php

    include_once '../../modelo/conexion.php';

    session_start();
    if(!isset($_SESSION['acceso']) || $_SESSION['acceso'] == false){
        die("Te has intentado colar en la aplicacion principal");
    }

    $sqlProductos = "
    SELECT p.*, tp.cantidad from productos p
    JOIN productos_tienda tp ON p.producto_id = tp.producto_id
    JOIN tiendas t ON tp.tienda_id = t.tienda_id
    JOIN usuarios u ON t.tienda_id = u.tienda
    WHERE u.usuario_id = ".$_SESSION['usuario_id']."
    ";
    $resultadoProductos = mysqli_query($conexion, $sqlProductos);








?>


<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Productos | Administrador</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../../public/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../public/vendor/bootstrap/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../public/css/elementos.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

    <!-- Side Bar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: var(--color-main);">
            <!-- Sidebar - Encabezado -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- Logo -->
                    <i class="fas fa-boxes"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Employee</div>
            </a>

            <!-- Linea Divisora -->
            <hr class="sidebar-divider my-0">

            <!-- Item Inicio -->
            <li class="nav-item">
                <a class="nav-link" href="empleado-inicio.php">
                <i class="fas fa-fw bi-house-door-fill"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Linea Divisora -->
            <hr class="sidebar-divider my-0">

            <!-- Item Tienda -->
            <li class="nav-item active">
                <a class="nav-link" href="empleado-productos.php">
                    <i class="fas fa-fw fa-store"></i>
                    <span>Productos</span></a>
            </li>


            <!-- Item Ventas -->
            <li class="nav-item">
                <a class="nav-link" href="empleado-ventas.php">
                    <i class="fas fa-fw bi-cart-fill"></i>
                    <span>Ventas</span></a>
            </li>

            <!-- Linea Divisora -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Button Ocultar Sidebar -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- Fin del Side Bar -->
        <!-- Contenedor Principal -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- Encabezado -->
                <?php 
                
                include "../componentes/encabezado.php";

                ?>

                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between" style="background-color: var(--color-main);">
                            <h6 class="m-0 font-weight-bold text-white d-inline">Historial de Ventas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Codigo</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($resultadoProductos as $valor){
                                        ?>
                                        <tr>
                                            <td><?php echo $valor['nombre']; ?></td>
                                            <td><?php echo $valor['producto_id']?></td>
                                            <td>$ <?php echo $valor['precio']; ?></td>
                                            <td><?php echo $valor['cantidad']; ?></td>
                                        </tr>
                                        
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


            </div>    
        </div>

    </div>

    <!-- Acciones de opciones del menu del perfil y button para trasladarse a la parte superior de la pagina-->
    <?php 
    
    include "components/menuPerfil.php";
    
    ?>

    <!-- Bootstrap: JavaScript-->
    <script src="../../sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="../../sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../sb-admin/vendor/chart.js/Chart.min.js"></script>
    <script src="../../sb-admin/js/demo/chart-area-demo.js"></script>
    <script src="../../sb-admin/js/demo/chart-pie-demo.js"></script>
    <script src="../../sb-admin/js/sb-admin-2.min.js"></script>

</body>
</html>