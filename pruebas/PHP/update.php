<?php 

    session_start();
    /* Iniciar conexion con la base de datos */
/*     require "conexion.php";

    $consulta = "
    UPDATE administrador
    SET
    nombre = '".$_POST['nombre']."',
    apellido = '".$_POST['apellido']."',
    password = '".$_POST['password']."'
    WHERE
    usuario_id = '".$_SESSION['usuario_id']."'
    ";

    $resultado = mysqli_query($conexion, $consulta);

    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['apellido'] = $_POST['apellido'];
    
    header("Location: ../pages/inicio-admin.php"); */


    require 'conexion.php';
    session_start();
    $usuario_id = $_SESSION['usuario_id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $password = $_POST['password'];
    
    if(!empty($nombre)){
        $sql = "
        UPDATE usuarios 
        set nombre = '".$nombre."'
        where usuario_id = '".$usuario_id."'
        ";
        try {
            mysqli_query($conexion, $sql);
            $_SESSION['nombre'] = $_POST['nombre'];
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    
    if(!empty($apellido)){
        $sql = "
        UPDATE usuarios 
        set apellido = '".$apellido."'
        where usuario_id = '".$usuario_id."'
        ";
        try {
            mysqli_query($conexion, $sql);
            $_SESSION['apellido'] = $_POST['apellido'];
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    
    if(!empty($password)){
        $sql = "
        UPDATE usuarios 
        set password = '".$password."'
        where usuario_id = '".$usuario_id."'
        ";
        try {
            mysqli_query($conexion, $sql);
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    $sqlDatos = "
    SELECT * FROM usuarios
    where usuario_id = '".$usuario_id."'
    ";
    $resultadoDatos = mysqli_query($conexion, $sqlDatos);

    foreach($resultadoDatos as $valor){
        $tipo = $valor['tipo'];
    }

    if($tipo == "Administrador"){
        header("Location: http://localhost/proyectTW/pruebas/pages/admin-inicio.php");
    }
    else{
        header("Location: http://localhost/proyectTW/pruebas/pages/empleado/empleado-inicio.php");
    }
?>