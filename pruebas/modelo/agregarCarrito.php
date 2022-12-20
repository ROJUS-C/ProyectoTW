<?php

use function PHPSTORM_META\map;

session_start();
$fileName = "venta.txt";
$usuario_id = $_SESSION['usuario_id'];
require "conexion.php";
if(file_exists("venta.txt")){
    $archivo = fopen($fileName, "r");
    do{
        $valor = fgets($archivo);
    }while(!feof($archivo));

    if(!empty($valor)){
        $producto_id = $_GET['producto_id'];
        $tienda_id = $_GET['tienda_id'];
        $cantidad = $_POST['cantidad'];
        $precio = $cantidad * precio_producto($producto_id);
        $sql = "
        insert into venta_producto values('" . $valor . "', '" . $producto_id . "', '" . $cantidad . "', '" . $precio . "' ,'" . $tienda_id . "')
        ";
        mysqli_query($conexion, $sql);
        
        $sql = "
        update productos_tienda
        SET cantidad = (select cantidad from productos_tienda where tienda_id = '".$tienda_id."' and producto_id = '".$producto_id."') - ".$cantidad. "
        where tienda_id = '" . $tienda_id . "' and producto_id = '" . $producto_id . "';
        ";
        mysqli_query($conexion, $sql);
        header("Location: http://localhost/proyectTW/pruebas/pages/empleado/empleado-inicio.php");        
    }else{
        $producto_id = $_GET['producto_id'];
        $tienda_id = $_GET['tienda_id'];
        $cantidad = $_POST['cantidad'];
        $fecha = date('d-m-y');
        $sql = "
        insert into venta values(
            NULL, 
            '".$fecha."',
            NULL,
            '".$tienda_id."',
            '".$usuario_id."'
        )";
        $res = mysqli_query($conexion, $sql);
        $sql = "
        select max(venta_id) venta_id from venta where tienda_id = '".$tienda_id."'
        ";
        $res = mysqli_query($conexion,$sql);
        foreach ($res as $key => $value) {
            $id = $value['venta_id'];
        }
        $archivo = fopen($fileName, "w");
        fwrite($archivo, $id);
        $precio = $cantidad * precio_producto($producto_id);
        $sql = "
        insert into venta_producto values('".$id."', '".$producto_id."', '".$cantidad."', '".$precio."' ,'".$tienda_id."')
        ";
        mysqli_query($conexion, $sql);

        $sql = "
        update productos_tienda
        SET cantidad = (select cantidad from productos_tienda where tienda_id = '" . $tienda_id . "' and producto_id = '" . $producto_id . "') - " . $cantidad . "
        where tienda_id = '" . $tienda_id . "' and producto_id = '" . $producto_id . "';
        ";
        mysqli_query($conexion, $sql);
        header("Location: http://localhost/proyectTW/pruebas/pages/empleado/empleado-inicio.php");

    }

    fclose($archivo);
}

function precio_producto($id){
    require "conexion.php";
    $sql = "
    select precio from productos where producto_id = '".$id."'
    ";
    $res = mysqli_query($conexion, $sql);
    foreach ($res as $key => $value) {
        $res = $value['precio'];
    }
    return $res;
} 

?>  