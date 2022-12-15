<?php

    session_start();
    if(!isset($_SESSION['acceso']) || $_SESSION['acceso'] == false){
        die("Te has intentado colar en la aplicacion principal");
    }

    include "../PHP/administrador.php";

    $tiendas = mostrarTiendas($_SESSION['usuario_id']);

    if(isset($_POST['mostrar'])){
        $productoTienda = $_POST['productoTienda'];
        $productos = mostrarProductos($productoTienda);
    }
    else{
        foreach($tiendas as $tienda){
            $primeraTienda = $tienda['tienda_id'];
            break;
        }
        $productos = mostrarProductos($primeraTienda);
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
    <title>Productos | Administrador</title>
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
                    <h3>Productos</h3>
                    <div class="row">
                        <form method="post">
                            <select name="productoTienda" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <?php     
                                    foreach($tiendas as $tienda){
                                ?>

                                <option value="<?php echo $tienda['tienda_id'];?>"><?php echo $tienda['nombre']?></option>
                                
                                <?php } ?>

                            </select>
                            <div class="col-2">
                            <button name="mostrar" type="submit" class="btn" style="background-color: var(--color-main); color: white;">Mostrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color: var(--color-main);">
                            <h6 class="m-0 font-weight-bold text-white">Productos de: Nombre Tienda</h6>
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
                                            foreach($productos as $producto){
                                        ?>
                                        <tr>
                                            <td><?php echo $producto['nombre']?></td>
                                            <td><?php echo $producto['codigo_producto']?></td>
                                            <td>$ <?php echo $producto['precio']?></td>
                                            <td><?php echo $producto['cantidad_en_tienda']?></td>
                                            <td>
                                                <button type="button" class="btn" style="background-color: var(--color-blue); color: white;">Editar</button>
                                                <button type="button" class="btn" style="background-color: var(--color-main); color: white;">Eliminar</button>
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