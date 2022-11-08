<?php 

    session_start();
    /* Iniciar conexion con la base de datos */
    require "../modelo/conexion.php";

    $consulta = "
    UPDATE usuario
    SET
    nombre = '".$_POST['nombre']."',
    apellido = '".$_POST['apellido']."',
    password = '".$_POST['password']."'
    WHERE
    usuario_id = '".$_SESSION['usuario_id']."'
    ";

    $resultado = mysqli_query($conexion, $consulta);

    /* Actulizar variables de inicio de sesion */
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['apellido'] = $_POST['apellido'];
    
    header("Location: ../pages/inicio-admin.php");

?>