<?php
session_start();
require '../../modelo/conexion.php';

$producto_id = $_GET['id'];

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



echo '
    <div class="container">
        <form action="../../modelo/modificarProducto.php?id='.$producto_id.'>" method="POST" class="row g-3 my-3">
            <div class="col-12 d-flex justify-content-center">
                <div class="col-md-4">
                    <label for="validationDefault01" class="form-label">Nombre</label>
                    <input name="nombreProducto" type="text" class="form-control" placeholder ='.$nombreProducto.'>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Precio</label>
                    <input name="precioProducto" type="text" class="form-control" placeholder ='.$precioProducto.'>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault03" class="form-label">Cantidad</label>
                    <input name="cantidadProducto" type="text" class="form-control" placeholder ='.$cantidadProducto.'>
                </div>
            </div>
            <div class="col-12">
                <a href="../admin-productos.php" class="btn btn-primary mx-1">Volver</a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </form>
    </div>
    ';
?>