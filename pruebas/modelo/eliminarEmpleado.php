<?php
require "conexion.php";
$tienda_id = $_GET['eliminar'];
$sql = "delete from usuarios where usuario_id = '".$tienda_id."'";
try {
    $res = mysqli_query($conexion, $sql);
    header("Location: http://localhost/proyectTW/pruebas/pages/admin-empleados.php");

} catch (\Throwable $th) {
    header("Location: http://localhost/proyectTW/pruebas/pages/admin-inicio.php");
}
