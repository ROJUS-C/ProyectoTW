<?php

    /* Iniciar conexion con la base de datos */
    require "../modelo/conexion.php";

    /* Insertar */
    $resultado = mysqli_query($conexion, "
    INSERT INTO usuario VALUES(
        NULL,
        '".$_POST['nombre']."',
        '".$_POST['apellido']."',
        '".$_POST['correo']."',
        '".$_POST['password']."'
    )
    ");

    header("Location: ../index.html");

?>