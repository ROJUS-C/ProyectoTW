<?php 
require 'conexion.php';
session_start();
$id = $_SESSION['usuario_id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];

$sql = " insert into tiendas values(
    NULL,
    '".$nombre."',
    '".$descripcion."',
    '".$fecha."',
    '".$id."'
)";
try {
    $res = mysqli_query($conexion, $sql);
    header("Location: http://localhost/proyectTW/pruebas/pages/admin-tiendas.php");
} catch (\Throwable $th) {
    echo $th;
}
?> 

