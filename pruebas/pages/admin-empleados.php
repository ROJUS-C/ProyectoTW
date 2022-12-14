<?php

include_once '../modelo/conexion.php';
session_start();
if (!isset($_SESSION['acceso']) || $_SESSION['acceso'] == false) {
    die("Te has intentado colar en la aplicacion principal");
}

$id = $_SESSION['usuario_id'];

$sql = "
select u.usuario_id usuario_id, u.nombre nombre,u.apellido apellido, u.correo correo, t1.nombre tienda  
from usuarios u1 join tiendas t1 on(u1.usuario_id = t1.administrador and u1.usuario_id = ".$id.") 
join usuarios u on(t1.tienda_id = u.tienda ); 
";

$sql2 = "
select * from usuarios where usuario_id = ".$id." 
";
$res_2 = mysqli_query($conexion,$sql2);
$nombre = '';
foreach ($res_2 as $key => $value) {
    $nombre =  $value['nombre'].' '.$value['apellido'];
}

$res = mysqli_query($conexion, $sql);

function verEmp($id){
    require '../modelo/conexion.php';
    $sql = "
    select * from usuarios where usuario_id = " . $id . "   
    ";
    try {
        $res = mysqli_query($conexion, $sql);
         return $res;
    } catch (\Throwable $th) {
        //throw $th;
    }
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
    <title>Empleados | Administrador</title>
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
            <li class="nav-item">
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
            <li class="nav-item active">
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

                <!--Encabezado-->
                <?php
                include "componentes/encabezado.php";
                ?>
                <div class="col">
                    <div class="card shadow ">
                        <div class="card-header py-3 d-flex  align-items-center " style="background-color: #5800FF;">
                            <h6 class=" m-0 font-weight-bold " style="color: white;">EMPLEADOS</h6>
                        </div>
                        <div class="container text-center ">
                            <div class="row d-flex justify-content-center my-3">
                                <?php
                                require 'component/empleados.php';
                                if(isset($_GET['editar'])){
                                    $id = $_GET['editar'];
                                    $res = verEmp($id);
                                    foreach ($res as $key => $value) {
                                        modificarEmpleado($value['usuario_id'], $value['nombre'], $value['apellido'], $value['correo']);
                                    }
                                }else{
                                if($res->num_rows == 0){
                                    $res = [];
                                }
                                empleados($nombre, $res);
                                }?>
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
    <script src="../sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="../sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../sb-admin/vendor/chart.js/Chart.min.js"></script>
    <script src="../sb-admin/js/demo/chart-area-demo.js"></script>
    <script src="../sb-admin/js/demo/chart-pie-demo.js"></script>
    <script src="../sb-admin/js/sb-admin-2.min.js"></script>

</body>

</html>