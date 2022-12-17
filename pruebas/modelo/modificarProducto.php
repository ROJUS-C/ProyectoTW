<?php
require 'conexion.php';
session_start();
$tienda_id = $_SESSION['tiendaActual'];
$producto_id = $_GET['id'];
$nombre = $_POST['nombreProducto'];
$precio = $_POST['precioProducto'];
$cantidad = $_POST['cantidadProducto'];

if(!empty($nombre)){
    $sql = "
    UPDATE productos 
    set nombre = '".$nombre."'
    where producto_id = '".$producto_id."'
    ";
    try {
        mysqli_query($conexion, $sql);
    } catch (\Throwable $th) {
        echo $th;
    }
}

if(!empty($precio)){
    $sql = "
    UPDATE productos 
    set precio = '".$precio."'
    where producto_id = '".$producto_id."'
    ";
    try {
        mysqli_query($conexion, $sql);
    } catch (\Throwable $th) {
        echo $th;
    }
}

if(!empty($cantidad)){
    $sql = "
    UPDATE productos_tienda 
    set cantidad = '".$cantidad."'
    where producto_id = '".$producto_id."'
    AND tienda_id = '".$tienda_id."'
    ";
    try {
        mysqli_query($conexion, $sql);
    } catch (\Throwable $th) {
        echo $th;
    }
}
header("Location: ../pages/admin-productos.php");