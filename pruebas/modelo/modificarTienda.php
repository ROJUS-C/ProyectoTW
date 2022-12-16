<?php
require 'conexion.php';
session_start();
$tienda_id = $_GET['tienda_id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

if(!empty($nombre)){
    $sql = "
    update tiendas 
    set nombre = '".$nombre."'
    where tienda_id = '".$tienda_id."'
    ";
    try {
        mysqli_query($conexion, $sql);
    } catch (\Throwable $th) {
        echo $th;
    }
}
if(!empty($descripcion)){
    $sql = "
    update tiendas 
    set descripcion = '" . $descripcion. "'
    where tienda_id = '" . $tienda_id . "'
    ";
    try {
        mysqli_query($conexion, $sql);
    } catch (\Throwable $th) {
        echo $th;
    }
}
header("Location: http://localhost/proyectTW/pruebas/pages/admin-tiendas.php");
