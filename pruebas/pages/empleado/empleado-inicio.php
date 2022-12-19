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
    <title>Inicio | Empleado</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../../public/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../public\vendor\bootstrap\bootstrap-icons\bootstrap-icons.css" rel="stylesheet">
    <link href="../../public/css/elementos.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Side Bar -->
        <?php
        include "components/sideBar.php";
        ?>
        <!-- Contenedor Principal -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- Encabezado -->
                <?php

                include "../componentes/encabezado.php";

                ?>

                <div class="container-fluid">
                    <nav class="navbar bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand">Buscador de productos</a>
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Buscar</button>
                            </form>
                        </div>
                    </nav>
                </div>

                <!-- Acciones de opciones del menu del perfil y button para trasladarse a la parte superior de la pagina-->
                <?php

                include "../componentes/menuPerfil.php";

                ?>

    <!-- Bootstrap: JavaScript-->
    <script src="../sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="../sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../sb-admin/vendor/chart.js/Chart.min.js"></script>
    <script src="../sb-admin/js/demo/chart-area-demo.js"></script>
    <script src="../sb-admin/js/demo/chart-pie-demo.js"></script>
    <script src="../sb-admin/js/sb-admin-2.min.js"></script>

</body>

</html>