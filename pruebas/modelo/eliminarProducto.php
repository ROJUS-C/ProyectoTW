<?php 
require 'conexion.php';
session_start();
$producto_id = $_GET['id'];

$sqlEliminarRelacion = "
DELETE FROM productos_tienda
WHERE producto_id = '".$producto_id."'
";
$consulta1 = mysqli_query($conexion, $sqlEliminarRelacion);

$sqlEliminarProducto = "
DELETE FROM productos
WHERE producto_id = '".$producto_id."'
";
$consulta1 = mysqli_query($conexion, $sqlEliminarProducto);


header("Location: ../pages/admin-productos.php");

?>