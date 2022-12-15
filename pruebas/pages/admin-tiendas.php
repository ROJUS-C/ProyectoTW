<?php

session_start();
if (!isset($_SESSION['acceso']) || $_SESSION['acceso'] == false) {
    die("Te has intentado colar en la aplicacion principal");
}

?>


<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tiendas | Administrador</title>
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

                <!-- Content Row -->
                <div class="row px-5">
                    <?php require './component/formulario-agregar-empleado.php' ?>
                </div>

                <!-- contenedor para mostrar las tiendas -->

                <div class="row px-3">
                    <!-- Area Chart -->
                    <div class="col">
                        <div class="card shadow ">
                            <div class="card-header py-3 d-flex  align-items-center">
                                <h6 class="m-0 font-weight-bold text-primary">Tiendas</h6>
                            </div>
                            <!-- Tiendas -->
                            <div class="container text-center ">
                                <div class="row d-flex justify-content-center">
                                    <?php include './component/tienda.php'; ?>

                                    <?php include './component/tienda.php'; ?>
                                    <?php include './component/tienda.php'; ?>
                                    <?php include './component/tienda.php'; ?>

                                </div>
                            </div>
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
        <script src="../public/vendor/jquery/jquery.min.js"></script>
        <script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../public/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../public/vendor/chart.js/Chart.min.js"></script>
        <script src="../public/js/sb-admin/demo/chart-area-demo.js"></script>
        <script src="../public/js/sb-admin/demo/chart-pie-demo.js"></script>
        <script src="../public/js/sb-admin/sb-admin-2.min.js"></script>

</body>

</html>