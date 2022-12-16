<?php 
require 'conexion.php';
session_start();
$tienda_id = $_GET['tienda_id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];

$sql = " insert into usuarios values(
    NULL,
    '".$nombre."',
    '".$apellido."',
    '".$correo."',
    '".$pass."',
    'Empleado',
    ".$tienda_id."
)";

try {
    $res = mysqli_query($conexion, $sql);
    header("Location: http://localhost/proyectTW/pruebas/pages/admin-tiendas.php");
} catch (\Throwable $th) {
    echo $th;
}
