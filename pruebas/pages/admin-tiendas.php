<?php

include_once '../modelo/conexion.php';
session_start();
if (!isset($_SESSION['acceso']) || $_SESSION['acceso'] == false) {
    die("Te has intentado colar en la aplicacion principal");
}

$id = $_SESSION['usuario_id'];
$sql = "select * from tiendas where administrador = '" . $id . "'";

$resultado = mysqli_query($conexion, $sql);

function ver($id)
{
    require '../modelo/conexion.php';
    $sql = "
    select * from tiendas where tienda_id = '" . $id . "'
    ";
    $res = mysqli_query($conexion, $sql);
    return $res;
}

function get_empleado($id)
{
    require '../modelo/conexion.php';
    $sql = "
    select * from usuarios where tienda = '" . $id . "'
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
                <?php if (isset($_GET['ver'])) { ?>
                    <div class="col">
                        <div class="card shadow ">
                            <div class="card-header py-3 d-flex align-items-center" style="background-color: var(--color-main)">
                                <h6 class="m-0 font-weight-bold text-white">Tienda</h6>
                            </div>
                            <!-- Tiendas -->
                            <div class="container text-center ">
                                <div class="row d-flex justify-content-center">
                                    <?php include './component/tienda.php';
                                    $id = $_GET['ver'];
                                    $array =  ver($id);
                                    $empledo = get_empleado($id);
                                    if ($empledo->num_rows == 0) {
                                        $emps = 'Vacio';
                                        $correo = 'Vacio';
                                    } else {
                                        foreach ($empledo as $key => $value) {
                                            $emps = $value['nombre'] . ' ' . $value['apellido'];
                                            $correo = $value['correo'];
                                        }
                                    }
                                    foreach ($array as $key => $value) {
                                        verTienda($value['tienda_id'], $value['nombre'], $emps,$correo, $value['descripcion'], $value['fecha']);
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else if (isset($_GET['modificar'])) { ?>
                    <div class="col">
                        <div class="card shadow ">
                            <div class="card-header py-3 d-flex  align-items-center " style="background-color: #5800FF;">
                                <h6 class=" m-0 font-weight-bold " style="color: white;">Modificar</h6>
                            </div>
                            <!-- Modificar -->
                            <div class="container text-center ">
                                <div class="row d-flex justify-content-center">
                                    <?php
                                    $id = $_GET['modificar'];
                                    require './component/tienda.php';
                                    $res = ver($id);
                                    foreach ($res as $key => $value) {
                                        modificar($value['tienda_id'], $value['nombre'], $value['descripcion']);
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else if (isset($_GET['agregarE'])) { ?>
                    <div class="col">
                        <div class="card shadow ">
                            <div class="card-header py-3 d-flex  align-items-center" style="background-color: #5800FF;">
                                <h6 class=" m-0 font-weight-bold " style="color: white;">Agregar empleado</h6>
                            </div>
                            <!-- Tiendas -->
                            <div class="container px-5">
                                <?php
                                $tienda_id = $_GET['agregarE'];
                                include './component/agregarEmpleado.php';
                                agregarEmpleado($tienda_id);
                                ?>
                            </div>
                        </div>
                    </div>
                <?php }else { ?>
                    <div class="row px-3">
                        <div class="col">
                            <?php require './component/formulario-agregar-tienda.php' ?>
                        </div>
                    </div>
                    <!-- contenedor para mostrar las tiendas -->
                    <div class="row px-3">
                        <!-- Area Chart -->
                        <div class="col">
                            <div class="card shadow ">
                                <div class="card-header py-3 d-flex  align-items-center" style="background-color: var(--color-main)">
                                    <h6 class=" m-0 font-weight-bold text-white">Tiendas</h6>
                                </div>
                                <!-- Tiendas -->
                                <div class="container text-center ">
                                    <div class="row d-flex justify-content-center">
                                        <?php include './component/tienda.php';
                                        if ($resultado->num_rows == 0) {
                                            tiendas();
                                        } else {
                                            foreach ($resultado as $key => $value) {
                                                tiendas($value['tienda_id'], $value['nombre'], $value['descripcion'], $value['fecha']);
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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