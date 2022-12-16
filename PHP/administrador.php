<?php

    function mostrarTiendas($id_administrador){

        include "conexion.php";

        $consulta = "
        SELECT * FROM tiendas
        WHERE
        administrador = '".$id_administrador."'
        ";

        $resultado = mysqli_query($conexion, $consulta);
        $filas = mysqli_fetch_assoc($resultado);
        return $resultado;
    };

    function mostrarDatosGenerales($id_administrador){
        
        include "conexion.php";

        $consulta = "
        SELECT
	        (select count(*) from tiendas t
             where t.administrador = '".$id_administrador."'
	        ) num_tiendas,

            (select count(*) from usuarios u1
             join tiendas t on t.administrador = '".$id_administrador."'
             join usuarios u2 on t.tienda_id = u2.tienda AND u2.tipo = 'Empleado'
            ) num_empleados,

            (select sum(td.cantidad) FROM tiendas t
             join productos_tienda td on t.tienda_id = td.tienda_id
             join productos p on td.producto_id = p.producto_id
             where t.administrador = '".$id_administrador."'
            ) cantidad_productos
        ";

        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    function mostrarProductos($tienda_id){
        include "conexion.php";

        $consulta = "
        SELECT p.*, pt.cantidad, t.nombre from tiendas t
        JOIN productos_tienda pt ON t.tienda_id = pt.tienda_id
        JOIN productos p ON pt.producto_id = p.producto_id
        WHERE t.tienda_id = '".$tienda_id."'
        ";

        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;

    }

?>
