<?php

    include_once '../modelo/conexion.php';

    session_start();
    if(!isset($_SESSION['acceso']) || $_SESSION['acceso'] == false){
        die("Te has intentado colar en la aplicacion principal");
    }

    $sqlNumTiendas = "
    SELECT count(*) numTiendas from tiendas
    WHERE administrador = '".$_SESSION['usuario_id']."'
    ";
    $resultadoNumTiendas = mysqli_query($conexion, $sqlNumTiendas);

    foreach($resultadoNumTiendas as $valor){
        $contadorTienda = $valor['numTiendas'];
    }

    if(isset($_POST['mostrar'])){ /* Cambiar a la id de la tienda en la que esta el usuario */
        $_SESSION['tiendaActual'] = $_POST['tiendaSeleccionada'];
    }

    else if(!$_SESSION['accesoTienda'] || $contadorTienda == 0){ /* Solo si esta accediendo por primera vez a la tienda */
        if ($contadorTienda != 0){ //Solo si tiene alguna tienda
            /* Obtener el id de la primera tienda del usuario */
            $sqlTienda = "
            SELECT tienda_id from tiendas
            WHERE administrador = '".$_SESSION['usuario_id']."'
            ORDER BY tienda_id LIMIT 1
            ";
            $resultadoPrimeraTienda = mysqli_query($conexion, $sqlTienda);

            foreach($resultadoPrimeraTienda as $valor){
                $_SESSION['tiendaActual'] = $valor['tienda_id'];
            }
            $_SESSION['accesoTienda'] = true;
        }
        else{ //Si no tiene tiendas
            $_SESSION['tiendaActual'] = "";
            $_SESSION['accesoTienda'] = false;
        }
    }


    /* Obtener todas las tiendas del usuario */
    $sqlTiendas = "
    SELECT * from tiendas
    WHERE administrador = '".$_SESSION['usuario_id']."'
    ";
    $resultadoAllTiendas = mysqli_query($conexion, $sqlTiendas);

    /* Obtener todos los datos de los productos de la tienda actual (tiendaActual) en la que esta el usuario */
    $sqlProductos = "
    SELECT p.*, tp.cantidad from productos p
    JOIN productos_tienda tp ON p.producto_id = tp.producto_id
    WHERE tp.tienda_id = '".$_SESSION['tiendaActual']."'
    ";
    $resultadoAllProductos = mysqli_query($conexion, $sqlProductos);







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
    <link href="../public/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../public/vendor/bootstrap/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../public/css/elementos.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

    <!-- Side Bar -->
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
            <li class="nav-item active">
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
                    <?php
                    
                    if(isset($_GET['editar_id'])){
                        $producto_id = $_GET['editar_id'];

                        $sqlProducto = "
                        SELECT p.*, tp.cantidad from productos p
                        JOIN productos_tienda tp ON p.producto_id = tp.producto_id
                        WHERE tp.tienda_id = '".$_SESSION['tiendaActual']."'
                        AND p.producto_id = '".$producto_id."'
                        ";

                        $resultadoProducto = mysqli_query($conexion, $sqlProducto);

                        foreach($resultadoProducto as $valor){
                            $nombreProducto = $valor['nombre'];
                            $precioProducto = $valor['precio'];
                            $cantidadProducto = $valor['cantidad'];
                        }

                    ?>
                    <div class="col">
                        <div class="card shadow ">
                            <div class="card-header py-3 d-flex  align-items-center " style="background-color: #5800FF;">
                                <h6 class=" m-0 font-weight-bold " style="color: white;">Modificar</h6>
                            </div>
                            <!-- Modificar -->
                            <div class="container text-center ">
                                <div class="row d-flex justify-content-center">
                                    <form action="http://localhost/proyectTW/pruebas/modelo/modificarProducto.php?id=<?php echo $producto_id ?>" method="POST" class="row g-3 my-3">
                                        <div class="col-12 d-flex flex-wrap justify-content-center">
                                            <div class="col-sm-5 col-md-4 col-12">
                                                <label for="validationDefault01" class="form-label">Nombre</label>
                                                <input name="nombreProducto" type="text" class="form-control" placeholder="<?php echo $nombreProducto ?>" name="nombre">
                                            </div>
                                            <div class="col-sm-5 col-md-4 col-12 mt-4 mt-sm-0">
                                                <label for="validationDefault02" class="form-label">Precio</label>
                                                <input name="precioProducto" type="text" class="form-control"  placeholder="<?php echo $precioProducto ?>" name="descripcion">
                                            </div>
                                            <div class="col-sm-5 col-md-4 col-12 mt-4 mt-sm-0">
                                                <label for="validationDefault02" class="form-label">Cantidad</label>
                                                <input name="cantidadProducto" type="text" class="form-control" placeholder="<?php echo $cantidadProducto ?>" name="descripcion">
                                            </div>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                                <label class="form-check-label" for="invalidCheck2">
                                                    Aceptar terminos
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <a href="http://localhost/proyectTW/pruebas/pages/admin-productos.php" class="btn text-white mx-1 mt-2" style="background-color: var(--color-main);">Volver</a>
                                            <button class="btn text-white mx-1 mt-2" style="background-color: var(--color-blue);">Guardar Cambios</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } else{ ?>

                    <h3>Productos</h3>
                    <div class="row">
                        <div class="col-12 col-sm-8">
                            <form class="col-12" method="post">
                                <div class="row flex-column flex-sm-row mb-4">
                                    <select class="col-12 col-sm-9 mb-2 mb-sm-4" name="tiendaSeleccionada" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                        <?php
                                            foreach($resultadoAllTiendas as $tienda){
                                                if($tienda['tienda_id'] == $_SESSION['tiendaActual']){
                                                    $nombreTienda = $tienda['nombre'];
                                        ?>
                                                <option value="<?php echo $tienda['tienda_id'];?>" selected><?php echo $tienda['nombre']?></option>

                                                <?php } else{?>

                                                <option value="<?php echo $tienda['tienda_id'];?>"><?php echo $tienda['nombre']?></option>
                                        
                                                <?php } ?>
                                        <?php } ?>

                                    </select>
                                    <div class="col-3 px-0 px-sm-3">
                                        <button name="mostrar" type="submit" class="btn" style="background-color: var(--color-main); color: white;">Mostrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-4">

                        </div>

                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-wrap align-items-center justify-content-between" style="background-color: var(--color-main);">
                            <?php
                            if($_SESSION['tiendaActual'] == ""){
                                echo '<h6 class="m-0 font-weight-bold text-white d-inline my-1 mr-2">No hay Tiendas</h6>';
                            }
                            else{
                                echo '<h6 class="m-0 font-weight-bold text-white d-inline my-1 mr-2">Productos de: '.$nombreTienda.'</h6>';
                            }
                            ?>
                            <a href="#" data-toggle="modal" data-target="#agregarProducto" class="my-2">
                                <button name="agregarProducto" class="btn text-white" style="border: 2px solid white; background-color: var(--color-main);">Agregar</button>
                            </a>
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
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($resultadoAllProductos as $producto){
                                        ?>
                                        <tr>
                                            <td><?php echo $producto['nombre']?></td>
                                            <td><?php echo $producto['producto_id']?></td>
                                            <td>$ <?php echo $producto['precio']?></td>
                                            <td><?php echo $producto['cantidad']?></td>
                                            <td class="center">
                                                <a href="http://localhost/proyectTW/pruebas/pages/admin-productos.php?editar_id=<?php echo $producto['producto_id'];?>" class="btn mx-1 my-1" style="background-color: var(--color-blue); color: white;">Editar</a>
                                                <a href="../modelo/eliminarProducto.php?id=<?php echo $producto['producto_id'];?>" class="btn mx-1 my-1" style="background-color: var(--color-main); color: white;">Eliminar</a>
                                            </td>
                                        </tr>
                                        
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <?php } ?>


            </div>    
        </div>

    </div>

    <!-- Acciones de opciones del menu del perfil y button para trasladarse a la parte superior de la pagina-->
    <?php 
    
    include "componentes/menuPerfil.php";
    
    ?>

    <!-- Form de agregar producto -->
    <div class="modal fade" id="agregarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content" action="../modelo/agregarProducto.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Producto a <?php echo $nombreTienda ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <input type="text" name="nombreProducto" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Precio</label>
                        <input type="text" name="precioProducto" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Cantidad</label>
                        <input type="text" name="cantidadProducto" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Agregar</button>
                </div>
            </form>
        </div>
    </div>

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