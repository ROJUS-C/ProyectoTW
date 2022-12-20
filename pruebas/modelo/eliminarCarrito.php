<?php 
require "conexion.php";

$venta_id = $_GET['venta_id'];
$producto_id = $_GET['producto_id'];
$tienda_id = $_GET['tienda_id'];

$sql = "
UPDATE productos_tienda pt1
set cantidad = (select (pt.cantidad + vp.cantidad) total from productos_tienda pt join venta_producto vp on(pt.producto_id = vp.producto_id and pt.tienda_id = vp.tienda_id and vp.venta_id = '".$venta_id."')
 where vp.producto_id = '".$producto_id."' and vp.tienda_id = '".$tienda_id."'); 
";

mysqli_query($conexion, $sql);

$sql = "
delete from venta_producto where tienda_id = '".$tienda_id."' and producto_id = 
'".$producto_id."' and venta_id = '".$venta_id."'
";

$res = mysqli_query($conexion, $sql);
header("Location: http://localhost/proyectTW/pruebas/pages/empleado/empleado-inicio.php");        

?>