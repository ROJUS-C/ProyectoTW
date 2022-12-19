<?php
require "conexion.php";
$tienda_id = $_GET['eliminar'];
$sql = "delete from tiendas where tienda_id = '".$tienda_id."'";
try {
    $res = mysqli_query($conexion, $sql);
    header("Location: http://localhost/proyectTW/pruebas/pages/admin-tiendas.php");

} catch (\Throwable $th) {
    header("Location: http://localhost/proyectTW/pruebas/pages/admin-inicio.php");
}
?>