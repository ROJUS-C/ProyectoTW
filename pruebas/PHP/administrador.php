<?php

    function mostrarTiendas(){
        include "conexion.php";
        $id_administrador = $_SESSION['usuario_id'];
        $consulta = "
        SELECT * FROM tiendas
        WHERE
        administrador = '".$id_administrador."'
        ";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    };
function mostrarDatosGenerales(){
    include "conexion.php";
    $id_administrador = $_SESSION['usuario_id'];
    $sql_1 = "
    select count(*) cantidad_tiendas from tiendas
    where administrador = '" . $id_administrador . "'
    ";
    $sql_2 = "
    select count(*) cantidad_empleados from usuarios a
             join tiendas t on a.usuario_id = t.administrador
             join usuarios e on t.tienda_id = e.tienda
             where a.usuario_id = '" . $id_administrador . "'
    ";

    $sql_3 = "
            select sum(td.cantidad) catidad_productos FROM tiendas t
             join productos_tienda td on t.tienda_id = td.tienda_id
             where t.administrador = '".$id_administrador."'
        ";
    try {
        $cantidad_tiendas = mysqli_query($conexion, $sql_1);
        $cantidad_empleados = mysqli_query($conexion, $sql_2);
        $cantidad_productos = mysqli_query($conexion, $sql_3);
        return [$cantidad_tiendas,$cantidad_empleados,$cantidad_productos];
    } catch (\Throwable $th) {
        echo 'error';
    }
}

?>
