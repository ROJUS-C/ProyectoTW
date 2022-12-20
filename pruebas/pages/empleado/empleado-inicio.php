<?php

session_start();
require "../../modelo/conexion.php";
if (!isset($_SESSION['acceso']) || $_SESSION['acceso'] == false) {
    die("Te has intentado colar en la aplicacion principal");
}
$usuario_id = $_SESSION['usuario_id'];
$sql = "
select * from usuarios where usuario_id = '" . $usuario_id . "'
";
$res = mysqli_query($conexion, $sql);

foreach ($res as $key => $value) {
    $tienda_id = $value['tienda'];
}

function existe_venta()
{
    require "../../modelo/conexion.php";
    $nameF = "../../modelo/venta.txt";
    if (file_exists($nameF)) {
        $archivo = fopen($nameF, "r");
        do {
            $valor = fgets($archivo);
        } while (!feof($archivo));

        if (!empty($valor)) {
            $sql = "
            select p.nombre nombre, p.producto_id codigo, vp.cantidad cantidad , vp.precio precio, 
            vp.venta_id venta_id, vp.producto_id producto_id, vp.tienda_id tienda_id
            from venta_producto vp join productos p on(vp.producto_id = p.producto_id) where vp.venta_id = '" . $valor . "';
            ";
            $res = mysqli_query($conexion, $sql);
            return $res;
        }
        return [];
    }
    return [];
}

function buscarProducto($producto_id, $tienda_id)
{
    require "../../modelo/conexion.php";
    $sql = "
    select DISTINCT pt.cantidad cantidad, pt.producto_id producto_id, p.nombre nombre, p.precio precio from productos_tienda pt join productos p on(pt.producto_id = p.producto_id) 
    join tiendas t on(pt.tienda_id = '" . $tienda_id . "') where p.producto_id = '" . $producto_id . "';
    ";
    $res = mysqli_query($conexion, $sql);
    return $res;
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
    <link href="../../public/vendor/bootstrap/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
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

                include "components/encabezado.php";

                ?>
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid d-flex flex-column">
                            <nav class="navbar bg-light mb-5">
                                <div class="container-fluid d-flex justify-content-center align-items-center">
                                    <form class="d-flex" action="http://localhost/proyectTW/pruebas/pages/empleado/components/buscarProducto.php" method="POST" role="search">
                                        <input class="form-control me-2" type="search" placeholder="Search" name="buscar" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                                    </form>
                                </div>
                            </nav>
                            <div class="card">
                                <div class="card-header">
                                    Resultado
                                </div>
                                <div class="card-body">
                                </div>
                                <?php
                                require "./components/carrito.php";
                                if (isset($_GET['id'])) {
                                    $producto_id =  $_GET['id'];
                                    $res = buscarProducto($producto_id, $tienda_id);
                                    foreach ($res as $key => $value) {
                                        agregarProducto($value['producto_id'], $value['nombre'], $value['cantidad'], $tienda_id);
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row px-3 my-5 ">
                    <!-- Area Chart -->
                    <div class="col">
                        <div class="card shadow ">
                            <div class="card-header py-3 d-flex  align-items-center">
                                <h6 class=" m-0 font-weight-bold text-primary ">CARRITO</h6>
                            </div>
                            <!-- Tiendas -->
                            <div class="container text-center ">
                                <div class="card-body">
                                    <?php
                                    $res = existe_venta();
                                    if ($res == []) {
                                        echo 'CARRITO VACIO';
                                    } else {
                                        $array = [];
                                        foreach ($res as $key => $value) {
                                            array_push($array, $value);
                                        }
                                        mostrarCarrito($array);
                                    ?>
                                        <div>
                                            <a href="http://localhost/proyectTW/pruebas/modelo/cancelar.php" class="btn mx-2" style="background-color: var(--color-main); color: white;">Cancelar</a>
                                            <a href="http://localhost/proyectTW/pruebas/modelo/vender.php" class="btn mx-2" style="background-color: var(--color-main); color: white;">Finalizar</a>
                                        </div>
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