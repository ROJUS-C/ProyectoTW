<?php

    function mostrarTiendas($id_administrador){

        include "conexion.php";

        $consulta = "
        SELECT * FROM tienda
        WHERE
        jefe = '".$id_administrador."'
        ";

        $resultado = mysqli_query($conexion, $consulta);
        $filas = mysqli_fetch_assoc($resultado);
        return $resultado;
    };

    function mostrarDatosGenerales($id_administrador){
        
        include "conexion.php";

        $consulta = "
        SELECT
	        (select count(*) from tienda
             where jefe = '".$id_administrador."'
	        ) num_tiendas,

            (select count(*) from administrador a
             join tienda t on a.usuario_id = t.jefe
             join empleado e on t.tienda_id = e.tienda_id
             where a.usuario_id = '".$id_administrador."'
            ) num_empleados,
            (select sum(td.cantidad_en_tienda) FROM tienda t
             join tienda_producto td on t.tienda_id = td.tienda_id
             join producto p on td.codigo_producto = p.codigo_producto
             where t.jefe = '".$id_administrador."'
            ) cantidad_productos
        ";

        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    function mostrarProductos($tienda_id){
        include "conexion.php";

        $consulta = "
        SELECT p.*, tp.cantidad_en_tienda from producto p
        JOIN tienda_producto tp ON p.codigo_producto = tp.codigo_producto
        WHERE tp.tienda_id = '".$tienda_id."'
        ";

        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;

    }

?>
