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
        select sum(vp.precio) total from venta v join venta_producto vp on(v.venta_id = vp.venta_id) where v.venta_id = '".$valor."';
        ";
        $res = mysqli_query($conexion, $sql);
        $total = 0;
        foreach ($res as $key => $value) {
            $total = $value['total'];
        }
        $sql = "
        update venta
        set precio = '".$total."'
        where venta_id = '".$valor."'
        ";
        mysqli_query($conexion,$sql);
        $archivo = fopen($fileName, "w");
        fwrite($archivo, "");
        header("Location: http://localhost/proyectTW/pruebas/pages/empleado/empleado-inicio.php");
    }
}

?>