<?php
    session_start();
    /* Iniciar conexion con la base de datos */
    require "conexion.php";

    /* */
    $consulta = "
    SELECT * FROM usuarios
    WHERE
    correo = '".$_POST['correo']."'
    AND
    password = '".$_POST['password']."'
    ";
    $resultado = mysqli_query($conexion, $consulta);
    
    $_SESSION['acceso'] = false;
    $_SESSION['accesoTienda'] = false;

    if ($fila = $resultado->fetch_assoc()){
        $_SESSION['acceso'] = true;
        $_SESSION['usuario_id'] = $fila['usuario_id'];
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['apellido'] = $fila['apellido'];
        $_SESSION['tipo'] = $fila['tipo'];
        if( $fila['tipo'] == 'Administrador'){
        header("Location: ../pages/admin-inicio.php");
        }
    header("Location: http://localhost/proyectTW/pruebas/pages/empleado/empleado-inicio.php");
    }
    else{
        echo "Datos de usuario incorrecto";
    }

?>