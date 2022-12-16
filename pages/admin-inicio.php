<?php

    session_start();
    if(!isset($_SESSION['acceso']) || $_SESSION['acceso'] == false){
        die("Te has intentado colar en la aplicacion principal");
    }

    include "../PHP/administrador.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Inicio | Administrador</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../public/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../public\vendor\bootstrap\bootstrap-icons\bootstrap-icons.css" rel="stylesheet">
    <link href="../public/css/elementos.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

    <!-- Side Bar -->
    <?php 

    include "componentes/sideBar.php";
    
    ?>

        <!-- Contenedor Principal -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- Encabezado -->
                <?php 
                
                include "componentes/encabezado.php";

                ?>

                <div class="container-fluid">

                    <!-- Contenedor Top de Tarjetas -->
                    <div class="row">

                        <?php 
                                
                            $datos = mostrarDatosGenerales($_SESSION['usuario_id']);
                            foreach($datos as $dato){
                        ?>

                        <!-- Tarjeta: Tiendas -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 0.25rem solid var(--color-blue);">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: var(--color-blue);"> 
                                                Tiendas </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dato['num_tiendas']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-store fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tarjeta: Empleados -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 0.25rem solid var(--color-green);">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: var(--color-green);">
                                                Empleados</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dato['num_empleados']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tarjeta: Productos -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 0.25rem solid var(--color-red);">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: var(--color-red);">
                                                Productos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dato['cantidad_productos']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-box-open fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tarjeta: Ganancias -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Ganancias</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$0</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                                
                    }
                            
                    ?>


                    <!-- Contenedor de Tiendas -->
                    <div class="row">

                        <div class="col-xl-12">    
                            <div class="card shadow mb-4">
                                <!-- Encabezado -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: var(--color-main);">
                                    <h6 class="m-0 font-weight-bold text-white">Tiendas</h6>
                                </div>
                                <!-- Cuerpo -->
                                <div class="card-body row">

                                <?php 
                                
                                $tiendas = mostrarTiendas($_SESSION['usuario_id']);
                                foreach($tiendas as $tienda){

                                ?>

                                    <button class="tarjeta">
                                        <div class="tarjeta__container">
                                            <div class="tarjeta__icon">
                                                <i class="fas fa-2x bi-shop"></i>
                                            </div>
                                            <div class="tarjeta__texto">
                                                <p class="tarjeta__nombre"><?php echo $tienda['nombre']; ?></p>
                                            </div>
                                        </div>
                                    </button>

                                <?php 
                                
                                }
                                
                                ?>
                                
                                </div>
                            </div>
                        </div>

        </div>
    </div>

    <!-- Acciones de opciones del menu del perfil y button para trasladarse a la parte superior de la pagina-->
    <?php 
    
    include "componentes/menuPerfil.php";
    
    ?>


    <!-- Bootstrap: JavaScript-->
    <script src="../public/sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="../public/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../public/sb-admin/js/sb-admin-2.min.js"></script>
    <script src="../public/sb-admin/vendor/chart.js/Chart.min.js"></script>
    <script src="../public/sb-admin/js/demo/chart-area-demo.js"></script>
    <script src="../public/sb-admin/js/demo/chart-pie-demo.js"></script>



<!--     
    <script src="../public/vendor/jquery/jquery.min.js"></script>
    <script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../public/vendor/chart.js/Chart.min.js"></script>
    <script src="../public/js/demo/chart-area-demo.js"></script>
    <script src="../public/js/demo/chart-pie-demo.js"></script>
    <script src="../public/js/sb-admin-2.min.js"></script> -->

    

</body>
</html>