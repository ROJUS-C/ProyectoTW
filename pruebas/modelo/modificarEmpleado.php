<?php
require 'conexion.php';


$usuario_id = $_GET['usuario_id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];

if (!empty($nombre)) {
    $sql = "
    UPDATE usuarios 
    set nombre = '" . $nombre . "'
    where usuario_id = '" . $usuario_id . "'
    ";
    try {
        mysqli_query($conexion, $sql);
    } catch (\Throwable $th) {
        echo 'error';
    }
}

if (!empty($apellido)) {
    $sql = "
    UPDATE usuarios 
    set apellido = '" . $apellido . "'
    where usuario_id = '" . $usuario_id . "'
    ";
    try {
        mysqli_query($conexion, $sql);
    } catch (\Throwable $th) {
        echo $th;
    }
}

if (!empty($correo)) {
    $sql = "
    UPDATE usuarios 
    set correo = '" . $correo . "'
    where usuario_id = '" . $usuario_id . "'
    ";
    try {
        mysqli_query($conexion, $sql);
    } catch (\Throwable $th) {
        echo $th;
    }
}
header("Location: ../pages/admin-empleados.php");
