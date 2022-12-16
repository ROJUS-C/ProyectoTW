<?php

    /* Iniciar conexion con la base de datos */
    require "conexion.php";

    /* Insertar datos Producto*/
    $producto = mysqli_query($conexion, "
    INSERT INTO productos VALUES(
        NULL,
        '".$_POST['nombreProducto']."',
        '".$_POST['precioProducto']."'
    )
    ");

    $consulta = mysqli_query($conexion, "
        SELECT p.producto_id from productos p
        ORDER BY p.producto_id DESC LIMIT 1
    ");

    foreach($consulta as $producto){
        $id_producto = $producto['producto_id'];
    }
    
    echo "
    INSERT INTO productos_tienda VALUES(
        '".$id_producto."',
        '".$_POST['tiendaProducto']."',
        '".$_POST['cantidadProducto']."'
    )
    ";


    $cantidad = mysqli_query($conexion, "
    INSERT INTO productos_tienda VALUES(
        '".$id_producto."',
        '".$_POST['tiendaProducto']."',
        '".$_POST['cantidadProducto']."'
    )
    ");

    

    header("Location: ../pages/admin-productos.php");

?>