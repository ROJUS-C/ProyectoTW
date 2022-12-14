<?php

session_start();
if (!isset($_SESSION['acceso']) || $_SESSION['acceso'] == false) {
    die("Te has intentado colar en la aplicacion principal");
}

include "../PHP/administrador.php";

$tiendas = mostrarTiendas();
$array2 = mostrarDatosGenerales();
$generales = [];
if ($array2[0]->num_rows != 0) {
    foreach ($array2[0] as $key => $value) {
        array_push($generales, $value['cantidad_tiendas']);
    }
} else {
    array_push($generales, 0);
}
if ($array2[1]->num_rows != 0) {
    foreach ($array2[1] as $key => $value) {
        array_push($generales, $value['cantidad_empleados']);
    }
} else {
    array_push($generales, 0);
}
if ($array2[2]->num_rows != 0) {
    foreach ($array2[2] as $key => $value) {
        array_push($generales, $value['catidad_productos']);
    }
} else {
    array_push($generales, 0);
}

function productosMasVendidos()
{
    require "../modelo/conexion.php";
    $sql = "
    select t.nombre nombre_tienda, p.nombre nombre_producto, e.cantidad cantidad from tiendas t join (select tienda_id, producto_id, SUM(cantidad) cantidad  from venta_producto GROUP BY tienda_id, producto_id) e 
    on(t.tienda_id = e.tienda_id) join productos p on(p.producto_id = e.producto_id)
    ORDER BY e.cantidad DESC LIMIT 5; 
    ";

    $res = mysqli_query($conexion, $sql);
    return $res;
}
function productosMenosVendidos()
{
    require "../modelo/conexion.php";
    $sql = "
    select t.nombre nombre_tienda, p.nombre nombre_producto, e.cantidad cantidad from tiendas t join (select tienda_id, producto_id, SUM(cantidad) cantidad  from venta_producto GROUP BY tienda_id, producto_id) e 
    on(t.tienda_id = e.tienda_id) join productos p on(p.producto_id = e.producto_id)
    ORDER BY e.cantidad ASC LIMIT 5; 
    ";

    $res = mysqli_query($conexion, $sql);
    return $res;
}

function empleadosMasVentas()
{
    require "../modelo/conexion.php";
    $sql = "
     select u1.nombre nombre , u1.apellido apellido, t.nombre tienda, u.cantidad cantidad  from usuarios u1 join 
 (SELECT v.usuario_id usuario_id, sum(vp.cantidad) cantidad from venta_producto vp join venta v ON(vp.venta_id = v.venta_id) GROUP BY v.usuario_id) u 
 on(u1.usuario_id = u.usuario_id) join tiendas t on(u1.tienda = t.tienda_id) GROUP by u.cantidad DESC LIMIT 5
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
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: var(--color-main);">

            <!-- Sidebar - Encabezado -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- Logo -->
                    <i class="fas fa-boxes"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Linea Divisora -->
            <hr class="sidebar-divider my-0">

            <!-- Item Inicio -->
            <li class="nav-item active">
                <a class="nav-link" href="admin-inicio.php">
                <i class="fas fa-fw bi-house-door-fill"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Linea Divisora -->
            <hr class="sidebar-divider my-0">

            <!-- Item Tienda -->
            <li class="nav-item">
                <a class="nav-link" href="admin-tiendas.php">
                    <i class="fas fa-fw fa-store"></i>
                    <span>Tiendas</span></a>
            </li>

            <!-- Item Productos -->
            <li class="nav-item">
                <a class="nav-link" href="admin-productos.php">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Productos</span></a>
            </li>

            <!-- Item Empleados -->
            <li class="nav-item">
                <a class="nav-link" href="admin-empleados.php">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Empleados</span></a>
            </li>

            <!-- Item Ventas -->
            <li class="nav-item">
                <a class="nav-link" href="admin-ventas.php">
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
                include "componentes/encabezado.php";
                ?>
                <div class="container-fluid">
                    <!-- Contenedor Top de Tarjetas -->
                    <div class="row">
                        <!-- Tarjeta: Tiendas -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 0.25rem solid var(--color-blue);">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: var(--color-blue);">
                                                Tiendas </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $generales[0] ?></div>
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $generales[1] ?></div>
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $generales[2] ?></div>
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                                                <?php 
                                                require "../modelo/conexion.php";
                                                $id = $_SESSION['usuario_id'];
                                                $sql = "select sum(precio) total from venta v join tiendas t 
                                                on(v.tienda_id = t.tienda_id and t.administrador = '".$id."')
                                                ";
                                                $res = mysqli_query($conexion, $sql);
                                                if($res->num_rows ==0){
                                                    echo '$O';
                                                }else{
                                                    $total = 0;
                                                    foreach ($res as $key => $value) {
                                                        $total = $value['total'];
                                                    } 
                                                    echo $total;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Contenedor de Tiendas -->
                    <div class="card shadow col-12">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between" style="background-color: var(--color-main);">
                            <h6 class="m-0 font-weight-bold text-white d-inline">Estadisticas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Productos mas vendidos</th>
                                            <th>Nombre tienda</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $res = productosMasVendidos();
                                        if ($res->num_rows == 0) {
                                        ?><tr>
                                                <td>Vacio</td>
                                                <td>Vacio</td>
                                                <td>0</td>
                                            </tr>
                                            <?php
                                        } else {
                                            foreach ($res as $key => $value) {

                                            ?><tr>
                                                    <td><?php echo $value['nombre_producto'] ?></td>
                                                    <td><?php echo $value['nombre_tienda'] ?></td>
                                                    <td><?php echo $value['cantidad'] ?></td>
                                                <tr>
                                            <?php }
                                        } ?>
                                    </tbody>
                                </table>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Productos menos vendido</th>
                                            <th>Nombre tienda</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $res = productosMenosVendidos();
                                        if ($res->num_rows == 0) {
                                        ?><tr>
                                                <td>Vacio</td>
                                                <td>Vacio</td>
                                                <td>0</td>
                                            </tr>
                                            <?php
                                        } else {
                                            foreach ($res as $key => $value) {

                                            ?><tr>
                                                    <td><?php echo $value['nombre_producto'] ?></td>
                                                    <td><?php echo $value['nombre_tienda'] ?></td>
                                                    <td><?php echo $value['cantidad'] ?></td>
                                                <tr>
                                            <?php }
                                        } ?>
                                    </tbody>
                                </table>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Empleados con mas ventas</th>
                                            <th>Nombre tienda</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $res = empleadosMasVentas();
                                        if ($res->num_rows == 0) {
                                        ?><tr>
                                                <td>Vacio</td>
                                                <td>Vacio</td>
                                                <td>0</td>
                                            </tr>
                                            <?php
                                        } else {
                                            foreach ($res as $key => $value) {

                                            ?><tr>
                                                    <td><?php echo $value['nombre'].' '.$value['apellido'] ?></td>
                                                    <td><?php echo $value['tienda'] ?></td>
                                                    <td><?php echo $value['cantidad'] ?></td>
                                                <tr>
                                            <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Acciones de opciones del menu del perfil y button para trasladarse a la parte superior de la pagina-->
                <?php

                include "componentes/menuPerfil.php";

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