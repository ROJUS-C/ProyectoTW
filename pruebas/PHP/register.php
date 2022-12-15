<?php

    /* Iniciar conexion con la base de datos */
    require "conexion.php";

    /* Insertar */
    $resultado = mysqli_query($conexion, "
    INSERT INTO usuarios VALUES(
        NULL,
        '".$_POST['nombre']."',
        '".$_POST['apellido']."',
        '".$_POST['correo']."',
        '".$_POST['password']."',
        'Administrador'
    )
    ");

    header("Location: ../index.html");

?>