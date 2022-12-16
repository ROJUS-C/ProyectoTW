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
            $productoTienda = $tienda['tienda_id'];
            $_POST['productoTienda'] = $productoTienda;
            break;
        }
        $productos = mostrarProductos($productoTienda);
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
                                    $nombreTienda;
                                    foreach($tiendas as $tienda){
                                        if($tienda['tienda_id'] == $productoTienda){
                                            $nombreTienda = $tienda['nombre'];

                                ?>

                                        <option value="<?php echo $tienda['tienda_id'];?>" selected><?php echo $tienda['nombre']?></option>

                                        <?php } else{?>

                                        <option value="<?php echo $tienda['tienda_id'];?>"><?php echo $tienda['nombre']?></option>
                                
                                        <?php } ?>

                                <?php } ?>

                            </select>
                            <div class="col-2">
                            <button name="mostrar" type="submit" class="btn" style="background-color: var(--color-main); color: white;">Mostrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between" style="background-color: var(--color-main);">
                            <h6 class="m-0 font-weight-bold text-white d-inline">Productos de: <?php echo $nombreTienda?></h6>
                            <a href="#" data-toggle="modal" data-target="#agregarProducto">
                                <button class="btn text-white" style="border: 2px solid white; background-color: var(--color-main);">Agregar</button>
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
                                            foreach($productos as $producto){
                                        ?>
                                        <tr>
                                            <td><?php echo $producto['nombre']?></td>
                                            <td><?php echo $producto['producto_id']?></td>
                                            <td>$ <?php echo $producto['precio']?></td>
                                            <td><?php echo $producto['cantidad']?></td>
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

    <!-- Form de agregar producto -->
    <div class="modal fade" id="agregarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content" action="../PHP/agregarProducto.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Producto <?php echo $_POST['productoTienda'] ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
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
                    <input class="d-none" type="text" name="tiendaProducto" value=<?php echo $_POST['productoTienda']?>>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Agregar</button>
                </div>
            </form>
        </div>
    </div>
    

    <!-- Bootstrap: JavaScript-->
    <script src="../public/sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="../public/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../public/sb-admin/js/sb-admin-2.min.js"></script>
    <script src="../public/sb-admin/vendor/chart.js/Chart.min.js"></script>
    <script src="../public/sb-admin/js/demo/chart-area-demo.js"></script>
    <script src="../public/sb-admin/js/demo/chart-pie-demo.js"></script>
    

</body>
</html>