<?php

$fileName = "venta.txt";
require "conexion.php";
if (file_exists("venta.txt")) {
    $archivo = fopen($fileName, "r");
    do {
        $valor = fgets($archivo);
    } while (!feof($archivo));

    if (!empty($valor)) {        
        $sql = "
        delete from venta 
        where venta_id = '".$valor."'
        ";
        mysqli_query($conexion,$sql);
        $archivo = fopen($fileName, "w");
        fwrite($archivo, "");
        header("Location: http://localhost/proyectTW/pruebas/pages/empleado/empleado-inicio.php");
    }
}
