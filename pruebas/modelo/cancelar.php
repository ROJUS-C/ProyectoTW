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
        UPDATE productos_tienda pt1
        set cantidad = (select (pt.cantidad + vp.cantidad) total from productos_tienda pt join venta_producto vp on(pt.producto_id = vp.producto_id and pt.tienda_id = vp.tienda_id and vp.venta_id = '".$valor."') 
        where vp.producto_id = pt1.producto_id and vp.tienda_id = pt1.tienda_id); 
        ";
        mysqli_query($conexion, $sql);
        
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
