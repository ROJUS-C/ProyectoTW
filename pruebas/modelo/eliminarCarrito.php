<?php 
require "conexion.php";

$venta_id = $_GET['venta_id'];
$producto_id = $_GET['producto_id'];
$tienda_id = $_GET['tienda_id'];

$sql = "
delete from venta_producto where tienda_id = '".$tienda_id."' and producto_id = 
'".$producto_id."' and venta_id = '".$venta_id."'
";

$res = mysqli_query($conexion, $sql);
header("Location: http://localhost/proyectTW/pruebas/pages/empleado/empleado-inicio.php");        

?>