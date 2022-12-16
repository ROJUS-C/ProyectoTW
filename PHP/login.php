<?php
    session_start();
    /* Iniciar conexion con la base de datos */
    require "conexion.php";

    /* Realizar consulta */
    $consulta = "
    SELECT * FROM usuarios
    WHERE
    correo = '".$_POST['correo']."'
    AND
    password = '".$_POST['password']."'
    AND
    tipo = 'Administrador'
    ";
    $resultado = mysqli_query($conexion, $consulta);
    
    $_SESSION['acceso'] = false;

    if ($fila = $resultado->fetch_assoc()){
        $_SESSION['acceso'] = true;
        $_SESSION['usuario_id'] = $fila['usuario_id'];
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['apellido'] = $fila['apellido'];

        header("Location: ../pages/admin-inicio.php");
    }
    else{
        echo "Datos de usuario incorrecto";
    }

?>