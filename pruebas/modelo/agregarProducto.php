<?php 
require 'conexion.php';
session_start();
$tienda_id = $_SESSION['tiendaActual'];
$nombre = $_POST['nombreProducto'];
$precio = $_POST['precioProducto'];
$cantidad = $_POST['cantidadProducto'];

$sqlProducto = "
INSERT INTO productos VALUES(
    NULL,
    '".$nombre."',
    '".$precio."'
);
";
$consulta1 = mysqli_query($conexion, $sqlProducto);

/* Obtiene el ultimo id insertado */
$id_producto = mysqli_insert_id($conexion);


$sqlRelacion = "
INSERT INTO productos_tienda VALUES(
    '".$id_producto."',
    '".$tienda_id."',
    '".$cantidad."'
)
";
$consulta2 = mysqli_query($conexion, $sqlRelacion);


header("Location: ../pages/admin-productos.php");

?>



